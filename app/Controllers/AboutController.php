<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\Setting;

class AboutController
{
    public function index(): void
    {
        View::render('about/index', [
            'title' => '교회 소개 - 푸른나무교회',
            'currentNav' => 'about',
            'tab' => 'intro',
        ]);
    }

    public function pastor(): void
    {
        View::render('about/pastor', [
            'title' => '섬기는 사람들 (담임목사 소개) - 푸른나무교회',
            'currentNav' => 'about',
            'tab' => 'pastor',
        ]);
    }

    public function schedule(): void
    {
        View::render('about/schedule', [
            'title' => '모임 및 예배 안내 - 푸른나무교회',
            'currentNav' => 'about',
            'tab' => 'schedule',
        ]);
    }

    public function location(): void
    {
        $settings = Setting::getAllAsMap();
        View::render('about/location', [
            'title' => '오시는 길 - 푸른나무교회',
            'currentNav' => 'about',
            'tab' => 'location',
            'settings' => $settings,
        ]);
    }
}
