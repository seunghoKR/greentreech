<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Core\Auth;
use App\Core\Session;
use App\Core\Database;
use App\Models\Setting;
use App\Models\Sermon;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Inquiry;
use App\Models\Admin;
use App\Models\Member;
use App\Models\CommunityPost;
use App\Models\NotificationLog;

class AdminController
{
    // ==========================================
    // 1. Authentication
    // ==========================================
    public function login(): void
    {
        if (Auth::check()) {
            header('Location: /admin');
            exit;
        }

        Session::set('auth_redirect_after_login', '/admin');
        $kakaoLoginUrl = \App\Services\KakaoAuthService::getLoginUrl();
        $hasKakaoApiKey = !empty(\App\Services\KakaoAuthService::getRestApiKey());

        View::render('admin/login', [
            'title' => '관리자 로그인 - 푸른나무교회',
            'kakaoLoginUrl' => $kakaoLoginUrl,
            'hasKakaoApiKey' => $hasKakaoApiKey,
            'csrfToken' => Session::getCsrfToken(),
            'flashError' => Session::getFlash('error'),
            'flashSuccess' => Session::getFlash('success'),
        ], '');
    }

    public function doLogin(): void
    {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '세션이 만료되었습니다. 다시 로그인해 주세요.');
            header('Location: /admin/login');
            exit;
        }

        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if (Auth::login($username, $password)) {
            Session::setFlash('success', '관리자로 로그인되었습니다.');
            header('Location: /admin');
            exit;
        }

        Session::setFlash('error', '아이디 또는 비밀번호가 올바르지 않습니다.');
        header('Location: /admin/login');
        exit;
    }

    public function logout(): void
    {
        Auth::logout();
        Session::setFlash('success', '안전하게 로그아웃되었습니다. 다시 접속하시려면 로그인해 주세요. 🔒');
        header('Location: /admin/login');
        exit;
    }

    // ==========================================
    // 2. Dashboard
    // ==========================================
    public function dashboard(): void
    {
        Auth::requireAuth();

        $pendingInquiriesCount = Inquiry::getPendingCount();
        $pendingMembersCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `members` WHERE `role` = '일반교우'")['c'] ?? 0);
        $todayCommunityCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `community_posts` WHERE DATE(`created_at`) = CURDATE()")['c'] ?? 0);

        $stats = [
            'pendingInquiries' => $pendingInquiriesCount,
            'pendingMembers' => $pendingMembersCount,
            'todayCommunity' => $todayCommunityCount,
            'totalMembers' => Member::getTotalMemberCount(),
            'totalSermons' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `sermons` WHERE `category` != '말씀쇼츠' OR `category` IS NULL")['c'] ?? 0),
            'totalShorts' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `sermons` WHERE `category` = '말씀쇼츠' OR `video_type` = 'shorts'")['c'] ?? 0),
            'totalGallery' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `gallery`")['c'] ?? 0),
            'totalNotices' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `notices`")['c'] ?? 0),
            'totalBulletins' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `notices` WHERE `category` = '주보'")['c'] ?? 0),
            'totalInquiries' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `inquiries`")['c'] ?? 0),
            'totalNotifications' => (int)(Database::fetchOne("SELECT COUNT(*) as c FROM `notification_logs`")['c'] ?? 0),
        ];

        $recentInquiries = Inquiry::getPaginated(1, 5)['items'];
        $recentCommunity = CommunityPost::getPaginated(1, 5)['items'];
        $recentNotifications = NotificationLog::getLatest(5);
        $lastSync = Setting::get('youtube_last_sync', '');
        $liveStreamActive = (Setting::get('live_stream_active', '0') === '1');

        View::render('admin/dashboard', [
            'title' => '목회 관리자 올인원 대시보드 - 푸른나무교회',
            'adminNav' => 'dashboard',
            'stats' => $stats,
            'recentInquiries' => $recentInquiries,
            'recentCommunity' => $recentCommunity,
            'recentNotifications' => $recentNotifications,
            'lastSync' => $lastSync,
            'liveStreamActive' => $liveStreamActive,
        ], 'layouts/admin');
    }

    public function toggleLiveStream(): void
    {
        Auth::requireAuth();

        $current = Setting::get('live_stream_active', '0');
        $newVal = ($current === '1') ? '0' : '1';
        Setting::update('live_stream_active', $newVal);

        $msg = ($newVal === '1') ? '🔴 주일예배 실시간 생중계 띠배너가 활성화되었습니다!' : '주일예배 실시간 띠배너가 비활성화되었습니다.';
        Session::setFlash('success', $msg);

        header('Location: /admin');
        exit;
    }

    public function guide(): void
    {
        Auth::requireAuth();

        View::render('admin/guide', [
            'title' => '홈페이지 사용 설명서 - 푸른나무교회',
            'adminNav' => 'guide',
        ], 'layouts/admin');
    }

    // ==========================================
    // 3. Site Settings
    // ==========================================
    public function settings(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $settings = Setting::getAllAsMap();

        View::render('admin/settings', [
            'title' => '사이트 기본정보 관리 - 푸른나무교회',
            'adminNav' => 'settings',
            'settings' => $settings,
        ], 'layouts/admin');
    }

    public function saveSettings(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/settings');
            exit;
        }

        $fields = [
            'site_name', 'pastor_name', 'phone', 'email', 'address',
            'worship_sunday', 'worship_study', 'main_slogan',
            'naver_map_url', 'google_map_embed', 'kakao_map_key'
        ];

        $data = [];
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $data[$field] = trim((string)$_POST[$field]);
            }
        }

        Setting::updateMultiple($data);
        Session::setFlash('success', '사이트 기본 정보가 저장되었습니다.');
        header('Location: /admin/settings');
        exit;
    }

    // ==========================================
    // 3-1. Main Hero Banner Management
    // ==========================================
    public function hero(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $settings = Setting::getAllAsMap();

        View::render('admin/hero', [
            'title' => '랜딩페이지 상단 배너 관리 - 푸른나무교회',
            'adminNav' => 'hero_settings',
            'settings' => $settings,
        ], 'layouts/admin');
    }

    public function saveHero(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/hero');
            exit;
        }

        $fields = [
            'hero_mode',
            'hero_badge',
            'hero_title',
            'hero_highlight_text',
            'hero_title_suffix',
            'hero_subtitle',
            'hero_btn1_text',
            'hero_btn1_url',
            'hero_btn2_text',
            'hero_btn2_url',
            'hero_image_desktop',
            'hero_image_mobile',
            'hero_image_link',
            'hero_image_alt',
        ];

        $data = [];
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $data[$field] = trim((string)$_POST[$field]);
            }
        }

        // Targets
        $data['hero_btn1_target'] = !empty($_POST['hero_btn1_target']) ? '_blank' : '_self';
        $data['hero_btn2_target'] = !empty($_POST['hero_btn2_target']) ? '_blank' : '_self';
        $data['hero_image_target'] = !empty($_POST['hero_image_target']) ? '_blank' : '_self';

        // Upload directory
        $uploadDir = dirname(__DIR__, 2) . '/public/uploads/banners';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Handle Desktop Image File Upload
        if (!empty($_FILES['hero_image_desktop_file']['name']) && $_FILES['hero_image_desktop_file']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['hero_image_desktop_file']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true)) {
                $newFilename = 'banner_desktop_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                $destPath = $uploadDir . '/' . $newFilename;
                if (move_uploaded_file($_FILES['hero_image_desktop_file']['tmp_name'], $destPath)) {
                    $data['hero_image_desktop'] = '/public/uploads/banners/' . $newFilename;
                }
            }
        }

        // Handle Mobile Image File Upload
        if (!empty($_FILES['hero_image_mobile_file']['name']) && $_FILES['hero_image_mobile_file']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['hero_image_mobile_file']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true)) {
                $newFilename = 'banner_mobile_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
                $destPath = $uploadDir . '/' . $newFilename;
                if (move_uploaded_file($_FILES['hero_image_mobile_file']['tmp_name'], $destPath)) {
                    $data['hero_image_mobile'] = '/public/uploads/banners/' . $newFilename;
                }
            }
        }

        Setting::updateMultiple($data);
        Session::setFlash('success', '랜딩페이지 상단 배너 설정이 실시간으로 저장 및 반영되었습니다!');
        header('Location: /admin/hero');
        exit;
    }

    // ==========================================
    // 4. Kakao API & Notification Settings (사이트 개발자 전용)
    // ==========================================
    public function kakaoSettings(): void
    {
        Auth::requireAuth();
        $this->requireDeveloper();

        $settings = Setting::getAllAsMap();

        View::render('admin/kakao_settings', [
            'title' => '카카오 로그인 & 알림톡 설정 - 푸른나무교회',
            'adminNav' => 'kakao_settings',
            'settings' => $settings,
        ], 'layouts/admin');
    }

    public function saveKakaoSettings(): void
    {
        Auth::requireAuth();
        $this->requireDeveloper();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/kakao');
            exit;
        }

        $fields = ['kakao_rest_api_key', 'kakao_client_secret', 'kakao_redirect_uri', 'kakao_admin_key'];
        $data = [];
        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                $data[$field] = trim((string)$_POST[$field]);
            }
        }

        Setting::updateMultiple($data);
        Session::setFlash('success', '카카오 API 설정이 저장되었습니다.');
        header('Location: /admin/kakao');
        exit;
    }

    // ==========================================
    // 5. Member Management
    // ==========================================
    public function members(): void
    {
        Auth::requireAuth();
        $this->requirePermission('members');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $pagination = Member::getPaginated($page, 15, $keyword);

        View::render('admin/members', [
            'title' => '성도 회원 관리 - 푸른나무교회',
            'adminNav' => 'members',
            'pagination' => $pagination,
            'keyword' => $keyword,
        ], 'layouts/admin');
    }

    public function updateMemberRole(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('members');

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/members');
            exit;
        }

        $role = trim((string)($_POST['role'] ?? '푸른나무가족'));
        Member::updateRole((int)$id, $role);

        Session::setFlash('success', '회원 직분이 성공적으로 변경되었습니다.');
        header('Location: /admin/members');
        exit;
    }

    public function memberSave(): void
    {
        Auth::requireAuth();
        $this->requirePermission('members');

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/members');
            exit;
        }

        $id = (int)($_POST['id'] ?? 0);
        $name = trim((string)($_POST['name'] ?? ''));
        $nickname = trim((string)($_POST['nickname'] ?? ''));
        $phone = trim((string)($_POST['phone'] ?? ''));
        $email = trim((string)($_POST['email'] ?? ''));
        $role = trim((string)($_POST['role'] ?? '푸른나무가족'));
        $notifyKakao = isset($_POST['notify_kakao']) ? 1 : 0;

        if ($id <= 0 || empty($name) || empty($nickname)) {
            Session::setFlash('error', '필수 회원 정보(성함 및 닉네임)가 누락되었습니다.');
            header('Location: /admin/members');
            exit;
        }

        Member::adminUpdateMember($id, $name, $nickname, $phone ?: null, $email ?: null, $role, $notifyKakao);
        Session::setFlash('success', "성도 [{$name} / {$nickname}] 님의 정보가 성공적으로 수정되었습니다.");
        header('Location: /admin/members');
        exit;
    }

    public function memberDelete(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('members');

        $memberId = (int)$id;
        Member::delete($memberId);

        Session::setFlash('success', '해당 성도 회원 정보가 삭제(탈퇴) 처리되었습니다.');
        header('Location: /admin/members');
        exit;
    }

    // ==========================================
    // 6. Community Posts Management
    // ==========================================
    public function community(): void
    {
        Auth::requireAuth();
        $this->requirePermission('community');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $pagination = CommunityPost::getPaginated($page, 15, $category, $keyword);

        View::render('admin/community', [
            'title' => '나눔터 게시글 관리 - 푸른나무교회',
            'adminNav' => 'community',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => CommunityPost::getCategories(),
            'keyword' => $keyword,
        ], 'layouts/admin');
    }

    public function deleteCommunityPost(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('community');

        CommunityPost::delete((int)$id);
        Session::setFlash('success', '게시글이 삭제되었습니다.');
        header('Location: /admin/community');
        exit;
    }

    // ==========================================
    // 7. Notification Logs & Welcome Message Settings
    // ==========================================
    public function notifications(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $logs = NotificationLog::getLatest(30);
        $settings = Setting::getAllAsMap();
        $curUser = Auth::user();
        $role = $curUser['role'] ?? '';
        $email = (string)($curUser['username'] ?? '');
        $isDev = ($role === '사이트 개발자 (최고관리자)' || $email === 'leeshkr@kakao.com' || str_contains($email, 'leeshkr') || str_contains($email, 'nurioh'));

        View::render('admin/notifications', [
            'title' => '카카오톡 알림 발송 내역 & 환영 메시지 설정 - 푸른나무교회',
            'adminNav' => 'notifications',
            'logs' => $logs,
            'settings' => $settings,
            'welcomeEnabled' => ($settings['welcome_message_enabled'] ?? '1') === '1',
            'welcomeTemplate' => $settings['welcome_message_template'] ?? '',
            'isDeveloper' => $isDev,
            'csrfToken' => Session::getCsrfToken(),
            'curUser' => $curUser,
        ], 'layouts/admin');
    }

    public function saveWelcomeMessageSettings(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $csrfToken = (string)($_POST['csrf_token'] ?? '');
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '보안 토큰이 만료되었습니다. 다시 시도해 주세요.');
            header('Location: /admin/notifications');
            exit;
        }

        $enabled = isset($_POST['welcome_message_enabled']) ? '1' : '0';
        $template = trim((string)($_POST['welcome_message_template'] ?? ''));

        if (empty($template)) {
            Session::setFlash('error', '환영 메시지 문구를 입력해 주세요.');
            header('Location: /admin/notifications');
            exit;
        }

        Setting::updateMultiple([
            'welcome_message_enabled' => $enabled,
            'welcome_message_template' => $template,
        ]);

        Session::setFlash('success', '🌿 첫 로그인 성도 자동 환영 메시지 설정이 성공적으로 저장되었습니다!');
        header('Location: /admin/notifications');
        exit;
    }

    public function sendTestNotification(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $curUser = Auth::user();
        $name = $curUser['name'] ?? '관리자';
        $email = $curUser['username'] ?? '';

        $result = \App\Services\KakaoNotificationService::sendNurioTestNotification($name, $email);

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($result);
            exit;
        }

        Session::setFlash('success', "💌 관리자({$name}) 계정으로 누리오 테스트 알림을 발송/기록했습니다. 발송 로그를 확인해 보세요. ✨");
        header('Location: /admin/notifications');
        exit;
    }

    // ==========================================
    // 8. YouTube Video & Sermon Categorization Dashboard
    // ==========================================
    public function sermons(): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $pagination = Sermon::getPaginated($page, 20, $category, $keyword);
        $categoryCounts = Sermon::getCategoryCounts();
        $lastSync = Setting::get('youtube_last_sync', '');

        View::render('admin/sermons', [
            'title' => '유튜브 영상 분류 및 설교 관리 대시보드 - 푸른나무교회',
            'adminNav' => 'sermons',
            'pagination' => $pagination,
            'currentCategory' => $category,
            'categoryCounts' => $categoryCounts,
            'keyword' => $keyword,
            'lastSync' => $lastSync,
            'csrfToken' => Session::generateCsrfToken(),
        ], 'layouts/admin');
    }

    public function sermonSync(): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        try {
            $result = \App\Services\YouTubeSyncService::syncChannelVideos();
            if ($result['new'] > 0) {
                $msg = "유튜브 채널 최신 영상 동기화 완료! (신규 영상 {$result['new']}개 등록 완료 · 기존 정리된 영상 {$result['existing']}개 안전 보존)";
            } else {
                $msg = "유튜브 채널 동기화 완료! (새로 올라온 신규 영상 없음 · 기존 정리된 영상 {$result['existing']}개 안전 보존)";
            }
            Session::setFlash('success', $msg);
        } catch (\Throwable $e) {
            Session::setFlash('error', "유튜브 동기화 중 오류가 발생했습니다: " . $e->getMessage());
        }

        header('Location: /admin/sermons');
        exit;
    }

    public function sermonQuickUpdate(): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $id = (int)($_POST['id'] ?? 0);
        $category = trim((string)($_POST['category'] ?? '주일 설교'));
        $videoType = !empty($_POST['video_type']) ? trim((string)$_POST['video_type']) : null;

        if ($id > 0) {
            Sermon::updateCategory($id, $category, $videoType);
            
            // Check if AJAX request
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode(['success' => true, 'id' => $id, 'category' => $category]);
                exit;
            }

            Session::setFlash('success', "영상의 분류가 [{$category}] 로 변경되었습니다.");
        }

        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/admin/sermons'));
        exit;
    }

    public function sermonBulkCategory(): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $csrfToken = $_POST['csrf_token'] ?? '';
        $page = max(1, (int)($_POST['page'] ?? 1));
        $filterCat = trim((string)($_POST['category'] ?? '전체'));
        $kw = trim((string)($_POST['keyword'] ?? ''));
        $redirectUrl = "/admin/sermons?page={$page}&category=" . urlencode($filterCat) . (!empty($kw) ? '&keyword=' . urlencode($kw) : '');

        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header("Location: {$redirectUrl}");
            exit;
        }

        $ids = $_POST['ids'] ?? [];
        $category = trim((string)($_POST['bulk_category'] ?? ''));

        if (empty($ids) || empty($category)) {
            Session::setFlash('error', '선택된 영상이 없거나 변경할 분류를 선택하지 않았습니다.');
            header("Location: {$redirectUrl}");
            exit;
        }

        $count = Sermon::bulkUpdateCategory($ids, $category);
        Session::setFlash('success', "선택하신 {$count}개 영상의 분류가 [{$category}] 로 일괄 변경되었습니다! ⚡");
        header("Location: {$redirectUrl}");
        exit;
    }

    public function sermonCreate(): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = $_GET['category'] ?? '전체';
        $keyword = $_GET['keyword'] ?? '';

        View::render('admin/sermon_form', [
            'title' => '새 영상/설교 등록 - 푸른나무교회',
            'adminNav' => 'sermons',
            'sermon' => null,
            'returnPage' => $page,
            'returnCategory' => $category,
            'returnKeyword' => $keyword,
            'csrfToken' => Session::generateCsrfToken(),
        ], 'layouts/admin');
    }

    public function sermonEdit(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $sermon = Sermon::find((int)$id);
        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = $_GET['category'] ?? '전체';
        $keyword = $_GET['keyword'] ?? '';

        if (!$sermon) {
            Session::setFlash('error', '영상 데이터를 찾을 수 없습니다.');
            header("Location: /admin/sermons?page={$page}&category=" . urlencode($category) . (!empty($keyword) ? '&keyword=' . urlencode($keyword) : ''));
            exit;
        }

        View::render('admin/sermon_form', [
            'title' => '영상 정보 수정 - 푸른나무교회',
            'adminNav' => 'sermons',
            'sermon' => $sermon,
            'returnPage' => $page,
            'returnCategory' => $category,
            'returnKeyword' => $keyword,
            'csrfToken' => Session::generateCsrfToken(),
        ], 'layouts/admin');
    }

    public function sermonSave(): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $csrfToken = $_POST['csrf_token'] ?? '';
        $returnPage = max(1, (int)($_POST['page'] ?? 1));
        $returnCategory = trim((string)($_POST['filter_category'] ?? '전체'));
        $returnKeyword = trim((string)($_POST['keyword'] ?? ''));
        $redirectListUrl = "/admin/sermons?page={$returnPage}&category=" . urlencode($returnCategory) . (!empty($returnKeyword) ? '&keyword=' . urlencode($returnKeyword) : '');

        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header("Location: {$redirectListUrl}");
            exit;
        }

        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $data = [
            'title' => trim((string)($_POST['title'] ?? '')),
            'category' => trim((string)($_POST['category'] ?? '설교 영상')),
            'video_type' => trim((string)($_POST['video_type'] ?? 'video')),
            'preacher' => trim((string)($_POST['preacher'] ?? '심민보 목사')),
            'scripture' => trim((string)($_POST['scripture'] ?? '')),
            'sermon_date' => trim((string)($_POST['sermon_date'] ?? date('Y-m-d'))),
            'youtube_id' => trim((string)($_POST['youtube_id'] ?? '')),
            'content' => trim((string)($_POST['content'] ?? '')),
        ];

        if (empty($data['title'])) {
            Session::setFlash('error', '영상/설교 제목을 입력해 주세요.');
            header('Location: ' . ($id ? "/admin/sermons/edit/{$id}?page={$returnPage}&category=" . urlencode($returnCategory) : "/admin/sermons/create"));
            exit;
        }

        if ($id) {
            Sermon::update($id, $data);
            Session::setFlash('success', '영상 정보가 성공적으로 수정되었습니다.');
        } else {
            Sermon::create($data);
            Session::setFlash('success', '새 영상이 등록되었습니다.');
        }

        header("Location: {$redirectListUrl}");
        exit;
    }

    public function sermonDelete(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('sermons');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = $_GET['category'] ?? '전체';
        $keyword = $_GET['keyword'] ?? '';
        $redirectUrl = "/admin/sermons?page={$page}&category=" . urlencode($category) . (!empty($keyword) ? '&keyword=' . urlencode($keyword) : '');

        Sermon::delete((int)$id);
        Session::setFlash('success', '영상이 목록에서 삭제되었습니다.');
        header("Location: {$redirectUrl}");
        exit;
    }

    // ==========================================
    // 9. Gallery Management
    // ==========================================
    public function gallery(): void
    {
        Auth::requireAuth();
        $this->requirePermission('gallery');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $pagination = Gallery::getPaginated($page, 15, $category, $keyword);

        View::render('admin/gallery', [
            'title' => '사진첩 및 갤러리 관리 - 푸른나무교회',
            'adminNav' => 'gallery',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => Gallery::getCategories(),
            'keyword' => $keyword,
        ], 'layouts/admin');
    }

    public function galleryCreate(): void
    {
        Auth::requireAuth();
        $this->requirePermission('gallery');

        View::render('admin/gallery_form', [
            'title' => '새 갤러리 게시물 등록 - 푸른나무교회',
            'adminNav' => 'gallery',
            'item' => null,
            'categories' => array_filter(Gallery::getCategories(), fn($c) => $c !== '전체'),
        ], 'layouts/admin');
    }

    public function galleryEdit(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('gallery');

        $item = Gallery::find((int)$id);
        if (!$item) {
            Session::setFlash('error', '게시물을 찾을 수 없습니다.');
            header('Location: /admin/gallery');
            exit;
        }

        View::render('admin/gallery_form', [
            'title' => '갤러리 게시물 수정 - 푸른나무교회',
            'adminNav' => 'gallery',
            'item' => $item,
            'categories' => array_filter(Gallery::getCategories(), fn($c) => $c !== '전체'),
        ], 'layouts/admin');
    }

    public function gallerySave(): void
    {
        Auth::requireAuth();
        $this->requirePermission('gallery');

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/gallery');
            exit;
        }

        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $category = trim((string)($_POST['category'] ?? '사진첩'));
        $title = trim((string)($_POST['title'] ?? ''));
        $content = trim((string)($_POST['content'] ?? ''));
        $eventDate = trim((string)($_POST['event_date'] ?? date('Y-m-d')));
        $existingImages = !empty($_POST['existing_images']) ? (array)$_POST['existing_images'] : [];

        $uploadedImages = $this->handleMultipleUploads('images', 'gallery');
        $allImages = array_merge($existingImages, $uploadedImages);
        $thumbnail = !empty($allImages) ? $allImages[0] : '';

        $data = [
            'category' => $category,
            'title' => $title,
            'content' => $content,
            'event_date' => $eventDate,
            'thumbnail_url' => $thumbnail,
            'image_urls' => $allImages,
        ];

        if (empty($title)) {
            Session::setFlash('error', '제목을 입력해 주세요.');
            header('Location: ' . ($id ? "/admin/gallery/edit/{$id}" : "/admin/gallery/create"));
            exit;
        }

        if ($id) {
            Gallery::update($id, $data);
            Session::setFlash('success', '게시물이 수정되었습니다.');
        } else {
            Gallery::create($data);
            Session::setFlash('success', '새 게시물이 등록되었습니다.');
        }

        header('Location: /admin/gallery');
        exit;
    }

    public function galleryDelete(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('gallery');

        Gallery::delete((int)$id);
        Session::setFlash('success', '게시물이 삭제되었습니다.');
        header('Location: /admin/gallery');
        exit;
    }

    // ==========================================
    // 10. Notices Management
    // ==========================================
    public function notices(): void
    {
        Auth::requireAuth();
        $this->requirePermission('notices');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $pagination = Notice::getPaginated($page, 15, $category, $keyword);

        View::render('admin/notices', [
            'title' => '알리는 소식 관리 - 푸른나무교회',
            'adminNav' => 'notices',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => Notice::getCategories(),
            'keyword' => $keyword,
        ], 'layouts/admin');
    }

    public function noticeCreate(): void
    {
        Auth::requireAuth();
        $this->requirePermission('notices');

        View::render('admin/notice_form', [
            'title' => '새 소식 등록 - 푸른나무교회',
            'adminNav' => 'notices',
            'notice' => null,
            'categories' => array_filter(Notice::getCategories(), fn($c) => $c !== '전체'),
        ], 'layouts/admin');
    }

    public function noticeEdit(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('notices');

        $notice = Notice::find((int)$id);
        if (!$notice) {
            Session::setFlash('error', '소식 게시글을 찾을 수 없습니다.');
            header('Location: /admin/notices');
            exit;
        }

        View::render('admin/notice_form', [
            'title' => '알리는 소식 수정 - 푸른나무교회',
            'adminNav' => 'notices',
            'notice' => $notice,
            'categories' => array_filter(Notice::getCategories(), fn($c) => $c !== '전체'),
        ], 'layouts/admin');
    }

    public function noticeSave(): void
    {
        Auth::requireAuth();
        $this->requirePermission('notices');

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/notices');
            exit;
        }

        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $category = trim((string)($_POST['category'] ?? '공지'));
        $title = trim((string)($_POST['title'] ?? ''));
        $content = trim((string)($_POST['content'] ?? ''));
        $attachmentUrl = $_POST['existing_attachment'] ?? null;

        $newAttachment = $this->handleSingleUpload('attachment', 'notices');
        if ($newAttachment) {
            $attachmentUrl = $newAttachment;
        }

        $data = [
            'category' => $category,
            'title' => $title,
            'content' => $content,
            'attachment_url' => $attachmentUrl,
        ];

        if (empty($title) || empty($content)) {
            Session::setFlash('error', '제목과 내용을 입력해 주세요.');
            header('Location: ' . ($id ? "/admin/notices/edit/{$id}" : "/admin/notices/create"));
            exit;
        }

        if ($id) {
            Notice::update($id, $data);
            Session::setFlash('success', '게시글이 수정되었습니다.');
        } else {
            Notice::create($data);
            Session::setFlash('success', '새 게시글이 등록되었습니다.');
        }

        header('Location: /admin/notices');
        exit;
    }

    public function noticeDelete(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('notices');

        Notice::delete((int)$id);
        Session::setFlash('success', '게시글이 삭제되었습니다.');
        header('Location: /admin/notices');
        exit;
    }

    // ==========================================
    // 11. Inquiries Management
    // ==========================================
    public function inquiries(): void
    {
        Auth::requireAuth();
        $this->requirePermission('inquiries');

        $page = max(1, (int)($_GET['page'] ?? 1));
        $type = !empty($_GET['type']) ? trim((string)$_GET['type']) : '전체';
        $status = !empty($_GET['status']) ? trim((string)$_GET['status']) : '전체';
        $pagination = Inquiry::getPaginated($page, 15, $type, $status);

        View::render('admin/inquiries', [
            'title' => '새가족 및 기도/상담 접수 관리 - 푸른나무교회',
            'adminNav' => 'inquiries',
            'pagination' => $pagination,
            'type' => $type,
            'status' => $status,
            'types' => Inquiry::getTypes(),
            'statuses' => Inquiry::getStatuses(),
        ], 'layouts/admin');
    }

    public function inquiryDetail(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('inquiries');

        $inquiry = Inquiry::find((int)$id);
        if (!$inquiry) {
            Session::setFlash('error', '접수 내역을 찾을 수 없습니다.');
            header('Location: /admin/inquiries');
            exit;
        }

        View::render('admin/inquiry_detail', [
            'title' => '접수 상세 내역 - 푸른나무교회',
            'adminNav' => 'inquiries',
            'inquiry' => $inquiry,
            'statuses' => Inquiry::getStatuses(),
        ], 'layouts/admin');
    }

    public function inquiryUpdateStatus(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('inquiries');

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/inquiries');
            exit;
        }

        $status = trim((string)($_POST['status'] ?? '확인완료'));
        $adminMemo = trim((string)($_POST['admin_memo'] ?? ''));

        Inquiry::updateStatus((int)$id, $status, $adminMemo);
        Session::setFlash('success', '상태 및 관리자 메모가 저장되었습니다.');
        header("Location: /admin/inquiries/{$id}");
        exit;
    }

    public function inquiryDelete(string $id): void
    {
        Auth::requireAuth();
        $this->requirePermission('inquiries');

        Inquiry::delete((int)$id);
        Session::setFlash('success', '접수 내역이 삭제되었습니다.');
        header('Location: /admin/inquiries');
        exit;
    }

    // ==========================================
    // 12. Password Change
    // ==========================================
    public function password(): void
    {
        Auth::requireAuth();

        $curUser = Auth::user();
        $admin = Admin::findById((int)($curUser['id'] ?? 0));
        $isKakaoLogin = ($curUser['login_type'] ?? '') === 'kakao' || empty($admin['password_hash']);

        View::render('admin/password', [
            'title' => '관리자 비밀번호 설정/변경 - 푸른나무교회',
            'adminNav' => 'password',
            'isKakaoLogin' => $isKakaoLogin,
            'curUser' => $curUser,
        ], 'layouts/admin');
    }

    public function updatePassword(): void
    {
        Auth::requireAuth();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/password');
            exit;
        }

        $curUser = Auth::user();
        $admin = Admin::findById((int)($curUser['id'] ?? 0));
        $isKakaoLogin = ($curUser['login_type'] ?? '') === 'kakao' || empty($admin['password_hash']);

        $currentPassword = (string)($_POST['current_password'] ?? '');
        $newPassword = (string)($_POST['new_password'] ?? '');
        $confirmPassword = (string)($_POST['confirm_password'] ?? '');

        if (strlen($newPassword) < 6) {
            Session::setFlash('error', '새 비밀번호는 최소 6자 이상이어야 합니다.');
            header('Location: /admin/password');
            exit;
        }

        if ($newPassword !== $confirmPassword) {
            Session::setFlash('error', '새 비밀번호 확인이 일치하지 않습니다.');
            header('Location: /admin/password');
            exit;
        }

        // 일반 아이디/비번 로그인인 경우에만 기존 비밀번호 검증
        if (!$isKakaoLogin && $admin && !empty($admin['password_hash'])) {
            if (!password_verify($currentPassword, $admin['password_hash'])) {
                Session::setFlash('error', '현재 비밀번호가 올바르지 않습니다.');
                header('Location: /admin/password');
                exit;
            }
        }

        // 관리자 계정에 새 비밀번호 저장 (없으면 자동 생성/매핑)
        if ($admin) {
            Admin::updatePassword((int)$admin['id'], $newPassword);
        } else {
            // 카카오 관리자 계정이 admins 테이블에 아직 없는 경우 새로 등록
            $username = $curUser['username'] ?? 'admin';
            $name = $curUser['name'] ?? '담임목사 (최고관리자)';
            $role = $curUser['role'] ?? '담임목사 (최고관리자)';
            Admin::create($username, $newPassword, $name, $role, ['all']);
        }

        Session::setFlash('success', '관리자 비밀번호가 성공적으로 설정/변경되었습니다! 이제 아이디와 새 비밀번호로도 로그인하실 수 있습니다. 🔒✨');
        header('Location: /admin');
        exit;
    }

    // ==========================================
    // File Upload Helpers
    // ==========================================
    private function handleSingleUpload(string $inputName, string $subDir): ?string
    {
        if (empty($_FILES[$inputName]['name']) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $_FILES[$inputName];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'hwp', 'docx', 'xlsx'];

        if (!in_array($ext, $allowed, true)) {
            return null;
        }

        $uploadBase = __DIR__ . '/../../public/uploads/' . $subDir;
        if (!is_dir($uploadBase)) {
            mkdir($uploadBase, 0755, true);
        }

        $filename = uniqid('gtc_', true) . '.' . $ext;
        $dest = $uploadBase . '/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $dest)) {
            return "/public/uploads/{$subDir}/" . $filename;
        }

        return null;
    }

    private function handleMultipleUploads(string $inputName, string $subDir): array
    {
        $urls = [];
        if (empty($_FILES[$inputName]['name']) || !is_array($_FILES[$inputName]['name'])) {
            return $urls;
        }

        $uploadBase = __DIR__ . '/../../public/uploads/' . $subDir;
        if (!is_dir($uploadBase)) {
            mkdir($uploadBase, 0755, true);
        }

        $count = count($_FILES[$inputName]['name']);
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        for ($i = 0; $i < $count; $i++) {
            if ($_FILES[$inputName]['error'][$i] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES[$inputName]['name'][$i], PATHINFO_EXTENSION));
                if (in_array($ext, $allowed, true)) {
                    $filename = uniqid('gallery_', true) . '.' . $ext;
                    $dest = $uploadBase . '/' . $filename;
                    if (move_uploaded_file($_FILES[$inputName]['tmp_name'][$i], $dest)) {
                        $urls[] = "/public/uploads/{$subDir}/" . $filename;
                    }
                }
            }
        }

        return $urls;
    }

    // ==========================================
    // 10. 주일예배 & 주보 기획 관리 (담임목사 전용)
    // ==========================================
    public function bulletinSettings(): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $bulletin = \App\Services\BulletinService::generateCurrentWeekBulletin();

        View::render('admin/bulletin_settings', [
            'title' => '주일예배 & 주보 기획 - 푸른나무교회',
            'adminNav' => 'bulletin_settings',
            'bulletin' => $bulletin,
            'csrfToken' => Session::generateCsrfToken(),
        ], 'layouts/admin');
    }

    public function saveBulletinSettings(): void
    {
        Auth::requireAuth();
        $this->requirePastor();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/bulletin-settings');
            exit;
        }

        // 1. 설교 기획 저장
        $sermonPlan = [
            'title' => trim((string)($_POST['sermon_title'] ?? '')),
            'preacher' => trim((string)($_POST['sermon_preacher'] ?? '심민보 목사')),
            'scripture' => trim((string)($_POST['sermon_scripture'] ?? '')),
            'content' => trim((string)($_POST['sermon_content'] ?? '')),
        ];
        \App\Services\BulletinService::saveWeeklySermonPlan($sermonPlan);

        // 2. 예배 순서표 저장
        $orders = [];
        if (!empty($_POST['order']) && is_array($_POST['order'])) {
            foreach ($_POST['order'] as $item) {
                if (!empty($item['name'])) {
                    $contentVal = trim((string)($item['content'] ?? $item['desc'] ?? ''));
                    $orders[] = [
                        'order' => trim((string)($item['order'] ?? '')),
                        'name' => trim((string)($item['name'] ?? '')),
                        'lead' => trim((string)($item['lead'] ?? '')),
                        'content' => $contentVal,
                        'desc' => $contentVal,
                    ];
                }
            }
        }
        if (!empty($orders)) {
            \App\Services\BulletinService::saveWeeklyOrders($orders);
        }

        // 3. 주간 암송구절 저장
        $memoryVerse = [
            'verse' => trim((string)($_POST['verse_text'] ?? '')),
            'reference' => trim((string)($_POST['verse_ref'] ?? '')),
        ];
        \App\Services\BulletinService::saveMemoryVerse($memoryVerse);

        // 4. 섬김이 팀 저장
        $teams = [];
        if (!empty($_POST['teams']) && is_array($_POST['teams'])) {
            foreach ($_POST['teams'] as $role => $person) {
                $teams[trim((string)$role)] = trim((string)$person);
            }
        }
        if (!empty($teams)) {
            \App\Services\BulletinService::saveWeeklyServants($teams);
        }

        // 5. 3면 설정 (설교 메모 줄 수)
        $notesLineCount = max(4, min(15, (int)($_POST['notes_line_count'] ?? 7)));
        \App\Services\BulletinService::savePage3Info([
            'notes_line_count' => $notesLineCount,
        ]);

        // 6. 4면 설정 (교회 비전, 모임 시간표, 온라인 헌금)
        $schedules = [];
        if (!empty($_POST['schedules']) && is_array($_POST['schedules'])) {
            foreach ($_POST['schedules'] as $sch) {
                if (!empty(trim((string)($sch['name'] ?? '')))) {
                    $schedules[] = [
                        'name' => trim((string)($sch['name'] ?? '')),
                        'time' => trim((string)($sch['time'] ?? '')),
                        'place' => trim((string)($sch['place'] ?? '')),
                    ];
                }
            }
        }

        $page4Info = [
            'vision' => trim((string)($_POST['page4_vision'] ?? '')),
            'schedules' => !empty($schedules) ? $schedules : [
                ['name' => '주일 대예배', 'time' => '매주 주일 오전 11:00', 'place' => '본당 (3층)'],
                ['name' => '청년 BIBLE TIME', 'time' => '매주 주일 오후 01:30', 'place' => '소그룹실'],
                ['name' => '수요 말씀/기도회', 'time' => '매주 수요일 저녁 07:30', 'place' => '본당 / 온라인'],
                ['name' => '새벽 기도회', 'time' => '월~금 오전 06:00', 'place' => '본당'],
            ],
            'giving' => [
                'bank' => trim((string)($_POST['giving_bank'] ?? '농협')),
                'account' => trim((string)($_POST['giving_account'] ?? '351-9559-8623-03')),
                'holder' => trim((string)($_POST['giving_holder'] ?? '푸른나무교회')),
            ],
        ];
        \App\Services\BulletinService::savePage4Info($page4Info);

        // 7. 템플릿 테마 저장
        $theme = trim((string)($_POST['template_theme'] ?? 'classic'));
        \App\Services\BulletinService::saveTemplateTheme($theme);

        Session::setFlash('success', 'A5 4면 주보 기획 및 인쇄 템플릿 데이터가 성공적으로 저장되었습니다! 🖨️✨');
        header('Location: /admin/bulletin-settings');
        exit;
    }

    // ==========================================
    // 11. 관리자 및 사역자 계정 관리 (담임목사 전용)
    // ==========================================
    public function admins(): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $admins = Admin::getAll();
        $availablePerms = Admin::getAvailablePermissions();

        View::render('admin/admins', [
            'title' => '관리자 계정 관리 - 푸른나무교회',
            'adminNav' => 'admins',
            'admins' => $admins,
            'availablePerms' => $availablePerms,
        ], 'layouts/admin');
    }

    public function adminCreate(): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        View::render('admin/admin_form', [
            'title' => '새 부관리자 등록 - 푸른나무교회',
            'adminNav' => 'admins',
            'editAdmin' => null,
            'availablePerms' => Admin::getAvailablePermissions(),
            'csrfToken' => Session::generateCsrfToken(),
        ], 'layouts/admin');
    }

    public function adminEdit(string $id): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $admin = Admin::findById((int)$id);
        if (!$admin) {
            Session::setFlash('error', '해당 관리자를 찾을 수 없습니다.');
            header('Location: /admin/admins');
            exit;
        }

        View::render('admin/admin_form', [
            'title' => $admin['name'] . ' 관리자 권한 수정 - 푸른나무교회',
            'adminNav' => 'admins',
            'editAdmin' => $admin,
            'availablePerms' => Admin::getAvailablePermissions(),
            'csrfToken' => Session::generateCsrfToken(),
        ], 'layouts/admin');
    }

    public function adminSave(): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /admin/admins');
            exit;
        }

        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $name = trim((string)($_POST['name'] ?? ''));
        $role = trim((string)($_POST['role'] ?? '부관리자 (사역담당)'));
        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');
        $permissions = $_POST['permissions'] ?? [];
        if (!is_array($permissions)) $permissions = [];

        if (empty($name)) {
            Session::setFlash('error', '이름을 입력해 주세요.');
            header('Location: /admin/admins');
            exit;
        }

        if ($id) {
            // Edit
            Admin::update($id, $name, $role, $permissions, !empty($password) ? $password : null);
            Session::setFlash('success', "{$name} 관리자의 정보가 수정되었습니다.");
        } else {
            // Create
            if (empty($username) || empty($password)) {
                Session::setFlash('error', '아이디와 비밀번호를 모두 입력해 주세요.');
                header('Location: /admin/admins/create');
                exit;
            }
            if (Admin::findByUsername($username)) {
                Session::setFlash('error', '이미 사용 중인 아이디입니다.');
                header('Location: /admin/admins/create');
                exit;
            }

            Admin::create($username, $password, $name, $role, $permissions);
            Session::setFlash('success', "새 부관리자 [{$name}] 계정이 등록되었습니다.");
        }

        header('Location: /admin/admins');
        exit;
    }

    public function adminDelete(string $id): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $adminId = (int)$id;
        if ($adminId === 1) {
            Session::setFlash('error', '담임목사 최고관리자 계정은 삭제할 수 없습니다.');
            header('Location: /admin/admins');
            exit;
        }

        Admin::delete($adminId);
        Session::setFlash('success', '관리자 계정이 삭제되었습니다.');
        header('Location: /admin/admins');
        exit;
    }

    /**
     * 예배 순서 섬김이 (4주 관리 대시보드 - 담임목사 전용)
     */
    public function worshipServants(): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $scheduleWeeks = \App\Models\WorshipServant::get4WeeksSchedule();

        View::render('admin/worship_servants', [
            'title' => '예배 순서 섬김이 (4주 관리) - 푸른나무교회',
            'adminNav' => 'worship_servants',
            'scheduleWeeks' => $scheduleWeeks,
            'csrfToken' => Session::getCsrfToken(),
            'flashSuccess' => Session::getFlash('success'),
            'flashError' => Session::getFlash('error'),
        ], 'layouts/admin');
    }

    /**
     * 예배 순서 섬김이 스케줄 저장 (담임목사 전용)
     */
    public function saveWorshipServants(): void
    {
        Auth::requireLogin();
        $this->requirePastor();

        $csrfToken = (string)($_POST['csrf_token'] ?? '');
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '보안 토큰이 만료되었습니다. 다시 시도해 주세요.');
            header('Location: /admin/worship-servants');
            exit;
        }

        $schedules = $_POST['schedules'] ?? [];
        if (is_array($schedules)) {
            \App\Models\WorshipServant::saveSchedules($schedules);
            Session::setFlash('success', '4주간 예배 섬김이 스케줄이 성공적으로 저장되었습니다. (주보 및 예배순서에 즉시 반영)');
        } else {
            Session::setFlash('error', '전송된 스케줄 데이터가 올바르지 않습니다.');
        }

        header('Location: /admin/worship-servants');
        exit;
    }

    private function requirePastor(): void
    {
        $currentAdmin = Auth::user();
        $role = $currentAdmin['role'] ?? '';
        if ($role !== '담임목사 (최고관리자)' && $role !== '사이트 개발자 (최고관리자)' && (int)($currentAdmin['id'] ?? 0) !== 1) {
            Session::setFlash('error', '담임목사(최고관리자) 전용 메뉴입니다.');
            header('Location: /admin');
            exit;
        }
    }

    private function requireDeveloper(): void
    {
        $currentAdmin = Auth::user();
        $role = $currentAdmin['role'] ?? '';
        $email = (string)($currentAdmin['username'] ?? '');
        $isDev = ($role === '사이트 개발자 (최고관리자)' || $email === 'leeshkr@kakao.com' || str_contains($email, 'leeshkr') || str_contains($email, 'nurioh'));
        if (!$isDev) {
            Session::setFlash('error', '시스템 개발자 전용 설정 메뉴입니다.');
            header('Location: /admin');
            exit;
        }
    }

    private function requirePermission(string $perm): void
    {
        $currentAdmin = Auth::user();
        if (!Admin::hasPermission($currentAdmin, $perm)) {
            Session::setFlash('error', '해당 메뉴에 대한 관리 권한이 없습니다.');
            header('Location: /admin');
            exit;
        }
    }
}
