<!-- Main Hero Section (Dynamic Text Typography or Image Banner) -->
<section class="relative bg-gradient-to-b from-surface-container-low via-surface to-background pt-6 sm:pt-8 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <!-- Ambient Blur Background Elements -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-primary-fixed/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/3 right-0 w-80 h-80 bg-secondary-container/30 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto text-center relative z-10">
        
        <?php 
            $heroMode = $settings['hero_mode'] ?? 'text';
            $heroImgDesktop = $settings['hero_image_desktop'] ?? '';
            $heroImgMobile = $settings['hero_image_mobile'] ?? '';
            $heroImgLink = $settings['hero_image_link'] ?? '';
            $heroImgTarget = $settings['hero_image_target'] ?? '_self';
            $heroImgAlt = $settings['hero_image_alt'] ?? '푸른나무교회 메인 배너';

            $heroBadge = $settings['hero_badge'] ?? '지친 일상 속, 작은 휴식과 참된 사랑';
            $heroTitle = $settings['hero_title'] ?? '당신의 지친 마음에';
            $heroHighlight = $settings['hero_highlight_text'] ?? '따뜻한 그늘과 쉼';
            $heroSuffix = $settings['hero_title_suffix'] ?? '을 드립니다';
            $heroSubtitle = $settings['hero_subtitle'] ?? '푸른나무교회는 거대한 무리 속의 한 사람이 아닌, 서로의 이름을 부르며 진심으로 기도하고 함께 자라나는 믿음의 공동체입니다.';

            $btn1Text = $settings['hero_btn1_text'] ?? '';
            $btn1Url = $settings['hero_btn1_url'] ?? '';
            $btn1Target = $settings['hero_btn1_target'] ?? '_self';

            $btn2Text = $settings['hero_btn2_text'] ?? '';
            $btn2Url = $settings['hero_btn2_url'] ?? '';
            $btn2Target = $settings['hero_btn2_target'] ?? '_self';
        ?>

        <?php if ($heroMode === 'image' && !empty($heroImgDesktop)): ?>
            <!-- 1. Graphic Image Banner Mode (Full Width to max-w-7xl Header Match) -->
            <div class="mb-12 rounded-3xl sm:rounded-[32px] overflow-hidden shadow-card border border-outline-variant/30 group w-full">
                <?php if (!empty($heroImgLink)): ?>
                <a href="<?= e($heroImgLink) ?>" target="<?= e($heroImgTarget) ?>" class="block overflow-hidden">
                <?php endif; ?>

                    <picture>
                        <?php if (!empty($heroImgMobile)): ?>
                        <source media="(max-width: 640px)" srcset="<?= e($heroImgMobile) ?>">
                        <?php endif; ?>
                        <img src="<?= e($heroImgDesktop) ?>" alt="<?= e($heroImgAlt) ?>" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500">
                    </picture>

                <?php if (!empty($heroImgLink)): ?>
                </a>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <!-- 2. Text Typography Mode (Default) -->
            <?php if (!empty($heroBadge)): ?>
            <!-- Church Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-surface-container border border-outline-variant/40 text-xs font-semibold text-primary mb-6 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                <span><?= e($heroBadge) ?></span>
            </div>
            <?php endif; ?>

            <!-- Main Title & Slogan -->
            <h1 class="font-serif-kr text-3xl sm:text-4xl md:text-5xl font-black text-on-surface tracking-tight leading-[1.25] mb-6">
                <?= e($heroTitle) ?><br class="hidden sm:inline">
                <?php if (!empty($heroHighlight)): ?>
                <span class="text-primary underline decoration-secondary-container decoration-4 underline-offset-8"><?= e($heroHighlight) ?></span>
                <?php endif; ?>
                <?= e($heroSuffix) ?>
            </h1>

            <?php if (!empty($heroSubtitle)): ?>
            <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed mb-8">
                <?= nl2br(e($heroSubtitle)) ?>
            </p>
            <?php endif; ?>

            <!-- Optional Custom CTA Buttons -->
            <?php if (!empty($btn1Text) || !empty($btn2Text)): ?>
            <div class="flex flex-wrap items-center justify-center gap-3 mb-10">
                <?php if (!empty($btn1Text) && !empty($btn1Url)): ?>
                <a href="<?= e($btn1Url) ?>" target="<?= e($btn1Target) ?>" class="px-6 py-3 rounded-full bg-primary hover:bg-primary-dark text-white text-xs sm:text-sm font-bold shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                    <span><?= e($btn1Text) ?></span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
                <?php endif; ?>

                <?php if (!empty($btn2Text) && !empty($btn2Url)): ?>
                <a href="<?= e($btn2Url) ?>" target="<?= e($btn2Target) ?>" class="px-6 py-3 rounded-full bg-surface-container hover:bg-surface-container-high text-gray-800 text-xs sm:text-sm font-bold border border-outline-variant/50 transition-all flex items-center gap-2">
                    <span><?= e($btn2Text) ?></span>
                    <i class="fas fa-chevron-right text-xs text-gray-400"></i>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        <?php endif; ?>

        <!-- Dual-Track UX Tabs (Existing Members vs Newcomers) -->
        <div class="max-w-4xl mx-auto mb-12">
            
            <!-- Tab Switcher Header -->
            <div class="flex items-center justify-center gap-2 p-1.5 bg-surface-container rounded-full max-w-xl mx-auto mb-8 shadow-inner">
                <button type="button" onclick="switchTrack('members')" id="tabBtnMembers" class="flex-1 py-2.5 px-4 sm:px-5 rounded-full text-xs sm:text-sm font-bold transition-all shadow-sm bg-[#154212] text-white flex items-center justify-center gap-1.5">
                    <span>🌿 기존 성도 공간</span>
                </button>
                <button type="button" onclick="switchTrack('newcomers')" id="tabBtnNewcomers" class="flex-1 py-2.5 px-4 sm:px-5 rounded-full text-xs sm:text-sm font-bold transition-all text-gray-600 hover:text-primary flex items-center justify-center gap-1.5">
                    <span>✨ 처음 오셔서 교회가 궁금하신 분 ^^</span>
                </button>
            </div>

            <!-- Track 1: 기존 성도님 전용 Fast-Track -->
            <div id="trackMembers" class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-left animate-fadeIn">
                
                <!-- 1. 온라인 주보 -->
                <a href="/bulletin" class="bg-white hover:bg-green-50/60 p-5 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-green-100 text-green-700 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <i class="fas fa-newspaper text-lg"></i>
                        </div>
                        <span class="text-xs font-bold text-green-700 bg-green-50 px-2.5 py-0.5 rounded-full">PDF/인쇄</span>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mt-2">온라인 주보</h3>
                    </div>
                    <span class="text-xs text-gray-500 mt-3 flex items-center gap-1 font-semibold">1초 바로보기 →</span>
                </a>

                <!-- 2. 주일 설교 -->
                <a href="/sermons" class="bg-white hover:bg-surface-container-low p-5 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-primary text-white flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <i class="fas fa-book-bible text-lg"></i>
                        </div>
                        <span class="text-xs font-bold text-primary">주일예배</span>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mt-2">설교 말씀</h3>
                    </div>
                    <span class="text-xs text-gray-500 mt-3 flex items-center gap-1 font-semibold">말씀 영상 →</span>
                </a>

                <!-- 3. 푸른나무 쇼츠/영상 -->
                <a href="/media" class="bg-white hover:bg-red-50/60 p-5 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <i class="fab fa-youtube text-lg"></i>
                        </div>
                        <span class="text-xs font-bold text-red-600 bg-red-50 px-2.5 py-0.5 rounded-full">Shorts</span>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mt-2">영상과 쇼츠</h3>
                    </div>
                    <span class="text-xs text-gray-500 mt-3 flex items-center gap-1 font-semibold">1분 은혜 →</span>
                </a>

                <!-- 4. 성도 나눔터 -->
                <a href="/community" class="bg-white hover:bg-amber-50/60 p-5 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all group flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <i class="fas fa-comments text-lg"></i>
                        </div>
                        <span class="text-xs font-bold text-amber-700">성도 소통</span>
                        <h3 class="font-bold text-gray-900 text-sm sm:text-base mt-2">성도 나눔터</h3>
                    </div>
                    <span class="text-xs text-gray-500 mt-3 flex items-center gap-1 font-semibold">은혜 나눔 →</span>
                </a>

            </div>

            <!-- Track 2: 처음 오신 분 (새가족/방문자) 웰컴 가이드 -->
            <div id="trackNewcomers" class="grid grid-cols-1 sm:grid-cols-3 gap-5 text-left hidden animate-fadeIn">
                
                <!-- 1. 담임목사 환영 인사 -->
                <div class="bg-white p-6 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3.5 mb-3.5">
                            <img src="/public/assets/images/pastor.png" onerror="this.src='/public/assets/images/logo.png'" alt="심민보 목사" class="w-14 h-14 rounded-full object-cover border-2 border-primary shrink-0">
                            <div>
                                <h4 class="font-bold text-sm sm:text-base text-gray-900">심민보 담임목사</h4>
                                <p class="text-xs sm:text-sm text-primary font-bold mt-0.5">"따뜻한 쉼과 사랑으로 환영합니다"</p>
                            </div>
                        </div>
                        <p class="text-xs sm:text-sm text-gray-700 leading-relaxed mb-4 font-medium">
                            푸른나무교회는 외롭고 지친 마음에 하나님의 참된 안식을 선물하는 따뜻한 쉼터입니다.
                        </p>
                    </div>
                    <a href="/pastor" class="text-xs sm:text-sm font-bold text-primary hover:underline flex items-center gap-1">
                        <span>목회자 소개 보기</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <!-- 2. 예배 시간 & 주차 안내 -->
                <div class="bg-white p-6 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-surface-container flex items-center justify-center text-primary mb-3.5 text-xl">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="font-bold text-sm sm:text-base text-gray-900 mb-2">예배 시간 & 주차</h4>
                        <p class="text-xs sm:text-sm text-gray-800 mb-1.5 font-medium"><strong>주일 예배:</strong> 오전 11:00</p>
                        <p class="text-xs sm:text-sm text-gray-800 mb-2.5 font-medium"><strong>청년 모임:</strong> 주일 오후 1:30</p>
                        <p class="text-xs text-gray-600 leading-relaxed">편안한 복장으로 오시면 됩니다. 건물 앞/주변 주차가 가능합니다.</p>
                    </div>
                </div>

                <!-- 3. 오시는 길 3대 내비 & 첫 방문 초대 -->
                <div class="bg-white p-6 rounded-2xl border border-outline-variant/30 shadow-soft hover:shadow-card transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-11 h-11 rounded-xl bg-surface-container flex items-center justify-center text-primary mb-3.5 text-xl">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <h4 class="font-bold text-sm sm:text-base text-gray-900 mb-1.5">오시는 길 & 첫 방문 환영</h4>
                        <p class="text-xs sm:text-sm text-gray-600 mb-4"><?= e($address ?? '전북 익산시 선화로73길 25 (3층)') ?></p>
                    </div>

                    <div class="space-y-2 pt-2 border-t border-gray-100">
                        <a href="/location" class="w-full py-2.5 px-3 rounded-xl bg-surface-container-high hover:bg-surface-container text-gray-800 text-xs sm:text-sm font-bold flex items-center justify-center gap-1.5 transition-colors">
                            <i class="fas fa-map-location-dot text-primary"></i> 3대 내비게이션 길안내
                        </a>
                        <a href="/inquiry" class="w-full py-2.5 px-3 rounded-xl bg-primary hover:bg-primary-dark text-white text-xs sm:text-sm font-bold flex items-center justify-center gap-1.5 shadow-sm transition-colors">
                            <i class="fas fa-door-open text-emerald-300"></i> 첫 방문 안내 & 마음 나누기
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

