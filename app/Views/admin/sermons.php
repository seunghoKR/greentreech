<div class="space-y-6 max-w-6xl">
    
    <!-- Top Header Bar -->
    <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-7 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">유튜브 CMS</span>
                <span class="text-xs text-gray-500 font-semibold">총 <?= number_format($categoryCounts['전체'] ?? $pagination['total'] ?? 0) ?>개 영상</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mt-1">유튜브 영상 분류 및 설교 관리 대시보드</h1>
            <p class="text-xs text-gray-500 mt-0.5">교회 공식 유튜브(@greentreechurch0405) 영상을 가져와 각 카테고리(설교, 쇼츠, 애찬, 간증 등)로 직접 분류하고 관리합니다.</p>
        </div>

        <div class="flex flex-wrap items-center gap-2 shrink-0">
            <!-- YouTube Sync Button -->
            <a href="/admin/sermons/sync" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 whitespace-nowrap">
                <i class="fab fa-youtube"></i>
                <span>유튜브 영상 최신 동기화</span>
            </a>
            <!-- New Video Manual Add -->
            <a href="/admin/sermons/create" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-plus"></i>
                <span>직접 등록</span>
            </a>
        </div>
    </div>

    <!-- Category Filter Tabs (Wrap neatly inside frame without horizontal overflow) -->
    <div class="bg-white p-4 rounded-3xl border border-gray-200 shadow-sm flex flex-wrap items-center gap-2">
        <?php 
            $cats = [
                '전체' => ['icon' => 'fas fa-layer-group', 'label' => '전체 영상', 'count' => $categoryCounts['전체'] ?? 0],
                '설교 영상' => ['icon' => 'text-green-700 fas fa-book-bible', 'label' => '설교 영상', 'count' => $categoryCounts['설교 영상'] ?? 0],
                '예배 영상' => ['icon' => 'text-sky-600 fas fa-cross', 'label' => '예배 영상', 'count' => $categoryCounts['예배 영상'] ?? 0],
                '듣는 성경' => ['icon' => 'text-indigo-600 fas fa-headphones', 'label' => '듣는 성경', 'count' => $categoryCounts['듣는 성경'] ?? 0],
                '설교 쇼츠' => ['icon' => 'text-amber-500 fas fa-bolt', 'label' => '설교 쇼츠', 'count' => $categoryCounts['설교 쇼츠'] ?? 0],
                '예배 쇼츠' => ['icon' => 'text-pink-500 fas fa-fire', 'label' => '예배 쇼츠', 'count' => $categoryCounts['예배 쇼츠'] ?? 0],
                '교회 행사/일상' => ['icon' => 'text-emerald-600 fas fa-utensils', 'label' => '교회 행사/일상', 'count' => $categoryCounts['교회 행사/일상'] ?? 0],
                '기타' => ['icon' => 'text-purple-500 fas fa-shapes', 'label' => '기타', 'count' => $categoryCounts['기타'] ?? 0],
            ];
        ?>

        <?php foreach ($cats as $catKey => $catInfo): ?>
            <?php $isActive = ($currentCategory ?? '전체') === $catKey; ?>
            <a href="/admin/sermons?category=<?= urlencode($catKey) ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" 
               class="px-3.5 py-2 rounded-2xl border text-xs font-bold transition-all flex items-center gap-1.5 shadow-2xs whitespace-nowrap <?= $isActive ? 'bg-primary text-white border-primary ring-2 ring-primary/20 font-extrabold' : 'bg-gray-50/80 border-gray-200 text-gray-700 hover:bg-gray-100' ?>">
                <i class="<?= $catInfo['icon'] ?>"></i>
                <span><?= $catInfo['label'] ?></span>
                <span class="px-2 py-0.5 rounded-full text-[11px] <?= $isActive ? 'bg-white/20 text-white font-bold' : 'bg-gray-200 text-gray-600' ?>">
                    <?= number_format($catInfo['count']) ?>
                </span>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Search and Bulk Action Form -->
    <form id="bulkForm" action="/admin/sermons/bulk-category" method="POST">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="page" value="<?= e($pagination['page']) ?>">
        <input type="hidden" name="category" value="<?= e($currentCategory ?? '전체') ?>">
        <input type="hidden" name="keyword" value="<?= e($keyword ?? '') ?>">

        <!-- Search Bar & Bulk Actions Toolbar -->
        <div class="bg-white p-4 rounded-3xl border border-gray-200 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
            <!-- Bulk Action Selector -->
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs font-bold text-gray-600 flex items-center gap-1 shrink-0 whitespace-nowrap">
                    <i class="fas fa-check-double text-primary"></i> 선택 항목 일괄 변경:
                </span>
                <select name="bulk_category" class="px-3 py-1.5 rounded-xl border border-gray-300 text-xs font-bold focus:ring-2 focus:ring-primary bg-gray-50 flex-1 sm:flex-initial">
                    <option value="">-- 변경할 분류 선택 --</option>
                    <option value="설교 영상">📖 설교 영상</option>
                    <option value="예배 영상">✝️ 예배 영상</option>
                    <option value="듣는 성경">🎧 듣는 성경</option>
                    <option value="설교 쇼츠">⚡ 설교 쇼츠</option>
                    <option value="예배 쇼츠">🙏 예배 쇼츠</option>
                    <option value="교회 행사/일상">🌿 교회 행사/일상</option>
                    <option value="기타">📦 기타</option>
                </select>
                <button type="submit" onclick="return confirmBulkAction();" class="px-3.5 py-1.5 bg-gray-800 hover:bg-gray-900 text-white rounded-xl text-xs font-bold transition-all shadow-xs shrink-0 whitespace-nowrap">
                    일괄 적용
                </button>
            </div>

            <!-- Search Form -->
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <div class="relative flex-1 sm:flex-initial">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                    <input 
                        type="text" 
                        name="search_kw" 
                        id="searchKwInput"
                        value="<?= e($keyword ?? '') ?>" 
                        placeholder="영상 제목, 설교자 검색" 
                        onkeydown="if(event.key==='Enter'){ event.preventDefault(); doSearch(); }"
                        class="pl-8 pr-3 py-1.5 rounded-xl border border-gray-200 text-xs w-full sm:w-60 focus:ring-2 focus:ring-primary bg-gray-50/70">
                </div>
                <button type="button" onclick="doSearch();" class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-bold transition-all shrink-0 whitespace-nowrap">
                    검색
                </button>
                <?php if (!empty($keyword)): ?>
                <a href="/admin/sermons?category=<?= urlencode($currentCategory ?? '전체') ?>" class="px-2.5 py-1.5 text-gray-400 hover:text-gray-600 text-xs font-bold shrink-0 whitespace-nowrap">
                    초기화
                </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Video Table Card -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
            
            <!-- Mobile 2-Line / Card List (화면 < md 일 때 노출되어 짤림 방지) -->
            <div class="md:hidden divide-y divide-gray-100">
                <?php if (!empty($pagination['items'])): ?>
                    <div class="p-3 bg-gray-50/80 border-b border-gray-100 flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-gray-700">
                            <input type="checkbox" onclick="toggleSelectAll(this)" class="rounded text-primary focus:ring-primary h-4 w-4">
                            <span>전체 선택</span>
                        </label>
                        <span class="text-[11px] text-gray-400 font-medium">총 <?= number_format($pagination['total'] ?? 0) ?>개 영상</span>
                    </div>

                    <?php foreach ($pagination['items'] as $item): ?>
                    <?php 
                        $yid = \App\Models\Sermon::extractYoutubeId($item['youtube_id'] ?? '');
                        $isShorts = ($item['video_type'] ?? '') === 'shorts' || str_contains($item['category'] ?? '', '쇼츠');
                    ?>
                    <div class="p-3.5 space-y-2.5 hover:bg-gray-50/80 transition-colors">
                        <!-- Top Row: Checkbox, Thumbnail, Title & Meta -->
                        <div class="flex items-start gap-2.5">
                            <div class="pt-1 shrink-0">
                                <input type="checkbox" name="ids[]" value="<?= e($item['id']) ?>" class="video-checkbox rounded text-primary focus:ring-primary h-4 w-4">
                            </div>
                            
                            <!-- Thumbnail (Compact 80px) -->
                            <div class="relative w-20 aspect-video rounded-xl overflow-hidden shadow-2xs border border-gray-200 bg-gray-900 shrink-0">
                                <?php if ($yid): ?>
                                    <img src="https://img.youtube.com/vi/<?= e($yid) ?>/hqdefault.jpg" alt="Thumbnail" class="w-full h-full object-cover">
                                    <a href="https://www.youtube.com/watch?v=<?= e($yid) ?>" target="_blank" class="absolute inset-0 bg-black/30 flex items-center justify-center text-white text-xs">
                                        <i class="fas fa-play text-[10px]"></i>
                                    </a>
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center text-gray-500">
                                        <i class="fab fa-youtube text-base"></i>
                                    </div>
                                <?php endif; ?>
                                <?php if ($isShorts): ?>
                                    <span class="absolute bottom-0.5 right-0.5 px-1 py-0.2 bg-red-600 text-white rounded text-[7px] font-bold">Shorts</span>
                                <?php endif; ?>
                            </div>

                            <!-- Title & Info -->
                            <div class="min-w-0 flex-1">
                                <div class="font-bold text-gray-900 text-xs line-clamp-2 leading-snug break-words">
                                    <?= e($item['title']) ?>
                                </div>
                                <div class="flex items-center gap-2 mt-1 text-[11px] text-gray-500 font-medium flex-wrap">
                                    <span class="font-semibold text-gray-700"><?= e($item['preacher'] ?: '심민보 목사') ?></span>
                                    <span><?= e($item['sermon_date']) ?></span>
                                    <span class="px-1.5 py-0.2 rounded text-[9px] font-bold <?= $isShorts ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' ?>">
                                        <?= $isShorts ? '쇼츠' : '일반' ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Row: Category Selector (Instant Save) + Edit/Delete Actions -->
                        <div class="flex items-center gap-2 pt-1 border-t border-gray-100">
                            <div class="relative flex-1">
                                <select onchange="updateVideoCategory(<?= e($item['id']) ?>, this.value)" class="w-full px-2.5 py-1.5 rounded-xl border border-gray-300 text-xs font-bold focus:ring-2 focus:ring-primary bg-white shadow-2xs">
                                    <option value="설교 영상" <?= ($item['category'] === '설교 영상' || $item['category'] === '주일 설교' || empty($item['category'])) ? 'selected' : '' ?>>📖 설교 영상</option>
                                    <option value="예배 영상" <?= ($item['category'] === '예배 영상') ? 'selected' : '' ?>>✝️ 예배 영상</option>
                                    <option value="듣는 성경" <?= ($item['category'] === '듣는 성경') ? 'selected' : '' ?>>🎧 듣는 성경</option>
                                    <option value="설교 쇼츠" <?= ($item['category'] === '설교 쇼츠' || $item['category'] === '설교 말씀 쇼츠') ? 'selected' : '' ?>>⚡ 설교 쇼츠</option>
                                    <option value="예배 쇼츠" <?= ($item['category'] === '예배 쇼츠') ? 'selected' : '' ?>>🙏 예배 쇼츠</option>
                                    <option value="교회 행사/일상" <?= ($item['category'] === '교회 행사/일상' || $item['category'] === '교회 일상 & 애찬 쇼츠' || $item['category'] === '교회 행사 & 특별 찬양') ? 'selected' : '' ?>>🌿 교회 행사/일상</option>
                                    <option value="기타" <?= ($item['category'] === '기타' || $item['category'] === '성도 간증 & 교우 소식' || $item['category'] === '미분류 / 기타') ? 'selected' : '' ?>>📦 기타</option>
                                </select>
                                <span class="saved-badge-<?= e($item['id']) ?> hidden absolute right-8 top-1/2 -translate-y-1/2 text-[10px] text-green-600 font-bold">
                                    <i class="fas fa-check"></i>
                                </span>
                            </div>

                            <?php if ($yid): ?>
                            <a href="https://www.youtube.com/watch?v=<?= e($yid) ?>" target="_blank" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs shrink-0" title="유튜브 재생">
                                <i class="fab fa-youtube text-sm"></i>
                            </a>
                            <?php endif; ?>

                            <a href="/admin/sermons/edit/<?= e($item['id']) ?>?page=<?= $pagination['page'] ?>&category=<?= urlencode($currentCategory ?? '전체') ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" class="p-1.5 bg-gray-100 hover:bg-primary hover:text-white text-gray-600 rounded-lg text-xs transition-all shrink-0" title="상세 정보 수정">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            
                            <a href="/admin/sermons/delete/<?= e($item['id']) ?>?page=<?= $pagination['page'] ?>&category=<?= urlencode($currentCategory ?? '전체') ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" onclick="return confirm('정말 이 영상을 목록에서 삭제하시겠습니까?');" class="p-1.5 bg-red-50 text-red-500 hover:bg-red-100 rounded-lg text-xs transition-all shrink-0" title="삭제">
                                <i class="fas fa-trash-can"></i>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="p-12 text-center text-xs text-gray-400">
                        <i class="fab fa-youtube text-3xl mb-2 text-gray-300 block"></i>
                        해당 분류에 등록된 영상이 없습니다. 상단의 <b>[유튜브 영상 최신 동기화]</b> 버튼을 눌러보세요!
                    </div>
                <?php endif; ?>
            </div>

            <!-- Desktop Full Table (hidden md:block) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                            <th class="py-3.5 px-3 w-10 text-center">
                                <input type="checkbox" id="selectAll" onclick="toggleSelectAll(this)" class="rounded text-primary focus:ring-primary">
                            </th>
                            <th class="py-3.5 px-3 w-28 text-center whitespace-nowrap">썸네일</th>
                            <th class="py-3.5 px-4">영상 제목 & 유튜브 링크</th>
                            <th class="py-3.5 px-3 w-28 whitespace-nowrap">설교자 / 일자</th>
                            <th class="py-3.5 px-3 w-56 whitespace-nowrap">분류 카테고리 (직접 변경)</th>
                            <th class="py-3.5 px-3 w-24 text-center whitespace-nowrap">영상 형식</th>
                            <th class="py-3.5 px-4 w-20 text-center whitespace-nowrap">관리</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        <?php if (!empty($pagination['items'])): ?>
                            <?php foreach ($pagination['items'] as $item): ?>
                            <?php 
                                $yid = \App\Models\Sermon::extractYoutubeId($item['youtube_id'] ?? '');
                                $isShorts = ($item['video_type'] ?? '') === 'shorts' || str_contains($item['category'] ?? '', '쇼츠');
                            ?>
                            <tr class="hover:bg-gray-50/80 transition-colors" id="row-<?= e($item['id']) ?>">
                                <!-- Checkbox -->
                                <td class="py-3.5 px-3 text-center">
                                    <input type="checkbox" name="ids[]" value="<?= e($item['id']) ?>" class="video-checkbox rounded text-primary focus:ring-primary">
                                </td>

                                <!-- Thumbnail Preview -->
                                <td class="py-3.5 px-3 text-center">
                                    <div class="relative w-20 aspect-video rounded-xl overflow-hidden shadow-2xs border border-gray-200 bg-gray-900 group/thumb mx-auto">
                                        <?php if ($yid): ?>
                                            <img src="https://img.youtube.com/vi/<?= e($yid) ?>/hqdefault.jpg" alt="Thumbnail" class="w-full h-full object-cover group-hover/thumb:scale-105 transition-transform">
                                            <a href="https://www.youtube.com/watch?v=<?= e($yid) ?>" target="_blank" class="absolute inset-0 bg-black/40 opacity-0 group-hover/thumb:opacity-100 flex items-center justify-center text-white text-xs transition-opacity">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center text-gray-500">
                                                <i class="fab fa-youtube text-lg"></i>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($isShorts): ?>
                                            <span class="absolute bottom-1 right-1 px-1 py-0.2 bg-red-600 text-white rounded text-[8px] font-bold">Shorts</span>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Title & Link -->
                                <td class="py-3.5 px-4">
                                    <div class="font-bold text-gray-900 line-clamp-2 leading-snug">
                                        <?= e($item['title']) ?>
                                    </div>
                                    <div class="flex items-center gap-2 mt-1">
                                        <?php if ($yid): ?>
                                        <a href="https://www.youtube.com/watch?v=<?= e($yid) ?>" target="_blank" class="text-[11px] text-red-600 hover:underline flex items-center gap-1 font-semibold whitespace-nowrap">
                                            <i class="fab fa-youtube"></i> 유튜브 열기
                                        </a>
                                        <?php endif; ?>
                                        <?php if (!empty($item['scripture'])): ?>
                                        <span class="text-[10px] text-gray-400 bg-gray-100 px-1.5 py-0.2 rounded font-medium whitespace-nowrap">
                                            <?= e($item['scripture']) ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </td>

                                <!-- Preacher & Date -->
                                <td class="py-3.5 px-3 whitespace-nowrap">
                                    <div class="font-bold text-gray-800"><?= e($item['preacher'] ?: '심민보 목사') ?></div>
                                    <div class="text-[11px] text-gray-400 mt-0.5"><?= e($item['sermon_date']) ?></div>
                                </td>

                                <!-- Category Dropdown (Instant Auto-Save AJAX) -->
                                <td class="py-3.5 px-3">
                                     <div class="relative flex items-center gap-1.5">
                                         <select onchange="updateVideoCategory(<?= e($item['id']) ?>, this.value)" class="w-full px-2.5 py-1.5 rounded-xl border border-gray-300 text-xs font-bold focus:ring-2 focus:ring-primary bg-white shadow-2xs">
                                             <option value="설교 영상" <?= ($item['category'] === '설교 영상' || $item['category'] === '주일 설교' || empty($item['category'])) ? 'selected' : '' ?>>📖 설교 영상</option>
                                             <option value="예배 영상" <?= ($item['category'] === '예배 영상') ? 'selected' : '' ?>>✝️ 예배 영상</option>
                                             <option value="듣는 성경" <?= ($item['category'] === '듣는 성경') ? 'selected' : '' ?>>🎧 듣는 성경</option>
                                             <option value="설교 쇼츠" <?= ($item['category'] === '설교 쇼츠' || $item['category'] === '설교 말씀 쇼츠') ? 'selected' : '' ?>>⚡ 설교 쇼츠</option>
                                             <option value="예배 쇼츠" <?= ($item['category'] === '예배 쇼츠') ? 'selected' : '' ?>>🙏 예배 쇼츠</option>
                                             <option value="교회 행사/일상" <?= ($item['category'] === '교회 행사/일상' || $item['category'] === '교회 일상 & 애찬 쇼츠' || $item['category'] === '교회 행사 & 특별 찬양') ? 'selected' : '' ?>>🌿 교회 행사/일상</option>
                                             <option value="기타" <?= ($item['category'] === '기타' || $item['category'] === '성도 간증 & 교우 소식' || $item['category'] === '미분류 / 기타') ? 'selected' : '' ?>>📦 기타</option>
                                         </select>
                                         <span class="saved-badge-<?= e($item['id']) ?> hidden text-[10px] text-green-600 font-bold shrink-0">
                                             <i class="fas fa-check"></i>
                                         </span>
                                     </div>
                                </td>

                                <!-- Video Type -->
                                <td class="py-3.5 px-3 text-center whitespace-nowrap">
                                    <span class="px-2 py-1 rounded-full text-[10px] font-bold <?= $isShorts ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' ?>">
                                        <?= $isShorts ? '세로 쇼츠' : '일반 영상' ?>
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-1.5">
                                        <a href="/admin/sermons/edit/<?= e($item['id']) ?>?page=<?= $pagination['page'] ?>&category=<?= urlencode($currentCategory ?? '전체') ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" class="p-1.5 text-gray-500 hover:text-primary hover:bg-gray-100 rounded-lg transition-all" title="상세 정보 수정">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                        <a href="/admin/sermons/delete/<?= e($item['id']) ?>?page=<?= $pagination['page'] ?>&category=<?= urlencode($currentCategory ?? '전체') ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" onclick="return confirm('정말 이 영상을 목록에서 삭제하시겠습니까?');" class="p-1.5 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="삭제">
                                            <i class="fas fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="p-12 text-center text-xs text-gray-400">
                                    <i class="fab fa-youtube text-3xl mb-2 text-gray-300 block"></i>
                                    해당 분류에 등록된 영상이 없습니다. 상단의 <b>[유튜브 영상 최신 동기화]</b> 버튼을 눌러보세요!
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($pagination['totalPages'] > 1): ?>
            <div class="p-4 bg-gray-50 border-t border-gray-200 flex items-center justify-center gap-2">
                <?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
                <a href="/admin/sermons?page=<?= $i ?>&category=<?= urlencode($currentCategory ?? '전체') ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" 
                   class="w-8 h-8 rounded-xl flex items-center justify-center text-xs font-bold <?= $pagination['page'] === $i ? 'bg-primary text-white shadow-xs' : 'bg-white border border-gray-200 text-gray-700 hover:bg-gray-100' ?>">
                    <?= $i ?>
                </a>
                <?php endfor; ?>
            </div>
            <?php endif; ?>
        </div>
    </form>

