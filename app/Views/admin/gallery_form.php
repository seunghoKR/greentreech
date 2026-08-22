<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-4xl">
    
    <div class="border-b border-gray-100 pb-4 mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900"><?= $item ? '갤러리 게시물 수정' : '새 갤러리 게시물 등록' ?></h2>
            <p class="text-xs text-gray-500 mt-1">이미지 파일들을 여러 장 선택하여 일괄 업로드하실 수 있습니다.</p>
        </div>
        <a href="/admin/gallery" class="text-xs text-gray-500 hover:text-gray-900 font-bold">
            ← 목록으로
        </a>
    </div>

    <form action="/admin/gallery/save" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <?php if ($item): ?>
        <input type="hidden" name="id" value="<?= e($item['id']) ?>">
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            
            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">카테고리</label>
                <select name="category" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    <?php foreach ($categories as $cat): ?>
                    <option value="<?= e($cat) ?>" <?= ($item['category'] ?? '') === $cat ? 'selected' : '' ?>><?= e($cat) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Title -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    게시물 제목 <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    value="<?= e($item['title'] ?? '') ?>" 
                    required 
                    placeholder="제목을 입력해 주세요" 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

        </div>

        <!-- Event Date -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">행사 / 작성 일자</label>
            <input 
                type="date" 
                name="event_date" 
                value="<?= e($item['event_date'] ?? date('Y-m-d')) ?>" 
                required 
                class="w-full sm:w-64 px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <!-- Existing Images (If Editing) -->
        <?php if (!empty($item['images'])): ?>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">현재 등록된 이미지</label>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <?php foreach ($item['images'] as $img): ?>
                <div class="relative rounded-2xl overflow-hidden border border-gray-200 aspect-square group">
                    <img src="<?= e($img) ?>" alt="Image" class="w-full h-full object-cover">
                    <input type="hidden" name="existing_images[]" value="<?= e($img) ?>">
                </div>
                <?php endforeach; ?>
            </div>
            <p class="text-[11px] text-gray-400 mt-1">새 사진을 추가로 선택하시면 기존 사진에 덧붙여 업로드됩니다.</p>
        </div>
        <?php endif; ?>

        <!-- Multiple File Upload -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                <i class="fas fa-upload mr-1"></i> 사진 업로드 (다중 선택 가능)
            </label>
            <input 
                type="file" 
                name="images[]" 
                multiple 
                accept="image/*" 
                class="w-full px-4 py-3 rounded-2xl border border-dashed border-gray-300 text-xs sm:text-sm bg-gray-50/50 hover:bg-gray-50 focus:outline-none">
            <p class="text-[11px] text-gray-400 mt-1">JPG, PNG, WEBP, GIF 파일을 업로드하실 수 있습니다. (첫 번째 사진이 썸네일로 사용됩니다)</p>
        </div>

        <!-- Content -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">설명 및 나눔 글</label>
            <textarea 
                name="content" 
                rows="6" 
                placeholder="사진에 대한 이야기나 설명을 적어주세요." 
                class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($item['content'] ?? '') ?></textarea>
        </div>

        <!-- Actions -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="/admin/gallery" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                취소
            </a>
            <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <?= $item ? '게시물 수정 저장' : '새 게시물 등록' ?>
            </button>
        </div>

    </form>

</div>
