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
            '설교 쇼츠',
            '예배 쇼츠',
            '예배 영상',
            '듣는 성경',
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

        // 설교 영상 요청 시 주일 설교 말씀 페이지(/sermons)로 자동 리다이렉트
        if ($category === '설교 영상' || $category === '주일 설교' || $category === '주일예배') {
            header('Location: /sermons');
            exit;
        }

        // 푸른나무 영상 전용 쿼리 (주일 설교 영상 제외)
        $pagination = Sermon::getMediaPaginated($page, 12, ($category === '전체' ? null : $category), $keyword);
        $categories = self::getMediaCategories();
        $categoryCounts = Sermon::getMediaCategoryCounts();

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
