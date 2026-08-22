<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Church Gallery</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">교회 사진첩 & 말씀 캘리</h1>
        <p class="text-sm text-gray-600 mt-2">함께 나누는 은혜로운 공동체의 일상과 은혜의 글씨</p>
    </div>

    <!-- Category Tabs -->
    <div class="mb-8 w-full overflow-x-auto scrollbar-none -mx-4 px-4 sm:mx-0 sm:px-0 flex sm:justify-center">
        <div class="inline-flex p-1.5 rounded-2xl bg-surface-container border border-outline-variant/30 text-xs font-semibold shrink-0">
            <?php foreach ($categories as $cat): ?>
            <a href="/gallery?category=<?= urlencode($cat) ?>" 
               class="px-3.5 sm:px-4 py-2 rounded-xl transition-all whitespace-nowrap <?= ($category ?? '전체') === $cat ? 'bg-primary text-white shadow-sm font-bold' : 'text-gray-600 hover:text-primary' ?>">
                <?= e($cat) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Gallery Grid (3 cols) -->
    <?php if (!empty($pagination['items'])): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <?php foreach ($pagination['items'] as $item): ?>
        <article class="bg-white rounded-3xl border border-outline-variant/30 overflow-hidden shadow-soft hover:shadow-card transition-all flex flex-col group">
            
            <!-- Image Frame -->
            <a href="/gallery/<?= e($item['id']) ?>" class="block relative aspect-square sm:aspect-[4/3] bg-gray-100 overflow-hidden">
                <img src="<?= e($item['thumbnail_url'] ?: '/public/assets/images/logo.png') ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="absolute top-3 left-3 flex items-center gap-1.5">
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-black/60 text-white backdrop-blur-sm">
                        <?= e($item['category']) ?>
                    </span>
                    <?php if (count($item['images']) > 1): ?>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-primary text-white shadow-sm">
                        <i class="fas fa-layer-group mr-1"></i><?= count($item['images']) ?>
                    </span>
                    <?php endif; ?>
                </div>
            </a>

            <!-- Card Body -->
            <div class="p-5 flex flex-col flex-grow justify-between">
                <div>
                    <div class="flex items-center justify-between text-xs text-gray-400 mb-2">
                        <span><i class="far fa-calendar-alt mr-1"></i><?= e($item['event_date']) ?></span>
                        <span><i class="far fa-eye mr-1"></i><?= e($item['view_count']) ?></span>
                    </div>

                    <h2 class="font-serif-kr text-base font-bold text-gray-900 mb-2 line-clamp-1 group-hover:text-primary transition-colors">
                        <a href="/gallery/<?= e($item['id']) ?>">
                            <?= e($item['title']) ?>
                        </a>
                    </h2>

                    <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                        <?= e(strip_tags($item['content'] ?? '')) ?>
                    </p>
                </div>

                <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-end">
                    <a href="/gallery/<?= e($item['id']) ?>" class="text-xs font-bold text-primary hover:text-primary-container flex items-center gap-1">
                        <span>사진 자세히 보기</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </article>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php if ($pagination['totalPages'] > 1): ?>
    <div class="flex justify-center items-center gap-2">
        <?php for ($p = 1; $p <= $pagination['totalPages']; $p++): ?>
        <a href="/gallery?page=<?= $p ?><?= !empty($category) ? '&category=' . urlencode($category) : '' ?>" 
           class="w-9 h-9 rounded-xl flex items-center justify-center text-xs font-bold transition-all <?= $p === $pagination['page'] ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-surface-container border border-gray-200' ?>">
            <?= $p ?>
        </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

    <?php else: ?>
    <div class="text-center py-16 bg-white rounded-3xl border border-outline-variant/30 p-8 max-w-md mx-auto">
        <i class="fas fa-images text-4xl text-gray-300 mb-3"></i>
        <p class="text-sm font-semibold text-gray-700">해당 카테고리에 등록된 사진이 없습니다.</p>
        <a href="/gallery" class="mt-3 inline-block text-xs font-bold text-primary underline">전체 갤러리 보기</a>
    </div>
    <?php endif; ?>

</div>
