<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Admin
{
    public static function findByUsername(string $username): ?array
    {
        return Database::fetchOne("SELECT * FROM `admins` WHERE `username` = :username", ['username' => $username]);
    }

    public static function findById(int $id): ?array
    {
        return Database::fetchOne("SELECT * FROM `admins` WHERE `id` = :id", ['id' => $id]);
    }

    public static function updateLastLogin(int $id): void
    {
        Database::execute("UPDATE `admins` SET `last_login` = CURRENT_TIMESTAMP WHERE `id` = :id", ['id' => $id]);
    }

    public static function updatePassword(int $id, string $plainPassword): bool
    {
        $hash = password_hash($plainPassword, PASSWORD_DEFAULT);
        return Database::execute("UPDATE `admins` SET `password_hash` = :hash WHERE `id` = :id", [
            'id' => $id,
            'hash' => $hash,
        ]) > 0;
    }

    public static function getAvailablePermissions(): array
    {
        return [
            'sermons' => ['label' => '설교 및 미디어 관리', 'desc' => '주일설교, 유튜브 쇼츠, 영상 등록'],
            'notices' => ['label' => '알리는 소식 관리 (공지/주보)', 'desc' => '주보 파일, 공지사항 등록 및 AI 문체 변환'],
            'gallery' => ['label' => '사진첩 및 캘리 관리', 'desc' => '교회 사진, 캘리그라피 등록'],
            'community' => ['label' => '성도 나눔터 모니터링', 'desc' => '나눔터 게시글/댓글 관리 및 삭제'],
            'inquiries' => ['label' => '새가족/기도 접수 관리', 'desc' => '새가족 등록 및 기도/상담 내역 확인'],
            'members' => ['label' => '성도 회원 관리', 'desc' => '카카오 가입 회원 등급 및 알림 관리'],
        ];
    }

    public static function getAll(): array
    {
        return Database::query("SELECT * FROM `admins` WHERE (`username` IS NULL OR (`username` != 'leeshkr@kakao.com' AND `username` NOT LIKE '%leeshkr%')) AND (`role` != '사이트 개발자 (최고관리자)' OR `role` IS NULL) ORDER BY `id` ASC");
    }

    public static function hasPermission(array $admin, string $perm): bool
    {
        $role = $admin['role'] ?? '';
        if ($role === '담임목사 (최고관리자)' || $role === '사이트 개발자 (최고관리자)') {
            return true;
        }

        $permsRaw = $admin['permissions'] ?? '[]';
        $perms = is_array($permsRaw) ? $permsRaw : json_decode((string)$permsRaw, true);
        if (!is_array($perms)) {
            $perms = [];
        }

        return in_array('all', $perms, true) || in_array($perm, $perms, true);
    }

    public static function create(string $username, string $plainPassword, string $name, string $role = '부관리자 (사역담당)', array $permissions = []): int
    {
        $hash = password_hash($plainPassword, PASSWORD_DEFAULT);
        $permsJson = json_encode($permissions, JSON_UNESCAPED_UNICODE);
        $sql = "INSERT INTO `admins` (`username`, `password_hash`, `name`, `role`, `permissions`, `created_at`) 
                VALUES (:username, :hash, :name, :role, :perms, CURRENT_TIMESTAMP)";
        Database::execute($sql, [
            'username' => $username,
            'hash' => $hash,
            'name' => $name,
            'role' => $role,
            'perms' => $permsJson,
        ]);
        return (int)Database::lastInsertId();
    }

    public static function update(int $id, string $name, string $role, array $permissions, ?string $plainPassword = null): bool
    {
        $permsJson = json_encode($permissions, JSON_UNESCAPED_UNICODE);
        if (!empty($plainPassword)) {
            $hash = password_hash($plainPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE `admins` SET `name` = :name, `role` = :role, `permissions` = :perms, `password_hash` = :hash WHERE `id` = :id";
            return Database::execute($sql, [
                'id' => $id,
                'name' => $name,
                'role' => $role,
                'perms' => $permsJson,
                'hash' => $hash,
            ]) >= 0;
        }

        $sql = "UPDATE `admins` SET `name` = :name, `role` = :role, `permissions` = :perms WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'name' => $name,
            'role' => $role,
            'perms' => $permsJson,
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        // Protect primary admin with id 1
        if ($id === 1) {
            return false;
        }
        return Database::execute("DELETE FROM `admins` WHERE `id` = :id", ['id' => $id]) > 0;
    }
}
