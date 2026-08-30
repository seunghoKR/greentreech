<div class="space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl font-bold text-gray-900">사진첩 및 말씀 캘리 관리</h1>
            <p class="text-xs text-gray-500 mt-1">교회 행사 사진, 말씀 캘리그라피, 선교 소식을 업로드하고 관리합니다.</p>
        </div>
        <a href="/admin/gallery/create" class="px-4 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs font-bold shadow-sm transition-all inline-flex items-center gap-1.5 self-start whitespace-nowrap shrink-0">
            <i class="fas fa-plus"></i> <span>새 갤러리 등록</span>
        </a>
    </div>

    <!-- Category Filter Tabs -->
    <div class="flex gap-2 overflow-x-auto pb-1">
        <?php foreach ($categories as $cat): ?>
        <a href="/admin/gallery?category=<?= urlencode($cat) ?>" 
           class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all whitespace-nowrap <?= ($category ?? '전체') === $cat ? 'bg-primary text-white shadow-sm' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' ?>">
            <?= e($cat) ?>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Grid Cards -->
    <?php if (!empty($pagination['items'])): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($pagination['items'] as $item): ?>
        <div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm overflow-hidden flex flex-col justify-between">
            <div>
                <div class="relative aspect-video bg-gray-100 overflow-hidden">
                    <img src="<?= e($item['thumbnail_url'] ?: '/public/assets/images/logo.png') ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover">
                    <span class="absolute top-2 left-2 px-2 py-0.5 rounded text-[10px] font-bold bg-black/60 text-white">
                        <?= e($item['category']) ?>
                    </span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-sm text-gray-900 truncate"><?= e($item['title']) ?></h3>
                    <p class="text-xs text-gray-500 mt-1"><i class="far fa-calendar-alt mr-1"></i><?= e($item['event_date']) ?></p>
                </div>
            </div>
            
            <div class="p-3 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between">
                <span class="text-xs text-gray-400">조회수 <?= e($item['view_count']) ?></span>
                <div class="flex items-center gap-2">
                    <a href="/admin/gallery/edit/<?= e($item['id']) ?>" class="p-1.5 text-blue-600 hover:text-blue-800 text-xs font-bold">
                        <i class="fas fa-edit"></i> 수정
                    </a>
                    <a href="/admin/gallery/delete/<?= e($item['id']) ?>" onclick="return confirm('정말 삭제하시겠습니까?');" class="p-1.5 text-red-500 hover:text-red-700 text-xs font-bold">
                        <i class="fas fa-trash-alt"></i> 삭제
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="bg-white rounded-3xl border border-gray-200/80 p-12 text-center text-xs text-gray-400">
        등록된 게시물이 없습니다.
    </div>
    <?php endif; ?>

</div>
