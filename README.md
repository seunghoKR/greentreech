# 🌿 푸른나무교회 (Green Tree Church) 웹사이트 시스템

> **"지친 일상 속, 작은 휴식과 진정한 사랑이 있는 믿음의 공동체"**  
> 전라북도 익산시 선화로73길 25 (3층) | 담임목사: 심민보

---

## 📌 프로젝트 정보

- **버전**: `v1.4.0` (최신 릴리즈: 2026-08-21)
- **개발 환경**: PHP 8.4 (Strict Typing), MariaDB / SQLite (PDO), Tailwind CSS (모바일 퍼스트)
- **공식 유튜브 채널**: [@greentreechurch0405](https://www.youtube.com/@greentreechurch0405)
- **디자인 & 아키텍처**: 누리오 (Nurio)

---

## 🏷️ 버전 히스토리 (Version History)

| 버전 | 릴리즈 일자 | 주요 변경 및 신규 기능 |
| :---: | :---: | :--- |
| **`v1.4.0`** | 2026-08-21 | **GNB 상위/하위 메뉴 계층화(Dropdown) 및 주일설교·푸른나무영상 분리**<br>- 상단 메뉴 3대 드롭다운 그룹(`교회소개 ▾`, `말씀과 영상 ▾`, `소식과 나눔 ▾`) 슬림화<br>- `주일 설교(/sermons)`와 `푸른나무 영상(/media)` 메뉴 독립 분리<br>- 모바일 4대 카드형 네비게이션 및 푸터 사이트맵 정돈 |
| **`v1.3.0`** | 2026-08-21 | **미디어 5대 정밀 분류 체계 & 실시간 카운트 뱃지**<br>- 1) 주일 설교(26편), 2) 설교 쇼츠(9편), 3) 일상&식탁 교제 쇼츠(22편), 4) 성도 간증(6편), 5) 교회 행사/찬양<br>- 카테고리별 고유 아이콘 및 실시간 편수 뱃지 탑재 |
| **`v1.2.0`** | 2026-08-21 | **올인원 목회 관리자 대시보드 & 주간 사역 체크리스트**<br>- 긴급 To-Do(미확인 새가족/기도 접수, 성도 승인 대기, 오늘 나눔터 글)<br>- 주간 목회 사역 루틴 가이드(목/금, 토, 주일, 월/화)<br>- 🔴 주일예배 실시간 생중계 띠배너 On/Off 원클릭 토글 스위치 |
| **`v1.1.0`** | 2026-08-21 | **공식 유튜브 채널(@greentreechurch0405) 실시간 연동 & 쇼츠 뷰어**<br>- 유튜브 채널 실시간 크롤링 & oEmbed 공식 메타데이터 연동 (총 62개+ 영상)<br>- 스마트폰 세로 9:16 Shorts 전용 카드 및 팝업 플레이어 탑재<br>- 웹사이트 내 1초 [최신 영상 동기화] 및 채널 구독 바로가기 |
| **`v1.0.0`** | 2026-08-21 | **푸른나무교회 모던 웹사이트 공식 런칭**<br>- PHP 8.4 MVC & 순수 Tailwind CSS 모바일 퍼스트 레이아웃<br>- 카카오 로그인 연동 및 성도 나눔터(댓글/새글 카톡 알림)<br>- 3대 내비게이션(네이버/카카오/티맵) 원클릭 앱 연동<br>- 말씀 캘리 배경화면 저장, 주보 스마트 확대 뷰어, 캡차 폼, 관리자 CMS |

---

## 🏛️ 시스템 아키텍처 (System Architecture)

```
푸른나무교회 웹 시스템
├── [Frontend] Tailwind CSS (Mobile-First) + Vanilla JS (No Heavy Frameworks)
│   ├── GNB 드롭다운 (교회소개 / 말씀과 영상 / 소식과 나눔 / 새가족·기도)
│   ├── 9:16 세로형 쇼츠 팝업 플레이어 & 16:9 와이드 풀HD 비디오 뷰어
│   ├── 3대 내비게이션 앱 원클릭 길안내 (네이버지도 / 카카오내비 / 티맵)
│   └── 캘리그라피 배경화면 다운로드 & 카톡/SNS 원클릭 공유
│
├── [Backend] PHP 8.4 Strict Typing MVC
│   ├── Core: Router (Regex), Database (PDO), View, Session, Auth
│   ├── Services:
│   │   ├── YouTubeSyncService (채널 실시간 파싱, oEmbed 메타 수집, 5대 카테고리 분류)
│   │   ├── KakaoAuthService (카카오 OAuth 2.0 간편 로그인)
│   │   └── KakaoNotificationService (댓글 및 새글 실시간 카카오 알림)
│   └── Controllers:
│       ├── HomeController, AboutController, SermonController, MediaController
│       ├── NoticeController, GalleryController, InquiryController, CommunityController
│       ├── AuthController, AdminController, CaptchaController
│
└── [Database] MariaDB / SQLite Compatible Schema
    ├── site_settings, admins, sermons, gallery, notices, inquiries
    └── members, community_posts, community_comments, notification_logs
```

