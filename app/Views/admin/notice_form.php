<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-4xl">
    
    <div class="border-b border-gray-100 pb-4 mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900"><?= $notice ? '알리는 소식 수정' : '새 소식 등록' ?></h2>
            <p class="text-xs text-gray-500 mt-1">교회 주요 소식과 공지사항, 안내글을 등록하고 첨부파일을 관리합니다.</p>
        </div>
        <a href="/admin/notices" class="text-xs text-gray-500 hover:text-gray-900 font-bold">
            ← 목록으로
        </a>
    </div>

    <form action="/admin/notices/save" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <input type="hidden" name="category" value="소식">
        <?php if ($notice): ?>
        <input type="hidden" name="id" value="<?= e($notice['id']) ?>">
        <?php endif; ?>

        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                소식 제목 <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                name="title" 
                value="<?= e($notice['title'] ?? '') ?>" 
                required 
                placeholder="소식 제목을 입력해 주세요" 
                class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
        </div>

        <!-- File Attachment -->
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                <i class="fas fa-paperclip mr-1"></i> 첨부파일 (주보 이미지, PDF 등)
            </label>
            <?php if (!empty($notice['attachment_url'])): ?>
            <div class="mb-2 p-2 bg-gray-50 rounded-xl border border-gray-200 text-xs flex items-center justify-between">
                <span>현재 파일: <?= e(basename($notice['attachment_url'])) ?></span>
                <input type="hidden" name="existing_attachment" value="<?= e($notice['attachment_url']) ?>">
                <a href="<?= e($notice['attachment_url']) ?>" target="_blank" class="text-blue-600 underline">확인</a>
            </div>
            <?php endif; ?>
            <input 
                type="file" 
                name="attachment" 
                class="w-full px-4 py-2.5 rounded-2xl border border-dashed border-gray-300 text-xs sm:text-sm bg-gray-50/50 hover:bg-gray-50 focus:outline-none">
        </div>

        <!-- Content with AI Tone Transformer -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                    내용 <span class="text-red-500">*</span>
                </label>
                <button type="button" onclick="refineWithAI()" id="aiRefineBtn" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs font-bold shadow-sm transition-all hover:scale-105 active:scale-95">
                    <i class="fas fa-wand-magic-sparkles"></i>
                    <span>🤖 AI 목회 문체로 다듬기</span>
                </button>
            </div>
            <textarea 
                id="noticeContent"
                name="content" 
                rows="10" 
                required 
                placeholder="공지사항 또는 주보 순서 및 소식 내용을 입력해 주세요. (대충 적고 상단의 [AI 목회 문체로 다듬기] 버튼을 누르면 정중한 목회 문체로 자동 변환됩니다)" 
                class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($notice['content'] ?? '') ?></textarea>
            <p id="aiStatusMsg" class="text-[11px] text-gray-500 mt-1 hidden"></p>
        </div>

        <!-- Actions -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="/admin/notices" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                취소
            </a>
            <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                <?= $notice ? '소식 수정 저장' : '새 소식 등록' ?>
            </button>
        </div>

    </form>

    <script>
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
