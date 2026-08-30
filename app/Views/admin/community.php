<div class="space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-gray-900">나눔터 게시글 관리</h1>
            <p class="text-xs text-gray-500 mt-1">성도님들이 작성한 나눔터 게시글과 댓글을 확인하고 관리합니다.</p>
        </div>
        <a href="/community" target="_blank" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-2xl text-xs font-bold shadow-sm transition-all inline-flex items-center gap-1.5 self-start">
            <i class="fas fa-external-link-alt text-[10px]"></i> 나눔터 바로가기
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
        
        <!-- Mobile 2-Line List (md:hidden) -->
        <div class="md:hidden divide-y divide-gray-100">
            <?php if (!empty($pagination['items'])): ?>
                <?php foreach ($pagination['items'] as $p): ?>
                <div class="p-4 space-y-2 hover:bg-gray-50/80 transition-colors">
                    <!-- Line 1: Category, Title & Delete Button -->
                    <div class="flex items-start justify-between gap-2">
                        <div class="flex items-start gap-1.5 min-w-0 flex-1">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-700 shrink-0 mt-0.5">
                                <?= e($p['category']) ?>
                            </span>
                            <a href="/community/<?= e($p['id']) ?>" target="_blank" class="font-bold text-gray-900 text-xs sm:text-sm hover:text-primary transition-colors leading-snug break-words">
                                <?= e($p['title']) ?>
                            </a>
                        </div>
                        <a href="/admin/community/delete/<?= e($p['id']) ?>" onclick="return confirm('정말 이 게시글을 삭제하시겠습니까?');" class="p-1.5 bg-red-50 text-red-500 hover:bg-red-100 rounded-lg text-xs shrink-0" title="삭제">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                    <!-- Line 2: Author, Comments, Views, Date -->
                    <div class="flex items-center gap-3 text-[11px] text-gray-500 font-medium">
                        <span class="text-gray-800 font-semibold"><?= e($p['author_name']) ?></span>
                        <span class="text-primary font-bold"><i class="far fa-comment-dots mr-1"></i><?= e($p['comment_count']) ?></span>
                        <span><i class="far fa-eye text-gray-400 mr-1"></i><?= e($p['view_count']) ?>회</span>
                        <span><?= date('Y.m.d', strtotime($p['created_at'])) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="p-8 text-center text-xs text-gray-400">등록된 나눔터 글이 없습니다.</div>
            <?php endif; ?>
        </div>

        <!-- Desktop Table (hidden md:block) -->
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                        <th class="p-4 w-28 whitespace-nowrap">카테고리</th>
                        <th class="p-4">제목</th>
                        <th class="p-4 w-32 whitespace-nowrap">작성자</th>
                        <th class="p-4 w-20 text-center whitespace-nowrap">댓글수</th>
                        <th class="p-4 w-20 text-center whitespace-nowrap">조회수</th>
                        <th class="p-4 w-28 text-center whitespace-nowrap">작성일</th>
                        <th class="p-4 w-20 text-right whitespace-nowrap">삭제</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                    <?php if (!empty($pagination['items'])): ?>
                        <?php foreach ($pagination['items'] as $p): ?>
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="p-4 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-gray-100 text-gray-700">
                                    <?= e($p['category']) ?>
                                </span>
                            </td>
                            <td class="p-4 font-bold text-gray-900">
                                <a href="/community/<?= e($p['id']) ?>" target="_blank" class="hover:text-primary transition-colors">
                                    <?= e($p['title']) ?>
                                </a>
                            </td>
                            <td class="p-4 text-xs font-semibold whitespace-nowrap"><?= e($p['author_name']) ?></td>
                            <td class="p-4 text-xs text-center text-primary font-bold whitespace-nowrap"><?= e($p['comment_count']) ?></td>
                            <td class="p-4 text-xs text-center whitespace-nowrap"><?= e($p['view_count']) ?></td>
                            <td class="p-4 text-xs text-center text-gray-500 whitespace-nowrap"><?= date('Y.m.d', strtotime($p['created_at'])) ?></td>
                            <td class="p-4 text-right whitespace-nowrap">
                                <a href="/admin/community/delete/<?= e($p['id']) ?>" onclick="return confirm('정말 이 게시글을 삭제하시겠습니까?');" class="p-1.5 text-red-500 hover:text-red-700" title="삭제">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="p-8 text-center text-xs text-gray-400">등록된 나눔터 글이 없습니다.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
