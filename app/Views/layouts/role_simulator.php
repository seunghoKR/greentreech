<?php
// Developer Role Simulator Bar Component
$isLoggedInAdmin = \App\Core\Auth::check();
$isLoggedInMember = \App\Core\Auth::isMember();
$curAdmin = \App\Core\Auth::user();
$curMember = \App\Core\Auth::member();

$currentRoleLabel = '👤 1. 비로그인';
$currentRoleBadgeClass = 'bg-gray-700 text-gray-200';

if ($isLoggedInAdmin) {
    $role = $curAdmin['role'] ?? '';
    if ($role === '담임목사' || $role === '담임목사 (최고관리자)' || (int)($curAdmin['id'] ?? 0) === 1) {
        $currentRoleLabel = '👑 5. 심민보 담임목사';
        $currentRoleBadgeClass = 'bg-emerald-600 text-white font-bold animate-pulse';
    } else {
        $permsRaw = $curAdmin['permissions'] ?? [];
        $perms = is_array($permsRaw) ? $permsRaw : (json_decode((string)$permsRaw, true) ?: []);
        
        if (in_array('sermons', $perms, true) && in_array('gallery', $perms, true) && count($perms) === 2) {
            $currentRoleLabel = '🎬 4-A. 영상/사진 관리자';
        } elseif (in_array('notices', $perms, true) && count($perms) === 1) {
            $currentRoleLabel = '📋 4-B. 알리는 소식 관리자';
        } elseif (in_array('community', $perms, true) && in_array('members', $perms, true) && count($perms) === 2) {
            $currentRoleLabel = '💬 4-C. 나눔터/성도 관리자';
        } elseif (in_array('inquiries', $perms, true) && count($perms) === 1) {
            $currentRoleLabel = '💌 4-D. 새가족/기도 관리자';
        } else {
            $currentRoleLabel = '🛡️ 4. 부관리자 (' . implode(',', $perms) . ')';
        }
        $currentRoleBadgeClass = 'bg-blue-600 text-white font-bold';
    }
} elseif ($isLoggedInMember) {
    $mRole = $curMember['role'] ?? '일반교우';
    if ($mRole === '일반교우') {
        $currentRoleLabel = '⏳ 2. 인증전로그인 (일반교우)';
        $currentRoleBadgeClass = 'bg-amber-500 text-white font-bold';
    } else {
        $currentRoleLabel = '🌿 3. 푸른나무가족 (' . $mRole . ')';
        $currentRoleBadgeClass = 'bg-green-600 text-white font-bold';
    }
}

$currentUri = $_SERVER['REQUEST_URI'] ?? '/';
?>

