<div class="space-y-6 max-w-6xl">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">교우 명부</span>
                <span class="text-xs text-gray-500 font-semibold">총 등록 회원 <?= number_format($pagination['total'] ?? 0) ?>명</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mt-1">성도 회원 관리 대시보드</h1>
            <p class="text-xs text-gray-500 mt-0.5">카카오로 가입한 성도님들의 실명, 연락처, 활동 닉네임, 직분 등급을 조회하고 수정합니다.</p>
        </div>

        <!-- Search Form -->
        <form action="/admin/members" method="GET" class="flex items-center gap-2">
            <div class="relative">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                <input 
                    type="text" 
                    name="keyword" 
                    value="<?= e($keyword ?? '') ?>" 
                    placeholder="성함, 닉네임, 연락처, 이메일 검색" 
                    class="pl-9 pr-4 py-2 rounded-2xl border border-gray-200 text-xs w-60 sm:w-72 focus:ring-2 focus:ring-primary bg-gray-50/50">
            </div>
            <button type="submit" class="px-4 py-2 bg-gray-800 hover:bg-gray-900 text-white rounded-2xl text-xs font-bold transition-all shadow-xs">
                검색
            </button>
            <?php if (!empty($keyword)): ?>
            <a href="/admin/members" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-2xl text-xs font-bold transition-all">
                초기화
            </a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 font-bold border-b border-gray-200">
                        <th class="py-3.5 px-4 w-12 text-center">번호</th>
                        <th class="py-3.5 px-4">성도 프로필</th>
                        <th class="py-3.5 px-4">성함 (실명) / 닉네임</th>
                        <th class="py-3.5 px-4">연락처 / 이메일</th>
                        <th class="py-3.5 px-4">직분 (등급)</th>
                        <th class="py-3.5 px-3 text-center">카톡알림</th>
                        <th class="py-3.5 px-4 text-center">최근로그인 / 가입일</th>
                        <th class="py-3.5 px-4 text-center">관리</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    <?php if (!empty($pagination['items'])): ?>
                        <?php foreach ($pagination['items'] as $idx => $m): ?>
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="py-3.5 px-4 text-center text-gray-400 font-semibold">
                                <?= e($m['id']) ?>
                            </td>
                            <td class="py-3.5 px-4">
                                <img src="<?= e($m['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-9 h-9 rounded-full object-cover border border-gray-200">
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-gray-900 text-sm flex items-center gap-1.5">
                                    <span><?= e(!empty($m['name']) ? $m['name'] : $m['nickname']) ?></span>
                                    <?php if ($m['role'] === '사이트 개발자 (최고관리자)'): ?>
                                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-purple-600 text-white">개발자</span>
                                    <?php elseif ($m['role'] === '담임목사 (최고관리자)'): ?>
                                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-green-700 text-white">담임목사</span>
                                    <?php endif; ?>
                                </div>
                                <div class="text-[11px] text-gray-500 font-semibold mt-0.5">
                                    닉네임: <span class="text-primary font-bold"><?= e($m['nickname']) ?></span>
                                </div>
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-gray-800 flex items-center gap-1">
                                    <i class="fas fa-phone text-[10px] text-gray-400"></i>
                                    <span><?= e($m['phone'] ?: '-') ?></span>
                                </div>
                                <div class="text-[11px] text-gray-400 mt-0.5">
                                    <?= e($m['email'] ?: '카카오 간편연동') ?>
                                </div>
                            </td>
                            <td class="py-3.5 px-4">
                                <?php 
                                    $roleBadge = 'bg-green-100 text-green-800 font-bold';
                                    if ($m['role'] === '담임목사' || $m['role'] === '담임목사 (최고관리자)') $roleBadge = 'bg-emerald-100 text-emerald-800 font-black';
                                    elseif ($m['role'] === '청년' || $m['role'] === '청년부') $roleBadge = 'bg-blue-100 text-blue-800 font-bold';
                                    elseif ($m['role'] === '집사') $roleBadge = 'bg-amber-100 text-amber-800 font-bold';
                                    elseif ($m['role'] === '권사') $roleBadge = 'bg-purple-100 text-purple-800 font-bold';
                                    elseif ($m['role'] === '안수집사') $roleBadge = 'bg-indigo-100 text-indigo-800 font-bold';
                                    elseif ($m['role'] === '푸른나무가족' || $m['role'] === '등록성도') $roleBadge = 'bg-green-100 text-green-800 font-bold';
                                ?>
                                <span class="px-2.5 py-1 rounded-full text-xs <?= $roleBadge ?>">
                                    <?= e($m['role'] === '등록성도' ? '푸른나무가족' : ($m['role'] === '청년부' ? '청년' : $m['role'])) ?>
                                </span>
                            </td>
                            <td class="py-3.5 px-3 text-center">
                                <?= (int)$m['notify_kakao'] === 1 ? '<span class="px-2 py-0.5 rounded text-[10px] font-bold bg-green-50 text-green-700">수신</span>' : '<span class="px-2 py-0.5 rounded text-[10px] bg-gray-100 text-gray-400">거부</span>' ?>
                            </td>
                            <td class="py-3.5 px-4 text-center text-[11px] text-gray-500">
                                <div>최근: <?= $m['last_login'] ? date('m/d H:i', strtotime($m['last_login'])) : '-' ?></div>
                                <div class="text-gray-400 text-[10px]">가입: <?= date('Y.m.d', strtotime($m['created_at'])) ?></div>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <button type="button" onclick='openEditModal(<?= json_encode($m, JSON_UNESCAPED_UNICODE) ?>)' class="px-2.5 py-1.5 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all flex items-center gap-1" title="회원 정보 수정">
                                        <i class="fas fa-user-pen"></i>
                                        <span>수정</span>
                                    </button>
                                    <a href="/admin/members/delete/<?= e($m['id']) ?>" onclick="return confirm('정말 [<?= e($m['nickname']) ?>] 성도 회원을 삭제하시겠습니까?');" class="p-1.5 text-red-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition-all" title="회원 삭제">
                                        <i class="fas fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="p-12 text-center text-xs text-gray-400">
                                <i class="fas fa-user-slash text-2xl mb-2 text-gray-300 block"></i>
                                검색된 성도 회원이 없습니다.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if ($pagination['totalPages'] > 1): ?>
        <div class="p-4 bg-gray-50 border-t border-gray-200 flex items-center justify-center gap-2">
            <?php for ($i = 1; $i <= $pagination['totalPages']; $i++): ?>
            <a href="/admin/members?page=<?= $i ?><?= !empty($keyword) ? '&keyword=' . urlencode($keyword) : '' ?>" class="w-8 h-8 rounded-xl flex items-center justify-center text-xs font-bold <?= $pagination['page'] === $i ? 'bg-primary text-white shadow-xs' : 'bg-white border border-gray-200 text-gray-700 hover:bg-gray-100' ?>">
                <?= $i ?>
            </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>

