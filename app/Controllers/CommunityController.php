<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Core\Auth;
use App\Core\Session;
use App\Models\CommunityPost;
use App\Models\CommunityComment;
use App\Models\Member;
use App\Services\KakaoNotificationService;

class CommunityController
{
    public function index(): void
    {
        $page = max(1, (int)($_GET['page'] ?? 1));
        $category = !empty($_GET['category']) ? trim((string)$_GET['category']) : '전체';
        $keyword = !empty($_GET['keyword']) ? trim((string)$_GET['keyword']) : null;

        $pagination = CommunityPost::getPaginated($page, 10, $category, $keyword);
        $categories = CommunityPost::getCategories();
        $currentMember = Auth::member();

        View::render('community/index', [
            'title' => '푸른나무 나눔터 - 성도 소통 & 은혜 나눔',
            'currentNav' => 'community',
            'pagination' => $pagination,
            'category' => $category,
            'categories' => $categories,
            'keyword' => $keyword,
            'currentMember' => $currentMember,
        ]);
    }

    public function show(string $id): void
    {
        $postId = (int)$id;
        $post = CommunityPost::find($postId);

        if (!$post) {
            http_response_code(404);
            View::render('home/404', [
                'title' => '게시글을 찾을 수 없습니다 - 푸른나무 나눔터'
            ]);
            return;
        }

        CommunityPost::incrementView($postId);

        $comments = CommunityComment::getByPostId($postId);
        $currentMember = Auth::member();

        View::render('community/show', [
            'title' => $post['title'] . ' - 푸른나무 나눔터',
            'currentNav' => 'community',
            'post' => $post,
            'comments' => $comments,
            'currentMember' => $currentMember,
        ]);
    }

    public function create(): void
    {
        Auth::requireMember();

        View::render('community/form', [
            'title' => '새 나눔 글 작성 - 푸른나무 나눔터',
            'currentNav' => 'community',
            'post' => null,
            'categories' => array_filter(CommunityPost::getCategories(), fn($c) => $c !== '전체'),
            'currentMember' => Auth::member(),
        ]);
    }

    public function edit(string $id): void
    {
        Auth::requireMember();

        $post = CommunityPost::find((int)$id);
        if (!$post) {
            Session::setFlash('error', '게시글을 찾을 수 없습니다.');
            header('Location: /community');
            exit;
        }

        $memberId = Auth::memberId();
        if ((int)$post['member_id'] !== $memberId && !Auth::check()) {
            Session::setFlash('error', '본인이 작성한 글만 수정할 수 있습니다.');
            header("Location: /community/{$id}");
            exit;
        }

        View::render('community/form', [
            'title' => '나눔 글 수정 - 푸른나무 나눔터',
            'currentNav' => 'community',
            'post' => $post,
            'categories' => array_filter(CommunityPost::getCategories(), fn($c) => $c !== '전체'),
            'currentMember' => Auth::member(),
        ]);
    }

    public function save(): void
    {
        Auth::requireMember();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header('Location: /community');
            exit;
        }

        $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $category = trim((string)($_POST['category'] ?? '나눔과교제'));
        $title = trim((string)($_POST['title'] ?? ''));
        $content = trim((string)($_POST['content'] ?? ''));
        $memberId = (int)Auth::memberId();
        $existingImages = !empty($_POST['existing_images']) ? (array)$_POST['existing_images'] : [];

        // Upload images
        $uploadedImages = $this->handleMultipleUploads('images', 'community');
        $allImages = array_merge($existingImages, $uploadedImages);

        if (empty($title) || empty($content)) {
            Session::setFlash('error', '제목과 내용을 모두 입력해 주세요.');
            header('Location: ' . ($id ? "/community/edit/{$id}" : "/community/create"));
            exit;
        }

        $data = [
            'member_id' => $memberId,
            'category' => $category,
            'title' => $title,
            'content' => $content,
            'image_urls' => $allImages,
        ];

