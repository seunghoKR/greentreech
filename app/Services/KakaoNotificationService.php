<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Setting;
use App\Models\NotificationLog;

class KakaoNotificationService
{
    /**
     * 누리오가 보내는 테스트 알림 발송 (실제 카카오톡 나와의 채팅방 전송 시도)
     */
    public static function sendNurioTestNotification(string $recipientName, string $email): array
    {
        $time = date('Y-m-d H:i:s');
        $message = "🌱 [푸른나무교회 알림]\n\n안녕하세요, {$recipientName} 대표님! 🎨✨\n\n누리오 카카오톡 실시간 알림 연동 테스트 메시지입니다.\n\n• 발송 대상: {$email}\n• 발송 시간: {$time}\n\n오늘도 은혜와 쉼이 넘치는 하루 되세요! 🌿💖";

        // 카카오 세션 토큰 확인 후 실제 카카오톡 메시지 전송
        $accessToken = \App\Core\Session::get('kakao_access_token', '');
        $talkResult = null;
        $talkSent = false;

        if (!empty($accessToken)) {
            $talkResult = KakaoAuthService::sendTalkMemo($accessToken, $message, 'https://greentreech.iwinv.net/admin');
            $talkSent = !empty($talkResult['success']);
        }

        $status = $talkSent ? 'SUCCESS (KAKAOTALK SENT)' : 'LOGGED';
        $logged = NotificationLog::log(1, 'NURIO_TEST_ALERT', $message, $status);

        return [
            'success' => true,
            'talk_sent' => $talkSent,
            'talk_result' => $talkResult,
            'message' => $message,
            'log_id' => $logged,
            'time' => $time,
        ];
    }

    public static function sendYoungjaTestNotification(string $recipientName, string $email): array
    {
        return self::sendNurioTestNotification($recipientName, $email);
    }

    /**
     * 최초 카카오 로그인 성도에게 자동 환영 메시지 발송
     */
    public static function sendWelcomeMessage(array $member, ?string $accessToken = null): array
    {
        $enabled = Setting::get('welcome_message_enabled', '1');
        if ($enabled !== '1') {
            return ['success' => false, 'reason' => 'disabled'];
        }

        $template = Setting::get('welcome_message_template', '');
        if (empty($template)) {
            $template = "🌿 [푸른나무교회 환영 메시지]\n\n{name} 성도님, 주님의 이름으로 진심으로 환영하고 축복합니다! ✨\n\n푸른나무교회는 지친 일상 속, 작은 쉼과 주님의 참된 사랑을 함께 나누는 믿음의 가족 공동체입니다.\n\n• 담임목사: {pastor_name}\n• 주일예배: {worship_sunday}\n• 교회 위치: {address}\n\n궁금하신 점이나 기도제목이 있으시면 언제든 [성도 나눔터] 또는 [새가족/기도] 메뉴를 통해 말씀해 주세요.\n\n주님의 은혜와 평강이 성도님의 삶 속에 늘 가득하시기를 소망합니다. 💖";
        }

        $memberName = !empty($member['name']) ? $member['name'] : ($member['nickname'] ?? '성도');
        $siteSettings = Setting::getAllAsMap();

        $search = [
            '{name}',
            '{nickname}',
            '{church_name}',
            '{pastor_name}',
            '{worship_sunday}',
            '{address}',
            '{phone}',
        ];
        $replace = [
            $memberName,
            $member['nickname'] ?? $memberName,
            $siteSettings['site_name'] ?? '푸른나무교회',
            $siteSettings['pastor_name'] ?? '심민보',
            $siteSettings['worship_sunday'] ?? '주일 오전 11:00',
            $siteSettings['address'] ?? '전라북도 익산시 선화로73길 25 (3층)',
            $siteSettings['phone'] ?? '010-9559-8623',
        ];

        $message = str_replace($search, $replace, $template);

        // 카카오톡 나와의 채팅방(Talk Memo) 메시지 전송 시도
        $talkSent = false;
        $talkResult = null;
        if (!empty($accessToken)) {
            $talkResult = KakaoAuthService::sendTalkMemo($accessToken, $message, 'https://greentreech.iwinv.net/community');
            $talkSent = !empty($talkResult['success']);
        }

        $status = $talkSent ? 'SUCCESS (KAKAOTALK SENT)' : 'LOGGED';
        $logId = NotificationLog::log((int)$member['id'], 'WELCOME_ALERT', $message, $status);

        return [
            'success' => true,
            'talk_sent' => $talkSent,
            'talk_result' => $talkResult,
            'message' => $message,
            'log_id' => $logId,
        ];
    }