---

## 📂 사이트 맵 & URL 구조 (Sitemap)

### 1. 사용자 페이지 (Public Pages)
- **홈**: `/` (최신 설교, 나눔터 온기 피드, 주일 라이브 띠배너, 3대 내비 연동)
- **교회소개 ▾**:
  - 푸른나무 이야기: `/about`
  - 섬기는 사람들 (목회자): `/pastor`
  - 예배 및 모임 안내: `/schedule`
  - 오시는 길 (지도/내비): `/location`
- **말씀과 영상 ▾**:
  - 📖 주일 설교 말씀: `/sermons` (주일예배 설교 전용)
  - 🎬 푸른나무 영상: `/media` (말씀 쇼츠, 식탁 교제 쇼츠, 성도 간증, 행사/찬양)
- **소식과 나눔 ▾**:
  - 📢 알리는 말씀 (주보/공지): `/notices`
  - 💬 성도 나눔터: `/community` (카톡 로그인 기반 글/댓글 소통)
  - 📸 교회 사진첩: `/gallery`
  - ✍️ 말씀 캘리그라피: `/calligraphy`
- **새가족 & 기도**: `/inquiry` (새가족 등록 및 기도/상담 접수 + 세션 캡차)
- **카톡 회원 인증**: `/auth/login`, `/auth/profile`, `/auth/logout`

### 2. 관리자 페이지 (Admin CMS)
- **관리자 로그인**: `/admin/login` `(admin / admin1234!)`
- **목회 관리 대시보드**: `/admin` (긴급 To-Do, 주간 사역 가이드, 6대 지표, 라이브 스위치)
- **사역 콘텐츠 관리**:
  - 설교 및 영상 관리: `/admin/sermons`
  - 주보 및 공지 관리: `/admin/notices`
  - 사진첩 및 캘리 관리: `/admin/gallery`
  - 새가족 / 기도 접수 관리: `/admin/inquiries`
  - 성도 회원 등급 승인: `/admin/members`
  - 나눔터 게시물 모니터링: `/admin/community`
  - 카카오 연동 및 알림 설정: `/admin/kakao`
  - 카톡 알림 발송 로그: `/admin/notifications`
  - 기본정보 설정: `/admin/settings`

---

## 💻 로컬 실행 및 설치 가이드 (How to Run)

### 1. 로컬 개발 서버 실행
PHP 8.4 내장 웹서버를 이용하여 즉시 실행할 수 있습니다:
```bash
php -S 127.0.0.1:8000 index.php
```

### 2. 데이터베이스 초기화
새로운 환경에서 DB를 생성하거나 리셋할 때:
```bash
# 브라우저에서 접속
http://localhost:8000/install.php
```

### 3. 유튜브 최신 영상 동기화
관리자 대시보드 또는 영상 페이지에서 **`[최신 영상 동기화]`** 버튼을 클릭하거나 다음 URL을 호출합니다:
```bash
http://localhost:8000/media/sync
```

---

## 🎨 디자인 가이드라인 요약
- **Primary Color**: 딥 포레스트 그린 (`#154212`, `#256020`) — 성경 속 푸른나무와 안식
- **Secondary Color**: 올리브 앰버 (`#55624C`, `#E8DEF8`)
- **Background Color**: 웜 베이지 & 크림 화이트 (`#FBF9F4`, `#F3EFE6`)
- **Accent Color**: 카카오 옐로우 (`#FEE500`), 유튜브 레드 (`#FF0000`)
- **Typography**: Pretendard (본문 가독성), Noto Serif KR (명조의 품격)

---

**© 2026 푸른나무교회. Created with Nurio AI.**
