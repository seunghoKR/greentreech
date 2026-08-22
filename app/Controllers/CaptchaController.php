<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Captcha;

class CaptchaController
{
    public function refresh(): void
    {
        header('Content-Type: application/json; charset=utf-8');
        $svg = Captcha::renderSvg();
        echo json_encode([
            'success' => true,
            'svg' => $svg,
        ]);
        exit;
    }
}
