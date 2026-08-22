<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8">
    
    <div class="border-b border-gray-100 pb-4 mb-6">
        <h2 class="text-xl font-bold text-gray-900">사이트 기본정보 설정</h2>
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

        <!-- Naver Map URL -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">네이버 지도 바로가기 링크</label>
            <input type="url" name="naver_map_url" value="<?= e($settings['naver_map_url'] ?? 'https://naver.me/xqb2I1g5') ?>" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <!-- Google Map Embed URL -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">구글 지도 임베드 URL</label>
            <input type="text" name="google_map_embed" value="<?= e($settings['google_map_embed'] ?? 'https://maps.google.com/maps?q=%EC%A0%84%EB%B6%81%20%EC%9D%B5%EC%82%B0%EC%8B%9C%20%EC%84%A0%ED%99%94%EB%A1%9C73%EA%B8%B8%2025&t=&z=17&ie=UTF8&iwloc=&output=embed') ?>" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <!-- Submit Button -->
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <i class="fas fa-save mr-1"></i> 설정 저장하기
            </button>
        </div>

    </form>

</div>
