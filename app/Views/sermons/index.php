<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Sunday Worship Sermons</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">주일 설교 말씀</h1>
        <p class="text-sm text-gray-600 mt-2">심민보 담임목사님의 주일 예배 설교 말씀입니다. 영혼의 쉼과 참된 은혜를 누리세요</p>
    </div>

    <!-- Banner to '푸른나무 영상' -->
    <div class="bg-surface-container-low rounded-2xl border border-outline-variant/30 p-4 mb-8 flex flex-col sm:flex-row items-center justify-between gap-3 shadow-xs">
        <div class="flex items-center gap-2.5 text-xs text-gray-700">
            <span class="px-2 py-0.5 rounded-full bg-red-100 text-red-700 font-bold text-[10px]">Shorts & 미디어</span>
            <span>1분 말씀 쇼츠, 따뜻한 식탁 교제, 성도 간증 영상은 <strong>[푸른나무 영상]</strong>에서 만나보세요!</span>
        </div>
        <a href="/media" class="px-4 py-1.5 bg-primary hover:bg-primary-container text-white rounded-xl text-xs font-bold transition-all shadow-xs shrink-0 flex items-center gap-1">
            <span>푸른나무 영상 보러가기</span>
            <i class="fas fa-arrow-right text-[10px]"></i>
        </a>
    </div>

    <!-- Topic / Scripture Tag Filter Bar -->
    <?php
        $topics = [
            '' => '전체 말씀',
            '믿음' => '🌿 믿음과 순종',
            '사랑' => '💖 사랑과 섬김',
            '회복' => '🕊️ 위로와 회복',
            '기도' => '🙏 기도와 영성',
            '감사' => '✨ 감사와 축복',
            '복음' => '📖 십자가 복음',
        ];
        $currentKeyword = $keyword ?? '';
    ?>
    <div class="flex items-center gap-2 overflow-x-auto pb-3 mb-6 scrollbar-none">
        <?php foreach ($topics as $key => $label): ?>
        <?php $isActive = ($currentKeyword === $key) || ($key === '' && empty($currentKeyword)); ?>
        <a href="/sermons<?= $key ? '?keyword=' . urlencode($key) : '' ?>" class="px-3.5 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition-all <?= $isActive ? 'bg-primary text-white shadow-xs' : 'bg-white text-gray-600 hover:bg-surface-container hover:text-primary border border-outline-variant/40' ?>">
            <?= $label ?>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Search Bar & Count Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-2">
            <span class="font-bold text-sm text-gray-900">주일 설교 목록</span>
            <span class="px-2.5 py-0.5 rounded-full bg-primary/10 text-primary text-xs font-black">
                <?= e($pagination['total']) ?>편
            </span>
            <?php if (!empty($keyword)): ?>
            <span class="text-xs text-gray-500 font-medium">
                ('<strong><?= e($keyword) ?></strong>' 검색 결과)
                <a href="/sermons" class="text-red-500 hover:underline ml-1 font-bold"><i class="fas fa-times-circle"></i> 초기화</a>
            </span>
            <?php endif; ?>
        </div>

        <form action="/sermons" method="GET" class="relative flex items-center min-w-[240px]">
            <input 
                type="text" 
                name="keyword" 
                value="<?= e($keyword ?? '') ?>" 
                placeholder="설교 제목, 본문 검색..." 
                class="w-full pl-9 pr-4 py-2 rounded-full border border-outline-variant/50 bg-white text-xs focus:ring-2 focus:ring-primary shadow-soft">
            <i class="fas fa-search absolute left-3.5 text-gray-400 text-xs"></i>
        </form>
    </div>

    <!-- Sermons Grid (Standard 16:9 HD Videos) -->
    <?php if (!empty($pagination['items'])): ?>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <?php foreach ($pagination['items'] as $sermon): ?>
        
        <article class="bg-white rounded-3xl border border-outline-variant/30 overflow-hidden shadow-soft hover:shadow-card transition-all flex flex-col group">
            
            <!-- Video Thumbnail 16:9 -->
            <div class="relative aspect-video bg-gray-900 overflow-hidden cursor-pointer" 
                 onclick="openVideoModal('<?= e($sermon['youtube_id']) ?>', '<?= e(addslashes($sermon['title'])) ?>')">
                <?php 
                    $thumb = \App\Models\Sermon::getThumbnailUrl($sermon['youtube_id'] ?? null);
                ?>
                <img src="<?= e($thumb) ?>" alt="<?= e($sermon['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                
                <div class="absolute inset-0 bg-black/25 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                    <div class="w-12 h-12 rounded-full bg-primary/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-play text-sm ml-0.5"></i>
                    </div>
                </div>

                <div class="absolute bottom-2 inset-x-2 flex items-center justify-between text-[10px] text-white">
                    <span class="px-2 py-0.5 rounded font-bold bg-primary backdrop-blur-sm">
                        주일 설교
                    </span>
                    <span class="px-2 py-0.5 rounded bg-black/70 font-semibold backdrop-blur-sm">
                        <?= e($sermon['sermon_date']) ?>
                    </span>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6 flex flex-col flex-grow justify-between">
                <div>
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                        <span class="font-semibold text-primary"><?= e($sermon['preacher'] ?: '심민보 목사') ?></span>
                        <span><i class="far fa-eye mr-1"></i><?= e($sermon['view_count']) ?></span>
                    </div>

                    <h2 class="font-serif-kr text-base sm:text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-primary transition-colors">
                        <a href="/sermons/<?= e($sermon['id']) ?>">
                            <?= e($sermon['title']) ?>
                        </a>
                    </h2>

                    <?php if (!empty($sermon['scripture'])): ?>
                    <p class="text-xs text-secondary font-medium mb-3 flex items-center gap-1">
                        <i class="fas fa-bookmark text-[10px]"></i> <?= e($sermon['scripture']) ?>
                    </p>
                    <?php endif; ?>

                    <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                        <?= e(strip_tags($sermon['content'] ?? '')) ?>
                    </p>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                    <button type="button" onclick="openVideoModal('<?= e($sermon['youtube_id']) ?>', '<?= e(addslashes($sermon['title'])) ?>')" class="text-xs font-bold text-secondary hover:text-primary flex items-center gap-1">
                        <i class="fas fa-play-circle text-sm"></i> 바로재생
                    </button>
                    <a href="/sermons/<?= e($sermon['id']) ?>" class="text-xs font-bold text-primary hover:text-primary-container flex items-center gap-1">
                        <span>말씀 상세</span>
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
        <a href="/sermons?page=<?= $p ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" 
           class="w-9 h-9 rounded-xl flex items-center justify-center text-xs font-bold transition-all <?= $p === $pagination['page'] ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-surface-container border border-gray-200' ?>">
            <?= $p ?>
        </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

    <?php else: ?>
    <div class="text-center py-16 bg-white rounded-3xl border border-outline-variant/30 p-8 max-w-md mx-auto">
        <i class="fas fa-book-open text-4xl text-gray-300 mb-3"></i>
        <p class="text-sm font-semibold text-gray-700">등록된 주일 설교 말씀이 없습니다.</p>
    </div>
    <?php endif; ?>

</div>

<!-- Universal Video Lightbox Modal -->
<div id="videoModal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4">
    <div class="relative w-full max-w-4xl bg-black rounded-3xl overflow-hidden shadow-2xl border border-white/10">
        <div class="flex items-center justify-between px-6 py-3.5 bg-zinc-900 text-white">
            <div class="flex items-center gap-2 truncate pr-4">
                <span class="px-2.5 py-0.5 rounded text-[10px] font-bold bg-primary text-white">주일 설교</span>
                <h4 id="videoModalTitle" class="text-xs sm:text-sm font-bold truncate">주일 설교 영상</h4>
            </div>
            <button onclick="closeVideoModal()" class="text-gray-400 hover:text-white text-2xl p-1 leading-none">&times;</button>
        </div>
        <div class="aspect-video w-full flex items-center justify-center bg-black">
            <iframe id="videoModalIframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
function openVideoModal(youtubeId, title) {
    if (!youtubeId) return;
    const modal = document.getElementById('videoModal');
    const iframe = document.getElementById('videoModalIframe');
    const titleElem = document.getElementById('videoModalTitle');
    
    titleElem.innerText = title || '푸른나무교회 주일 설교';
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
