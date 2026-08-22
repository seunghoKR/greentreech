<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Member
{
    public static function find(int $id): ?array
    {
        return Database::fetchOne("SELECT * FROM `members` WHERE `id` = :id", ['id' => $id]);
    }

    public static function findByKakaoId(string $kakaoId): ?array
    {
        return Database::fetchOne("SELECT * FROM `members` WHERE `kakao_id` = :kakao_id", ['kakao_id' => $kakaoId]);
    }

    public static function findByEmail(string $email): ?array
    {
        return Database::fetchOne("SELECT * FROM `members` WHERE `email` = :email", ['email' => $email]);
    }

    public static function createOrUpdateKakao(array $kakaoProfile): array
    {
        $kakaoId = (string)$kakaoProfile['id'];
        $name = $kakaoProfile['name'] ?? null;
        $nickname = $kakaoProfile['nickname'] ?? ($name ?: '성도');
        $profileImage = $kakaoProfile['profile_image'] ?? null;
        $email = $kakaoProfile['email'] ?? null;
        $phone = $kakaoProfile['phone'] ?? null;

        $existing = self::findByKakaoId($kakaoId);
        $isSuperAdmin = ($email === 'leeshkr@kakao.com' || str_contains((string)$email, 'leeshkr'));
        $role = $isSuperAdmin ? '사이트 개발자 (최고관리자)' : '등록성도';
        $defaultName = $name ?: ($isSuperAdmin ? '이승호 개발자' : null);

        if ($existing) {
            // 사용자가 마이페이지에서 수정한 실명, 닉네임, 연락처는 카카오 재로그인 시에도 절대 덮어씌워지지 않고 영구 보존
            $finalName = !empty($existing['name']) ? $existing['name'] : ($name ?: ($isSuperAdmin ? '이승호 개발자' : null));
            $finalNickname = !empty($existing['nickname']) ? $existing['nickname'] : $nickname;
            $finalPhone = !empty($existing['phone']) ? $existing['phone'] : $phone;
            $finalProfileImage = $profileImage ?: ($existing['profile_image'] ?? null);
            $finalEmail = $email ?: ($existing['email'] ?? null);
            $finalRole = !empty($existing['role']) ? $existing['role'] : $role;
            if ($isSuperAdmin) {
                $finalRole = '사이트 개발자 (최고관리자)';
            }

            $sql = "UPDATE `members` SET 
                    `name` = :name,
                    `nickname` = :nickname, 
                    `profile_image` = :profile_image, 
                    `email` = :email, 
                    `phone` = :phone,
                    `role` = :role,
                    `last_login` = CURRENT_TIMESTAMP 
                    WHERE `id` = :id";
            Database::execute($sql, [
                'id' => $existing['id'],
                'name' => $finalName,
                'nickname' => $finalNickname,
                'profile_image' => $finalProfileImage,
                'email' => $finalEmail,
                'phone' => $finalPhone,
                'role' => $finalRole,
            ]);
            return self::find((int)$existing['id']);
        }

        $sql = "INSERT INTO `members` (`kakao_id`, `name`, `nickname`, `profile_image`, `email`, `phone`, `role`, `notify_kakao`, `created_at`, `last_login`) 
                VALUES (:kakao_id, :name, :nickname, :profile_image, :email, :phone, :role, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        Database::execute($sql, [
            'kakao_id' => $kakaoId,
            'name' => $defaultName,
            'nickname' => $nickname,
            'profile_image' => $profileImage,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
        ]);

        $newId = (int)Database::lastInsertId();
        return self::find($newId);
    }

    public static function updateProfile(int $id, ?string $name, string $nickname, ?string $phone, int $notifyKakao): bool
    {
        $sql = "UPDATE `members` SET `name` = :name, `nickname` = :nickname, `phone` = :phone, `notify_kakao` = :notify WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'name' => $name,
            'nickname' => $nickname,
            'phone' => $phone,
            'notify' => $notifyKakao,
        ]) >= 0;
    }

    public static function adminUpdateMember(int $id, ?string $name, string $nickname, ?string $phone, ?string $email, string $role, int $notifyKakao): bool
    {
        $sql = "UPDATE `members` SET 
                `name` = :name, 
                `nickname` = :nickname, 
                `phone` = :phone, 
                `email` = :email, 
                `role` = :role, 
                `notify_kakao` = :notify 
                WHERE `id` = :id";
        return Database::execute($sql, [
            'id' => $id,
            'name' => $name,
            'nickname' => $nickname,
            'phone' => $phone,
            'email' => $email,
            'role' => $role,
            'notify' => $notifyKakao,
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `members` WHERE `id` = :id", ['id' => $id]) > 0;
    }

    public static function updateRole(int $id, string $role): bool
    {
        $sql = "UPDATE `members` SET `role` = :role WHERE `id` = :id";
        return Database::execute($sql, ['id' => $id, 'role' => $role]) >= 0;
    }

    public static function getTotalMemberCount(): int
    {
        $row = Database::fetchOne("SELECT COUNT(*) as total FROM `members` WHERE (`email` IS NULL OR (`email` != 'leeshkr@kakao.com' AND `email` NOT LIKE '%leeshkr%')) AND (`role` != '사이트 개발자 (최고관리자)' OR `role` IS NULL)");
        return (int)($row['total'] ?? 0);
    }

    public static function getPaginated(int $page = 1, int $limit = 15, ?string $keyword = null): array
    {
        $offset = ($page - 1) * $limit;
        $params = [];
        
        // 개발자 계정(leeshkr@kakao.com)은 일반 성도 교우 명부 목록에서 제외
        $whereConditions = ["(`email` IS NULL OR (`email` != 'leeshkr@kakao.com' AND `email` NOT LIKE '%leeshkr%'))", "(`role` != '사이트 개발자 (최고관리자)' OR `role` IS NULL)"];

        if (!empty($keyword)) {
            $whereConditions[] = "(`name` LIKE :kw0 OR `nickname` LIKE :kw1 OR `email` LIKE :kw2 OR `phone` LIKE :kw3)";
            $params['kw0'] = "%{$keyword}%";
            $params['kw1'] = "%{$keyword}%";
            $params['kw2'] = "%{$keyword}%";
            $params['kw3'] = "%{$keyword}%";
        }

        $whereSql = "WHERE " . implode(" AND ", $whereConditions);

        $countRow = Database::fetchOne("SELECT COUNT(*) as total FROM `members` {$whereSql}", $params);
        $total = (int)($countRow['total'] ?? 0);

        $sql = "SELECT * FROM `members` {$whereSql} ORDER BY `id` DESC LIMIT {$limit} OFFSET {$offset}";
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
}
