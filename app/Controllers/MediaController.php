<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;
use App\Models\Sermon;
use App\Models\Setting;
use App\Services\YouTubeSyncService;

class MediaController
{
    public static function getMediaCategories(): array
    {
        return [
            '전체',
            '설교 영상',
            '예배 영상',
            '듣는 성경',
            '설교 쇼츠',
            '예배 쇼츠',
            '교회 행사/일상',
            '기타',
        ];
    }

    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $lastSync = Setting::get('youtube_last_sync', '');

        // Standard paginated query for selected category
        $pagination = Sermon::getPaginated($page, 12, ($category === '전체' ? null : $category), $keyword);

        $categories = self::getMediaCategories();
        $allCounts = Sermon::getCategoryCounts();
        
        // Calculate category counts for media page
        $categoryCounts = [];
        $mediaTotal = 0;
        foreach ($categories as $cat) {
            if ($cat === '전체') continue;
            $c = $allCounts[$cat] ?? 0;
            $categoryCounts[$cat] = $c;
            $mediaTotal += $c;
        }
        $categoryCounts['전체'] = $mediaTotal;

        View::render('media/index', [
            'title' => '푸른나무 영상 & 쇼츠 - 푸른나무교회',
            'currentNav' => 'media',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
            'keyword' => $keyword,
            'lastSync' => $lastSync,
        ]);
    }

    public function sync(): void
    {
        try {
            $res = YouTubeSyncService::syncChannelVideos();
            Session::setFlash('success', "유튜브 채널(@greentreechurch0405)과 실시간 동기화되었습니다! (총 {$res['synced']}개 영상 확인, 신규 {$res['new']}개 등록)");
        } catch (\Throwable $e) {
            Session::setFlash('error', '동기화 중 오류가 발생했습니다: ' . $e->getMessage());
        }

        $redirect = $_SERVER['HTTP_REFERER'] ?? '/media';
        header("Location: {$redirect}");
        exit;
    }
}
