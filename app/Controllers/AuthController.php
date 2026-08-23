<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Core\Auth;
use App\Core\Session;
use App\Models\Member;
use App\Services\KakaoAuthService;

class AuthController
{
    public function login(): void
    {
        if (Auth::isMember()) {
            header('Location: /community');
            exit;
        }

        $redirect = $_GET['redirect'] ?? '/community';
        Session::set('auth_redirect_after_login', $redirect);

        $kakaoLoginUrl = KakaoAuthService::getLoginUrl();
        $hasKakaoApiKey = !empty(KakaoAuthService::getRestApiKey());

        View::render('auth/login', [
            'title' => '성도 로그인 (카카오 간편 로그인) - 푸른나무교회',
            'kakaoLoginUrl' => $kakaoLoginUrl,
            'hasKakaoApiKey' => $hasKakaoApiKey,
            'redirect' => $redirect,
        ]);
    }

    public function kakao(): void
    {
        $redirectUrl = KakaoAuthService::getLoginUrl();
        header("Location: {$redirectUrl}");
        exit;
    }

    public function callback(): void
    {
        $code = $_GET['code'] ?? '';
        if (empty($code)) {
            Session::setFlash('error', '카카오 인증 코드가 전달되지 않았습니다.');
            header('Location: /auth/login');
            exit;
        }

        $tokenData = KakaoAuthService::getAccessToken($code);
        if (!$tokenData || empty($tokenData['access_token'])) {
            Session::setFlash('error', '카카오 토큰 발급에 실패했습니다.');
            header('Location: /auth/login');
            exit;
        }

        $profile = KakaoAuthService::getUserProfile($tokenData['access_token']);
        if (!$profile) {
            Session::setFlash('error', '카카오 사용자 정보를 가져오지 못했습니다.');
            header('Location: /auth/login');
            exit;
        }

        $isFirstLogin = (Member::findByKakaoId((string)$profile['id']) === null);

        // Save or update member in database
        $member = Member::createOrUpdateKakao($profile);
        Auth::loginMember($member);
        Session::set('kakao_access_token', $tokenData['access_token']);

        // 최초 로그인 시 자동 환영 메시지 발송
        if ($isFirstLogin) {
            \App\Services\KakaoNotificationService::sendWelcomeMessage($member, $tokenData['access_token']);
        }

        $redirect = Session::get('auth_redirect_after_login', '/community');
        Session::remove('auth_redirect_after_login');

        // 관리자 권한 확인 및 관리자 세션 자동 발급
        if (Auth::isMemberAdmin($member) || str_starts_with((string)$redirect, '/admin')) {
            Auth::loginAdminFromMember($member);
            Session::setFlash('success', "{$member['nickname']} 관리자님, 카카오 간편 로그인으로 접속되었습니다! 🌿");
            header("Location: " . (str_starts_with((string)$redirect, '/admin') ? $redirect : '/admin'));
            exit;
        }

        Session::setFlash('success', "{$member['nickname']} 성도님, 푸른나무 나눔터에 오신 것을 환영합니다! 🌿");
        header("Location: {$redirect}");
        exit;
    }

    /**
     * 로컬 개발/테스트용 원클릭 시뮬레이션 로그인 (카카오 API 키가 등록되지 않았을 때도 즉시 테스트 가능)
     */
    public function mockLogin(): void
    {
        $mockId = $_GET['mock_id'] ?? 'mock_pastor';
        $name = $_GET['name'] ?? '담임목사 (최고관리자)';
        $role = $_GET['role'] ?? '담임목사 (최고관리자)';

        $mockProfile = [
            'id' => $mockId,
            'nickname' => $name,
            'profile_image' => '/public/assets/images/logo.png',
            'email' => "leeshkr@kakao.com",
        ];

        $member = Member::createOrUpdateKakao($mockProfile);
        Member::updateRole((int)$member['id'], $role);
        $member = Member::find((int)$member['id']);

        Auth::loginMember($member);

        $redirect = Session::get('auth_redirect_after_login', '/admin');
        Session::remove('auth_redirect_after_login');

        if (Auth::isMemberAdmin($member) || str_starts_with((string)$redirect, '/admin')) {
            Auth::loginAdminFromMember($member);
            Session::setFlash('success', "{$member['nickname']} 관리자님으로 카카오 로그인되었습니다! 🌿");
            header("Location: /admin");
            exit;
        }

        Session::setFlash('success', "{$member['nickname']}님으로 로그인되었습니다! 🌿");
        header("Location: {$redirect}");
        exit;
    }

    public function profile(): void
    {
        Auth::requireMember();

        $member = Member::find((int)Auth::memberId());

        View::render('auth/profile', [
            'title' => '내 프로필 및 알림 설정 - 푸른나무교회',
            'member' => $member,
        ]);
    }

    public function saveProfile(): void
    {
        Auth::requireMember();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /auth/profile');
            exit;
        }

        $name = trim((string)($_POST['name'] ?? ''));
        $nickname = trim((string)($_POST['nickname'] ?? ''));
        $phone = trim((string)($_POST['phone'] ?? ''));
        $notifyKakao = isset($_POST['notify_kakao']) ? 1 : 0;
        $memberId = (int)Auth::memberId();

        if (empty($name)) {
            Session::setFlash('error', '성함(실명)을 입력해 주세요.');
            header('Location: /auth/profile');
            exit;
        }

        if (empty($nickname)) {
            Session::setFlash('error', '활동 닉네임을 입력해 주세요.');
            header('Location: /auth/profile');
            exit;
        }

        Member::updateProfile($memberId, $name, $nickname, $phone ?: null, $notifyKakao);
        $updated = Member::find($memberId);
        Auth::loginMember($updated);

        Session::setFlash('success', '성도 정보가 성공적으로 저장되었습니다. 🌿');
        header('Location: /auth/profile');
        exit;
    }

    public function logout(): void
    {
        Auth::logoutMember();
        Session::setFlash('info', '로그아웃되었습니다.');
        header('Location: /community');
        exit;
    }
}
