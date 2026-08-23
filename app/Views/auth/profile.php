<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-xl mx-auto">
    
    <div class="bg-white rounded-3xl border border-outline-variant/40 shadow-soft p-6 sm:p-10 space-y-6">
        
        <!-- Header -->
        <div class="border-b border-gray-100 pb-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="<?= e($member['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-12 h-12 rounded-full object-cover border-2 border-surface-container">
                <div>
                    <h1 class="font-serif-kr text-xl font-bold text-gray-900"><?= e($member['nickname']) ?> 성도님</h1>
                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-surface-container text-primary">
                        <?= e($member['role'] === '등록성도' ? '푸른나무가족' : ($member['role'] ?? '푸른나무가족')) ?>
                    </span>
                </div>
            </div>
            <a href="/auth/logout" class="text-xs text-red-500 hover:text-red-700 font-bold">
                로그아웃
            </a>
        </div>

        <form action="/auth/profile" method="POST" class="space-y-5">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

            <!-- Real Name (필수) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    성함 (실명) <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="name" 
                    value="<?= e($member['name'] ?? '') ?>" 
                    required
                    placeholder="성도님의 실명을 입력해 주세요 (예: 홍길동)" 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                <p class="text-[11px] text-gray-400 mt-1">교우 명부 등록 및 성도 확인을 위해 실명을 입력해 주세요.</p>
            </div>

            <!-- Nickname (필수) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    활동 닉네임 <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="nickname" 
                    value="<?= e($member['nickname'] ?? '') ?>" 
                    required 
                    placeholder="나눔터에 표시될 닉네임"
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                <p class="text-[11px] text-gray-400 mt-1">나눔터 글/댓글 작성 시 다른 성도님들에게 표시되는 이름입니다.</p>
            </div>

            <!-- Phone (선택) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    연락처 (휴대폰 번호) <span class="text-gray-400 font-normal text-[11px]">(선택)</span>
                </label>
                <input 
                    type="tel" 
                    name="phone" 
                    value="<?= e($member['phone'] ?? '') ?>" 
                    placeholder="010-1234-5678" 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                <p class="text-[11px] text-gray-400 mt-1">긴급 기도제목 및 교회 소식 안내가 필요할 경우 입력해 주세요.</p>
            </div>

            <!-- Email (Read-only) -->
            <?php if (!empty($member['email'])): ?>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">카카오 연동 이메일</label>
                <input 
                    type="email" 
                    value="<?= e($member['email']) ?>" 
                    readonly 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
            </div>
            <?php endif; ?>

            <!-- Notification Toggle -->
            <div class="p-4 bg-surface-container-low rounded-2xl border border-outline-variant/30 space-y-2">
                <label class="flex items-center justify-between cursor-pointer">
                    <span class="text-xs font-bold text-primary">
                        <i class="fas fa-bell mr-1"></i> 카카오톡 댓글 알림 수신
                    </span>
                    <input 
                        type="checkbox" 
                        name="notify_kakao" 
                        value="1" 
                        <?= (int)($member['notify_kakao'] ?? 1) === 1 ? 'checked' : '' ?> 
                        class="rounded text-primary focus:ring-primary h-4 w-4">
                </label>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    내가 작성한 나눔터 글에 새로운 댓글이 달리면 카카오톡으로 실시간 알림을 받습니다.
                </p>
            </div>

            <!-- Submit -->
            <div class="pt-2 flex justify-end">
                <button type="submit" class="w-full py-3 bg-primary hover:bg-primary-container text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                    내 정보 변경 저장
                </button>
            </div>

        </form>

    </div>

</div>
