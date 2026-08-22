<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
    
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container text-xs font-bold text-primary mb-2">
                <i class="fas fa-comments"></i>
                <span>성도 소통 & 이웃 교제</span>
            </div>
            <h1 class="font-serif-kr text-3xl font-bold text-gray-950">푸른나무 나눔터</h1>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">서로의 일상과 감사, 기도 제목을 따뜻하게 나누는 공간입니다.</p>
        </div>

        <div class="flex items-center gap-3">
            <?php if ($currentMember): ?>
            <a href="/community/create" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-container text-white px-5 py-3 rounded-full text-xs font-bold shadow-md transition-all hover:scale-[1.02] active:scale-[0.98]">
                <i class="fas fa-pen"></i>
                <span>새 나눔 글 쓰기</span>
            </a>
            <?php else: ?>
            <a href="/auth/login?redirect=/community/create" class="inline-flex items-center gap-2 bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] px-5 py-3 rounded-full text-xs font-bold shadow-sm transition-all">
                <i class="fas fa-comment"></i>
                <span>카톡 로그인하고 글쓰기</span>
            </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Category Tabs & Search Bar -->
    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6">
        <div class="w-full sm:w-auto overflow-x-auto scrollbar-none -mx-4 px-4 sm:mx-0 sm:px-0">
            <div class="inline-flex p-1.5 rounded-2xl bg-surface-container border border-outline-variant/30 text-xs font-semibold shrink-0">
                <?php foreach ($categories as $cat): ?>
                <a href="/community?category=<?= urlencode($cat) ?>" 
                   class="px-3.5 sm:px-4 py-2 rounded-xl transition-all whitespace-nowrap <?= ($category ?? '전체') === $cat ? 'bg-primary text-white shadow-sm font-bold' : 'text-gray-600 hover:text-primary' ?>">
                    <?= e($cat) ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Search Box (Responsive) -->
        <form action="/community" method="GET" class="relative flex items-center min-w-[200px]">
            <input type="hidden" name="category" value="<?= e($category ?? '전체') ?>">
            <input 
                type="text" 
                name="keyword" 
                value="<?= e($keyword ?? '') ?>" 
                placeholder="제목, 내용 검색..." 
                class="w-full pl-9 pr-4 py-2 rounded-full border border-outline-variant/50 bg-white text-xs focus:ring-2 focus:ring-primary shadow-soft">
            <i class="fas fa-search absolute left-3.5 text-gray-400 text-xs"></i>
        </form>
    </div>

    <!-- Posts Feed Cards -->
    <?php if (!empty($pagination['items'])): ?>
    <div class="space-y-4 mb-10">
        <?php foreach ($pagination['items'] as $post): ?>
        <article class="bg-white rounded-3xl border border-outline-variant/30 p-6 sm:p-7 shadow-soft hover:shadow-card transition-all group">
            
            <!-- Author & Category Bar -->
            <div class="flex items-center justify-between mb-3 text-xs">
                <div class="flex items-center gap-2.5">
                    <img src="<?= e($post['author_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-7 h-7 rounded-full object-cover border border-gray-200">
                    <div>
                        <span class="font-bold text-gray-900"><?= e($post['author_name']) ?></span>
                        <span class="text-[11px] text-gray-400 ml-1.5">• <?= date('Y.m.d', strtotime($post['created_at'])) ?></span>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-surface-container text-primary">
                    <?= e($post['category']) ?>
                </span>
            </div>

            <!-- Title & Snippet -->
            <a href="/community/<?= e($post['id']) ?>" class="block">
                <h2 class="font-serif-kr text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                    <?= e($post['title']) ?>
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 line-clamp-2 leading-relaxed mb-4">
                    <?= e(strip_tags($post['content'])) ?>
                </p>
            </a>

            <!-- Attached Image Preview (Thumbnail if any) -->
            <?php if (!empty($post['images'])): ?>
            <div class="flex gap-2 overflow-x-auto mb-4 py-1">
                <?php foreach (array_slice($post['images'], 0, 3) as $img): ?>
                <a href="/community/<?= e($post['id']) ?>" class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl overflow-hidden border border-gray-100 shrink-0">
                    <img src="<?= e($img) ?>" alt="Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                </a>
                <?php endforeach; ?>
                <?php if (count($post['images']) > 3): ?>
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-500 shrink-0">
                    +<?= count($post['images']) - 3 ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Footer: View & Comment Count & Kakao Notification Hint -->
            <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                <div class="flex items-center gap-4">
                    <span><i class="far fa-eye mr-1"></i>조회 <?= e($post['view_count']) ?></span>
                    <span class="text-primary font-bold"><i class="far fa-comment-dots mr-1"></i>댓글 <?= e($post['comment_count']) ?></span>
                </div>
                <div class="flex items-center gap-1 text-[11px] text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full font-medium">
                    <i class="fas fa-bell text-[10px]"></i>
                    <span>댓글 등록 시 카톡 알림</span>
                </div>
            </div>

        </article>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <?php if ($pagination['totalPages'] > 1): ?>
    <div class="flex justify-center items-center gap-2 mb-10">
        <?php for ($p = 1; $p <= $pagination['totalPages']; $p++): ?>
        <a href="/community?page=<?= $p ?><?= !empty($category) ? '&category=' . urlencode($category) : '' ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" 
           class="w-9 h-9 rounded-xl flex items-center justify-center text-xs font-bold transition-all <?= $p === $pagination['page'] ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-700 hover:bg-surface-container border border-gray-200' ?>">
            <?= $p ?>
        </a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>

    <?php else: ?>
    <div class="text-center py-16 bg-white rounded-3xl border border-outline-variant/30 p-8 max-w-md mx-auto">
        <i class="fas fa-comments text-4xl text-gray-300 mb-3"></i>
        <p class="text-sm font-semibold text-gray-700">등록된 나눔 글이 없습니다.</p>
        <p class="text-xs text-gray-500 mt-1">성도님들과 따뜻한 첫 소식을 나눠보세요!</p>
        <a href="/community/create" class="mt-4 inline-block px-5 py-2.5 bg-primary text-white rounded-full text-xs font-bold shadow-sm">
            첫 글 작성하기
        </a>
    </div>
    <?php endif; ?>

</div>
