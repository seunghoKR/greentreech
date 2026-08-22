<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Location & Map</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">오시는 길</h1>
        <p class="text-sm text-gray-600 mt-2">푸른나무교회 찾아오시는 위치와 스마트폰 내비게이션 안내입니다</p>
    </div>

    <!-- Sub Nav -->
    <?php require __DIR__ . '/nav.php'; ?>

    <!-- 3 Info Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        
        <!-- Address -->
        <div class="bg-white p-6 rounded-2xl border border-outline-variant/30 shadow-soft text-center space-y-2">
            <div class="w-10 h-10 mx-auto rounded-xl bg-surface-container flex items-center justify-center text-primary text-lg">
                <i class="fas fa-location-dot"></i>
            </div>
            <h3 class="font-bold text-sm text-gray-900">도로명 주소</h3>
            <p class="text-xs text-gray-600 leading-relaxed">
                <?= e($address ?? '전라북도 익산시 선화로73길 25') ?><br>
                <span class="font-bold text-primary">(건물 3층 푸른나무교회)</span>
            </p>
            <button onclick="copyAddress('<?= e(addslashes($address ?? '전라북도 익산시 선화로73길 25')) ?>')" class="text-[11px] text-primary font-bold hover:underline pt-1 inline-block">
                <i class="far fa-copy mr-1"></i> 주소 복사하기
            </button>
        </div>

        <!-- Transit -->
        <div class="bg-white p-6 rounded-2xl border border-outline-variant/30 shadow-soft text-center space-y-2">
            <div class="w-10 h-10 mx-auto rounded-xl bg-surface-container flex items-center justify-center text-primary text-lg">
                <i class="fas fa-bus"></i>
            </div>
            <h3 class="font-bold text-sm text-gray-900">대중교통 / 위치</h3>
            <p class="text-xs text-gray-600 leading-relaxed">
                부송동 주공아파트 인근<br>
                <span class="font-semibold text-secondary">선화로73길 도보 3분</span>
            </p>
            <p class="text-[11px] text-gray-400">교회 주변 주차 가능</p>
        </div>

        <!-- Contact Phone -->
        <div class="bg-white p-6 rounded-2xl border border-outline-variant/30 shadow-soft text-center space-y-2">
            <div class="w-10 h-10 mx-auto rounded-xl bg-surface-container flex items-center justify-center text-primary text-lg">
                <i class="fas fa-phone-alt"></i>
            </div>
            <h3 class="font-bold text-sm text-gray-900">문의 전화</h3>
            <p class="text-xs text-gray-600 leading-relaxed">
                언제든 편하게 연락주세요<br>
                <a href="tel:<?= e($phone ?? '010-9559-8623') ?>" class="font-bold text-primary hover:underline text-sm"><?= e($phone ?? '010-9559-8623') ?></a>
            </p>
            <p class="text-[11px] text-gray-400">심민보 담임목사</p>
        </div>

    </div>

    <!-- 3-Navigation One-Click Launchers Card -->
    <div class="bg-white rounded-3xl border border-outline-variant/40 shadow-card overflow-hidden mb-8 p-6 sm:p-8 text-center">
        <span class="text-xs font-bold text-primary px-3 py-1 rounded-full bg-surface-container inline-block mb-3">
            <i class="fas fa-route mr-1"></i> 스마트폰 내비게이션 바로 켜기
        </span>
        <h3 class="font-serif-kr text-xl font-bold text-gray-900 mb-2">원클릭 실시간 길안내</h3>
        <p class="text-xs sm:text-sm text-gray-600 mb-6">사용하시는 내비게이션 앱을 선택하시면 푸른나무교회로 즉시 길안내가 시작됩니다.</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl mx-auto mb-6">
            <!-- Naver Map -->
            <a href="https://map.naver.com/v5/search/전북%20익산시%20선화로73길%2025" target="_blank" class="p-4 rounded-2xl bg-[#03C75A]/10 hover:bg-[#03C75A] text-[#03C75A] hover:text-white font-bold text-xs sm:text-sm border border-[#03C75A]/30 transition-all flex flex-col items-center gap-2 group">
                <i class="fas fa-location-arrow text-xl group-hover:scale-110 transition-transform"></i>
                <span>네이버지도 길찾기</span>
            </a>

            <!-- Kakao Navi -->
            <a href="https://map.kakao.com/link/search/전북 익산시 선화로73길 25" target="_blank" class="p-4 rounded-2xl bg-[#FEE500]/30 hover:bg-[#FEE500] text-[#191919] font-bold text-xs sm:text-sm border border-[#FEE500]/60 transition-all flex flex-col items-center gap-2 group">
                <i class="fas fa-car text-xl group-hover:scale-110 transition-transform"></i>
                <span>카카오내비 안내</span>
            </a>

            <!-- T-Map -->
            <a href="https://tmap.life/search?q=전북 익산시 선화로73길 25" target="_blank" class="p-4 rounded-2xl bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white font-bold text-xs sm:text-sm border border-blue-200 transition-all flex flex-col items-center gap-2 group">
                <i class="fas fa-compass text-xl group-hover:scale-110 transition-transform"></i>
                <span>티맵 (T-map) 안내</span>
            </a>
        </div>

        <!-- Google / Interactive Map Embed -->
        <div class="p-2 bg-gray-50 rounded-2xl border border-gray-100">
            <div class="relative w-full aspect-video sm:aspect-[21/9] rounded-xl overflow-hidden shadow-inner bg-gray-200">
                <iframe 
                    src="<?= e($google_map_embed ?? 'https://maps.google.com/maps?q=%EC%A0%84%EB%B6%81%20%EC%9D%B5%EC%82%B0%EC%8B%9C%20%EC%84%A0%ED%99%94%EB%A1%9C73%EA%B8%B8%2025&t=&z=17&ie=UTF8&iwloc=&output=embed') ?>"
                    class="absolute inset-0 w-full h-full border-0"
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

    <!-- Callout Box -->
    <div class="bg-surface-container-low border-l-4 border-primary rounded-2xl p-6 text-center shadow-soft">
        <p class="text-sm sm:text-base font-semibold text-primary-container leading-relaxed">
            <i class="fas fa-heart text-primary mr-1"></i>
            푸른나무교회는 언제나 당신을 따뜻하게 환영합니다. 조심히 찾아오세요!
        </p>
    </div>

</div>

<script>
function copyAddress(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('교회 주소가 복사되었습니다: ' + text);
    }).catch(() => {
        prompt('교회 주소를 복사하세요:', text);
    });
}
</script>
