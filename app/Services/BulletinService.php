<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Sermon;
use App\Models\Notice;
use App\Models\Setting;

class BulletinService
{
    /**
     * 이번 주 주보 데이터 자동 취합 및 생성
     */
    public static function generateCurrentWeekBulletin(): array
    {
        // 1. 이번 주 주일 날짜 계산 (가장 가까운 이번 주 주일 또는 지난 주일)
        $today = new \DateTime();
        $dayOfWeek = (int)$today->format('w'); // 0: Sunday
        $sundayDate = clone $today;
        if ($dayOfWeek !== 0) {
            $sundayDate->modify('next Sunday');
            if ($dayOfWeek < 4) {
                $sundayDate = clone $today;
                $sundayDate->modify('last Sunday');
            }
        }
        $formattedDate = $sundayDate->format('Y년 m월 d일');
        $rawDate = $sundayDate->format('Y-m-d');

        // 2. 최신 주일 설교 데이터 가져오기 (관리자 기획 설정 우선)
        $savedSermon = Setting::get('bulletin_sermon_plan', '');
        $customSermon = !empty($savedSermon) ? json_decode($savedSermon, true) : null;

        $latestSermon = $customSermon ?: (Sermon::getLatest() ?? [
            'title' => '그리스도 안에서 누리는 참된 쉼과 회복',
            'preacher' => '심민보 목사',
            'scripture' => '마태복음 11:28-30',
            'content' => '수고하고 무거운 짐 진 자들아 다 내게로 오라 내가 너희를 쉬게 하리라.',
        ]);

        // 3. 주일(일요일) 게시일 기준 알리는 소식 가져오기 (해당 주일 일치 우선 -> 일요일 게시물 우선 -> 최근 게시물)
        $latestNotice = Notice::getNoticeForSunday($rawDate);
        $churchNews = [];

        if ($latestNotice) {
            $rawContent = trim((string)$latestNotice['content']);
            // HTML 태그 제거 및 텍스트 정리
            $plainContent = strip_tags(str_replace(['<br>', '<br/>', '<br />', '</p>', '</div>'], "\n", $rawContent));
            $lines = preg_split('/\r\n|\r|\n/', $plainContent);
            $currentSectionTitle = '';
            $currentSectionBody = [];

            foreach ($lines as $line) {
                $trimmed = trim($line);
                if (empty($trimmed)) continue;

                // 개요 번호 또는 대제목 패턴 감지:
                // 1. 또는 1) 또는 ①~⑩ 또는 [제목] 또는 【제목】 또는 ## 제목
                if (preg_match('/^(?:[0-9]+[\.\)]\s*|[①-⑩]\s*|\[.+\]|【.+】|#{1,3}\s+)(.+)$/u', $trimmed, $matches)) {
                    if (!empty($currentSectionTitle) || !empty($currentSectionBody)) {
                        $churchNews[] = [
                            'category' => '알리는소식',
                            'title' => !empty($currentSectionTitle) ? $currentSectionTitle : $latestNotice['title'],
                            'content' => implode("\n", $currentSectionBody),
                        ];
                        $currentSectionBody = [];
                    }
                    $currentSectionTitle = $trimmed;
                } else {
                    if (empty($currentSectionTitle)) {
                        $currentSectionTitle = $latestNotice['title'];
                    }
                    $currentSectionBody[] = $trimmed;
                }
            }

            if (!empty($currentSectionTitle) || !empty($currentSectionBody)) {
                $churchNews[] = [
                    'category' => '알리는소식',
                    'title' => !empty($currentSectionTitle) ? $currentSectionTitle : $latestNotice['title'],
                    'content' => implode("\n", $currentSectionBody),
                ];
            }
        }

        if (empty($churchNews)) {
            $churchNews = [
                [
                    'category' => '알리는소식',
                    'title' => '1. 주일 예배 및 모임 안내',
                    'content' => "매주 주일 오전 11시에 본당에서 은혜로운 예배가 드려집니다.\n예배 후 따뜻한 애찬 교제가 준비되어 있습니다.",
                ],
                [
                    'category' => '알리는소식',
                    'title' => '2. 푸른나무교회 새가족 환영',
                    'content' => "오늘 처음 교회를 방문해 주신 성도님들을 주님의 이름으로 진심으로 환영하고 축복합니다.",
                ],
                [
                    'category' => '알리는소식',
                    'title' => '3. 교우 동정과 중보기도',
                    'content' => "환우 성도님들의 빠른 회복과 가정의 평안을 위해 함께 마음 모아 기도해 주시기 바랍니다.",
                ]
            ];
        }

        // 4. 주일예배 순서표 (Order of Worship) - 관리자 기획 설정 우선
        $savedOrder = Setting::get('bulletin_worship_order', '');
        $customOrder = !empty($savedOrder) ? json_decode($savedOrder, true) : null;

        // 이번 주 및 다음 주 예배 순서 섬김이 스케줄 로드
        $currentServantsInfo = \App\Models\WorshipServant::getCurrentWeekServants();
        $nextServantsInfo = \App\Models\WorshipServant::getNextWeekServants();
        $curServants = $currentServantsInfo['servants'] ?? [];
        $nxtServants = $nextServantsInfo['servants'] ?? [];

        $defaultScripture = !empty($latestSermon['scripture']) ? "< {$latestSermon['scripture']} >" : '< 다니엘 6장 1-5절 >';
        $defaultSermonTitle = !empty($latestSermon['title']) ? "< “{$latestSermon['title']}” >" : '< “마음이 민첩하여” >';
        $defaultPreacher = !empty($latestSermon['preacher']) ? $latestSermon['preacher'] : '심 민 보 목 사';
        $defaultPrayer = !empty($curServants['prayer']) ? $curServants['prayer'] : '한 영 숙 권 사';

        $defaultOrder = [
            ['order' => '1', 'name' => '묵 상 기 도', 'content' => '', 'lead' => '다 같 이'],
            ['order' => '2', 'name' => '예 배 부 름', 'content' => '', 'lead' => '다 같 이'],
            ['order' => '3', 'name' => '경 배 찬 송', 'content' => '채워주소서, 마음이 상한 자를', 'lead' => '다 같 이'],
            ['order' => '4', 'name' => '교 독 문', 'content' => '< 36 시편 90편 / 주기도문 >', 'lead' => '다 같 이'],
            ['order' => '5', 'name' => '찬 양', 'content' => '< 찬 93장 예수는 나의 힘이요 >', 'lead' => '다 같 이'],
            ['order' => '6', 'name' => '대 표 기 도', 'content' => '', 'lead' => $defaultPrayer],
            ['order' => '7', 'name' => '본 문', 'content' => $defaultScripture, 'lead' => '다 같 이'],
            ['order' => '8', 'name' => '제 목', 'content' => $defaultSermonTitle, 'lead' => $defaultPreacher],
            ['order' => '9', 'name' => '하나님과의 만남', 'content' => '', 'lead' => '다 같 이'],
            ['order' => '10', 'name' => '찬 양', 'content' => '< 축복합니다 >', 'lead' => '다 같 이'],
            ['order' => '11', 'name' => '봉 헌 기 도', 'content' => '', 'lead' => '인 도 자'],
            ['order' => '12', 'name' => '축 도', 'content' => '', 'lead' => '심 민 보 목 사'],
        ];

        // 저장된 순서가 있으면 매핑 및 호환성 보장 (desc -> content)
        if ($customOrder && is_array($customOrder) && count($customOrder) >= 8) {
            $orderOfWorship = [];
            foreach ($customOrder as $i => $item) {
                $orderOfWorship[] = [
                    'order' => (string)($item['order'] ?? ($i + 1)),
                    'name' => trim((string)($item['name'] ?? '')),
                    'content' => trim((string)($item['content'] ?? $item['desc'] ?? '')),
                    'lead' => trim((string)($item['lead'] ?? '')),
                ];
            }
        } else {
            $orderOfWorship = $defaultOrder;
        }

        // 설교 제목/본문/설교자 및 섬김이 정보 자동 보정 및 동기화
        foreach ($orderOfWorship as &$oItem) {
            $cleanName = str_replace(' ', '', $oItem['name']);

            // 1. 대표기도자 동기화
            if ($cleanName === '대표기도' && !empty($curServants['prayer']) && (empty($oItem['lead']) || $oItem['lead'] === '담당자' || $oItem['lead'] === '다같이' || $oItem['lead'] === '다 같이')) {
                $oItem['lead'] = $curServants['prayer'];
            }

            // 2. 본문 성경구절 동기화
            if ($cleanName === '본문' && !empty($latestSermon['scripture'])) {
                $rawScripture = trim($latestSermon['scripture']);
                $oItem['content'] = (str_starts_with($rawScripture, '<') && str_ends_with($rawScripture, '>'))
                    ? $rawScripture
                    : "< {$rawScripture} >";
            }

            // 3. 설교 제목 및 설교자 동기화
            if ($cleanName === '제목') {
                if (!empty($latestSermon['title'])) {
                    $rawT = trim($latestSermon['title'], "<>“\"' ");
                    $oItem['content'] = "< “{$rawT}” >";
                }
                if (!empty($latestSermon['preacher'])) {
                    $oItem['lead'] = $latestSermon['preacher'];
                }
            }

            // 4. 축도 인도자 동기화
            if ($cleanName === '축도' && !empty($latestSermon['preacher']) && (empty($oItem['lead']) || $oItem['lead'] === '목회자')) {
                $oItem['lead'] = $latestSermon['preacher'];
            }
        }
        unset($oItem);

        // 5. 기본 교회 설정
        $churchName = Setting::get('site_name', '푸른나무교회');
        $pastorName = Setting::get('pastor_name', '심민보');
        $phone = Setting::get('phone', '010-9559-8623');
        $address = Setting::get('address', '전라북도 익산시 선화로73길 25 (3층)');
        $mainSlogan = Setting::get('main_slogan', '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간');

        // 6. 암송 구절 및 섬김이
        $savedVerse = Setting::get('bulletin_memory_verse', '');
        $customVerse = !empty($savedVerse) ? json_decode($savedVerse, true) : null;
        $memoryVerse = $customVerse ?: [
            'verse' => '“수고하고 무거운 짐 진 자들아 다 내게로 오라 내가 너희를 쉬게 하리라”',
            'reference' => '마태복음 11장 28절'
        ];

        $savedTeams = Setting::get('bulletin_serving_teams', '');
        $customTeams = !empty($savedTeams) ? json_decode($savedTeams, true) : null;
        $servingTeams = $customTeams ?: [
            '예배인도' => '심민보 목사',
            '대표기도' => !empty($curServants['prayer']) ? $curServants['prayer'] : '담당 성도',
            '헌금안내' => !empty($curServants['offering']) ? $curServants['offering'] : '섬김 봉사팀',
            '초청/안내' => !empty($curServants['usher']) ? $curServants['usher'] : '안내 위원',
            '반주/찬양' => '푸른나무 찬양팀',
            '식사(애찬)' => '푸른나무 애찬팀'
        ];

        // 섬김이 3대 항목 최신 스케줄 반영
        if (!empty($curServants['prayer'])) $servingTeams['대표기도'] = $curServants['prayer'];
        if (!empty($curServants['offering'])) $servingTeams['헌금안내'] = $curServants['offering'];
        if (!empty($curServants['usher'])) $servingTeams['초청/안내'] = $curServants['usher'];

        // 7. [4면 전용] 교회 소개 & 예배/모임 시간표 & 계좌 안내
        $savedAbout = Setting::get('bulletin_page4_info', '');
        $customAbout = !empty($savedAbout) ? json_decode($savedAbout, true) : null;
        $defaultBank = Setting::get('bank_name', '농협은행');
        $defaultAccount = Setting::get('bank_account', '351-9559-8623-03');
        $defaultHolder = Setting::get('bank_holder', '푸른나무교회');

        $page4Info = $customAbout ?: [
            'vision' => '푸른나무교회는 외롭고 지친 마음에 하나님의 참된 안식을 선물하고, 서로를 깊이 사랑하며 함께 자라나는 믿음의 공동체입니다.',
            'schedules' => [
                ['name' => '주일 대예배', 'time' => '매주 주일 오전 11:00', 'place' => '본당 (3층)'],
                ['name' => '청년 BIBLE TIME', 'time' => '매주 주일 오후 01:30', 'place' => '소그룹실'],
                ['name' => '수요 말씀/기도회', 'time' => '매주 수요일 저녁 07:30', 'place' => '본당 / 온라인'],
                ['name' => '새벽 기도회', 'time' => '월~금 오전 06:00', 'place' => '본당'],
            ],
            'giving' => [
                'bank' => $defaultBank,
                'account' => $defaultAccount,
                'holder' => $defaultHolder,
            ],
            'parking' => '교회 건물 전면 및 인근 공영주차장 이용 가능',
        ];

        // 8. [3면 전용] 기도제목 및 설교 메모 설정
        $savedPage3 = Setting::get('bulletin_page3_info', '');
        $customPage3 = !empty($savedPage3) ? json_decode($savedPage3, true) : null;
        $page3Info = $customPage3 ?: [
            'prayers' => [
                '몸과 마음이 지친 성도들에게 하나님의 참된 평안과 치유가 임하도록',
                '푸른나무 공동체가 이웃에게 그리스도의 향기와 사랑을 흘려보내도록',
                '청년부와 다음 세대가 말씀 위에 굳게 서서 시대를 분별하는 주역이 되도록',
            ],
            'notes_line_count' => 7,
        ];

        // 9. 템플릿 테마 (classic / modern / simple_bw)
        $templateTheme = Setting::get('bulletin_template_theme', 'classic');

        // 10. [1면 전용] 표지 이미지 및 표지 문구/스타일 설정
        $coverImage = Setting::get('bulletin_cover_image', '/public/assets/images/sample2.jpg');
        $coverText = Setting::get('bulletin_cover_text', '지친 마음에 쉼과 회복을 주는 따뜻한 공동체');
        $coverSubtext = Setting::get('bulletin_cover_subtext', '주 예수의 은혜와 평강이 성도 여러분의 가정과 일터에 넘치기를 소망합니다.');
        $coverStyle = Setting::get('bulletin_cover_style', 'image_focus');
        $coverFrame = Setting::get('bulletin_cover_frame', 'rounded');

        return [
            'bulletin_no' => '제 ' . $sundayDate->format('Y') . '-' . $sundayDate->format('W') . '호',
            'date_str' => $formattedDate,
            'raw_date' => $rawDate,
            'church_name' => $churchName,
            'pastor_name' => $pastorName,
            'phone' => $phone,
            'address' => $address,
            'main_slogan' => $mainSlogan,
            'sermon' => $latestSermon,
            'worship_order' => $orderOfWorship,
            'news' => $churchNews,
            'memory_verse' => $memoryVerse,
            'serving_teams' => $servingTeams,
            'page4_info' => $page4Info,
            'page3_info' => $page3Info,
            'template_theme' => $templateTheme,
            'cover_image' => $coverImage,
            'cover_text' => $coverText,
            'cover_subtext' => $coverSubtext,
            'cover_style' => $coverStyle,
            'cover_frame' => $coverFrame,
            'cover_presets' => self::getCoverPresets(),
            'current_week_servants' => $currentServantsInfo,
            'next_week_servants' => $nextServantsInfo,
        ];
    }

