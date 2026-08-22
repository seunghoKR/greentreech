<?php
declare(strict_types=1);

/**
 * 푸른나무교회 DB 테이블 자동 생성 및 초기 데이터 설치 스크립트
 */

spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) require $file;
});

use App\Core\Database;

$statusMessage = '';
$isSuccess = false;
$error = null;

$configFile = __DIR__ . '/config/database.php';
$config = require $configFile;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chosenDriver = $_POST['driver'] ?? 'sqlite';
    
    // Update config file with chosen driver if needed
    if (in_array($chosenDriver, ['sqlite', 'mysql'], true)) {
        $config['driver'] = $chosenDriver;
        $content = "<?php\ndeclare(strict_types=1);\n\nreturn " . var_export($config, true) . ";\n";
        file_put_contents($configFile, $content);
    }

    try {
        if ($chosenDriver === 'sqlite') {
            $dir = __DIR__ . '/storage';
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $dbPath = $dir . '/database.sqlite';
            $pdo = new PDO('sqlite:' . $dbPath, null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);

            // Create SQLite Tables
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS site_settings (
                    key_name TEXT PRIMARY KEY,
                    key_value TEXT,
                    description TEXT,
                    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS admins (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    username TEXT NOT NULL UNIQUE,
                    password_hash TEXT NOT NULL,
                    name TEXT NOT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    last_login DATETIME
                );
                CREATE TABLE IF NOT EXISTS sermons (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT NOT NULL,
                    category TEXT DEFAULT '주일 설교',
                    video_type TEXT DEFAULT 'video',
                    preacher TEXT DEFAULT '심민보 목사',
                    scripture TEXT,
                    sermon_date DATE NOT NULL,
                    youtube_id TEXT,
                    content TEXT,
                    view_count INTEGER DEFAULT 0,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS gallery (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    category TEXT DEFAULT '사진첩',
                    title TEXT NOT NULL,
                    content TEXT,
                    thumbnail_url TEXT NOT NULL,
                    image_urls TEXT,
                    event_date DATE,
                    view_count INTEGER DEFAULT 0,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS notices (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    category TEXT DEFAULT '공지사항',
                    title TEXT NOT NULL,
                    content TEXT NOT NULL,
                    attachment_url TEXT,
                    view_count INTEGER DEFAULT 0,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS inquiries (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    type TEXT DEFAULT '새가족등록',
                    name TEXT NOT NULL,
                    phone TEXT NOT NULL,
                    content TEXT NOT NULL,
                    is_private INTEGER DEFAULT 1,
                    admin_memo TEXT,
                    status TEXT DEFAULT '접수',
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS members (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    kakao_id TEXT NOT NULL UNIQUE,
                    nickname TEXT NOT NULL,
                    profile_image TEXT,
                    email TEXT,
                    phone TEXT,
                    role TEXT DEFAULT '등록성도',
                    notify_kakao INTEGER DEFAULT 1,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    last_login DATETIME
                );
                CREATE TABLE IF NOT EXISTS community_posts (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    member_id INTEGER NOT NULL,
                    category TEXT DEFAULT '나눔과교제',
                    title TEXT NOT NULL,
                    content TEXT NOT NULL,
                    image_urls TEXT,
                    view_count INTEGER DEFAULT 0,
                    comment_count INTEGER DEFAULT 0,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS community_comments (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    post_id INTEGER NOT NULL,
                    member_id INTEGER NOT NULL,
                    content TEXT NOT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE IF NOT EXISTS notification_logs (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    recipient_id INTEGER,
                    type TEXT NOT NULL,
                    message TEXT NOT NULL,
                    status TEXT DEFAULT 'SUCCESS',
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );
            ");
        } else {
            // MariaDB / MySQL
            $c = $config['mysql'];
            $dsn = "mysql:host={$c['host']};port={$c['port']};dbname={$c['database']};charset={$c['charset']}";
            
            try {
                $pdo = new PDO($dsn, $c['username'], $c['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                ]);
            } catch (\PDOException $pe) {
                // If database doesn't exist, try connecting to server to create it
                try {
                    $serverPdo = new PDO("mysql:host={$c['host']};port={$c['port']};charset={$c['charset']}", $c['username'], $c['password'], [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    ]);
                    $serverPdo->exec("CREATE DATABASE IF NOT EXISTS `{$c['database']}` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                    $pdo = new PDO($dsn, $c['username'], $c['password'], [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]);
                } catch (\Throwable $t) {
                    throw $pe;
                }
            }

            $sql = file_get_contents(__DIR__ . '/schema.sql');
            $pdo->exec($sql);
        }

        // Auto Migration: Ensure columns exist in tables
        try {
            if ($chosenDriver === 'sqlite') {
                $sCols = $pdo->query("PRAGMA table_info(sermons)")->fetchAll();
                $hasCategory = false;
                $hasVideoType = false;
                foreach ($sCols as $col) {
                    if (($col['name'] ?? '') === 'category') $hasCategory = true;
                    if (($col['name'] ?? '') === 'video_type') $hasVideoType = true;
                }
                if (!$hasCategory) $pdo->exec("ALTER TABLE sermons ADD COLUMN category TEXT DEFAULT '주일 설교'");
                if (!$hasVideoType) $pdo->exec("ALTER TABLE sermons ADD COLUMN video_type TEXT DEFAULT 'video'");

                $aCols = $pdo->query("PRAGMA table_info(admins)")->fetchAll();
                $hasRole = false;
                $hasPerms = false;
                foreach ($aCols as $col) {
                    if (($col['name'] ?? '') === 'role') $hasRole = true;
                    if (($col['name'] ?? '') === 'permissions') $hasPerms = true;
                }
                if (!$hasRole) $pdo->exec("ALTER TABLE admins ADD COLUMN role TEXT DEFAULT '담임목사 (최고관리자)'");
                if (!$hasPerms) $pdo->exec("ALTER TABLE admins ADD COLUMN permissions TEXT DEFAULT '[\"all\"]'");

                $mCols = $pdo->query("PRAGMA table_info(members)")->fetchAll();
                $hasName = false;
                foreach ($mCols as $col) {
                    if (($col['name'] ?? '') === 'name') $hasName = true;
                }
                if (!$hasName) $pdo->exec("ALTER TABLE members ADD COLUMN name TEXT");
            } else {
                $pdo->exec("ALTER TABLE `sermons` ADD COLUMN IF NOT EXISTS `category` VARCHAR(50) DEFAULT '주일 설교'");
                $pdo->exec("ALTER TABLE `sermons` ADD COLUMN IF NOT EXISTS `video_type` VARCHAR(20) DEFAULT 'video'");
                $pdo->exec("ALTER TABLE `admins` ADD COLUMN IF NOT EXISTS `role` VARCHAR(50) DEFAULT '담임목사 (최고관리자)'");
                $pdo->exec("ALTER TABLE `admins` ADD COLUMN IF NOT EXISTS `permissions` TEXT NULL");
                $pdo->exec("ALTER TABLE `members` ADD COLUMN IF NOT EXISTS `name` VARCHAR(50) NULL");

                // Update default admin to Pastor
                $pdo->exec("UPDATE `admins` SET `name` = '심민보 담임목사', `role` = '담임목사 (최고관리자)', `permissions` = '[\"all\"]' WHERE `username` = 'admin'");
            }
        } catch (\Throwable $t) {}

        
        // Seed Kakao API Key
        $pdo->exec("INSERT INTO `site_settings` (`key_name`, `key_value`, `description`) 
                    VALUES ('kakao_rest_api_key', '8b820609fa278e982a52ffea4621f099', '카카오 REST API 키')
                    ON DUPLICATE KEY UPDATE `key_value` = '8b820609fa278e982a52ffea4621f099'");
        $pdo->exec("INSERT INTO `site_settings` (`key_name`, `key_value`, `description`) 
                    VALUES ('kakao_redirect_uri', 'http://greentreech.iwinv.net/auth/kakao/callback', '카카오 리다이렉트 URI')
                    ON DUPLICATE KEY UPDATE `key_value` = 'http://greentreech.iwinv.net/auth/kakao/callback'");

        // Seed Default Settings
        $cnt = $pdo->query("SELECT COUNT(*) as c FROM site_settings")->fetch()['c'] ?? 0;
        if ((int)$cnt === 0) {
            $settings = [
                ['site_name', '푸른나무교회', '교회명'],
                ['pastor_name', '심민보', '담임목사명'],
                ['phone', '010-9559-8623', '대표 연락처'],
                ['email', 'nuriohga@gmail.com', '대표 이메일'],
                ['address', '전라북도 익산시 선화로73길 25 (3층)', '교회 주소'],
                ['worship_sunday', '주일 오전 11:00', '주일예배 시간'],
                ['worship_study', '청년 BIBLE TIME / 제자훈련', '성경공부 모임'],
                ['main_slogan', '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간', '메인 슬로건'],
                ['naver_map_url', 'https://naver.me/xqb2I1g5', '네이버 지도 바로보기 URL'],
                ['google_map_embed', 'https://maps.google.com/maps?q=%EC%A0%84%EB%B6%81%20%EC%9D%B5%EC%82%B0%EC%8B%9C%20%EC%84%A0%ED%99%94%EB%A1%9C73%EA%B8%B8%2025&t=&z=17&ie=UTF8&iwloc=&output=embed', '구글 지도 임베드 URL']
            ];
            foreach ($settings as $s) {
                try {
                    $pdo->prepare("INSERT INTO site_settings (key_name, key_value, description) VALUES (?, ?, ?)")->execute($s);
                } catch (\Throwable $t) {}
            }
        }

        // Seed Admin
        $adminCnt = $pdo->query("SELECT COUNT(*) as c FROM admins")->fetch()['c'] ?? 0;
        if ((int)$adminCnt === 0) {
            $hash = password_hash('admin1234!', PASSWORD_DEFAULT);
            $pdo->prepare("INSERT INTO admins (username, password_hash, name) VALUES (?, ?, ?)")
                ->execute(['admin', $hash, '최고관리자']);
        }

        // Seed Sample Sermons
        $sermonCnt = $pdo->query("SELECT COUNT(*) as c FROM sermons")->fetch()['c'] ?? 0;
        if ((int)$sermonCnt === 0) {
            $pdo->prepare("INSERT INTO sermons (title, preacher, scripture, sermon_date, youtube_id, content, view_count) VALUES (?, ?, ?, ?, ?, ?, ?)")
                ->execute([
                    '그리스도 안에서 누리는 참된 쉼과 회복',
                    '심민보 목사',
                    '마태복음 11:28-30',
                    '2026-08-16',
                    'dQw4w9WgXcQ',
                    '수고하고 무거운 짐 진 자들아 다 내게로 오라 내가 너희를 쉬게 하리라. 주님 안에서 참된 평안을 누리는 삶에 대한 말씀입니다.',
                    42
                ]);
        }

        // Seed Sample Gallery
        $galleryCnt = $pdo->query("SELECT COUNT(*) as c FROM gallery")->fetch()['c'] ?? 0;
        if ((int)$galleryCnt === 0) {
            $pdo->prepare("INSERT INTO gallery (category, title, content, thumbnail_url, image_urls, event_date) VALUES (?, ?, ?, ?, ?, ?)")
                ->execute([
                    '사진첩',
                    '여름 성도 나눔 및 친교의 시간',
                    '함께 모여 따뜻한 교제를 나누는 감사한 주일이었습니다.',
                    '/public/assets/images/sample1.jpg',
                    '["/public/assets/images/sample1.jpg"]',
                    '2026-08-15'
                ]);
            $pdo->prepare("INSERT INTO gallery (category, title, content, thumbnail_url, image_urls, event_date) VALUES (?, ?, ?, ?, ?, ?)")
                ->execute([
                    '캘리그라피',
                    '말씀 캘리 - 여호와는 나의 목자시니',
                    '시편 23편 말씀 캘리그라피 작품입니다.',
                    '/public/assets/images/sample2.jpg',
                    '["/public/assets/images/sample2.jpg"]',
                    '2026-08-10'
                ]);
        }

        // Seed Sample Notices
        $noticeCnt = $pdo->query("SELECT COUNT(*) as c FROM notices")->fetch()['c'] ?? 0;
        if ((int)$noticeCnt === 0) {
            $pdo->prepare("INSERT INTO notices (category, title, content) VALUES (?, ?, ?)")
                ->execute(['공지사항', '2026년 하반기 청년 성경모임(BIBLE TIME) 안내', '매주 토요일 오후 2시 청년 BIBLE TIME이 진행됩니다.']);
            $pdo->prepare("INSERT INTO notices (category, title, content) VALUES (?, ?, ?)")
                ->execute(['주보', '2026년 8월 16일 주보', '주일 예배 순서 및 이번 주 교회 소식 안내입니다.']);
        }

        $isSuccess = true;
        $dbNameText = ($chosenDriver === 'sqlite') ? 'SQLite (로컬 단일 파일 DB)' : 'MariaDB / MySQL';
        $statusMessage = "축하합니다! {$dbNameText}에 모든 테이블과 초기 데이터가 완벽하게 설치되었습니다!";
    } catch (\Throwable $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>푸른나무교회 데이터베이스 설치</title>
    <link rel="icon" type="image/png" href="/public/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { font-family: 'Pretendard', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 border border-gray-100 text-center">
        
        <img src="/public/assets/images/logo.png" alt="Logo" class="w-16 h-16 mx-auto mb-4 object-contain">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">푸른나무교회</h1>
        <p class="text-xs text-gray-500 mb-6">데이터베이스 테이블 및 초기 데이터 설치</p>

        <?php if ($isSuccess): ?>
        <div class="bg-green-50 text-green-800 p-4 rounded-2xl text-xs sm:text-sm font-semibold mb-6 border border-green-200">
            <i class="fas fa-check-circle text-green-600 text-lg mr-1"></i><br>
            <?= htmlspecialchars($statusMessage) ?>
        </div>
        <div class="space-y-3">
            <a href="/" class="block w-full py-3.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl font-bold text-xs sm:text-sm shadow-md transition-all">
                <i class="fas fa-home mr-1"></i> 홈페이지 메인 바로가기
            </a>
            <a href="/admin/login" class="block w-full py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl font-bold text-xs transition-all">
                <i class="fas fa-lock mr-1"></i> 관리자 로그인 (admin / admin1234!)
            </a>
        </div>

        <?php else: ?>
            
            <?php if ($error): ?>
            <div class="bg-red-50 text-red-800 p-4 rounded-2xl text-xs font-semibold mb-6 border border-red-200 text-left">
                <strong>설치 안내:</strong><br>
                <?= htmlspecialchars($error) ?>
                <p class="mt-2 text-[11px] text-gray-600">
                    💡 MariaDB 서버가 아직 실행되지 않았더라도, 아래 <strong>[SQLite로 즉시 설치]</strong> 버튼을 누르시면 지금 바로 로컬에서 모든 기능을 완벽하게 확인하실 수 있습니다!
                </p>
            </div>
            <?php endif; ?>

            <p class="text-xs text-gray-600 mb-6 leading-relaxed">
                설치 방식을 선택하시면 테이블 자동 생성 및 초기 데이터가 1초 만에 등록됩니다.
            </p>

            <div class="space-y-3">
                <!-- Option 1: SQLite (Recommended for 1-click test) -->
                <form method="POST">
                    <input type="hidden" name="driver" value="sqlite">
                    <button type="submit" class="w-full py-4 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl font-bold text-sm shadow-md transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-bolt text-yellow-300"></i>
                        <span>SQLite로 즉시 설치 (1초 완료 · 권장)</span>
                    </button>
                </form>

                <!-- Option 2: MariaDB -->
                <form method="POST">
                    <input type="hidden" name="driver" value="mysql">
                    <button type="submit" class="w-full py-3 bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 rounded-2xl font-semibold text-xs transition-all flex items-center justify-center gap-2">
                        <i class="fas fa-database text-blue-600"></i>
                        <span>MariaDB / MySQL로 설치</span>
                    </button>
                </form>
            </div>

        <?php endif; ?>

    </div>
</body>
</html>
