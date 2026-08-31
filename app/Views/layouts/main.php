<!DOCTYPE html>
<html lang="ko" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? '푸른나무교회 - 지친 일상 속 작은 휴식과 참된 회복') ?></title>
    
    <!-- Meta tags for SEO & Social Sharing -->
    <meta name="description" content="<?= e($main_slogan ?? '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간 - 푸른나무교회') ?>">
    <meta property="og:title" content="<?= e($title ?? '푸른나무교회') ?>">
    <meta property="og:description" content="<?= e($main_slogan ?? '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간') ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/public/assets/images/logo.png">
    
    <!-- PWA & Mobile Web App Meta Tags -->
    <link rel="manifest" href="/public/manifest.json">
    <meta name="theme-color" content="#154212">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="푸른나무교회">
    <link rel="apple-touch-icon" href="/public/assets/images/logo.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/public/assets/images/logo.png">

    <!-- JSON-LD Structured Data for Search Engines (Google, Naver) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Church",
      "name": "푸른나무교회",
      "alternateName": "Green Tree Church",
      "url": "https://greentreech.kr",
      "logo": "https://greentreech.kr/public/assets/images/logo.png",
      "image": "https://greentreech.kr/public/assets/images/logo.png",
      "telephone": "010-9559-8623",
      "email": "leeshkr@kakao.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "선화로73길 25 (3층)",
        "addressLocality": "익산시",
        "addressRegion": "전북특별자치도",
        "addressCountry": "KR"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "35.9575",
        "longitude": "126.9858"
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Sunday"],
          "opens": "11:00",
          "closes": "12:30",
          "description": "주일 낮 예배"
        }
      ]
    }
    </script>
    
    <!-- Google Fonts & Pretendard -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@400;600;700;900&family=Pretendard:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN with custom config -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#154212",
                        "primary-container": "#2d5a27",
                        "primary-fixed": "#bcf0ae",
                        "primary-fixed-dim": "#a1d494",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#9dd090",
                        "secondary": "#486730",
                        "secondary-container": "#c9eea9",
                        "on-secondary": "#ffffff",
                        "on-secondary-container": "#4e6d36",
                        "background": "#f7f9ff",
                        "on-background": "#091d2e",
                        "surface": "#f7f9ff",
                        "surface-dim": "#c9dcf3",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#edf4ff",
                        "surface-container": "#e3efff",
                        "surface-container-high": "#d9eaff",
                        "surface-container-highest": "#d1e4fb",
                        "on-surface": "#091d2e",
                        "on-surface-variant": "#42493e",
                        "outline": "#72796e",
                        "outline-variant": "#c2c9bb",
                        "tertiary": "#41382a",
                    },
                    fontFamily: {
                        sans: ['Pretendard', 'Be Vietnam Pro', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
                        serif: ['Noto Serif KR', 'Noto Serif', 'serif'],
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(21, 66, 18, 0.06)',
                        'card': '0 10px 30px -4px rgba(21, 66, 18, 0.08)',
                    }
                }
            }
        };
    </script>
    <style>
        html {
            font-size: 17.5px; /* 전체 폰트 크기 2pt 기본 확대 */
        }
        @media (max-width: 640px) {
            html {
                font-size: 16.5px; /* 모바일에서도 시원하고 또렷한 글자 크기 보장 */
            }
        }
        body {
            font-family: 'Pretendard', sans-serif;
            background-color: #f7f9ff;
            color: #091d2e;
            -webkit-tap-highlight-color: transparent;
            font-size: 1rem;
            line-height: 1.65;
            letter-spacing: -0.015em;
        }
        .font-serif-kr {
            font-family: 'Noto Serif KR', serif;
        }
        .glass-nav {
            background: rgba(247, 249, 255, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .material-symbols-fill {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-none {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen antialiased selection:bg-primary selection:text-white pb-20 md:pb-0">

    <!-- Flash Message Toast Alerts -->
    <?php if (!empty($flashSuccess)): ?>
    <div id="flashToast" class="fixed top-5 left-1/2 -translate-x-1/2 z-50 max-w-md w-[92%] bg-primary text-white px-5 py-3.5 rounded-2xl shadow-xl flex items-center justify-between gap-3 animate-bounce">
        <div class="flex items-center gap-3 text-sm font-medium">
            <i class="fas fa-check-circle text-primary-fixed text-lg"></i>
            <span><?= e($flashSuccess) ?></span>
        </div>
        <button onclick="document.getElementById('flashToast').remove()" class="text-white/80 hover:text-white text-lg">&times;</button>
    </div>
    <?php endif; ?>

    <?php if (!empty($flashError)): ?>
    <div id="flashToast" class="fixed top-5 left-1/2 -translate-x-1/2 z-50 max-w-md w-[92%] bg-red-600 text-white px-5 py-3.5 rounded-2xl shadow-xl flex items-center justify-between gap-3">
        <div class="flex items-center gap-3 text-sm font-medium">
            <i class="fas fa-exclamation-circle text-red-200 text-lg"></i>
            <span><?= e($flashError) ?></span>
        </div>
        <button onclick="document.getElementById('flashToast').remove()" class="text-white/80 hover:text-white text-lg">&times;</button>
    </div>
    <?php endif; ?>

    <!-- Top Sunday Worship Live Banner (Automatic on Sunday 10:30~12:30 KST) -->
    <?php
        $dayOfWeek = (int)date('w');
        $hourMin = (int)date('Hi');
        $isSundayLive = ($dayOfWeek === 0 && $hourMin >= 1030 && $hourMin <= 1230);
    ?>
    <?php if ($isSundayLive || !empty($live_stream_active)): ?>
    <div class="bg-red-600 text-white text-xs py-2.5 px-4 text-center font-bold flex items-center justify-center gap-2 shadow-md">
        <span class="w-2.5 h-2.5 rounded-full bg-white animate-ping"></span>
        <span>🔴 지금은 푸른나무교회 주일예배 실시간 생중계 시간입니다</span>
        <a href="/sermons" class="ml-2 bg-white text-red-700 px-3 py-1 rounded-full text-[11px] font-black hover:bg-gray-100 transition-all shadow-sm">
            생방송 시청하기 →
        </a>
    </div>
    <?php endif; ?>

    <!-- Top Global Announcement Bar (Desktop & Mobile) -->
    <div class="bg-primary text-white/90 text-xs py-2 px-4 text-center font-medium flex items-center justify-center gap-2">
        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-primary-fixed text-primary-container shrink-0">
            예배안내
        </span>
        <span class="truncate sm:overflow-visible">주일 예배 <?= e($worship_sunday ?? '오전 11:00') ?> | <?= e($address ?? '익산시 선화로73길 25 (3층)') ?></span>
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 glass-nav border-b border-surface-container-high/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-2">
            
            <!-- Brand Logo (Single line, strictly non-wrapping) -->
            <a href="/" class="flex items-center gap-2.5 sm:gap-3 group shrink-0 min-w-0">
                <img src="/public/assets/images/logo.png" alt="푸른나무교회" class="w-9 h-9 sm:w-10 sm:h-10 object-contain rounded-full shadow-sm group-hover:scale-105 transition-transform shrink-0">
                <div class="flex flex-col shrink-0 min-w-0">
                    <span class="font-serif-kr font-bold text-lg sm:text-xl tracking-tight text-primary leading-tight flex items-center gap-1.5 whitespace-nowrap">
                        푸른나무교회
                    </span>
                    <span class="text-[10px] sm:text-[11px] text-secondary font-medium tracking-wider uppercase whitespace-nowrap">Green Tree Church</span>
                </div>
            </a>

            <!-- Desktop Navigation Menu (Hierarchical Dropdown Structure) -->
            <nav class="hidden md:flex items-center space-x-1 lg:space-x-2 text-sm font-semibold">
                
                <!-- 1. Home -->
                <a href="/" class="px-3 py-2 rounded-xl transition-colors <?= ($currentNav ?? '') === 'home' ? 'text-primary bg-surface-container font-bold' : 'text-on-surface hover:text-primary hover:bg-surface-container-low' ?>">
                    홈
                </a>
                
                <!-- 2. 교회소개 (Dropdown) -->
                <div class="relative group py-2">
                    <button type="button" class="px-3.5 py-2 rounded-xl inline-flex items-center gap-1.5 transition-colors <?= in_array($currentNav ?? '', ['about', 'pastor', 'schedule', 'location'], true) ? 'text-primary bg-surface-container font-bold' : 'text-on-surface hover:text-primary hover:bg-surface-container-low' ?>">
                        <span>교회소개</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-400 group-hover:rotate-180 transition-transform"></i>
                    </button>
                    <!-- Dropdown with Invisible Hover Bridge -->
                    <div class="absolute left-0 top-full pt-1.5 w-60 hidden group-hover:block transition-all z-50 animate-fadeIn">
                        <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-xl border border-outline-variant/40 py-2.5">
                            <a href="/about" class="px-4 py-2.5 hover:bg-surface-container-low flex flex-col transition-colors group/item">
                                <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">푸른나무교회 이야기</span>
                                <span class="text-[10px] text-gray-400">쉼과 사랑이 있는 믿음의 공동체</span>
                            </a>
                            <a href="/pastor" class="px-4 py-2.5 hover:bg-surface-container-low flex flex-col transition-colors group/item">
                                <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">섬기는 사람들 (목회자)</span>
                                <span class="text-[10px] text-gray-400">심민보 담임목사 소개</span>
                            </a>
                            <a href="/schedule" class="px-4 py-2.5 hover:bg-surface-container-low flex flex-col transition-colors group/item">
                                <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">예배 및 모임 안내</span>
                                <span class="text-[10px] text-gray-400">주일예배, 청년모임, 기도회</span>
                            </a>
                            <a href="/location" class="px-4 py-2.5 hover:bg-surface-container-low flex flex-col transition-colors group/item">
                                <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">오시는 길 (위치/지도)</span>
                                <span class="text-[10px] text-gray-400">선화로73길 25 (3대 내비게이션)</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. 말씀과 영상 (Dropdown) -->
                <div class="relative group py-2">
                    <button type="button" class="px-3.5 py-2 rounded-xl inline-flex items-center gap-1.5 transition-colors <?= in_array($currentNav ?? '', ['sermons', 'media'], true) ? 'text-primary bg-surface-container font-bold' : 'text-on-surface hover:text-primary hover:bg-surface-container-low' ?>">
                        <span>말씀과 영상</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-400 group-hover:rotate-180 transition-transform"></i>
                    </button>
                    <!-- Dropdown with Invisible Hover Bridge -->
                    <div class="absolute left-0 top-full pt-1.5 w-64 hidden group-hover:block transition-all z-50 animate-fadeIn">
                        <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-xl border border-outline-variant/40 py-2.5">
                            <a href="/sermons" class="px-4 py-2.5 hover:bg-surface-container-low flex items-start gap-3 transition-colors group/item">
                                <div class="w-8 h-8 rounded-xl bg-green-100 text-green-700 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fas fa-book-bible text-xs"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">주일 설교 말씀</span>
                                    <span class="text-[10px] text-gray-400">주일예배 본문 설교 영상 전용</span>
                                </div>
                            </a>
                            <a href="/media" class="px-4 py-2.5 hover:bg-surface-container-low flex items-start gap-3 transition-colors group/item">
                                <div class="w-8 h-8 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <i class="fab fa-youtube text-xs"></i>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">푸른나무 영상</span>
                                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-red-600 text-white">Shorts</span>
                                    </div>
                                    <span class="text-[10px] text-gray-400">1분 쇼츠, 식탁 교제, 성도 간증</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 4. 소식과 나눔 (Dropdown) -->
                <div class="relative group py-2">
                    <button type="button" class="px-3.5 py-2 rounded-xl inline-flex items-center gap-1.5 transition-colors <?= in_array($currentNav ?? '', ['notices', 'community', 'gallery', 'calligraphy'], true) ? 'text-primary bg-surface-container font-bold' : 'text-on-surface hover:text-primary hover:bg-surface-container-low' ?>">
                        <span>소식과 나눔</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-400 group-hover:rotate-180 transition-transform"></i>
                    </button>
                    <!-- Dropdown with Invisible Hover Bridge -->
                    <div class="absolute left-0 top-full pt-1.5 w-64 hidden group-hover:block transition-all z-50 animate-fadeIn">
                        <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-xl border border-outline-variant/40 py-2.5">
                            <a href="/bulletin" class="px-4 py-2 hover:bg-surface-container-low flex items-center gap-2.5 transition-colors group/item">
                                <i class="fas fa-newspaper text-xs text-primary w-4 text-center"></i>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">온라인 주보</span>
                                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-[#154212] text-white">PDF/인쇄</span>
                                    </div>
                                    <span class="text-[10px] text-gray-400">예배순서, 설교본문, 금주소식</span>
                                </div>
                            </a>
                            <a href="/notices" class="px-4 py-2 hover:bg-surface-container-low flex items-center gap-2.5 transition-colors group/item">
                                <i class="fas fa-bullhorn text-xs text-amber-500 w-4 text-center"></i>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">알리는 소식</span>
                                    <span class="text-[10px] text-gray-400">교회 주요 소식 및 공지사항</span>
                                </div>
                            </a>
                            <a href="/community" class="px-4 py-2 hover:bg-surface-container-low flex items-center gap-2.5 transition-colors group/item">
                                <i class="fas fa-comments text-xs text-primary w-4 text-center"></i>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">성도 나눔터</span>
                                    <span class="text-[10px] text-gray-400">성도님들의 따뜻한 은혜 소통 피드</span>
                                </div>
                            </a>
                            <a href="/gallery" class="px-4 py-2 hover:bg-surface-container-low flex items-center gap-2.5 transition-colors group/item">
                                <i class="fas fa-camera text-xs text-purple-500 w-4 text-center"></i>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">교회 사진첩</span>
                                    <span class="text-[10px] text-gray-400">사역과 성도 교제 사진</span>
                                </div>
                            </a>
                            <a href="/calligraphy" class="px-4 py-2 hover:bg-surface-container-low flex items-center gap-2.5 transition-colors group/item">
                                <i class="fas fa-pen-nib text-xs text-secondary w-4 text-center"></i>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-gray-800 group-hover/item:text-primary">말씀 캘리그라피</span>
                                    <span class="text-[10px] text-gray-400">배경화면 저장 & 말씀 공유</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </nav>

            <!-- Right Action: Desktop Prayer / Member Login & Mobile Hamburger Button -->
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                
                <!-- Desktop Only: Giving Modal Trigger (Logged-in Members Only) -->
                <?php if (\App\Core\Auth::isMember() || \App\Core\Auth::check()): ?>
                <button type="button" onclick="openGivingModal()" class="hidden md:inline-flex items-center gap-1.5 bg-surface-container hover:bg-surface-container-high text-gray-700 px-3.5 py-2 rounded-full text-xs font-bold transition-all border border-outline-variant/40 hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-hand-holding-heart text-emerald-600 text-xs"></i>
                    <span>온라인 헌금</span>
                </button>
                <?php endif; ?>

                <!-- Desktop Only: Invitation / First Visit / Free Message -->
                <a href="/inquiry" class="hidden md:inline-flex items-center gap-1.5 bg-primary hover:bg-primary-container text-white px-3.5 py-2 rounded-full text-xs font-bold shadow-sm transition-all hover:scale-[1.02] active:scale-[0.98]">
                    <i class="fas fa-door-open text-emerald-300 text-xs"></i>
                    <span>초대 & 첫걸음</span>
                </a>

                <!-- Desktop Only: Kakao Member Login / Profile Button -->
                <?php if (\App\Core\Auth::isMember()): ?>
                    <?php 
                        $loginMember = \App\Core\Auth::member(); 
                        $isPastorMember = ($loginMember['role'] ?? '') === '담임목사' || ($loginMember['role'] ?? '') === '담임목사 (최고관리자)' || str_contains((string)($loginMember['email'] ?? ''), 'leeshkr');
                    ?>
                    <?php if ($isPastorMember): ?>
                    <a href="/admin" class="hidden lg:inline-flex items-center gap-1.5 bg-[#154212] hover:bg-[#0d2b0b] text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-sm transition-all animate-pulse">
                        <i class="fas fa-crown text-amber-300"></i>
                        <span>관리자</span>
                    </a>
                    <?php endif; ?>
                    <a href="/auth/profile" class="hidden md:inline-flex items-center gap-2 bg-white border border-gray-200 hover:bg-gray-50 px-3 py-1.5 rounded-full text-xs font-bold text-gray-800 shadow-sm transition-all">
                        <img src="<?= e($loginMember['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-6 h-6 rounded-full object-cover">
                        <span class="max-w-[80px] truncate"><?= e($loginMember['nickname']) ?></span>
                    </a>
                <?php else: ?>
                    <a href="/auth/login" class="hidden md:inline-flex items-center gap-1.5 bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] px-3.5 py-2 rounded-full text-xs font-bold shadow-sm transition-all">
                        <i class="fas fa-comment text-xs"></i>
                        <span>카톡 로그인</span>
                    </a>
                <?php endif; ?>

                <!-- Mobile Hamburger Button (Clean & Prominent) -->
                <button type="button" onclick="toggleMobileDrawer()" class="md:hidden inline-flex items-center justify-center p-2.5 rounded-2xl bg-surface-container/80 text-primary hover:bg-surface-container active:scale-95 transition-all shadow-xs" aria-label="전체 메뉴 열기">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer Navigation (Slide-in Menu with Login & Prayer Actions) -->
    <div id="mobileDrawer" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden transition-opacity duration-300">
        <div class="fixed inset-y-0 right-0 max-w-xs w-[85%] bg-white shadow-2xl p-5 sm:p-6 flex flex-col justify-between overflow-y-auto">
            <div>
                <!-- Drawer Header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-2.5">
                        <img src="/public/assets/images/logo.png" alt="푸른나무교회" class="w-7 h-7 object-contain rounded-full shadow-xs">
                        <span class="font-serif-kr font-bold text-base text-primary">푸른나무교회</span>
                    </div>
                    <button type="button" onclick="toggleMobileDrawer()" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 hover:text-gray-900 text-lg">
                        &times;
                    </button>
                </div>

                <!-- Kakao Member Login & Profile Card in Drawer -->
                <div class="py-3.5 border-b border-gray-100">
                    <?php if (\App\Core\Auth::isMember()): ?>
                        <?php 
                            $loginMember = \App\Core\Auth::member(); 
                            $isPastorMember = ($loginMember['role'] ?? '') === '담임목사' || ($loginMember['role'] ?? '') === '담임목사 (최고관리자)' || str_contains((string)($loginMember['email'] ?? ''), 'leeshkr');
                        ?>
                        <div class="bg-surface-container-low p-3 rounded-2xl border border-outline-variant/30 flex items-center justify-between gap-2">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <img src="<?= e($loginMember['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-9 h-9 rounded-full object-cover shrink-0">
                                <div class="min-w-0">
                                    <p class="font-bold text-xs text-gray-900 truncate"><?= e($loginMember['nickname']) ?>님</p>
                                    <p class="text-[10px] text-primary font-medium"><?= e($loginMember['role'] ?? '등록성도') ?></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-1.5 shrink-0">
                                <?php if ($isPastorMember): ?>
                                <a href="/admin" class="px-2 py-1 bg-primary text-white rounded-lg text-[10px] font-bold">관리자</a>
                                <?php endif; ?>
                                <a href="/auth/profile" class="px-2.5 py-1 bg-white border border-gray-200 rounded-lg text-[11px] font-bold text-gray-700 hover:bg-gray-50">설정</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="/auth/login" class="w-full py-3 bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] rounded-2xl text-xs font-bold flex items-center justify-center gap-2 shadow-sm transition-all active:scale-98">
                            <i class="fas fa-comment text-sm"></i>
                            <span>카카오톡으로 1초 로그인</span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Highlight Action: New Family & Prayer Request in Drawer -->
                <div class="pt-3.5 pb-2">
                    <a href="/inquiry" class="w-full p-3.5 rounded-2xl bg-gradient-to-r from-primary to-primary-container text-white flex items-center justify-between shadow-sm active:scale-[0.99] transition-all">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                                <i class="fas fa-heart text-secondary-container text-xs"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-xs font-bold leading-tight">새가족 등록 · 기도 요청</p>
                                <p class="text-[10px] text-primary-fixed leading-tight mt-0.5">따뜻하게 맞이하고 함께 기도합니다</p>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right text-xs text-white/70"></i>
                    </a>
                </div>

                <!-- Hierarchical Mobile Menu Links -->
                <div class="mt-2 space-y-3">
                    
                    <a href="/" class="block px-3.5 py-2.5 rounded-xl font-bold text-gray-800 hover:bg-surface-container-low text-xs transition-colors">
                        <i class="fas fa-home text-primary mr-2"></i> 홈 메인
                    </a>

                    <!-- Group 1: 교회소개 -->
                    <div class="bg-surface-container-low/70 p-3 rounded-2xl border border-outline-variant/30">
                        <span class="text-[11px] font-bold text-primary flex items-center gap-1.5 mb-2">
                            <i class="fas fa-church"></i> 교회소개
                        </span>
                        <div class="grid grid-cols-2 gap-1.5 text-xs font-medium text-gray-700">
                            <a href="/about" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">교회 이야기</a>
                            <a href="/pastor" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">목회자 소개</a>
                            <a href="/schedule" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">예배 안내</a>
                            <a href="/location" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">오시는 길</a>
                        </div>
                    </div>

                    <!-- Group 2: 말씀과 영상 -->
                    <div class="bg-surface-container-low/70 p-3 rounded-2xl border border-outline-variant/30">
                        <span class="text-[11px] font-bold text-primary flex items-center gap-1.5 mb-2">
                            <i class="fas fa-video"></i> 말씀과 영상
                        </span>
                        <div class="grid grid-cols-2 gap-1.5 text-xs font-medium text-gray-700">
                            <a href="/sermons" class="p-2 rounded-xl bg-white hover:bg-gray-100 font-bold text-primary transition-colors">주일 설교</a>
                            <a href="/media" class="p-2 rounded-xl bg-white hover:bg-gray-100 flex items-center justify-between transition-colors">
                                <span>푸른나무영상</span>
                                <span class="text-[9px] bg-red-100 text-red-600 font-bold px-1 rounded">Shorts</span>
                            </a>
                        </div>
                    </div>

                    <!-- Group 3: 소식과 나눔 -->
                    <div class="bg-surface-container-low/70 p-3 rounded-2xl border border-outline-variant/30">
                        <span class="text-[11px] font-bold text-primary flex items-center gap-1.5 mb-2">
                            <i class="fas fa-comments"></i> 소식과 나눔
                        </span>
                        <div class="grid grid-cols-2 gap-1.5 text-xs font-medium text-gray-700">
                            <a href="/bulletin" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors font-bold text-primary">온라인 주보</a>
                            <a href="/notices" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">알리는 소식</a>
                            <a href="/community" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">성도 나눔터</a>
                            <a href="/gallery" class="p-2 rounded-xl bg-white hover:bg-gray-100 transition-colors">교회 사진첩</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Drawer Footer Contact Info -->
            <div class="pt-4 border-t border-gray-100 text-xs text-gray-500">
                <p class="font-bold text-gray-700 mb-0.5">푸른나무교회</p>
                <p class="text-[11px]">전북 익산시 선화로73길 25 (3층)</p>
                <p class="mt-1.5">
                    <a href="tel:010-9559-8623" class="inline-flex items-center gap-1 text-primary font-bold text-xs bg-primary-fixed/30 px-2.5 py-1 rounded-full">
                        <i class="fas fa-phone-alt text-[10px]"></i> 010-9559-8623 전화걸기
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow">
        <?= $content ?>
    </main>

    <!-- Footer (Balanced Responsive Sitemap & Church Info) -->
    <footer class="bg-surface-container-low border-t border-surface-container-high py-12 px-5 sm:px-6 lg:px-8 text-on-surface">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-5 gap-8">
            
            <!-- Col 1: Church Info (Mobile Balanced Box / Desktop 2-Cols) -->
            <div class="space-y-3 md:col-span-2 bg-white/70 md:bg-transparent p-5 md:p-0 rounded-3xl md:rounded-none border border-outline-variant/40 md:border-none shadow-xs md:shadow-none">
                <div class="flex items-center gap-3">
                    <img src="/public/assets/images/logo.png" alt="푸른나무교회" class="w-8 h-8 object-contain rounded-full shadow-xs shrink-0">
                    <span class="font-serif-kr font-bold text-xl text-primary"><?= e($site_name ?? '푸른나무교회') ?></span>
                </div>
                <p class="text-sm text-gray-600 max-w-md leading-relaxed font-serif-kr">
                    "<?= e($main_slogan ?? '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간') ?>"
                </p>
                <div class="text-xs text-gray-500 space-y-1.5 pt-1">
                    <p><strong>담임목사:</strong> <?= e($pastor_name ?? '심민보') ?> | <strong>대표전화:</strong> <a href="tel:<?= e($phone ?? '010-9559-8623') ?>" class="text-primary hover:underline font-bold"><?= e($phone ?? '010-9559-8623') ?></a></p>
                    <p><strong>이메일:</strong> <?= e($email ?? 'nuriohga@gmail.com') ?></p>
                    <p><strong>주소:</strong> <?= e($address ?? '전라북도 익산시 선화로73길 25 (3층)') ?></p>
                </div>
            </div>

            <!-- Col 2~4: Sitemap Links (2-Column Grid on Mobile, 3-Columns on Desktop) -->
            <div class="md:col-span-3 grid grid-cols-2 sm:grid-cols-3 gap-6">
                
                <!-- SubCol 1: 말씀과 영상 -->
                <div class="space-y-2">
                    <h4 class="font-bold text-sm sm:text-base text-primary tracking-wide">말씀과 영상</h4>
                    <ul class="text-xs sm:text-sm text-gray-600 space-y-2.5">
                        <li><a href="/sermons" class="hover:text-primary transition-colors">📖 설교 영상 (본문말씀)</a></li>
                        <li><a href="/media?category=설교+쇼츠" class="hover:text-primary transition-colors">⚡ 설교 쇼츠</a></li>
                        <li><a href="/media?category=예배+쇼츠" class="hover:text-primary transition-colors">🙏 예배 쇼츠</a></li>
                        <li><a href="/media?category=교회+행사%2F일상" class="hover:text-primary transition-colors">🌿 교회 행사/일상</a></li>
                    </ul>
                </div>

                <!-- SubCol 2: 소식과 나눔 -->
                <div class="space-y-2">
                    <h4 class="font-bold text-sm sm:text-base text-primary tracking-wide">소식과 나눔</h4>
                    <ul class="text-xs sm:text-sm text-gray-600 space-y-2.5">
                        <li><a href="/bulletin" class="hover:text-primary transition-colors">📄 온라인 주보</a></li>
                        <li><a href="/notices" class="hover:text-primary transition-colors">📢 알리는 소식</a></li>
                        <li><a href="/community" class="hover:text-primary transition-colors">💬 성도 나눔터</a></li>
                        <li><a href="/gallery" class="hover:text-primary transition-colors">📸 교회 사진첩</a></li>
                    </ul>
                </div>

                <!-- SubCol 3: 교회소개 & 참여 (Span 2 on very small screen if needed or naturally aligned) -->
                <div class="space-y-2 col-span-2 sm:col-span-1">
                    <h4 class="font-bold text-sm sm:text-base text-primary tracking-wide">교회소개 & 문의</h4>
                    <ul class="text-xs sm:text-sm text-gray-600 space-y-2.5">
                        <li><a href="/about" class="hover:text-primary transition-colors">푸른나무 이야기</a></li>
                        <li><a href="/location" class="hover:text-primary transition-colors">오시는 길 (3대 내비)</a></li>
                        <li><a href="/inquiry" class="hover:text-primary transition-colors">새가족 / 기도 요청</a></li>
                        <li><a href="/admin" class="hover:text-primary text-gray-400 transition-colors"><i class="fas fa-lock mr-1"></i> 관리자 로그인</a></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="max-w-7xl mx-auto mt-8 pt-6 border-t border-surface-container-high/80 flex flex-col sm:flex-row items-center justify-between text-xs sm:text-sm text-gray-400 gap-2 text-center sm:text-left">
            <p>&copy; <?= date('Y') ?> 푸른나무교회. All rights reserved.</p>
            <p class="font-medium">지친 일상 속 작은 쉼과 사랑이 있는 공동체</p>
        </div>
    </footer>

    <!-- Mobile Bottom Floating Navigation Bar -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-md border-t border-gray-200 z-40 py-2.5 px-4 flex items-center justify-around shadow-lg">
        <a href="/" class="flex flex-col items-center gap-1 <?= ($currentNav ?? '') === 'home' ? 'text-primary font-bold' : 'text-gray-500' ?>">
            <i class="fas fa-home text-xl"></i>
            <span class="text-xs font-semibold">홈</span>
        </a>
        <a href="/sermons" class="flex flex-col items-center gap-1 <?= ($currentNav ?? '') === 'sermons' ? 'text-primary font-bold' : 'text-gray-500' ?>">
            <i class="fas fa-book-bible text-xl"></i>
            <span class="text-xs font-semibold">주일설교</span>
        </a>
        <a href="/media" class="flex flex-col items-center gap-1 <?= ($currentNav ?? '') === 'media' ? 'text-primary font-bold' : 'text-gray-500' ?>">
            <i class="fas fa-video text-xl"></i>
            <span class="text-xs font-semibold">영상/쇼츠</span>
        </a>
        <a href="/community" class="flex flex-col items-center gap-1 <?= ($currentNav ?? '') === 'community' ? 'text-primary font-bold' : 'text-gray-500' ?>">
            <i class="fas fa-comments text-xl"></i>
            <span class="text-xs font-semibold">나눔터</span>
        </a>
        <a href="/inquiry" class="flex flex-col items-center gap-1 <?= ($currentNav ?? '') === 'inquiry' ? 'text-primary font-bold' : 'text-gray-500' ?>">
            <i class="fas fa-door-open text-xl text-primary"></i>
            <span class="text-xs font-semibold">초대&첫걸음</span>
        </a>
    </nav>

    <!-- Giving / Account Quick Modal -->
    <div id="givingModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl border border-gray-100 text-center space-y-4 animate-scaleUp">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center mx-auto text-xl">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div>
                <h3 class="font-serif-kr text-lg font-bold text-gray-900">온라인 헌금 / 계좌 안내</h3>
                <p class="text-xs text-gray-500 mt-1">정성스러운 마음과 기도로 함께 동역해 주셔서 감사합니다.</p>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200 text-left space-y-2">
                <div class="flex items-center justify-between text-xs text-gray-500 font-medium">
                    <span>농협은행</span>
                    <span>예금주: 푸른나무교회</span>
                </div>
                <div class="flex items-center justify-between gap-2">
                    <span class="font-mono font-bold text-sm sm:text-base text-gray-900 select-all">351-9559-8623-03</span>
                    <button type="button" onclick="copyToClipboard('351-9559-8623-03', '계좌번호가 복사되었습니다!')" class="px-2.5 py-1 bg-primary text-white rounded-lg text-xs font-bold shrink-0 hover:bg-primary-dark transition-colors">
                        복사
                    </button>
                </div>
            </div>

            <button type="button" onclick="closeGivingModal()" class="w-full py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-bold transition-colors">
                닫기
            </button>
        </div>
    </div>

    <!-- PWA Smart App Install Banner (Mobile Only) -->
    <div id="pwaInstallBanner" class="md:hidden fixed bottom-20 left-4 right-4 z-40 bg-white/95 backdrop-blur-md rounded-2xl p-3.5 shadow-xl border border-primary/20 hidden items-center justify-between gap-3 animate-fadeIn">
        <div class="flex items-center gap-3 min-w-0">
            <img src="/public/assets/images/logo.png" alt="Logo" class="w-10 h-10 rounded-xl p-1 bg-green-50 border border-green-100 shrink-0">
            <div class="min-w-0 text-left">
                <h4 class="font-bold text-xs text-gray-900 truncate">푸른나무교회 홈화면 앱</h4>
                <p class="text-[11px] text-gray-500 truncate">홈 화면에 추가하고 편하게 예배드리세요</p>
            </div>
        </div>
        <div class="flex items-center gap-1.5 shrink-0">
            <button id="pwaInstallBtn" class="px-3 py-1.5 bg-primary text-white rounded-xl text-xs font-bold shadow-xs hover:bg-primary-dark transition-colors">
                설치
            </button>
            <button onclick="dismissPwaBanner()" class="text-gray-400 hover:text-gray-600 p-1 text-sm">
                &times;
            </button>
        </div>
    </div>

    <!-- Global Toast Container -->
    <div id="globalToast" class="fixed bottom-24 left-1/2 -translate-x-1/2 z-50 max-w-sm bg-gray-900/90 text-white px-5 py-3 rounded-full text-xs font-bold backdrop-blur-md shadow-2xl hidden items-center gap-2 transition-all">
        <i class="fas fa-check-circle text-emerald-400"></i>
        <span id="globalToastMsg">복사되었습니다!</span>
    </div>

    <script>
        function toggleMobileDrawer() {
            const drawer = document.getElementById('mobileDrawer');
            if (drawer.classList.contains('hidden')) {
                drawer.classList.remove('hidden');
            } else {
                drawer.classList.add('hidden');
            }
        }

        // Giving Modal Helpers
        function openGivingModal() {
            const modal = document.getElementById('givingModal');
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        }
        function closeGivingModal() {
            const modal = document.getElementById('givingModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        // Global Copy Helper with Toast
        function copyToClipboard(text, msg = '복사되었습니다!') {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => showToast(msg));
            } else {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                textArea.style.position = 'fixed';
                textArea.style.opacity = '0';
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                try {
                    document.execCommand('copy');
                    showToast(msg);
                } catch (err) {
                    alert('복사에 실패했습니다.');
                }
                document.body.removeChild(textArea);
            }
        }

        function showToast(msg) {
            const toast = document.getElementById('globalToast');
            const toastMsg = document.getElementById('globalToastMsg');
            if (toast && toastMsg) {
                toastMsg.innerText = msg;
                toast.classList.remove('hidden');
                toast.classList.add('flex');
                setTimeout(() => {
                    toast.classList.add('hidden');
                    toast.classList.remove('flex');
                }, 2500);
            }
        }

        // PWA Install Prompt Handler
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            const banner = document.getElementById('pwaInstallBanner');
            if (banner && !sessionStorage.getItem('pwa_dismissed')) {
                banner.classList.remove('hidden');
                banner.classList.add('flex');
            }
        });

        document.getElementById('pwaInstallBtn')?.addEventListener('click', async () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                deferredPrompt = null;
                dismissPwaBanner();
            }
        });

        function dismissPwaBanner() {
            const banner = document.getElementById('pwaInstallBanner');
            if (banner) {
                banner.classList.add('hidden');
                banner.classList.remove('flex');
                sessionStorage.setItem('pwa_dismissed', '1');
            }
        }

        // Register PWA Service Worker
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/public/sw.js')
                    .then(reg => console.log('PWA Service Worker registered:', reg.scope))
                    .catch(err => console.log('Service Worker registration failed:', err));
            });
        }
    </script>

    <?php include __DIR__ . '/role_simulator.php'; ?>
</body>
</html>
