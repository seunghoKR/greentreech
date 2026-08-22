<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Sermon
{
    public static function getCategories(): array
    {
        return [
            '전체',
            '설교 영상',
            '예배 영상',
            '듣는 성경',
            '설교 쇼츠',
            '예배 쇼츠',
            '교회 행사/일상',
            '기타',
        ];
    }

    public static function getCategoryCounts(): array
    {
        $rows = Database::query("SELECT `category`, COUNT(*) as c FROM `sermons` GROUP BY `category`");
        $counts = [];
        $total = 0;
        foreach ($rows as $r) {
            $cat = $r['category'] ?? '설교 영상';
            $counts[$cat] = (int)$r['c'];
            $total += (int)$r['c'];
        }
        $counts['전체'] = $total;
        return $counts;
    }

    public static function extractYoutubeId(?string $input): ?string
    {
        if (empty($input)) {
            return null;
        }

        $input = trim($input);

        // If it's already an 11-char ID
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', $input)) {
            return $input;
        }

        // Match youtu.be/<id>
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]{11})/', $input, $matches)) {
            return $matches[1];
        }

        // Match youtube.com/watch?v=<id> or youtube.com/embed/<id> or youtube.com/shorts/<id>
        if (preg_match('/(?:v=|embed\/|shorts\/)([a-zA-Z0-9_-]{11})/', $input, $matches)) {
            return $matches[1];
        }

        return $input;
    }

    public static function getThumbnailUrl(?string $youtubeId): string
    {
        $id = self::extractYoutubeId($youtubeId);
        if ($id) {
            return "https://img.youtube.com/vi/{$id}/hqdefault.jpg";
        }
        return '/public/assets/images/logo.png';
    }

    public static function getLatest(): ?array
    {
        $sermon = Database::fetchOne("SELECT * FROM `sermons` WHERE `category` IN ('설교 영상', '주일 설교') ORDER BY `sermon_date` DESC, `id` DESC LIMIT 1");
        if (!$sermon) {
            $sermon = Database::fetchOne("SELECT * FROM `sermons` ORDER BY `sermon_date` DESC, `id` DESC LIMIT 1");
        }
        return $sermon;
    }

    public static function getMediaCategoryCounts(): array
    {
        $mediaCats = ['설교 쇼츠', '예배 쇼츠', '예배 영상', '듣는 성경', '교회 행사/일상', '기타'];
        $rows = Database::query("SELECT `category`, COUNT(*) as c FROM `sermons` WHERE `category` NOT IN ('설교 영상', '주일 설교', '주일예배') GROUP BY `category`");
        
        $counts = [];
        $mediaTotal = 0;
        foreach ($rows as $r) {
            $cat = $r['category'] ?? '기타';
            $counts[$cat] = (int)$r['c'];
            $mediaTotal += (int)$r['c'];
        }

        $result = [];
        foreach ($mediaCats as $mc) {
            $result[$mc] = $counts[$mc] ?? 0;
        }
        $result['전체'] = $mediaTotal;

        return $result;
    }

    public static function getSundaySermonsPaginated(int $page = 1, int $limit = 9, ?string $keyword = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $wheres = ["`category` IN ('설교 영상', '주일 설교', '주일예배')"];

        if (!empty($keyword)) {
            $wheres[] = "(`title` LIKE :kw1 OR `scripture` LIKE :kw2 OR `preacher` LIKE :kw3 OR `content` LIKE :kw4)";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
            $params['kw3'] = "%{$keyword}%";
            $params['kw4'] = "%{$keyword}%";
        }

        $whereSql = "WHERE " . implode(" AND ", $wheres);

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `sermons` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `sermons` {$whereSql} ORDER BY `sermon_date` DESC, `id` DESC LIMIT {$limit} OFFSET {$offset}";
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

    public static function getMediaPaginated(int $page = 1, int $limit = 12, ?string $category = null, ?string $keyword = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $wheres = [];

        if (!empty($category) && $category !== '전체') {
            $wheres[] = "`category` = :cat";
            $params['cat'] = $category;
        } else {
            // '전체' 미디어 목록에서는 주일 설교('설교 영상', '주일 설교') 제외
            $wheres[] = "`category` NOT IN ('설교 영상', '주일 설교', '주일예배')";
        }

        if (!empty($keyword)) {
            $wheres[] = "(`title` LIKE :kw1 OR `scripture` LIKE :kw2 OR `preacher` LIKE :kw3 OR `content` LIKE :kw4)";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
            $params['kw3'] = "%{$keyword}%";
            $params['kw4'] = "%{$keyword}%";
        }

        $whereSql = !empty($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `sermons` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `sermons` {$whereSql} ORDER BY `sermon_date` DESC, `id` DESC LIMIT {$limit} OFFSET {$offset}";
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
            $wheres[] = "(`title` LIKE :kw1 OR `scripture` LIKE :kw2 OR `preacher` LIKE :kw3 OR `content` LIKE :kw4)";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
            $params['kw3'] = "%{$keyword}%";
            $params['kw4'] = "%{$keyword}%";
        }

        $whereSql = !empty($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `sermons` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `sermons` {$whereSql} ORDER BY `sermon_date` DESC, `id` DESC LIMIT {$limit} OFFSET {$offset}";
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
        return Database::fetchOne("SELECT * FROM `sermons` WHERE `id` = :id", ['id' => $id]);
    }

    public static function incrementView(int $id): void
    {
        Database::execute("UPDATE `sermons` SET `view_count` = `view_count` + 1 WHERE `id` = :id", ['id' => $id]);
    }

    public static function create(array $data): int
    {
        $sql = "INSERT INTO `sermons` (`title`, `category`, `video_type`, `preacher`, `scripture`, `sermon_date`, `youtube_id`, `content`, `view_count`) 
                VALUES (:title, :category, :video_type, :preacher, :scripture, :sermon_date, :youtube_id, :content, 0)";
        Database::execute($sql, [
            'title' => $data['title'],
            'category' => $data['category'] ?? '주일 설교',
            'video_type' => $data['video_type'] ?? 'video',
            'preacher' => $data['preacher'] ?: '심민보 목사',
            'scripture' => $data['scripture'] ?? '',
            'sermon_date' => $data['sermon_date'] ?? date('Y-m-d'),
            'youtube_id' => self::extractYoutubeId($data['youtube_id'] ?? null),
            'content' => $data['content'] ?? '',
        ]);
        return (int)Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $sql = "UPDATE `sermons` SET 
                `title` = :title, 
                `category` = :category, 
                `video_type` = :video_type, 
                `preacher` = :preacher, 
                `scripture` = :scripture, 
                `sermon_date` = :sermon_date, 
                `youtube_id` = :youtube_id, 
                `content` = :content 
                WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'title' => $data['title'],
            'category' => $data['category'] ?? '주일 설교',
            'video_type' => $data['video_type'] ?? 'video',
            'preacher' => $data['preacher'] ?: '심민보 목사',
            'scripture' => $data['scripture'] ?? '',
            'sermon_date' => $data['sermon_date'] ?? date('Y-m-d'),
            'youtube_id' => self::extractYoutubeId($data['youtube_id'] ?? null),
            'content' => $data['content'] ?? '',
        ]) >= 0;
    }

    public static function updateCategory(int $id, string $category, ?string $videoType = null): bool
    {
        if ($videoType === null) {
            $videoType = (str_contains($category, '쇼츠')) ? 'shorts' : 'video';
        }
        $sql = "UPDATE `sermons` SET `category` = :category, `video_type` = :vtype WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'category' => $category,
            'vtype' => $videoType,
        ]) >= 0;
    }

    public static function bulkUpdateCategory(array $ids, string $category): int
    {
        if (empty($ids)) return 0;
        $videoType = (str_contains($category, '쇼츠')) ? 'shorts' : 'video';
        $inPlaceholders = implode(',', array_map('intval', $ids));
        $sql = "UPDATE `sermons` SET `category` = :category, `video_type` = :vtype WHERE `id` IN ({$inPlaceholders})";
        return Database::execute($sql, [
            'category' => $category,
            'vtype' => $videoType,
        ]);
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `sermons` WHERE `id` = :id", ['id' => $id]) > 0;
    }
}
