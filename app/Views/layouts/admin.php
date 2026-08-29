<!DOCTYPE html>
<html lang="ko" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? '관리자 대시보드 - 푸른나무교회') ?></title>
    
    <link rel="icon" type="image/png" href="/public/assets/images/logo.png">
    
    <!-- Pretendard & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#154212',
                        'primary-dark': '#0d2b0b',
                        'primary-light': '#2d5a27',
                        secondary: '#486730',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Pretendard', sans-serif; }
    </style>
</head>
<body class="min-h-full flex flex-col antialiased text-gray-800">

    <!-- Top Admin Header Bar -->
    <header class="bg-primary text-white shadow-md sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="/admin" class="flex items-center gap-2 font-bold text-lg tracking-tight">
                    <img src="/public/assets/images/logo.png" alt="Logo" class="w-8 h-8 rounded-full bg-white p-0.5">
                    <span>푸른나무교회 관리자</span>
                </a>
                <div class="hidden sm:flex items-center gap-1.5 bg-white/15 px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-sm">
                    <span class="text-white">v2.6.0</span>
                    <span class="text-white/40">|</span>
                    <span class="text-emerald-200">최종 업데이트: 2026.08.29</span>
                </div>
            </div>

            <div class="flex items-center gap-4 text-xs font-semibold">
                <a href="/" target="_blank" class="hover:text-primary-100 flex items-center gap-1 bg-white/10 px-3 py-1.5 rounded-lg hover:bg-white/20 transition-colors">
                    <i class="fas fa-external-link-alt text-[10px]"></i> 홈페이지 보기
                </a>
                <a href="/admin/password" class="hover:text-primary-100 flex items-center gap-1 transition-colors">
                    <i class="fas fa-key text-[10px]"></i> 비밀번호 변경
                </a>
                <a href="/admin/logout" class="text-red-300 hover:text-red-200 flex items-center gap-1 transition-colors">
                    <i class="fas fa-sign-out-alt"></i> 로그아웃
                </a>
            </div>
        </div>
    </header>

    <div class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Flash Alert -->
        <?php if (!empty($flashSuccess)): ?>
        <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-2xl flex items-center gap-2 text-sm shadow-sm">
            <i class="fas fa-check-circle text-green-600"></i>
            <span><?= e($flashSuccess) ?></span>
        </div>
        <?php endif; ?>

        <?php if (!empty($flashError)): ?>
        <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-2xl flex items-center gap-2 text-sm shadow-sm">
            <i class="fas fa-exclamation-circle text-red-600"></i>
            <span><?= e($flashError) ?></span>
        </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Admin Sidebar Nav (3 cols) -->
            <aside class="lg:col-span-3">
                <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-4 space-y-1 sticky top-24">
                    
                    <?php 
                        $curAdmin = \App\Core\Auth::user(); 
                        $role = $curAdmin['role'] ?? '';
                        $adminEmail = (string)($curAdmin['username'] ?? '');
                        $isSuperAdmin = ($role === '담임목사' || $role === '담임목사 (최고관리자)' || $role === '사이트 개발자 (최고관리자)' || (int)($curAdmin['id'] ?? 0) === 1);
                        $isDeveloper = ($role === '사이트 개발자 (최고관리자)' || $adminEmail === 'leeshkr@kakao.com' || str_contains($adminEmail, 'leeshkr') || str_contains($adminEmail, 'nurioh'));
                    ?>

                    <a href="/admin" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'dashboard' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-th-large w-5 text-center"></i> 대시보드
                    </a>

                    <a href="/admin/guide" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'guide' ? 'bg-amber-600 text-white shadow-sm' : 'text-amber-800 bg-amber-50 hover:bg-amber-100' ?>">
                        <i class="fas fa-book-open w-5 text-center text-amber-600"></i> 홈페이지 사용 설명서
                    </a>

                    <!-- 주일예배 & 주보 기획 (담임목사 전용) -->
                    <?php if ($isSuperAdmin): ?>
                    <a href="/admin/bulletin-settings" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'bulletin_settings' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-clipboard-list text-green-700 w-5 text-center"></i> 주일예배 & 온라인 주보 기획
                    </a>
                    <a href="/admin/worship-servants" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'worship_servants' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-hands-holding-child text-emerald-600 w-5 text-center"></i> 예배 순서 섬김이 (4주 관리)
                    </a>
                    <?php endif; ?>

                    <!-- 유튜브 영상 분류 및 설교 관리 -->
                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'sermons')): ?>
                    <a href="/admin/sermons" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'sermons' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fab fa-youtube text-red-500 w-5 text-center text-base"></i> 유튜브 영상 분류 & 관리
                    </a>
                    <?php endif; ?>

                    <!-- 알리는 소식 -->
                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'notices')): ?>
                    <a href="/admin/notices" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'notices' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-bullhorn w-5 text-center"></i> 알리는 소식 관리
                    </a>
                    <?php endif; ?>

                    <!-- 사진첩 및 캘리 -->
                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'gallery')): ?>
                    <a href="/admin/gallery" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'gallery' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-images w-5 text-center"></i> 사진첩 / 캘리 관리
                    </a>
                    <?php endif; ?>

                    <!-- 새가족 및 기도 -->
                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'inquiries')): ?>
                    <a href="/admin/inquiries" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'inquiries' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-envelope-open-text w-5 text-center"></i> 새가족 / 기도 접수
                    </a>
                    <?php endif; ?>

                    <!-- 커뮤니티 & 성도 -->
                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'members') || \App\Models\Admin::hasPermission($curAdmin, 'community')): ?>
                    <div class="pt-2 pb-1 px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                        성도 & 커뮤니티
                    </div>
                    <?php endif; ?>

                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'members')): ?>
                    <a href="/admin/members" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'members' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-user-friends w-5 text-center"></i> 성도 회원 관리
                    </a>
                    <?php endif; ?>

                    <?php if ($isSuperAdmin || \App\Models\Admin::hasPermission($curAdmin, 'community')): ?>
                    <a href="/admin/community" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'community' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-comments w-5 text-center"></i> 나눔터 게시글 관리
                    </a>
                    <?php endif; ?>

                    <!-- 담임목사 전용 시스템 관리 -->
                    <?php if ($isSuperAdmin): ?>
                    <div class="pt-2 pb-1 px-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                        담임목사 전용 관리
                    </div>

                    <a href="/admin/admins" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'admins' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-users-gear text-blue-600 w-5 text-center"></i> 관리자/사역자 권한
                    </a>

                    <a href="/admin/hero" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'hero_settings' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-image text-emerald-600 w-5 text-center"></i> 메인 배너/상단 관리
                    </a>

                    <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'settings' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-sliders-h w-5 text-center"></i> 사이트 기본정보
                    </a>

                    <a href="/admin/notifications" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'notifications' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-bell text-amber-600 w-5 text-center"></i> 알림 발송 내역
                    </a>
                    <?php endif; ?>

                    <!-- 개발자 전용 API 설정 -->
                    <?php if ($isDeveloper): ?>
                    <a href="/admin/kakao" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-bold transition-all <?= ($adminNav ?? '') === 'kakao_settings' ? 'bg-primary text-white shadow-sm' : 'text-gray-700 hover:bg-gray-100' ?>">
                        <i class="fas fa-code text-amber-500 w-5 text-center"></i> 카카오 API 설정 (개발자)
                    </a>
                    <?php endif; ?>

                </div>
            </aside>

            <!-- Right Main Content Area (9 cols) -->
            <main class="lg:col-span-9">
                <?= $content ?>
            </main>

        </div>
    </div>

    <?php include __DIR__ . '/role_simulator.php'; ?>
</body>
</html>