    /**
     * 표지 이미지 프리셋 5개 목록 가져오기
     */
    public static function getCoverPresets(): array
    {
        $raw = Setting::get('bulletin_cover_presets', '');
        $presets = [];
        if (!empty($raw)) {
            $presets = json_decode($raw, true) ?: [];
        }

        $defaultSlots = [
            ['id' => 1, 'name' => '십자가 / 교회 전경', 'image' => '/public/assets/images/sample2.jpg'],
            ['id' => 2, 'name' => '푸른나무 심볼 마크', 'image' => '/public/assets/images/logo-tree.png'],
            ['id' => 3, 'name' => '성경과 묵상 일러스트', 'image' => '/public/assets/images/sample1.jpg'],
            ['id' => 4, 'name' => '빛과 소망 (풍경)', 'image' => '/public/assets/images/sample3.jpg'],
            ['id' => 5, 'name' => '절기/특별 주보 이미지', 'image' => ''],
        ];

        $result = [];
        for ($i = 0; $i < 5; $i++) {
            $slot = $presets[$i] ?? $defaultSlots[$i] ?? ['id' => $i + 1, 'name' => '프리셋 ' . ($i + 1), 'image' => ''];
            $result[] = [
                'id' => $i + 1,
                'name' => (string)($slot['name'] ?? ('프리셋 ' . ($i + 1))),
                'image' => (string)($slot['image'] ?? ''),
            ];
        }

        return $result;
    }

