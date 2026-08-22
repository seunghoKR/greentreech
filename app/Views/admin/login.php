<!DOCTYPE html>
<html lang="ko" class="h-full bg-surface-container-low">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? '관리자 로그인 - 푸른나무교회') ?></title>
    <link rel="icon" type="image/png" href="/public/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#154212',
                        'primary-container': '#2d5a27',
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
<body class="h-full flex items-center justify-center p-4 bg-[#f4f7f3]">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10 text-center">
        
        <!-- Logo & Title -->
        <div class="mb-6">
            <div class="w-16 h-16 mx-auto rounded-3xl bg-green-50 flex items-center justify-center p-2 mb-3 shadow-sm border border-green-100">
                <img src="/public/assets/images/logo.png" alt="Logo" class="w-full h-full object-contain">
            </div>
            <h1 class="font-bold text-2xl text-gray-900">푸른나무교회 관리자</h1>
            <p class="text-xs text-gray-500 mt-1">시스템 관리를 위해 로그인해 주세요</p>
        </div>

        <!-- Flash Alert -->
        <?php if (!empty($flashError)): ?>
        <div class="mb-5 bg-red-50 text-red-700 text-xs font-semibold px-4 py-3 rounded-2xl border border-red-100 flex items-center gap-2 text-left">
            <i class="fas fa-exclamation-circle text-red-500 shrink-0"></i>
            <span><?= e($flashError) ?></span>
        </div>
        <?php endif; ?>

        <?php if (!empty($flashSuccess)): ?>
        <div class="mb-5 bg-green-50 text-green-700 text-xs font-semibold px-4 py-3 rounded-2xl border border-green-100 flex items-center gap-2 text-left">
            <i class="fas fa-check-circle text-green-500 shrink-0"></i>
            <span><?= e($flashSuccess) ?></span>
        </div>
        <?php endif; ?>

        <!-- [PRIMARY]: 카카오 1초 간편 로그인 -->
        <div class="mb-6">
            <?php if (!empty($hasKakaoApiKey)): ?>
            <a href="<?= e($kakaoLoginUrl) ?>" class="w-full flex items-center justify-center gap-2.5 py-3.5 px-4 bg-[#FEE500] hover:bg-[#FDD835] text-[#191919] rounded-2xl font-bold text-sm shadow-sm transition-all hover:scale-[1.01] active:scale-[0.99]">
                <i class="fas fa-comment text-lg text-[#191919]"></i>
                <span>카카오로 1초 간편 로그인</span>
            </a>
            <?php else: ?>
            <!-- Kakao Ready / One-Click Fast Admin Mode -->
            <a href="/auth/mock?mock_id=mock_pastor&name=<?= urlencode('담임목사 (최고관리자)') ?>&role=<?= urlencode('담임목사 (최고관리자)') ?>" class="w-full flex items-center justify-center gap-2.5 py-3.5 px-4 bg-[#FEE500] hover:bg-[#FDD835] text-[#191919] rounded-2xl font-bold text-sm shadow-sm transition-all hover:scale-[1.01] active:scale-[0.99]">
                <i class="fas fa-comment text-lg text-[#191919]"></i>
                <span>카카오로 1초 간편 로그인</span>
            </a>
            <?php endif; ?>
            <p class="text-[11px] text-gray-400 mt-2 font-medium">카카오 계정에 등록된 관리자/목회자 권한으로 즉시 접속합니다.</p>
        </div>

        <!-- Divider -->
        <div class="relative flex py-2 items-center mb-5">
            <div class="flex-grow border-t border-gray-200"></div>
            <span class="flex-shrink mx-3 text-xs text-gray-400 font-semibold uppercase tracking-wider">또는 아이디/비밀번호</span>
            <div class="flex-grow border-t border-gray-200"></div>
        </div>

        <!-- [FALLBACK]: 아이디/비밀번호 비상 로그인 Form -->
        <form action="/admin/login" method="POST" class="space-y-3.5 text-left">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

            <div>
                <label for="username" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">아이디</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3.5 top-3.5 text-gray-400 text-sm"></i>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required 
                        placeholder="아이디 또는 이메일 입력" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary focus:border-primary bg-gray-50/50 focus:bg-white transition-colors">
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">비밀번호</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3.5 top-3.5 text-gray-400 text-sm"></i>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        placeholder="비밀번호 입력" 
                        class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary focus:border-primary bg-gray-50/50 focus:bg-white transition-colors">
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-3 bg-primary hover:bg-primary-container text-white rounded-2xl font-bold text-xs sm:text-sm shadow-md transition-all">
                    아이디로 로그인
                </button>
            </div>
        </form>

        <div class="mt-6 pt-5 border-t border-gray-100 text-xs text-gray-400 flex items-center justify-between">
            <a href="/" class="text-primary hover:underline font-semibold flex items-center gap-1">
                <i class="fas fa-arrow-left text-[10px]"></i> 홈페이지
            </a>
            <span class="text-[11px]">안전한 푸른나무 보안 접속 🔒</span>
        </div>

    </div>

</body>
</html>
