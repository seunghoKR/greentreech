<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Services\BulletinService;
use App\Services\AITextService;

class BulletinController
{
    /**
     * 금주의 스마트 주보 (웹 인터랙티브 뷰어)
     */
    public function index(): void
    {
        $bulletin = BulletinService::generateCurrentWeekBulletin();

        View::render('bulletin/view', [
            'title' => $bulletin['church_name'] . ' 주보 (' . $bulletin['date_str'] . ') - 푸른나무교회',
            'currentNav' => 'notices',
            'bulletin' => $bulletin,
        ]);
    }

    /**
     * 고해상도 A4 양면 인쇄 및 PDF 저장 전용 뷰어
     */
    public function print(): void
    {
        $bulletin = BulletinService::generateCurrentWeekBulletin();

        // Render standalone printable view without global header/footer
        require __DIR__ . '/../Views/bulletin/print.php';
    }

    /**
     * AI 목회 문체 다듬기 비동기 API 엔드포인트
     */
    public function refineToneApi(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        $input = json_decode(file_get_contents('php://input'), true);
        $text = $input['text'] ?? $_POST['text'] ?? '';

        if (empty(trim((string)$text))) {
            echo json_encode(['success' => false, 'message' => '텍스트를 입력해 주세요.']);
            exit;
        }

        try {
            $refined = AITextService::refineToPastoralTone((string)$text);
            echo json_encode([
                'success' => true,
                'original' => $text,
                'refined' => $refined,
            ]);
        } catch (\Throwable $e) {
            echo json_encode([
                'success' => false,
                'message' => '변환 중 오류가 발생했습니다: ' . $e->getMessage(),
            ]);
        }
        exit;
    }
}