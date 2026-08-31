<?php
/**
 * 푸른나무교회 온라인 주보 (Web Interactive View)
 */
?>
<section class="py-10 px-4 sm:px-6 lg:px-8 bg-surface-container-low min-h-screen">
    <div class="max-w-4xl mx-auto">
        
        <!-- Header Actions: Print / PDF & Date -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 bg-white p-5 rounded-2xl shadow-sm border border-gray-200">
            <div>
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">온라인 주보</span>
                    <span class="text-xs text-gray-500 font-semibold"><?= e($bulletin['bulletin_no']) ?></span>
                </div>
                <h1 class="font-serif-kr text-xl sm:text-2xl font-bold text-gray-900 mt-1">
                    <?= e($bulletin['date_str']) ?> 주일예배 온라인 주보
                </h1>
            </div>
            
            <div class="flex items-center gap-2">
                <button type="button" onclick="copyToClipboard(window.location.href, '웹주보 링크가 복사되었습니다! 💌')" class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-[#154212] hover:text-white text-gray-700 rounded-xl text-xs font-bold transition-all shadow-xs" title="웹주보 링크 복사 및 공유">
                    <i class="fas fa-share-nodes text-primary group-hover:text-white"></i>
                    <span>웹주보 공유</span>
                </button>
            </div>
        </div>

        <!-- Main Bulletin Paper Card -->
        <div class="bg-white rounded-3xl shadow-card border border-outline-variant/30 overflow-hidden">
            
            <!-- Bulletin Top Header Banner -->
            <div class="bg-gradient-to-r from-[#154212] via-[#256020] to-[#154212] text-white p-6 sm:p-8 text-center relative">
                <div class="flex items-center justify-center gap-2 mb-2">
                    <img src="/public/assets/images/logo.png" alt="Logo" class="w-8 h-8 object-contain">
                    <span class="font-serif-kr font-bold text-xl sm:text-2xl tracking-tight">푸른나무교회</span>
                </div>
                <p class="text-xs text-green-100 font-serif-kr italic">
                    "<?= e($bulletin['main_slogan']) ?>"
                </p>
                <div class="mt-4 pt-3 border-t border-white/20 flex flex-wrap items-center justify-center gap-4 text-[11px] text-green-100">
                    <span><strong>담임목사:</strong> <?= e($bulletin['pastor_name']) ?></span>
                    <span><strong>예배시간:</strong> 매주 주일 오전 11:00</span>
                    <span><strong>대표전화:</strong> <?= e($bulletin['phone']) ?></span>
                </div>
            </div>

            <!-- Memory Verse Box -->
            <div class="bg-amber-50/70 border-b border-amber-100 p-5 text-center">
                <span class="text-[11px] font-bold text-amber-800 uppercase tracking-wider block mb-1">🌿 이번 주 암송 구절</span>
                <p class="font-serif-kr text-sm sm:text-base font-bold text-amber-950 leading-relaxed">
                    <?= e($bulletin['memory_verse']['verse']) ?>
                </p>
                <span class="text-xs text-amber-800 font-semibold block mt-1">- <?= e($bulletin['memory_verse']['reference']) ?> -</span>
            </div>

            <div class="p-6 sm:p-8 space-y-8">
                
                <!-- 1. 주일 설교 말씀 섹션 -->
                <div class="bg-surface-container-low p-6 rounded-2xl border border-gray-100">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-primary flex items-center gap-1.5">
                            <i class="fas fa-book-bible"></i> 주일 말씀
                        </span>
                        <?php if (!empty($bulletin['sermon']['youtube_id'])): ?>
                        <a href="/sermons/<?= e($bulletin['sermon']['id'] ?? '') ?>" class="text-[11px] font-bold text-primary hover:underline flex items-center gap-1">
                            <i class="fab fa-youtube text-red-600"></i> 설교 영상 시청
                        </a>
                        <?php endif; ?>
                    </div>
                    <h2 class="font-serif-kr text-lg sm:text-xl font-bold text-gray-900 mb-2">
                        <?= e($bulletin['sermon']['title']) ?>
                    </h2>
                    <div class="flex items-center gap-3 text-xs text-gray-600 font-medium mb-3">
                        <span><strong>설교:</strong> <?= e($bulletin['sermon']['preacher']) ?></span>
                        <span>|</span>
                        <span><strong>본문:</strong> <?= e($bulletin['sermon']['scripture']) ?></span>
                    </div>
                    <?php if (!empty($bulletin['sermon']['content'])): ?>
                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed bg-white p-4 rounded-xl border border-gray-200">
                        <?= nl2br(e($bulletin['sermon']['content'])) ?>
                    </p>
                    <?php endif; ?>
                </div>

                <!-- 2. 주일 예배 순서 (Order of Worship) -->
                <div>
                    <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-200">
                        <h3 class="font-serif-kr text-lg font-bold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-church text-primary text-base"></i>
                            <span>주일예배 순서 (오전 11:00)</span>
                        </h3>
                        <span class="text-xs text-gray-500 font-medium">* 표는 일어서서 경건히 참여합니다</span>
                    </div>

                    <!-- Worship Order Table Card (Zebra Shading & Centered Details) -->
                    <div class="max-w-3xl mx-auto border border-gray-200/90 rounded-3xl overflow-hidden shadow-sm bg-white">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-[#154212] text-white font-bold text-xs sm:text-sm">
                                <tr>
                                    <th class="py-3.5 pl-5 sm:pl-7 w-12 sm:w-14 text-center">순서</th>
                                    <th class="py-3.5 px-3 sm:px-4 w-32 sm:w-40 text-left">순서명</th>
                                    <th class="py-3.5 px-3 sm:px-4 text-center">찬송 / 교독문 / 말씀 / 상세내용</th>
                                    <th class="py-3.5 pr-5 sm:pr-7 w-28 sm:w-36 text-right">인도 / 담당</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 font-serif-kr text-sm sm:text-base">
                                <?php foreach ($bulletin['worship_order'] as $idx => $item): ?>
                                <?php 
                                    $cVal = trim((string)($item['content'] ?? $item['desc'] ?? ''));
                                    $isEven = ($idx % 2 === 1);
                                ?>
                                <tr class="<?= $isEven ? 'bg-[#f4f7f3]/80' : 'bg-white' ?> hover:bg-green-50/60 transition-colors">
                                    <!-- 순서 번호 -->
                                    <td class="py-3.5 pl-5 sm:pl-7 text-center font-bold text-gray-400 text-xs sm:text-sm">
                                        <?= e($item['order'] ?? ($idx + 1)) ?>
                                    </td>

                                    <!-- 순서명 -->
                                    <td class="py-3.5 px-3 sm:px-4 font-bold text-gray-950 tracking-wider whitespace-nowrap">
                                        <?= e($item['name']) ?>
                                    </td>

                                    <!-- 가운데 상세 내용 (가운데 정렬) -->
                                    <td class="py-3.5 px-3 sm:px-4 text-center text-xs sm:text-sm font-semibold">
                                        <?php if (!empty($cVal)): ?>
                                            <span class="inline-block text-[#154212] bg-emerald-50/90 px-3 py-1 rounded-xl border border-emerald-200/70 shadow-2xs">
                                                <?= e($cVal) ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- 담당 / 인도 -->
                                    <td class="py-3.5 pr-5 sm:pr-7 text-right text-primary font-black whitespace-nowrap text-xs sm:text-sm tracking-wide">
                                        <?= e($item['lead']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 3. 교회 소식 및 알리는 말씀 (AI 정제 문체 적용) -->
                <div>
                    <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-200">
                        <h3 class="font-serif-kr text-base font-bold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-bullhorn text-primary text-sm"></i>
                            <span>알리는 소식</span>
                        </h3>
                        <span class="text-[10px] text-green-700 font-bold bg-green-50 px-2 py-0.5 rounded-full">교회 주요 소식</span>
                    </div>
                    
                    <div class="space-y-3">
                        <?php foreach ($bulletin['news'] as $idx => $news): ?>
                        <div class="bg-gray-50/70 hover:bg-gray-50 p-4 rounded-2xl border border-gray-200/80 transition-all">
                            <div class="flex items-center gap-2 mb-1.5">
                                <span class="w-5 h-5 rounded-full bg-primary text-white text-[11px] font-bold flex items-center justify-center shrink-0">
                                    <?= $idx + 1 ?>
                                </span>
                                <h4 class="font-bold text-xs sm:text-sm text-gray-900"><?= e($news['title']) ?></h4>
                            </div>
                            <p class="text-xs text-gray-700 leading-relaxed pl-7">
                                <?= nl2br(e($news['content'])) ?>
                            </p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- 4. 이번 주 및 다음 주 섬김 봉사자 안내 -->
                <div class="space-y-3">
                    <!-- 이번 주 섬김이 -->
                    <div class="bg-surface-container-low p-5 rounded-2xl border border-gray-200">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="font-bold text-xs text-gray-800 flex items-center gap-1.5">
                                <i class="fas fa-hands-holding-child text-primary"></i> 이번 주 예배 섬김이
                            </h4>
                            <span class="text-xs text-gray-500 font-semibold"><?= e($bulletin['bulletin_no']) ?></span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5 text-center text-xs">
                            <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-2xs">
                                <span class="text-[11px] text-gray-400 block mb-0.5">대표기도</span>
                                <span class="font-bold text-primary text-sm"><?= e($bulletin['current_week_servants']['servants']['prayer'] ?? '담당자') ?></span>
                            </div>
                            <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-2xs">
                                <span class="text-[11px] text-gray-400 block mb-0.5">헌금안내</span>
                                <span class="font-bold text-primary text-sm"><?= e($bulletin['current_week_servants']['servants']['offering'] ?? '봉사팀') ?></span>
                            </div>
                            <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-2xs">
                                <span class="text-[11px] text-gray-400 block mb-0.5">초청/안내</span>
                                <span class="font-bold text-primary text-sm"><?= e($bulletin['current_week_servants']['servants']['usher'] ?? '안내위원') ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- 다음 주 섬김이 예고 -->
                    <?php 
                        $nxtInfo = $bulletin['next_week_servants'] ?? [];
                        $nxtServants = $nxtInfo['servants'] ?? [];
                    ?>
                    <div class="bg-emerald-50/60 p-4 rounded-2xl border border-emerald-200">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-xs text-emerald-950 flex items-center gap-1.5">
                                <i class="fas fa-calendar-check text-emerald-700"></i> 다음 주 예배 섬김이 예고
                            </h4>
                            <span class="text-xs text-emerald-800 font-bold"><?= e($nxtInfo['formatted_date'] ?? '다음 주일') ?> (<?= e($nxtInfo['bulletin_no'] ?? '') ?>)</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 text-center text-xs">
                            <div class="bg-white/80 p-2.5 rounded-xl border border-emerald-100">
                                <span class="text-[11px] text-gray-500 block mb-0.5">대표기도</span>
                                <span class="font-bold text-emerald-900"><?= e($nxtServants['prayer'] ?: '예정') ?></span>
                            </div>
                            <div class="bg-white/80 p-2.5 rounded-xl border border-emerald-100">
                                <span class="text-[11px] text-gray-500 block mb-0.5">헌금안내</span>
                                <span class="font-bold text-emerald-900"><?= e($nxtServants['offering'] ?: '예정') ?></span>
                            </div>
                            <div class="bg-white/80 p-2.5 rounded-xl border border-emerald-100">
                                <span class="text-[11px] text-gray-500 block mb-0.5">초청/안내</span>
                                <span class="font-bold text-emerald-900"><?= e($nxtServants['usher'] ?: '예정') ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bulletin Footer -->
            <div class="bg-gray-50 border-t border-gray-200 p-6 text-center text-xs text-gray-500 space-y-1">
                <p class="font-bold text-gray-700">푸른나무교회</p>
                <p><?= e($bulletin['address']) ?> | Tel. <?= e($bulletin['phone']) ?></p>
                <p class="text-[11px] text-gray-400 pt-2">© <?= date('Y') ?> 푸른나무교회. 지친 일상 속 작은 휴식과 참된 회복의 공동체</p>
            </div>

        </div>

    </div>
</section>