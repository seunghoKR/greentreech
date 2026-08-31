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

    public function sitemap(): void
    {
        $baseUrl = 'https://greentreech.kr';
        $today = date('Y-m-d');

        $staticUrls = [
            '/' => ['priority' => '1.0', 'changefreq' => 'daily'],
            '/bulletin' => ['priority' => '0.9', 'changefreq' => 'weekly'],
            '/sermons' => ['priority' => '0.9', 'changefreq' => 'weekly'],
            '/media' => ['priority' => '0.8', 'changefreq' => 'weekly'],
            '/community' => ['priority' => '0.8', 'changefreq' => 'daily'],
            '/about' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            '/pastor' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            '/schedule' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            '/location' => ['priority' => '0.7', 'changefreq' => 'monthly'],
            '/gallery' => ['priority' => '0.6', 'changefreq' => 'weekly'],
            '/notices' => ['priority' => '0.6', 'changefreq' => 'weekly'],
            '/inquiry' => ['priority' => '0.7', 'changefreq' => 'monthly'],
        ];

        header('Content-Type: application/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($staticUrls as $path => $meta) {
            echo "  <url>\n";
            echo "    <loc>{$baseUrl}{$path}</loc>\n";
            echo "    <lastmod>{$today}</lastmod>\n";
            echo "    <changefreq>{$meta['changefreq']}</changefreq>\n";
            echo "    <priority>{$meta['priority']}</priority>\n";
            echo "  </url>\n";
        }

        // Add latest sermons
        $sermons = Sermon::getLatest(20);
        foreach ($sermons as $sermon) {
            $sDate = !empty($sermon['sermon_date']) ? $sermon['sermon_date'] : $today;
            echo "  <url>\n";
            echo "    <loc>{$baseUrl}/sermons/{$sermon['id']}</loc>\n";
            echo "    <lastmod>{$sDate}</lastmod>\n";
            echo "    <changefreq>monthly</changefreq>\n";
            echo "    <priority>0.8</priority>\n";
            echo "  </url>\n";
        }

        echo '</urlset>';
        exit;
    }

    public function robots(): void
    {
        header('Content-Type: text/plain; charset=utf-8');
        echo "User-agent: *\n";
        echo "Allow: /\n";
        echo "Disallow: /admin\n";
        echo "Disallow: /api\n";
        echo "Disallow: /storage\n";
        echo "\n";
        echo "Sitemap: https://greentreech.kr/sitemap.xml\n";
        exit;
    }
}
