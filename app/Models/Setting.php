<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Setting
{
    private static array $cachedMap = [];

    public static function getAll(): array
    {
        try {
            return Database::query("SELECT * FROM `site_settings` ORDER BY `key_name` ASC");
        } catch (\Throwable $e) {
            return [];
        }
    }

    public static function getAllAsMap(): array
    {
        if (!empty(self::$cachedMap)) {
            return self::$cachedMap;
        }

        $defaults = [
            'site_name' => '푸른나무교회',
            'pastor_name' => '심민보',
            'phone' => '010-9559-8623',
            'email' => 'leeshkr@kakao.com',
            'address' => '전라북도 익산시 선화로73길 25 (3층)',
            'worship_sunday' => '주일 오전 11:00',
            'worship_study' => '청년 BIBLE TIME / 제자훈련',
            'main_slogan' => '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간',
            'kakao_map_key' => '',
            'naver_map_url' => 'https://naver.me/xqb2I1g5',
            'google_map_embed' => 'https://maps.google.com/maps?q=%EC%A0%84%EB%B6%81%20%EC%9D%B5%EC%82%B0%EC%8B%9C%20%EC%84%A0%ED%99%94%EB%A1%9C73%EA%B8%B8%2025&t=&z=17&ie=UTF8&iwloc=&output=embed',
            // Hero Banner Settings
            'hero_mode' => 'text', // 'text' or 'image'
            'hero_badge' => '지친 일상 속, 작은 휴식과 참된 사랑',
            'hero_title' => '당신의 지친 마음에',
            'hero_highlight_text' => '따뜻한 그늘과 쉼',
            'hero_title_suffix' => '을 드립니다',
            'hero_subtitle' => '푸른나무교회는 거대한 무리 속의 한 사람이 아닌, 서로의 이름을 부르며 진심으로 기도하고 함께 자라나는 믿음의 공동체입니다.',
            'hero_btn1_text' => '',
            'hero_btn1_url' => '',
            'hero_btn1_target' => '_self',
            'hero_btn2_text' => '',
            'hero_btn2_url' => '',
            'hero_btn2_target' => '_self',
            'hero_image_desktop' => '',
            'hero_image_mobile' => '',
            'hero_image_link' => '',
            'hero_image_target' => '_self',
            'hero_image_alt' => '푸른나무교회 메인 배너',
            // Welcome Message Settings (첫 카카오 로그인 성도 자동 환영)
            'welcome_message_enabled' => '1',
            'welcome_message_template' => "🌿 [푸른나무교회 환영 메시지]\n\n{name} 성도님, 주님의 이름으로 진심으로 환영하고 축복합니다! ✨\n\n푸른나무교회는 지친 일상 속, 작은 쉼과 주님의 참된 사랑을 함께 나누는 믿음의 가족 공동체입니다.\n\n• 담임목사: {pastor_name}\n• 주일예배: {worship_sunday}\n• 교회 위치: {address}\n\n궁금하신 점이나 기도제목이 있으시면 언제든 [성도 나눔터] 또는 [새가족/기도] 메뉴를 통해 말씀해 주세요.\n\n주님의 은혜와 평강이 성도님의 삶 속에 늘 가득하시기를 소망합니다. 💖",
        ];

        try {
            $rows = Database::query("SELECT `key_name`, `key_value` FROM `site_settings`");
            $map = [];
            foreach ($rows as $row) {
                $map[$row['key_name']] = $row['key_value'];
            }
            self::$cachedMap = array_merge($defaults, $map);
        } catch (\Throwable $e) {
            self::$cachedMap = $defaults;
        }

        return self::$cachedMap;
    }

    public static function get(string $key, string $default = ''): string
    {
        $map = self::getAllAsMap();
        return $map[$key] ?? $default;
    }

    public static function update(string $key, string $value): bool
    {
        try {
            $exists = Database::fetchOne("SELECT `key_name` FROM `site_settings` WHERE `key_name` = :key", ['key' => $key]);
            if ($exists) {
                Database::execute("UPDATE `site_settings` SET `key_value` = :val WHERE `key_name` = :key", ['key' => $key, 'val' => $value]);
            } else {
                Database::execute("INSERT INTO `site_settings` (`key_name`, `key_value`) VALUES (:key, :val)", ['key' => $key, 'val' => $value]);
            }
            self::$cachedMap = []; // Invalidate cache
            return true;
        } catch (\Throwable $e) {
            error_log("Failed to update setting: " . $e->getMessage());
            return false;
        }
    }

    public static function updateMultiple(array $settings): bool
    {
        foreach ($settings as $key => $value) {
            self::update((string)$key, (string)$value);
        }
        return true;
    }
}