<script>
    function switchTrack(track) {
        const btnMembers = document.getElementById('tabBtnMembers');
        const btnNewcomers = document.getElementById('tabBtnNewcomers');
        const trackMembers = document.getElementById('trackMembers');
        const trackNewcomers = document.getElementById('trackNewcomers');

        if (track === 'members') {
            btnMembers.className = 'flex-1 py-2.5 px-4 rounded-full text-xs font-bold transition-all shadow-sm bg-[#154212] text-white flex items-center justify-center gap-1.5';
            btnNewcomers.className = 'flex-1 py-2.5 px-4 rounded-full text-xs font-bold transition-all text-gray-600 hover:text-primary flex items-center justify-center gap-1.5';
            trackMembers.classList.remove('hidden');
            trackNewcomers.classList.add('hidden');
        } else {
            btnNewcomers.className = 'flex-1 py-2.5 px-4 rounded-full text-xs font-bold transition-all shadow-sm bg-[#154212] text-white flex items-center justify-center gap-1.5';
            btnMembers.className = 'flex-1 py-2.5 px-4 rounded-full text-xs font-bold transition-all text-gray-600 hover:text-primary flex items-center justify-center gap-1.5';
            trackNewcomers.classList.remove('hidden');
            trackMembers.classList.add('hidden');
        }
    }
