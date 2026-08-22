<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center justify-between mb-6">
        <a href="/notices" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-primary transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>알리는 소식 목록으로</span>
        </a>
        <div class="flex items-center gap-2 text-xs text-gray-400">
            <span class="text-gray-700 font-semibold truncate max-w-xs"><?= e($notice['title']) ?></span>
        </div>
    </div>

    <!-- Main Article -->
    <article class="bg-white rounded-3xl border border-outline-variant/40 shadow-card overflow-hidden mb-12">
        
        <!-- Header -->
        <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex items-center justify-between flex-wrap gap-2 mb-3">
                <div class="flex items-center gap-2 text-xs text-gray-500">
                    <span><i class="far fa-calendar-alt mr-1"></i><?= date('Y.m.d H:i', strtotime($notice['created_at'])) ?></span>
                    <span>•</span>
                    <span><i class="far fa-eye mr-1"></i>조회수 <?= e($notice['view_count']) ?></span>
                </div>

                <!-- Font Size Zoom Buttons (Elderly Saints Friendly) -->
                <div class="flex items-center gap-1.5 bg-gray-100 p-1 rounded-xl text-xs font-bold">
                    <button type="button" onclick="adjustFontSize(1)" class="px-2.5 py-1 bg-white hover:bg-gray-50 text-gray-800 rounded-lg shadow-xs" title="글씨 크게">
                        가+ <span class="text-[10px] text-gray-400">크게</span>
                    </button>
                    <button type="button" onclick="adjustFontSize(-1)" class="px-2.5 py-1 bg-white hover:bg-gray-50 text-gray-800 rounded-lg shadow-xs" title="글씨 보통">
                        가- <span class="text-[10px] text-gray-400">보통</span>
                    </button>
                </div>
            </div>

            <h1 class="font-serif-kr text-2xl sm:text-3xl font-bold text-gray-950 leading-snug">
                <?= e($notice['title']) ?>
            </h1>

            <!-- Attachment Bar -->
            <?php if (!empty($notice['attachment_url'])): ?>
            <div class="mt-4 p-3.5 bg-surface-container-low rounded-2xl border border-outline-variant/30 flex items-center justify-between gap-3">
                <div class="flex items-center gap-2 text-xs font-semibold text-primary truncate">
                    <i class="fas fa-paperclip"></i>
                    <span>첨부파일: <?= e(basename($notice['attachment_url'])) ?></span>
                </div>
                <a href="<?= e($notice['attachment_url']) ?>" download class="px-3 py-1.5 bg-white border border-gray-300 hover:bg-gray-50 rounded-xl text-xs font-bold text-primary transition-all shrink-0">
                    <i class="fas fa-download mr-1"></i> 다운로드
                </a>
            </div>
            <?php endif; ?>
        </div>

        <!-- Attached Image Preview with Pinch Zoom (If image) -->
        <?php 
            $isImg = !empty($notice['attachment_url']) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $notice['attachment_url']);
        ?>
        <?php if ($isImg): ?>
        <div class="p-6 sm:p-8 bg-gray-50/70 border-b border-gray-100 text-center">
            <p class="text-[11px] text-gray-400 mb-2">
                <i class="fas fa-search-plus mr-1"></i> 이미지를 터치하시면 고화질 전체화면으로 크게 확대해서 보실 수 있습니다.
            </p>
            <div class="rounded-2xl overflow-hidden border border-gray-200 bg-white inline-block shadow-sm">
                <img src="<?= e($notice['attachment_url']) ?>" 
                     alt="주보/공지 이미지" 
                     class="max-w-full h-auto cursor-zoom-in hover:scale-[1.01] transition-transform duration-300"
                     onclick="openNoticeLightbox(this.src)">
            </div>
        </div>
        <?php endif; ?>

        <!-- Content Body -->
        <div id="noticeContent" class="p-6 sm:p-10 prose max-w-none text-gray-800 text-base leading-relaxed whitespace-pre-line font-serif-kr transition-all duration-200">
            <?= nl2br(e($notice['content'])) ?>
        </div>

        <!-- Footer Actions -->
        <div class="p-6 bg-surface-container-low/50 border-t border-gray-100 flex items-center justify-between">
            <span class="text-xs text-gray-400">푸른나무교회 알리는 말씀</span>
            <a href="/notices" class="px-5 py-2.5 bg-primary hover:bg-primary-container text-white rounded-full text-xs font-bold transition-all shadow-sm">
                목록으로
            </a>
        </div>

    </article>

</div>

<!-- Notice Fullscreen Lightbox -->
<div id="noticeLightbox" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4" onclick="closeNoticeLightbox()">
    <div class="relative max-w-5xl max-h-[90vh] flex items-center justify-center">
        <button type="button" onclick="closeNoticeLightbox()" class="absolute -top-12 right-0 text-white text-2xl p-2 hover:text-gray-300">
            &times; 닫기
        </button>
        <img id="noticeLightboxImg" src="" alt="Notice view" class="max-w-full max-h-[85vh] rounded-2xl object-contain shadow-2xl">
    </div>
</div>

<script>
let currentFontSizeLevel = 0;
function adjustFontSize(delta) {
    const elem = document.getElementById('noticeContent');
    if (!elem) return;
    currentFontSizeLevel += delta;
    if (currentFontSizeLevel > 3) currentFontSizeLevel = 3;
    if (currentFontSizeLevel < 0) currentFontSizeLevel = 0;

    const sizes = ['text-base', 'text-lg', 'text-xl', 'text-2xl'];
    sizes.forEach(s => elem.classList.remove(s));
    elem.classList.add(sizes[currentFontSizeLevel]);
}

function openNoticeLightbox(src) {
    const modal = document.getElementById('noticeLightbox');
    const img = document.getElementById('noticeLightboxImg');
    img.src = src;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeNoticeLightbox() {
    const modal = document.getElementById('noticeLightbox');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
