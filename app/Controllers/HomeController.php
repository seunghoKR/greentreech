<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Sermon;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Setting;
use App\Models\CommunityPost;

class HomeController
{
    public function index(): void
    {
        $latestSermon = Sermon::getLatest();
        $galleryItems = Gallery::getLatest(4);
        $notices = Notice::getLatest(5);
        $bulletins = Notice::getLatest(3, '주보');
        $communityPosts = CommunityPost::getPaginated(1, 3)['items'];
        $settings = Setting::getAllAsMap();

        View::render('home/index', [
            'title' => '푸른나무교회 - ' . ($settings['main_slogan'] ?? '지친 일상 속 작은 휴식과 참된 회복'),
            'currentNav' => 'home',
            'latestSermon' => $latestSermon,
            'galleryItems' => $galleryItems,
            'notices' => $notices,
            'bulletins' => $bulletins,
            'communityPosts' => $communityPosts,
            'settings' => $settings,
        ]);
    }

    public function privacy(): void
    {
        $settings = Setting::getAllAsMap();
        View::render('home/privacy', [
            'title' => '개인정보 처리방침 - 푸른나무교회',
            'currentNav' => '',
            'settings' => $settings,
        ]);
    }
}