</script>

<!-- Latest Sermon Highlight Section with Instant Modal Player -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-container-lowest border-y border-outline-variant/20">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-xs sm:text-sm font-bold text-secondary uppercase tracking-wider">Sunday Worship Message</span>
                <h2 class="font-serif-kr text-2xl sm:text-3xl font-bold text-on-surface mt-1">이번 주 주일 말씀</h2>
            </div>
            <a href="/sermons" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-primary hover:underline">
                <span>전체 설교 영상 보기</span>
                <i class="fas fa-chevron-right text-xs"></i>
            </a>
        </div>

        <?php if (!empty($latestSermon)): ?>
        <!-- Main Sermon Card Container (Expands to full width when playing) -->
        <div id="sermonCardContainer" class="bg-white rounded-3xl border border-outline-variant/40 shadow-card overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-0 transition-all duration-500">
            
            <!-- Video / Player Container with Guaranteed Mobile Height & Expansion -->
            <div id="sermonPlayerWrapper" 
                 class="w-full lg:col-span-7 bg-black relative flex items-center justify-center overflow-hidden rounded-t-3xl lg:rounded-tr-none lg:rounded-l-3xl shadow-inner group transition-all duration-500" 
                 style="aspect-ratio: 16/9; min-height: 220px; width: 100%;">
                
                <!-- 1. Default Thumbnail View (Visible before play, Click to expand & play) -->
                <div id="sermonThumbnailView" 
                     class="absolute inset-0 w-full h-full cursor-pointer flex items-center justify-center z-10"
                     onclick="playInlineSermon('<?= e($latestSermon['youtube_id']) ?>')">
                    <img src="https://img.youtube.com/vi/<?= e($latestSermon['youtube_id']) ?>/maxresdefault.jpg" 
                         onerror="this.src='https://img.youtube.com/vi/<?= e($latestSermon['youtube_id']) ?>/hqdefault.jpg'"
                         alt="<?= e($latestSermon['title']) ?>" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                    
                    <!-- Big Play Pulse Button -->
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors flex items-center justify-center">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-primary/95 hover:bg-primary text-white flex items-center justify-center text-xl sm:text-2xl shadow-2xl group-hover:scale-110 active:scale-95 transition-all ring-4 ring-white/30">
                            <i class="fas fa-play ml-1"></i>
                        </div>
                    </div>

                    <!-- Inline Play Indicator Badge (Left Bottom) -->
                    <span class="absolute bottom-3 left-3 px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-black/80 text-white backdrop-blur-md flex items-center gap-1.5 shadow-sm">
                        <i class="fas fa-play text-primary-fixed text-xs"></i>
                        <span>클릭하여 바로재생</span>
                    </span>
                </div>

                <!-- 2. Inline YouTube Iframe Container (Loaded on play click) -->
                <div id="sermonInlineContainer" class="hidden absolute inset-0 w-full h-full bg-black z-0">
                    <!-- iframe is inserted dynamically -->
                </div>

                <!-- 3. Player Controls Overlay (Top Right: Maximize Popup & Collapse Frame) -->
                <div class="absolute top-3 right-3 z-20 flex items-center gap-2">
                    <!-- Collapse Button (Shown only when expanded) -->
                    <button type="button" 
                            id="sermonCollapseBtn"
                            onclick="event.stopPropagation(); collapseSermonFrame()"
                            class="hidden px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-black/80 hover:bg-zinc-800 text-gray-200 backdrop-blur-md transition-all shadow-lg flex items-center gap-1"
                            title="프레임 원래 크기로 축소">
                        <i class="fas fa-compress-arrows-alt text-xs text-amber-400"></i>
                        <span class="hidden sm:inline text-xs">원래 크기로</span>
                    </button>

                    <!-- Optional Maximized Popup Button -->
                    <button type="button" 
                            onclick="event.stopPropagation(); openVideoModal('<?= e($latestSermon['youtube_id']) ?>', '<?= e(addslashes($latestSermon['title'])) ?>')"
                            class="px-3 py-1.5 rounded-xl text-xs sm:text-sm font-bold bg-black/80 hover:bg-primary text-white backdrop-blur-md transition-all shadow-lg flex items-center gap-1.5 hover:scale-105 active:scale-95"
                            title="최대창 팝업으로 크게 보기">
                        <i class="fas fa-expand-arrows-alt text-xs text-primary-fixed"></i>
                        <span class="text-xs">최대창 팝업</span>
                    </button>
                </div>

            </div>

            <!-- Content Details (5 cols default, Full width when expanded) -->
            <div id="sermonContentWrapper" class="lg:col-span-5 p-6 sm:p-8 flex flex-col justify-between transition-all duration-500">
                <div>
                    <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-500 mb-3">
                        <span class="px-3 py-1 rounded-full bg-surface-container font-semibold text-primary">
                            <i class="far fa-calendar-alt mr-1"></i> <?= e($latestSermon['sermon_date']) ?>
                        </span>
                        <span class="font-medium"><?= e($latestSermon['preacher']) ?></span>
                    </div>

                    <h3 class="font-serif-kr text-xl sm:text-2xl font-bold text-gray-900 mb-3 leading-snug">
                        <a href="/sermons/<?= e($latestSermon['id']) ?>" class="hover:text-primary transition-colors">
                            <?= e($latestSermon['title']) ?>
                        </a>
                    </h3>

                    <?php if (!empty($latestSermon['scripture'])): ?>
                    <div class="bg-surface-container-low p-3.5 rounded-xl border border-outline-variant/30 mb-4">
                        <p class="text-xs sm:text-sm font-semibold text-primary">
                            <i class="fas fa-bookmark mr-1"></i> 본문 말씀: <?= e($latestSermon['scripture']) ?>
                        </p>
                    </div>
                    <?php endif; ?>

                    <p class="text-xs sm:text-sm text-gray-700 line-clamp-3 leading-relaxed">
                        <?= nl2br(e($latestSermon['content'] ?? '')) ?>
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <span class="text-xs sm:text-sm text-gray-400">
                        <i class="far fa-eye mr-1"></i> 조회수 <?= e($latestSermon['view_count']) ?>
                    </span>
                    <a href="/sermons/<?= e($latestSermon['id']) ?>" class="inline-flex items-center gap-1 text-xs sm:text-sm font-bold text-primary hover:text-primary-container">
                        <span>설교 본문 읽기</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

        </div>
        <?php else: ?>
        <div class="text-center py-12 bg-white rounded-3xl border border-outline-variant/30 p-8">
            <p class="text-gray-500 text-sm sm:text-base">등록된 설교 영상이 없습니다.</p>
        </div>
        <?php endif; ?>

    </div>
