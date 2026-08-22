<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class CommunityPost
{
    public static function getCategories(): array
    {
        return ['전체', '나눔과교제', '기도나눔', '은혜와감사', '자유나눔'];
    }

    public static function getPaginated(int $page = 1, int $limit = 10, ?string $category = null, ?string $keyword = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $wheres = [];

        if ($category && $category !== '전체') {
            $wheres[] = "p.`category` = :cat";
            $params['cat'] = $category;
        }

        if (!empty($keyword)) {
            $wheres[] = "(p.`title` LIKE :kw1 OR p.`content` LIKE :kw2 OR m.`nickname` LIKE :kw3)";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
            $params['kw3'] = "%{$keyword}%";
        }

        $whereSql = !empty($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";

        $countRow = Database::fetchOne("
            SELECT COUNT(*) as total 
            FROM `community_posts` p 
            JOIN `members` m ON p.`member_id` = m.`id` 
            {$whereSql}
        ", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "
            SELECT p.*, m.`nickname` as author_name, m.`profile_image` as author_image, m.`role` as author_role
            FROM `community_posts` p
            JOIN `members` m ON p.`member_id` = m.`id`
            {$whereSql}
            ORDER BY p.`id` DESC
            LIMIT {$limit} OFFSET {$offset}
        ";
        $items = Database::query($sql, $params);

        $totalPages = (int)ceil($total / $limit);

        return [
            'items' => array_map([self::class, 'formatItem'], $items),
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'totalPages' => max(1, $totalPages),
        ];
    }

    public static function find(int $id): ?array
    {
        $sql = "
            SELECT p.*, m.`nickname` as author_name, m.`profile_image` as author_image, m.`role` as author_role, m.`notify_kakao` as author_notify
            FROM `community_posts` p
            JOIN `members` m ON p.`member_id` = m.`id`
            WHERE p.`id` = :id
        ";
        $item = Database::fetchOne($sql, ['id' => $id]);
        return $item ? self::formatItem($item) : null;
    }

    public static function create(array $data): int
    {
        $imageUrls = is_array($data['image_urls'] ?? null)
            ? json_encode($data['image_urls'], JSON_UNESCAPED_UNICODE)
            : ($data['image_urls'] ?? '[]');

        $sql = "INSERT INTO `community_posts` (`member_id`, `category`, `title`, `content`, `image_urls`, `view_count`, `comment_count`, `created_at`) 
                VALUES (:member_id, :category, :title, :content, :image_urls, 0, 0, CURRENT_TIMESTAMP)";
        Database::execute($sql, [
            'member_id' => $data['member_id'],
            'category' => $data['category'] ?: '나눔과교제',
            'title' => $data['title'],
            'content' => $data['content'],
            'image_urls' => $imageUrls,
        ]);
        return (int)Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $imageUrls = is_array($data['image_urls'] ?? null)
            ? json_encode($data['image_urls'], JSON_UNESCAPED_UNICODE)
            : ($data['image_urls'] ?? '[]');

        $sql = "UPDATE `community_posts` SET 
                `category` = :category, 
                `title` = :title, 
                `content` = :content, 
                `image_urls` = :image_urls 
                WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'category' => $data['category'] ?: '나눔과교제',
            'title' => $data['title'],
            'content' => $data['content'],
            'image_urls' => $imageUrls,
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `community_posts` WHERE `id` = :id", ['id' => $id]) > 0;
    }

    public static function incrementView(int $id): void
    {
        Database::execute("UPDATE `community_posts` SET `view_count` = `view_count` + 1 WHERE `id` = :id", ['id' => $id]);
    }

    public static function updateCommentCount(int $postId): void
    {
        $row = Database::fetchOne("SELECT COUNT(*) as c FROM `community_comments` WHERE `post_id` = :id", ['id' => $postId]);
        $cnt = (int)($row['c'] ?? 0);
        Database::execute("UPDATE `community_posts` SET `comment_count` = :c WHERE `id` = :id", ['id' => $postId, 'c' => $cnt]);
    }

    private static function formatItem(array $item): array
    {
        $item['images'] = [];
        if (!empty($item['image_urls'])) {
            $decoded = json_decode($item['image_urls'], true);
            if (is_array($decoded)) {
                $item['images'] = $decoded;
            }
        }
        return $item;
    }
}
