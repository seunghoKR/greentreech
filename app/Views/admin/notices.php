<div class="space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-gray-900">알리는 소식 관리</h1>
            <p class="text-xs text-gray-500 mt-1">교회 주요 소식 및 공지사항을 등록하고 첨부파일을 관리합니다.</p>
        </div>
        <a href="/admin/notices/create" class="px-4 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs font-bold shadow-sm transition-all inline-flex items-center gap-1.5 self-start whitespace-nowrap shrink-0">
            <i class="fas fa-plus"></i> <span>새 소식 등록</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                        <th class="p-4">소식 제목</th>
                        <th class="p-4 w-24 text-center">첨부</th>
                        <th class="p-4 w-20 text-center">조회수</th>
                        <th class="p-4 w-28 text-center">작성일</th>
                        <th class="p-4 w-24 text-right">관리</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                    <?php if (!empty($pagination['items'])): ?>
                        <?php foreach ($pagination['items'] as $notice): ?>
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="p-4 font-bold text-gray-900">
                                <a href="/notices/<?= e($notice['id']) ?>" target="_blank" class="hover:text-primary transition-colors">
                                    <?= e($notice['title']) ?>
                                </a>
                            </td>
                            <td class="p-4 text-center text-xs text-gray-400">
                                <?php if (!empty($notice['attachment_url'])): ?>
                                <i class="fas fa-paperclip text-primary"></i>
                                <?php else: ?>
                                -
                                <?php endif; ?>
                            </td>
                            <td class="p-4 text-xs text-center"><?= e($notice['view_count']) ?></td>
                            <td class="p-4 text-xs text-center text-gray-500"><?= date('Y.m.d', strtotime($notice['created_at'])) ?></td>
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="/admin/notices/edit/<?= e($notice['id']) ?>" class="p-1.5 text-blue-600 hover:text-blue-800" title="수정">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/admin/notices/delete/<?= e($notice['id']) ?>" onclick="return confirm('정말 삭제하시겠습니까?');" class="p-1.5 text-red-500 hover:text-red-700" title="삭제">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="p-8 text-center text-xs text-gray-400">등록된 게시글이 없습니다.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
