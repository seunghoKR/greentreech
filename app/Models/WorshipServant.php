<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class WorshipServant
{
    /**
     * 이번 주 기준 가장 가까운 주일 DateTime 반환
     */
    public static function getCurrentSunday(): \DateTime
    {
        $today = new \DateTime();
        $dayOfWeek = (int)$today->format('w'); // 0: Sunday
        $sunday = clone $today;

        if ($dayOfWeek !== 0) {
            $sunday->modify('next Sunday');
            if ($dayOfWeek < 4) {
                $sunday = clone $today;
                $sunday->modify('last Sunday');
            }
        }
        return $sunday;
    }

    /**
     * 날짜에 따른 주보 호수 생성 (예: 제 2026-34호)
     */
    public static function formatBulletinNo(\DateTime $date): string
    {
        return '제 ' . $date->format('Y') . '-' . $date->format('W') . '호';
    }

    /**
     * 저장된 모든 섬김이 스케줄 맵 가져오기
     */
    public static function getAllScheduleMap(): array
    {
        $saved = Setting::get('worship_servants_schedule', '');
        if (empty($saved)) {
            return [];
        }
        $decoded = json_decode($saved, true);
        return is_array($decoded) ? $decoded : [];
    }

    /**
     * 4주간 (이번 주, 2주차, 3주차, 4주차) 스케줄 목록 생성 및 반환
     */
    public static function get4WeeksSchedule(): array
    {
        $currentSunday = self::getCurrentSunday();
        $savedMap = self::getAllScheduleMap();
        $weeks = [];

        for ($i = 0; $i < 4; $i++) {
            $d = clone $currentSunday;
            if ($i > 0) {
                $d->modify("+{$i} weeks");
            }

            $dateKey = $d->format('Y-m-d');
            $bulletinNo = self::formatBulletinNo($d);
            $formattedDate = $d->format('Y년 m월 d일');

            $saved = $savedMap[$dateKey] ?? [];

            $weeks[] = [
                'week_index' => $i + 1,
                'is_current' => ($i === 0),
                'is_next' => ($i === 1),
                'date_key' => $dateKey,
                'formatted_date' => $formattedDate,
                'bulletin_no' => $bulletinNo,
                'prayer' => $saved['prayer'] ?? '',
                'offering' => $saved['offering'] ?? '',
                'usher' => $saved['usher'] ?? '',
                'note' => $saved['note'] ?? '',
            ];
        }

        return $weeks;
    }

    /**
     * 특정 날짜의 섬김이 정보 반환
     */
    public static function getServantsByDate(string $dateKey): array
    {
        $savedMap = self::getAllScheduleMap();
        return $savedMap[$dateKey] ?? [
            'prayer' => '',
            'offering' => '',
            'usher' => '',
            'note' => '',
        ];
    }

    /**
     * 이번 주 섬김이 가져오기
     */
    public static function getCurrentWeekServants(): array
    {
        $currentSunday = self::getCurrentSunday();
        $dateKey = $currentSunday->format('Y-m-d');
        return [
            'date_key' => $dateKey,
            'formatted_date' => $currentSunday->format('Y년 m월 d일'),
            'bulletin_no' => self::formatBulletinNo($currentSunday),
            'servants' => self::getServantsByDate($dateKey),
        ];
    }

    /**
     * 다음 주 섬김이 가져오기
     */
    public static function getNextWeekServants(): array
    {
        $currentSunday = self::getCurrentSunday();
        $nextSunday = clone $currentSunday;
        $nextSunday->modify('+1 week');

        $dateKey = $nextSunday->format('Y-m-d');
        return [
            'date_key' => $dateKey,
            'formatted_date' => $nextSunday->format('Y년 m월 d일'),
            'bulletin_no' => self::formatBulletinNo($nextSunday),
            'servants' => self::getServantsByDate($dateKey),
        ];
    }

    /**
     * 4주간 스케줄 일괄 저장
     */
    public static function saveSchedules(array $schedules): void
    {
        $existing = self::getAllScheduleMap();

        foreach ($schedules as $dateKey => $data) {
            $existing[$dateKey] = [
                'bulletin_no' => trim((string)($data['bulletin_no'] ?? '')),
                'prayer' => trim((string)($data['prayer'] ?? '')),
                'offering' => trim((string)($data['offering'] ?? '')),
                'usher' => trim((string)($data['usher'] ?? '')),
                'note' => trim((string)($data['note'] ?? '')),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        Setting::update('worship_servants_schedule', json_encode($existing, JSON_UNESCAPED_UNICODE));
    }
}
