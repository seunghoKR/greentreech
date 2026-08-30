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
        <?php if (!empty($isDeveloper)): ?>
        <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
            <a href="/admin/kakao" class="px-4 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 rounded-2xl text-xs font-bold shadow-2xs transition-all inline-flex items-center gap-1.5 whitespace-nowrap" title="개발자 전용 API 설정">
                <i class="fas fa-code text-gray-500"></i> <span>카카오 API 설정</span>
            </a>
        </div>
        <?php endif; ?>
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

    <!-- Welcome Message Configuration Card (담임목사 전용) -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-gray-100 pb-4">
            <div>
                <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center text-sm font-bold">
                        <i class="fas fa-hand-holding-heart"></i>
                    </span>
                    <span>카톡 첫 로그인 성도 자동 환영 메시지 기획</span>
                </h3>
                <p class="text-xs text-gray-500 mt-1">카카오 간편 로그인을 통해 처음 접속한 교우님께 자동으로 전송될 축복과 환영의 멘트를 설정합니다.</p>
            </div>
            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full border border-emerald-200/80 w-fit">
                <i class="fas fa-bolt text-amber-500 mr-1"></i> 자동 발송 연동
            </span>
        </div>

        <form action="/admin/notifications/welcome" method="POST" class="space-y-6">
            <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">

            <!-- Toggle Switch -->
            <div class="flex items-center justify-between p-4 rounded-2xl bg-gray-50 border border-gray-200/80">
                <div>
                    <span class="text-xs font-bold text-gray-800 block">첫 로그인 자동 환영 발송 활성화</span>
                    <span class="text-[11px] text-gray-500">새로운 성도님이 첫 로그인할 때 카카오톡(나와의 채팅방)으로 환영 메시지를 즉시 전송합니다.</span>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="welcome_message_enabled" value="1" class="sr-only peer" <?= $welcomeEnabled ? 'checked' : '' ?>>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                </label>
            </div>

            <!-- Variable Tags -->
            <div class="space-y-2">
                <label class="block text-xs font-bold text-gray-700">
                    스마트 치환 태그 (클릭 시 문구에 자동 삽입)
                </label>
                <div class="flex flex-wrap gap-2 text-xs">
                    <button type="button" onclick="insertTag('{name}')" class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all border border-gray-200 text-[11px]">
                        + {name} <span class="font-normal opacity-75">(성도 실명)</span>
                    </button>
                    <button type="button" onclick="insertTag('{nickname}')" class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all border border-gray-200 text-[11px]">
                        + {nickname} <span class="font-normal opacity-75">(닉네임)</span>
                    </button>
                    <button type="button" onclick="insertTag('{pastor_name}')" class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all border border-gray-200 text-[11px]">
                        + {pastor_name} <span class="font-normal opacity-75">(담임목사 성함)</span>
                    </button>
                    <button type="button" onclick="insertTag('{worship_sunday}')" class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all border border-gray-200 text-[11px]">
                        + {worship_sunday} <span class="font-normal opacity-75">(예배시간)</span>
                    </button>
                    <button type="button" onclick="insertTag('{address}')" class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all border border-gray-200 text-[11px]">
                        + {address} <span class="font-normal opacity-75">(교회위치)</span>
                    </button>
                    <button type="button" onclick="insertTag('{church_name}')" class="px-2.5 py-1 bg-gray-100 hover:bg-primary hover:text-white text-gray-700 rounded-xl font-bold transition-all border border-gray-200 text-[11px]">
                        + {church_name} <span class="font-normal opacity-75">(교회명)</span>
                    </button>
                </div>
            </div>

            <!-- Two Column Layout (Textarea & Live Preview) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Textarea Editor -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="welcomeTemplate" class="text-xs font-bold text-gray-700">환영 메시지 문구 작성 (수정 가능)</label>
                        <span class="text-[11px] text-gray-400">카카오톡 서식 줄바꿈 지원</span>
                    </div>
                    <textarea name="welcome_message_template" id="welcomeTemplate" rows="11" required
                              class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs font-sans focus:ring-2 focus:ring-primary leading-relaxed resize-y font-medium"
                              oninput="updateWelcomePreview()"><?= e($welcomeTemplate) ?></textarea>
                </div>

                <!-- Live Preview Phone Box -->
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-gray-700 flex items-center gap-1.5">
                        <i class="fas fa-mobile-screen-button text-amber-600"></i>
                        <span>성도 카카오톡 수신 화면 미리보기</span>
                    </label>
                    <div class="bg-[#BACEE0] p-4 rounded-2xl border border-blue-200/60 shadow-inner h-[250px] overflow-y-auto flex flex-col justify-start">
                        <div class="bg-white text-gray-900 rounded-2xl rounded-tl-xs p-3.5 shadow-sm text-xs leading-relaxed max-w-[90%] whitespace-pre-line font-sans border border-gray-100" id="welcomePreviewText">
                            <!-- Live Rendered Content via JS -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button type="submit" class="px-6 py-3 bg-primary hover:bg-[#0d2b0b] text-white rounded-2xl text-xs font-bold shadow-md transition-all flex items-center gap-2">
                    <i class="fas fa-floppy-disk"></i>
                    <span>환영 메시지 설정 저장하기</span>
                </button>
            </div>
        </form>
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
                        <th class="p-4 w-36">알림 유형</th>
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
                            if ($log['type'] === 'WELCOME_ALERT') {
                                $badgeClass = 'bg-amber-100 text-amber-900 border border-amber-300 font-bold';
                                $typeName = '첫 로그인 환영 🌿';
                            } elseif ($log['type'] === 'NURIO_TEST_ALERT' || $log['type'] === 'YOUNGJA_TEST_ALERT') {
                                $badgeClass = 'bg-emerald-100 text-emerald-800 border border-emerald-300 font-bold';
                                $typeName = '누리오 테스트';
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

<script>
    function insertTag(tag) {
        const textarea = document.getElementById('welcomeTemplate');
        if (!textarea) return;
        
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const text = textarea.value;
        
        textarea.value = text.substring(0, start) + tag + text.substring(end);
        textarea.focus();
        textarea.selectionStart = textarea.selectionEnd = start + tag.length;
        updateWelcomePreview();
    }

    function updateWelcomePreview() {
        const textarea = document.getElementById('welcomeTemplate');
        const preview = document.getElementById('welcomePreviewText');
        if (!textarea || !preview) return;

        let content = textarea.value;
        const sampleValues = {
            '{name}': '김은혜',
            '{nickname}': '은혜나무',
            '{church_name}': '<?= e($settings['site_name'] ?? '푸른나무교회') ?>',
            '{pastor_name}': '<?= e($settings['pastor_name'] ?? '심민보') ?>',
            '{worship_sunday}': '<?= e($settings['worship_sunday'] ?? '주일 오전 11:00') ?>',
            '{address}': '<?= e($settings['address'] ?? '전라북도 익산시 선화로73길 25 (3층)') ?>',
            '{phone}': '<?= e($settings['phone'] ?? '010-9559-8623') ?>'
        };

        for (const [tag, val] of Object.entries(sampleValues)) {
            content = content.replaceAll(tag, val);
        }

        preview.innerText = content;
    }

    // Initial render
    document.addEventListener('DOMContentLoaded', updateWelcomePreview);
    updateWelcomePreview();
</script>