</section>

<!-- Community (성도 나눔터 온기 피드) Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-surface-container-low/40">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
            <div>
                <span class="text-xs sm:text-sm font-bold text-secondary uppercase tracking-wider">Community & Fellowship</span>
                <h2 class="font-serif-kr text-2xl sm:text-3xl font-bold text-on-surface mt-1">성도들의 따뜻한 나눔터 이야기</h2>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">서로의 일상과 감사, 기도 제목을 나누며 함께합니다.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="/community/create" class="px-4 py-2 bg-primary hover:bg-primary-container text-white rounded-full text-xs sm:text-sm font-bold shadow-sm transition-all">
                    <i class="fas fa-pen mr-1"></i> 글쓰기
                </a>
                <a href="/community" class="text-xs sm:text-sm font-bold text-primary hover:underline">나눔터 더보기 +</a>
            </div>
        </div>

        <?php if (!empty($communityPosts)): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($communityPosts as $cp): ?>
            <a href="/community/<?= e($cp['id']) ?>" class="bg-white rounded-3xl p-6 border border-outline-variant/30 shadow-soft hover:shadow-card transition-all flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between mb-3 text-xs sm:text-sm">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-surface-container text-primary">
                            <?= e($cp['category']) ?>
                        </span>
                        <span class="text-xs text-gray-400"><?= date('m.d', strtotime($cp['created_at'])) ?></span>
                    </div>
                    <h3 class="font-serif-kr text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors line-clamp-1">
                        <?= e($cp['title']) ?>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-600 line-clamp-3 leading-relaxed mb-4">
                        <?= e(strip_tags($cp['content'])) ?>
                    </p>
                </div>

                <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs sm:text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <img src="<?= e($cp['author_image'] ?: '/public/assets/images/logo.png') ?>" alt="Author" class="w-6 h-6 rounded-full object-cover">
                        <span class="font-semibold text-gray-800"><?= e($cp['author_name']) ?></span>
                    </div>
                    <span class="text-primary font-bold"><i class="far fa-comment-dots mr-1"></i><?= e($cp['comment_count']) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-10 bg-white rounded-3xl border border-outline-variant/30 p-6">
            <p class="text-xs sm:text-sm text-gray-500">아직 등록된 나눔터 글이 없습니다. 첫 이야기를 들려주세요!</p>
            <a href="/community/create" class="mt-3 inline-block px-4 py-2 bg-primary text-white rounded-full text-xs sm:text-sm font-bold">첫 글 남기기</a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- 2-Column: Notices & Gallery Preview -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-background">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Church Notices / Bulletin (6 cols) -->
        <div class="lg:col-span-6 space-y-6">
            <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                        <i class="fas fa-bullhorn text-sm"></i>
                    </div>
                    <h3 class="font-serif-kr text-xl font-bold text-gray-900">알리는 소식</h3>
                </div>
                <a href="/notices" class="text-xs sm:text-sm font-bold text-primary hover:underline">더보기 +</a>
            </div>

            <div class="bg-white rounded-2xl border border-outline-variant/30 shadow-soft divide-y divide-gray-100 overflow-hidden">
                <?php if (!empty($notices)): ?>
                    <?php foreach ($notices as $notice): ?>
                    <a href="/notices/<?= e($notice['id']) ?>" class="p-4 sm:p-5 flex items-center justify-between hover:bg-surface-container-low transition-colors group">
                        <div class="flex items-center gap-3 min-w-0 pr-3">
                            <i class="fas fa-bullhorn text-xs text-primary/60 shrink-0"></i>
                            <span class="text-sm sm:text-base font-semibold text-gray-800 truncate group-hover:text-primary transition-colors">
                                <?= e($notice['title']) ?>
                            </span>
                        </div>
                        <span class="text-xs text-gray-400 shrink-0 ml-2">
                            <?= date('m.d', strtotime($notice['created_at'])) ?>
                        </span>
                    </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-8 text-center text-sm text-gray-400">등록된 소식이 없습니다.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Gallery & Calligraphy Preview (6 cols) -->
        <div class="lg:col-span-6 space-y-6">
            <div class="flex items-center justify-between border-b border-gray-200 pb-3">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary">
                        <i class="fas fa-images text-sm"></i>
                    </div>
                    <h3 class="font-serif-kr text-xl font-bold text-gray-900">사진첩 및 말씀 캘리</h3>
                </div>
                <a href="/gallery" class="text-xs sm:text-sm font-bold text-primary hover:underline">더보기 +</a>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <?php if (!empty($galleryItems)): ?>
                    <?php foreach (array_slice($galleryItems, 0, 4) as $item): ?>
                    <a href="/gallery/<?= e($item['id']) ?>" class="group block bg-white rounded-2xl border border-outline-variant/30 overflow-hidden shadow-soft hover:shadow-card transition-all">
                        <div class="aspect-video sm:aspect-square bg-gray-100 overflow-hidden relative">
                            <img src="<?= e($item['thumbnail_url'] ?: '/public/assets/images/logo.png') ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2 left-2 px-2.5 py-0.5 rounded text-xs font-bold bg-black/60 text-white backdrop-blur-sm">
                                <?= e($item['category']) ?>
                            </span>
                        </div>
                        <div class="p-3.5">
                            <h4 class="text-xs sm:text-sm font-bold text-gray-900 truncate group-hover:text-primary"><?= e($item['title']) ?></h4>
                            <p class="text-xs text-gray-400 mt-1"><?= e($item['event_date']) ?></p>
                        </div>
                    </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-2 p-8 text-center text-sm text-gray-400 bg-white rounded-2xl border border-outline-variant/30">
                        등록된 갤러리 사진이 없습니다.
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

