<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
        <span class="text-xs font-bold text-secondary uppercase tracking-wider">Service Schedule</span>
        <h1 class="font-serif-kr text-3xl font-bold text-gray-950 mt-1">모임 및 예배 안내</h1>
        <p class="text-sm text-gray-600 mt-2">하나님께 감사의 예배를 드리고, 성도 간 사랑을 나누는 시간입니다</p>
    </div>

    <!-- Sub Nav -->
    <?php require __DIR__ . '/nav.php'; ?>

    <!-- Schedule Table Card -->
    <div class="bg-white rounded-3xl border border-outline-variant/40 shadow-soft overflow-hidden mb-10">
        <div class="p-6 bg-surface-container-low border-b border-outline-variant/30 flex items-center justify-between">
            <h3 class="font-serif-kr text-lg font-bold text-gray-900 flex items-center gap-2">
                <i class="fas fa-calendar-alt text-primary"></i> 정기 예배 및 모임 시간표
            </h3>
            <span class="text-xs text-gray-500 font-medium">푸른나무교회</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-700 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                        <th class="p-4 sm:px-6 sm:py-4 w-32">구분</th>
                        <th class="p-4 sm:px-6 sm:py-4">모임 / 예배명</th>
                        <th class="p-4 sm:px-6 sm:py-4 w-48 sm:w-60">일시 및 시간</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-xs sm:text-sm text-gray-800">
                    
                    <!-- 주일 예배 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4">
                            <span class="inline-block px-2.5 py-1 rounded-full text-xs font-bold bg-primary text-white">주일</span>
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-church text-primary mr-2"></i> 주일 예배
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4 font-semibold text-primary">
                            매주 주일 오전 11:00
                        </td>
                    </tr>

                    <!-- 기도회 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4" rowspan="3">
                            <span class="inline-block px-2.5 py-1 rounded-full text-xs font-bold bg-secondary-container text-on-secondary-container">기도회</span>
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-pray text-secondary mr-2"></i> 수요 기도회
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4">
                            매주 수요일 저녁 8:00
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-sun text-secondary mr-2"></i> 월삭 기도회
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4">
                            매월 첫 주 화요일 오전 6:00
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-cloud-sun text-secondary mr-2"></i> 새벽 기도회
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4">
                            매주 화·금 오전 6:00
                        </td>
                    </tr>

                    <!-- 소그룹 / 나눔 -->
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4" rowspan="3">
                            <span class="inline-block px-2.5 py-1 rounded-full text-xs font-bold bg-surface-container text-primary">소그룹</span>
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-users text-primary mr-2"></i> 목장 모임
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4">
                            매주 목요일 오후 6:30
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-user-friends text-primary mr-2"></i> 청년 나눔
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4">
                            매주 주일 오후 1:30
                        </td>
                    </tr>
                    <tr class="hover:bg-surface-container-low/50 transition-colors">
                        <td class="p-4 sm:px-6 sm:py-4 font-bold text-gray-900">
                            <i class="fas fa-book-reader text-primary mr-2"></i> 성경 읽기 (BIBLE TIME)
                        </td>
                        <td class="p-4 sm:px-6 sm:py-4">
                            매주 주일 오후 1:30
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Callout Box -->
    <div class="bg-surface-container-low border-l-4 border-primary rounded-2xl p-6 text-center shadow-soft">
        <p class="text-sm sm:text-base font-semibold text-primary-container leading-relaxed">
            <i class="fas fa-heart text-primary mr-1"></i>
            푸른나무교회의 모든 예배와 모임은 누구에게나 따뜻하게 열려 있습니다. 언제든 편안히 오셔서 함께해 주세요!
        </p>
    </div>

</div>