</div>

<!-- Member Edit Modal -->
<div id="memberEditModal" class="fixed inset-0 bg-black/50 backdrop-blur-xs flex items-center justify-center z-50 p-4 hidden animate-fadeIn">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-gray-200 relative">
        <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900">성도 회원 정보 수정</h3>
                <p class="text-xs text-gray-500 mt-0.5">성도님의 실명, 직분, 연락처를 직접 변경합니다.</p>
            </div>
            <button type="button" onclick="closeEditModal()" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form action="/admin/members/save" method="POST" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <input type="hidden" name="id" id="modalMemberId">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">성함 (실명) <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="modalMemberName" required placeholder="예: 홍길동" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">활동 닉네임 <span class="text-red-500">*</span></label>
                    <input type="text" name="nickname" id="modalMemberNickname" required class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">연락처 (휴대폰) <span class="text-gray-400 font-normal text-[11px]">(선택)</span></label>
                    <input type="tel" name="phone" id="modalMemberPhone" placeholder="010-1234-5678" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">직분 / 역할 구분</label>
                    <select name="role" id="modalMemberRole" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary font-bold">
                        <option value="푸른나무가족">푸른나무가족</option>
                        <option value="청년">청년</option>
                        <option value="집사">집사</option>
                        <option value="권사">권사</option>
                        <option value="안수집사">안수집사</option>
                        <option value="담임목사">담임목사</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">카카오 이메일</label>
                <input type="email" name="email" id="modalMemberEmail" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
            </div>

            <div class="p-3 bg-gray-50 rounded-2xl border border-gray-200">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="notify_kakao" id="modalMemberNotify" value="1" class="rounded text-primary focus:ring-primary h-4 w-4">
                    <span class="text-xs font-bold text-gray-800">카카오톡 댓글 알림 수신 동의</span>
                </label>
            </div>

            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                    취소
                </button>
                <button type="submit" class="px-5 py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold shadow-md transition-all">
                    💾 변경 정보 저장하기
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(member) {
        document.getElementById('modalMemberId').value = member.id || '';
        document.getElementById('modalMemberName').value = member.name || member.nickname || '';
        document.getElementById('modalMemberNickname').value = member.nickname || '';
        document.getElementById('modalMemberPhone').value = member.phone || '';
        let roleVal = member.role || '푸른나무가족';
        if (roleVal === '등록성도') roleVal = '푸른나무가족';
        if (roleVal === '청년부') roleVal = '청년';
        if (roleVal === '담임목사 (최고관리자)' || roleVal === '교역자' || roleVal === '전도사') roleVal = '담임목사';
        if (roleVal === '장로') roleVal = '안수집사';
        document.getElementById('modalMemberRole').value = roleVal;
        document.getElementById('modalMemberNotify').checked = (parseInt(member.notify_kakao, 10) === 1);

        document.getElementById('memberEditModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('memberEditModal').classList.add('hidden');
    }
</script>