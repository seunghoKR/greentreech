<div class="space-y-8">
    
    <!-- Welcome Header & Live Banner Toggle -->
    <div class="bg-gradient-to-r from-[#154212] to-[#256020] rounded-3xl p-6 sm:p-8 text-white shadow-card flex flex-col md:flex-row md:items-center justify-between gap-6">
        <?php 
            $curAdmin = \App\Core\Auth::user(); 
            $adminDisplayName = $curAdmin['name'] ?? '관리자';
            $adminRoleName = $curAdmin['role'] ?? '관리자';
            $isSuperAdmin = ($adminRoleName === '담임목사' || $adminRoleName === '담임목사 (최고관리자)' || $adminRoleName === '사이트 개발자 (최고관리자)' || (int)($curAdmin['id'] ?? 0) === 1);
        ?>
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 text-xs font-semibold backdrop-blur-sm">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-ping"></span>
                <span><?= e($adminRoleName) ?> 모드</span>
                <span class="text-white/40">·</span>
                <span class="text-emerald-200">버전 v2.6.0 (최종 업데이트: 2026.08.29)</span>
            </div>
            <h1 class="font-serif-kr text-2xl sm:text-3xl font-bold leading-snug">
                <?= e($adminDisplayName) ?>님, 평안한 하루 되세요! 🌿
            </h1>
            <p class="text-xs sm:text-sm text-white/80">
                성도님들의 사역 일정을 관리하고 시스템을 안전하게 운영하세요.
            </p>
        </div>

        <!-- Header Actions (Live Stream Toggle & Web Link) -->
        <div class="flex flex-wrap items-center gap-2 sm:gap-3 shrink-0">
            <!-- Website Guide Book Button -->
            <a href="/admin/guide" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-amber-400/30 hover:bg-amber-400/50 text-white border border-amber-300/50 rounded-2xl text-xs font-bold shadow-sm transition-all flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-book-open text-amber-300 text-xs"></i>
                <span>📖 사용 설명서</span>
            </a>

            <?php if ($isSuperAdmin): ?>
            <!-- One-Click DB Backup Download Button -->
            <a href="/admin/backup-db" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-blue-500/30 hover:bg-blue-500/50 text-white border border-blue-400/40 rounded-2xl text-xs font-bold shadow-sm transition-all flex items-center gap-1.5 whitespace-nowrap" title="데이터베이스 전체 SQL 백업 다운로드">
                <i class="fas fa-database text-blue-300 text-xs"></i>
                <span>💾 DB 백업</span>
            </a>

            <!-- Bulletin Planning Quick Button (담임목사 전용) -->
            <a href="/admin/bulletin-settings" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-green-500/30 hover:bg-green-500/50 text-white border border-green-400/40 rounded-2xl text-xs font-bold shadow-sm transition-all flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-clipboard-list text-green-300 text-xs"></i>
                <span>주일예배 & 주보 기획</span>
            </a>

            <!-- Live Streaming Switch Button (담임목사 전용) -->
            <a href="/admin/live-toggle" class="px-3 sm:px-4 py-2 sm:py-2.5 rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 whitespace-nowrap <?= $liveStreamActive ? 'bg-red-500 hover:bg-red-600 text-white animate-pulse' : 'bg-white/20 hover:bg-white/30 text-white' ?>">
                <span class="w-2 h-2 rounded-full <?= $liveStreamActive ? 'bg-white' : 'bg-gray-400' ?>"></span>
                <span>실시간 중계: <strong><?= $liveStreamActive ? 'ON' : 'OFF' ?></strong></span>
            </a>
            <?php endif; ?>

            <a href="/" target="_blank" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-white hover:bg-gray-100 text-[#154212] rounded-2xl text-xs font-bold shadow-sm transition-all flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-external-link-alt text-[10px]"></i> <span>홈페이지</span>
            </a>
        </div>
    </div>

    <!-- 💡 Quick Help Guide Banner for Pastors & Admins -->
    <div class="bg-gradient-to-r from-amber-500/10 via-amber-400/5 to-transparent border border-amber-200/80 rounded-3xl p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3.5">
            <div class="w-11 h-11 rounded-2xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl shrink-0 shadow-xs">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div>
                <h3 class="font-bold text-sm text-gray-900">홈페이지 사용 설명서 (가이드북)</h3>
                <p class="text-xs text-gray-600 mt-0.5">주간 사역 루틴, 스마트 주보, 4주 섬김이, 카톡 알림 및 환영 메시지, 유튜브 1초 동기화 방법을 확인하세요.</p>
            </div>
        </div>
        <a href="/admin/guide" class="px-4 py-2.5 bg-amber-600 hover:bg-amber-700 text-white rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center justify-center gap-1.5 shrink-0">
            <i class="fas fa-book-open text-xs"></i>
            <span>설명서 열어보기</span>
            <i class="fas fa-arrow-right text-[10px]"></i>
        </a>
    </div>

    <!-- 🚨 Section 1: 즉시 처리가 필요한 긴급 목회 업무 (To-Do Alert Cards) -->
    <div>
        <div class="flex items-center gap-2 mb-4">
            <i class="fas fa-bell text-red-500 text-sm"></i>
            <h2 class="text-sm font-bold text-gray-800 uppercase tracking-wider">오늘 처리해야 할 목회 사역</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <!-- Alert 1: Pending Inquiries -->
            <div class="bg-white rounded-3xl p-5 border <?= ($stats['pendingInquiries'] > 0) ? 'border-red-200 bg-red-50/30' : 'border-gray-200/80' ?> shadow-soft flex items-center justify-between">
                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl <?= ($stats['pendingInquiries'] > 0) ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-400' ?> flex items-center justify-center text-xl shrink-0">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-500 block">미확인 새가족 / 기도 접수</span>
                        <span class="text-xl font-bold <?= ($stats['pendingInquiries'] > 0) ? 'text-red-600' : 'text-gray-900' ?>">
                            <?= e($stats['pendingInquiries']) ?>건
                        </span>
                    </div>
                </div>
                <a href="/admin/inquiries" class="px-3.5 py-2 <?= ($stats['pendingInquiries'] > 0) ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' ?> rounded-xl text-xs font-bold transition-all shadow-xs shrink-0">
                    <?= ($stats['pendingInquiries'] > 0) ? '즉시 확인' : '목록 보기' ?>
                </a>
            </div>

            <!-- Alert 2: Member Approval Waiting -->
            <div class="bg-white rounded-3xl p-5 border <?= ($stats['pendingMembers'] > 0) ? 'border-amber-200 bg-amber-50/30' : 'border-gray-200/80' ?> shadow-soft flex items-center justify-between">
                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl <?= ($stats['pendingMembers'] > 0) ? 'bg-amber-100 text-amber-600' : 'bg-gray-100 text-gray-400' ?> flex items-center justify-center text-xl shrink-0">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-500 block">성도 등급 승인 대기</span>
                        <span class="text-xl font-bold <?= ($stats['pendingMembers'] > 0) ? 'text-amber-600' : 'text-gray-900' ?>">
                            <?= e($stats['pendingMembers']) ?>명
                        </span>
                    </div>
                </div>
                <a href="/admin/members" class="px-3.5 py-2 <?= ($stats['pendingMembers'] > 0) ? 'bg-amber-600 hover:bg-amber-700 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' ?> rounded-xl text-xs font-bold transition-all shadow-xs shrink-0">
                    <?= ($stats['pendingMembers'] > 0) ? '성도 승인' : '회원 목록' ?>
                </a>
            </div>

            <!-- Alert 3: Today's Community Posts -->
            <div class="bg-white rounded-3xl p-5 border border-gray-200/80 shadow-soft flex items-center justify-between">
                <div class="flex items-center gap-3.5">
                    <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center text-xl shrink-0">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-gray-500 block">오늘 등록된 나눔터 글</span>
                        <span class="text-xl font-bold text-gray-900"><?= e($stats['todayCommunity']) ?>건</span>
                    </div>
                </div>
                <a href="/admin/community" class="px-3.5 py-2 bg-primary hover:bg-primary-container text-white rounded-xl text-xs font-bold transition-all shadow-xs shrink-0">
                    나눔터 확인
                </a>
            </div>

        </div>
    </div>

    <!-- ⚡ Section 2: 원클릭 사역 빠른 실행 (Quick Actions Bar) -->
    <div class="bg-white rounded-3xl border border-gray-200/80 p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <i class="fas fa-bolt text-yellow-500"></i>
                <h2 class="text-sm font-bold text-gray-800 uppercase tracking-wider">원클릭 사역 빠른 실행 (Quick Actions)</h2>
            </div>
            <?php if (!empty($lastSync)): ?>
            <span class="text-[11px] text-gray-400">
                유튜브 최근 동기화: <?= date('m.d H:i', strtotime($lastSync)) ?>
            </span>
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
            
            <!-- Quick 1: YouTube Sync -->
            <a href="/sermons/sync" class="p-3.5 rounded-2xl bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 text-center transition-all flex flex-col items-center gap-1.5 group">
                <i class="fab fa-youtube text-2xl text-red-600 group-hover:scale-110 transition-transform"></i>
                <span class="text-xs font-bold">유튜브 영상 동기화</span>
                <span class="text-[10px] text-red-500">1초 만에 자동 수집</span>
            </a>

            <!-- Quick 2: Add Bulletin -->
            <a href="/admin/notices/create" class="p-3.5 rounded-2xl bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-200 text-center transition-all flex flex-col items-center gap-1.5 group">
                <i class="fas fa-file-invoice text-2xl text-amber-600 group-hover:scale-110 transition-transform"></i>
                <span class="text-xs font-bold">이번 주 주보 등록</span>
                <span class="text-[10px] text-amber-600">주보 이미지/PDF</span>
            </a>

            <!-- Quick 3: Add Sermon -->
            <a href="/admin/sermons/create" class="p-3.5 rounded-2xl bg-blue-50 hover:bg-blue-100 text-blue-800 border border-blue-200 text-center transition-all flex flex-col items-center gap-1.5 group">
                <i class="fas fa-video text-2xl text-blue-600 group-hover:scale-110 transition-transform"></i>
                <span class="text-xs font-bold">새 주일설교 등록</span>
                <span class="text-[10px] text-blue-600">설교 본문 및 영상</span>
            </a>

            <!-- Quick 4: Add Gallery -->
            <a href="/admin/gallery/create" class="p-3.5 rounded-2xl bg-purple-50 hover:bg-purple-100 text-purple-800 border border-purple-200 text-center transition-all flex flex-col items-center gap-1.5 group">
                <i class="fas fa-images text-2xl text-purple-600 group-hover:scale-110 transition-transform"></i>
                <span class="text-xs font-bold">사진첩 / 캘리 등록</span>
                <span class="text-[10px] text-purple-600">교회 행사 & 말씀작품</span>
            </a>

            <!-- Quick 5: Add Notice -->
            <a href="/admin/notices/create" class="p-3.5 rounded-2xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 text-center transition-all flex flex-col items-center gap-1.5 group">
                <i class="fas fa-bullhorn text-2xl text-emerald-600 group-hover:scale-110 transition-transform"></i>
                <span class="text-xs font-bold">교회 공지사항 등록</span>
                <span class="text-[10px] text-emerald-600">모임 및 행사 알림</span>
            </a>

        </div>
    </div>

    <!-- 📊 Section 3: 핵심 현황 통계 카드 (Metrics 6-Grid) -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        
        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-soft">
            <span class="text-xs text-gray-500 font-semibold block mb-1">성도 회원</span>
            <span class="text-2xl font-bold text-gray-900"><?= e($stats['totalMembers']) ?></span>
            <span class="text-[11px] text-primary block mt-1"><i class="fas fa-user-check mr-0.5"></i>카톡 연동</span>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-soft">
            <span class="text-xs text-gray-500 font-semibold block mb-1">주일 설교</span>
            <span class="text-2xl font-bold text-gray-900"><?= e($stats['totalSermons']) ?></span>
            <span class="text-[11px] text-secondary block mt-1"><i class="fas fa-play mr-0.5"></i>영상 말씀</span>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-soft">
            <span class="text-xs text-gray-500 font-semibold block mb-1">말씀 쇼츠</span>
            <span class="text-2xl font-bold text-red-600"><?= e($stats['totalShorts']) ?></span>
            <span class="text-[11px] text-red-500 block mt-1"><i class="fas fa-bolt mr-0.5"></i>Shorts 9:16</span>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-soft">
            <span class="text-xs text-gray-500 font-semibold block mb-1">사진 / 캘리</span>
            <span class="text-2xl font-bold text-gray-900"><?= e($stats['totalGallery']) ?></span>
            <span class="text-[11px] text-purple-600 block mt-1"><i class="fas fa-camera mr-0.5"></i>갤러리</span>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-soft">
            <span class="text-xs text-gray-500 font-semibold block mb-1">나눔터 소통</span>
            <span class="text-2xl font-bold text-gray-900"><?= e($stats['todayCommunity']) ?></span>
            <span class="text-[11px] text-amber-600 block mt-1"><i class="fas fa-comments mr-0.5"></i>성도 피드</span>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-soft">
            <span class="text-xs text-gray-500 font-semibold block mb-1">카톡 알림 로그</span>
            <span class="text-2xl font-bold text-gray-900"><?= e($stats['totalNotifications']) ?></span>
            <span class="text-[11px] text-green-600 block mt-1"><i class="fas fa-bell mr-0.5"></i>발송 완료</span>
        </div>

    </div>

    <!-- 📅 Section 4: 주간 목회 사역 루틴 체크리스트 (Weekly Ministry Workflow) -->
    <div class="bg-white rounded-3xl border border-gray-200/80 p-6 sm:p-8 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <i class="fas fa-calendar-check text-primary"></i>
                <h2 class="text-sm font-bold text-gray-800 uppercase tracking-wider">주간 목회 사역 관리 가이드 (Weekly Routine)</h2>
            </div>
            <span class="text-xs font-semibold text-primary bg-surface-container px-3 py-1 rounded-full">
                푸른나무교회 목회 루틴
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-100 text-blue-800">목 / 금요일</span>
                    <i class="fas fa-book-bible text-gray-400 text-xs"></i>
                </div>
                <h4 class="font-bold text-xs text-gray-900">주일 설교 준비 & 등록</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    이번 주 주일 설교 본문 말씀과 제목을 홈페이지에 등록하고 성도님들이 묵상할 수 있도록 준비합니다.
                </p>
            </div>

            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800">토요일</span>
                    <i class="fas fa-newspaper text-gray-400 text-xs"></i>
                </div>
                <h4 class="font-bold text-xs text-gray-900">주보 등록 & 청년모임 안내</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    이번 주 주보 이미지/PDF를 [알리는 말씀]에 등록하고, 청년 BIBLE TIME 안내 공지를 게시합니다.
                </p>
            </div>

            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-800">주일 (예배 당일)</span>
                    <i class="fas fa-tower-broadcast text-gray-400 text-xs"></i>
                </div>
                <h4 class="font-bold text-xs text-gray-900">실시간 예배 중계 & 새가족</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    주일 오전 10:30 라이브 배너를 활성화하고, 예배 후 현장 새가족 접수 내역을 확인합니다.
                </p>
            </div>

            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-100 space-y-2">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-green-100 text-green-800">월 / 화요일</span>
                    <i class="fas fa-camera-retro text-gray-400 text-xs"></i>
                </div>
                <h4 class="font-bold text-xs text-gray-900">사진첩 나눔 & 유튜브 동기화</h4>
                <p class="text-[11px] text-gray-400 leading-relaxed">
                    주일 행사/친교 사진을 사진첩에 올리고, 유튜브에 업로드된 새 설교/쇼츠를 [원클릭 동기화]합니다.
                </p>
            </div>

        </div>
    </div>

    <!-- 🔍 Section 5: 최근 접수 & 나눔터 실시간 모니터링 (2-Column Grid) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Recent Inquiries (6 cols) -->
        <div class="lg:col-span-6 space-y-4">
            <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <i class="fas fa-envelope-open-text text-primary"></i>
                    <span>최근 새가족 / 기도·상담 접수</span>
                </h3>
                <a href="/admin/inquiries" class="text-xs font-bold text-primary hover:underline">전체보기 +</a>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-soft divide-y divide-gray-100 overflow-hidden">
                <?php if (!empty($recentInquiries)): ?>
                    <?php foreach ($recentInquiries as $inq): ?>
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50/80 transition-colors">
                        <div class="space-y-1 min-w-0 pr-3">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold <?= $inq['type'] === '새가족등록' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' ?>">
                                    <?= e($inq['type']) ?>
                                </span>
                                <span class="font-bold text-xs text-gray-900"><?= e($inq['name']) ?> 성도님</span>
                                <span class="text-[11px] text-gray-400">(<?= e($inq['phone']) ?>)</span>
                            </div>
                            <p class="text-xs text-gray-600 line-clamp-1">
                                <?= e(strip_tags($inq['content'])) ?>
                            </p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold <?= $inq['status'] === '접수' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-600' ?>">
                                <?= e($inq['status']) ?>
                            </span>
                            <a href="/admin/inquiries/<?= e($inq['id']) ?>" class="p-1.5 text-gray-400 hover:text-primary" title="상세보기">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-8 text-center text-xs text-gray-400">접수된 문의 내역이 없습니다.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Recent Community Posts (6 cols) -->
        <div class="lg:col-span-6 space-y-4">
            <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <i class="fas fa-comments text-amber-500"></i>
                    <span>최근 성도 나눔터 새 글</span>
                </h3>
                <a href="/admin/community" class="text-xs font-bold text-primary hover:underline">전체보기 +</a>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200/80 shadow-soft divide-y divide-gray-100 overflow-hidden">
                <?php if (!empty($recentCommunity)): ?>
                    <?php foreach ($recentCommunity as $post): ?>
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50/80 transition-colors">
                        <div class="space-y-1 min-w-0 pr-3">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container text-primary">
                                    <?= e($post['category']) ?>
                                </span>
                                <span class="font-bold text-xs text-gray-900 truncate"><?= e($post['title']) ?></span>
                            </div>
                            <div class="text-[11px] text-gray-400 flex items-center gap-2">
                                <span>작성자: <?= e($post['author_name']) ?></span>
                                <span>• <?= date('m.d H:i', strtotime($post['created_at'])) ?></span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="text-xs text-primary font-bold"><i class="far fa-comment-dots mr-1"></i><?= e($post['comment_count']) ?></span>
                            <a href="/community/<?= e($post['id']) ?>" target="_blank" class="p-1.5 text-gray-400 hover:text-primary" title="게시글 보기">
                                <i class="fas fa-external-link-alt text-xs"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-8 text-center text-xs text-gray-400">등록된 나눔터 글이 없습니다.</div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
