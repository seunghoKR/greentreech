<?php
/**
 * 메인 히어로 섹션 / 배너 관리자 뷰
 */
?>
<div class="space-y-6 max-w-5xl">
    
    <!-- Top Header -->
    <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-7 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">랜딩페이지 상단 관리</span>
                <span class="text-xs font-semibold text-gray-500">현재 모드: <strong><?= ($settings['hero_mode'] ?? 'text') === 'image' ? '🖼️ 이미지 배너 모드' : '📝 텍스트 타이포그래피 모드' ?></strong></span>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mt-1">랜딩페이지 메인 배너 및 상단 섹션 관리</h1>
            <p class="text-xs text-gray-500 mt-0.5">홈페이지 첫 화면 상단에 노출되는 헤드라인 텍스트 및 링크 버튼, 또는 그래픽 이미지 배너를 자유롭게 설정합니다.</p>
        </div>

        <a href="/" target="_blank" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all shadow-2xs flex items-center gap-1.5 shrink-0">
            <i class="fas fa-external-link-alt text-gray-500"></i>
            <span>메인 화면 미리보기</span>
        </a>
    </div>

    <!-- Main Settings Form -->
    <form action="/admin/hero" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <!-- 1. Display Mode Selection Tabs -->
        <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-7 shadow-sm">
            <h2 class="text-sm font-bold text-gray-900 mb-2 flex items-center gap-2">
                <i class="fas fa-layer-group text-primary"></i>
                <span>상단 섹션 표시 방식 선택</span>
            </h2>
            <p class="text-xs text-gray-500 mb-5">텍스트 기반의 감성적인 타이포그래피 모드 또는 행사/교회 소식을 담은 통 이미지 배너 모드를 선택할 수 있습니다.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Text Mode Radio Card -->
                <label class="relative flex items-start p-4 rounded-2xl border-2 cursor-pointer transition-all hover:bg-green-50/30 <?= ($settings['hero_mode'] ?? 'text') === 'text' ? 'border-[#154212] bg-green-50/40 ring-2 ring-[#154212]/10' : 'border-gray-200 bg-white' ?>">
                    <input type="radio" name="hero_mode" value="text" <?= ($settings['hero_mode'] ?? 'text') === 'text' ? 'checked' : '' ?> onchange="toggleHeroMode('text')" class="mt-1 text-primary focus:ring-primary">
                    <div class="ml-3">
                        <span class="block text-sm font-bold text-gray-900">📝 텍스트 타이포그래피 모드 (기본)</span>
                        <span class="block text-xs text-gray-500 mt-1 leading-relaxed">
                            따뜻한 슬로건 뱃지, 메인 헤드라인 텍스트, 설명 문구 및 맞춤형 링크 버튼(새가족, 오시는 길 등)을 노출합니다.
                        </span>
                    </div>
                </label>

                <!-- Image Banner Mode Radio Card -->
                <label class="relative flex items-start p-4 rounded-2xl border-2 cursor-pointer transition-all hover:bg-green-50/30 <?= ($settings['hero_mode'] ?? 'text') === 'image' ? 'border-[#154212] bg-green-50/40 ring-2 ring-[#154212]/10' : 'border-gray-200 bg-white' ?>">
                    <input type="radio" name="hero_mode" value="image" <?= ($settings['hero_mode'] ?? 'text') === 'image' ? 'checked' : '' ?> onchange="toggleHeroMode('image')" class="mt-1 text-primary focus:ring-primary">
                    <div class="ml-3">
                        <span class="block text-sm font-bold text-gray-900">🖼️ 이미지 배너 모드</span>
                        <span class="block text-xs text-gray-500 mt-1 leading-relaxed">
                            디자인된 대형 그래픽 배너 이미지를 메인 상단에 통으로 띄우고, 클릭 시 지정된 페이지로 이동시킵니다.
                        </span>
                    </div>
                </label>
            </div>
        </div>

        <!-- 2. Text Mode Config Panel -->
        <div id="panelTextMode" class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-7 shadow-sm space-y-5 <?= ($settings['hero_mode'] ?? 'text') === 'text' ? '' : 'hidden' ?>">
            <div class="border-b border-gray-100 pb-3">
                <h3 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-font text-primary"></i>
                    <span>텍스트 타이포그래피 및 링크 버튼 상세 설정</span>
                </h3>
            </div>

            <!-- Badge Text -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    상단 미니 뱃지 문구
                </label>
                <input type="text" name="hero_badge" value="<?= e($settings['hero_badge'] ?? '지친 일상 속, 작은 휴식과 참된 사랑') ?>" placeholder="예: 지친 일상 속, 작은 휴식과 참된 사랑" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                <p class="text-[11px] text-gray-400 mt-1">상단에 초록색 펄스 점과 함께 나타나는 작은 안내 뱃지입니다.</p>
            </div>

            <!-- Title & Highlight -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                        메인 타이틀 (앞부분) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="hero_title" value="<?= e($settings['hero_title'] ?? '당신의 지친 마음에') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                        강조 텍스트 (초록 밑줄 강조) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="hero_highlight_text" value="<?= e($settings['hero_highlight_text'] ?? '따뜻한 그늘과 쉼') ?>" required class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary text-primary font-bold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                        메인 타이틀 (뒷부분)
                    </label>
                    <input type="text" name="hero_title_suffix" value="<?= e($settings['hero_title_suffix'] ?? '을 드립니다') ?>" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                </div>
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    서브 설명 문구
                </label>
                <textarea name="hero_subtitle" rows="3" class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($settings['hero_subtitle'] ?? '푸른나무교회는 거대한 무리 속의 한 사람이 아닌, 서로의 이름을 부르며 진심으로 기도하고 함께 자라나는 믿음의 공동체입니다.') ?></textarea>
            </div>

            <!-- Action Buttons 1 & 2 -->
            <div class="border-t border-gray-100 pt-4">
                <h4 class="text-xs font-bold text-gray-800 mb-3 flex items-center gap-1.5">
                    <i class="fas fa-link text-primary"></i> 추가 링크 바로가기 버튼 (선택사항)
                </h4>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-gray-50/70 p-4 rounded-2xl border border-gray-200/80">
                    <!-- Button 1 (Primary) -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                            <span class="text-xs font-bold text-gray-800">버튼 1 (주요 행동 버튼)</span>
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">버튼 문구</label>
                            <input type="text" name="hero_btn1_text" value="<?= e($settings['hero_btn1_text'] ?? '') ?>" placeholder="예: 새가족 등록 안내" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary bg-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">이동 링크 URL</label>
                            <input type="text" name="hero_btn1_url" value="<?= e($settings['hero_btn1_url'] ?? '') ?>" placeholder="예: /about 또는 /inquiry" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary bg-white">
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="hero_btn1_target" value="_blank" id="btn1_target" <?= ($settings['hero_btn1_target'] ?? '_self') === '_blank' ? 'checked' : '' ?> class="rounded text-primary focus:ring-primary">
                            <label for="btn1_target" class="text-xs text-gray-600">새 탭/창에서 열기</label>
                        </div>
                    </div>

                    <!-- Button 2 (Secondary) -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-gray-400"></span>
                            <span class="text-xs font-bold text-gray-800">버튼 2 (보조 버튼)</span>
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">버튼 문구</label>
                            <input type="text" name="hero_btn2_text" value="<?= e($settings['hero_btn2_text'] ?? '') ?>" placeholder="예: 오시는 길 (3대 내비)" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary bg-white">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">이동 링크 URL</label>
                            <input type="text" name="hero_btn2_url" value="<?= e($settings['hero_btn2_url'] ?? '') ?>" placeholder="예: /location" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary bg-white">
                        </div>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="hero_btn2_target" value="_blank" id="btn2_target" <?= ($settings['hero_btn2_target'] ?? '_self') === '_blank' ? 'checked' : '' ?> class="rounded text-primary focus:ring-primary">
                            <label for="btn2_target" class="text-xs text-gray-600">새 탭/창에서 열기</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. Image Banner Mode Config Panel -->
        <div id="panelImageMode" class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-7 shadow-sm space-y-5 <?= ($settings['hero_mode'] ?? 'text') === 'image' ? '' : 'hidden' ?>">
            <div class="border-b border-gray-100 pb-3">
                <h3 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-image text-primary"></i>
                    <span>이미지 배너 및 클릭 링크 설정</span>
                </h3>
            </div>

            <!-- Desktop Banner Image -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    데스크탑/PC 배너 이미지 (권장 비율: 1920x600 또는 1200x450)
                </label>
                
                <?php if (!empty($settings['hero_image_desktop'])): ?>
                <div class="mb-3 relative rounded-2xl overflow-hidden border border-gray-200 max-h-52 bg-gray-900 group">
                    <img src="<?= e($settings['hero_image_desktop']) ?>" alt="Desktop Banner" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 right-2 bg-black/70 text-white text-[10px] px-2 py-1 rounded-md">현재 적용 이미지</div>
                </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <span class="block text-[11px] text-gray-500 mb-1">① 파일 직접 업로드 (JPG, PNG, WEBP)</span>
                        <input type="file" name="hero_image_desktop_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary file:text-white hover:file:bg-primary-dark">
                    </div>
                    <div>
                        <span class="block text-[11px] text-gray-500 mb-1">② 또는 이미지 웹 URL 주소 직접 입력</span>
                        <input type="text" name="hero_image_desktop" value="<?= e($settings['hero_image_desktop'] ?? '') ?>" placeholder="https://... 또는 /public/uploads/..." class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                    </div>
                </div>
            </div>

            <!-- Mobile Banner Image (Optional) -->
            <div class="pt-3 border-t border-gray-100">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    모바일 전용 배너 이미지 (선택사항, 없을 시 PC 이미지 자동 리사이즈)
                </label>

                <?php if (!empty($settings['hero_image_mobile'])): ?>
                <div class="mb-3 relative rounded-2xl overflow-hidden border border-gray-200 max-h-40 max-w-xs bg-gray-900">
                    <img src="<?= e($settings['hero_image_mobile']) ?>" alt="Mobile Banner" class="w-full h-full object-cover">
                    <div class="absolute bottom-2 right-2 bg-black/70 text-white text-[10px] px-2 py-1 rounded-md">현재 모바일 이미지</div>
                </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <span class="block text-[11px] text-gray-500 mb-1">① 모바일 파일 직접 업로드</span>
                        <input type="file" name="hero_image_mobile_file" accept="image/*" class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-primary file:text-white hover:file:bg-primary-dark">
                    </div>
                    <div>
                        <span class="block text-[11px] text-gray-500 mb-1">② 또는 모바일 이미지 URL 직접 입력</span>
                        <input type="text" name="hero_image_mobile" value="<?= e($settings['hero_image_mobile'] ?? '') ?>" placeholder="https://... 또는 /public/uploads/..." class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                    </div>
                </div>
            </div>

            <!-- Banner Link & Alt Text -->
            <div class="pt-3 border-t border-gray-100 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                        배너 클릭 시 이동 링크 (URL)
                    </label>
                    <input type="text" name="hero_image_link" value="<?= e($settings['hero_image_link'] ?? '') ?>" placeholder="예: /sermons 또는 https://..." class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                    <div class="mt-2 flex items-center gap-2">
                        <input type="checkbox" name="hero_image_target" value="_blank" id="img_target" <?= ($settings['hero_image_target'] ?? '_self') === '_blank' ? 'checked' : '' ?> class="rounded text-primary focus:ring-primary">
                        <label for="img_target" class="text-xs text-gray-600">새 창에서 링크 열기</label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                        배너 이미지 대체 텍스트 (시각장애인/SEO용)
                    </label>
                    <input type="text" name="hero_image_alt" value="<?= e($settings['hero_image_alt'] ?? '푸른나무교회 메인 배너') ?>" placeholder="예: 푸른나무교회 부흥회 안내" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="bg-white rounded-3xl border border-gray-200 p-4 sm:p-5 shadow-sm flex items-center justify-between">
            <span class="text-xs text-gray-500 font-medium">저장 즉시 메인 화면에 실시간 적용됩니다.</span>
            <button type="submit" class="px-7 py-3 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all flex items-center gap-2">
                <i class="fas fa-save"></i>
                <span>상단 배너 설정 저장하기</span>
            </button>
        </div>

    </form>

</div>

<script>
function toggleHeroMode(mode) {
    const textPanel = document.getElementById('panelTextMode');
    const imagePanel = document.getElementById('panelImageMode');
    if (mode === 'image') {
        textPanel.classList.add('hidden');
        imagePanel.classList.remove('hidden');
    } else {
        imagePanel.classList.add('hidden');
        textPanel.classList.remove('hidden');
    }
}
</script>
