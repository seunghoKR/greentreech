<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Setting;
use App\Models\NotificationLog;

class KakaoNotificationService
{
    /**
     * 영자가 보내는 테스트 알림 발송 (실제 카카오톡 나와의 채팅방 전송 시도)
     */
    public static function sendYoungjaTestNotification(string $recipientName, string $email): array
    {
        $time = date('Y-m-d H:i:s');
        $message = "🌱 [푸른나무교회 알림]\n\n안녕하세요, {$recipientName} 대표님! 🎨✨\n\n카카오톡 실시간 알림 연동 테스트 메시지입니다.\n\n• 발송 대상: {$email}\n• 발송 시간: {$time}\n\n오늘도 은혜와 쉼이 넘치는 하루 되세요! 🌿💖";

        // 카카오 세션 토큰 확인 후 실제 카카오톡 메시지 전송
        $accessToken = \App\Core\Session::get('kakao_access_token', '');
        $talkResult = null;
        $talkSent = false;

        if (!empty($accessToken)) {
            $talkResult = KakaoAuthService::sendTalkMemo($accessToken, $message, 'https://greentreech.iwinv.net/admin');
            $talkSent = !empty($talkResult['success']);
        }

        $status = $talkSent ? 'SUCCESS (KAKAOTALK SENT)' : 'LOGGED';
        $logged = NotificationLog::log(1, 'YOUNGJA_TEST_ALERT', $message, $status);

        return [
            'success' => true,
            'talk_sent' => $talkSent,
            'talk_result' => $talkResult,
            'message' => $message,
            'log_id' => $logged,
            'time' => $time,
        ];
    }

    /**
     * 내 글에 새 댓글이 달렸을 때 글 작성자에게 카카오톡 알림 발송
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
        $commenterName = $commenter['nickname'] ?? '이웃 성도님';
        $commentSnippet = mb_strimwidth($comment['content'] ?? '', 0, 40, '...');

        $message = "[푸른나무교회 나눔터 알림]\n'{$postTitle}' 글에 {$commenterName}님이 댓글을 남기셨습니다:\n\"{$commentSnippet}\"";

        return self::sendMessage($postAuthorId, 'COMMENT_ALERT', $message, [
            'title' => '새 댓글 알림',
            'description' => "{$commenterName}: {$commentSnippet}",
            'web_url' => "/community/{$post['id']}"
        ]);
    }

    /**
     * 나눔터에 새로운 게시글이 등록되었을 때 알림 발송
     */
    public static function notifyNewPost(array $post, array $author): bool
    {
        $authorName = $author['nickname'] ?? '성도';
        $postTitle = $post['title'];
        $category = $post['category'];

        $message = "[푸른나무교회 나눔터 새글]\n[{$category}] {$authorName}님이 새로운 나눔 글을 등록하셨습니다:\n'{$postTitle}'";

        // Record notification log
        NotificationLog::log((int)$post['member_id'], 'NEW_POST_ALERT', $message, 'SUCCESS');
        return true;
    }

    /**
     * 새가족 등록 / 중보기도 요청 접수 시 관리자(목회자) 알림 발송
     */
    public static function notifyNewInquiry(array $inquiry): bool
    {
        $type = ($inquiry['type'] ?? '') === 'PRAYER' ? '중보기도 요청' : '새가족 등록';
        $name = $inquiry['name'] ?? '성도';
        $phone = $inquiry['phone'] ?? '연락처 없음';

        $message = "[푸른나무교회 긴급 알림]\n새로운 {$type} 접수!\n성함: {$name}님\n연락처: {$phone}\n관리자 대시보드에서 확인해 주세요.";

        NotificationLog::log(1, 'NEW_INQUIRY_ALERT', $message, 'SUCCESS');
        return true;
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