<!-- Location & 3 Navigation One-Click Launchers -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-surface-container to-surface-container-low text-on-surface">
    <div class="max-w-4xl mx-auto bg-white/90 backdrop-blur-md rounded-3xl p-8 sm:p-12 border border-outline-variant/40 shadow-card text-center space-y-6">
        <div class="w-14 h-14 mx-auto rounded-2xl bg-surface-container flex items-center justify-center text-primary text-2xl">
            <i class="fas fa-map-marked-alt"></i>
        </div>
        <h2 class="font-serif-kr text-2xl sm:text-3xl font-bold text-gray-900 leading-snug">
            "푸른나무교회로 오시는 길"
        </h2>
        <p class="text-base sm:text-lg text-gray-700 max-w-xl mx-auto leading-relaxed font-medium">
            전라북도 익산시 선화로73길 25 (3층)<br>
            <span class="text-xs sm:text-sm text-gray-500 font-normal">문의: 010-9559-8623 (심민보 목사)</span>
        </p>

        <!-- 3-Navigation Buttons -->
        <div class="pt-2 flex flex-wrap justify-center items-center gap-3.5">
            <a href="https://map.naver.com/v5/search/전북%20익산시%20선화로73길%2025" target="_blank" class="inline-flex items-center gap-2 bg-[#03C75A] hover:bg-[#02b350] text-white px-6 py-3 rounded-2xl text-xs sm:text-sm font-bold shadow-sm transition-all">
                <i class="fas fa-location-arrow"></i>
                <span>네이버지도 길찾기</span>
            </a>
            <a href="https://map.kakao.com/link/search/전북 익산시 선화로73길 25" target="_blank" class="inline-flex items-center gap-2 bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] px-6 py-3 rounded-2xl text-xs sm:text-sm font-bold shadow-sm transition-all">
                <i class="fas fa-car"></i>
                <span>카카오내비 안내</span>
            </a>
            <a href="/location" class="inline-flex items-center gap-2 bg-surface-container-high hover:bg-surface-container text-gray-800 px-6 py-3 rounded-2xl text-xs sm:text-sm font-bold transition-all">
                <i class="fas fa-info-circle text-primary"></i>
                <span>교통/주차 상세 안내</span>
            </a>
        </div>
    </div>
