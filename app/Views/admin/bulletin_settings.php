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

    <form action="/admin/bulletin-settings" method="POST" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

        <!-- ============================================================= -->
        <!-- [TAB 1]: 1면 표지 (Cover) 기획 -->
        <!-- ============================================================= -->
        <div id="tab-page1" class="bulletin-tab-panel space-y-6">
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2 border-b border-gray-100 pb-3">
                    <i class="fas fa-quote-left"></i> 1면 표지: 금주의 암송 말씀 및 표지 문구
                </h3>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">금주의 암송 구절 본문</label>
                    <textarea name="verse_text" rows="3" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary"><?= e($bulletin['memory_verse']['verse'] ?? '') ?></textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">성경 출처</label>
                        <input type="text" name="verse_ref" value="<?= e($bulletin['memory_verse']['reference'] ?? '') ?>" placeholder="예: 마태복음 11장 28절" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">인쇄 테마 선택</label>
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
        <!-- [TAB 2]: 2면 주일예배 순서 & 주일 말씀 기획 -->
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
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">말씀 요약 및 본문 내용</label>
                    <textarea name="sermon_content" rows="3" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($bulletin['sermon']['content'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- 예배 순서표 (교회 표준 12순서 양식) -->
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-100 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                            <i class="fas fa-church"></i> 2면 하단: 주일예배 순서표 (순서명 · 가운데 내용 · 인도/담당자)
                        </h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">가운데 내용(찬송 제목, 교독문, 성경본문 등)을 입력하시면 주보에 점선 또는 내용으로 깔끔하게 정렬됩니다.</p>
                    </div>
                    <button type="button" onclick="loadDefault12Steps()" class="px-3.5 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 self-start sm:self-auto shadow-2xs">
                        <i class="fas fa-rotate-left text-[10px]"></i> 교회 기본 12순서로 채우기
                    </button>
                </div>

                <!-- Column Titles -->
                <div class="hidden sm:grid grid-cols-12 gap-3 px-3 text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                    <div class="col-span-1 text-center">번호</div>
                    <div class="col-span-3">순서명 (좌측)</div>
                    <div class="col-span-5">가운데 내용 (찬송/교독문/본문/설교제목 등)</div>
                    <div class="col-span-3">담당자 / 인도 (우측)</div>
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
        </div>

        <!-- ============================================================= -->
        <!-- [TAB 3]: 3면 설교 메모 & 섬김이 -->
        <!-- ============================================================= -->
        <div id="tab-page3" class="bulletin-tab-panel hidden space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- 설교 메모 설정 -->
                <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2 border-b border-gray-100 pb-3">
                        <i class="fas fa-pencil-alt"></i> 3면 상단: 설교 메모 줄칸
                    </h3>
                    <p class="text-xs text-gray-500">성도들이 주일 설교를 들으며 기록할 수 있는 필기용 줄칸 수입니다.</p>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">메모 줄 수</label>
                        <input type="number" name="notes_line_count" min="4" max="12" value="<?= e($bulletin['page3_info']['notes_line_count'] ?? 7) ?>" class="w-32 px-4 py-2 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold">
                    </div>
                </div>

                <!-- 섬김이 팀 -->
                <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-3">
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2 border-b border-gray-100 pb-3">
                        <i class="fas fa-hands-holding-child"></i> 3면 하단: 이번 주 섬김이 담당자
                    </h3>
                    <div class="space-y-2">
                        <?php foreach ($bulletin['serving_teams'] as $role => $person): ?>
                        <div class="flex items-center gap-3">
                            <span class="w-24 text-xs font-bold text-gray-600 shrink-0"><?= e($role) ?></span>
                            <input type="text" name="teams[<?= e($role) ?>]" value="<?= e($person) ?>" class="flex-1 px-3 py-1.5 rounded-xl border border-gray-200 text-xs font-semibold bg-gray-50 focus:bg-white">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- [TAB 4]: 4면 교회소개 & 정기예배 시간표 & 온라인 헌금 -->
        <!-- ============================================================= -->
        <div id="tab-page4" class="bulletin-tab-panel hidden space-y-6">
            <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-4">
                <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2 border-b border-gray-100 pb-3">
                    <i class="fas fa-info-circle"></i> 4면: 교회 비전 & 정기 모임 시간표
                </h3>
                
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">푸른나무 비전 문구</label>
                    <textarea name="page4_vision" rows="3" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary"><?= e($bulletin['page4_info']['vision'] ?? '') ?></textarea>
                </div>

                <!-- 정기 모임 시간표 -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2">정기 예배 및 모임 시간표 (4개)</label>
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
</script>
