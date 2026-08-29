<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Inquiry
{
    public static function getTypes(): array
    {
        return ['첫방문 안내', '마음 나눔 / 질문', '기도 부탁'];
    }

    public static function getStatuses(): array
    {
        return ['접수', '확인완료', '처리완료'];
    }

    public static function getPendingCount(): int
    {
        $row = Database::fetchOne("SELECT COUNT(*) as cnt FROM `inquiries` WHERE `status` = '접수'");
        return (int)($row['cnt'] ?? 0);
    }

    public static function getPaginated(int $page = 1, int $limit = 15, ?string $type = null, ?string $status = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        $wheres = [];

        if ($type && $type !== '전체') {
            $wheres[] = "`type` = :type";
            $params['type'] = $type;
        }

        if ($status && $status !== '전체') {
            $wheres[] = "`status` = :status";
            $params['status'] = $status;
        }

        $whereSql = !empty($wheres) ? "WHERE " . implode(" AND ", $wheres) : "";

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `inquiries` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `inquiries` {$whereSql} ORDER BY `id` DESC LIMIT {$limit} OFFSET {$offset}";
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
        return Database::fetchOne("SELECT * FROM `inquiries` WHERE `id` = :id", ['id' => $id]);
    }

    public static function create(array $data): int
    {
        $sql = "INSERT INTO `inquiries` (`type`, `name`, `phone`, `content`, `is_private`, `status`, `created_at`) 
                VALUES (:type, :name, :phone, :content, :is_private, '접수', CURRENT_TIMESTAMP)";
        Database::execute($sql, [
            'type' => $data['type'] ?: '새가족등록',
            'name' => $data['name'],
            'phone' => $data['phone'],
            'content' => $data['content'],
            'is_private' => isset($data['is_private']) ? (int)$data['is_private'] : 1,
        ]);
        return (int)Database::lastInsertId();
    }

    public static function updateStatus(int $id, string $status, ?string $adminMemo = null): bool
    {
        $sql = "UPDATE `inquiries` SET `status` = :status, `admin_memo` = :admin_memo WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'status' => $status,
            'admin_memo' => $adminMemo,
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `inquiries` WHERE `id` = :id", ['id' => $id]) > 0;
    }
}
