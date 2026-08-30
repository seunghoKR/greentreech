<div class="space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-gray-900">새가족 및 기도/상담 접수 관리</h1>
            <p class="text-xs text-gray-500 mt-1">성도님들이 남겨주신 소중한 기도 제목과 새가족 등록 정보를 안전하게 관리합니다.</p>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex flex-wrap gap-2">
        <span class="text-xs font-bold text-gray-400 self-center mr-1">상태:</span>
        <a href="/admin/inquiries?status=전체" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all <?= ($status ?? '전체') === '전체' ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' ?>">전체</a>
        <?php foreach ($statuses as $st): ?>
        <a href="/admin/inquiries?status=<?= urlencode($st) ?>" class="px-3 py-1.5 rounded-xl text-xs font-bold transition-all <?= ($status ?? '') === $st ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' ?>">
            <?= e($st) ?>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
        
        <!-- Mobile 2-Line / Card List (화면 < md 일 때 노출되어 짤림 방지) -->
        <div class="md:hidden divide-y divide-gray-100">
            <?php if (!empty($pagination['items'])): ?>
                <?php foreach ($pagination['items'] as $inq): ?>
                <div class="p-4 space-y-2 hover:bg-gray-50/80 transition-colors <?= $inq['status'] === '접수' ? 'bg-red-50/30' : '' ?>">
                    <!-- Line 1: Status, Type, Name, Phone, Date, Action Button -->
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-1.5 flex-wrap min-w-0">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold shrink-0 <?= $inq['status'] === '접수' ? 'bg-red-100 text-red-700' : ($inq['status'] === '확인완료' ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700') ?>">
                                <?= e($inq['status']) ?>
                            </span>
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-gray-100 text-gray-700 shrink-0">
                                <?= e($inq['type']) ?>
                            </span>
                            <span class="font-bold text-gray-900 text-xs truncate">
                                <?= e($inq['name']) ?>
                            </span>
                            <span class="text-[11px] text-gray-500 font-mono shrink-0">
                                <?= e($inq['phone']) ?>
                            </span>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="text-[10px] text-gray-400"><?= date('m/d', strtotime($inq['created_at'])) ?></span>
                            <a href="/admin/inquiries/<?= e($inq['id']) ?>" class="px-2.5 py-1 bg-primary text-white hover:bg-primary-dark rounded-lg text-[11px] font-bold shadow-2xs whitespace-nowrap">
                                보기
                            </a>
                        </div>
                    </div>
                    <!-- Line 2: Message Content (모바일에서도 짤림 없이 100% 노출) -->
                    <div class="text-xs text-gray-700 bg-gray-50/80 p-2.5 rounded-xl border border-gray-100 leading-relaxed break-words">
                        <?= nl2br(e($inq['content'])) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="p-8 text-center text-xs text-gray-400">접수된 내역이 없습니다.</div>
            <?php endif; ?>
        </div>

        <!-- Desktop Full Table (hidden md:block) -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                        <th class="p-4 w-28 whitespace-nowrap">상태</th>
                        <th class="p-4 w-28 whitespace-nowrap">구분</th>
                        <th class="p-4 w-32 whitespace-nowrap">성함</th>
                        <th class="p-4 w-36 whitespace-nowrap">연락처</th>
                        <th class="p-4">내용 요약</th>
                        <th class="p-4 w-28 text-center whitespace-nowrap">접수일</th>
                        <th class="p-4 w-24 text-right whitespace-nowrap">상세</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                    <?php if (!empty($pagination['items'])): ?>
                        <?php foreach ($pagination['items'] as $inq): ?>
                        <tr class="hover:bg-gray-50/80 transition-colors <?= $inq['status'] === '접수' ? 'bg-red-50/30 font-semibold' : '' ?>">
                            <td class="p-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold <?= $inq['status'] === '접수' ? 'bg-red-100 text-red-700' : ($inq['status'] === '확인완료' ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700') ?>">
                                    <?= e($inq['status']) ?>
                                </span>
                            </td>
                            <td class="p-4 text-xs whitespace-nowrap"><?= e($inq['type']) ?></td>
                            <td class="p-4 font-bold text-gray-900 whitespace-nowrap"><?= e($inq['name']) ?></td>
                            <td class="p-4 text-xs font-mono text-gray-600 whitespace-nowrap"><?= e($inq['phone']) ?></td>
                            <td class="p-4 text-xs text-gray-600 truncate max-w-xs"><?= e($inq['content']) ?></td>
                            <td class="p-4 text-xs text-center text-gray-500 whitespace-nowrap"><?= date('Y.m.d', strtotime($inq['created_at'])) ?></td>
                            <td class="p-4 text-right whitespace-nowrap">
                                <a href="/admin/inquiries/<?= e($inq['id']) ?>" class="px-3 py-1 bg-primary text-white hover:bg-primary-dark rounded-xl text-xs font-bold transition-all inline-block whitespace-nowrap">
                                    보기
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="p-8 text-center text-xs text-gray-400">접수된 내역이 없습니다.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
