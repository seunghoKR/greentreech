<?php
/**
 * 푸른나무교회 A4 2단 접지 (A5 4면 Book-Fold) 고해상도 인쇄 및 PDF 저장 전용 뷰어
 * Sheet 1 (겉면): Page 4 (안내/소개) + Page 1 (표지)
 * Sheet 2 (안쪽): Page 2 (예배순서) + Page 3 (설교메모/소식)
 */

$churchName = $bulletin['church_name'] ?? '푸른나무교회';
$mainSlogan = $bulletin['main_slogan'] ?? '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간';
$bulletinNo = $bulletin['bulletin_no'] ?? '제 2026-34호';
$dateStr = $bulletin['date_str'] ?? date('Y년 m월 d일');
$pastorName = $bulletin['pastor_name'] ?? '심민보';
$phone = $bulletin['phone'] ?? '010-9559-8623';
$address = $bulletin['address'] ?? '전라북도 익산시 선화로73길 25 (3층)';

$sermon = $bulletin['sermon'] ?? [];
$worshipOrder = $bulletin['worship_order'] ?? [];
$news = $bulletin['news'] ?? [];
$memoryVerse = $bulletin['memory_verse'] ?? [];
$servingTeams = $bulletin['serving_teams'] ?? [];
$page4 = $bulletin['page4_info'] ?? [];
$page3 = $bulletin['page3_info'] ?? [];
$theme = $bulletin['template_theme'] ?? 'classic';
$coverImage = $bulletin['cover_image'] ?? '/public/assets/images/sample2.jpg';
$coverText = $bulletin['cover_text'] ?? '지친 마음에 쉼과 회복을 주는 따뜻한 공동체';
$coverSubtext = $bulletin['cover_subtext'] ?? '주 예수의 은혜와 평강이 성도 여러분의 가정과 일터에 넘치기를 소망합니다.';
$coverStyle = $bulletin['cover_style'] ?? 'image_focus';
$coverFrame = $bulletin['cover_frame'] ?? 'rounded';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($churchName) ?> 주보 (<?= htmlspecialchars($dateStr) ?>) - A4 2단 접지</title>
    
    <!-- Pretendard & Noto Serif KR & FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/static/pretendard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+KR:wght@400;600;700;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Pretendard', -apple-system, sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .font-serif-kr {
            font-family: 'Noto Serif KR', serif;
        }

        /* A4 Landscape 2-Fold Sheet Definition */
        .sheet-container {
            width: 297mm;
            min-height: 210mm;
            height: 210mm;
            margin: 20px auto;
            background: white;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-sizing: border-box;
            position: relative;
            page-break-after: always;
            page-break-inside: avoid;
        }

        /* A5 Page (Half of A4 Landscape) */
        .a5-page {
            width: 148.5mm;
            height: 210mm;
            padding: 11mm 11mm;
            box-sizing: border-box;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        /* Fold line guide */
        .fold-divider {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 0;
            border-right: 1px dashed #cbd5e1;
            pointer-events: none;
        }

        /* Note ruling line */
        .note-line {
            border-bottom: 1px dashed #cbd5e1;
            height: 22px;
            width: 100%;
        }

        /* Print Media Styles */
        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }
            body {
                background: white !important;
                padding: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .sheet-container {
                margin: 0 !important;
                box-shadow: none !important;
                border: none !important;
                width: 297mm !important;
                height: 210mm !important;
                page-break-after: always !important;
                page-break-inside: avoid !important;
            }
            .fold-divider {
                border-right: 1px dashed #e2e8f0 !important;
            }
        }
    </style>
