<div class="space-y-6 max-w-5xl">
    
    <!-- Top Header Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">4주간 스케줄 기획</span>
                <span class="text-xs text-gray-500 font-semibold">주일예배 & 주보 자동 연동</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mt-1">예배 순서 섬김이 (4주 관리 대시보드)</h1>
            <p class="text-xs text-gray-500 mt-0.5">
                향후 4주간의 <strong>[대표기도, 헌금안내, 초청/안내]</strong> 담당자를 미리 배정하시면 주일예배 순서 및 온라인/출력용 주보에 오늘 섬김이와 다음 주 섬김이가 자동으로 반영됩니다.
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="/bulletin" target="_blank" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-eye"></i> <span>온라인 주보</span>
            </a>
            <a href="/bulletin/print" target="_blank" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-print"></i> <span>A4 접지 인쇄</span>
            </a>
        </div>
    </div>

    <!-- Form Container -->
    <form action="/admin/worship-servants/save" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <!-- 4-Week Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($scheduleWeeks as $week): ?>
            <?php 
                $dKey = $week['date_key'];
                $isCur = $week['is_current'];
                $isNxt = $week['is_next'];
            ?>
            <div class="bg-white rounded-3xl border <?= $isCur ? 'border-[#154212] ring-2 ring-[#154212]/20 shadow-md' : ($isNxt ? 'border-emerald-300 ring-1 ring-emerald-200 shadow-sm' : 'border-gray-200 shadow-sm') ?> p-6 space-y-4">
                
                <!-- Card Header -->
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <div class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-xl <?= $isCur ? 'bg-[#154212] text-white' : ($isNxt ? 'bg-emerald-600 text-white' : 'bg-gray-100 text-gray-700') ?> flex items-center justify-center font-bold text-xs">
                            <?= $week['week_index'] ?>주
                        </span>
                        <div>
                            <h3 class="font-bold text-sm text-gray-900"><?= e($week['formatted_date']) ?></h3>
                            <span class="text-[11px] font-semibold text-gray-500"><?= e($week['bulletin_no']) ?></span>
                        </div>
                    </div>

                    <?php if ($isCur): ?>
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-[#154212] text-white flex items-center gap-1 shadow-2xs">
                        <i class="fas fa-check-circle"></i> 오늘 주보 적용
                    </span>
                    <?php elseif ($isNxt): ?>
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-100 text-emerald-800 flex items-center gap-1 border border-emerald-300">
                        <i class="fas fa-calendar-check"></i> 다음 주 예고
                    </span>
                    <?php else: ?>
                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-500">
                        <?= $week['week_index'] ?>주차 예정
                    </span>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="schedules[<?= e($dKey) ?>][bulletin_no]" value="<?= e($week['bulletin_no']) ?>">

                <!-- 3 Servants Inputs -->
                <div class="space-y-3">
                    
                    <!-- 1. 대표기도 -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 flex items-center justify-between">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-hands-praying text-[#154212]"></i> ① 대표기도
                            </span>
                            <span class="text-[10px] text-gray-400 font-normal">주일예배 순서 4번</span>
                        </label>
                        <input 
                            type="text" 
                            name="schedules[<?= e($dKey) ?>][prayer]" 
                            value="<?= e($week['prayer']) ?>" 
                            placeholder="예: 홍길동 장로 / 김성도 권사" 
                            class="w-full px-4 py-2 rounded-2xl border border-gray-200 text-xs sm:text-sm font-semibold focus:ring-2 focus:ring-primary bg-gray-50/50 focus:bg-white transition-colors">
                    </div>

                    <!-- 2. 헌금안내 -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 flex items-center justify-between">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-hand-holding-dollar text-amber-600"></i> ② 헌금안내 (봉헌)
                            </span>
                            <span class="text-[10px] text-gray-400 font-normal">주일예배 순서 7번</span>
                        </label>
                        <input 
                            type="text" 
                            name="schedules[<?= e($dKey) ?>][offering]" 
                            value="<?= e($week['offering']) ?>" 
                            placeholder="예: 김철수 집사 / 청년부" 
                            class="w-full px-4 py-2 rounded-2xl border border-gray-200 text-xs sm:text-sm font-semibold focus:ring-2 focus:ring-primary bg-gray-50/50 focus:bg-white transition-colors">
                    </div>

                    <!-- 3. 초청/안내 -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 flex items-center justify-between">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-door-open text-sky-600"></i> ③ 초청 / 안내 위원
                            </span>
                            <span class="text-[10px] text-gray-400 font-normal">새가족 영접 및 안내</span>
                        </label>
                        <input 
                            type="text" 
                            name="schedules[<?= e($dKey) ?>][usher]" 
                            value="<?= e($week['usher']) ?>" 
                            placeholder="예: 이영희 권사 & 박민수 집사" 
                            class="w-full px-4 py-2 rounded-2xl border border-gray-200 text-xs sm:text-sm font-semibold focus:ring-2 focus:ring-primary bg-gray-50/50 focus:bg-white transition-colors">
                    </div>

                    <!-- 비고/메모 -->
                    <div>
                        <label class="block text-[11px] font-medium text-gray-400 mb-1">
                            특이사항 / 메모 (선택)
                        </label>
                        <input 
                            type="text" 
                            name="schedules[<?= e($dKey) ?>][note]" 
                            value="<?= e($week['note']) ?>" 
                            placeholder="예: 추수감사주일, 특별 찬양" 
                            class="w-full px-3 py-1.5 rounded-xl border border-gray-100 text-xs text-gray-600 bg-gray-50/30 focus:bg-white">
                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        </div>

        <!-- Submit Toolbar -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white p-5 rounded-3xl border border-gray-200 shadow-sm">
            <span class="text-xs text-gray-500 font-medium flex items-center gap-1.5">
                <i class="fas fa-info-circle text-primary"></i>
                <span>저장하시면 주일예배 10대 순서와 온라인/인쇄용 주보에 실시간 자동 연동됩니다.</span>
            </span>
            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all flex items-center justify-center gap-2">
                <i class="fas fa-save"></i>
                <span>4주간 예배 섬김이 스케줄 저장하기</span>
            </button>
        </div>

    </form>
</div>