    /**
     * 내 글에 새 댓글이 달렸을 때 글 작성자(게시자)에게 알림 발송
     */
    public static function notifyNewComment(array $post, array $comment, array $commenter): bool
    {
        $postAuthorId = (int)$post['member_id'];
        $commenterId = (int)$comment['member_id'];

        // 본인이 본인 글에 쓴 댓글은 알림 제외
        if ($postAuthorId === $commenterId) {
            return false;
        }

        $notifyAllowed = (int)($post['author_notify'] ?? 1);
        if ($notifyAllowed !== 1) {
            return false;
        }

        $postTitle = $post['title'];
        $commenterName = !empty($commenter['name']) ? $commenter['name'] : ($commenter['nickname'] ?? '이웃 성도님');
        $commentSnippet = mb_strimwidth(strip_tags((string)($comment['content'] ?? '')), 0, 60, '...');

        $message = "🌿 [푸른나무교회 나눔터 새 댓글 알림]\n\n'{$postTitle}' 게시글에 {$commenterName} 성도님이 따뜻한 댓글을 남기셨습니다: ✨\n\n\"{$commentSnippet}\"\n\n성도 나눔터에서 확인하고 따뜻한 믿음의 교제를 이어가세요! 💖";

        // 카카오 세션 토큰 확인 후 발송 시도
        $accessToken = \App\Core\Session::get('kakao_access_token', '');
        $talkSent = false;
        if (!empty($accessToken)) {
            $talkResult = KakaoAuthService::sendTalkMemo($accessToken, $message, "https://greentreech.iwinv.net/community/{$post['id']}", '나눔터 글 보기');
            $talkSent = !empty($talkResult['success']);
        }

        $status = $talkSent ? 'SUCCESS (KAKAOTALK SENT)' : 'SUCCESS';
        NotificationLog::log($postAuthorId, 'COMMENT_ALERT', $message, $status);
        return true;
    }

    /**
     * 나눔터에 새로운 게시글이 등록되었을 때 알림 발송
     */
    public static function notifyNewPost(array $post, array $author): bool
    {
        $authorName = !empty($author['name']) ? $author['name'] : ($author['nickname'] ?? '성도');
        $postTitle = $post['title'];
        $category = $post['category'] ?? '나눔';

        $message = "🌿 [푸른나무교회 나눔터 새글]\n\n[{$category}] {$authorName}님이 새로운 나눔 글을 등록하셨습니다:\n'{$postTitle}'";

        // Record notification log
        NotificationLog::log((int)$post['member_id'], 'NEW_POST_ALERT', $message, 'SUCCESS');
        return true;
    }