</section>

<!-- Global Video Modal Lightbox (Maximized Wide Window) -->
<div id="videoModal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-lg hidden items-center justify-center p-2 sm:p-4 md:p-6 transition-all duration-300">
    <div id="videoModalDialog" class="relative w-full max-w-6xl bg-zinc-950 rounded-3xl overflow-hidden shadow-2xl border border-white/15 flex flex-col">
        
        <!-- Modal Top Bar -->
        <div class="flex items-center justify-between px-5 sm:px-6 py-3.5 bg-zinc-900/90 text-white border-b border-zinc-800">
            <div class="flex items-center gap-2.5 min-w-0 pr-4">
                <span class="px-2 py-0.5 rounded-md bg-red-600 text-white text-[10px] font-bold shrink-0">YouTube</span>
                <h4 id="videoModalTitle" class="text-xs sm:text-sm font-bold truncate text-white">주일 설교 영상</h4>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <button type="button" onclick="toggleFullscreenModal()" class="px-2.5 py-1.5 rounded-xl bg-zinc-800 hover:bg-zinc-700 text-gray-300 hover:text-white text-xs font-semibold hidden sm:inline-flex items-center gap-1 transition-colors">
                    <i class="fas fa-expand-arrows-alt text-xs"></i>
                    <span>전체화면</span>
                </button>
                <button type="button" onclick="closeVideoModal()" class="w-8 h-8 rounded-full bg-zinc-800 hover:bg-zinc-700 text-gray-400 hover:text-white flex items-center justify-center text-lg transition-colors" aria-label="닫기">
                    &times;
                </button>
            </div>
        </div>

        <!-- Max-size 16:9 Video Frame -->
        <div class="aspect-video w-full bg-black">
            <iframe id="videoModalIframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>

    </div>
