<?php
declare(strict_types=1);

/**
 * 푸른나무교회 (Green Tree Church) 웹사이트 메인 진입점
 * PHP 8.4 Strict Typing, Front-Controller Architecture
 */

// 1. PHP CLI Built-in Server Support: serve existing files directly (images, css, install.php, etc.)
if (php_sapi_name() === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '';
    $file = __DIR__ . $path;
    if ($path !== '/' && file_exists($file) && !is_dir($file)) {
        return false; // Deliver file directly
    }
}

// 2. Error Reporting in development / local
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

// 2. Custom PSR-4 Style Autoloader
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Global XSS Escape Helper
if (!function_exists('e')) {
    function e(mixed $value): string {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

use App\Core\Router;
use App\Core\Session;
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\SermonController;
use App\Controllers\GalleryController;
use App\Controllers\NoticeController;
use App\Controllers\InquiryController;
use App\Controllers\AdminController;
use App\Controllers\CaptchaController;
use App\Controllers\CommunityController;
use App\Controllers\AuthController;

// 3. Start Session
Session::start();

// 4. Fallback 301 Permanent Redirects for Legacy XE URLs (Supports both Apache & PHP Built-in Server)
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$requestPath = parse_url($requestUri, PHP_URL_PATH) ?? '/';

$xeRedirects = [
    '/page_QUYQ27' => '/about',
    '/page_tYfP94' => '/pastor',
    '/board_rIml75' => '/sermons',
    '/board_eqqA48' => '/notices',
    '/board_CBHH38' => '/gallery',
    '/board_xtmO59' => '/calligraphy',
];

// Check exact or regex legacy match
foreach ($xeRedirects as $oldPattern => $newTarget) {
    if ($requestPath === $oldPattern || $requestPath === $oldPattern . '/') {
        header("Location: {$newTarget}", true, 301);
        exit;
    }
    if (preg_match('#^' . preg_quote($oldPattern, '#') . '/([0-9]+)/?$#', $requestPath, $matches)) {
        $id = $matches[1];
        header("Location: {$newTarget}/{$id}", true, 301);
        exit;
    }
}

// 5. Initialize Router & Define Routes
$router = new Router();

// --- Public Routes ---
$router->get('/', [HomeController::class, 'index']);

// About Pages
$router->get('/about', [AboutController::class, 'index']);
$router->get('/pastor', [AboutController::class, 'pastor']);
$router->get('/schedule', [AboutController::class, 'schedule']);
$router->get('/location', [AboutController::class, 'location']);
$router->get('/privacy', [HomeController::class, 'privacy']);

// Sermons
$router->get('/sermons', [SermonController::class, 'index']);
$router->get('/sermons/sync', [SermonController::class, 'sync']);
$router->get('/sermons/{id}', [SermonController::class, 'show']);

// Green Tree Media (푸른나무 영상 - 쇼츠 / 식탁교제 / 간증 / 행사)
$router->get('/media', [\App\Controllers\MediaController::class, 'index']);
$router->get('/media/sync', [\App\Controllers\MediaController::class, 'sync']);

// Gallery & Calligraphy
$router->get('/gallery', [GalleryController::class, 'index']);
$router->get('/gallery/{id}', [GalleryController::class, 'show']);
$router->get('/calligraphy', [GalleryController::class, 'calligraphy']);

// Notices & Bulletin
$router->get('/notices', [NoticeController::class, 'index']);
$router->get('/notices/{id}', [NoticeController::class, 'show']);

// Smart Bulletin (스마트 주보 & A4 인쇄/PDF)
$router->get('/bulletin', [\App\Controllers\BulletinController::class, 'index']);
$router->get('/bulletin/print', [\App\Controllers\BulletinController::class, 'print']);
$router->post('/api/ai/refine-tone', [\App\Controllers\BulletinController::class, 'refineToneApi']);

// Inquiry & Prayer Requests
$router->get('/inquiry', [InquiryController::class, 'index']);
$router->post('/inquiry', [InquiryController::class, 'submit']);
$router->get('/api/captcha/refresh', [CaptchaController::class, 'refresh']);

// --- Community (나눔터) Routes ---
$router->get('/community', [CommunityController::class, 'index']);
$router->get('/community/create', [CommunityController::class, 'create']);
$router->post('/community/save', [CommunityController::class, 'save']);
$router->get('/community/edit/{id}', [CommunityController::class, 'edit']);
$router->get('/community/delete/{id}', [CommunityController::class, 'delete']);
$router->post('/community/comment/{id}', [CommunityController::class, 'comment']);
$router->get('/community/comment/delete/{id}', [CommunityController::class, 'deleteComment']);
$router->get('/community/{id}', [CommunityController::class, 'show']);

// --- Kakao Member Auth Routes ---
$router->get('/auth/login', [AuthController::class, 'login']);
$router->get('/auth/kakao', [AuthController::class, 'kakao']);
$router->get('/auth/kakao/callback', [AuthController::class, 'callback']);
$router->get('/auth/mock', [AuthController::class, 'mockLogin']);
$router->get('/auth/profile', [AuthController::class, 'profile']);
$router->post('/auth/profile', [AuthController::class, 'saveProfile']);
$router->get('/auth/logout', [AuthController::class, 'logout']);

// --- Admin Dashboard & CMS Routes ---
$router->get('/admin/login', [AdminController::class, 'login']);
$router->post('/admin/login', [AdminController::class, 'doLogin']);
$router->get('/admin/logout', [AdminController::class, 'logout']);

$router->get('/admin', [AdminController::class, 'dashboard']);
$router->get('/admin/guide', [AdminController::class, 'guide']);
$router->get('/admin/live-toggle', [AdminController::class, 'toggleLiveStream']);
$router->get('/admin/hero', [AdminController::class, 'hero']);
$router->post('/admin/hero', [AdminController::class, 'saveHero']);
$router->get('/admin/settings', [AdminController::class, 'settings']);
$router->post('/admin/settings', [AdminController::class, 'saveSettings']);

// Admin - Members
$router->get('/admin/members', [AdminController::class, 'members']);
$router->post('/admin/members/save', [AdminController::class, 'memberSave']);
$router->post('/admin/members/{id}/role', [AdminController::class, 'updateMemberRole']);
$router->get('/admin/members/delete/{id}', [AdminController::class, 'memberDelete']);

// Admin - Community
$router->get('/admin/community', [AdminController::class, 'community']);
$router->get('/admin/community/delete/{id}', [AdminController::class, 'deleteCommunityPost']);

// Admin - Kakao & Notifications
$router->get('/admin/kakao', [AdminController::class, 'kakaoSettings']);
$router->post('/admin/kakao', [AdminController::class, 'saveKakaoSettings']);
$router->get('/admin/notifications', [AdminController::class, 'notifications']);
$router->get('/admin/notifications/test', [AdminController::class, 'sendTestNotification']);
$router->post('/admin/notifications/test', [AdminController::class, 'sendTestNotification']);

// Admin - Sermons & YouTube Video Categorizer
$router->get('/admin/sermons', [AdminController::class, 'sermons']);
$router->get('/admin/sermons/sync', [AdminController::class, 'sermonSync']);
$router->post('/admin/sermons/quick-update', [AdminController::class, 'sermonQuickUpdate']);
$router->post('/admin/sermons/bulk-category', [AdminController::class, 'sermonBulkCategory']);
$router->get('/admin/sermons/create', [AdminController::class, 'sermonCreate']);
$router->post('/admin/sermons/save', [AdminController::class, 'sermonSave']);
$router->get('/admin/sermons/edit/{id}', [AdminController::class, 'sermonEdit']);
$router->get('/admin/sermons/delete/{id}', [AdminController::class, 'sermonDelete']);

// Admin - Gallery
$router->get('/admin/gallery', [AdminController::class, 'gallery']);
$router->get('/admin/gallery/create', [AdminController::class, 'galleryCreate']);
$router->post('/admin/gallery/save', [AdminController::class, 'gallerySave']);
$router->get('/admin/gallery/edit/{id}', [AdminController::class, 'galleryEdit']);
$router->get('/admin/gallery/delete/{id}', [AdminController::class, 'galleryDelete']);

// Admin - Notices
$router->get('/admin/notices', [AdminController::class, 'notices']);
$router->get('/admin/notices/create', [AdminController::class, 'noticeCreate']);
$router->post('/admin/notices/save', [AdminController::class, 'noticeSave']);
$router->get('/admin/notices/edit/{id}', [AdminController::class, 'noticeEdit']);
$router->get('/admin/notices/delete/{id}', [AdminController::class, 'noticeDelete']);

// Admin - Inquiries
$router->get('/admin/inquiries', [AdminController::class, 'inquiries']);
$router->get('/admin/inquiries/{id}', [AdminController::class, 'inquiryDetail']);
$router->post('/admin/inquiries/{id}/status', [AdminController::class, 'inquiryUpdateStatus']);
$router->get('/admin/inquiries/delete/{id}', [AdminController::class, 'inquiryDelete']);

// Admin - Password Change
$router->get('/admin/password', [AdminController::class, 'password']);
$router->post('/admin/password', [AdminController::class, 'updatePassword']);

// Admin - Worship & Bulletin Planning
$router->get('/admin/bulletin-settings', [AdminController::class, 'bulletinSettings']);
$router->post('/admin/bulletin-settings', [AdminController::class, 'saveBulletinSettings']);

// Admin - Worship Servants (4-Week Schedule)
$router->get('/admin/worship-servants', [AdminController::class, 'worshipServants']);
$router->post('/admin/worship-servants/save', [AdminController::class, 'saveWorshipServants']);

// Admin - Multi-Admin & Staff Permissions
$router->get('/admin/admins', [AdminController::class, 'admins']);
$router->get('/admin/admins/create', [AdminController::class, 'adminCreate']);
$router->get('/admin/admins/edit/{id}', [AdminController::class, 'adminEdit']);
$router->post('/admin/admins/save', [AdminController::class, 'adminSave']);
$router->get('/admin/admins/delete/{id}', [AdminController::class, 'adminDelete']);

// 6. Dispatch Request
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$router->dispatch($requestUri, $method);
