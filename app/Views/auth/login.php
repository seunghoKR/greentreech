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

        <!-- Local Development Test Accounts (Super convenient for local testing) -->
        <div class="pt-6 border-t border-gray-100 text-left space-y-3">
            <span class="text-xs font-bold text-primary block">
                <i class="fas fa-flask mr-1"></i> 로컬 테스트용 원클릭 빠른 로그인
            </span>
            <p class="text-[11px] text-gray-500 leading-relaxed">
                카카오 API 키 없이 로컬에서 바로 성도 및 교역자 권한으로 테스트해 보실 수 있습니다:
            </p>

            <div class="grid grid-cols-2 gap-2">
                <a href="/auth/mock?mock_id=member_01&name=김은혜+성도&role=등록성도" class="p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-xs font-semibold text-gray-700 flex items-center gap-2 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    <span>김은혜 성도님</span>
                </a>
                <a href="/auth/mock?mock_id=member_02&name=이믿음+청년&role=등록성도" class="p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-xs font-semibold text-gray-700 flex items-center gap-2 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                    <span>이믿음 청년</span>
                </a>
                <a href="/auth/mock?mock_id=member_03&name=박사랑+권사&role=등록성도" class="p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-xs font-semibold text-gray-700 flex items-center gap-2 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                    <span>박사랑 권사님</span>
                </a>
                <a href="/auth/mock?mock_id=pastor_01&name=심민보+목사&role=교역자" class="p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 text-xs font-semibold text-gray-700 flex items-center gap-2 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    <span>심민보 목사님</span>
                </a>
            </div>
        </div>

    </div>

</div>
