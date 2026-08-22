<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-3xl">
    
    <div class="border-b border-gray-100 pb-4 mb-6 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-primary text-white">
                    <?= e($inquiry['type']) ?>
                </span>
                <span class="text-xs text-gray-400"><?= e($inquiry['created_at']) ?></span>
            </div>
            <h2 class="text-xl font-bold text-gray-900"><?= e($inquiry['name']) ?> 성도님 접수 내역</h2>
        </div>
        <a href="/admin/inquiries" class="text-xs text-gray-500 hover:text-gray-900 font-bold">
            ← 목록으로
        </a>
    </div>

    <!-- Details Box -->
    <div class="space-y-6">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-2xl border border-gray-100 text-xs sm:text-sm">
            <div>
                <span class="text-gray-400 block text-xs">성함</span>
                <span class="font-bold text-gray-900"><?= e($inquiry['name']) ?></span>
            </div>
            <div>
                <span class="text-gray-400 block text-xs">연락처</span>
                <a href="tel:<?= e($inquiry['phone']) ?>" class="font-bold text-primary hover:underline"><?= e($inquiry['phone']) ?></a>
            </div>
        </div>

        <div>
            <h3 class="text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">남기신 말씀 / 기도 제목</h3>
            <div class="p-5 bg-surface-container-low/60 rounded-2xl border border-outline-variant/30 text-sm text-gray-800 leading-relaxed whitespace-pre-line font-serif-kr">
                <?= nl2br(e($inquiry['content'])) ?>
            </div>
        </div>

        <!-- Status & Memo Form -->
        <form action="/admin/inquiries/<?= e($inquiry['id']) ?>/status" method="POST" class="pt-4 border-t border-gray-100 space-y-4">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">처리 상태 변경</label>
                <select name="status" class="w-full sm:w-48 px-4 py-2 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary">
                    <?php foreach ($statuses as $st): ?>
                    <option value="<?= e($st) ?>" <?= $inquiry['status'] === $st ? 'selected' : '' ?>><?= e($st) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">목회자 / 관리자 메모 (비공개)</label>
                <textarea 
                    name="admin_memo" 
                    rows="4" 
                    placeholder="심방 내용, 연락 일자, 기도 후속 메모 등을 기록해 두실 수 있습니다." 
                    class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($inquiry['admin_memo'] ?? '') ?></textarea>
            </div>

            <div class="flex items-center justify-between pt-2">
                <a href="/admin/inquiries/delete/<?= e($inquiry['id']) ?>" onclick="return confirm('이 접수 내역을 삭제하시겠습니까?');" class="text-xs text-red-500 hover:text-red-700 font-semibold">
                    <i class="fas fa-trash-alt mr-1"></i> 내역 삭제
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all">
                    메모 및 상태 저장
                </button>
            </div>

        </form>

    </div>

</div>
