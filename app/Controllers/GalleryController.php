<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Gallery;

class GalleryController
{
    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;

        $pagination = Gallery::getPaginated($page, 9, $category, $keyword);
        $categories = Gallery::getCategories();

        View::render('gallery/index', [
            'title' => '사진첩 및 갤러리 - 푸른나무교회',
            'currentNav' => 'gallery',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => $categories,
            'keyword' => $keyword,
        ]);
    }

    public function calligraphy(): void
    {
        $_GET['category'] = '캘리그라피';
        $page = max(1, (int)($_GET['page'] ?? 1));
        $pagination = Gallery::getPaginated($page, 9, '캘리그라피');
        $categories = Gallery::getCategories();

        View::render('gallery/index', [
            'title' => '말씀 캘리그라피 - 푸른나무교회',
            'currentNav' => 'calligraphy',
            'pagination' => $pagination,
            'category' => '캘리그라피',
            'categories' => $categories,
            'keyword' => null,
        ]);
    }

    public function show(string $id): void
    {
        $galleryId = (int)$id;
        $gallery = Gallery::find($galleryId);

        if (!$gallery) {
            http_response_code(404);
            View::render('home/404', [
                'title' => '사진첩 게시물을 찾을 수 없습니다 - 푸른나무교회'
            ]);
            return;
        }

        Gallery::incrementView($galleryId);

        $relatedItems = Gallery::getLatest(3, $gallery['category']);

        View::render('gallery/show', [
            'title' => $gallery['title'] . ' - 푸른나무교회',
            'currentNav' => ($gallery['category'] === '캘리그라피') ? 'calligraphy' : 'gallery',
            'gallery' => $gallery,
            'relatedItems' => $relatedItems,
        ]);
    }
}