<!-- 🛠️ Dev Role Simulator Floating Panel -->
<div id="devRoleSimulator" class="fixed bottom-4 right-4 z-50 transition-all duration-300 font-sans">
    
    <!-- Collapsed Toggle Pill -->
    <div id="devSimulatorMin" class="hidden">
        <button onclick="toggleDevSimulator(true)" class="bg-gray-900/90 hover:bg-gray-900 text-white px-3.5 py-2 rounded-full shadow-2xl border border-gray-700 text-xs font-bold flex items-center gap-2 backdrop-blur-md transition-all hover:scale-105">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
            <i class="fas fa-sliders text-amber-400"></i>
            <span>권한 테스트:</span>
            <span class="px-2 py-0.5 rounded-full text-[10px] <?= $currentRoleBadgeClass ?>">
                <?= e($currentRoleLabel) ?>
            </span>
            <i class="fas fa-chevron-up text-[10px] text-gray-400 ml-1"></i>
        </button>
    </div>

    <!-- Expanded Control Box -->
    <div id="devSimulatorBox" class="bg-gray-950/95 text-white rounded-3xl border border-gray-700/80 shadow-2xl p-4 sm:p-5 w-80 sm:w-96 backdrop-blur-xl animate-fadeIn">
        
        <!-- Header -->
        <div class="flex items-center justify-between pb-3 mb-3 border-b border-gray-800">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center text-xs">
                    <i class="fas fa-sliders"></i>
                </div>
                <h4 class="text-xs font-black tracking-wider text-gray-200">개발자 권한 시뮬레이터</h4>
            </div>
            <button onclick="toggleDevSimulator(false)" class="text-gray-400 hover:text-white text-xs px-2 py-1 rounded-lg hover:bg-gray-800 transition-colors">
                <i class="fas fa-minus mr-1"></i> 접기
            </button>
        </div>

        <!-- Current Status Display -->
        <div class="bg-gray-900/90 rounded-2xl p-2.5 mb-3 border border-gray-800 flex items-center justify-between text-xs">
            <span class="text-gray-400 text-[11px]">현재 시뮬레이션 상태:</span>
            <span class="px-2.5 py-0.5 rounded-full text-[11px] <?= $currentRoleBadgeClass ?>">
                <?= e($currentRoleLabel) ?>
            </span>
        </div>

        <!-- 5 Role Groups Selector Buttons -->
        <div class="space-y-1.5 text-xs">
            
            <!-- 1. 비로그인 -->
            <a href="/dev/switch-role?role=guest&redirect=<?= urlencode($currentUri) ?>" 
               class="w-full flex items-center justify-between px-3 py-2 rounded-xl bg-gray-900 hover:bg-gray-800 border border-gray-800 transition-all group">
                <div class="flex items-center gap-2">
                    <span class="text-gray-400 group-hover:text-white">👤</span>
                    <span class="font-bold text-gray-200">1. 비로그인 (Guest)</span>
                </div>
                <span class="text-[10px] text-gray-500">일반 방문자</span>
            </a>

            <!-- 2. 인증전로그인 (일반교우) -->
            <a href="/dev/switch-role?role=unverified&redirect=<?= urlencode($currentUri) ?>" 
               class="w-full flex items-center justify-between px-3 py-2 rounded-xl bg-gray-900 hover:bg-amber-950/40 border border-gray-800 hover:border-amber-700/50 transition-all group">
                <div class="flex items-center gap-2">
                    <span class="text-amber-400">⏳</span>
                    <span class="font-bold text-amber-200">2. 인증전로그인 (일반교우)</span>
                </div>
                <span class="text-[10px] text-amber-400/80">승인 대기</span>
            </a>

            <!-- 3. 푸른나무가족 (등록성도) -->
            <a href="/dev/switch-role?role=member&redirect=<?= urlencode($currentUri) ?>" 
               class="w-full flex items-center justify-between px-3 py-2 rounded-xl bg-gray-900 hover:bg-green-950/40 border border-gray-800 hover:border-green-700/50 transition-all group">
                <div class="flex items-center gap-2">
                    <span class="text-green-400">🌿</span>
                    <span class="font-bold text-green-200">3. 푸른나무가족 (등록성도)</span>
                </div>
                <span class="text-[10px] text-green-400/80">나눔터 정회원</span>
            </a>

            <!-- 4. 관리자 (Sub-Admin Granular Presets) -->
            <div class="bg-gray-900/60 rounded-2xl border border-gray-800 p-2 space-y-1">
                <div class="text-[10px] font-bold text-blue-400 px-1 flex items-center justify-between">
                    <span>🛡️ 4. 부관리자 (컨텐츠별 권한 분담)</span>
                    <span class="text-gray-500 font-normal">선택 즉시 적용</span>
                </div>
                
                <div class="grid grid-cols-2 gap-1 pt-1">
                    <a href="/dev/switch-role?role=admin_media&redirect=/admin" 
                       class="px-2 py-1.5 bg-gray-950 hover:bg-blue-900/50 border border-gray-800 hover:border-blue-500/50 rounded-xl text-[11px] font-bold text-gray-300 hover:text-white flex items-center gap-1.5 transition-all truncate" title="영상분류 & 사진첩 관리 권한">
                        <span>🎬</span> <span class="truncate">A. 영상/사진</span>
                    </a>
                    <a href="/dev/switch-role?role=admin_notices&redirect=/admin" 
                       class="px-2 py-1.5 bg-gray-950 hover:bg-blue-900/50 border border-gray-800 hover:border-blue-500/50 rounded-xl text-[11px] font-bold text-gray-300 hover:text-white flex items-center gap-1.5 transition-all truncate" title="알리는 소식/공지 관리 권한">
                        <span>📋</span> <span class="truncate">B. 알리는소식</span>
                    </a>
                    <a href="/dev/switch-role?role=admin_community&redirect=/admin" 
                       class="px-2 py-1.5 bg-gray-950 hover:bg-blue-900/50 border border-gray-800 hover:border-blue-500/50 rounded-xl text-[11px] font-bold text-gray-300 hover:text-white flex items-center gap-1.5 transition-all truncate" title="나눔터 & 성도회원 관리 권한">
                        <span>💬</span> <span class="truncate">C. 나눔/성도</span>
                    </a>
                    <a href="/dev/switch-role?role=admin_inquiry&redirect=/admin" 
                       class="px-2 py-1.5 bg-gray-950 hover:bg-blue-900/50 border border-gray-800 hover:border-blue-500/50 rounded-xl text-[11px] font-bold text-gray-300 hover:text-white flex items-center gap-1.5 transition-all truncate" title="새가족 & 기도접수 관리 권한">
                        <span>💌</span> <span class="truncate">D. 새가족/기도</span>
                    </a>
                </div>
            </div>

            <!-- 5. 심민보 담임목사 -->
            <a href="/dev/switch-role?role=pastor&redirect=/admin" 
               class="w-full flex items-center justify-between px-3 py-2 rounded-xl bg-gradient-to-r from-emerald-950/80 to-gray-900 hover:from-emerald-900/90 border border-emerald-800/60 hover:border-emerald-600 transition-all group shadow-sm">
                <div class="flex items-center gap-2">
                    <span class="text-emerald-400">👑</span>
                    <span class="font-bold text-emerald-200">5. 심민보 담임목사</span>
                </div>
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-800/80 text-emerald-100 font-bold">전체 마스터</span>
            </a>

        </div>

    </div>

</div>

<script>
function toggleDevSimulator(expand) {
    const minPill = document.getElementById('devSimulatorMin');
    const box = document.getElementById('devSimulatorBox');
    if (!minPill || !box) return;

    if (expand) {
        minPill.classList.add('hidden');
        box.classList.remove('hidden');
        localStorage.setItem('gtc_dev_simulator_state', 'expanded');
    } else {
        box.classList.add('hidden');
        minPill.classList.remove('hidden');
        localStorage.setItem('gtc_dev_simulator_state', 'collapsed');
    }
}

// Restore user preference state
document.addEventListener('DOMContentLoaded', function() {
    const savedState = localStorage.getItem('gtc_dev_simulator_state');
    if (savedState === 'collapsed') {
        toggleDevSimulator(false);
    }
});
</script>
