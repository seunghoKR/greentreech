<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $config = require __DIR__ . '/../../config/database.php';
        $driver = $config['driver'] ?? 'sqlite';

        try {
            if ($driver === 'sqlite') {
                $dir = dirname($config['sqlite']['path']);
                if (!is_dir($dir)) {
                    mkdir($dir, 0755, true);
                }
                $dsn = 'sqlite:' . $config['sqlite']['path'];
                self::$pdo = new PDO($dsn, null, null, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } else {
                $c = $config['mysql'];
                $dsn = "mysql:host={$c['host']};port={$c['port']};dbname={$c['database']};charset={$c['charset']}";
                self::$pdo = new PDO($dsn, $c['username'], $c['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                ]);
            }
        } catch (PDOException $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            
            // Auto fallback to SQLite if MySQL fails and sqlite is available
            if ($driver !== 'sqlite') {
                try {
                    $dir = dirname($config['sqlite']['path']);
                    if (!is_dir($dir)) {
                        mkdir($dir, 0755, true);
                    }
                    $dsn = 'sqlite:' . $config['sqlite']['path'];
                    self::$pdo = new PDO($dsn, null, null, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]);
                    return self::$pdo;
                } catch (\Throwable $t) {
                    // Fall through
                }
            }

            throw new RuntimeException('데이터베이스 연결 실패: ' . $e->getMessage());
        }

        return self::$pdo;
    }

    public static function query(string $sql, array $params = []): array
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function fetchOne(string $sql, array $params = []): ?array
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch();
        return $result === false ? null : $result;
    }

    public static function execute(string $sql, array $params = []): int
    {
        $stmt = self::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    public static function lastInsertId(): string
    {
        return self::getConnection()->lastInsertId();
    }
}
