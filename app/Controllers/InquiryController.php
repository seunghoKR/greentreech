<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;
use App\Core\Captcha;
use App\Models\Inquiry;

class InquiryController
{
    public function index(): void
    {
        $types = Inquiry::getTypes();
        $defaultType = $_GET['type'] ?? '새가족등록';
        if (!in_array($defaultType, $types, true)) {
            $defaultType = '새가족등록';
        }

        $captchaSvg = Captcha::renderSvg();

        View::render('inquiry/index', [
            'title' => '새가족 등록 및 기도/상담 요청 - 푸른나무교회',
            'currentNav' => 'inquiry',
            'types' => $types,
            'selectedType' => $defaultType,
            'captchaSvg' => $captchaSvg,
        ]);
    }

    public function submit(): void
    {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다. 페이지를 새로고침 후 다시 시도해 주세요.');
            header('Location: /inquiry');
            exit;
        }

        $captchaInput = $_POST['captcha'] ?? '';
        if (!Captcha::verify($captchaInput)) {
            Session::setFlash('error', '보안문자(스팸방지 계산) 정답이 올바르지 않습니다. 다시 확인해 주세요.');
            header('Location: /inquiry');
            exit;
        }

        $name = trim((string)($_POST['name'] ?? ''));
        $phone = trim((string)($_POST['phone'] ?? ''));
        $type = trim((string)($_POST['type'] ?? '새가족등록'));
        $content = trim((string)($_POST['content'] ?? ''));
        $isPrivate = isset($_POST['is_private']) ? 1 : 0;

        if (empty($name) || empty($phone) || empty($content)) {
            Session::setFlash('error', '이름, 연락처, 내용을 모두 입력해 주세요.');
            header('Location: /inquiry');
            exit;
        }

        try {
            Inquiry::create([
                'type' => $type,
                'name' => $name,
                'phone' => $phone,
                'content' => $content,
                'is_private' => $isPrivate,
            ]);

            Session::setFlash('success', '따뜻한 마음으로 접수되었습니다. 담임목사님께서 확인 후 연락드리겠습니다. 평안한 하루 되세요!');
        } catch (\Throwable $e) {
            error_log("Inquiry submission failed: " . $e->getMessage());
            Session::setFlash('error', '접수 중 일시적인 오류가 발생했습니다. 전화(010-9559-8623)로 직접 문의해 주셔도 좋습니다.');
        }

        header('Location: /inquiry');
        exit;
    }
}
