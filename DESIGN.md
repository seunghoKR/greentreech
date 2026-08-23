# 🎨 푸른나무교회 (Green Tree Church) UI/UX Design System

> **버전**: `v1.4.0`  
> **총괄 디자이너**: 누리오 (Nurio)  
> **디자인 철학**: "따뜻한 쉼과 푸르른 생명력이 넘치는 모던 크리스천 커뮤니티"

---

## 1. 🌈 Color Palette (색상 시스템)

```
[Primary Brand - 딥 포레스트 그린]
- Primary: #154212 (성경 속 푸른나무와 영적 안식)
- Primary Container: #256020 (안정감과 신뢰감)
- Primary Fixed: #D2E8CE (부드러운 하이라이트)

[Secondary - 올리브 & 앰버]
- Secondary: #55624C (따뜻한 대지)
- Secondary Container: #D8E7CB (온화한 배경)

[Background & Surface - 웜톤 아이보리]
- Surface Low: #FBF9F4 (지친 눈을 편안하게 해주는 부드러운 크림)
- Surface High: #F3EFE6
- Outline Variant: #C6C8C0

[Accent & Badges - 직관적 컬러]
- Kakao Yellow: #FEE500 (친숙한 카톡 로그인)
- YouTube Red: #FF0000 / #DC2626 (생방송 & 쇼츠 뱃지)
- Meal / Food Orange: #EA580C (주일 점심 식탁 교제)
- Testimony Purple: #7E22CE (은혜로운 성도 간증)
```

---

## 2. 🔤 Typography (타이포그래피)

- **Headings & Church Name (헤드라인 / 교회명 / 명언)**:
  - `font-serif-kr`: **Noto Serif KR** (클래식한 품격과 따뜻한 신앙의 울림)
  - 가중치: `font-bold` (700), `font-medium` (500)
- **Body & Controls (본문 / 버튼 / 관리자 UI)**:
  - `font-sans`: **Pretendard**, `-apple-system`, `BlinkMacSystemFont` (모바일/PC 최상의 가독성)
  - 가중치: `font-normal` (400), `font-semibold` (600), `font-bold` (700)

---

## 3. 📐 Layout & Breakpoints (반응형 레이아웃)

- **Mobile First Approach**: 모든 화면은 스마트폰 한 손 조작을 1순위로 설계
- **Breakpoints**:
  - `sm`: 640px (대형 스마트폰 / 가로모드)
  - `md`: 768px (태블릿 및 소형 랩톱)
  - `lg`: 1024px (데스크톱 GNB 및 사이드바 전환)
  - `xl`: 1280px (최대 너비 6xl~7xl 컨테이너 제한)

---

## 4. 🧩 Core UI Components (핵심 컴포넌트)

### 1) 상단 GNB 드롭다운 네비게이션
- 마우스 오버 시 글래스모피즘(`backdrop-blur-md bg-white/95`)이 적용된 플로팅 서브메뉴 카드
- 각 하위 메뉴마다 고유 아이콘과 2줄 보조 설명(Description)을 배치하여 시각적 직관성 극대화

### 2) 📱 세로형 9:16 Shorts 전용 뷰어
- 모바일 쇼츠 비율에 맞춘 9:16 aspect ratio 카드
- 터치 시 검정 배경의 세로 팝업 모달이 즉시 열리며 자동 재생

### 3) 🎬 가로형 16:9 주일 설교 플레이어
- 설교 본문, 설교자, 성경 구절이 함께 표시되는 와이드 카드
- 1080p 풀HD 가로 팝업 모달 라이트박스 지원

### 4) 🚗 3대 내비게이션 원클릭 길안내 카드
- 네이버지도(초록), 카카오내비(노랑), 티맵(파랑) 고유 브랜드 컬러를 감각적으로 조합한 앱 연동 버튼

### 5) 💬 성도 나눔터 피드 & 카드
- 작성자 프로필 사진, 뱃지(등록성도/청년부/목회자), 댓글 수, 좋아요 및 카톡 공유 버튼

---

**© 2026 푸른나무교회 Design System by Nurio**
