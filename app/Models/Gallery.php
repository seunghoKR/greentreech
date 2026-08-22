<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Gallery
{
    public static function getCategories(): array
    {
        return ['전체', '사진첩', '캘리그라피', '선교소식'];
    }

    public static function getLatest(int $limit = 6, ?string $category = null): array
    {
        $params = [];
        $whereSql = "";
        if ($category && $category !== '전체') {
            $whereSql = "WHERE `category` = :cat";
            $params['cat'] = $category;
        }

        $sql = "SELECT * FROM `gallery` {$whereSql} ORDER BY `event_date` DESC, `id` DESC LIMIT {$limit}";
        $items = Database::query($sql, $params);
        return array_map([self::class, 'formatItem'], $items);
    }

    public static function getPaginated(int $page = 1, int $limit = 9, ?string $category = null, ?string $keyword = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $wheres = [];

        if ($category && $category !== '전체') {
            $wheres[] = "`category` = :cat";
            $params['cat'] = $category;
        }

        if (!empty($keyword)) {
            $wheres[] = "(`title` LIKE :kw1 OR `content` LIKE :kw2)";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
        }

        $whereSql = !empty($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `gallery` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `gallery` {$whereSql} ORDER BY `event_date` DESC, `id` DESC LIMIT {$limit} OFFSET {$offset}";
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
        $item = Database::fetchOne("SELECT * FROM `gallery` WHERE `id` = :id", ['id' => $id]);
        return $item ? self::formatItem($item) : null;
    }

    public static function incrementView(int $id): void
    {
        Database::execute("UPDATE `gallery` SET `view_count` = `view_count` + 1 WHERE `id` = :id", ['id' => $id]);
    }

    public static function create(array $data): int
    {
        $imageUrls = is_array($data['image_urls'] ?? null) 
            ? json_encode($data['image_urls'], JSON_UNESCAPED_UNICODE) 
            : ($data['image_urls'] ?? '[]');

        $thumbnail = $data['thumbnail_url'] ?? '';
        if (empty($thumbnail) && !empty($data['image_urls']) && is_array($data['image_urls'])) {
            $thumbnail = $data['image_urls'][0] ?? '';
        }

        $sql = "INSERT INTO `gallery` (`category`, `title`, `content`, `thumbnail_url`, `image_urls`, `event_date`, `view_count`) 
                VALUES (:category, :title, :content, :thumbnail_url, :image_urls, :event_date, 0)";
        Database::execute($sql, [
            'category' => $data['category'] ?: '사진첩',
            'title' => $data['title'],
            'content' => $data['content'] ?? '',
            'thumbnail_url' => $thumbnail,
            'image_urls' => $imageUrls,
            'event_date' => $data['event_date'] ?: date('Y-m-d'),
        ]);
        return (int)Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $imageUrls = is_array($data['image_urls'] ?? null) 
            ? json_encode($data['image_urls'], JSON_UNESCAPED_UNICODE) 
            : ($data['image_urls'] ?? '[]');

        $thumbnail = $data['thumbnail_url'] ?? '';
        if (empty($thumbnail) && !empty($data['image_urls']) && is_array($data['image_urls'])) {
            $thumbnail = $data['image_urls'][0] ?? '';
        }

        $sql = "UPDATE `gallery` SET 
                `category` = :category, 
                `title` = :title, 
                `content` = :content, 
                `thumbnail_url` = :thumbnail_url, 
                `image_urls` = :image_urls, 
                `event_date` = :event_date 
                WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'category' => $data['category'] ?: '사진첩',
            'title' => $data['title'],
            'content' => $data['content'] ?? '',
            'thumbnail_url' => $thumbnail,
            'image_urls' => $imageUrls,
            'event_date' => $data['event_date'] ?: date('Y-m-d'),
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `gallery` WHERE `id` = :id", ['id' => $id]) > 0;
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
        if (empty($item['images']) && !empty($item['thumbnail_url'])) {
            $item['images'][] = $item['thumbnail_url'];
        }
        return $item;
    }
}
