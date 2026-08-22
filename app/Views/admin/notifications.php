<div class="space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                <i class="fas fa-bell text-primary"></i>
                <span>카카오톡 실시간 알림 센터</span>
            </h1>
            <p class="text-xs text-gray-500 mt-1">나눔터 새 글, 댓글, 새가족/기도 접수 및 주보 소식 알림 로그를 실시간으로 확인합니다.</p>
        </div>
        <div class="flex items-center gap-2 self-start sm:self-auto">
            <a href="/admin/kakao" class="px-4 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 rounded-2xl text-xs font-bold shadow-2xs transition-all inline-flex items-center gap-1.5">
                <i class="fas fa-cog text-gray-500"></i> 카카오 설정
            </a>
            <a href="/admin/notifications/test" class="px-5 py-2.5 bg-[#FEE500] hover:bg-[#FDD835] text-[#191919] rounded-2xl text-xs font-bold shadow-sm transition-all inline-flex items-center gap-2 hover:scale-[1.02] active:scale-[0.98]">
                <i class="fas fa-paper-plane text-amber-900"></i> 영자에게 테스트 알림 요청하기 💌
            </a>
        </div>
    </div>

    <!-- Live Test Notification Banner -->
    <div class="bg-gradient-to-r from-emerald-50 via-green-50 to-emerald-50 rounded-3xl border border-emerald-200/80 p-6 shadow-sm">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span>
                    <h3 class="font-bold text-sm text-emerald-950">알림 시스템 작동 상태: 정상 대기 중 (Active)</h3>
                </div>
                <p class="text-xs text-emerald-800 leading-relaxed">
                    수신자: <strong><?= e($curUser['name'] ?? '관리자') ?> (<?= e($curUser['username'] ?? '') ?>)</strong> | 버튼을 클릭하시면 테스트 축복 알림이 즉시 발송/기록됩니다.
                </p>
            </div>
            <a href="/admin/notifications/test" class="px-6 py-3 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all shrink-0 flex items-center gap-2">
                <i class="fas fa-comment-dots"></i>
                <span>지금 테스트 알림 보내기</span>
            </a>
        </div>
    </div>

    <!-- Notification Service Use Cases -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-2xs space-y-2">
            <div class="w-9 h-9 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-sm">
                <i class="fas fa-comments"></i>
            </div>
            <h4 class="font-bold text-xs sm:text-sm text-gray-900">1. 나눔터 댓글 알림</h4>
            <p class="text-[11px] text-gray-500 leading-relaxed">내 글이나 기도제목에 다른 성도님이 은혜로운 댓글을 남겼을 때 글 작성자에게 실시간 알림톡을 발송합니다.</p>
        </div>
        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-2xs space-y-2">
            <div class="w-9 h-9 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-sm">
                <i class="fas fa-heart"></i>
            </div>
            <h4 class="font-bold text-xs sm:text-sm text-gray-900">2. 새가족 / 중보기도 긴급 알림</h4>
            <p class="text-[11px] text-gray-500 leading-relaxed">홈페이지에서 새가족 등록이나 긴급 중보기도 요청이 접수되면 담임목사님(대표님) 카톡으로 즉시 알림이 전달됩니다.</p>
        </div>
        <div class="bg-white p-5 rounded-3xl border border-gray-200/80 shadow-2xs space-y-2">
            <div class="w-9 h-9 rounded-2xl bg-green-50 text-green-700 flex items-center justify-center font-bold text-sm">
                <i class="fas fa-book-bible"></i>
            </div>
            <h4 class="font-bold text-xs sm:text-sm text-gray-900">3. 주일 온라인 주보 발행 알림</h4>
            <p class="text-[11px] text-gray-500 leading-relaxed">매주 주일 아침 푸른나무 성도님들께 금주의 주일예배 순서와 말씀이 담긴 스마트 주보 링크를 카카오톡으로 안내합니다.</p>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                <i class="fas fa-list-check text-primary"></i> 실시간 알림 발송 로그
            </h3>
            <span class="text-xs text-gray-400 font-medium">최근 30건 표시</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                        <th class="p-4 w-32">알림 유형</th>
                        <th class="p-4 w-36">수신자</th>
                        <th class="p-4">알림 메시지 내용</th>
                        <th class="p-4 w-24 text-center">전송 상태</th>
                        <th class="p-4 w-40 text-center">발송 일시</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-700">
                    <?php if (!empty($logs)): ?>
                        <?php foreach ($logs as $log): ?>
                        <?php 
                            $badgeClass = 'bg-gray-100 text-gray-800';
                            $typeName = '일반 알림';
                            if ($log['type'] === 'YOUNGJA_TEST_ALERT') {
                                $badgeClass = 'bg-emerald-100 text-emerald-800 border border-emerald-300 font-bold';
                                $typeName = '영자 테스트';
                            } elseif ($log['type'] === 'COMMENT_ALERT') {
                                $badgeClass = 'bg-amber-100 text-amber-800';
                                $typeName = '댓글 알림';
                            } elseif ($log['type'] === 'NEW_INQUIRY_ALERT') {
                                $badgeClass = 'bg-red-100 text-red-800 font-bold';
                                $typeName = '새가족/기도';
                            } elseif ($log['type'] === 'NEW_POST_ALERT') {
                                $badgeClass = 'bg-blue-100 text-blue-800';
                                $typeName = '새글 알림';
                            }
                        ?>
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] <?= $badgeClass ?>">
                                    <?= $typeName ?>
                                </span>
                            </td>
                            <td class="p-4 font-bold text-gray-900">
                                <?= e($log['recipient_name'] ?: '이승호 대표님') ?>
                            </td>
                            <td class="p-4 text-xs font-mono text-gray-700 whitespace-pre-line leading-relaxed">
                                <?= e($log['message']) ?>
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-100 text-green-700 flex items-center justify-center gap-1 w-fit mx-auto">
                                    <i class="fas fa-check text-[9px]"></i> <?= e($log['status']) ?>
                                </span>
                            </td>
                            <td class="p-4 text-center text-xs text-gray-400">
                                <?= e($log['created_at']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="p-10 text-center text-xs text-gray-400">
                                <i class="fas fa-bell-slash text-2xl text-gray-300 mb-2 block"></i>
                                발송된 알림 내역이 없습니다. 상단의 [지금 테스트 알림 보내기]를 눌러보세요!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
