<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;
use App\Models\Sermon;
use App\Models\Setting;
use App\Services\YouTubeSyncService;

class SermonController
{
    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;
        $lastSync = Setting::get('youtube_last_sync', '');

        // Exclusively fetch Sunday Worship Sermons ('설교 영상' / '주일 설교')
        $pagination = Sermon::getSundaySermonsPaginated($page, 9, $keyword);
        $latestSermon = Sermon::getLatest();

        View::render('sermons/index', [
            'title' => '주일 설교 말씀 - 푸른나무교회',
            'currentNav' => 'sermons',
            'pagination' => $pagination,
            'latestSermon' => $latestSermon,
            'keyword' => $keyword,
            'lastSync' => $lastSync,
        ]);
    }

    public function sync(): void
    {
        try {
            $res = YouTubeSyncService::syncChannelVideos();
            Session::setFlash('success', "유튜브 채널(@greentreechurch0405)과 실시간 동기화되었습니다! (총 {$res['synced']}개 영상 확인)");
        } catch (\Throwable $e) {
            Session::setFlash('error', '동기화 중 오류가 발생했습니다: ' . $e->getMessage());
        }

        $redirect = $_SERVER['HTTP_REFERER'] ?? '/sermons';
        header("Location: {$redirect}");
        exit;
    }

    public function show(string $id): void
    {
        $sermonId = (int)$id;
        $sermon = Sermon::find($sermonId);

        if (!$sermon) {
            http_response_code(404);
            View::render('home/404', [
                'title' => '설교를 찾을 수 없습니다 - 푸른나무교회'
            ]);
            return;
        }

        Sermon::incrementView($sermonId);

        // Recent sermons for sidebar/related
        $recentSermons = Sermon::getPaginated(1, 4, '주일 설교')['items'];

        View::render('sermons/show', [
            'title' => $sermon['title'] . ' - 주일 설교 - 푸른나무교회',
            'currentNav' => 'sermons',
            'sermon' => $sermon,
            'recentSermons' => $recentSermons,
        ]);
    }
}
