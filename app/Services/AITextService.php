<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Setting;

class AITextService
{
    /**
     * 자유롭게 작성된 메모/공지 텍스트를 주보에 어울리는 정중하고 부드러운 목회 문체로 변환
     */
    public static function refineToPastoralTone(string $inputText): string
    {
        $inputText = trim($inputText);
        if (empty($inputText)) {
            return '';
        }

        // 1. Check if external LLM API is configured in site settings
        $apiKey = Setting::get('ai_api_key', '');
        $aiProvider = Setting::get('ai_provider', 'builtin'); // openai, gemini, builtin

        if (!empty($apiKey) && $aiProvider !== 'builtin') {
            try {
                $aiResult = self::callExternalLLM($inputText, $aiProvider, $apiKey);
                if (!empty($aiResult)) {
                    return $aiResult;
                }
            } catch (\Throwable $e) {
                error_log('External AI Error: ' . $e->getMessage());
            }
        }

        // 2. Built-in High-Accuracy Pastoral & Honorific Rule Transformer
        return self::builtinPastoralRefiner($inputText);
    }

    /**
     * 내장형 고품질 한국어 목회 문체 정제 엔진
     */
    private static function builtinPastoralRefiner(string $text): string
    {
        $lines = explode("\n", str_replace(["\r\n", "\r"], "\n", $text));
        $refinedLines = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (empty($trimmed)) {
                $refinedLines[] = '';
                continue;
            }

            // Clean bullet marks if any
            $prefix = '';
            if (preg_match('/^([0-9]+[\.\)]|\-|\*|\•)\s*(.*)$/u', $trimmed, $m)) {
                $prefix = $m[1] . ' ';
                $trimmed = $m[2];
            }

            $refined = $trimmed;

            // 1. 단어/구어체 교정
            $wordMap = [
                '토욜' => '토요일',
                '일욜' => '주일',
                '월욜' => '월요일',
                '화욜' => '화요일',
                '수욜' => '수요일',
                '목욜' => '목요일',
                '금욜' => '금요일',
                '담주' => '다음 주',
                '이번주' => '이번 주',
                '지난주' => '지난 주',
                '새신자' => '새가족 성도님',
                '교인들' => '성도 여러분',
                '성도들' => '성도 여러분',
                '밥먹기' => '식탁 교제(애찬)',
                '식사하기' => '함께 애찬을 나누기',
                '돈내기' => '정성껏 헌금(봉헌)',
                '늦지말고' => '시간에 늦지 않도록 유의하시어',
                '꼭 오세요' => '기쁨으로 함께해 주시기 바랍니다',
                '다들 오세요' => '많은 성도님들의 관심과 참여를 부탁드립니다',
                '오시기 바랍니다' => '함께하시어 은혜를 나누시기 바랍니다',
                '참석 요망' => '성도 여러분의 많은 참여와 기도를 부탁드립니다',
                '필참' => '모두 함께하시길 권면드립니다',
                '문의 바람' => '궁금하신 점은 담당자에게 편히 문의해 주시기 바랍니다',
            ];

            foreach ($wordMap as $search => $replace) {
                $refined = str_ireplace($search, $replace, $refined);
            }

            // 2. 어미 및 종결어미 목회적 경어체 변환
            $endingRules = [
                '/(?:합니다|합니다요|요)\s*[\.\!]?$/u' => '합니다.',
                '/(?:해라|해주라|해주세요|해요|하셈)\s*[\.\!]?$/u' => '해 주시기 바랍니다.',
                '/(?:바람|바란다|바람요)\s*[\.\!]?$/u' => '바랍니다.',
                '/(?:있음|있어요|있다)\s*[\.\!]?$/u' => '있습니다.',
                '/(?:없음|없어요|없다)\s*[\.\!]?$/u' => '없습니다.',
                '/(?:모임|모인다|모임요)\s*[\.\!]?$/u' => '모임이 은혜 가운데 진행됩니다.',
                '/(?:시작함|시작한다|시작)\s*[\.\!]?$/u' => '시작하오니 기도로 동참해 주시기 바랍니다.',
                '/(?:마침|끝남|종료)\s*[\.\!]?$/u' => '감사함으로 마쳤습니다.',
                '/(?:환영함|환영한다)\s*[\.\!]?$/u' => '주님의 이름으로 진심으로 환영하고 축복합니다.',
                '/(?:축하함|축하한다|축하축하)\s*[\.\!]?$/u' => '마음을 다해 축하와 축복을 전합니다.',
                '/(?:기도부탁|기도요청)\s*[\.\!]?$/u' => '성도님들의 따뜻한 중보 기도를 부탁드립니다.',
            ];

            foreach ($endingRules as $pattern => $replacement) {
                if (preg_match($pattern, $refined)) {
                    $refined = preg_replace($pattern, $replacement, $refined);
                    break;
                }
            }

            // 문장 끝맺음 마침표 보정
            if (!preg_match('/[\.\?\!]$/u', $refined) && mb_strlen($refined) > 3) {
                $refined .= '를 부탁드립니다.';
            }

            $refinedLines[] = $prefix . $refined;
        }

        return implode("\n", $refinedLines);
    }

    /**
     * 외부 LLM API 호출 (OpenAI / Gemini 호환)
     */
    private static function callExternalLLM(string $prompt, string $provider, string $apiKey): ?string
    {
        $systemPrompt = "당신은 따뜻하고 품격 있는 기독교 교회의 담임목사이자 주보 편집장입니다. 사용자가 입력한 거친 소식/메모 글을 주보(Bulletin)에 실릴 수 있는 정중하고 따뜻하며 은혜로운 목회적 경어체 문장으로 다듬어 주세요. 설명 없이 오직 다듬어진 완성본 텍스트만 출력하세요.";

        if ($provider === 'openai') {
            $ch = curl_init('https://api.openai.com/v1/chat/completions');
            $data = [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $prompt]
                ],
                'temperature' => 0.7
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $res = curl_exec($ch);
            curl_close($ch);

            if ($res) {
                $json = json_decode($res, true);
                return $json['choices'][0]['message']['content'] ?? null;
            }
        }

        return null;
    }
}