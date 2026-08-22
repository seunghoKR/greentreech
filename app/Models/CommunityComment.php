<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class CommunityComment
{
    public static function getByPostId(int $postId): array
    {
        $sql = "
            SELECT c.*, m.`nickname` as author_name, m.`profile_image` as author_image, m.`role` as author_role
            FROM `community_comments` c
            JOIN `members` m ON c.`member_id` = m.`id`
            WHERE c.`post_id` = :post_id
            ORDER BY c.`id` ASC
        ";
        return Database::query($sql, ['post_id' => $postId]);
    }

    public static function find(int $id): ?array
    {
        return Database::fetchOne("SELECT * FROM `community_comments` WHERE `id` = :id", ['id' => $id]);
    }

    public static function create(int $postId, int $memberId, string $content): int
    {
        $sql = "INSERT INTO `community_comments` (`post_id`, `member_id`, `content`, `created_at`) 
                VALUES (:post_id, :member_id, :content, CURRENT_TIMESTAMP)";
        Database::execute($sql, [
            'post_id' => $postId,
            'member_id' => $memberId,
            'content' => $content,
        ]);
        $newId = (int)Database::lastInsertId();
        CommunityPost::updateCommentCount($postId);
        return $newId;
    }

    public static function delete(int $id): bool
    {
        $comment = self::find($id);
        if (!$comment) return false;

        $postId = (int)$comment['post_id'];
        $res = Database::execute("DELETE FROM `community_comments` WHERE `id` = :id", ['id' => $id]) > 0;
        CommunityPost::updateCommentCount($postId);
        return $res;
    }
}
