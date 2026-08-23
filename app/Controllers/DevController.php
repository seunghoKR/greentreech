<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Session;

class DevController
{
    /**
     * 개발자 권한 시뮬레이터 - 5대 권한 그룹 및 부관리자 프리셋 전환 엔드포인트
     */
    public function switchRole(): void
    {
        $role = trim((string)($_GET['role'] ?? 'guest'));
        $redirect = !empty($_GET['redirect']) ? (string)$_GET['redirect'] : null;

        Session::start();

        switch ($role) {
            case 'guest':
                // 1. 비로그인 (Guest)
                Auth::logout();
                Session::setFlash('info', '👤 [1. 비로그인] 상태로 전환되었습니다.');
                $defaultRedirect = '/';
                break;

            case 'unverified':
                // 2. 인증전로그인 (일반교우 - 카카오 가입 직후 승인 대기 상태)
                Auth::logout();
                $unverifiedMember = [
                    'id' => 9991,
                    'kakao_id' => 'kakao_unverified_9991',
                    'name' => '김은혜',
                    'nickname' => '은혜새가족',
                    'email' => 'eunhye@example.com',
                    'phone' => '010-1234-5678',
                    'role' => '일반교우',
                    'profile_image' => 'https://api.dicebear.com/7.x/bottts/svg?seed=Eunhye',
                    'notify_kakao' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                Auth::loginMember($unverifiedMember);
                Session::setFlash('info', '⏳ [2. 인증전로그인 (일반교우)] 상태로 전환되었습니다. (나눔터 글쓰기 승인 대기 상태)');
                $defaultRedirect = '/community';
                break;

            case 'member':
                // 3. 푸른나무가족 (나눔터 글/댓글 작성 승인 정회원)
                Auth::logout();
                $verifiedMember = [
                    'id' => 9992,
                    'kakao_id' => 'kakao_member_9992',
                    'name' => '이믿음',
                    'nickname' => '믿음나무',
                    'email' => 'faith@example.com',
                    'phone' => '010-8765-4321',
                    'role' => '푸른나무가족',
                    'profile_image' => 'https://api.dicebear.com/7.x/bottts/svg?seed=Faith',
                    'notify_kakao' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                Auth::loginMember($verifiedMember);
                Session::setFlash('success', '🌿 [3. 푸른나무가족] 상태로 전환되었습니다. (나눔터 자유 소통 가능)');
                $defaultRedirect = '/community';
                break;

            case 'admin_media':
                // 4-A. 관리자 - 영상분류/관리 & 사진첩 관리자
                Auth::logout();
                $adminUser = [
                    'id' => 9981,
                    'username' => 'manager_media',
                    'name' => '박영상 (미디어사역)',
                    'role' => '부관리자 (사역담당)',
                    'permissions' => ['sermons', 'gallery'],
                    'login_type' => 'id_pw',
                ];
                Session::set('admin_user', $adminUser);
                Session::setFlash('success', '🎬 [4-A. 미디어 관리자] 권한으로 전환되었습니다. (유튜브 영상분류 & 사진첩 관리 가능)');
                $defaultRedirect = '/admin';
                break;

            case 'admin_notices':
            case 'admin_bulletin':
                // 4-B. 관리자 - 알리는소식 관리자
                Auth::logout();
                $adminUser = [
                    'id' => 9982,
                    'username' => 'manager_notices',
                    'name' => '최소식 (소식사역)',
                    'role' => '부관리자 (사역담당)',
                    'permissions' => ['notices'],
                    'login_type' => 'id_pw',
                ];
                Session::set('admin_user', $adminUser);
                Session::setFlash('success', '📋 [4-B. 알리는 소식 관리자] 권한으로 전환되었습니다. (교회 공지 및 소식 관리 가능)');
                $defaultRedirect = '/admin';
                break;

            case 'admin_community':
                // 4-C. 관리자 - 나눔터 & 성도회원 관리자
                Auth::logout();
                $adminUser = [
                    'id' => 9983,
                    'username' => 'manager_community',
                    'name' => '정소통 (나눔터관리)',
                    'role' => '부관리자 (사역담당)',
                    'permissions' => ['community', 'members'],
                    'login_type' => 'id_pw',
                ];
                Session::set('admin_user', $adminUser);
                Session::setFlash('success', '💬 [4-C. 나눔터/성도 관리자] 권한으로 전환되었습니다. (나눔터 모니터링 & 성도승인 관리 가능)');
                $defaultRedirect = '/admin';
                break;

            case 'admin_inquiry':
                // 4-D. 관리자 - 새가족 & 기도접수 관리자
                Auth::logout();
                $adminUser = [
                    'id' => 9984,
                    'username' => 'manager_inquiry',
                    'name' => '한새가족 (새가족심방)',
                    'role' => '부관리자 (사역담당)',
                    'permissions' => ['inquiries'],
                    'login_type' => 'id_pw',
                ];
                Session::set('admin_user', $adminUser);
                Session::setFlash('success', '💌 [4-D. 새가족/기도 관리자] 권한으로 전환되었습니다. (새가족 등록 & 기도접수 관리 가능)');
                $defaultRedirect = '/admin';
                break;

            case 'pastor':
            default:
                // 5. 심민보 담임목사 (전체 대시보드 및 시스템 설정 총괄)
                Auth::logout();
                $pastorUser = [
                    'id' => 1,
                    'username' => 'admin',
                    'name' => '심민보 담임목사',
                    'role' => '담임목사',
                    'permissions' => ['all'],
                    'login_type' => 'id_pw',
                ];
                Session::set('admin_user', $pastorUser);
                Session::setFlash('success', '👑 [5. 심민보 담임목사] 권한으로 전환되었습니다. (모든 대시보드 및 시스템 설정 총괄)');
                $defaultRedirect = '/admin';
                break;
        }

        $target = $redirect ?: $defaultRedirect;
        header("Location: {$target}");
        exit;
    }
}