        if ($id) {
            $post = CommunityPost::find($id);
            if (!$post || ((int)$post['member_id'] !== $memberId && !Auth::check())) {
                Session::setFlash('error', '수정 권한이 없습니다.');
                header('Location: /community');
                exit;
            }
            CommunityPost::update($id, $data);
            Session::setFlash('success', '게시글이 수정되었습니다.');
            header("Location: /community/{$id}");
            exit;
        } else {
            $newId = CommunityPost::create($data);
            $createdPost = CommunityPost::find($newId);
            $currentMember = Auth::member();

            // Trigger Kakao New Post Alert
            if ($createdPost && $currentMember) {
                KakaoNotificationService::notifyNewPost($createdPost, $currentMember);
            }

            Session::setFlash('success', '은혜로운 나눔 글이 등록되었습니다.');
            header("Location: /community/{$newId}");
            exit;
        }
    }

    public function delete(string $id): void
    {
        Auth::requireMember();

        $postId = (int)$id;
        $post = CommunityPost::find($postId);
        $memberId = Auth::memberId();

        if ($post && ((int)$post['member_id'] === $memberId || Auth::check())) {
            CommunityPost::delete($postId);
            Session::setFlash('success', '게시글이 삭제되었습니다.');
        } else {
            Session::setFlash('error', '삭제 권한이 없습니다.');
        }

        header('Location: /community');
        exit;
    }

    public function comment(string $id): void
    {
        Auth::requireMember();

        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!Session::validateCsrfToken($csrfToken)) {
            Session::setFlash('error', '유효하지 않은 요청입니다.');
            header("Location: /community/{$id}");
            exit;
        }

        $postId = (int)$id;
        $content = trim((string)($_POST['content'] ?? ''));
        $memberId = (int)Auth::memberId();

        if (empty($content)) {
            Session::setFlash('error', '댓글 내용을 입력해 주세요.');
            header("Location: /community/{$id}");
            exit;
        }

        $commentId = CommunityComment::create($postId, $memberId, $content);
        $post = CommunityPost::find($postId);
        $comment = CommunityComment::find($commentId);
        $commenter = Auth::member();

        // Trigger Kakao Comment Notification to Post Author
        if ($post && $comment && $commenter) {
            KakaoNotificationService::notifyNewComment($post, $comment, $commenter);
        }

        Session::setFlash('success', '따뜻한 댓글이 등록되었습니다.');
        header("Location: /community/{$postId}#comment-{$commentId}");
        exit;
    }

    public function deleteComment(string $id): void
    {
        Auth::requireMember();

        $commentId = (int)$id;
        $comment = CommunityComment::find($commentId);
        $memberId = Auth::memberId();

        if (!$comment) {
            Session::setFlash('error', '댓글을 찾을 수 없습니다.');
            header('Location: /community');
            exit;
        }

        $postId = (int)$comment['post_id'];
        if ((int)$comment['member_id'] === $memberId || Auth::check()) {
            CommunityComment::delete($commentId);
            Session::setFlash('success', '댓글이 삭제되었습니다.');
        } else {
            Session::setFlash('error', '댓글 삭제 권한이 없습니다.');
        }

        header("Location: /community/{$postId}");
        exit;
    }

    private function handleMultipleUploads(string $inputName, string $subDir): array
    {
        $urls = [];
        if (empty($_FILES[$inputName]['name']) || !is_array($_FILES[$inputName]['name'])) {
            return $urls;
        }

        $uploadBase = __DIR__ . '/../../public/uploads/' . $subDir;
        if (!is_dir($uploadBase)) {
            mkdir($uploadBase, 0755, true);
        }

        $count = count($_FILES[$inputName]['name']);
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        for ($i = 0; $i < $count; $i++) {
            if ($_FILES[$inputName]['error'][$i] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES[$inputName]['name'][$i], PATHINFO_EXTENSION));
                if (in_array($ext, $allowed, true)) {
                    $filename = uniqid('post_', true) . '.' . $ext;
                    $dest = $uploadBase . '/' . $filename;
                    if (move_uploaded_file($_FILES[$inputName]['tmp_name'][$i], $dest)) {
                        $urls[] = "/public/uploads/{$subDir}/" . $filename;
                    }
                }
            }
        }

        return $urls;
    }
}