</div>

<script>
/**
 * 1. 랜딩페이지 내에서 프레임 최대 크기(전체 카드 너비 100%)로 시원하게 확대 재생
 */
function playInlineSermon(youtubeId) {
    if (!youtubeId) return;
    const thumbView = document.getElementById('sermonThumbnailView');
    const container = document.getElementById('sermonInlineContainer');
    const cardContainer = document.getElementById('sermonCardContainer');
    const playerWrapper = document.getElementById('sermonPlayerWrapper');
    const contentWrapper = document.getElementById('sermonContentWrapper');
    const collapseBtn = document.getElementById('sermonCollapseBtn');
    
    if (!container) return;

    // 1) Expand card to full wide cinema frame
    if (cardContainer) {
        cardContainer.classList.remove('lg:grid-cols-12');
        cardContainer.classList.add('grid-cols-1');
    }
    if (playerWrapper) {
        playerWrapper.classList.remove('lg:col-span-7', 'lg:rounded-tr-none', 'lg:rounded-l-3xl');
        playerWrapper.classList.add('w-full', 'rounded-t-3xl');
    }
    if (contentWrapper) {
        contentWrapper.classList.remove('lg:col-span-5');
        contentWrapper.classList.add('w-full', 'border-t', 'border-gray-100');
    }
    if (collapseBtn) {
        collapseBtn.classList.remove('hidden');
    }

    // 2) Hide thumbnail and show autoplay iframe
    thumbView.classList.add('hidden');
    container.classList.remove('hidden');
    container.innerHTML = '<iframe class="w-full h-full" src="https://www.youtube.com/embed/' + encodeURIComponent(youtubeId) + '?autoplay=1&rel=0&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
}

