<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-red-50 border border-red-200 text-xs font-bold text-red-600 mb-2">
            <i class="fab fa-youtube text-red-600 text-sm"></i>
            <span>공식 유튜브 채널 @greentreechurch0405 실시간 연동</span>
        </div>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">푸른나무 영상</h1>
        <p class="text-sm text-gray-600 mt-2">1분 은혜 말씀 쇼츠, 따뜻한 식탁 교제, 은혜로운 성도 간증 및 교회 소식을 만나보세요</p>
    </div>

    <!-- YouTube Sync & Channel Subscribe Bar -->
    <div class="bg-gradient-to-r from-red-500/10 via-amber-500/10 to-transparent p-4 sm:p-5 rounded-3xl border border-red-500/20 mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-red-600 text-white flex items-center justify-center text-xl shadow-sm shrink-0">
                <i class="fab fa-youtube"></i>
            </div>
            <div>
                <h4 class="font-bold text-xs sm:text-sm text-gray-900">푸른나무교회 유튜브 공식 채널</h4>
                <p class="text-[11px] text-gray-500">
                    최근 동기화: <?= e($lastSync ? date('Y.m.d H:i', strtotime($lastSync)) : '방금 전') ?>
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2 self-end sm:self-center">
            <a href="/media/sync" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-gray-200 hover:bg-gray-50 text-xs font-bold text-gray-700 shadow-xs transition-all">
                <i class="fas fa-sync-alt text-primary text-[11px]"></i>
                <span>최신 영상 동기화</span>
            </a>
            <a href="https://www.youtube.com/@greentreechurch0405?sub_confirmation=1" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold shadow-sm transition-all">
                <i class="fab fa-youtube"></i>
                <span>채널 구독하기</span>
            </a>
        </div>
    </div>

    <!-- Category Filter Tabs & Search Bar -->
    <div class="flex flex-col gap-4 mb-8">
        
        <!-- Category Filter Tabs (Wrap neatly without overflow) -->
        <div class="flex flex-wrap items-center gap-2 pb-1">
            <?php foreach ($categories as $cat): ?>
            <?php 
                $count = $categoryCounts[$cat] ?? 0;
                $isSelected = (($category ?? '전체') === $cat);
            ?>
            <a href="/media?category=<?= urlencode($cat) ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" 
               class="px-3.5 sm:px-4 py-2.5 rounded-2xl transition-all text-xs font-bold flex items-center gap-1.5 border <?= $isSelected ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-gray-700 hover:bg-surface-container border-gray-200' ?>">
                
                <?php if ($cat === '설교 영상'): ?>
                    <i class="fas fa-book-bible <?= $isSelected ? 'text-primary-fixed' : 'text-primary' ?>"></i>
                <?php elseif ($cat === '예배 영상'): ?>
                    <i class="fas fa-cross <?= $isSelected ? 'text-sky-300' : 'text-sky-600' ?>"></i>
                <?php elseif ($cat === '듣는 성경'): ?>
                    <i class="fas fa-headphones <?= $isSelected ? 'text-indigo-300' : 'text-indigo-600' ?>"></i>
                <?php elseif ($cat === '설교 쇼츠'): ?>
                    <i class="fas fa-bolt <?= $isSelected ? 'text-amber-300' : 'text-amber-500' ?>"></i>
                <?php elseif ($cat === '예배 쇼츠'): ?>
                    <i class="fas fa-fire <?= $isSelected ? 'text-pink-300' : 'text-pink-500' ?>"></i>
                <?php elseif ($cat === '교회 행사/일상'): ?>
                    <i class="fas fa-utensils <?= $isSelected ? 'text-emerald-300' : 'text-emerald-600' ?>"></i>
                <?php elseif ($cat === '기타'): ?>
                    <i class="fas fa-shapes <?= $isSelected ? 'text-purple-300' : 'text-purple-500' ?>"></i>
                <?php else: ?>
                    <i class="fas fa-layer-group text-gray-400"></i>
                <?php endif; ?>

                <span><?= e($cat) ?></span>
                
                <span class="px-1.5 py-0.2 rounded-full text-[10px] <?= $isSelected ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-500' ?>">
                    <?= $count ?>
                </span>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- Search Bar (Responsive) -->
        <div class="flex items-center justify-between">
            <span class="text-xs text-gray-500">
                총 <strong><?= e($pagination['total']) ?></strong>개의 영상이 있습니다.
            </span>
            <form action="/media" method="GET" class="relative flex items-center min-w-[220px]">
                <input type="hidden" name="category" value="<?= e($category ?? '전체') ?>">
                <input 
                    type="text" 
                    name="keyword" 
                    value="<?= e($keyword ?? '') ?>" 
                    placeholder="영상 제목 검색..." 
                    class="w-full pl-9 pr-4 py-2 rounded-full border border-outline-variant/50 bg-white text-xs focus:ring-2 focus:ring-primary shadow-soft">
                <i class="fas fa-search absolute left-3.5 text-gray-400 text-xs"></i>
            </form>
        </div>

    </div>

    <!-- Media Grid: Differentiates Shorts (Vertical 9:16) and Videos (Horizontal 16:9) -->
    <?php if (!empty($pagination['items'])): ?>
    
    <?php 
        $isShortsCategoryView = in_array($category, ['설교 쇼츠', '예배 쇼츠', '교회 행사/일상', '설교 말씀 쇼츠', '교회 일상 & 애찬 쇼츠'], true);
    ?>

    <div class="grid <?= $isShortsCategoryView ? 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4' : 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6' ?> mb-12">
        <?php foreach ($pagination['items'] as $item): ?>
        
        <?php 
            $isItemShorts = (($item['video_type'] ?? '') === 'shorts' || in_array($item['category'] ?? '', ['설교 쇼츠', '예배 쇼츠', '교회 행사/일상', '설교 말씀 쇼츠', '교회 일상 & 애찬 쇼츠'], true));
            $itemCat = $item['category'] ?? '푸른나무영상';
        ?>

        <?php if ($isItemShorts): ?>
        <!-- Vertical Shorts Card (9:16 Aspect Ratio) -->
        <article class="bg-white rounded-3xl border border-outline-variant/30 overflow-hidden shadow-soft hover:shadow-card transition-all flex flex-col group">
            <div class="relative aspect-[9/16] bg-black overflow-hidden cursor-pointer" 
                 onclick="openVideoModal('<?= e($item['youtube_id']) ?>', '<?= e(addslashes($item['title'])) ?>', true, '<?= e($itemCat) ?>')">
                <img src="https://img.youtube.com/vi/<?= e($item['youtube_id']) ?>/hqdefault.jpg" 
                     alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent flex flex-col justify-between p-3.5">
                    <!-- Badge Top -->
                    <span class="self-start px-2 py-0.5 rounded-md text-[10px] font-bold text-white flex items-center gap-1 shadow-sm <?= ($itemCat === '교회 일상 & 애찬 쇼츠') ? 'bg-orange-600' : 'bg-red-600' ?>">
                        <?php if ($itemCat === '교회 일상 & 애찬 쇼츠'): ?>
                            <i class="fas fa-utensils text-[9px]"></i> 식탁 교제
                        <?php else: ?>
                            <i class="fas fa-bolt text-yellow-300 text-[9px]"></i> 말씀 쇼츠
                        <?php endif; ?>
                    </span>

                    <!-- Play Icon Center -->
                    <div class="w-10 h-10 rounded-full bg-white/30 backdrop-blur-md text-white flex items-center justify-center self-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-play text-xs ml-0.5"></i>
                    </div>

                    <!-- Title Bottom -->
                    <div>
                        <span class="text-[10px] text-white/70 block mb-0.5"><?= e($item['sermon_date']) ?></span>
                        <h3 class="font-serif-kr text-xs sm:text-sm font-bold text-white line-clamp-2 leading-snug">
                            <?= e($item['title']) ?>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-white flex items-center justify-between text-[11px] text-gray-500">
                <span class="truncate font-semibold text-primary"><?= e($item['preacher']) ?></span>
                <button type="button" onclick="openVideoModal('<?= e($item['youtube_id']) ?>', '<?= e(addslashes($item['title'])) ?>', true, '<?= e($itemCat) ?>')" class="text-primary font-bold hover:underline">
                    재생하기
                </button>
            </div>
        </article>

        <?php else: ?>
        <!-- Standard 16:9 Video Card (Testimonies / Events / Special) -->
        <article class="bg-white rounded-3xl border border-outline-variant/30 overflow-hidden shadow-soft hover:shadow-card transition-all flex flex-col group">
            
            <div class="relative aspect-video bg-gray-900 overflow-hidden cursor-pointer" 
                 onclick="openVideoModal('<?= e($item['youtube_id']) ?>', '<?= e(addslashes($item['title'])) ?>', false, '<?= e($itemCat) ?>')">
                <?php 
                    $thumb = \App\Models\Sermon::getThumbnailUrl($item['youtube_id'] ?? null);
                ?>
                <img src="<?= e($thumb) ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                    <div class="w-12 h-12 rounded-full bg-primary/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-play text-sm ml-0.5"></i>
                    </div>
                </div>

                <!-- Category Badge & Date -->
                <div class="absolute bottom-2 inset-x-2 flex items-center justify-between text-[10px] text-white">
                    <?php 
                        $badgeColor = 'bg-primary';
                        if ($itemCat === '성도 간증 & 교우 소식') $badgeColor = 'bg-purple-700';
                        elseif ($itemCat === '교회 행사 & 특별 찬양') $badgeColor = 'bg-amber-600';
                    ?>
                    <span class="px-2 py-0.5 rounded font-bold <?= $badgeColor ?> backdrop-blur-sm">
                        <?= e($itemCat) ?>
                    </span>
                    <span class="px-2 py-0.5 rounded bg-black/70 font-semibold backdrop-blur-sm">
                        <?= e($itemCat === '주일 설교' ? $item['sermon_date'] : date('Y.m.d', strtotime($item['created_at'] ?? 'now'))) ?>
                    </span>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6 flex flex-col flex-grow justify-between">
                <div>
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                        <span class="font-semibold text-primary"><?= e($item['preacher']) ?></span>
                        <span><i class="far fa-eye mr-1"></i><?= e($item['view_count']) ?></span>
                    </div>

                    <h2 class="font-serif-kr text-base sm:text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-primary transition-colors">
                        <?= e($item['title']) ?>
                    </h2>

                    <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                        <?= e(strip_tags($item['content'] ?? '')) ?>
                    </p>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <button type="button" onclick="openVideoModal('<?= e($item['youtube_id']) ?>', '<?= e(addslashes($item['title'])) ?>', false, '<?= e($itemCat) ?>')" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                        <i class="fas fa-play-circle text-sm"></i> 바로재생
                    </button>
                    <span class="text-[11px] text-gray-400">푸른나무영상</span>
                </div>
            </div>

        </article>
        <?php endif; ?>

        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php if ($pagination['totalPages'] > 1): ?>
    <div class="flex justify-center items-center gap-2">
        <?php for ($p = 1; $p <= $pagination['totalPages']; $p++): ?>
        <a href="/media?page=<?= $p ?><?= !empty($category) ? '&category=' . urlencode($category) : '' ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" 
           class="w-9 h-9 rounded-xl flex items-center justify-center text-xs font-bold transition-all <?= $p === $pagination['page'] ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-surface-container border border-gray-200' ?>">
            <?= $p ?>
        </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

    <?php else: ?>
    <div class="text-center py-16 bg-white rounded-3xl border border-outline-variant/30 p-8 max-w-md mx-auto">
        <i class="fas fa-video-slash text-4xl text-gray-300 mb-3"></i>
        <p class="text-sm font-semibold text-gray-700">해당 카테고리의 영상이 없습니다.</p>
        <div class="mt-4">
            <a href="/media/sync" class="px-5 py-2.5 bg-primary text-white rounded-full text-xs font-bold shadow-sm inline-block">
                <i class="fas fa-sync-alt mr-1"></i> 유튜브 채널에서 최신 영상 동기화
            </a>
        </div>
    </div>
    <?php endif; ?>

