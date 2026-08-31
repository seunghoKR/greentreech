<div class="space-y-6 max-w-5xl">
    
    <!-- Top Header Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">A4 2단 접지 (A5 4면)</span>
                <span class="text-xs text-gray-500 font-semibold"><?= e($bulletin['bulletin_no']) ?></span>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mt-1">주일예배 순서 및 A5 4면 주보 기획 대시보드</h2>
            <p class="text-xs text-gray-500 mt-0.5">A4 1장을 반으로 접어 사용하는 4면 주보의 각 면(표지, 예배순서, 설교메모/소식, 교회소개/모임)을 편리하게 기획합니다.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="/admin/worship-servants" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5 shadow-2xs whitespace-nowrap">
                <i class="fas fa-hands-holding-child text-emerald-700"></i> <span>섬김이 4주 관리</span>
            </a>
            <a href="/bulletin" target="_blank" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-eye"></i> <span>온라인 주보</span>
            </a>
            <a href="/bulletin/print" target="_blank" class="px-3 sm:px-4 py-2 sm:py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 whitespace-nowrap">
                <i class="fas fa-print"></i> <span>A4 접지 인쇄/PDF</span>
            </a>
        </div>
    </div>

    <!-- 4-Page Navigation Tabs -->
    <div class="flex items-center gap-2 border-b border-gray-200 pb-2 overflow-x-auto">
        <button type="button" onclick="switchBulletinTab('tab-page1')" id="btn-tab-page1" class="px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-2xl text-xs font-bold transition-all bg-[#154212] text-white shadow-sm flex items-center gap-1.5 shrink-0 whitespace-nowrap">
            <span>[1면] 표지 (Cover)</span>
        </button>
        <button type="button" onclick="switchBulletinTab('tab-page2')" id="btn-tab-page2" class="px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-2xl text-xs font-bold transition-all text-gray-600 hover:text-primary bg-white border border-gray-200 flex items-center gap-1.5 shrink-0 whitespace-nowrap">
            <span>[2면] 주일예배 & 말씀</span>
        </button>
        <button type="button" onclick="switchBulletinTab('tab-page3')" id="btn-tab-page3" class="px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-2xl text-xs font-bold transition-all text-gray-600 hover:text-primary bg-white border border-gray-200 flex items-center gap-1.5 shrink-0 whitespace-nowrap">
            <span>[3면] 설교메모 & 섬김이</span>
        </button>
        <button type="button" onclick="switchBulletinTab('tab-page4')" id="btn-tab-page4" class="px-3.5 sm:px-4 py-2 sm:py-2.5 rounded-2xl text-xs font-bold transition-all text-gray-600 hover:text-primary bg-white border border-gray-200 flex items-center gap-1.5 shrink-0 whitespace-nowrap">
            <span>[4면] 교회소개 & 모임안내</span>
        </button>
    </div>

    <form action="/admin/bulletin-settings" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <!-- ============================================================= -->
        <!-- [TAB 1]: 1면 표지 (Cover) 기획 & 이미지 커스텀 -->
        <!-- ============================================================= -->
        <div id="tab-page1" class="bulletin-tab-panel space-y-6">
            
            <!-- 1. 표지 메인 이미지 / 일러스트 설정 -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-5">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-image"></i> 1면 표지: 현재 인쇄될 메인 이미지
                    </h3>
                    <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                        A4 접지 표지 중앙에 고해상도로 인쇄
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                    <!-- Left: Current Preview Thumbnail -->
                    <div class="md:col-span-4 bg-gray-50 p-4 rounded-2xl border border-gray-200 text-center space-y-2.5">
                        <span class="text-[11px] font-bold text-gray-500 uppercase tracking-wider block">현재 선택된 표지 이미지</span>
                        <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden bg-white border border-gray-200 shadow-inner flex items-center justify-center">
                            <img id="coverPreviewImg" src="<?= e($bulletin['cover_image'] ?? '/public/assets/images/sample2.jpg') ?>" onerror="this.src='/public/assets/images/logo.png'" alt="표지 미리보기" class="w-full h-full object-cover">
                        </div>
                        <p class="text-[10px] text-gray-400">권장 비율: 4:3 또는 16:9 (가로형)</p>
                    </div>

                    <!-- Right: Upload and Preset Selection -->
                    <div class="md:col-span-8 space-y-4">
                        <!-- Direct File Upload -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                <i class="fas fa-cloud-arrow-up text-primary mr-1"></i> 새 이미지 파일 직접 업로드 (컴퓨터/스마트폰 사진)
                            </label>
                            <input 
                                type="file" 
                                name="cover_image_file" 
                                accept="image/*" 
                                onchange="previewCoverFile(this)"
                                class="w-full px-3.5 py-2 rounded-2xl border border-gray-200 text-xs bg-white focus:ring-2 focus:ring-primary file:mr-3 file:py-1.5 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-[#154212] hover:file:bg-emerald-100">
                        </div>

                        <!-- Image URL input -->
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">현재 이미지 파일 경로 / URL</label>
                            <input 
                                type="text" 
                                id="inputCoverImageUrl" 
                                name="cover_image_url" 
                                value="<?= e($bulletin['cover_image'] ?? '/public/assets/images/sample2.jpg') ?>" 
                                oninput="document.getElementById('coverPreviewImg').src = this.value"
                                placeholder="/public/assets/images/sample2.jpg 또는 웹 URL" 
                                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-mono focus:ring-2 focus:ring-primary">
                        </div>

                        <!-- Quick Presets -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="block text-[11px] font-bold text-gray-600 uppercase tracking-wider">
                                    ⚡ 5대 프리셋에서 원클릭 표지 선택
                                </label>
                                <span class="text-[10px] text-gray-400">아래 프리셋 보관함에서 등록/수정</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                                <?php foreach (($bulletin['cover_presets'] ?? []) as $pIdx => $preset): ?>
                                <button type="button" 
                                    onclick="applyPresetToCover(<?= $pIdx ?>)" 
                                    class="px-3 py-2 bg-gray-50 hover:bg-emerald-50 hover:border-emerald-300 border border-gray-200 rounded-xl text-xs font-semibold text-gray-700 hover:text-emerald-900 flex items-center gap-2 transition-all text-left shadow-2xs group">
                                    <span class="w-6 h-6 rounded-lg bg-white border border-gray-200 overflow-hidden flex items-center justify-center shrink-0 shadow-2xs">
                                        <?php if (!empty($preset['image'])): ?>
                                        <img id="quickPresetThumb_<?= $pIdx ?>" src="<?= e($preset['image']) ?>" onerror="this.src='/public/assets/images/logo.png'" class="w-full h-full object-cover">
                                        <?php else: ?>
                                        <i class="fas fa-image text-gray-300 text-[10px]" id="quickPresetIcon_<?= $pIdx ?>"></i>
                                        <?php endif; ?>
                                    </span>
                                    <span class="truncate flex-1 font-bold text-[11px]" id="quickPresetLabel_<?= $pIdx ?>"><?= e($preset['name'] ?: ('프리셋 ' . ($pIdx + 1))) ?></span>
                                    <i class="fas fa-check text-[10px] text-emerald-600 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                </button>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- 2. 표지 이미지 5대 프리셋 보관함 (이름 & 이미지 자유 관리) -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                            <i class="fas fa-bookmark text-primary"></i> 표지 이미지 5대 프리셋 보관함 (이름 & 이미지 등록)
                        </h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">
                            자주 쓰는 5가지 표지 이미지(십자가, 절기, 교회전경, 캘리 등)를 이름과 함께 보관해 두고 원클릭으로 꺼내 쓰실 수 있습니다.
                        </p>
                    </div>
                    <span class="text-[11px] font-bold text-emerald-800 bg-emerald-100/70 px-2.5 py-1 rounded-full">
                        총 5개 슬롯 지원
                    </span>
                </div>

                <div class="space-y-3.5">
                    <?php foreach (($bulletin['cover_presets'] ?? []) as $i => $preset): ?>
                    <div class="bg-gray-50/80 p-3.5 rounded-2xl border border-gray-200 hover:border-gray-300 transition-all space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-200/60 pb-2">
                            <div class="flex items-center gap-2">
                                <span class="w-6 h-6 rounded-full bg-[#154212] text-white flex items-center justify-center text-xs font-bold shadow-2xs shrink-0">
                                    <?= $i + 1 ?>
                                </span>
                                <input 
                                    type="text" 
                                    name="presets[<?= $i ?>][name]" 
                                    id="presetName_<?= $i ?>"
                                    value="<?= e($preset['name'] ?: ('프리셋 ' . ($i + 1))) ?>" 
                                    oninput="document.getElementById('quickPresetLabel_<?= $i ?>').innerText = this.value || '프리셋 <?= $i + 1 ?>'"
                                    placeholder="프리셋 이름 (예: 평상시 십자가, 부활절, 교회전경)" 
                                    class="px-3 py-1.5 rounded-xl border border-gray-300 text-xs font-bold text-gray-800 bg-white focus:ring-2 focus:ring-primary w-52 sm:w-64">
                            </div>
                            <div class="flex items-center gap-1.5 self-end sm:self-auto">
                                <button type="button" onclick="applyPresetToCover(<?= $i ?>)" class="px-2.5 py-1 bg-emerald-100 hover:bg-emerald-200 text-emerald-900 rounded-lg text-[11px] font-bold flex items-center gap-1 transition-all">
                                    <i class="fas fa-check"></i> <span>표지로 즉시 적용</span>
                                </button>
                                <button type="button" onclick="clearPresetSlot(<?= $i ?>)" class="px-2 py-1 bg-gray-200 hover:bg-red-100 hover:text-red-700 text-gray-600 rounded-lg text-[11px] font-bold transition-all" title="이 슬롯 비우기">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 gap-3 items-center">
                            <!-- Mini thumbnail -->
                            <div class="col-span-3 sm:col-span-2">
                                <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden bg-white border border-gray-200 shadow-inner flex items-center justify-center">
                                    <img 
                                        id="presetThumb_<?= $i ?>" 
                                        src="<?= e($preset['image'] ?: '/public/assets/images/logo.png') ?>" 
                                        onerror="this.src='/public/assets/images/logo.png'" 
                                        alt="프리셋 <?= $i + 1 ?>" 
                                        class="w-full h-full object-cover <?= empty($preset['image']) ? 'opacity-30' : '' ?>">
                                </div>
                            </div>

                            <!-- Input fields -->
                            <div class="col-span-9 sm:col-span-10 grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-0.5">📁 새 파일 업로드</label>
                                    <input 
                                        type="file" 
                                        name="preset_file_<?= $i ?>" 
                                        accept="image/*" 
                                        onchange="previewPresetSlotFile(this, <?= $i ?>)"
                                        class="w-full px-2.5 py-1.5 rounded-xl border border-gray-200 text-xs bg-white focus:ring-2 focus:ring-primary file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-[10px] file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-500 mb-0.5">🔗 이미지 경로 / URL</label>
                                    <input 
                                        type="text" 
                                        name="presets[<?= $i ?>][image]" 
                                        id="presetImage_<?= $i ?>"
                                        value="<?= e($preset['image']) ?>" 
                                        oninput="updatePresetSlotPreview(<?= $i ?>)"
                                        placeholder="/public/assets/images/... 또는 웹 URL" 
                                        class="w-full px-3 py-1.5 rounded-xl border border-gray-300 text-xs font-mono bg-white focus:ring-2 focus:ring-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 3. 표지 디자인 스타일 & 액자 테두리 & 표지 문구 -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2 border-b border-gray-100 pb-3">
                    <i class="fas fa-palette"></i> 1면 표지: 디자인 레이아웃 및 문구 설정
                </h3>

                    </div>
                </div>

                <!-- Cover Styling Options -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">표지 중앙 메인 문구</label>
                        <input type="text" name="cover_text" value="<?= e($bulletin['cover_text'] ?? '지친 마음에 쉼과 회복을 주는 따뜻한 공동체') ?>" placeholder="예: 지친 마음에 쉼과 회복을 주는 따뜻한 공동체" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-serif-kr font-bold focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">표지 서브 환영 문구</label>
                        <input type="text" name="cover_subtext" value="<?= e($bulletin['cover_subtext'] ?? '주 예수의 은혜와 평강이 성도 여러분의 가정과 일터에 넘치기를 소망합니다.') ?>" placeholder="예: 주 예수의 은혜와 평강이 성도 여러분의 가정과 일터에 넘치기를 소망합니다." class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    </div>
                </div>
            </div>

            <!-- 2. 금주의 암송 말씀 & 인쇄 테마 -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2 border-b border-gray-100 pb-3">
                    <i class="fas fa-quote-left"></i> 1면 표지: 금주의 암송 말씀 및 인쇄 테마
                </h3>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">금주의 암송 구절 본문</label>
                    <textarea name="verse_text" rows="2" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary font-serif-kr"><?= e($bulletin['memory_verse']['verse'] ?? '') ?></textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">성경 출처</label>
                        <input type="text" name="verse_ref" value="<?= e($bulletin['memory_verse']['reference'] ?? '') ?>" placeholder="예: 마태복음 11장 28절" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">전체 인쇄 테마 선택</label>
                        <select name="template_theme" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary bg-white font-bold">
                            <option value="classic" <?= ($bulletin['template_theme'] ?? 'classic') === 'classic' ? 'selected' : '' ?>>🌿 푸른나무 클래식 (기본)</option>
                            <option value="modern" <?= ($bulletin['template_theme'] ?? '') === 'modern' ? 'selected' : '' ?>>💎 모던 에메랄드</option>
                            <option value="simple" <?= ($bulletin['template_theme'] ?? '') === 'simple' ? 'selected' : '' ?>>⬛ 흑백 인쇄 절약모드</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- [TAB 2]: 2면 주일예배 순서 & 섬김이 안내 (예배순서 + 섬김이) -->
        <!-- ============================================================= -->
        <div id="tab-page2" class="bulletin-tab-panel hidden space-y-6">
            <!-- 설교 기획 -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-book-bible"></i> 2면 상단: 금주 주일 말씀 기획
                    </h3>
                    <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200 flex items-center gap-1">
                        <i class="fas fa-magic"></i> 하단 7·8번 순서표에 실시간 자동 연동
                    </span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 mb-1">설교 제목 <span class="text-red-500">*</span></label>
                        <input 
                            type="text" 
                            id="inputSermonTitle" 
                            name="sermon_title" 
                            value="<?= e($bulletin['sermon']['title'] ?? '') ?>" 
                            oninput="syncSermonToOrder()" 
                            required 
                            placeholder="예: 마음이 민첩하여" 
                            class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">설교자 (목회자)</label>
                        <input 
                            type="text" 
                            id="inputSermonPreacher" 
                            name="sermon_preacher" 
                            value="<?= e($bulletin['sermon']['preacher'] ?? '심민보 목사') ?>" 
                            oninput="syncSermonToOrder()" 
                            required 
                            class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold focus:ring-2 focus:ring-primary">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">성경 본문</label>
                    <input 
                        type="text" 
                        id="inputSermonScripture" 
                        name="sermon_scripture" 
                        value="<?= e($bulletin['sermon']['scripture'] ?? '') ?>" 
                        oninput="syncSermonToOrder()" 
                        placeholder="예: 다니엘 6장 1-5절" 
                        class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold focus:ring-2 focus:ring-primary">
                </div>
            </div>

            <!-- 예배 순서표 (교회 표준 12순서 양식) -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-100 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                            <i class="fas fa-church"></i> 2면 중간: 주일예배 12대 순서표 (순서명 · 가운데 내용 · 인도/담당자)
                        </h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">가운데 내용(찬송 제목, 교독문, 성경본문 등)을 입력하시면 주보에 점선 또는 내용으로 깔끔하게 정렬됩니다.</p>
                    </div>
                    <button type="button" onclick="loadDefault12Steps()" class="px-3.5 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 self-start sm:self-auto shadow-2xs">
                        <i class="fas fa-rotate-left text-[10px]"></i> 교회 기본 12순서로 채우기
                    </button>
                </div>

                <div id="worshipOrderContainer" class="space-y-2.5">
                    <?php foreach ($bulletin['worship_order'] as $idx => $item): ?>
                    <div class="grid grid-cols-12 gap-2 sm:gap-3 items-center bg-gray-50/80 p-2.5 sm:p-3 rounded-2xl border border-gray-100 hover:border-gray-300 transition-colors">
                        <div class="col-span-1 text-center font-bold text-xs text-gray-400">
                            <?= $idx + 1 ?>
                            <input type="hidden" name="order[<?= $idx ?>][order]" value="<?= e($item['order'] ?? ($idx + 1)) ?>">
                        </div>
                        <div class="col-span-4 sm:col-span-3">
                            <input type="text" name="order[<?= $idx ?>][name]" value="<?= e($item['name'] ?? '') ?>" required placeholder="예: 묵 상 기 도" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs font-bold bg-white focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="col-span-4 sm:col-span-5">
                            <input type="text" name="order[<?= $idx ?>][content]" value="<?= e($item['content'] ?? $item['desc'] ?? '') ?>" placeholder="예: < 36 시편 90편 / 주기도문 > (비어있으면 점선)" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs text-gray-700 bg-white focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="col-span-3 sm:col-span-3">
                            <input type="text" name="order[<?= $idx ?>][lead]" value="<?= e($item['lead'] ?? '') ?>" placeholder="예: 다 같 이 / 설교자" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs text-primary font-bold bg-white focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- 2면 하단: 예배 섬김이 안내 (이번 주 & 다음 주 예고 연동) -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-hands-holding-child"></i> 2면 하단: 이번 주 및 다음 주 예배 섬김이 연동
                    </h3>
                    <a href="/admin/worship-servants" class="text-xs text-emerald-800 font-bold hover:underline flex items-center gap-1">
                        <i class="fas fa-calendar-check"></i> 4주 섬김이 스케줄 관리 →
                    </a>
                </div>
                
                <p class="text-xs text-gray-500">
                    2면 순서표 하단에는 <strong>[예배 섬김이 4주 관리]</strong>에서 등록한 이번 주(대표기도, 헌금안내, 초청안내) 및 다음 주 섬김이 예고가 <strong>주보에 자동 인쇄</strong>됩니다.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div class="bg-gray-50 p-3 rounded-2xl border border-gray-200 text-center">
                        <span class="text-[11px] text-gray-500 block mb-0.5">이번 주 대표기도</span>
                        <span class="text-xs font-bold text-gray-900"><?= e($bulletin['current_week_servants']['servants']['prayer'] ?? '담당자') ?></span>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-2xl border border-gray-200 text-center">
                        <span class="text-[11px] text-gray-500 block mb-0.5">이번 주 헌금안내</span>
                        <span class="text-xs font-bold text-gray-900"><?= e($bulletin['current_week_servants']['servants']['offering'] ?? '봉사팀') ?></span>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-2xl border border-gray-200 text-center">
                        <span class="text-[11px] text-gray-500 block mb-0.5">이번 주 초청/안내</span>
                        <span class="text-xs font-bold text-gray-900"><?= e($bulletin['current_week_servants']['servants']['usher'] ?? '안내위원') ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- [TAB 3]: 3면 설교 메모 (Sermon Notes) -->
        <!-- ============================================================= -->
        <div id="tab-page3" class="bulletin-tab-panel hidden space-y-6">
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-pencil-alt"></i> 3면: 성도용 설교 메모 (Sermon Notes) 줄칸 설정
                    </h3>
                    <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200 font-bold">
                        3면 전체에 넉넉한 필기 노트로 인쇄
                    </span>
                </div>
                
                <p class="text-xs text-gray-500 leading-relaxed">
                    A4 2단 접지 3면에는 <strong>금주의 설교 정보 카드</strong>와 함께 성도님들이 예배 중 말씀을 기록할 수 있는 <strong>필기용 줄칸(Note Lines)</strong>이 넉넉하게 인쇄됩니다.
                </p>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">인쇄할 메모 줄 수 (기본 11줄 권장)</label>
                    <div class="flex items-center gap-3">
                        <input type="number" name="notes_line_count" min="6" max="14" value="<?= e($bulletin['page3_info']['notes_line_count'] ?? 11) ?>" class="w-32 px-4 py-2 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold focus:ring-2 focus:ring-primary">
                        <span class="text-xs text-gray-500">줄 (6~14줄 사이 조절 가능)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- [TAB 4]: 4면 교회소개 & 정기모임 & 알리는 말씀(소식) -->
        <!-- ============================================================= -->
        <div id="tab-page4" class="bulletin-tab-panel hidden space-y-6">
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-5">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-info-circle"></i> 4면: 교회 비전 & 정기 모임 시간표 & 알리는 말씀
                    </h3>
                </div>
                
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">푸른나무 비전 문구</label>
                    <textarea name="page4_vision" rows="3" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary"><?= e($bulletin['page4_info']['vision'] ?? '') ?></textarea>
                </div>

                <!-- 4면 하단: 알리는 말씀(교회 소식) 자동 연동 안내 -->
                <div class="bg-emerald-50/70 p-4 rounded-2xl border border-emerald-200 space-y-2 text-xs">
                    <div class="flex items-center justify-between">
                        <h4 class="font-bold text-emerald-950 flex items-center gap-1.5">
                            <i class="fas fa-bullhorn text-emerald-700"></i> 4면 하단: 알리는 말씀 (교회 소식) 자동 연동
                        </h4>
                        <a href="/admin/notices" class="px-2.5 py-1 bg-emerald-700 hover:bg-emerald-800 text-white rounded-xl text-[11px] font-bold transition-all shadow-xs flex items-center gap-1">
                            <i class="fas fa-pen-to-square"></i> 알리는 소식 관리 →
                        </a>
                    </div>
                    <p class="text-emerald-800 text-[11px]">
                        <strong>[알리는 소식 관리]</strong>에서 게시일이 이번 주 일요일(주일)로 등록된 최신 소식 내용이 4면 하단에 <strong>넘버링 카드(1., 2., 3...)로 자동 조판</strong>되어 인쇄됩니다.
                    </p>
                </div>

                <!-- 정기 모임 시간표 -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2">정기 예배 및 모임 시간표</label>
                    <div class="space-y-2.5">
                        <?php foreach (($bulletin['page4_info']['schedules'] ?? []) as $sIdx => $sch): ?>
                        <div class="grid grid-cols-12 gap-2 bg-gray-50 p-2.5 rounded-2xl border border-gray-100">
                            <div class="col-span-4">
                                <input type="text" name="schedules[<?= $sIdx ?>][name]" value="<?= e($sch['name']) ?>" placeholder="모임명" class="w-full px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-bold bg-white">
                            </div>
                            <div class="col-span-5">
                                <input type="text" name="schedules[<?= $sIdx ?>][time]" value="<?= e($sch['time']) ?>" placeholder="시간 (예: 매주 주일 오전 11:00)" class="w-full px-3 py-1.5 rounded-xl border border-gray-200 text-xs bg-white">
                            </div>
                            <div class="col-span-3">
                                <input type="text" name="schedules[<?= $sIdx ?>][place]" value="<?= e($sch['place']) ?>" placeholder="장소" class="w-full px-3 py-1.5 rounded-xl border border-gray-200 text-xs text-gray-500 bg-white">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- 온라인 헌금 계좌 -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">은행명</label>
                        <input type="text" name="giving_bank" value="<?= e($bulletin['page4_info']['giving']['bank'] ?? '농협') ?>" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">계좌번호</label>
                        <input type="text" name="giving_account" value="<?= e($bulletin['page4_info']['giving']['account'] ?? '351-9559-8623-03') ?>" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs font-bold bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">예금주</label>
                        <input type="text" name="giving_holder" value="<?= e($bulletin['page4_info']['giving']['holder'] ?? '푸른나무교회') ?>" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs bg-white">
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-between items-center bg-white p-5 rounded-3xl border border-gray-200 shadow-sm">
            <span class="text-xs text-gray-500 font-medium">저장 즉시 A4 2단 접지 인쇄 및 스마트 웹 주보에 실시간 반영됩니다.</span>
            <button type="submit" class="px-8 py-3.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all flex items-center gap-2">
                <i class="fas fa-save"></i>
                <span>4면 주보 기획 데이터 저장하기</span>
            </button>
        </div>

    </form>
