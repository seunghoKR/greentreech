<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Breadcrumb & Back -->
    <div class="flex items-center justify-between mb-6">
        <a href="/community" class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-primary transition-colors">
            <i class="fas fa-arrow-left"></i>
            <span>나눔터 목록으로</span>
        </a>
        <div class="flex items-center gap-2 text-xs text-gray-400">
            <span>푸른나무 나눔터</span>
            <span>&gt;</span>
            <span class="text-gray-700 font-semibold truncate max-w-xs"><?= e($post['title']) ?></span>
        </div>
    </div>

    <!-- Main Post Article -->
    <article class="bg-white rounded-3xl border border-outline-variant/40 shadow-card overflow-hidden mb-8">
        
        <!-- Header -->
        <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <img src="<?= e($post['author_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-surface-container">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-sm text-gray-900"><?= e($post['author_name']) ?></span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-surface-container text-primary">
                                <?= e($post['author_role']) ?>
                            </span>
                        </div>
                        <span class="text-xs text-gray-400"><?= date('Y년 m월 d일 H:i', strtotime($post['created_at'])) ?></span>
                    </div>
                </div>

                <span class="px-3 py-1 rounded-full text-xs font-bold bg-primary text-white">
                    <?= e($post['category']) ?>
                </span>
            </div>

            <h1 class="font-serif-kr text-2xl sm:text-3xl font-bold text-gray-950 leading-snug">
                <?= e($post['title']) ?>
            </h1>

            <div class="flex items-center gap-4 text-xs text-gray-400 mt-4 pt-3 border-t border-gray-100">
                <span><i class="far fa-eye mr-1"></i>조회수 <?= e($post['view_count']) ?></span>
                <span class="text-primary font-bold"><i class="far fa-comment-dots mr-1"></i>댓글 <?= e($post['comment_count']) ?>개</span>
                <?php if ((int)$post['author_notify'] === 1): ?>
                <span class="text-amber-700 bg-amber-50 px-2.5 py-0.5 rounded-full text-[11px] font-semibold flex items-center gap-1">
                    <i class="fas fa-bell text-[10px]"></i> 댓글 카톡 알림 On
                </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Multiple Images Gallery -->
        <?php if (!empty($post['images'])): ?>
        <div class="p-6 sm:p-8 bg-gray-50/60 border-b border-gray-100 space-y-4">
            <?php foreach ($post['images'] as $img): ?>
            <div class="rounded-2xl overflow-hidden border border-gray-200 bg-white max-h-[600px] flex items-center justify-center">
                <img src="<?= e($img) ?>" alt="Post Image" class="w-full h-auto object-contain cursor-pointer" onclick="window.open(this.src, '_blank')">
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Content Body -->
        <div class="p-6 sm:p-10 prose max-w-none text-gray-800 text-sm sm:text-base leading-relaxed whitespace-pre-line font-serif-kr">
            <?= nl2br(e($post['content'])) ?>
        </div>

        <!-- Post Action Bar (Author / Admin Only) -->
        <?php 
            $isAuthor = ($currentMember && (int)$currentMember['id'] === (int)$post['member_id']);
            $isAdmin = \App\Core\Auth::check();
        ?>
        <?php if ($isAuthor || $isAdmin): ?>
        <div class="p-4 bg-gray-50/70 border-t border-gray-100 flex items-center justify-end gap-2 text-xs">
            <a href="/community/edit/<?= e($post['id']) ?>" class="px-4 py-2 bg-white border border-gray-200 hover:bg-gray-50 rounded-xl text-gray-700 font-bold transition-all">
                <i class="fas fa-edit mr-1"></i> 수정
            </a>
            <a href="/community/delete/<?= e($post['id']) ?>" onclick="return confirm('정말 이 나눔 글을 삭제하시겠습니까?');" class="px-4 py-2 bg-red-50 hover:bg-red-100 border border-red-200 text-red-600 rounded-xl font-bold transition-all">
                <i class="fas fa-trash-alt mr-1"></i> 삭제
            </a>
        </div>
        <?php endif; ?>

    </article>

    <!-- Comments Section -->
    <section class="bg-white rounded-3xl border border-outline-variant/40 shadow-soft p-6 sm:p-8 space-y-6">
        
        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
            <h3 class="font-serif-kr text-lg font-bold text-gray-900 flex items-center gap-2">
                <i class="fas fa-comments text-primary"></i>
                <span>성도님들의 따뜻한 댓글</span>
                <span class="text-primary font-bold text-sm">(<?= count($comments) ?>)</span>
            </h3>
        </div>

        <!-- Comments List -->
        <div class="space-y-4">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $cmt): ?>
                <div id="comment-<?= e($cmt['id']) ?>" class="p-4 rounded-2xl bg-surface-container-low/60 border border-outline-variant/20 flex flex-col justify-between space-y-2">
                    
                    <div class="flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2">
                            <img src="<?= e($cmt['author_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-6 h-6 rounded-full object-cover">
                            <span class="font-bold text-gray-900"><?= e($cmt['author_name']) ?></span>
                            <span class="text-[10px] text-primary px-2 py-0.5 rounded bg-surface-container font-semibold">
                                <?= e($cmt['author_role']) ?>
                            </span>
                            <span class="text-[11px] text-gray-400"><?= date('m.d H:i', strtotime($cmt['created_at'])) ?></span>
                        </div>

                        <?php 
                            $canDelete = ($currentMember && (int)$currentMember['id'] === (int)$cmt['member_id']) || $isAdmin;
                        ?>
                        <?php if ($canDelete): ?>
                        <a href="/community/comment/delete/<?= e($cmt['id']) ?>" onclick="return confirm('댓글을 삭제하시겠습니까?');" class="text-gray-400 hover:text-red-500 text-xs">
                            <i class="fas fa-times"></i>
                        </a>
                        <?php endif; ?>
                    </div>

                    <p class="text-xs sm:text-sm text-gray-800 leading-relaxed whitespace-pre-line pl-8">
                        <?= nl2br(e($cmt['content'])) ?>
                    </p>

                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-8 text-xs text-gray-400">
                    아직 등록된 댓글이 없습니다. 첫 번째 따뜻한 응원의 댓글을 남겨보세요!
                </div>
            <?php endif; ?>
        </div>

        <!-- Comment Write Form -->
        <div class="pt-4 border-t border-gray-100">
            <?php if ($currentMember): ?>
            <form action="/community/comment/<?= e($post['id']) ?>" method="POST" class="space-y-3">
                <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
                
                <div class="flex items-center gap-2 text-xs font-bold text-gray-700">
                    <img src="<?= e($currentMember['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-6 h-6 rounded-full object-cover">
                    <span><?= e($currentMember['nickname']) ?> 성도님으로 댓글 작성</span>
                    <span class="text-[11px] text-amber-600 ml-auto font-medium">
                        <i class="fas fa-bell text-[10px]"></i> 작성자에게 카톡 알림 전송됨
                    </span>
                </div>

                <textarea 
                    name="content" 
                    rows="3" 
                    required 
                    placeholder="따뜻한 위로와 응원, 은혜의 나눔 댓글을 남겨주세요." 
                    class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"></textarea>

                <div class="flex justify-end">
                    <button type="submit" class="px-5 py-2.5 bg-primary hover:bg-primary-container text-white rounded-full text-xs font-bold shadow-sm transition-all">
                        <i class="fas fa-paper-plane mr-1 text-secondary-container"></i> 댓글 등록
                    </button>
                </div>
            </form>
            <?php else: ?>
            <div class="p-6 rounded-2xl bg-surface-container-low border border-outline-variant/30 text-center space-y-3">
                <p class="text-xs sm:text-sm text-gray-700 font-medium">
                    댓글을 작성하시려면 <strong>카톡 로그인</strong>이 필요합니다.
                </p>
                <a href="/auth/login?redirect=<?= urlencode("/community/{$post['id']}") ?>" class="inline-flex items-center gap-2 bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] px-6 py-2.5 rounded-full text-xs font-bold shadow-sm transition-all">
                    <i class="fas fa-comment"></i>
                    <span>카톡 로그인하고 댓글 달기</span>
                </a>
            </div>
            <?php endif; ?>
        </div>

    </section>

</div>
