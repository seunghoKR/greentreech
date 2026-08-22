<?php
declare(strict_types=1);

namespace App\Core;

use App\Models\Admin;
use App\Models\Member;

class Auth
{
    private const ADMIN_SESSION_KEY = 'admin_user';
    private const MEMBER_SESSION_KEY = 'church_member';

    // ==========================================
    // 1. Admin Authentication
    // ==========================================
    public static function check(): bool
    {
        if (Session::has(self::ADMIN_SESSION_KEY)) {
            return true;
        }

        // Auto grant admin session for Pastor/SuperAdmin Kakao member
        $member = self::member();
        if ($member && self::isMemberAdmin($member)) {
            return true;
        }

        return false;
    }

    public static function isMemberAdmin(?array $member): bool
    {
        if (!$member) {
            return false;
        }

        $role = $member['role'] ?? '';
        $email = (string)($member['email'] ?? '');
        $nickname = (string)($member['nickname'] ?? '');
        $phone = (string)($member['phone'] ?? '');

        // 1. 역할 기반 승인
        if (in_array($role, ['담임목사 (최고관리자)', '사이트 개발자 (최고관리자)', '교역자 (사역담당)', '부관리자 (사역담당)', '관리자'], true)) {
            return true;
        }

        // 2. 대표님 및 개발자 지정 이메일 승인
        $superAdminEmails = ['leeshkr@kakao.com', 'nuriohga@gmail.com', 'nurioh@naver.com'];
        if (in_array($email, $superAdminEmails, true) || str_contains($email, 'leeshkr') || str_contains($email, 'nurioh')) {
            return true;
        }

        // 3. admins 테이블에 등록된 관리자 이메일/이름 매칭
        try {
            $matchingAdmin = \App\Core\Database::fetchOne(
                "SELECT * FROM `admins` WHERE `username` = :email OR `name` = :name OR `username` = :nickname LIMIT 1",
                ['email' => $email, 'name' => $member['name'] ?? '', 'nickname' => $nickname]
            );
            if ($matchingAdmin) {
                return true;
            }
        } catch (\Throwable $e) {}

        return false;
    }

    public static function loginAdminFromMember(array $member): void
    {
        $role = $member['role'] ?? '담임목사 (최고관리자)';
        if (!in_array($role, ['담임목사 (최고관리자)', '사이트 개발자 (최고관리자)', '부관리자 (사역담당)', '관리자'], true)) {
            $role = '담임목사 (최고관리자)';
        }

        $adminData = [
            'id' => (int)$member['id'],
            'username' => $member['email'] ?: ($member['kakao_id'] ? "kakao_{$member['kakao_id']}" : 'kakao_admin'),
            'name' => $member['name'] ?: ($member['nickname'] ?: '담임목사/관리자'),
            'role' => $role,
            'permissions' => '["all"]',
            'login_type' => 'kakao',
        ];

        Session::start();
        Session::set(self::ADMIN_SESSION_KEY, $adminData);
    }

    public static function user(): ?array
    {
        $admin = Session::get(self::ADMIN_SESSION_KEY);
        if ($admin) {
            return $admin;
        }

        $member = self::member();
        if ($member && self::isMemberAdmin($member)) {
            return [
                'id' => (int)$member['id'],
                'username' => $member['email'] ?: "kakao_{$member['kakao_id']}",
                'name' => $member['name'] ?: ($member['nickname'] ?: '관리자'),
                'role' => ($member['role'] ?? '') ?: '담임목사 (최고관리자)',
                'permissions' => '["all"]',
                'login_type' => 'kakao',
            ];
        }

        return null;
    }

    public static function id(): ?int
    {
        $user = self::user();
        return $user ? (int)$user['id'] : null;
    }

    public static function login(string $username, string $password): bool
    {
        $admin = Admin::findByUsername($username);
        if (!$admin) {
            return false;
        }

        if (password_verify($password, $admin['password_hash'])) {
            Admin::updateLastLogin((int)$admin['id']);

            Session::start();
            session_regenerate_id(true);

            unset($admin['password_hash']);
            Session::set(self::ADMIN_SESSION_KEY, $admin);
            return true;
        }

        return false;
    }

    public static function logout(): void
    {
        Session::remove(self::ADMIN_SESSION_KEY);
        Session::remove(self::MEMBER_SESSION_KEY);
        Session::remove('auth_redirect_after_login');
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function requireAuth(): void
    {
        if (!self::check()) {
            Session::setFlash('error', '로그인이 필요한 페이지입니다.');
            header('Location: /admin/login');
            exit;
        }
    }

    public static function requireLogin(): void
    {
        self::requireAuth();
    }

    public static function requireAdmin(): void
    {
        self::requireAuth();
    }

    // ==========================================
    // 2. Member (Kakao) Authentication
    // ==========================================
    public static function isMember(): bool
    {
        return Session::has(self::MEMBER_SESSION_KEY);
    }

    public static function member(): ?array
    {
        return Session::get(self::MEMBER_SESSION_KEY);
    }

    public static function memberId(): ?int
    {
        $m = self::member();
        return $m ? (int)$m['id'] : null;
    }

    public static function loginMember(array $member): void
    {
        Session::start();
        Session::set(self::MEMBER_SESSION_KEY, $member);
    }

    public static function logoutMember(): void
    {
        Session::remove(self::MEMBER_SESSION_KEY);
    }

    public static function requireMember(): void
    {
        if (!self::isMember()) {
            Session::setFlash('error', '나눔터 글쓰기 및 댓글 참여는 카카오 로그인 후 이용하실 수 있습니다.');
            header('Location: /auth/login?redirect=' . urlencode($_SERVER['REQUEST_URI'] ?? '/community'));
            exit;
        }
    }
}
