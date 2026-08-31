<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Setting;

class KakaoAuthService
{
    public static function getRestApiKey(): string
    {
        return Setting::get('kakao_rest_api_key', '');
    }

    public static function getRedirectUri(): string
    {
        $custom = Setting::get('kakao_redirect_uri', '');
        if (!empty($custom)) {
            return $custom;
        }

        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
        return "{$scheme}://{$host}/auth/kakao/callback";
    }

    public static function getLoginUrl(bool $forceConsent = false): string
    {
        $clientId = self::getRestApiKey();
        if (empty($clientId)) {
            // Local dev test mode when Kakao API key is not yet configured
            return '/auth/kakao/mock';
        }

        $redirectUri = urlencode(self::getRedirectUri());
        $url = "https://kauth.kakao.com/oauth/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&response_type=code&scope=talk_message,profile_nickname,profile_image,account_email";
        if ($forceConsent) {
            $url .= "&prompt=consent";
        }
        return $url;
    }

    /**
     * 카카오톡 '나와의 채팅방'으로 실제 메시지 전송 (카카오 메시지 API)
     */
    public static function sendTalkMemo(string $accessToken, string $text, string $webUrl = 'https://greentreech.kr', string $buttonTitle = '푸른나무교회 바로가기'): array
    {
        $templateObject = [
            'object_type' => 'text',
            'text' => $text,
            'link' => [
                'web_url' => $webUrl,
                'mobile_web_url' => $webUrl,
            ],
            'button_title' => $buttonTitle,
        ];

        $params = [
            'template_object' => json_encode($templateObject, JSON_UNESCAPED_UNICODE)
        ];

        $ch = curl_init('https://kapi.kakao.com/v2/api/talk/memo/default/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/x-www-form-urlencoded;charset=utf-8'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode((string)$response, true);

        return [
            'http_code' => $httpCode,
            'result' => $result,
            'success' => ($httpCode === 200 && ($result['result_code'] ?? -1) === 0),
        ];
    }

    public static function getAccessToken(string $code): ?array
    {
        $clientId = self::getRestApiKey();
        $redirectUri = self::getRedirectUri();

        $params = [
            'grant_type' => 'authorization_code',
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'code' => $code,
        ];

        $ch = curl_init('https://kauth.kakao.com/oauth/token');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded;charset=utf-8']);
        
        $response = curl_exec($ch);
        curl_close($ch);

        if (!$response) {
            return null;
        }

        $data = json_decode((string)$response, true);
        return is_array($data) ? $data : null;
    }

    public static function getUserProfile(string $accessToken): ?array
    {
        $ch = curl_init('https://kapi.kakao.com/v2/user/me');
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/x-www-form-urlencoded;charset=utf-8'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if (!$response) {
            return null;
        }

        $data = json_decode((string)$response, true);
        if (empty($data['id'])) {
            return null;
        }

        $kakaoAccount = $data['kakao_account'] ?? [];
        $profile = $kakaoAccount['profile'] ?? [];

        // Parse Name and Phone if permitted
        $name = $kakaoAccount['name'] ?? null;
        $rawPhone = $kakaoAccount['phone_number'] ?? null;
        $phone = null;
        if (!empty($rawPhone)) {
            $cleaned = preg_replace('/^\+82\s*/', '0', (string)$rawPhone);
            $cleaned = str_replace(['-', ' '], '', $cleaned);
            if (strlen($cleaned) === 11) {
                $phone = substr($cleaned, 0, 3) . '-' . substr($cleaned, 3, 4) . '-' . substr($cleaned, 7);
            } else {
                $phone = $cleaned;
            }
        }

        return [
            'id' => (string)$data['id'],
            'name' => $name,
            'nickname' => $profile['nickname'] ?? ($name ?: '성도'),
            'profile_image' => $profile['profile_image_url'] ?? $profile['thumbnail_image_url'] ?? null,
            'email' => $kakaoAccount['email'] ?? null,
            'phone' => $phone,
        ];
    }
}