</div>

<!-- Universal Video / Shorts Lightbox Modal -->
<div id="videoModal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4">
    <div id="videoModalContainer" class="relative w-full max-w-4xl bg-black rounded-3xl overflow-hidden shadow-2xl border border-white/10 transition-all duration-300">
        <div class="flex items-center justify-between px-6 py-3.5 bg-zinc-900 text-white">
            <div class="flex items-center gap-2 truncate pr-4">
                <span id="videoModalBadge" class="px-2.5 py-0.5 rounded text-[10px] font-bold bg-primary">영상</span>
                <h4 id="videoModalTitle" class="text-xs sm:text-sm font-bold truncate">푸른나무교회 영상</h4>
            </div>
            <button onclick="closeVideoModal()" class="text-gray-400 hover:text-white text-2xl p-1 leading-none">&times;</button>
        </div>
        <div id="videoModalRatioWrapper" class="aspect-video w-full flex items-center justify-center bg-black">
            <iframe id="videoModalIframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
function openVideoModal(youtubeId, title, isShorts, categoryName) {
    if (!youtubeId) return;
    const modal = document.getElementById('videoModal');
    const container = document.getElementById('videoModalContainer');
    const wrapper = document.getElementById('videoModalRatioWrapper');
    const iframe = document.getElementById('videoModalIframe');
    const titleElem = document.getElementById('videoModalTitle');
    const badgeElem = document.getElementById('videoModalBadge');
    
    titleElem.innerText = title || '푸른나무교회 영상';
    
    if (isShorts) {
        badgeElem.innerText = categoryName || '쇼츠';
        badgeElem.className = (categoryName === '교회 일상 & 애찬 쇼츠') 
            ? 'px-2.5 py-0.5 rounded text-[10px] font-bold bg-orange-600 text-white' 
            : 'px-2.5 py-0.5 rounded text-[10px] font-bold bg-red-600 text-white';
        container.className = 'relative w-full max-w-sm bg-black rounded-3xl overflow-hidden shadow-2xl border border-white/10';
        wrapper.className = 'aspect-[9/16] w-full flex items-center justify-center bg-black';
    } else {
        badgeElem.innerText = categoryName || '영상';
        let bgClass = 'bg-primary text-white';
        if (categoryName === '성도 간증 & 교우 소식') bgClass = 'bg-purple-700 text-white';
        else if (categoryName === '교회 행사 & 특별 찬양') bgClass = 'bg-amber-600 text-white';
        
        badgeElem.className = 'px-2.5 py-0.5 rounded text-[10px] font-bold ' + bgClass;
        container.className = 'relative w-full max-w-4xl bg-black rounded-3xl overflow-hidden shadow-2xl border border-white/10';
        wrapper.className = 'aspect-video w-full flex items-center justify-center bg-black';
    }

    iframe.src = 'https://www.youtube.com/embed/' + youtubeId + '?autoplay=1';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');
    iframe.src = '';
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
