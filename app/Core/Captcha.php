<?php
declare(strict_types=1);

namespace App\Core;

class Captcha
{
    private const SESSION_KEY = '_gtc_captcha_answer';

    /**
     * 새로운 캡차 질문과 정답 생성 (덧셈/뺄셈 연산)
     */
    public static function generateQuestion(): array
    {
        $num1 = random_int(3, 15);
        $num2 = random_int(1, 9);
        $ops = ['+', '-'];
        $op = $ops[random_int(0, 1)];

        if ($op === '-') {
            if ($num1 < $num2) {
                [$num1, $num2] = [$num2, $num1];
            }
            $answer = $num1 - $num2;
            $question = "{$num1} 빼기 {$num2} 는?";
            $shortExpr = "{$num1} - {$num2} = ?";
        } else {
            $answer = $num1 + $num2;
            $question = "{$num1} 더하기 {$num2} 는?";
            $shortExpr = "{$num1} + {$num2} = ?";
        }

        Session::set(self::SESSION_KEY, (string)$answer);

        return [
            'question' => $question,
            'expr' => $shortExpr,
            'answer' => $answer,
        ];
    }

    /**
     * 사용자가 제출한 캡차 정답 검증
     */
    public static function verify(?string $userInput): bool
    {
        if ($userInput === null || trim($userInput) === '') {
            return false;
        }

        $storedAnswer = Session::get(self::SESSION_KEY);
        if ($storedAnswer === null) {
            return false;
        }

        $isValid = (trim($userInput) === trim((string)$storedAnswer));

        // 검증 후 1회용으로 소비 (세션 파기)
        Session::remove(self::SESSION_KEY);

        return $isValid;
    }

    /**
     * 캡차 SVG 이미지 렌더링 (외부 라이브러리 없이 독립 동작)
     */
    public static function renderSvg(): string
    {
        $data = self::generateQuestion();
        $text = $data['expr'];
        
        $width = 150;
        $height = 42;
        
        // Random lines for slight noise
        $line1 = '<line x1="' . random_int(0, 30) . '" y1="' . random_int(0, 40) . '" x2="' . random_int(120, 150) . '" y2="' . random_int(0, 40) . '" stroke="#c2c9bb" stroke-width="1.5" />';
        $line2 = '<line x1="' . random_int(0, 30) . '" y1="' . random_int(20, 40) . '" x2="' . random_int(120, 150) . '" y2="' . random_int(0, 20) . '" stroke="#9dd090" stroke-width="1.5" opacity="0.6" />';

        return <<<SVG
        <svg width="{$width}" height="{$height}" viewBox="0 0 {$width} {$height}" xmlns="http://www.w3.org/2000/svg" class="rounded-lg select-none border border-outline-variant bg-surface-container-lowest">
            <rect width="100%" height="100%" fill="#edf4ff" rx="8" />
            {$line1}
            {$line2}
            <text x="50%" y="58%" dominant-baseline="middle" text-anchor="middle" font-family="Noto Serif, serif" font-weight="700" font-size="20" fill="#154212" letter-spacing="2">
                {$text}
            </text>
        </svg>
SVG;
    }
}
