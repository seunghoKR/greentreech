<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Church News & Notices</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">알리는 소식</h1>
        <p class="text-sm text-gray-600 mt-2">푸른나무교회의 주요 소식과 은혜의 나눔을 전해드립니다</p>
    </div>

    <!-- Notice List Card (Clean Single List without category clutter) -->
    <div class="bg-white rounded-3xl border border-outline-variant/30 shadow-soft divide-y divide-gray-100 overflow-hidden mb-10">
        <?php if (!empty($pagination['items'])): ?>
            <?php foreach ($pagination['items'] as $item): ?>
            <a href="/notices/<?= e($item['id']) ?>" class="p-5 sm:px-6 flex items-center justify-between hover:bg-surface-container-low transition-colors group">
                <div class="flex items-center gap-3.5 min-w-0 pr-3">
                    <i class="fas fa-bullhorn text-xs text-primary/60 shrink-0"></i>
                    <span class="text-xs sm:text-sm font-bold text-gray-800 truncate group-hover:text-primary transition-colors">
                        <?= e($item['title']) ?>
                    </span>
                    <?php if (!empty($item['attachment_url'])): ?>
                    <i class="fas fa-paperclip text-xs text-gray-400 shrink-0"></i>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-3 text-xs text-gray-400 shrink-0">
                    <span><i class="far fa-eye mr-1"></i><?= e($item['view_count']) ?></span>
                    <span><?= date('Y.m.d', strtotime($item['created_at'])) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="p-12 text-center text-xs sm:text-sm text-gray-400">
                등록된 소식이 없습니다.
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if ($pagination['totalPages'] > 1): ?>
    <div class="flex justify-center items-center gap-2">
        <?php for ($p = 1; $p <= $pagination['totalPages']; $p++): ?>
        <a href="/notices?page=<?= $p ?>" 
           class="w-9 h-9 rounded-xl flex items-center justify-center text-xs font-bold transition-all <?= $p === $pagination['page'] ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-surface-container border border-gray-200' ?>">
            <?= $p ?>
        </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

</div>
