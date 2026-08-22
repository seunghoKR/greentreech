<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class NotificationLog
{
    public static function log(int $recipientId, string $type, string $message, string $status = 'SUCCESS'): int
    {
        try {
            $sql = "INSERT INTO `notification_logs` (`recipient_id`, `type`, `message`, `status`, `created_at`) 
                    VALUES (:recipient_id, :type, :message, :status, CURRENT_TIMESTAMP)";
            Database::execute($sql, [
                'recipient_id' => $recipientId,
                'type' => $type,
                'message' => $message,
                'status' => $status,
            ]);
            return (int)Database::lastInsertId();
        } catch (\Throwable $e) {
            error_log("Failed to log notification: " . $e->getMessage());
            return 0;
        }
    }

    public static function getLatest(int $limit = 20): array
    {
        try {
            $sql = "
                SELECT n.*, m.`nickname` as recipient_name 
                FROM `notification_logs` n 
                LEFT JOIN `members` m ON n.`recipient_id` = m.`id` 
                ORDER BY n.`id` DESC LIMIT {$limit}
            ";
            return Database::query($sql);
        } catch (\Throwable $e) {
            return [];
        }
    }
}
