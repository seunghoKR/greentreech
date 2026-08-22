-- =========================================================================
-- 푸른나무교회 (Green Tree Church) MariaDB Schema & Initial Data
-- =========================================================================

-- 1. 사이트 환경설정
CREATE TABLE IF NOT EXISTS `site_settings` (
  `key_name` VARCHAR(50) PRIMARY KEY,
  `key_value` TEXT NULL,
  `description` VARCHAR(100) NULL,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `site_settings` (`key_name`, `key_value`, `description`) VALUES
('site_name', '푸른나무교회', '교회명'),
('pastor_name', '심민보', '담임목사명'),
('phone', '010-9559-8623', '대표 연락처'),
('email', 'nuriohga@gmail.com', '대표 이메일'),
('address', '전라북도 익산시 선화로73길 25 (3층)', '교회 주소'),
('worship_sunday', '주일 오전 11:00', '주일예배 시간'),
('worship_study', '청년 BIBLE TIME / 제자훈련', '성경공부 모임'),
('main_slogan', '지친 일상 속, 작은 휴식과 진정한 사랑이 있는 공간', '메인 슬로건'),
('kakao_map_key', '', '카카오맵 Javascript 키'),
('naver_map_url', 'https://naver.me/xqb2I1g5', '네이버 지도 바로보기 URL'),
('google_map_embed', 'https://maps.google.com/maps?q=%EC%A0%84%EB%B6%81%20%EC%9D%B5%EC%82%B0%EC%8B%9C%20%EC%84%A0%ED%99%94%EB%A1%9C73%EA%B8%B8%2025&t=&z=17&ie=UTF8&iwloc=&output=embed', '구글 지도 임베드 URL')
ON DUPLICATE KEY UPDATE `description` = VALUES(`description`);

-- 2. 관리자 계정 (기본: admin / admin1234!)
CREATE TABLE IF NOT EXISTS `admins` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password_hash` VARCHAR(255) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `role` VARCHAR(50) DEFAULT '담임목사 (최고관리자)',
  `permissions` TEXT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_login` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- password_hash for 'admin1234!' using PASSWORD_DEFAULT (BCrypt)
INSERT INTO `admins` (`id`, `username`, `password_hash`, `name`, `role`, `permissions`) 
VALUES (1, 'admin', '$2y$10$tZc5.o8s54t9f2i1eAeafejV08uEaVzI3v4LhO5P4KxOqP.k5C2a2', '심민보 담임목사', '담임목사 (최고관리자)', '["all"]')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`), `role` = VALUES(`role`), `permissions` = VALUES(`permissions`);

-- 3. 주일 설교 & 영상 (유튜브 영상 연동)
CREATE TABLE IF NOT EXISTS `sermons` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(200) NOT NULL,
  `category` VARCHAR(50) DEFAULT '주일 설교',
  `video_type` VARCHAR(20) DEFAULT 'video',
  `preacher` VARCHAR(50) DEFAULT '심민보 목사',
  `scripture` VARCHAR(100) NULL,
  `sermon_date` DATE NOT NULL,
  `youtube_id` VARCHAR(50) NULL,
  `content` TEXT NULL,
  `view_count` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. 교회 사진첩 및 캘리그라피
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category` ENUM('사진첩', '캘리그라피', '선교소식') DEFAULT '사진첩',
  `title` VARCHAR(200) NOT NULL,
  `content` TEXT NULL,
  `thumbnail_url` VARCHAR(255) NOT NULL,
  `image_urls` JSON NULL,
  `event_date` DATE NULL,
  `view_count` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. 알리는 말씀 (공지/주보)
CREATE TABLE IF NOT EXISTS `notices` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category` ENUM('공지사항', '주보', '교회소식') DEFAULT '공지사항',
  `title` VARCHAR(200) NOT NULL,
  `content` TEXT NOT NULL,
  `attachment_url` VARCHAR(255) NULL,
  `view_count` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. 새가족 등록 및 기도/상담 요청
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `type` ENUM('새가족등록', '기도요청', '상담문의') DEFAULT '새가족등록',
  `name` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `content` TEXT NOT NULL,
  `is_private` TINYINT(1) DEFAULT 1,
  `admin_memo` TEXT NULL,
  `status` ENUM('접수', '확인완료', '처리완료') DEFAULT '접수',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. 카카오 연동 성도 회원
CREATE TABLE IF NOT EXISTS `members` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `kakao_id` VARCHAR(100) NOT NULL UNIQUE,
  `name` VARCHAR(50) NULL,
  `nickname` VARCHAR(100) NOT NULL,
  `profile_image` VARCHAR(255) NULL,
  `email` VARCHAR(100) NULL,
  `phone` VARCHAR(30) NULL,
  `role` VARCHAR(50) DEFAULT '등록성도',
  `notify_kakao` TINYINT(1) DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `last_login` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. 성도 나눔터 게시글
CREATE TABLE IF NOT EXISTS `community_posts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `member_id` INT NOT NULL,
  `category` VARCHAR(50) DEFAULT '나눔과교제',
  `title` VARCHAR(200) NOT NULL,
  `content` TEXT NOT NULL,
  `image_urls` JSON NULL,
  `view_count` INT DEFAULT 0,
  `comment_count` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. 성도 나눔터 댓글
CREATE TABLE IF NOT EXISTS `community_comments` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `post_id` INT NOT NULL,
  `member_id` INT NOT NULL,
  `content` TEXT NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_post_id` (`post_id`),
  INDEX `idx_member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. 알림 발송 로그
CREATE TABLE IF NOT EXISTS `notification_logs` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `recipient_id` INT NULL,
  `type` VARCHAR(50) NOT NULL,
  `message` TEXT NOT NULL,
  `status` VARCHAR(20) DEFAULT 'SUCCESS',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 초기 샘플 데이터 시딩
INSERT INTO `sermons` (`title`, `preacher`, `scripture`, `sermon_date`, `youtube_id`, `content`, `view_count`) VALUES
('그리스도 안에서 누리는 참된 쉼과 회복', '심민보 목사', '마태복음 11:28-30', '2026-08-16', 'dQw4w9WgXcQ', '수고하고 무거운 짐 진 자들아 다 내게로 오라 내가 너희를 쉬게 하리라. 주님 안에서 참된 평안을 누리는 삶에 대한 말씀입니다.', 42),
('믿음으로 심고 사랑으로 자라나는 공동체', '심민보 목사', '고린도전서 3:6-9', '2026-08-09', 'dQw4w9WgXcQ', '우리는 하나님의 동역자들이요 너희는 하나님의 밭이요 하나님의 집이니라.', 38),
('서로 사랑할 때 비로소 드러나는 하나님', '심민보 목사', '요한일서 4:11-12', '2026-08-02', 'dQw4w9WgXcQ', '사랑하는 자들아 하나님이 이같이 우리를 사랑하셨은즉 우리도 서로 사랑하는 것이 마땅하도다.', 55);

INSERT INTO `notices` (`category`, `title`, `content`, `attachment_url`) VALUES
('공지사항', '2026년 하반기 청년 성경모임(BIBLE TIME) 안내', '매주 토요일 오후 2시 청년 BIBLE TIME이 진행됩니다. 많은 참여 바랍니다.', NULL),
('주보', '2026년 8월 16일 주보', '주일 예배 순서 및 이번 주 교회 소식 안내입니다.', NULL),
('교회소식', '푸른나무교회 새단장 및 웹사이트 오픈 감사 안내', '성도 여러분의 기도와 응원 속에 새롭게 정돈된 홈페이지가 오픈되었습니다.', NULL);

INSERT INTO `gallery` (`category`, `title`, `content`, `thumbnail_url`, `image_urls`, `event_date`) VALUES
('사진첩', '여름 성도 나눔 및 친교의 시간', '함께 모여 따뜻한 교제를 나누는 감사한 주일이었습니다.', '/public/assets/images/sample1.jpg', '["/public/assets/images/sample1.jpg"]', '2026-08-15'),
('캘리그라피', '말씀 캘리 - 여호와는 나의 목자시니', '시편 23편 말씀 캘리그라피 작품입니다.', '/public/assets/images/sample2.jpg', '["/public/assets/images/sample2.jpg"]', '2026-08-10'),
('선교소식', '지역 사회와 함께하는 나눔 사역 소식', '이웃에게 전하는 그리스도의 사랑과 온기입니다.', '/public/assets/images/sample3.jpg', '["/public/assets/images/sample3.jpg"]', '2026-08-05');

