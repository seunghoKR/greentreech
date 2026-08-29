<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-10">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Welcome & Prayer Request</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">새가족 등록 및 기도/상담 요청</h1>
        <p class="text-sm text-gray-600 mt-2">마음속 고민과 기도의 제목을 남겨주시면 담임목사님께서 함께 기도하고 섬기겠습니다</p>
    </div>

    <!-- Form Container Card -->
    <div class="bg-white rounded-3xl border border-outline-variant/40 shadow-card p-6 sm:p-10">
        
        <form action="/inquiry" method="POST" class="space-y-6">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

            <!-- 1. Inquiry Type Selection (Radio / Segment) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">신청 구분</label>
                <div class="grid grid-cols-3 gap-2 sm:gap-3">
                    <?php foreach ($types as $type): ?>
                    <label class="cursor-pointer">
                        <input type="radio" name="type" value="<?= e($type) ?>" <?= ($selectedType ?? '새가족등록') === $type ? 'checked' : '' ?> class="peer sr-only">
                        <div class="p-3 text-center rounded-2xl border border-outline-variant/50 text-xs font-bold text-gray-700 peer-checked:bg-primary peer-checked:text-white peer-checked:border-primary peer-checked:shadow-sm transition-all">
                            <?= e($type) ?>
                        </div>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 2. Name -->
            <div>
                <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    성함 <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required 
                    placeholder="성함을 입력해 주세요" 
                    class="w-full px-4 py-3 rounded-2xl border border-outline-variant/50 bg-gray-50/50 text-xs sm:text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all">
            </div>

            <!-- 3. Phone Number -->
            <div>
                <label for="phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    연락처 (휴대전화) <span class="text-red-500">*</span>
                </label>
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    required 
                    placeholder="예: 010-1234-5678" 
                    class="w-full px-4 py-3 rounded-2xl border border-outline-variant/50 bg-gray-50/50 text-xs sm:text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all">
            </div>

            <!-- 4. Content / Prayer Request -->
            <div>
                <label for="content" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    남기실 말씀 / 기도 제목 <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="5" 
                    required 
                    placeholder="나누고 싶으신 이야기나 기도가 필요한 부분을 편안하게 적어주세요. (비공개로 안전하게 보호됩니다)" 
                    class="w-full px-4 py-3 rounded-2xl border border-outline-variant/50 bg-gray-50/50 text-xs sm:text-sm focus:ring-2 focus:ring-primary focus:bg-white transition-all resize-none"></textarea>
            </div>

            <!-- 5. Captcha Verification (Spam Protection) -->
            <div class="bg-surface-container-low p-5 rounded-2xl border border-outline-variant/40 space-y-3">
                <label class="block text-xs font-bold text-primary uppercase tracking-wider">
                    <i class="fas fa-shield-alt mr-1"></i> 자동 등록 방지 (스팸방지 계산) <span class="text-red-500">*</span>
                </label>
                <div class="flex flex-wrap items-center gap-3">
                    <div id="captchaContainer" class="flex-shrink-0">
                        <?= $captchaSvg ?>
                    </div>
                    <button type="button" onclick="refreshCaptcha()" class="p-2.5 rounded-xl border border-outline-variant/50 bg-white hover:bg-gray-50 text-gray-600 text-xs font-semibold flex items-center gap-1 transition-colors" title="새 문제 받기">
                        <i class="fas fa-sync-alt" id="refreshIcon"></i> 새로고침
                    </button>
                    <div class="flex-grow min-w-[140px]">
                        <input 
                            type="number" 
                            name="captcha" 
                            required 
                            placeholder="계산 결과 숫자 입력" 
                            class="w-full px-4 py-2.5 rounded-xl border border-outline-variant/50 bg-white text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    </div>
                </div>
                <p class="text-[11px] text-gray-500">위 이미지의 간단한 연산 결과를 숫자로 입력해 주세요.</p>
            </div>

            <!-- 6. Privacy & Options -->
            <div class="flex items-center justify-between text-xs text-gray-600 pt-2">
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input type="checkbox" name="is_private" value="1" checked class="rounded text-primary focus:ring-primary">
                    <span>목회자에게만 비공개로 전달</span>
                </label>
                <span class="text-[11px] text-gray-400">개인정보는 상담 목적으로만 활용됩니다</span>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-primary hover:bg-primary-container text-white rounded-full font-bold text-sm shadow-md hover:shadow-lg transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                    <i class="fas fa-paper-plane text-secondary-container"></i>
                    <span>소중한 마음 전송하기</span>
                </button>
            </div>

        </form>

    </div>

    <!-- Inquiry Success Blessing Modal -->
    <?php if (!empty($flashSuccess)): ?>
    <div id="inquirySuccessModal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl border border-gray-100 text-center space-y-5 animate-scaleUp">
            <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto text-2xl shadow-inner ring-4 ring-emerald-100">
                <i class="fas fa-heart"></i>
            </div>
            <div class="space-y-2">
                <span class="text-xs font-bold text-primary uppercase tracking-wider">Prayer & Welcome</span>
                <h3 class="font-serif-kr text-2xl font-bold text-gray-900">소중한 마음이 잘 접수되었습니다</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pt-1">
                    <?= e($flashSuccess) ?><br>
                    담임목사님께서 성도님의 기도제목을 품고 함께 간절히 기도하겠습니다. 🌿
                </p>
            </div>

            <div class="bg-green-50/70 p-4 rounded-2xl border border-green-100 text-xs text-green-800 font-serif-kr italic">
                "아무 것도 염려하지 말고 다만 모든 일에 기도와 간구로, 너희 구할 것을 감사함으로 하나님께 아뢰라" (빌립보서 4:6)
            </div>

            <div class="pt-2">
                <button type="button" onclick="document.getElementById('inquirySuccessModal').remove()" class="w-full py-3.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                    확인 (홈으로 이동)
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<script>
function refreshCaptcha() {
    const icon = document.getElementById('refreshIcon');
    icon.classList.add('fa-spin');
    fetch('/api/captcha/refresh')
        .then(res => res.json())
        .then(data => {
            if (data.success && data.svg) {
                document.getElementById('captchaContainer').innerHTML = data.svg;
            }
        })
        .catch(err => console.error('Captcha refresh failed', err))
        .finally(() => {
            icon.classList.remove('fa-spin');
        });
}
</script>