    /**
     * 표지 이미지 프리셋 5개 저장
     */
    public static function saveCoverPresets(array $presets): void
    {
        Setting::update('bulletin_cover_presets', json_encode($presets, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 4면(교회소개/모임시간/계좌) 정보 저장
     */
    public static function savePage4Info(array $info): void
    {
        Setting::update('bulletin_page4_info', json_encode($info, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 3면(기도제목/메모설정) 정보 저장
     */
    public static function savePage3Info(array $info): void
    {
        Setting::update('bulletin_page3_info', json_encode($info, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 주보 템플릿 테마 저장
     */
    public static function saveTemplateTheme(string $theme): void
    {
        Setting::update('bulletin_template_theme', $theme);
    }

    /**
     * 주간 설교 기획 저장
     */
    public static function saveWeeklySermonPlan(array $sermonPlan): void
    {
        Setting::update('bulletin_sermon_plan', json_encode($sermonPlan, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 주일예배 10대 순서표 저장
     */
    public static function saveWeeklyOrders(array $orders): void
    {
        Setting::update('bulletin_worship_order', json_encode($orders, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 이번 주 섬김이 담당자 저장
     */
    public static function saveWeeklyServants(array $servants): void
    {
        Setting::update('bulletin_serving_teams', json_encode($servants, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 금주의 암송 구절 저장
     */
    public static function saveMemoryVerse(array $memoryVerse): void
    {
        Setting::update('bulletin_memory_verse', json_encode($memoryVerse, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 1면 표지 이미지 및 스타일 설정 저장
     */
    public static function saveCoverSettings(string $image, string $text, string $subtext, string $style = 'image_focus', string $frame = 'rounded'): void
    {
        Setting::update('bulletin_cover_image', $image);
        Setting::update('bulletin_cover_text', $text);
        Setting::update('bulletin_cover_subtext', $subtext);
        Setting::update('bulletin_cover_style', $style);
        Setting::update('bulletin_cover_frame', $frame);
    }
}