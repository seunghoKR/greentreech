<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-lg">
    
    <div class="border-b border-gray-100 pb-4 mb-6">
        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
            <i class="fas fa-key text-primary"></i>
            <span><?= !empty($isKakaoLogin) ? '비상용 관리자 비밀번호 설정' : '관리자 비밀번호 변경' ?></span>
        </h2>
        <p class="text-xs text-gray-500 mt-1">
            <?= !empty($isKakaoLogin) 
                ? '카카오 로그인 외에 아이디(이메일)/비밀번호로도 비상 접속할 수 있도록 비밀번호를 설정합니다.' 
                : '보안을 위해 비밀번호를 주기적으로 변경해 주세요.' ?>
        </p>
    </div>

    <!-- Kakao Admin Info Box -->
    <?php if (!empty($isKakaoLogin)): ?>
    <div class="mb-6 p-4 rounded-2xl bg-amber-50/80 border border-amber-200/70 text-xs text-amber-900 space-y-1.5">
        <div class="flex items-center gap-1.5 font-bold text-amber-950">
            <i class="fas fa-shield-halved text-amber-600"></i>
            <span>카카오 간편 로그인 연동 계정</span>
        </div>
        <p class="text-amber-800 leading-relaxed">
            현재 <strong>카카오 계정(<?= e($curUser['username'] ?? '카카오 계정') ?>)</strong>으로 안전하게 로그인되어 있어 <strong>현재 비밀번호 입력 없이</strong> 새 비밀번호를 바로 설정하실 수 있습니다.
        </p>
        <p class="text-[11px] text-amber-700">
            * 설정 후에는 <strong>아이디(이메일)와 여기서 등록한 비밀번호</strong>로도 관리자 접속이 가능해집니다.
        </p>
    </div>
    <?php endif; ?>

    <form action="/admin/password" method="POST" class="space-y-4">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <?php if (empty($isKakaoLogin)): ?>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">현재 비밀번호 <span class="text-red-500">*</span></label>
            <input type="password" name="current_password" required placeholder="현재 비밀번호 입력" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>
        <?php endif; ?>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                <?= !empty($isKakaoLogin) ? '설정할 새 비밀번호' : '새 비밀번호' ?> (최소 6자) <span class="text-red-500">*</span>
            </label>
            <input type="password" name="new_password" required minlength="6" placeholder="새 비밀번호 입력 (영문/숫자/특수문자)" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">새 비밀번호 확인 <span class="text-red-500">*</span></label>
            <input type="password" name="confirm_password" required minlength="6" placeholder="새 비밀번호 다시 한 번 입력" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="w-full py-3.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all flex items-center justify-center gap-2">
                <i class="fas fa-check-circle"></i>
                <span><?= !empty($isKakaoLogin) ? '비밀번호 등록 및 저장' : '비밀번호 변경하기' ?></span>
            </button>
        </div>

    </form>

</div>