</div>

<!-- JavaScript for Quick Auto-Save & Bulk Selection -->
<script>
function toggleSelectAll(master) {
    const checkboxes = document.querySelectorAll('.video-checkbox');
    checkboxes.forEach(cb => cb.checked = master.checked);
}

function confirmBulkAction() {
    const checked = document.querySelectorAll('.video-checkbox:checked');
    if (checked.length === 0) {
        alert('변경할 영상을 하나 이상 선택해 주세요.');
        return false;
    }
    const cat = document.querySelector('select[name="bulk_category"]').value;
    if (!cat) {
        alert('변경할 분류 카테고리를 선택해 주세요.');
        return false;
    }
    return confirm(`선택하신 ${checked.length}개의 영상을 [${cat}] 분류로 일괄 변경하시겠습니까?`);
}

function doSearch() {
    const kw = document.getElementById('searchKwInput').value;
    const cat = <?= json_encode($currentCategory ?? '전체', JSON_UNESCAPED_UNICODE) ?>;
    window.location.href = `/admin/sermons?category=${encodeURIComponent(cat)}&keyword=${encodeURIComponent(kw)}`;
}

// Instant AJAX Auto-Save on Category Change
function updateVideoCategory(id, newCategory) {
    const badges = document.querySelectorAll(`.saved-badge-${id}`);
    
    const formData = new FormData();
    formData.append('id', id);
    formData.append('category', newCategory);

    fetch('/admin/sermons/quick-update', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            badges.forEach(badge => {
                badge.classList.remove('hidden');
                setTimeout(() => {
                    badge.classList.add('hidden');
                }, 2000);
            });
        }
    })
    .catch(err => {
        console.error('Update failed:', err);
    });
}
</script>