<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8">
    
    <div class="border-b border-gray-100 pb-4 mb-6">
        <h2 class="text-xl font-bold text-gray-900">교회 기본정보 설정</h2>
        <p class="text-xs text-gray-500 mt-1">교회명, 연락처, 주소, 예배 시간 등 홈페이지 전체에 반영되는 정보를 실시간으로 변경합니다.</p>
    </div>

    <form action="/admin/settings" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            
            <!-- Site Name -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">교회명</label>
                <input type="text" name="site_name" value="<?= e($settings['site_name'] ?? '푸른나무교회') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Pastor Name -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">담임목사 성함</label>
                <input type="text" name="pastor_name" value="<?= e($settings['pastor_name'] ?? '심민보') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">대표 연락처 (전화번호)</label>
                <input type="text" name="phone" value="<?= e($settings['phone'] ?? '010-9559-8623') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">대표 이메일</label>
                <input type="email" name="email" value="<?= e($settings['email'] ?? 'nuriohga@gmail.com') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

        </div>

        <!-- Address -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">교회 주소</label>
            <input type="text" name="address" value="<?= e($settings['address'] ?? '전라북도 익산시 선화로73길 25 (3층)') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <!-- Main Slogan -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">메인 슬로건 문구</label>
            <input type="text" name="main_slogan" value="<?= e($settings['main_slogan'] ?? '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            
            <!-- Sunday Worship -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">주일예배 시간 문구</label>
                <input type="text" name="worship_sunday" value="<?= e($settings['worship_sunday'] ?? '주일 오전 11:00') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

            <!-- Bible Study -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">성경공부 / 제자훈련 문구</label>
                <input type="text" name="worship_study" value="<?= e($settings['worship_study'] ?? '청년 BIBLE TIME / 제자훈련') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
            </div>

        </div>

        <!-- Online Offering Bank Account Settings -->
        <div class="bg-emerald-50/60 border border-emerald-200/80 rounded-3xl p-5 sm:p-6 space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-emerald-200/60 pb-3">
                <h3 class="text-sm font-bold text-emerald-950 flex items-center gap-2">
                    <i class="fas fa-hand-holding-heart text-emerald-700"></i> 온라인 헌금 / 계좌 안내 설정
                </h3>
                <span class="text-[11px] font-bold text-emerald-800 bg-white px-2.5 py-0.5 rounded-full border border-emerald-200 shadow-2xs">
                    홈페이지 팝업 모달 & 주보 헌금계좌에 실시간 동기화
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">은행명</label>
                    <input type="text" name="bank_name" value="<?= e($settings['bank_name'] ?? '농협은행') ?>" placeholder="예: 농협은행, 카카오뱅크" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold bg-white focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">예금주</label>
                    <input type="text" name="bank_holder" value="<?= e($settings['bank_holder'] ?? '푸른나무교회') ?>" placeholder="예: 푸른나무교회" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold bg-white focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">계좌번호</label>
                    <input type="text" name="bank_account" value="<?= e($settings['bank_account'] ?? '351-9559-8623-03') ?>" placeholder="예: 351-9559-8623-03" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-mono font-bold bg-white focus:ring-2 focus:ring-primary">
                </div>
            </div>
            <p class="text-[11px] text-emerald-900/80 leading-relaxed">
                💡 여기서 변경하신 은행명, 예금주, 계좌번호는 <strong>홈페이지 상단 및 모바일의 [온라인 헌금 / 계좌 안내] 팝업 모달</strong>과 <strong>A4 주보 4면 헌금 계좌</strong>에 즉시 연동됩니다.
            </p>
        </div>

        <!-- Submit Button -->
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <i class="fas fa-save mr-1"></i> 설정 저장하기
            </button>
        </div>

    </form>

</div>
