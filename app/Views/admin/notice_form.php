<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-4xl">
    
    <div class="border-b border-gray-100 pb-4 mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900"><?= $notice ? '알리는 소식 수정' : '새 소식 등록' ?></h2>
            <p class="text-xs text-gray-500 mt-1">교회 주요 소식과 공지사항, 주보 알리는 소식을 등록하고 첨부파일을 관리합니다.</p>
        </div>
        <a href="/admin/notices" class="text-xs text-gray-500 hover:text-gray-900 font-bold">
            ← 목록으로
        </a>
    </div>

    <!-- 💡 주보 '알리는 소식' 자동 연동 작성 가이드 박스 -->
    <div class="bg-emerald-50/70 border border-emerald-200/80 rounded-2xl p-4 mb-6 text-xs text-emerald-950">
        <div class="flex items-start gap-2.5">
            <div class="w-6 h-6 rounded-lg bg-emerald-600 text-white flex items-center justify-center shrink-0 mt-0.5 shadow-xs">
                <i class="fas fa-lightbulb text-xs"></i>
            </div>
            <div class="space-y-1.5 flex-1">
                <div class="flex items-center justify-between">
                    <h4 class="font-bold text-emerald-900 text-xs sm:text-sm">
                        📄 스마트 주보 & A4 인쇄용 주보 자동 연동 작성 규칙
                    </h4>
                    <button type="button" onclick="insertBulletinTemplate()" class="px-2.5 py-1 bg-emerald-700 hover:bg-emerald-800 text-white rounded-xl text-[11px] font-bold shadow-xs transition-all flex items-center gap-1">
                        <i class="fas fa-clipboard-list"></i>
                        <span>📋 표준 주보 양식 불러오기</span>
                    </button>
                </div>
                <p class="text-[11px] text-emerald-800 leading-relaxed">
                    가장 최근에 등록한 소식 게시물이 <strong>스마트 웹주보 및 A4 인쇄용 주보의 [알리는 소식]</strong>에 자동으로 연결됩니다.
                </p>
                <div class="bg-white/90 p-2.5 rounded-xl border border-emerald-200 text-[11px] space-y-1 text-gray-700">
                    <p class="font-bold text-emerald-900">📌 권장 작성 예시 (개요번호 + 세부내용):</p>
                    <p class="font-mono text-gray-600">
                        <strong>1. 주일예배 및 성도의 교제</strong><br>
                        • 매주 주일 오전 11:00 본당에서 드려집니다.<br>
                        • 예배 후 따뜻한 애찬 교제가 준비되어 있습니다.<br><br>
                        <strong>2. 푸른나무교회 새가족 환영</strong><br>
                        • 오늘 교회를 처음 방문해 주신 성도님들을 주님의 이름으로 축복합니다.<br><br>
                        <strong>3. 교우 소식 및 중보기도</strong><br>
                        • 환우 성도님들의 빠른 회복과 가정의 평안을 위해 기도해 주시기 바랍니다.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <form action="/admin/notices/save" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="category" value="소식">
        <?php if ($notice): ?>
        <input type="hidden" name="id" value="<?= e($notice['id']) ?>">
        <?php endif; ?>

        <!-- 1. Title & Publish Date (Calendar) -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- Title (2 Cols) -->
            <div class="sm:col-span-2">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                    소식 제목 <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    id="noticeTitle"
                    value="<?= e($notice['title'] ?? '') ?>" 
                    required 
                    placeholder="예: 2026년 8월 30일 푸른나무교회 알리는 소식" 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary font-medium">
            </div>

            <!-- Publish Date Calendar (1 Col) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5 flex items-center justify-between">
                    <span><i class="fas fa-calendar-days text-primary mr-1"></i> 게시 일자</span>
                    <span class="text-[10px] text-gray-400 font-normal">캘린더 선택</span>
                </label>
                <?php 
                    $publishDate = !empty($notice['created_at']) ? date('Y-m-d', strtotime($notice['created_at'])) : date('Y-m-d');
                ?>
                <input 
                    type="date" 
                    name="created_at" 
                    value="<?= e($publishDate) ?>" 
                    required 
                    class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary font-bold bg-white text-gray-800">
            </div>
        </div>

        <!-- 2. File Attachment -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                <i class="fas fa-paperclip mr-1"></i> 첨부파일 (주보 이미지, PDF 문서 등)
            </label>
            <?php if (!empty($notice['attachment_url'])): ?>
            <div class="mb-2 p-2.5 bg-gray-50 rounded-xl border border-gray-200 text-xs flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fas fa-file text-gray-400"></i>
                    <span>현재 파일: <strong><?= e(basename($notice['attachment_url'])) ?></strong></span>
                </div>
                <input type="hidden" name="existing_attachment" value="<?= e($notice['attachment_url']) ?>">
                <a href="<?= e($notice['attachment_url']) ?>" target="_blank" class="text-primary font-bold hover:underline">열기/다운로드</a>
            </div>
            <?php endif; ?>
            <input 
                type="file" 
                name="attachment" 
                class="w-full px-4 py-2.5 rounded-2xl border border-dashed border-gray-300 text-xs sm:text-sm bg-gray-50/50 hover:bg-gray-50 focus:outline-none">
        </div>

        <!-- 3. Smart Rich Text Editor with Toolbar -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                    소식 본문 내용 <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="insertBulletinTemplate()" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition-all" title="주보 표준 양식 삽입">
                        <i class="fas fa-list-ol text-primary"></i>
                        <span class="hidden sm:inline">주보 양식 채우기</span>
                    </button>
                    <button type="button" onclick="refineWithAI()" id="aiRefineBtn" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs font-bold shadow-sm transition-all hover:scale-105 active:scale-95">
                        <i class="fas fa-wand-magic-sparkles"></i>
                        <span>🤖 AI 목회 문체로 다듬기</span>
                    </button>
                </div>
            </div>

            <!-- Editor Container -->
            <div class="border border-gray-300 rounded-2xl overflow-hidden focus-within:ring-2 focus-within:ring-primary focus-within:border-primary shadow-xs">
                
                <!-- Editor Toolbar -->
                <div class="bg-gray-50 border-b border-gray-200 p-2 flex flex-wrap items-center gap-1 text-xs">
                    <!-- Text Styles -->
                    <button type="button" onclick="applyFormat('bold')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg font-bold text-gray-700 transition-colors" title="굵게 (**텍스트**)">
                        <b>B</b>
                    </button>
                    <button type="button" onclick="applyFormat('italic')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg italic text-gray-700 transition-colors" title="기울임 (*텍스트*)">
                        <i>I</i>
                    </button>
                    <button type="button" onclick="applyFormat('underline')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg underline text-gray-700 transition-colors" title="밑줄 (<u>텍스트</u>)">
                        <u>U</u>
                    </button>
                    <button type="button" onclick="applyFormat('strikethrough')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg line-through text-gray-700 transition-colors" title="취소선 (~~텍스트~~)">
                        <s>S</s>
                    </button>

                    <div class="w-[1px] h-4 bg-gray-300 mx-1"></div>

                    <!-- Headings -->
                    <button type="button" onclick="insertHeading(1)" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg font-bold text-gray-700 transition-colors" title="대제목 (1. 제목 / ## 제목)">
                        H1
                    </button>
                    <button type="button" onclick="insertHeading(2)" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg font-bold text-gray-700 transition-colors" title="중제목 (### 제목)">
                        H2
                    </button>

                    <div class="w-[1px] h-4 bg-gray-300 mx-1"></div>

                    <!-- Lists -->
                    <button type="button" onclick="applyFormat('orderedList')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg text-gray-700 transition-colors flex items-center gap-1" title="개요 번호 목록 (1. 2. 3.)">
                        <i class="fas fa-list-ol text-primary"></i> <span class="hidden sm:inline text-[11px] font-bold">번호</span>
                    </button>
                    <button type="button" onclick="applyFormat('unorderedList')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg text-gray-700 transition-colors flex items-center gap-1" title="글머리 기호 목록 (• 항목)">
                        <i class="fas fa-list-ul text-primary"></i> <span class="hidden sm:inline text-[11px] font-bold">글머리</span>
                    </button>
                    <button type="button" onclick="applyFormat('quote')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg text-gray-700 transition-colors" title="인용구 (> 말씀)">
                        <i class="fas fa-quote-left"></i>
                    </button>
                    <button type="button" onclick="applyFormat('hr')" class="p-1.5 px-2 hover:bg-gray-200 rounded-lg text-gray-700 transition-colors" title="구분선 (---)">
                        <i class="fas fa-minus"></i>
                    </button>

                    <div class="w-[1px] h-4 bg-gray-300 mx-1"></div>

                    <!-- Quick Tools -->
                    <button type="button" onclick="clearEditor()" class="p-1.5 px-2 hover:bg-red-50 text-gray-500 hover:text-red-600 rounded-lg transition-colors ml-auto text-[11px]" title="내용 초기화">
                        <i class="fas fa-trash-can mr-0.5"></i> 비우기
                    </button>
                </div>

                <!-- Textarea Area -->
                <textarea 
                    id="noticeContent"
                    name="content" 
                    rows="13" 
                    required 
                    placeholder="공지사항 또는 주보 소식 내용을 입력해 주세요.&#10;&#10;[작성 팁]&#10;1. 주일예배 안내&#10;• 매주 주일 오전 11시에 본당에서 예배가 드려집니다.&#10;&#10;2. 새가족 환영&#10;• 오늘 교회를 처음 방문해 주신 성도님들을 축복합니다." 
                    class="w-full px-4 py-3.5 text-xs sm:text-sm font-sans leading-relaxed focus:outline-none resize-y border-none"><?= e($notice['content'] ?? '') ?></textarea>
            </div>

            <p id="aiStatusMsg" class="text-[11px] text-gray-500 mt-1 hidden"></p>
        </div>

        <!-- Actions -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="/admin/notices" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                취소
            </a>
            <button type="submit" class="px-6 py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                💾 <?= $notice ? '소식 수정 저장' : '새 소식 등록' ?>
            </button>
        </div>

    </form>

    <script>
        // Smart Editor Helper Functions
        function getSelectedText(textarea) {
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            return textarea.value.substring(start, end);
        }

        function replaceSelection(textarea, replacement) {
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            textarea.value = text.substring(0, start) + replacement + text.substring(end);
            textarea.selectionStart = textarea.selectionEnd = start + replacement.length;
            textarea.focus();
        }

        function applyFormat(type) {
            const textarea = document.getElementById('noticeContent');
            const selected = getSelectedText(textarea);

            switch (type) {
                case 'bold':
                    replaceSelection(textarea, selected ? `**${selected}**` : '**굵은 글씨**');
                    break;
                case 'italic':
                    replaceSelection(textarea, selected ? `*${selected}*` : '*기울임 글씨*');
                    break;
                case 'underline':
                    replaceSelection(textarea, selected ? `<u>${selected}</u>` : '<u>밑줄 텍스트</u>');
                    break;
                case 'strikethrough':
                    replaceSelection(textarea, selected ? `~~${selected}~~` : '~~취소선~~');
                    break;
                case 'orderedList':
                    if (selected) {
                        const lines = selected.split('\n');
                        const numbered = lines.map((l, i) => `${i + 1}. ${l}`).join('\n');
                        replaceSelection(textarea, numbered);
                    } else {
                        replaceSelection(textarea, '\n1. 첫 번째 소식\n2. 두 번째 소식\n3. 세 번째 소식\n');
                    }
                    break;
                case 'unorderedList':
                    if (selected) {
                        const lines = selected.split('\n');
                        const bulleted = lines.map(l => `• ${l}`).join('\n');
                        replaceSelection(textarea, bulleted);
                    } else {
                        replaceSelection(textarea, '\n• 세부 안내 항목 1\n• 세부 안내 항목 2\n');
                    }
                    break;
                case 'quote':
                    replaceSelection(textarea, selected ? `> ${selected}\n` : '> 인용 말씀 및 은혜 구절\n');
                    break;
                case 'hr':
                    replaceSelection(textarea, '\n---\n');
                    break;
            }
        }

        function insertHeading(level) {
            const textarea = document.getElementById('noticeContent');
            const selected = getSelectedText(textarea);
            if (level === 1) {
                replaceSelection(textarea, selected ? `\n1. ${selected}\n` : '\n1. 주요 소식 대제목\n');
            } else {
                replaceSelection(textarea, selected ? `\n• ${selected}\n` : '\n• 세부 소식 항목\n');
            }
        }

        function insertBulletinTemplate() {
            const textarea = document.getElementById('noticeContent');
            const titleInput = document.getElementById('noticeTitle');
            
            const today = new Date();
            const dateStr = `${today.getFullYear()}년 ${today.getMonth() + 1}월 ${today.getDate()}일`;
            
            if (!titleInput.value.trim()) {
                titleInput.value = `${dateStr} 주일예배 알리는 소식`;
            }

            const template = `1. 주일 예배 및 성도의 교제
• 매주 주일 오전 11:00 본당에서 은혜로운 예배가 드려집니다.
• 예배 후 식당에서 따뜻한 애찬 교제가 준비되어 있습니다.

2. 푸른나무교회 새가족 환영
• 오늘 교회를 처음 방문해 주신 성도님들을 주님의 이름으로 축복합니다.
• 예배 후 담임목사님과 따뜻한 만남의 시간이 있습니다.

3. 교우 소식 및 중보기도
• 환우 성도님들의 빠른 쾌유와 가정의 평안을 위해 함께 기도해 주시기 바랍니다.
• 이번 주 식사 봉사: 1주차 담당 봉사위원`;

            if (textarea.value.trim() && !confirm('기존 작성된 내용이 있습니다. 주보 표준 양식을 덮어쓸까요?')) {
                replaceSelection(textarea, '\n\n' + template);
            } else {
                textarea.value = template;
            }
            textarea.focus();
        }

        function clearEditor() {
            if (confirm('작성 중인 내용을 모두 지우시겠습니까?')) {
                document.getElementById('noticeContent').value = '';
                document.getElementById('noticeContent').focus();
            }
        }

        // AI Refine Tone
        async function refineWithAI() {
            const textarea = document.getElementById('noticeContent');
            const btn = document.getElementById('aiRefineBtn');
            const statusMsg = document.getElementById('aiStatusMsg');
            const text = textarea.value.trim();

            if (!text) {
                alert('내용을 먼저 입력해 주세요!');
                textarea.focus();
                return;
            }

            const originalBtnHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> AI 다듬는 중...';
            btn.disabled = true;
            statusMsg.classList.remove('hidden');
            statusMsg.textContent = '✨ AI가 정중하고 은혜로운 목회 문체로 문장을 다듬고 있습니다...';
            statusMsg.className = 'text-[11px] text-teal-600 mt-1 font-semibold';

            try {
                const res = await fetch('/api/ai/refine-tone', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ text: text })
                });
                const data = await res.json();

                if (data.success && data.refined) {
                    textarea.value = data.refined;
                    statusMsg.textContent = '🎉 AI 목회 문체로 깔끔하게 변환되었습니다!';
                    statusMsg.className = 'text-[11px] text-green-600 mt-1 font-bold';
                } else {
                    statusMsg.textContent = '❌ 변환 실패: ' + (data.message || '오류가 발생했습니다.');
                    statusMsg.className = 'text-[11px] text-red-600 mt-1';
                }
            } catch (err) {
                statusMsg.textContent = '❌ 서버 통신 오류가 발생했습니다.';
                statusMsg.className = 'text-[11px] text-red-600 mt-1';
            } finally {
                btn.innerHTML = originalBtnHtml;
                btn.disabled = false;
            }
        }
    </script>

</div>
