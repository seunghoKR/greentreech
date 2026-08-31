<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Notice
{
    public static function getCategories(): array
    {
        return ['전체', '소식', '주보', '공지'];
    }

    public static function getLatest(int $limit = 5, ?string $category = null): array
    {
        $params = [];
        $whereSql = "";
        if ($category && $category !== '전체') {
            if ($category === '소식') {
                $whereSql = "WHERE (`category` = '소식' OR `category` = '교회소식')";
            } elseif ($category === '공지') {
                $whereSql = "WHERE (`category` = '공지' OR `category` = '공지사항')";
            } else {
                $whereSql = "WHERE `category` = :cat";
                $params['cat'] = $category;
            }
        }

        $sql = "SELECT * FROM `notices` {$whereSql} ORDER BY `id` DESC LIMIT {$limit}";
        return Database::query($sql, $params);
    }

    public static function getPaginated(int $page = 1, int $limit = 10, ?string $category = null, ?string $keyword = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $wheres = [];

        if ($category && $category !== '전체') {
            if ($category === '소식') {
                $wheres[] = "(`category` = '소식' OR `category` = '교회소식')";
            } elseif ($category === '공지') {
                $wheres[] = "(`category` = '공지' OR `category` = '공지사항')";
            } else {
                $wheres[] = "`category` = :cat";
                $params['cat'] = $category;
            }
        }

        if (!empty($keyword)) {
            $wheres[] = "(`title` LIKE :kw1 OR `content` LIKE :kw2)";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
        }

        $whereSql = !empty($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `notices` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `notices` {$whereSql} ORDER BY `id` DESC LIMIT {$limit} OFFSET {$offset}";
        $items = Database::query($sql, $params);

        $totalPages = (int)ceil($total / $limit);

        return [
            'items' => $items,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'totalPages' => max(1, $totalPages),
        ];
    }

    public static function find(int $id): ?array
    {
        return Database::fetchOne("SELECT * FROM `notices` WHERE `id` = :id", ['id' => $id]);
    }

    public static function incrementView(int $id): void
    {
        Database::execute("UPDATE `notices` SET `view_count` = `view_count` + 1 WHERE `id` = :id", ['id' => $id]);
    }

    public static function create(array $data): int
    {
        $createdAt = !empty($data['created_at']) ? $data['created_at'] . ' ' . date('H:i:s') : date('Y-m-d H:i:s');
        $sql = "INSERT INTO `notices` (`category`, `title`, `content`, `attachment_url`, `created_at`, `view_count`) 
                VALUES (:category, :title, :content, :attachment_url, :created_at, 0)";
        Database::execute($sql, [
            'category' => $data['category'] ?: '공지사항',
            'title' => $data['title'],
            'content' => $data['content'] ?? '',
            'attachment_url' => $data['attachment_url'] ?? null,
            'created_at' => $createdAt,
        ]);
        return (int)Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $params = [
            'id' => $id,
            'category' => $data['category'] ?: '공지사항',
            'title' => $data['title'],
            'content' => $data['content'] ?? '',
            'attachment_url' => $data['attachment_url'] ?? null,
        ];

        $dateSql = "";
        if (!empty($data['created_at'])) {
            $dateSql = ", `created_at` = :created_at";
            $params['created_at'] = $data['created_at'] . ' ' . date('H:i:s');
        }

        $sql = "UPDATE `notices` SET 
                `category` = :category, 
                `title` = :title, 
                `content` = :content, 
                `attachment_url` = :attachment_url 
                {$dateSql}
                WHERE `id` = :id";
        return Database::execute($sql, $params) >= 0;
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `notices` WHERE `id` = :id", ['id' => $id]) > 0;
    }
}
