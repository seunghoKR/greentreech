<div class="py-16 px-4 sm:px-6 lg:px-8 max-w-md mx-auto text-center">
    
    <div class="bg-white rounded-3xl border border-outline-variant/40 shadow-card p-8 sm:p-10 space-y-6">
        
        <!-- Logo & Header -->
        <div>
            <div class="w-16 h-16 mx-auto rounded-full bg-surface-container flex items-center justify-center p-2 mb-3 shadow-sm border border-outline-variant/30">
                <img src="/public/assets/images/logo.png" alt="Logo" class="w-full h-full object-contain">
            </div>
            <h1 class="font-serif-kr text-2xl font-bold text-gray-900">카톡 로그인</h1>
            <p class="text-xs text-gray-500 mt-1">나눔터 소통과 댓글 작성을 위해 카톡 계정으로 간편하게 시작하세요.</p>
        </div>

        <!-- Kakao 1-Click Login Button -->
        <div class="space-y-3 pt-2">
            <a href="<?= e($kakaoLoginUrl) ?>" class="w-full py-3.5 bg-[#FEE500] hover:bg-[#FADA0A] text-[#191919] rounded-2xl font-bold text-sm shadow-sm hover:shadow-md transition-all flex items-center justify-center gap-2">
                <i class="fas fa-comment text-lg"></i>
                <span>카톡으로 1초 로그인</span>
            </a>
            <p class="text-[11px] text-gray-400">
                별도의 비밀번호 없이 카카오톡 계정으로 안전하게 로그인됩니다.
            </p>
        </div>


    </div>

</div>