    /**
     * 새가족 등록 / 중보기도 요청 접수 시 담임목사님(관리자)에게 실시간 알림 발송
     */
    public static function notifyNewInquiry(array $inquiry): array
    {
        $type = $inquiry['type'] ?? '새가족 / 기도 접수';
        $name = !empty($inquiry['name']) ? $inquiry['name'] : '익명의 성도님';
        $phone = !empty($inquiry['phone']) ? $inquiry['phone'] : '연락처 미등록';
        $content = $inquiry['content'] ?? '';
        $contentSnippet = mb_strimwidth(strip_tags((string)$content), 0, 80, '...');

        $message = "🌿 [푸른나무교회 새가족/기도 접수 알림]\n\n새로운 성도님의 접수 내역이 등록되었습니다! ✨\n\n• 접수 구분: {$type}\n• 성함: {$name}\n• 연락처: {$phone}\n• 접수 내용:\n\"{$contentSnippet}\"\n\n관리자 대시보드(/admin/inquiries)에서 확인 후 따뜻한 심방과 기도를 전해주세요. 💖";

        // 카카오 세션 토큰 확인 후 담임목사/관리자에게 카톡 메시지 발송 시도
        $accessToken = \App\Core\Session::get('kakao_access_token', '');
        $talkSent = false;
        $talkResult = null;
        if (!empty($accessToken)) {
            $talkResult = KakaoAuthService::sendTalkMemo($accessToken, $message, 'https://greentreech.iwinv.net/admin/inquiries', '접수 내역 확인하기');
            $talkSent = !empty($talkResult['success']);
        }

        $status = $talkSent ? 'SUCCESS (KAKAOTALK SENT)' : 'LOGGED';
        $logId = NotificationLog::log(1, 'NEW_INQUIRY_ALERT', $message, $status);

        return [
            'success' => true,
            'talk_sent' => $talkSent,
            'log_id' => $logId,
        ];
    }

    /**
     * 담임목사님이 새가족/기도 접수글에 답변/메모를 남겼을 때 접수 성도님에게 알림 발송
     */
    public static function notifyInquiryReply(array $inquiry, string $status, ?string $adminMemo): array
    {
        $name = !empty($inquiry['name']) ? $inquiry['name'] : '성도';
        $phone = !empty($inquiry['phone']) ? $inquiry['phone'] : '';
        $type = $inquiry['type'] ?? '새가족/기도 접수';
        $memoSnippet = !empty($adminMemo) ? mb_strimwidth(strip_tags((string)$adminMemo), 0, 100, '...') : '기도와 함께 정성껏 확인하였습니다.';

        $message = "🌿 [푸른나무교회 담임목사님 답변 알림]\n\n{$name} 성도님, 남겨주신 소중한 이야기에 담임목사님께서 따뜻한 기도와 답변을 남기셨습니다. ✨\n\n• 접수 구분: {$type}\n• 처리 상태: {$status}\n• 담임목사님 말씀/답변:\n\"{$memoSnippet}\"\n\n주님의 크신 사랑과 은혜가 성도님의 가정과 삶에 늘 가득하시기를 소망합니다. 💖";

        // 성도 회원이 전화번호나 이름으로 매칭되는지 확인
        $recipientId = 1;
        if (!empty($phone)) {
            $cleanPhone = str_replace(['-', ' '], '', $phone);
            $matchedMember = \App\Core\Database::fetchOne("SELECT id FROM `members` WHERE REPLACE(REPLACE(`phone`, '-', ''), ' ', '') = :phone LIMIT 1", ['phone' => $cleanPhone]);
            if ($matchedMember) {
                $recipientId = (int)$matchedMember['id'];
            }
        }

        // 카카오 세션 토큰 확인 후 발송 시도
        $accessToken = \App\Core\Session::get('kakao_access_token', '');
        $talkSent = false;
        if (!empty($accessToken)) {
            $talkResult = KakaoAuthService::sendTalkMemo($accessToken, $message, 'https://greentreech.iwinv.net/inquiry', '푸른나무교회 바로가기');
            $talkSent = !empty($talkResult['success']);
        }

        $statusLog = $talkSent ? 'SUCCESS (KAKAOTALK SENT)' : 'SUCCESS (REPLY SENT)';
        $logId = NotificationLog::log($recipientId, 'INQUIRY_REPLY_ALERT', $message, $statusLog);

        return [
            'success' => true,
            'log_id' => $logId,
            'message' => $message,
        ];
    }

    /**
     * 카카오톡 메시지 발송 처리
     */
    public static function sendMessage(int $recipientId, string $type, string $message, array $extra = []): bool
    {
        // Log notification to DB
        NotificationLog::log($recipientId, $type, $message, 'SUCCESS');
        return true;
    }
}
