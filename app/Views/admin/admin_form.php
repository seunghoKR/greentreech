<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-2xl">
    
    <div class="border-b border-gray-100 pb-4 mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900"><?= $editAdmin ? '관리자 권한 수정' : '새 부관리자/사역자 등록' ?></h2>
            <p class="text-xs text-gray-500 mt-1">지정할 권한 체크박스를 선택하여 담당 사역 메뉴만 관리할 수 있도록 부여합니다.</p>
        </div>
        <a href="/admin/admins" class="text-xs text-gray-500 hover:text-gray-900 font-bold">
            ← 목록으로
        </a>
    </div>

    <form action="/admin/admins/save" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <?php if ($editAdmin): ?>
        <input type="hidden" name="id" value="<?= e($editAdmin['id']) ?>">
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            
            <!-- Name -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">이름 / 목회자 성함 <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="<?= e($editAdmin['name'] ?? '') ?>" required placeholder="예: 김사역 전도사" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Role -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">관리자 구분 <span class="text-red-500">*</span></label>
                <select name="role" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    <option value="부관리자 (사역담당)" <?= ($editAdmin['role'] ?? '') === '부관리자 (사역담당)' ? 'selected' : '' ?>>부관리자 (사역담당)</option>
                    <option value="담임목사 (최고관리자)" <?= ($editAdmin['role'] ?? '') === '담임목사 (최고관리자)' ? 'selected' : '' ?>>담임목사 (최고관리자)</option>
                    <option value="게시판 관리자" <?= ($editAdmin['role'] ?? '') === '게시판 관리자' ? 'selected' : '' ?>>게시판 관리자</option>
                    <option value="미디어 사역자" <?= ($editAdmin['role'] ?? '') === '미디어 사역자' ? 'selected' : '' ?>>미디어 사역자</option>
                </select>
            </div>

            <!-- Username -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">로그인 아이디 <span class="text-red-500">*</span></label>
                <input type="text" name="username" value="<?= e($editAdmin['username'] ?? '') ?>" <?= $editAdmin ? 'readonly' : 'required' ?> placeholder="영문/숫자 조합" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary <?= $editAdmin ? 'bg-gray-50 text-gray-500' : '' ?>">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    비밀번호 <?= $editAdmin ? '(변경 시에만 입력)' : '<span class="text-red-500">*</span>' ?>
                </label>
                <input type="password" name="password" <?= $editAdmin ? '' : 'required' ?> placeholder="비밀번호 입력" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

        </div>

        <!-- Permissions Checkboxes -->
        <div class="pt-2">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-3">
                접근 허용 권한 지정 (체크박스)
            </label>
            
            <?php 
                $currPerms = [];
                if ($editAdmin) {
                    $raw = $editAdmin['permissions'] ?? '[]';
                    $currPerms = is_array($raw) ? $raw : json_decode((string)$raw, true);
                    if (!is_array($currPerms)) $currPerms = [];
                }
            ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <?php foreach ($availablePerms as $key => $permInfo): ?>
                <label class="flex items-start gap-3 p-3 rounded-2xl border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                    <input type="checkbox" name="permissions[]" value="<?= e($key) ?>" <?= in_array($key, $currPerms, true) ? 'checked' : '' ?> class="mt-0.5 rounded text-primary focus:ring-primary h-4 w-4">
                    <div>
                        <p class="font-bold text-xs text-gray-900"><?= e($permInfo['label']) ?></p>
                        <p class="text-[11px] text-gray-500"><?= e($permInfo['desc']) ?></p>
                    </div>
                </label>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Actions -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="/admin/admins" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                취소
            </a>
            <button type="submit" class="px-6 py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <?= $editAdmin ? '권한 및 정보 수정 저장' : '새 부관리자 등록하기' ?>
            </button>
        </div>

    </form>

</div>