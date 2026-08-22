<?php
declare(strict_types=1);

namespace App\Core;

class Session
{
    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            ini_set('session.cookie_httponly', '1');
            ini_set('session.use_only_cookies', '1');
            session_start();
        }
    }

    public static function set(string $key, mixed $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        self::start();
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        self::start();
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function setFlash(string $type, string $message): void
    {
        self::set('_flash_' . $type, $message);
    }

    public static function getFlash(string $type): ?string
    {
        $key = '_flash_' . $type;
        $msg = self::get($key);
        self::remove($key);
        return $msg;
    }

    public static function generateCsrfToken(): string
    {
        $token = bin2hex(random_bytes(32));
        self::set('_csrf_token', $token);
        return $token;
    }

    public static function getCsrfToken(): string
    {
        $token = self::get('_csrf_token');
        if (!$token) {
            $token = self::generateCsrfToken();
        }
        return $token;
    }

    public static function validateCsrfToken(?string $token): bool
    {
        $stored = self::get('_csrf_token');
        return $stored !== null && hash_equals($stored, (string)$token);
    }
}
