<div class="space-y-8 max-w-6xl mx-auto">
    
    <!-- Top Welcome Header -->
    <div class="bg-gradient-to-r from-[#154212] via-[#20521b] to-[#2d5a27] rounded-3xl p-6 sm:p-10 text-white shadow-card relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
        
        <div class="relative z-10 space-y-3">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 text-xs font-semibold backdrop-blur-sm">
                <i class="fas fa-book-open text-amber-300"></i>
                <span class="text-white">푸른나무교회 공식 가이드북</span>
                <span class="text-white/40">·</span>
                <span class="text-emerald-200">v2.5.0 최신판</span>
            </div>
            
            <h1 class="font-serif-kr text-2xl sm:text-4xl font-bold leading-tight">
                🌿 푸른나무교회 홈페이지 사용 설명서
            </h1>
            
            <p class="text-xs sm:text-sm text-white/85 max-w-2xl leading-relaxed">
                심민보 담임목사님과 교역자, 사역자님들께서 교회의 모든 미디어, 스마트 주보, 4주 섬김이, 성도 소통, 카카오톡 알림을 손쉽고 편리하게 운영하실 수 있도록 친절하게 안내해 드립니다.
            </p>

            <div class="pt-2 flex flex-wrap gap-2.5">
                <button type="button" onclick="window.print()" class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5 backdrop-blur-sm">
                    <i class="fas fa-print"></i> 설명서 인쇄하기
                </button>
                <a href="/admin" class="px-4 py-2 bg-white text-[#154212] hover:bg-gray-100 rounded-2xl text-xs font-bold transition-all shadow-sm flex items-center gap-1.5">
                    <i class="fas fa-arrow-left text-[10px]"></i> 관리자 대시보드 바로가기
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Navigation Index -->
    <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-sm">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4 flex items-center gap-1.5">
            <i class="fas fa-list-ul text-primary"></i> 빠른 바로가기 목차
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 text-xs font-semibold">
            <a href="#routine" class="p-3 rounded-2xl bg-green-50/70 hover:bg-green-100 text-green-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-calendar-check text-green-600"></i>
                <span>1. 주간 사역 루틴</span>
            </a>
            <a href="#bulletin" class="p-3 rounded-2xl bg-blue-50/70 hover:bg-blue-100 text-blue-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-newspaper text-blue-600"></i>
                <span>2. 주일예배 & 주보 기획</span>
            </a>
            <a href="#servants" class="p-3 rounded-2xl bg-emerald-50/70 hover:bg-emerald-100 text-emerald-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-hands-holding-child text-emerald-600"></i>
                <span>3. 4주 섬김이 관리</span>
            </a>
            <a href="#live-banner" class="p-3 rounded-2xl bg-red-50/70 hover:bg-red-100 text-red-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-broadcast-tower text-red-600"></i>
                <span>4. 실시간 생중계 배너</span>
            </a>
            <a href="#youtube" class="p-3 rounded-2xl bg-amber-50/70 hover:bg-amber-100 text-amber-900 flex items-center gap-2 transition-colors">
                <i class="fab fa-youtube text-amber-600"></i>
                <span>5. 유튜브 설교/쇼츠 동기화</span>
            </a>
            <a href="#members" class="p-3 rounded-2xl bg-emerald-50/70 hover:bg-emerald-100 text-emerald-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-user-check text-emerald-600"></i>
                <span>6. 성도 6대 직분 관리</span>
            </a>
            <a href="#notifications" class="p-3 rounded-2xl bg-yellow-50/70 hover:bg-yellow-100 text-yellow-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-bell text-yellow-600"></i>
                <span>7. 카톡 알림 & 환영 메시지</span>
            </a>
            <a href="#admins" class="p-3 rounded-2xl bg-indigo-50/70 hover:bg-indigo-100 text-indigo-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-users-gear text-indigo-600"></i>
                <span>8. 사역자별 권한 분담</span>
            </a>
            <a href="#inquiry" class="p-3 rounded-2xl bg-purple-50/70 hover:bg-purple-100 text-purple-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-heart text-purple-600"></i>
                <span>9. 새가족 & 기도 접수</span>
            </a>
            <a href="#navigation" class="p-3 rounded-2xl bg-teal-50/70 hover:bg-teal-100 text-teal-900 flex items-center gap-2 transition-colors">
                <i class="fas fa-map-location-dot text-teal-600"></i>
                <span>10. 내비 길안내 & 캘리</span>
            </a>
            <a href="#faq" class="p-3 rounded-2xl bg-gray-100 hover:bg-gray-200 text-gray-800 flex items-center gap-2 transition-colors col-span-2 sm:col-span-2">
                <i class="fas fa-question-circle text-gray-600"></i>
                <span>11. 자주 묻는 질문 (FAQ) & 문제 해결</span>
            </a>
        </div>
    </div>

    <!-- Section 1: 주간 목회 사역 4단계 루틴 가이드 -->
    <div id="routine" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-green-100 text-green-700 flex items-center justify-center text-lg font-bold">
                1
            </div>
            <div>
                <span class="text-xs font-bold text-green-700 uppercase tracking-wider">Weekly Routine</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">목회자를 위한 주간 사역 4단계 루틴</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            아래 주간 일정 흐름에 맞춰 홈페이지를 운영하시면 교회의 모든 미디어와 소식이 언제나 성도님들께 최신 상태로 풍성하게 전달됩니다.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <!-- Step 1: 목/금 -->
            <div class="p-5 rounded-3xl bg-gray-50 border border-gray-200/80 space-y-3 relative flex flex-col justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-100 text-blue-800 text-[11px] font-bold">
                        <i class="fas fa-calendar-day"></i> 목 / 금요일
                    </div>
                    <h3 class="font-bold text-sm text-gray-900 mt-2">주일 설교 본문 등록</h3>
                    <p class="text-xs text-gray-600 leading-relaxed mt-1">
                        이번 주 주일예배 설교 제목, 본문 성경구절, 설교 요약/메모를 사전 등록합니다.
                    </p>
                </div>
                <div class="pt-2 border-t border-gray-200/60 text-[11px] text-gray-500 font-semibold">
                    메뉴: <span class="text-primary font-bold">유튜브 영상 분류 & 관리</span>
                </div>
            </div>

            <!-- Step 2: 토요일 -->
            <div class="p-5 rounded-3xl bg-gray-50 border border-gray-200/80 space-y-3 relative flex flex-col justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-purple-100 text-purple-800 text-[11px] font-bold">
                        <i class="fas fa-calendar-day"></i> 토요일
                    </div>
                    <h3 class="font-bold text-sm text-gray-900 mt-2">스마트 주보 & 섬김이 확정</h3>
                    <p class="text-xs text-gray-600 leading-relaxed mt-1">
                        예배 순서, 찬양, 4주 섬김이를 점검하고, A4 인쇄 출력 및 금주 소식을 확정합니다.
                    </p>
                </div>
                <div class="pt-2 border-t border-gray-200/60 text-[11px] text-gray-500 font-semibold">
                    메뉴: <span class="text-primary font-bold">주일예배 & 주보 기획 (담임목사)</span>
                </div>
            </div>

            <!-- Step 3: 주일 오전 -->
            <div class="p-5 rounded-3xl bg-red-50/50 border border-red-200 space-y-3 relative flex flex-col justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-red-100 text-red-800 text-[11px] font-bold">
                        <i class="fas fa-broadcast-tower"></i> 주일 오전 (10:30~12:30)
                    </div>
                    <h3 class="font-bold text-sm text-red-900 mt-2">실시간 생중계 배너 켜기</h3>
                    <p class="text-xs text-red-700/80 leading-relaxed mt-1">
                        대시보드 상단의 <strong>[실시간 중계: ON]</strong>을 눌러 홈페이지 최상단에 라이브 띠배너를 노출합니다.
                    </p>
                </div>
                <div class="pt-2 border-t border-red-200/60 text-[11px] text-red-800 font-semibold">
                    위치: <span class="font-bold">대시보드 상단 원클릭 스위치</span>
                </div>
            </div>

            <!-- Step 4: 월/화요일 -->
            <div class="p-5 rounded-3xl bg-gray-50 border border-gray-200/80 space-y-3 relative flex flex-col justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold">
                        <i class="fas fa-calendar-day"></i> 월 / 화요일
                    </div>
                    <h3 class="font-bold text-sm text-gray-900 mt-2">유튜브 동기화 & 사진첩</h3>
                    <p class="text-xs text-gray-600 leading-relaxed mt-1">
                        유튜브에 업로드된 주일 설교/쇼츠 영상을 <strong>[1초 동기화]</strong>하고 주일 은혜 사진을 올립니다.
                    </p>
                </div>
                <div class="pt-2 border-t border-gray-200/60 text-[11px] text-gray-500 font-semibold">
                    메뉴: <span class="text-primary font-bold">유튜브 동기화 / 사진첩</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 2: 스마트 주보 & A4 인쇄 / AI 문장 다듬기 -->
    <div id="bulletin" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-lg font-bold">
                2
            </div>
            <div>
                <span class="text-xs font-bold text-blue-700 uppercase tracking-wider">Digital & Print Bulletin</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">주일예배 & 온라인 스마트 주보 기획 (담임목사 전용)</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            성도님들이 스마트폰에서 터치 한 번으로 보는 <strong>모바일 스마트 주보</strong>와, 현장 인쇄용 <strong>A4 2단 주보</strong>를 하나의 관리 화면에서 기획하고 발행합니다.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 space-y-2.5">
                <div class="font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-print text-primary"></i> A4 인쇄용 출력 페이지
                </div>
                <p class="text-gray-600 leading-relaxed">
                    <code>/bulletin/print</code> 경로로 접속하시면 테두리 여백과 폰트 크기가 오프라인 인쇄에 딱 맞게 정돈된 A4 2단 주보가 열리며, 브라우저 인쇄 버튼으로 바로 출력하실 수 있습니다.
                </p>
                <a href="/bulletin/print" target="_blank" class="inline-flex items-center gap-1 text-primary font-bold hover:underline text-xs">
                    <span>A4 인쇄 화면 미리보기</span> →
                </a>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 space-y-2.5">
                <div class="font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-magic text-purple-600"></i> AI 목회 문장 다듬기 기능
                </div>
                <p class="text-gray-600 leading-relaxed">
                    주보 소식이나 목회 칼럼을 작성하실 때 내용 입력 후 <strong>[AI 문장 다듬기]</strong> 버튼을 누르시면 목회적이고 은혜로운 어조로 문맥을 자동 교정해 드립니다.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 3: 4주 섬김이 로테이션 관리 -->
    <div id="servants" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg font-bold">
                3
            </div>
            <div>
                <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Worship Servants</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">예배 순서 섬김이 (4주 로테이션 관리 · 담임목사 전용)</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            기도, 헌금, 안내, 친교식사 등 4주 순환 섬김이 일정을 사전에 미리 입력해 두시면, 매주 주보 및 예배 순서표에 해당 주차의 봉사위원 성함이 자동으로 연동되어 표시됩니다.
        </p>

        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-xs sm:text-sm text-emerald-900 leading-relaxed space-y-2">
            <div class="font-bold flex items-center gap-2">
                <i class="fas fa-circle-check text-emerald-600"></i> 주요 특징 및 혜택:
            </div>
            <ul class="list-disc list-inside space-y-1 text-emerald-800">
                <li>1주차 ~ 4주차 봉사위원을 한 화면에서 4주 단위로 일괄 기획</li>
                <li>주일예배 순서표와 스마트 주보에 이번 주차 섬김이가 실시간 자동 반영</li>
                <li>오프라인 주보 인쇄 시에도 최신 섬김이 명단이 자동으로 반영되어 누락 방지</li>
            </ul>
        </div>
    </div>

    <!-- Section 4: 주일예배 실시간 생중계 띠배너 제어 -->
    <div id="live-banner" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-lg font-bold">
                4
            </div>
            <div>
                <span class="text-xs font-bold text-red-600 uppercase tracking-wider">Live Broadcast Control</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">주일예배 실시간 생중계 띠배너 제어 (담임목사 전용)</h2>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-red-50 border border-red-100 text-xs sm:text-sm text-red-900 leading-relaxed flex items-start gap-3">
            <i class="fas fa-info-circle text-red-500 text-base mt-0.5 shrink-0"></i>
            <div>
                <strong>생중계 배너 기능이란?</strong><br>
                주일예배 시간에 성도님들이 홈페이지에 접속했을 때 최상단에 붉은색 <em>"🔴 지금은 푸른나무교회 주일예배 실시간 생중계 시간입니다"</em> 알림 띠배너를 띄워 유튜브 라이브 방송 시청을 유도하는 기능입니다.
            </div>
        </div>

        <div class="space-y-3 text-xs sm:text-sm text-gray-700">
            <div class="flex items-center gap-2 font-bold text-gray-900">
                <i class="fas fa-toggle-on text-primary text-base"></i>
                <span>사용 방법 (원클릭 토글 스위치)</span>
            </div>
            <ol class="list-decimal list-inside space-y-2 pl-2 text-gray-600 leading-relaxed">
                <li>관리자 대시보드 메인 우측 상단의 <strong>[실시간 중계: ON / OFF]</strong> 버튼을 클릭합니다.</li>
                <li><strong>ON 상태</strong>일 때는 버튼이 붉은색으로 깜빡이며 홈페이지 최상단에 라이브 띠배너가 활성화됩니다.</li>
                <li>예배가 끝난 후 다시 클릭하면 <strong>OFF 상태</strong>로 안전하게 전환됩니다.</li>
            </ol>
        </div>
    </div>

    <!-- Section 5: 유튜브 영상 & 쇼츠 1초 동기화 -->
    <div id="youtube" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-lg font-bold">
                5
            </div>
            <div>
                <span class="text-xs font-bold text-amber-700 uppercase tracking-wider">YouTube Auto Sync</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">유튜브 공식 채널(@greentreechurch0405) 실시간 동기화 & 분류</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            복잡하게 홈페이지에 동영상을 직접 업로드하실 필요가 없습니다. 교회 공식 유튜브 채널에 설교나 쇼츠 영상을 올리신 후, 버튼 한 번만 클릭하시면 됩니다!
        </p>

        <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-xs sm:text-sm text-amber-900 leading-relaxed flex items-start gap-3">
            <i class="fab fa-youtube text-red-600 text-xl shrink-0 mt-0.5"></i>
            <div>
                <strong>[유튜브 영상 동기화] 버튼 하나로 자동 처리되는 일:</strong>
                <ul class="list-disc list-inside mt-1.5 space-y-1 text-amber-800">
                    <li><strong>안전한 신규 영상 전용 수집</strong>: 채널에 <strong>새로 올라온 영상만 선별하여 등록</strong>하며, 기존에 가져와서 제목/본문/카테고리를 수정한 영상 데이터는 <strong>절대 덮어쓰거나 초기화되지 않고 100% 안전하게 보존</strong>됩니다.</li>
                    <li><strong>주일설교말씀</strong>은 설교 아카이브 메뉴(<code>/sermons</code>)로 깔끔하게 분리되어 성경 본문/요약과 함께 표시</li>
                    <li>가로 영상(16:9)과 세로 영상(9:16 쇼츠)을 자동 감지하여 <strong>5대 카테고리</strong>(주일 설교, 말씀 쇼츠, 식탁교제 쇼츠, 간증, 행사/찬양)로 스마트 자동 분류</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Section 6: 성도 회원 6대 직분 관리 -->
    <div id="members" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg font-bold">
                6
            </div>
            <div>
                <span class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Member Roles & Profile</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">성도 회원 6대 직분 체계 & 회원 정보 관리</h2>
            </div>
        </div>

        <div class="space-y-3 text-xs sm:text-sm text-gray-700 leading-relaxed">
            <p>
                푸른나무교회의 성도 직분은 명확하고 일관된 <strong>6대 직분 체계</strong>로 표준화되어 있습니다.
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-6 gap-2 text-center text-xs font-bold">
                <div class="p-3 bg-green-50 border border-green-200 rounded-2xl text-green-800">1. 푸른나무가족<br><span class="text-[10px] font-normal text-green-600">(기본 등록성도)</span></div>
                <div class="p-3 bg-blue-50 border border-blue-200 rounded-2xl text-blue-800">2. 청년<br><span class="text-[10px] font-normal text-blue-600">(청년부 교우)</span></div>
                <div class="p-3 bg-amber-50 border border-amber-200 rounded-2xl text-amber-800">3. 집사<br><span class="text-[10px] font-normal text-amber-600">(서리/봉사 집사)</span></div>
                <div class="p-3 bg-purple-50 border border-purple-200 rounded-2xl text-purple-800">4. 권사<br><span class="text-[10px] font-normal text-purple-600">(기도/섬김 권사)</span></div>
                <div class="p-3 bg-indigo-50 border border-indigo-200 rounded-2xl text-indigo-800">5. 안수집사<br><span class="text-[10px] font-normal text-indigo-600">(안수/중직자)</span></div>
                <div class="p-3 bg-emerald-50 border border-emerald-300 rounded-2xl text-emerald-900">6. 담임목사<br><span class="text-[10px] font-normal text-emerald-700">(교회 총괄 관리)</span></div>
            </div>

            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200 space-y-2">
                <div class="font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-user-edit text-primary"></i> 회원 정보 수정 및 직분 지정:
                </div>
                <ol class="list-decimal list-inside space-y-1.5 pl-1 text-gray-600">
                    <li><strong>[성도 회원 관리]</strong>에서 해당 성도님의 <strong>[수정]</strong> 버튼을 누릅니다.</li>
                    <li><strong>성함(실명)</strong>과 <strong>활동 닉네임</strong>은 필수 항목으로 관리되며, <strong>카카오 이메일</strong>은 자동 연동되어 프리필됩니다.</li>
                    <li>직분 드롭다운에서 6대 직분 중 하나를 선택 후 저장하시면 나눔터 및 교우 명부에 즉시 반영됩니다.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Section 7: 카카오톡 알림 센터 & 첫 로그인 환영 메시지 -->
    <div id="notifications" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-yellow-100 text-yellow-700 flex items-center justify-center text-lg font-bold">
                7
            </div>
            <div>
                <span class="text-xs font-bold text-yellow-700 uppercase tracking-wider">KakaoTalk Notification Center</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">카카오톡 실시간 알림 센터 & 첫 로그인 성도 자동 환영 메시지</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            성도 나눔터 새 글/댓글 및 새가족 접수 실시간 알림은 물론, <strong>카카오톡으로 처음 로그인한 성도님께 담임목사님의 따뜻한 환영 인사 메시지가 자동으로 발송</strong>됩니다.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
            <div class="p-5 rounded-2xl bg-yellow-50/70 border border-yellow-200 space-y-2.5">
                <div class="font-bold text-yellow-900 flex items-center gap-2">
                    <i class="fas fa-envelope-open-text text-amber-600"></i> 자동 환영 메시지 기획 & 문구 편집
                </div>
                <p class="text-yellow-800 leading-relaxed">
                    <code>/admin/notifications</code> 메뉴에서 자동 발송 ON/OFF 토글, 스마트 치환 태그(<code>{name}</code>, <code>{pastor_name}</code>, <code>{worship_sunday}</code>, <code>{address}</code>), 그리고 <strong>카카오톡 수신 화면 실시간 미리보기</strong>를 통해 환영 문구를 자유롭게 수정 및 저장하실 수 있습니다.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 space-y-2.5">
                <div class="font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-list-check text-emerald-600"></i> 실시간 발송 내역 & 로깅
                </div>
                <p class="text-gray-600 leading-relaxed">
                    나눔터 댓글 알림, 새가족 접수 알림, 첫 로그인 환영 메시지 등 시스템에서 발송된 모든 카카오톡 알림이 발송 일시, 수신자, 결과 상태와 함께 투명하게 기록됩니다.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 8: 사역자별 세분화 권한 관리 -->
    <div id="admins" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-lg font-bold">
                8
            </div>
            <div>
                <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider">Admin Permissions</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">관리자 / 사역자별 세분화 권한 관리 (담임목사 전용)</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            사역자님마다 담당하시는 사역 분야에 맞춰 필요한 메뉴에만 접근할 수 있도록 권한을 세분화하여 안전하게 분담할 수 있습니다.
        </p>

        <div class="p-4 rounded-2xl bg-indigo-50/70 border border-indigo-200 text-xs sm:text-sm text-indigo-900 leading-relaxed space-y-2">
            <div class="font-bold flex items-center gap-2">
                <i class="fas fa-shield-halved text-indigo-600"></i> 사역 분야별 개별 권한 옵션:
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 pt-1 text-xs">
                <div class="p-2.5 bg-white rounded-xl border border-indigo-100 font-semibold text-gray-800">📺 유튜브 영상 및 설교 관리</div>
                <div class="p-2.5 bg-white rounded-xl border border-indigo-100 font-semibold text-gray-800">📢 알리는 소식 (공지사항) 관리</div>
                <div class="p-2.5 bg-white rounded-xl border border-indigo-100 font-semibold text-gray-800">📸 사진첩 & 말씀 캘리 관리</div>
                <div class="p-2.5 bg-white rounded-xl border border-indigo-100 font-semibold text-gray-800">💬 성도 나눔터 게시글 관리</div>
                <div class="p-2.5 bg-white rounded-xl border border-indigo-100 font-semibold text-gray-800">💌 새가족 & 중보기도 접수</div>
                <div class="p-2.5 bg-white rounded-xl border border-indigo-100 font-semibold text-gray-800">👥 성도 회원 직분 관리</div>
            </div>
            <p class="text-[11px] text-indigo-700 pt-1">
                * 주일예배/온라인주보 기획, 4주 섬김이, 실시간 중계 배너, 사역자 권한 설정은 심민보 담임목사님 전용으로 안전하게 보호됩니다.
            </p>
        </div>
    </div>

    <!-- Section 9: 새가족 등록 및 온라인 기도/상담 접수 -->
    <div id="inquiry" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-lg font-bold">
                9
            </div>
            <div>
                <span class="text-xs font-bold text-purple-700 uppercase tracking-wider">New Family & Prayer Care</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">새가족 등록 & 온라인 중보기도 접수 관리</h2>
            </div>
        </div>

        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
            성도님들과 방문자분들이 홈페이지 <code>/inquiry</code> 페이지를 통해 등록한 새가족 신청 및 중보기도/상담 요청을 안전하게 목회적으로 돌봅니다.
        </p>

        <div class="space-y-2 text-xs sm:text-sm text-gray-700">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div class="p-4 rounded-2xl bg-red-50 border border-red-100">
                    <span class="text-xs font-bold text-red-700 block">1단계 [접수]</span>
                    <p class="text-xs text-red-900 mt-1">새로운 신청이 들어오면 대시보드 상단 알림에 붉은색 숫자로 표시됩니다.</p>
                </div>
                <div class="p-4 rounded-2xl bg-amber-50 border border-amber-100">
                    <span class="text-xs font-bold text-amber-700 block">2단계 [연락 및 기도]</span>
                    <p class="text-xs text-amber-900 mt-1">신청자의 연락처로 심방 전화를 드리거나 중보기도를 진행합니다.</p>
                </div>
                <div class="p-4 rounded-2xl bg-green-50 border border-green-100">
                    <span class="text-xs font-bold text-green-700 block">3단계 [완료 & 메모]</span>
                    <p class="text-xs text-green-900 mt-1">상태를 '답변/심방완료'로 변경하고 목회 심방 메모를 남겨 기록합니다.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 10: 3대 스마트 내비게이션 & 말씀 캘리 -->
    <div id="navigation" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center text-lg font-bold">
                10
            </div>
            <div>
                <span class="text-xs font-bold text-teal-700 uppercase tracking-wider">Navigation & Media</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">3대 스마트 내비게이션 연동 길안내 & 말씀 캘리</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 space-y-2">
                <div class="font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-location-dot text-primary"></i> 3대 내비게이션 원클릭 길안내
                </div>
                <p class="text-gray-600 leading-relaxed">
                    교회 찾아오시는 길(<code>/about/location</code>)에서 <strong>카카오내비, 티맵(TMAP), 네이버지도</strong> 앱이 스마트폰에서 원클릭으로 바로 실행되어 길안내를 시작합니다.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 space-y-2">
                <div class="font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-mobile-screen text-amber-600"></i> 스마트폰 말씀 캘리 배경화면
                </div>
                <p class="text-gray-600 leading-relaxed">
                    사진첩/캘리(<code>/gallery</code>) 메뉴에 등록된 아름다운 말씀 캘리그라피 이미지를 성도님들이 스마트폰 배경화면으로 원터치 다운로드하실 수 있습니다.
                </p>
            </div>
        </div>
    </div>

    <!-- Section 11: 자주 묻는 질문 (FAQ) -->
    <div id="faq" class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-200 shadow-sm space-y-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-gray-100 text-gray-700 flex items-center justify-center text-lg font-bold">
                11
            </div>
            <div>
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">FAQ & Troubleshooting</span>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900">자주 묻는 질문 & 문제 해결 가이드</h2>
            </div>
        </div>

        <div class="space-y-4">
            
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 space-y-2">
                <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <span class="text-primary font-black">Q.</span> 유튜브에 새 설교나 쇼츠를 올렸는데 홈페이지에 아직 안 보여요!
                </h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-5">
                    <strong>A.</strong> 대시보드나 영상 목록 페이지에서 <strong>[유튜브 영상 동기화]</strong> 버튼을 1회 클릭해 주세요. 즉시 유튜브 서버와 통신하여 1초 만에 최신 영상 목록으로 업데이트됩니다.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 space-y-2">
                <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <span class="text-primary font-black">Q.</span> 주보를 종이로 출력해서 인쇄하고 싶어요.
                </h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-5">
                    <strong>A.</strong> 관리자 대시보드나 주보 페이지에서 <strong>[온라인 주보 > PDF/인쇄]</strong> 또는 주소창에 <code>/bulletin/print</code>를 입력하시면 깔끔한 A4 2단 규격으로 인쇄하실 수 있습니다.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 space-y-2">
                <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <span class="text-primary font-black">Q.</span> 부교역자나 담당 성도님께 관리자 권한을 나눠주고 싶어요.
                </h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-5">
                    <strong>A.</strong> <strong>[관리자/사역자 권한]</strong> 메뉴에서 새 관리자 아이디를 생성하고, 주보만 관리할 수 있는 권한이나 사진첩만 관리할 수 있는 권한을 선택하여 부여하실 수 있습니다.
                </p>
            </div>

            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 space-y-2">
                <h3 class="font-bold text-sm text-gray-900 flex items-center gap-2">
                    <span class="text-primary font-black">Q.</span> 카카오 API 연동 설정 메뉴는 어디에 있나요?
                </h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed pl-5">
                    <strong>A.</strong> 카카오 REST API 키 및 인증 관련 메뉴는 안전한 운영을 위해 <strong>시스템 개발자 전용 메뉴로 격리</strong>되어 있습니다. 일반 목회 운영 중에는 신경 쓰지 않으셔도 안전하게 자동 동작합니다.
                </p>
            </div>

        </div>
    </div>

    <!-- Bottom Footer Card -->
    <div class="bg-gray-100 rounded-3xl p-6 text-center text-xs text-gray-500 space-y-2">
        <p class="font-bold text-gray-700">🌿 푸른나무교회 목회 지원 웹 시스템</p>
        <p>문의 및 유지보수 지원: 담임목사 심민보 | 제작 및 솔루션: 누리오 (Nurio)</p>
    </div>

</div>
