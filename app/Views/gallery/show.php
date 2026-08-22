<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center justify-between mb-6">
        <a href="/gallery" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-primary transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>갤러리 목록으로</span>
        </a>
        <div class="flex items-center gap-2 text-xs text-gray-400">
            <span><?= e($gallery['category']) ?></span>
            <span>&gt;</span>
            <span class="text-gray-700 font-semibold truncate max-w-xs"><?= e($gallery['title']) ?></span>
        </div>
    </div>

    <!-- Article -->
    <article class="bg-white rounded-3xl border border-outline-variant/40 shadow-card overflow-hidden mb-10">
        
        <!-- Header -->
        <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex items-center justify-between flex-wrap gap-2 mb-2">
                <div class="flex items-center gap-2 text-xs text-gray-500">
                    <span class="px-3 py-1 rounded-full bg-surface-container font-semibold text-primary">
                        <?= e($gallery['category']) ?>
                    </span>
                    <span><i class="far fa-calendar-alt mr-1"></i><?= e($gallery['event_date']) ?></span>
                    <span>•</span>
                    <span><i class="far fa-eye mr-1"></i>조회수 <?= e($gallery['view_count']) ?></span>
                </div>

                <!-- Action Buttons: Share & Download -->
                <div class="flex items-center gap-2">
                    <button type="button" onclick="shareCurrentPage('<?= e(addslashes($gallery['title'])) ?>')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] shadow-sm transition-all">
                        <i class="fas fa-share-alt text-[10px]"></i>
                        <span>말씀 공유하기</span>
                    </button>
                    <?php if (!empty($gallery['thumbnail_url'])): ?>
                    <a href="<?= e($gallery['thumbnail_url']) ?>" download class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-primary hover:bg-primary-container text-white shadow-sm transition-all">
                        <i class="fas fa-download text-[10px]"></i>
                        <span>배경화면 저장</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <h1 class="font-serif-kr text-2xl sm:text-3xl font-bold text-gray-900 mt-3 leading-snug">
                <?= e($gallery['title']) ?>
            </h1>
        </div>

        <!-- Images Grid / List with Zoom Indicator -->
        <div class="p-6 sm:p-8 space-y-6 bg-gray-50/50">
            <div class="text-center text-[11px] text-gray-400">
                <i class="fas fa-search-plus mr-1"></i> 사진을 터치하거나 더블 클릭하시면 크게 확대해서 보실 수 있습니다.
            </div>

            <?php if (!empty($gallery['images'])): ?>
                <?php foreach ($gallery['images'] as $imgUrl): ?>
                <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-200 bg-white group relative">
                    <img src="<?= e($imgUrl) ?>" 
                         alt="<?= e($gallery['title']) ?>" 
                         class="w-full h-auto object-contain max-h-[700px] mx-auto cursor-zoom-in hover:scale-[1.01] transition-transform duration-300 zoomable-image" 
                         onclick="openImageLightbox(this.src)">
                    <div class="absolute bottom-3 right-3 flex items-center gap-2">
                        <a href="<?= e($imgUrl) ?>" download class="px-3 py-1.5 rounded-full bg-black/70 text-white text-xs font-bold backdrop-blur-sm hover:bg-black transition-colors">
                            <i class="fas fa-download mr-1"></i> 원본 저장
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Content -->
        <?php if (!empty($gallery['content'])): ?>
        <div class="p-6 sm:p-8 text-sm sm:text-base text-gray-700 leading-relaxed font-serif-kr whitespace-pre-line border-t border-gray-100">
            <?= nl2br(e($gallery['content'])) ?>
        </div>
        <?php endif; ?>

        <!-- Footer Bar -->
        <div class="p-6 bg-surface-container-low/50 border-t border-gray-100 flex items-center justify-between">
            <span class="text-xs text-gray-400">푸른나무교회 갤러리 & 말씀 캘리</span>
            <a href="/gallery" class="px-5 py-2.5 bg-primary hover:bg-primary-container text-white rounded-full text-xs font-bold transition-all shadow-sm">
                목록으로 돌아가기
            </a>
        </div>

    </article>

</div>

<!-- Fullscreen Image Lightbox Modal -->
<div id="imageLightbox" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4" onclick="closeImageLightbox()">
    <div class="relative max-w-5xl max-h-[90vh] flex items-center justify-center">
        <button type="button" onclick="closeImageLightbox()" class="absolute -top-12 right-0 text-white text-2xl p-2 hover:text-gray-300">
            &times; 닫기
        </button>
        <img id="lightboxImg" src="" alt="Full view" class="max-w-full max-h-[85vh] rounded-2xl object-contain shadow-2xl">
    </div>
</div>

<script>
function openImageLightbox(src) {
    const modal = document.getElementById('imageLightbox');
    const img = document.getElementById('lightboxImg');
    img.src = src;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeImageLightbox() {
    const modal = document.getElementById('imageLightbox');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function shareCurrentPage(title) {
    if (navigator.share) {
        navigator.share({
            title: title + ' - 푸른나무교회',
            text: title + ' - 푸른나무교회 말씀 캘리/사진첩',
            url: window.location.href
        }).catch(() => {});
    } else {
        navigator.clipboard.writeText(window.location.href);
        alert('주소가 클립보드에 복사되었습니다! 카카오톡이나 SNS에 붙여넣어 공유하세요 🌿');
    }
}
</script>
