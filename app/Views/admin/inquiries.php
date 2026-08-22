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
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                        <th class="p-4 w-28">상태</th>
                        <th class="p-4 w-28">구분</th>
                        <th class="p-4 w-32">성함</th>
                        <th class="p-4 w-36">연락처</th>
                        <th class="p-4">내용 요약</th>
                        <th class="p-4 w-28 text-center">접수일</th>
                        <th class="p-4 w-24 text-right">상세</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                    <?php if (!empty($pagination['items'])): ?>
                        <?php foreach ($pagination['items'] as $inq): ?>
                        <tr class="hover:bg-gray-50/80 transition-colors <?= $inq['status'] === '접수' ? 'bg-red-50/30 font-semibold' : '' ?>">
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold <?= $inq['status'] === '접수' ? 'bg-red-100 text-red-700' : ($inq['status'] === '확인완료' ? 'bg-amber-100 text-amber-700' : 'bg-green-100 text-green-700') ?>">
                                    <?= e($inq['status']) ?>
                                </span>
                            </td>
                            <td class="p-4 text-xs"><?= e($inq['type']) ?></td>
                            <td class="p-4 font-bold text-gray-900"><?= e($inq['name']) ?></td>
                            <td class="p-4 text-xs font-mono text-gray-600"><?= e($inq['phone']) ?></td>
                            <td class="p-4 text-xs text-gray-600 truncate max-w-xs"><?= e($inq['content']) ?></td>
                            <td class="p-4 text-xs text-center text-gray-500"><?= date('Y.m.d', strtotime($inq['created_at'])) ?></td>
                            <td class="p-4 text-right">
                                <a href="/admin/inquiries/<?= e($inq['id']) ?>" class="px-3 py-1 bg-primary text-white hover:bg-primary-dark rounded-xl text-xs font-bold transition-all inline-block">
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
