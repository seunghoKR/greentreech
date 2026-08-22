<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Notice;

class NoticeController
{
    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;

        $pagination = Notice::getPaginated($page, 10, $category, $keyword);
        $categories = Notice::getCategories();

        View::render('notices/index', [
            'title' => '알리는 소식 - 푸른나무교회',
            'currentNav' => 'notices',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }

    public function show(string $id): void
    {
        $noticeId = (int)$id;
        $notice = Notice::find($noticeId);

        if (!$notice) {
            http_response_code(404);
            View::render('home/404', [
                'title' => '게시글을 찾을 수 없습니다 - 푸른나무교회'
            ]);
            return;
        }

        Notice::incrementView($noticeId);

        $recentNotices = Notice::getLatest(5);

        View::render('notices/show', [
            'title' => $notice['title'] . ' - 알리는 소식 - 푸른나무교회',
            'currentNav' => 'notices',
            'notice' => $notice,
            'recentNotices' => $recentNotices,
        ]);
    }
}
