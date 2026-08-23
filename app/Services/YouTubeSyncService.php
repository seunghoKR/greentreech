<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Database;
use App\Models\Setting;

class YouTubeSyncService
{
    private const CHANNEL_HANDLE = '@greentreechurch0405';
    private const CHANNEL_URL = 'https://www.youtube.com/@greentreechurch0405';

    /**
     * 유튜브 채널에서 새로 올라온 신규 영상/쇼츠만 탐색하여 안전하게 등록 (기존 분류/정리 데이터 보존)
     */
    public static function syncChannelVideos(): array
    {
        $videoItems = self::fetchChannelVideoList();
        $existingCount = 0;
        $newCount = 0;

        foreach ($videoItems as $item) {
            $youtubeId = $item['id'];
            $isShorts = $item['is_shorts'];

            // 1. 이미 DB에 등록된 영상인지 먼저 확인 (기존 정리 및 분류된 영상은 100% 온전히 보존)
            $existing = Database::fetchOne("SELECT id FROM `sermons` WHERE `youtube_id` = :yid", ['yid' => $youtubeId]);
            if ($existing) {
                $existingCount++;
                continue; // 기존 데이터는 절대 수정/초기화하지 않고 스킵
            }

            // 2. 새로 올라온 신규 영상만 메타데이터를 조회하여 정밀 분류 후 등록
            $meta = self::fetchOEmbedData($youtubeId, $isShorts);
            $rawTitle = $meta['title'] ?? ($isShorts ? '푸른나무교회 쇼츠' : '푸른나무교회 주일 말씀');
            $title = html_entity_decode($rawTitle, ENT_QUOTES, 'UTF-8');

            // 5-Category Granular Classification
            $category = '설교 영상';
            $videoType = 'video';

            $isShortsDetected = $isShorts || (mb_stripos($title, '쇼츠') !== false) || (mb_stripos($title, 'shorts') !== false);

            if ($isShortsDetected) {
                $videoType = 'shorts';

                // 1) 예배 쇼츠 키워드 (찬양, 찬송, 기도, 특송, 성가대, 예배실황 등)
                $worshipKeywords = ['찬양', '찬송', '기도', '특송', '성가대', '워십', '찬양대', '예배', '반주'];
                $isWorship = false;
                foreach ($worshipKeywords as $kw) {
                    if (mb_stripos($title, $kw) !== false) {
                        $isWorship = true;
                        break;
                    }
                }

                // 2) 교회 행사/일상 키워드 (음식, 애찬, 반찬, 식탁, 교제, 청년부, 행사, 창립 등)
                $eventKeywords = [
                    '반찬', '호박전', '굴전', '된장국', '제육', '감자탕', '생선구이', 
                    '쌈밥', '떡국', '뷔페', '등갈비', '보리굴비', '닭개장', '조림', 
                    '식탁', '청년부', '목장', '교회맛집', '잔치상', '국밥', '비빔밥', '샐러드',
                    '행사', '축제', '일상', '소식', '생일', '야외', '바자회'
                ];
                $isEvent = false;
                foreach ($eventKeywords as $kw) {
                    if (mb_stripos($title, $kw) !== false) {
                        $isEvent = true;
                        break;
                    }
                }

                if ($isWorship) {
                    $category = '예배 쇼츠';
                } elseif ($isEvent) {
                    $category = '교회 행사/일상';
                } elseif (mb_stripos($title, '간증') !== false || mb_stripos($title, '기타') !== false) {
                    $category = '기타';
                } else {
                    $category = '설교 쇼츠';
                }
            } else {
                // Long-form Videos (including live streams)
                $videoType = 'video';

                // 1) 듣는 성경 (오디오 성경, 통독, 낭독 등)
                if (mb_stripos($title, '오디오') !== false || mb_stripos($title, '성경 낭독') !== false || mb_stripos($title, '성경통독') !== false || mb_stripos($title, '오디오 성경') !== false) {
                    $category = '듣는 성경';
                } elseif (mb_stripos($title, '간증') !== false || mb_stripos($title, '집회') !== false || mb_stripos($title, '부흥') !== false || mb_stripos($title, '기도회') !== false || mb_stripos($title, '찬양예배') !== false) {
                    $category = '예배 영상';
                } elseif (mb_stripos($title, '창립') !== false || mb_stripos($title, '10주년') !== false || mb_stripos($title, '행사') !== false || mb_stripos($title, '축제') !== false || mb_stripos($title, '바자회') !== false) {
                    $category = '교회 행사/일상';
                } elseif (mb_stripos($title, '설교') !== false || mb_stripos($title, '주일') !== false || mb_stripos($title, '말씀') !== false || mb_stripos($title, '예배') !== false || mb_stripos($title, '심민보') !== false) {
                    $category = '설교 영상';
                } else {
                    $category = '설교 영상';
                }
            }

            // Extract Preacher or speaker if found
            $preacher = '심민보 목사';
            if (preg_match('/([가-힣]{2,4}\s*(사모|목사|집사|권사|장로|간증))/u', $title, $pm)) {
                $preacher = trim($pm[1]);
            }

            // Extract sermon date from title if available (e.g. 2024.03.10)
            $sermonDate = date('Y-m-d');
            if (preg_match('/(202[0-9])[\.\-](0[1-9]|1[0-2])[\.\-](0[1-9]|[12][0-9]|3[01])/', $title, $dm)) {
                $sermonDate = "{$dm[1]}-{$dm[2]}-{$dm[3]}";
            }

            // 신규 영상만 새로 INSERT
            $sql = "INSERT INTO `sermons` 
                    (`title`, `category`, `video_type`, `preacher`, `sermon_date`, `youtube_id`, `content`, `view_count`, `created_at`) 
                    VALUES (:title, :cat, :vtype, :preacher, :sdate, :yid, :content, 0, CURRENT_TIMESTAMP)";
            Database::execute($sql, [
                'title' => $title,
                'cat' => $category,
                'vtype' => $videoType,
                'preacher' => $preacher,
                'sdate' => $sermonDate,
                'yid' => $youtubeId,
                'content' => "푸른나무교회 공식 유튜브 채널(@greentreechurch0405)에 게시된 콘텐츠입니다.",
            ]);
            $newCount++;
        }

        // Update last sync time
        Setting::update('youtube_last_sync', date('Y-m-d H:i:s'));

        return [
            'total' => count($videoItems),
            'existing' => $existingCount,
            'new' => $newCount,
        ];
    }

