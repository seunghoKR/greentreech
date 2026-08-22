<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Pastor Introduction</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">섬기는 사람들</h1>
        <p class="text-sm text-gray-600 mt-2">푸른나무교회 공동체를 따뜻한 사랑으로 섬기는 목회자를 소개합니다</p>
    </div>

    <!-- Sub Nav -->
    <?php require __DIR__ . '/nav.php'; ?>

    <!-- Pastor Profile Card -->
    <div class="bg-white rounded-3xl p-8 sm:p-12 border border-outline-variant/40 shadow-soft mb-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 items-center">
            
            <!-- Photo (5 cols) -->
            <div class="md:col-span-5 text-center">
                <div class="relative w-56 sm:w-64 h-80 sm:h-96 mx-auto rounded-3xl bg-surface-container overflow-hidden shadow-card border-4 border-white">
                    <img src="/public/assets/images/pastor.png" 
                         alt="심민보 담임목사" 
                         class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-500">
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/60 to-transparent p-4 text-white">
                        <span class="text-xs font-bold block">담임목사</span>
                        <span class="text-lg font-serif-kr font-extrabold">심민보 목사</span>
                    </div>
                </div>
            </div>

            <!-- Details (7 cols) -->
            <div class="md:col-span-7 space-y-6">
                <div>
                    <span class="inline-block px-3.5 py-1 rounded-full text-xs font-bold bg-surface-container text-primary mb-2 shadow-sm">
                        <i class="fas fa-cross mr-1 text-[10px]"></i> 담임목사 소개
                    </span>
                    <h2 class="font-serif-kr text-2xl sm:text-3xl font-bold text-gray-900 leading-tight">
                        심민보 <span class="text-xl font-medium text-secondary">목사</span>
                    </h2>
                    <p class="text-xs text-gray-500 mt-1 font-serif-kr">
                        "하나님의 사랑 안에서 한 영혼 한 영혼을 기쁨으로 품고 섬깁니다"
                    </p>
                </div>

                <!-- Education -->
                <div class="bg-surface-container-low/50 p-4 rounded-2xl border border-outline-variant/20">
                    <h3 class="font-bold text-xs sm:text-sm text-primary mb-2 flex items-center gap-2">
                        <i class="fas fa-graduation-cap text-secondary"></i> 학력
                    </h3>
                    <ul class="text-xs sm:text-sm text-gray-700 space-y-1.5 list-disc list-inside">
                        <li>침례신학대학 (B.A)</li>
                        <li>Canadian Southern Baptist Seminary (M.div)</li>
                    </ul>
                </div>

                <!-- Ministry Career -->
                <div class="bg-surface-container-low/50 p-4 rounded-2xl border border-outline-variant/20">
                    <h3 class="font-bold text-xs sm:text-sm text-primary mb-2 flex items-center gap-2">
                        <i class="fas fa-briefcase text-secondary"></i> 사역 경력
                    </h3>
                    <ul class="text-xs sm:text-sm text-gray-700 space-y-1.5 list-disc list-inside">
                        <li><strong class="text-gray-500">전)</strong> The New Way Baptist Church (Edmonton Canada) 담임목사</li>
                        <li><strong class="text-primary font-bold">현)</strong> 푸른나무교회 (익산) 담임목사</li>
                    </ul>
                </div>

                <!-- Action Button -->
                <div class="pt-2">
                    <a href="/inquiry?type=상담문의" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-container text-white px-5 py-2.5 rounded-full text-xs font-bold shadow-sm transition-all">
                        <i class="fas fa-comments text-secondary-container"></i>
                        <span>목사님과 1:1 기도 / 상담 신청</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Greeting Callout -->
    <div class="bg-surface-container-low border-l-4 border-primary rounded-2xl p-6 sm:p-8 text-center shadow-soft">
        <p class="font-serif-kr text-base sm:text-lg font-bold text-primary leading-relaxed">
            "하나님의 따뜻한 사랑 안에서 성도 한 분 한 분을 기쁨으로 섬기겠습니다."
        </p>
        <p class="text-xs text-gray-500 mt-2 font-serif-kr">
            푸른나무교회 담임목사 <strong>심민보</strong>
        </p>
    </div>

</div>
