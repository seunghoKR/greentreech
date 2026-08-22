<div class="space-y-6 max-w-5xl">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">권한 관리</span>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mt-1">관리자 및 사역자 계정 관리</h2>
            <p class="text-xs text-gray-500 mt-0.5">담임목사(최고관리자) 및 게시판/주보/미디어를 관리할 부관리자 계정을 지정하고 권한을 부여합니다.</p>
        </div>
        <a href="/admin/admins/create" class="px-5 py-2.5 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 self-start sm:self-auto">
            <i class="fas fa-plus"></i> 새 부관리자 등록
        </a>
    </div>

    <!-- Admins Table -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <table class="w-full text-xs text-left">
            <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 font-bold">
                <tr>
                    <th class="py-3.5 px-5">관리자명 / 아이디</th>
                    <th class="py-3.5 px-4">직분 / 역할</th>
                    <th class="py-3.5 px-4">담당 권한</th>
                    <th class="py-3.5 px-4 text-center">최근 로그인</th>
                    <th class="py-3.5 px-5 text-center">관리</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($admins as $a): ?>
                <?php 
                    $permsRaw = $a['permissions'] ?? '[]';
                    $perms = is_array($permsRaw) ? $permsRaw : json_decode((string)$permsRaw, true);
                    if (!is_array($perms)) $perms = [];
                ?>
                <tr class="hover:bg-gray-50/60 transition-colors">
                    <td class="py-4 px-5">
                        <p class="font-bold text-gray-900 text-sm"><?= e($a['name']) ?></p>
                        <p class="text-[11px] text-gray-400"><?= e($a['username']) ?></p>
                    </td>
                    <td class="py-4 px-4">
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold <?= $a['role'] === '담임목사 (최고관리자)' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' ?>">
                            <?= e($a['role'] ?? '부관리자') ?>
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <?php if ($a['role'] === '담임목사 (최고관리자)' || in_array('all', $perms, true)): ?>
                            <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-amber-100 text-amber-800">모든 기능 전체 권한</span>
                        <?php elseif (empty($perms)): ?>
                            <span class="text-[11px] text-gray-400">부여된 권한 없음</span>
                        <?php else: ?>
                            <div class="flex flex-wrap gap-1">
                                <?php foreach ($perms as $p): ?>
                                <?php if (isset($availablePerms[$p])): ?>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-gray-100 text-gray-700">
                                        <?= e($availablePerms[$p]['label']) ?>
                                    </span>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td class="py-4 px-4 text-center text-gray-500 text-[11px]">
                        <?= $a['last_login'] ? date('m/d H:i', strtotime($a['last_login'])) : '-' ?>
                    </td>
                    <td class="py-4 px-5 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="/admin/admins/edit/<?= e($a['id']) ?>" class="p-2 text-gray-600 hover:text-primary font-bold" title="권한 수정">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <?php if ((int)$a['id'] !== 1): ?>
                            <a href="/admin/admins/delete/<?= e($a['id']) ?>" onclick="return confirm('정말 이 관리자 계정을 삭제하시겠습니까?');" class="p-2 text-red-500 hover:text-red-700" title="계정 삭제">
                                <i class="fas fa-trash"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>