/**
 * 프레임 원래 크기(좌우 분할)로 축소 복귀
 */
function collapseSermonFrame() {
    const cardContainer = document.getElementById('sermonCardContainer');
    const playerWrapper = document.getElementById('sermonPlayerWrapper');
    const contentWrapper = document.getElementById('sermonContentWrapper');
    const collapseBtn = document.getElementById('sermonCollapseBtn');

    if (cardContainer) {
        cardContainer.classList.add('lg:grid-cols-12');
        cardContainer.classList.remove('grid-cols-1');
    }
    if (playerWrapper) {
        playerWrapper.classList.add('lg:col-span-7', 'lg:rounded-tr-none', 'lg:rounded-l-3xl');
        playerWrapper.classList.remove('w-full', 'rounded-t-3xl');
    }
    if (contentWrapper) {
        contentWrapper.classList.add('lg:col-span-5');
        contentWrapper.classList.remove('w-full', 'border-t', 'border-gray-100');
    }
    if (collapseBtn) {
        collapseBtn.classList.add('hidden');
    }
}

/**
 * 2. 최대창 팝업 모달로 크게 보기
 */
function openVideoModal(youtubeId, title) {
    if (!youtubeId) return;

    // If inline was playing, reset it so audio doesn't overlap
    const container = document.getElementById('sermonInlineContainer');
    const thumbView = document.getElementById('sermonThumbnailView');
    if (container && !container.classList.contains('hidden')) {
        container.innerHTML = '';
        container.classList.add('hidden');
        if (thumbView) thumbView.classList.remove('hidden');
    }
    collapseSermonFrame();

    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');
    const titleElem = document.getElementById('videoModalTitle');
    
    titleElem.innerText = title || '주일 설교 영상';
    iframe.src = 'https://www.youtube.com/embed/' + encodeURIComponent(youtubeId) + '?autoplay=1&rel=0&modestbranding=1';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

/**
 * 3. 팝업 모달 닫기
 */
function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');
    if (iframe) iframe.src = '';
    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

/**
 * 4. 모니터 전체화면 토글
 */
function toggleFullscreenModal() {
    const dialog = document.getElementById('videoModalDialog');
    if (!document.fullscreenElement) {
        if (dialog.requestFullscreen) {
            dialog.requestFullscreen();
        } else if (dialog.webkitRequestFullscreen) {
            dialog.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
}

// ESC key to close modal
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVideoModal();
    }
});
</script>
