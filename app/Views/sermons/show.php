<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center justify-between mb-6">
        <a href="/sermons" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-primary transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>설교 목록으로</span>
        </a>
        <div class="flex items-center gap-2 text-xs text-gray-400">
            <span>주일 설교</span>
            <span>&gt;</span>
            <span class="text-gray-700 font-semibold truncate max-w-xs"><?= e($sermon['title']) ?></span>
        </div>
    </div>

    <!-- Main Sermon Article -->
    <article class="bg-white rounded-3xl border border-outline-variant/40 shadow-card overflow-hidden mb-12">
        
        <!-- Header Info -->
        <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500 mb-3">
                <span class="px-3 py-1 rounded-full bg-surface-container font-semibold text-primary">
                    <i class="far fa-calendar-alt mr-1"></i> <?= e($sermon['sermon_date']) ?>
                </span>
                <span class="font-medium text-gray-700"><?= e($sermon['preacher']) ?></span>
                <span>•</span>
                <span><i class="far fa-eye mr-1"></i>조회수 <?= e($sermon['view_count']) ?></span>
            </div>

            <h1 class="font-serif-kr text-2xl sm:text-3xl font-bold text-gray-950 leading-snug mb-4">
                <?= e($sermon['title']) ?>
            </h1>

            <?php if (!empty($sermon['scripture'])): ?>
            <div class="bg-surface-container-low p-4 rounded-2xl border border-outline-variant/30 inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-primary">
                <i class="fas fa-bookmark"></i>
                <span>본문 말씀: <?= e($sermon['scripture']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <!-- Video Player -->
        <?php if (!empty($sermon['youtube_id'])): ?>
        <div class="bg-black relative aspect-video w-full">
            <iframe 
                class="w-full h-full"
                src="https://www.youtube.com/embed/<?= e($sermon['youtube_id']) ?>?rel=0" 
                title="<?= e($sermon['title']) ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
        <?php endif; ?>

        <!-- Content Body -->
        <div class="p-6 sm:p-10 prose max-w-none text-gray-800 text-sm sm:text-base leading-relaxed whitespace-pre-line font-serif-kr">
            <?= nl2br(e($sermon['content'] ?? '')) ?>
        </div>

        <!-- Share / Action Bar -->
        <div class="p-6 bg-surface-container-low/50 border-t border-gray-100 flex flex-wrap items-center justify-between gap-4">
            <div class="text-xs text-gray-500">
                푸른나무교회 주일 설교와 함께 은혜로운 한 주 되시길 기도합니다.
            </div>
            <div class="flex items-center gap-2">
                <button onclick="navigator.clipboard.writeText(window.location.href); alert('설교 링크가 복사되었습니다.');" class="px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 rounded-full text-xs font-semibold text-gray-700 transition-all">
                    <i class="fas fa-share-alt mr-1 text-primary"></i> 링크 공유
                </button>
                <a href="/sermons" class="px-4 py-2 bg-primary hover:bg-primary-container text-white rounded-full text-xs font-bold transition-all shadow-sm">
                    목록으로
                </a>
            </div>
        </div>

    </article>

    <!-- Recent Sermons (Related) -->
    <?php if (!empty($recentSermons)): ?>
    <div class="mt-8">
        <h3 class="font-serif-kr text-xl font-bold text-gray-900 mb-6">최근 다른 주일 설교</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach (array_slice($recentSermons, 0, 4) as $item): ?>
                <?php if ($item['id'] === $sermon['id']) continue; ?>
                <a href="/sermons/<?= e($item['id']) ?>" class="group bg-white rounded-2xl border border-outline-variant/30 p-3 shadow-soft hover:shadow-card transition-all">
                    <div class="aspect-video bg-gray-900 rounded-xl overflow-hidden mb-2 relative">
                        <img src="<?= e(\App\Models\Sermon::getThumbnailUrl($item['youtube_id'])) ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                    </div>
                    <span class="text-[10px] text-gray-400 block"><?= e($item['sermon_date']) ?></span>
                    <h4 class="text-xs font-bold text-gray-900 truncate group-hover:text-primary mt-0.5"><?= e($item['title']) ?></h4>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>

</div>
