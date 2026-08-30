<div class="space-y-6 max-w-7xl">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">교우 명부</span>
                <span class="text-xs text-gray-500 font-semibold">총 등록 회원 <?= number_format($pagination['total'] ?? 0) ?>명</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900 mt-1">성도 회원 관리 (직분 & 역할)</h1>
            <p class="text-xs text-gray-500 mt-0.5">성도님의 직분(귀한 손님~담임목사)과 담당 사역 역할(찬양/미디어/갤러리/소식/나눔/새가족)을 관리합니다.</p>
        </div>

        <!-- Search Form -->
        <form action="/admin/members" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
            <div class="relative flex-1 sm:flex-initial">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                <input 
                    type="text" 
                    name="keyword" 
                    value="<?= e($keyword ?? '') ?>" 
                    placeholder="성함, 닉네임, 연락처 검색" 
                    class="pl-9 pr-4 py-2 rounded-2xl border border-gray-200 text-xs w-full sm:w-72 focus:ring-2 focus:ring-primary bg-gray-50/50">
            </div>
            <button type="submit" class="px-4 py-2 bg-gray-800 hover:bg-gray-900 text-white rounded-2xl text-xs font-bold transition-all shadow-xs shrink-0 whitespace-nowrap">
                검색
            </button>
            <?php if (!empty($keyword)): ?>
            <a href="/admin/members" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-2xl text-xs font-bold transition-all shrink-0 whitespace-nowrap">
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
                        <th class="py-3.5 px-3 w-10 text-center">번호</th>
                        <th class="py-3.5 px-3">프로필</th>
                        <th class="py-3.5 px-4">성함 (실명) / 닉네임</th>
                        <th class="py-3.5 px-4">연락처</th>
                        <th class="py-3.5 px-4 text-center">직분</th>
                        <th class="py-3.5 px-5">담당 역할 / 사역 권한</th>
                        <th class="py-3.5 px-2 text-center">알림</th>
                        <th class="py-3.5 px-3 text-center">최근로그인</th>
                        <th class="py-3.5 px-4 text-center">관리</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    <?php if (!empty($pagination['items'])): ?>
                        <?php foreach ($pagination['items'] as $idx => $m): ?>
                        <?php 
                            $dutyVal = $m['duty'] ?: ($m['role'] ?? '성도');
                            if ($dutyVal === '인증전로그인' || $dutyVal === '일반교우' || $dutyVal === '준회원') $dutyVal = '귀한 손님';
                            if ($dutyVal === '등록성도' || $dutyVal === '푸른나무가족') $dutyVal = '성도';
                            if (str_contains($dutyVal, '최고관리자')) $dutyVal = '담임목사';
                        ?>
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="py-3.5 px-3 text-center text-gray-400 font-semibold">
                                <?= e($m['id']) ?>
                            </td>
                            <td class="py-3.5 px-3">
                                <img src="<?= e($m['profile_image'] ?: '/public/assets/images/logo.png') ?>" alt="Profile" class="w-9 h-9 rounded-full object-cover border border-gray-200">
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-gray-900 text-sm flex items-center gap-1.5">
                                    <span><?= e(!empty($m['name']) ? $m['name'] : $m['nickname']) ?></span>
                                    <?php if ($m['role'] === '사이트 개발자 (최고관리자)'): ?>
                                        <span class="px-1.5 py-0.2 rounded text-[9px] font-bold bg-purple-600 text-white">개발자</span>
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
                                <div class="text-[10px] text-gray-400 mt-0.5 truncate max-w-[140px]" title="<?= e($m['email']) ?>">
                                    <?= e($m['email'] ?: '카카오 간편연동') ?>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <?php 
                                    $dutyBadge = 'bg-green-50 text-green-800 border-green-200';
                                    if ($dutyVal === '귀한 손님') $dutyBadge = 'bg-amber-50 text-amber-800 border-amber-200';
                                    elseif ($dutyVal === '성도') $dutyBadge = 'bg-emerald-50 text-emerald-800 border-emerald-200';
                                    elseif ($dutyVal === '집사') $dutyBadge = 'bg-blue-50 text-blue-800 border-blue-200';
                                    elseif ($dutyVal === '권사') $dutyBadge = 'bg-teal-50 text-teal-800 border-teal-200';
                                    elseif ($dutyVal === '안수집사') $dutyBadge = 'bg-indigo-50 text-indigo-800 border-indigo-200';
                                    elseif ($dutyVal === '사모') $dutyBadge = 'bg-pink-50 text-pink-800 border-pink-200 font-bold';
                                    elseif ($dutyVal === '부교역자') $dutyBadge = 'bg-purple-50 text-purple-800 border-purple-200 font-bold';
                                    elseif ($dutyVal === '담임목사') $dutyBadge = 'bg-primary text-white border-primary font-black';
                                ?>
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold border <?= $dutyBadge ?>">
                                    <?= e($dutyVal) ?>
                                </span>
                            </td>
                            <td class="py-3.5 px-5">
                                <?php 
                                    $perms = !empty($m['permissions']) ? (is_array($m['permissions']) ? $m['permissions'] : json_decode($m['permissions'], true)) : [];
                                    $perms = is_array($perms) ? $perms : [];
                                ?>
                                <?php if (!empty($perms)): ?>
                                    <div class="flex flex-wrap gap-1">
                                        <?php foreach ($perms as $p): ?>
                                            <?php 
                                                $badgeStyle = 'bg-gray-100 text-gray-700';
                                                $label = $p;
                                                if ($p === 'worship') { $badgeStyle = 'bg-purple-50 text-purple-700 border-purple-200'; $label = '찬양'; }
                                                elseif ($p === 'media') { $badgeStyle = 'bg-red-50 text-red-700 border-red-200'; $label = '미디어'; }
                                                elseif ($p === 'gallery') { $badgeStyle = 'bg-pink-50 text-pink-700 border-pink-200'; $label = '갤러리'; }
                                                elseif ($p === 'notice') { $badgeStyle = 'bg-blue-50 text-blue-700 border-blue-200'; $label = '소식/주보'; }
                                                elseif ($p === 'community') { $badgeStyle = 'bg-emerald-50 text-emerald-700 border-emerald-200'; $label = '나눔/성도'; }
                                                elseif ($p === 'inquiry') { $badgeStyle = 'bg-amber-50 text-amber-700 border-amber-200'; $label = '새가족/초대'; }
                                            ?>
                                            <span class="px-1.5 py-0.5 rounded text-[10px] font-bold border <?= $badgeStyle ?>">
                                                <?= e($label) ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <span class="text-gray-400 text-[11px]">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="py-3.5 px-2 text-center">
                                <?= (int)$m['notify_kakao'] === 1 ? '<span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-green-50 text-green-700">수신</span>' : '<span class="px-1.5 py-0.5 rounded text-[10px] bg-gray-100 text-gray-400">거부</span>' ?>
                            </td>
                            <td class="py-3.5 px-3 text-center text-[11px] text-gray-500">
                                <div><?= $m['last_login'] ? date('m/d H:i', strtotime($m['last_login'])) : '-' ?></div>
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="/admin/members/send-welcome/<?= e($m['id']) ?>" onclick="return confirm('🌿 [<?= e($m['name'] ?: $m['nickname']) ?>] 성도님에게 환영 메시지를 발송하시겠습니까?');" class="px-2 py-1 bg-yellow-50 hover:bg-yellow-100 text-yellow-900 border border-yellow-300 rounded-xl font-bold transition-all flex items-center gap-1" title="환영 메시지 발송">
                                        <i class="fas fa-paper-plane text-amber-700 text-xs"></i>
                                        <span>환영톡</span>
                                    </a>
                                    <button type="button" onclick='openEditModal(<?= json_encode($m, JSON_UNESCAPED_UNICODE) ?>)' class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all flex items-center gap-1" title="회원 정보 수정">
                                        <i class="fas fa-user-pen"></i>
                                        <span>수정</span>
                                    </button>
                                    <a href="/admin/members/delete/<?= e($m['id']) ?>" onclick="return confirm('정말 [<?= e($m['nickname']) ?>] 성도 회원을 삭제하시겠습니까?');" class="p-1 text-red-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition-all" title="회원 삭제">
                                        <i class="fas fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="p-12 text-center text-xs text-gray-400">
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
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-gray-200 relative max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900">성도 회원 정보 수정</h3>
                <p class="text-xs text-gray-500 mt-0.5">성도님의 실명, 직분, 연락처 및 담당 역할을 직접 변경합니다.</p>
            </div>
            <button type="button" onclick="closeEditModal()" class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form action="/admin/members/save" method="POST" class="space-y-4">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
            <input type="hidden" name="id" id="modalMemberId">

            <!-- 1. Name & Nickname -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">성함 (실명) <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="modalMemberName" required placeholder="예: 한영숙" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">활동 닉네임 <span class="text-red-500">*</span></label>
                    <input type="text" name="nickname" id="modalMemberNickname" required class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
            </div>

            <!-- 2. Phone & Duty (직분 일원화) -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">연락처 (휴대폰) <span class="text-gray-400 font-normal text-[11px]">(선택)</span></label>
                    <input type="tel" name="phone" id="modalMemberPhone" placeholder="010-1234-5678" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-800 mb-1">
                        <i class="fas fa-church text-primary mr-1"></i> 직분
                    </label>
                    <select name="duty" id="modalMemberDuty" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-300 text-xs focus:ring-2 focus:ring-primary font-bold bg-white">
                        <option value="귀한 손님">귀한 손님</option>
                        <option value="성도">성도</option>
                        <option value="집사">집사</option>
                        <option value="권사">권사</option>
                        <option value="안수집사">안수집사</option>
                        <option value="사모">사모</option>
                        <option value="부교역자">부교역자</option>
                        <option value="담임목사">담임목사</option>
                    </select>
                </div>
            </div>

            <!-- 3. Kakao Email -->
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">카카오 이메일</label>
                <input type="email" name="email" id="modalMemberEmail" class="w-full px-3.5 py-2.5 rounded-2xl border border-gray-200 text-xs focus:ring-2 focus:ring-primary">
            </div>

            <!-- 4. 담당 역할 / 사역 권한 지정 -->
            <div class="p-4 bg-surface-container-low rounded-2xl border border-outline-variant/40 space-y-2">
                <div class="flex items-center justify-between">
                    <label class="block text-xs font-bold text-gray-800">
                        <i class="fas fa-user-gear text-primary mr-1"></i> 담당 역할 / 권한 분담
                    </label>
                    <span class="text-[11px] text-gray-500">목회자/개발자가 지정</span>
                </div>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 pt-1">
                    <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 text-xs">
                        <input type="checkbox" name="permissions[]" value="worship" class="rounded text-primary focus:ring-primary perm-check">
                        <span class="font-bold text-gray-800">🎵 찬양</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 text-xs">
                        <input type="checkbox" name="permissions[]" value="media" class="rounded text-primary focus:ring-primary perm-check">
                        <span class="font-bold text-gray-800">🎬 미디어</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 text-xs">
                        <input type="checkbox" name="permissions[]" value="gallery" class="rounded text-primary focus:ring-primary perm-check">
                        <span class="font-bold text-gray-800">📸 갤러리</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 text-xs">
                        <input type="checkbox" name="permissions[]" value="notice" class="rounded text-primary focus:ring-primary perm-check">
                        <span class="font-bold text-gray-800">📋 소식/주보</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 text-xs">
                        <input type="checkbox" name="permissions[]" value="community" class="rounded text-primary focus:ring-primary perm-check">
                        <span class="font-bold text-gray-800">💬 나눔/성도</span>
                    </label>
                    <label class="flex items-center gap-2 p-2 rounded-xl bg-white border border-gray-200 cursor-pointer hover:bg-gray-50 text-xs">
                        <input type="checkbox" name="permissions[]" value="inquiry" class="rounded text-primary focus:ring-primary perm-check">
                        <span class="font-bold text-gray-800">💌 새가족/초대</span>
                    </label>
                </div>
            </div>

            <!-- 5. Kakao Notification Consent -->
            <div class="p-3 bg-gray-50 rounded-2xl border border-gray-200">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="notify_kakao" id="modalMemberNotify" value="1" class="rounded text-primary focus:ring-primary h-4 w-4">
                    <span class="text-xs font-bold text-gray-800">카카오톡 댓글 알림 수신 동의</span>
                </label>
            </div>

            <!-- Footer Buttons -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2">
                <a href="#" id="modalSendWelcomeBtn" onclick="return confirm('🌿 이 성도님에게 환영 메시지를 발송하시겠습니까?');" class="px-3.5 py-2.5 bg-yellow-50 hover:bg-yellow-100 text-yellow-900 border border-yellow-300 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5" title="환영 메시지 발송">
                    <i class="fas fa-paper-plane text-amber-700"></i>
                    <span>💌 환영 메시지 발송</span>
                </a>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                        취소
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold shadow-md transition-all">
                        💾 변경 정보 저장하기
                    </button>
                </div>
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
        document.getElementById('modalMemberEmail').value = member.email || '';
        
        let dutyVal = member.duty || member.role || '성도';
        if (dutyVal === '인증전로그인' || dutyVal === '일반교우' || dutyVal === '준회원') dutyVal = '귀한 손님';
        if (dutyVal === '등록성도' || dutyVal === '푸른나무가족') dutyVal = '성도';
        if (dutyVal === '담임목사 (최고관리자)' || dutyVal === '교역자' || dutyVal === '전도사') dutyVal = '담임목사';
        if (dutyVal === '장로') dutyVal = '안수집사';
        document.getElementById('modalMemberDuty').value = dutyVal;

        // Reset and check permissions
        let userPerms = [];
        try {
            if (member.permissions) {
                userPerms = typeof member.permissions === 'string' ? JSON.parse(member.permissions) : member.permissions;
            }
        } catch (e) {
            userPerms = [];
        }
        if (!Array.isArray(userPerms)) userPerms = [];

        document.querySelectorAll('.perm-check').forEach(cb => {
            cb.checked = userPerms.includes(cb.value);
        });

        document.getElementById('modalMemberNotify').checked = (parseInt(member.notify_kakao, 10) === 1);
        document.getElementById('modalSendWelcomeBtn').href = '/admin/members/send-welcome/' + member.id;

        document.getElementById('memberEditModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('memberEditModal').classList.add('hidden');
    }
</script>