</div>

<script>
function switchBulletinTab(tabId) {
    document.querySelectorAll('.bulletin-tab-panel').forEach(p => p.classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');

    ['tab-page1', 'tab-page2', 'tab-page3', 'tab-page4'].forEach(id => {
        const btn = document.getElementById('btn-' + id);
        if (id === tabId) {
            btn.className = 'px-4 py-2.5 rounded-2xl text-xs font-bold transition-all bg-[#154212] text-white shadow-sm flex items-center gap-1.5';
        } else {
            btn.className = 'px-4 py-2.5 rounded-2xl text-xs font-bold transition-all text-gray-600 hover:text-primary bg-white border border-gray-200 flex items-center gap-1.5';
        }
    });
}

function syncSermonToOrder() {
    const titleInput = document.getElementById('inputSermonTitle');
    const scriptureInput = document.getElementById('inputSermonScripture');
    const preacherInput = document.getElementById('inputSermonPreacher');

    if (!titleInput || !scriptureInput) return;

    const rawTitle = titleInput.value.trim();
    const rawScripture = scriptureInput.value.trim();
    const rawPreacher = preacherInput ? preacherInput.value.trim() : '';

    const container = document.getElementById('worshipOrderContainer');
    if (!container) return;

    const rows = container.querySelectorAll('.grid');
    rows.forEach(row => {
        const nameInput = row.querySelector('input[name*="[name]"]');
        const contentInput = row.querySelector('input[name*="[content]"]');
        const leadInput = row.querySelector('input[name*="[lead]"]');

        if (!nameInput || !contentInput) return;

        const cleanName = nameInput.value.replace(/\s+/g, '');

        // 1. 본문 행 자동 동기화
        if (cleanName === '본문' && rawScripture) {
            // 이미 괄호가 있으면 그대로, 없으면 < > 로 감싸기
            const formatted = (rawScripture.startsWith('<') && rawScripture.endsWith('>')) 
                ? rawScripture 
                : `< ${rawScripture} >`;
            contentInput.value = formatted;
        }

        // 2. 제목 행 자동 동기화
        if (cleanName === '제목') {
            if (rawTitle) {
                const formattedTitle = (rawTitle.startsWith('<') && rawTitle.endsWith('>'))
                    ? rawTitle
                    : `< “${rawTitle.replace(/^[<“"']+|[>”"']+$/g, '')}” >`;
                contentInput.value = formattedTitle;
            }
            if (leadInput && rawPreacher) {
                leadInput.value = rawPreacher;
            }
        }
    });
}

function loadDefault12Steps() {
    if (!confirm('주일예배 순서표를 푸른나무교회 기본 12순서 양식으로 채우시겠습니까?')) {
        return;
    }

    const titleInput = document.getElementById('inputSermonTitle');
    const scriptureInput = document.getElementById('inputSermonScripture');
    const preacherInput = document.getElementById('inputSermonPreacher');

    const sTitle = titleInput && titleInput.value.trim() ? `< “${titleInput.value.trim()}” >` : '< “마음이 민첩하여” >';
    const sScripture = scriptureInput && scriptureInput.value.trim() ? `< ${scriptureInput.value.trim()} >` : '< 다니엘 6장 1-5절 >';
    const sPreacher = preacherInput && preacherInput.value.trim() ? preacherInput.value.trim() : '심 민 보 목 사';

    const defaultSteps = [
        { name: '묵 상 기 도', content: '', lead: '다 같 이' },
        { name: '예 배 부 름', content: '', lead: '다 같 이' },
        { name: '경 배 찬 송', content: '채워주소서, 마음이 상한 자를', lead: '다 같 이' },
        { name: '교 독 문', content: '< 36 시편 90편 / 주기도문 >', lead: '다 같 이' },
        { name: '찬 양', content: '< 찬 93장 예수는 나의 힘이요 >', lead: '다 같 이' },
        { name: '대 표 기 도', content: '', lead: '한 영 숙 권 사' },
        { name: '본 문', content: sScripture, lead: '다 같 이' },
        { name: '제 목', content: sTitle, lead: sPreacher },
        { name: '하나님과의 만남', content: '', lead: '다 같 이' },
        { name: '찬 양', content: '< 축복합니다 >', lead: '다 같 이' },
        { name: '봉 헌 기 도', content: '', lead: '인 도 자' },
        { name: '축 도', content: '', lead: sPreacher }
    ];

    const container = document.getElementById('worshipOrderContainer');
    container.innerHTML = '';

    defaultSteps.forEach((step, idx) => {
        const row = document.createElement('div');
        row.className = 'grid grid-cols-12 gap-2 sm:gap-3 items-center bg-gray-50/80 p-2.5 sm:p-3 rounded-2xl border border-gray-100 hover:border-gray-300 transition-colors';
        row.innerHTML = `
            <div class="col-span-1 text-center font-bold text-xs text-gray-400">
                ${idx + 1}
                <input type="hidden" name="order[${idx}][order]" value="${idx + 1}">
            </div>
            <div class="col-span-4 sm:col-span-3">
                <input type="text" name="order[${idx}][name]" value="${step.name}" required placeholder="예: 묵 상 기 도" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs font-bold bg-white focus:ring-2 focus:ring-primary">
            </div>
            <div class="col-span-4 sm:col-span-5">
                <input type="text" name="order[${idx}][content]" value="${step.content}" placeholder="예: < 36 시편 90편 / 주기도문 > (비어있으면 점선)" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs text-gray-700 bg-white focus:ring-2 focus:ring-primary">
            </div>
            <div class="col-span-3 sm:col-span-3">
                <input type="text" name="order[${idx}][lead]" value="${step.lead}" placeholder="예: 다 같 이 / 설교자" class="w-full px-3 py-2 rounded-xl border border-gray-200 text-xs text-primary font-bold bg-white focus:ring-2 focus:ring-primary">
            </div>
        `;
        container.appendChild(row);
    });
}

function selectCoverPreset(url) {
    if (!url) return;
    document.getElementById('inputCoverImageUrl').value = url;
    document.getElementById('coverPreviewImg').src = url;
}

function applyPresetToCover(idx) {
    const imgInput = document.getElementById('presetImage_' + idx);
    const nameInput = document.getElementById('presetName_' + idx);
    const pName = nameInput ? nameInput.value.trim() : ('프리셋 ' + (idx + 1));
    const url = imgInput ? imgInput.value.trim() : '';

    if (!url) {
        alert('[' + pName + '] 슬롯에 등록된 이미지가 없습니다.\n먼저 파일 업로드 또는 이미지 경로를 입력해주세요~ 😊');
        return;
    }

    document.getElementById('inputCoverImageUrl').value = url;
    document.getElementById('coverPreviewImg').src = url;
}

function previewCoverFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('coverPreviewImg').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewPresetSlotFile(input, idx) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const dataUrl = e.target.result;
            const thumb = document.getElementById('presetThumb_' + idx);
            if (thumb) {
                thumb.src = dataUrl;
                thumb.classList.remove('opacity-30');
            }
            const quickThumb = document.getElementById('quickPresetThumb_' + idx);
            if (quickThumb) {
                quickThumb.src = dataUrl;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function updatePresetSlotPreview(idx) {
    const input = document.getElementById('presetImage_' + idx);
    const thumb = document.getElementById('presetThumb_' + idx);
    const quickThumb = document.getElementById('quickPresetThumb_' + idx);
    const val = input ? input.value.trim() : '';

    if (thumb) {
        if (val) {
            thumb.src = val;
            thumb.classList.remove('opacity-30');
        } else {
            thumb.src = '/public/assets/images/logo.png';
            thumb.classList.add('opacity-30');
        }
    }
    if (quickThumb && val) {
        quickThumb.src = val;
    }
}

function clearPresetSlot(idx) {
    const nameInput = document.getElementById('presetName_' + idx);
    const imgInput = document.getElementById('presetImage_' + idx);
    const thumb = document.getElementById('presetThumb_' + idx);

    if (imgInput) imgInput.value = '';
    if (thumb) {
        thumb.src = '/public/assets/images/logo.png';
        thumb.classList.add('opacity-30');
    }
}
</script>