    /**
     * 채널 페이지로부터 영상, 쇼츠, 라이브 스트리밍(/streams, /live) ID 목록 크롤링/추출
     */
    private static function fetchChannelVideoList(): array
    {
        $items = [];
        $urlsToFetch = [
            self::CHANNEL_URL . '/streams', // 🔴 라이브 스트리밍 / 실시간 예배 다시보기
            self::CHANNEL_URL . '/videos',  // 🎬 일반 업로드 영상
            self::CHANNEL_URL . '/shorts',  // ⚡ 쇼츠 영상
            self::CHANNEL_URL . '/live',    // 🔴 현재 진행 중인 라이브
            self::CHANNEL_URL,              // 🏠 채널 홈 피처드
        ];

        $seenIds = [];

        foreach ($urlsToFetch as $url) {
            $html = self::httpGet($url);
            if (empty($html)) continue;

            $isShortsTab = (strpos($url, '/shorts') !== false);

            // 1. Match /watch?v= URLs
            if (preg_match_all('#/watch\?v=([a-zA-Z0-9_-]{11})#', $html, $vMatches)) {
                foreach (array_unique($vMatches[1]) as $vid) {
                    if (!isset($seenIds[$vid])) {
                        $seenIds[$vid] = true;
                        $items[] = ['id' => $vid, 'is_shorts' => false];
                    }
                }
            }

            // 2. Match /shorts/ URLs
            if (preg_match_all('#/shorts/([a-zA-Z0-9_-]{11})#', $html, $sMatches)) {
                foreach (array_unique($sMatches[1]) as $sid) {
                    if (!isset($seenIds[$sid])) {
                        $seenIds[$sid] = true;
                        $items[] = ['id' => $sid, 'is_shorts' => true];
                    }
                }
            }

            // 3. Match embedded ytInitialData JSON videoId keys
            if (preg_match_all('#"videoId"\s*:\s*"([a-zA-Z0-9_-]{11})"#', $html, $jsonMatches)) {
                foreach (array_unique($jsonMatches[1]) as $jid) {
                    if (!isset($seenIds[$jid])) {
                        $seenIds[$jid] = true;
                        $items[] = ['id' => $jid, 'is_shorts' => $isShortsTab];
                    }
                }
            }
        }

        return $items;
    }

    /**
     * YouTube oEmbed API를 통한 공식 메타데이터 조회
     */
    private static function fetchOEmbedData(string $youtubeId, bool $isShorts = false): ?array
    {
        $url = $isShorts
            ? "https://www.youtube.com/oembed?url=https://www.youtube.com/shorts/{$youtubeId}&format=json"
            : "https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$youtubeId}&format=json";

        $json = self::httpGet($url);
        if (!$json) {
            $json = self::httpGet("https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v={$youtubeId}&format=json");
        }

        if (!$json) return null;
        $data = json_decode($json, true);
        return is_array($data) ? $data : null;
    }

    private static function httpGet(string $url): ?string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($status >= 200 && $status < 400 && is_string($result)) ? $result : null;
    }
}