</head>
<body class="py-8">

    <!-- Top Floating Control Bar (Screen Only) -->
    <header class="no-print fixed top-4 left-1/2 -translate-x-1/2 z-50 bg-white/95 backdrop-blur-md px-5 py-3 rounded-3xl shadow-2xl border border-gray-200 flex flex-wrap items-center justify-between gap-4 max-w-4xl w-[95%]">
        <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-xl bg-[#154212] text-white flex items-center justify-center font-bold text-sm shadow-xs">
                <i class="fas fa-book-open"></i>
            </span>
            <div>
                <h1 class="text-xs sm:text-sm font-bold text-gray-900">A4 2단 접지 주보 인쇄 시스템</h1>
                <p class="text-[11px] text-gray-500">A4 가로 1장 양면 인쇄 ➔ 반 접으면 A5 4면 소책자 완성</p>
            </div>
        </div>

        <!-- View Switcher & Action Buttons -->
        <div class="flex items-center gap-2">
            <!-- Theme Switcher -->
            <select id="themeSelector" onchange="changeTheme(this.value)" class="px-2.5 py-1.5 rounded-xl border border-gray-300 text-xs font-bold bg-gray-50 focus:ring-2 focus:ring-[#154212]">
                <option value="classic" selected>🌿 푸른나무 클래식</option>
                <option value="modern">💎 모던 에메랄드</option>
                <option value="simple">⬛ 흑백 인쇄 절약모드</option>
            </select>

            <!-- Print Button -->
            <button onclick="window.print()" class="px-4 py-2 bg-[#154212] hover:bg-[#0d2b0b] text-white rounded-xl text-xs font-bold shadow-md hover:shadow-lg transition-all flex items-center gap-1.5">
                <i class="fas fa-print"></i>
                <span>지금 인쇄 / PDF 저장</span>
            </button>

            <button onclick="window.close()" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-bold">
                닫기
            </button>
        </div>
    </header>

    <!-- Guide Notice for User on Screen -->
    <div class="no-print max-w-[297mm] mx-auto mb-4 mt-12 bg-emerald-50 border border-emerald-200 rounded-2xl p-4 flex items-center justify-between text-xs text-emerald-900 shadow-xs">
        <div class="flex items-center gap-2">
            <i class="fas fa-circle-info text-base text-emerald-700"></i>
            <span>
                <strong>인쇄 팁:</strong> 브라우저 인쇄 설정에서 <strong>[용지 방향: 가로]</strong>, <strong>[여백: 없음 또는 기본]</strong>, <strong>[양면 인쇄(짧은 쪽으로 넘김)]</strong>을 선택하시면 완벽하게 출력됩니다.
            </span>
        </div>
        <span class="font-bold text-emerald-800 bg-emerald-100/70 px-2.5 py-1 rounded-full">A4 가로 2단접지 (A5 4면)</span>
    </div>

    <!-- ================================================================= -->
    <!-- SHEET 1 (겉면 / 바깥장): Left = [Page 4: 안내/소개], Right = [Page 1: 표지] -->
    <!-- ================================================================= -->
    <div class="sheet-container" id="sheet1">
        <div class="fold-divider"></div>

        <!-- ------------------------------------------------------------- -->
        <!-- [4면 (좌측)]: 교회 소개 & 예배/모임 안내 & 오시는 길 -->
        <!-- ------------------------------------------------------------- -->
        <div class="a5-page border-r border-gray-100 print:border-none">
            <!-- 4-Page Header -->
            <div>
                <div class="flex items-center justify-between border-b-2 border-[#154212] pb-2 mb-3">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">ABOUT & SCHEDULE</span>
                    <span class="text-[11px] font-bold text-[#154212]">교회 안내 및 오시는 길</span>
                </div>

                <!-- 1. 교회 비전 -->
                <div class="bg-gray-50/80 p-3 rounded-xl border border-gray-200/80 mb-3.5">
                    <h4 class="text-xs font-bold text-[#154212] mb-1 flex items-center gap-1.5">
                        <i class="fas fa-tree"></i> 푸른나무 비전
                    </h4>
                    <p class="text-[11px] text-gray-700 leading-relaxed font-serif-kr">
                        <?= nl2br(htmlspecialchars($page4['vision'] ?? '푸른나무교회는 외롭고 지친 마음에 하나님의 참된 안식을 선물하고, 서로를 깊이 사랑하며 함께 자라나는 믿음의 공동체입니다.')) ?>
                    </p>
                </div>

                <!-- 2. 주간 예배 및 모임 시간표 -->
                <div class="mb-3.5">
                    <h4 class="text-xs font-bold text-gray-900 mb-1.5 flex items-center gap-1.5">
                        <i class="fas fa-clock text-[#154212]"></i> 정기 예배 및 모임 안내
                    </h4>
                    <table class="w-full text-[11px] border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 text-gray-700 font-bold">
                            <tr>
                                <th class="py-1 px-2 text-left">구분</th>
                                <th class="py-1 px-2 text-left">일시 / 시간</th>
                                <th class="py-1 px-2 text-left">장소</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php foreach (($page4['schedules'] ?? []) as $sch): ?>
                            <tr>
                                <td class="py-1 px-2 font-semibold text-gray-900"><?= htmlspecialchars($sch['name']) ?></td>
                                <td class="py-1 px-2 text-gray-700"><?= htmlspecialchars($sch['time']) ?></td>
                                <td class="py-1 px-2 text-gray-500"><?= htmlspecialchars($sch['place']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- 3. 온라인 헌금 안내 -->
                <div class="bg-gray-50 p-2.5 rounded-xl border border-gray-200/80 mb-3 text-[11px]">
                    <div class="flex items-center justify-between mb-0.5">
                        <span class="font-bold text-gray-900"><i class="fas fa-hand-holding-heart text-amber-600 mr-1"></i> 온라인 헌금 계좌</span>
                        <span class="text-gray-500 font-semibold"><?= htmlspecialchars($page4['giving']['bank'] ?? '농협') ?></span>
                    </div>
                    <p class="font-bold text-gray-900 text-xs tracking-wider">
                        <?= htmlspecialchars($page4['giving']['account'] ?? '351-9559-8623-03') ?> 
                        <span class="font-normal text-[10px] text-gray-500">(예금주: <?= htmlspecialchars($page4['giving']['holder'] ?? '푸른나무교회') ?>)</span>
                    </p>
                </div>
            </div>

            <!-- 4-Page Footer: Address & Pastor Info -->
            <div class="border-t border-gray-200 pt-2 text-[10px] text-gray-500 space-y-0.5">
                <p><strong>주소:</strong> <?= htmlspecialchars($address) ?></p>
                <p><strong>담임목사:</strong> <?= htmlspecialchars($pastorName) ?> (<?= htmlspecialchars($phone) ?>)</p>
                <p><strong>홈페이지:</strong> greentreech.iwinv.net | <strong>유튜브:</strong> @greentreechurch0405</p>
                <div class="flex justify-between items-center text-gray-400 pt-1">
                    <span>[4면]</span>
                    <span>푸른나무교회 주보</span>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------- -->
        <!-- [1면 (우측)]: 표지 (Cover Page) -->
        <!-- ------------------------------------------------------------- -->
        <div class="a5-page text-center flex flex-col justify-between">
            
            <!-- Top Section: Header & Church Title -->
            <div>
                <!-- Top Badge & Number -->
                <div class="flex items-center justify-between text-[11px] text-gray-500 border-b border-gray-200 pb-1.5 mb-2.5">
                    <span class="font-bold text-[#154212]"><?= htmlspecialchars($bulletinNo) ?></span>
                    <span><?= htmlspecialchars($dateStr) ?> 주일예배</span>
                </div>

                <!-- Church Main Title & Slogan -->
                <div class="mb-2.5 text-center">
                    <p class="text-[11px] text-gray-500 tracking-widest font-serif-kr mb-0.5">기독교대한침례회</p>
                    <h1 class="font-serif-kr text-2xl sm:text-[26px] font-black text-[#154212] tracking-wider mb-0.5">
                        푸 른 나 무 교 회
                    </h1>
                    <p class="font-serif-kr text-[11px] text-gray-600 italic">
                        "<?= htmlspecialchars($mainSlogan) ?>"
                    </p>
                </div>

                <!-- Church Cover Main Image / Illustration Section -->
                <?php 
                    $frameClass = 'rounded-2xl border border-gray-200 shadow-2xs';
                    if ($coverFrame === 'double_line') {
                        $frameClass = 'rounded-xl border-4 border-double border-[#154212]/40 shadow-xs';
                    } elseif ($coverFrame === 'none') {
                        $frameClass = 'rounded-none border-none';
                    }
                ?>

                <?php if ($coverStyle === 'image_focus' && !empty($coverImage)): ?>
                <!-- 1. 감성 이미지 중심형 (사진 + 따뜻한 메시지) -->
                <div class="my-2">
                    <div class="relative w-full h-[58mm] overflow-hidden <?= $frameClass ?> bg-emerald-50/30 flex items-center justify-center">
                        <img src="<?= htmlspecialchars($coverImage) ?>" alt="주보 표지 이미지" class="w-full h-full object-cover">
                    </div>
                    <?php if (!empty($coverText)): ?>
                    <h3 class="font-serif-kr text-xs font-bold text-[#154212] mt-1.5 tracking-wide">
                        "<?= htmlspecialchars($coverText) ?>"
                    </h3>
                    <?php endif; ?>
                    <?php if (!empty($coverSubtext)): ?>
                    <p class="text-[10px] text-gray-500 mt-0.5 font-medium leading-tight">
                        <?= htmlspecialchars($coverSubtext) ?>
                    </p>
                    <?php endif; ?>
                </div>

                <?php elseif ($coverStyle === 'classic_emblem'): ?>
                <!-- 2. 클래식 엠블럼형 (단정한 십자가 심볼) -->
                <div class="my-3 py-4 px-5 border-y-2 border-[#154212]/30 bg-emerald-50/40 <?= $frameClass ?>">
                    <div class="w-11 h-11 mx-auto rounded-full bg-[#154212] text-white flex items-center justify-center text-lg mb-2 shadow-xs">
                        <i class="fas fa-cross"></i>
                    </div>
                    <h3 class="font-serif-kr text-xs sm:text-sm font-bold text-[#154212]">
                        "<?= htmlspecialchars($coverText) ?>"
                    </h3>
                    <p class="text-[10px] text-gray-500 mt-1">
                        <?= htmlspecialchars($coverSubtext) ?>
                    </p>
                </div>

                <?php else: ?>
                <!-- 3. 심플 말씀/여백 중심형 -->
                <div class="my-3 p-4 bg-emerald-50/30 rounded-2xl border border-emerald-100">
                    <div class="w-8 h-8 mx-auto rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center text-sm mb-2">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="font-serif-kr text-xs sm:text-sm font-bold text-[#154212]">
                        "<?= htmlspecialchars($coverText) ?>"
                    </h3>
                    <p class="text-[10px] text-gray-500 mt-1">
                        <?= htmlspecialchars($coverSubtext) ?>
                    </p>
                </div>
                <?php endif; ?>

                <!-- Memory Verse Box (금주의 말씀) -->
                <?php if (!empty($memoryVerse['verse'])): ?>
                <div class="bg-gray-50/90 border border-gray-200/90 rounded-xl p-2 text-center mt-1.5 shadow-2xs">
                    <span class="text-[9px] font-bold text-emerald-800 uppercase tracking-wider bg-emerald-100/70 px-2 py-0.5 rounded-full inline-block">
                        🌿 금주의 말씀
                    </span>
                    <p class="font-serif-kr text-[11px] font-bold text-gray-900 mt-0.5 leading-snug">
                        <?= htmlspecialchars($memoryVerse['verse']) ?>
                    </p>
                    <?php if (!empty($memoryVerse['reference'])): ?>
                    <p class="text-[10px] text-gray-500 font-semibold">
                        (<?= htmlspecialchars($memoryVerse['reference']) ?>)
                    </p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- 1-Page Footer -->
            <div class="border-t border-gray-200 pt-2 text-[10px] text-gray-500 flex justify-between items-center shrink-0">
                <span>담임목사 <?= htmlspecialchars($pastorName) ?></span>
                <span class="font-bold text-gray-400">[1면 표지]</span>
            </div>

        </div>
    </div>


    <!-- ================================================================= -->
    <!-- SHEET 2 (안쪽면 / 속장): Left = [Page 2: 주일예배], Right = [Page 3: 설교메모/소식] -->
    <!-- ================================================================= -->
    <div class="sheet-container" id="sheet2">
        <div class="fold-divider"></div>

        <!-- ------------------------------------------------------------- -->
        <!-- [2면 (좌측)]: 주일예배 순서 (교회 공식 12순서 양식) -->
        <!-- ------------------------------------------------------------- -->
        <div class="a5-page border-r border-gray-100 print:border-none">
            <div class="flex flex-col justify-between h-full px-2 sm:px-3">
                <div>
                    <!-- 2-Page Header -->
                    <div class="flex items-center justify-between border-b-2 border-[#154212] pb-2 mb-3">
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">ORDER OF WORSHIP</span>
                        <span class="text-[11px] font-bold text-[#154212]">주일 낮 예배 (오전 11:00)</span>
                    </div>

                    <!-- 12대 예배 순서표 (Zebra Striping & Clean Layout) -->
                    <div class="border border-gray-200/80 rounded-2xl overflow-hidden shadow-2xs font-serif-kr">
                        <?php foreach ($worshipOrder as $idx => $item): ?>
                        <?php 
                            $name = trim((string)($item['name'] ?? ''));
                            $content = trim((string)($item['content'] ?? $item['desc'] ?? ''));
                            $lead = trim((string)($item['lead'] ?? ''));
                            $isEven = ($idx % 2 === 1);
                        ?>
                        <div class="flex items-center justify-between px-3 py-1.5 text-xs leading-normal <?= $isEven ? 'bg-[#f4f7f3]/90' : 'bg-white' ?> border-b border-gray-100/60 last:border-b-0">
                            <!-- 좌측: 순서명 -->
                            <span class="font-bold text-gray-950 tracking-wider shrink-0 w-24 whitespace-nowrap">
                                <?= htmlspecialchars($name) ?>
                            </span>

                            <!-- 가운데: 상세 내용 (가운데 정렬) -->
                            <div class="flex-grow px-2 text-center text-[11px] font-semibold text-gray-800 truncate">
                                <?php if (!empty($content)): ?>
                                    <span class="text-[#154212] font-bold"><?= htmlspecialchars($content) ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- 우측: 담당자 / 인도 -->
                            <span class="font-bold text-gray-900 shrink-0 w-24 text-right whitespace-nowrap text-xs">
                                <?= htmlspecialchars($lead) ?>
                            </span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- 2-Page Footer -->
                <div class="border-t border-gray-200 pt-2 text-[10px] text-gray-500 flex justify-between items-center mt-3">
                    <span>* 표는 일어서서 경건히 참여합니다.</span>
                    <span class="font-bold text-gray-400">[2면]</span>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------- -->
        <!-- [3면 (우측)]: 설교 메모 / 알리는 말씀 / 섬김이 / 중보기도 -->
        <!-- ------------------------------------------------------------- -->
        <div class="a5-page">
            <div>
                <!-- 3-Page Header -->
                <div class="flex items-center justify-between border-b-2 border-[#154212] pb-2 mb-3">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">SERMON NOTES & NEWS</span>
                    <span class="text-[11px] font-bold text-[#154212]">설교 메모 및 교회 소식</span>
                </div>

                <!-- 1. 설교 메모 줄칸 (성도 필기용) -->
                <div class="mb-3.5">
                    <h4 class="text-xs font-bold text-gray-900 mb-1 flex items-center justify-between">
                        <span><i class="fas fa-pencil-alt text-[#154212] mr-1"></i> 설교 메모 (Sermon Notes)</span>
                        <span class="text-[9px] text-gray-400 font-normal">말씀을 마음에 새깁니다</span>
                    </h4>
                    <div class="bg-gray-50/40 p-2 rounded-xl border border-gray-200">
                        <?php for ($i = 0; $i < (int)($page3['notes_line_count'] ?? 6); $i++): ?>
                        <div class="note-line"></div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- 2. 알리는 말씀 (교회 소식) -->
                <div class="mb-3">
                    <h4 class="text-xs font-bold text-gray-900 mb-1 flex items-center gap-1.5">
                        <i class="fas fa-bullhorn text-[#154212]"></i> 알리는 말씀
                    </h4>
                    <ul class="text-[11px] text-gray-700 space-y-1">
                        <?php if (!empty($news)): ?>
                            <?php foreach (array_slice($news, 0, 4) as $idx => $n): ?>
                            <li class="flex items-start gap-1.5 leading-tight">
                                <span class="font-bold text-[#154212] shrink-0"><?= $idx + 1 ?>.</span>
                                <div>
                                    <strong><?= htmlspecialchars($n['title']) ?></strong>
                                    <?php if (!empty($n['content'])): ?>
                                    <span class="text-gray-500 line-clamp-1"><?= htmlspecialchars(strip_tags($n['content'])) ?></span>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-gray-400">등록된 교회 소식이 없습니다.</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- 3. 섬기는 사람들 (이번 주 & 다음 주 예고) -->
                <div class="space-y-2 text-[10px]">
                    
                    <!-- 이번 주 섬김이 -->
                    <div class="bg-gray-50/90 p-2 rounded-xl border border-gray-200">
                        <div class="font-bold text-gray-900 mb-1 flex items-center justify-between">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-hands-holding-child text-emerald-700"></i> 이번 주 섬김이
                            </span>
                            <span class="text-[9px] text-gray-400"><?= htmlspecialchars($bulletinNo) ?></span>
                        </div>
                        <div class="grid grid-cols-3 gap-1 text-gray-700">
                            <div><strong>대표기도:</strong> <?= htmlspecialchars($bulletin['current_week_servants']['servants']['prayer'] ?? $servingTeams['대표기도'] ?? '담당자') ?></div>
                            <div><strong>헌금안내:</strong> <?= htmlspecialchars($bulletin['current_week_servants']['servants']['offering'] ?? $servingTeams['헌금안내'] ?? '봉사팀') ?></div>
                            <div><strong>초청/안내:</strong> <?= htmlspecialchars($bulletin['current_week_servants']['servants']['usher'] ?? $servingTeams['초청/안내'] ?? '안내위원') ?></div>
                        </div>
                    </div>

                    <!-- 다음 주 섬김이 예고 -->
                    <?php 
                        $nxt = $bulletin['next_week_servants'] ?? [];
                        $nxtServ = $nxt['servants'] ?? [];
                    ?>
                    <div class="bg-emerald-50/50 p-2 rounded-xl border border-emerald-200/80">
                        <div class="font-bold text-emerald-950 mb-1 flex items-center justify-between">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-calendar-check text-emerald-700"></i> 다음 주 예배 섬김이 예고
                            </span>
                            <span class="text-[9px] text-emerald-800 font-semibold"><?= htmlspecialchars($nxt['formatted_date'] ?? '다음 주일') ?> (<?= htmlspecialchars($nxt['bulletin_no'] ?? '') ?>)</span>
                        </div>
                        <div class="grid grid-cols-3 gap-1 text-emerald-900">
                            <div><strong>대표기도:</strong> <?= htmlspecialchars($nxtServ['prayer'] ?: '예정') ?></div>
                            <div><strong>헌금안내:</strong> <?= htmlspecialchars($nxtServ['offering'] ?: '예정') ?></div>
                            <div><strong>초청/안내:</strong> <?= htmlspecialchars($nxtServ['usher'] ?: '예정') ?></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- 3-Page Footer -->
            <div class="border-t border-gray-200 pt-2 text-[10px] text-gray-500 flex justify-between items-center">
                <span>* 정성된 마음과 기도로 섬김에 동참해 주시기 바랍니다.</span>
                <span class="font-bold text-gray-400">[3면]</span>
            </div>
        </div>

    </div>

    <!-- Script for Dynamic Theme Toggle -->
    <script>
        function changeTheme(theme) {
            const sheet1 = document.getElementById('sheet1');
            const sheet2 = document.getElementById('sheet2');
            if (theme === 'simple') {
                document.body.classList.add('grayscale');
            } else {
                document.body.classList.remove('grayscale');
            }
        }
    </script>
</body>
</html>
