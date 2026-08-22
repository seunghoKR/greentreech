<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-4xl">
    
    <?php 
        $returnPage = $returnPage ?? 1;
        $returnCategory = $returnCategory ?? '전체';
        $returnKeyword = $returnKeyword ?? '';
        $listUrl = "/admin/sermons?page={$returnPage}&category=" . urlencode($returnCategory) . (!empty($returnKeyword) ? '&keyword=' . urlencode($returnKeyword) : '');
    ?>

    <div class="border-b border-gray-100 pb-4 mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900"><?= $sermon ? '영상 정보 수정' : '새 영상/설교 등록' ?></h2>
            <p class="text-xs text-gray-500 mt-1">유튜브 링크나 영상 ID를 입력하시면 썸네일과 플레이어가 자동 연동됩니다.</p>
        </div>
        <a href="<?= e($listUrl) ?>" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5">
            <i class="fas fa-arrow-left text-xs"></i>
            <span>목록으로 돌아가기</span>
        </a>
    </div>

    <form action="/admin/sermons/save" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="page" value="<?= e($returnPage) ?>">
        <input type="hidden" name="filter_category" value="<?= e($returnCategory) ?>">
        <input type="hidden" name="keyword" value="<?= e($returnKeyword) ?>">

        <?php if ($sermon): ?>
        <input type="hidden" name="id" value="<?= e($sermon['id']) ?>">
        <?php endif; ?>

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                영상/설교 제목 <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                name="title" 
                value="<?= e($sermon['title'] ?? '') ?>" 
                required 
                placeholder="예: 그리스도 안에서 누리는 참된 쉼과 회복" 
                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            
            <!-- Category -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">영상 분류 (카테고리)</label>
                <select name="category" class="w-full px-3 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary bg-white">
                    <option value="설교 영상" <?= (($sermon['category'] ?? '') === '설교 영상' || ($sermon['category'] ?? '') === '주일 설교' || empty($sermon['category'])) ? 'selected' : '' ?>>📖 설교 영상</option>
                    <option value="예배 영상" <?= (($sermon['category'] ?? '') === '예배 영상') ? 'selected' : '' ?>>✝️ 예배 영상</option>
                    <option value="듣는 성경" <?= (($sermon['category'] ?? '') === '듣는 성경') ? 'selected' : '' ?>>🎧 듣는 성경</option>
                    <option value="설교 쇼츠" <?= (($sermon['category'] ?? '') === '설교 쇼츠' || ($sermon['category'] ?? '') === '설교 말씀 쇼츠') ? 'selected' : '' ?>>⚡ 설교 쇼츠</option>
                    <option value="예배 쇼츠" <?= (($sermon['category'] ?? '') === '예배 쇼츠') ? 'selected' : '' ?>>🙏 예배 쇼츠</option>
                    <option value="교회 행사/일상" <?= (($sermon['category'] ?? '') === '교회 행사/일상' || ($sermon['category'] ?? '') === '교회 일상 & 애찬 쇼츠' || ($sermon['category'] ?? '') === '교회 행사 & 특별 찬양') ? 'selected' : '' ?>>🌿 교회 행사/일상</option>
                    <option value="기타" <?= (($sermon['category'] ?? '') === '기타' || ($sermon['category'] ?? '') === '성도 간증 & 교우 소식') ? 'selected' : '' ?>>📦 기타</option>
                </select>
            </div>

            <!-- Preacher / Speaker -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">설교자 / 출연자</label>
                <input 
                    type="text" 
                    name="preacher" 
                    value="<?= e($sermon['preacher'] ?? '심민보 목사') ?>" 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Scripture -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">성경 본문 (선택)</label>
                <input 
                    type="text" 
                    name="scripture" 
                    value="<?= e($sermon['scripture'] ?? '') ?>" 
                    placeholder="예: 마태복음 11:28-30" 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Date -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">게시/설교 일자</label>
                <input 
                    type="date" 
                    name="sermon_date" 
                    value="<?= e($sermon['sermon_date'] ?? date('Y-m-d')) ?>" 
                    required 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

        </div>

        <!-- YouTube URL or ID -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                <i class="fab fa-youtube text-red-500 mr-1"></i> 유튜브 영상 링크 또는 Video ID
            </label>
            <input 
                type="text" 
                name="youtube_id" 
                value="<?= e($sermon['youtube_id'] ?? '') ?>" 
                placeholder="예: https://www.youtube.com/watch?v=dQw4w9WgXcQ 또는 dQw4w9WgXcQ" 
                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            <p class="text-[11px] text-gray-400 mt-1">전체 유튜브 주소(youtu.be / youtube.com)를 그대로 붙여넣으셔도 자동으로 인식됩니다.</p>
        </div>

        <!-- Content -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">영상 요약 및 본문 내용</label>
            <textarea 
                name="content" 
                rows="8" 
                placeholder="영상 요약 및 성도들과 나눌 말씀을 자유롭게 입력해 주세요." 
                class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($sermon['content'] ?? '') ?></textarea>
        </div>

        <!-- Actions -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="<?= e($listUrl) ?>" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                취소
            </a>
            <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <?= $sermon ? '영상 정보 저장' : '새 영상 등록' ?>
            </button>
        </div>

    </form>

</div>
