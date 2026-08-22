<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-3xl">
    
    <div class="border-b border-gray-100 pb-4 mb-6">
        <h2 class="text-xl font-bold text-gray-900">카카오 로그인 & 알림 설정</h2>
        <p class="text-xs text-gray-500 mt-1">카카오 디벨로퍼스(developers.kakao.com)에서 발급받은 REST API 키와 Redirect URI를 입력해 주세요.</p>
    </div>

    <form action="/admin/kakao" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <!-- Kakao REST API Key -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                카카오 REST API 키
            </label>
            <input 
                type="text" 
                name="kakao_rest_api_key" 
                value="<?= e($settings['kakao_rest_api_key'] ?? '') ?>" 
                placeholder="예: 3a1b2c3d4e5f6g7h8i9j0k..." 
                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary font-mono">
            <p class="text-[11px] text-gray-400 mt-1">카카오 디벨로퍼스 > 내 애플리케이션 > 앱 키 > [REST API 키] 값을 입력하세요.</p>
        </div>

        <!-- Kakao Admin Key (For Notification / Message sending) -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                카카오 Admin 키 (알림 발송용)
            </label>
            <input 
                type="text" 
                name="kakao_admin_key" 
                value="<?= e($settings['kakao_admin_key'] ?? '') ?>" 
                placeholder="예: 9z8y7x6w5v4u3t2s1r0q..." 
                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary font-mono">
        </div>

        <!-- Redirect URI -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                카카오 Redirect URI (콜백 주소)
            </label>
            <input 
                type="url" 
                name="kakao_redirect_uri" 
                value="<?= e($settings['kakao_redirect_uri'] ?? 'http://localhost:8000/auth/kakao/callback') ?>" 
                placeholder="예: http://localhost:8000/auth/kakao/callback" 
                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary font-mono">
            <p class="text-[11px] text-amber-700 bg-amber-50 p-3 rounded-xl mt-2 leading-relaxed">
                <i class="fas fa-info-circle mr-1"></i> 카카오 디벨로퍼스 > 카카오 로그인 > [Redirect URI 등록] 메뉴에 위 주소를 동일하게 등록해 주셔야 로그인이 정상 작동합니다.
            </p>
        </div>

        <!-- Submit -->
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <i class="fas fa-save mr-1"></i> 카카오 설정 저장하기
            </button>
        </div>

    </form>

</div>
