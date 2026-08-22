<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
    
    <!-- Header -->
    <div class="border-b border-gray-200 pb-4 mb-6 flex items-center justify-between">
        <div>
            <h1 class="font-serif-kr text-2xl font-bold text-gray-900"><?= $post ? '나눔 글 수정' : '새 나눔 글 작성' ?></h1>
            <p class="text-xs text-gray-500 mt-1">성도님들과 함께 나눌 일상, 기도 제목, 감사 소식을 기록해 보세요.</p>
        </div>
        <a href="/community" class="text-xs text-gray-500 hover:text-gray-900 font-bold">
            ← 목록으로
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-3xl border border-outline-variant/40 shadow-soft p-6 sm:p-10">
        
        <form action="/community/save" method="POST" enctype="multipart/form-data" class="space-y-6">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <?php if ($post): ?>
            <input type="hidden" name="id" value="<?= e($post['id']) ?>">
            <?php endif; ?>

            <!-- Category & Author Display -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">카테고리</label>
                    <select name="category" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= e($cat) ?>" <?= ($post['category'] ?? '나눔과교제') === $cat ? 'selected' : '' ?>><?= e($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">작성자</label>
                    <div class="flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-gray-50 border border-gray-200 text-xs sm:text-sm font-bold text-gray-700">
                        <img src="<?= e($currentMember['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-5 h-5 rounded-full object-cover">
                        <span><?= e($currentMember['nickname']) ?></span>
                        <span class="text-xs text-primary font-semibold">(<?= e($currentMember['role'] ?? '등록성도') ?>)</span>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    제목 <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="<?= e($post['title'] ?? '') ?>" 
                    required 
                    placeholder="제목을 입력해 주세요" 
                    class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Existing Images (If Editing) -->
            <?php if (!empty($post['images'])): ?>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">현재 첨부된 사진</label>
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                    <?php foreach ($post['images'] as $img): ?>
                    <div class="relative rounded-2xl overflow-hidden border border-gray-200 aspect-square group">
                        <img src="<?= e($img) ?>" alt="Post Image" class="w-full h-full object-cover">
                        <input type="hidden" name="existing_images[]" value="<?= e($img) ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- File Upload -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    <i class="fas fa-camera mr-1 text-primary"></i> 사진 첨부 (다중 선택 가능)
                </label>
                <input 
                    type="file" 
                    name="images[]" 
                    multiple 
                    accept="image/*" 
                    class="w-full px-4 py-3 rounded-2xl border border-dashed border-gray-300 text-xs sm:text-sm bg-gray-50/50 hover:bg-gray-50 focus:outline-none">
                <p class="text-[11px] text-gray-400 mt-1">함께 나누고 싶은 사진이 있다면 여러 장 선택하여 올려주세요.</p>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    내용 <span class="text-red-500">*</span>
                </label>
                <textarea 
                    name="content" 
                    rows="8" 
                    required 
                    placeholder="나누고 싶으신 일상 이야기나 기도 제목을 자유롭게 적어주세요." 
                    class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($post['content'] ?? '') ?></textarea>
            </div>

            <!-- Kakao Notification Notice -->
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200/60 flex items-center gap-3 text-xs text-amber-800">
                <i class="fas fa-bell text-amber-600 text-base shrink-0"></i>
                <p>
                    이 글에 다른 성도님이 댓글을 남겨주시면, 카카오톡 알림으로 소식을 바로 전달해 드립니다.
                </p>
            </div>

            <!-- Actions -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="/community" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                    취소
                </a>
                <button type="submit" class="px-6 py-3 bg-primary hover:bg-primary-container text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                    <?= $post ? '나눔 글 수정 저장' : '나눔 글 등록하기' ?>
                </button>
            </div>

        </form>

    </div>

</div>
