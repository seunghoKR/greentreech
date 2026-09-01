<div class="bg-white rounded-3xl border border-gray-200/80 shadow-sm p-6 sm:p-8 max-w-5xl mx-auto space-y-6">
    
    <!-- Top Header -->
    <div class="border-b border-gray-100 pb-4 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#154212] text-white">사진첩 관리</span>
                <span class="text-xs text-gray-500 font-semibold"><?= $item ? '게시물 수정 모드' : '신규 등록 모드' ?></span>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mt-1"><?= $item ? '갤러리 게시물 및 사진 편집' : '새 갤러리 사진첩 등록' ?></h2>
            <p class="text-xs text-gray-500 mt-0.5">사진 파일들을 드래그하여 한꺼번에 추가하고, 마우스로 순서를 바꾸거나 일괄 삭제할 수 있습니다.</p>
        </div>
        <a href="/admin/gallery" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all flex items-center gap-1.5">
            <i class="fas fa-arrow-left"></i> 목록으로
        </a>
    </div>

    <form id="galleryForm" action="/admin/gallery/save" method="POST" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= e($csrfToken) ?>">
        <?php if ($item): ?>
        <input type="hidden" name="id" value="<?= e($item['id']) ?>">
        <?php endif; ?>

        <!-- Basic Info (Category, Title, Date) -->
        <div class="bg-gray-50/70 p-5 rounded-3xl border border-gray-200 space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Category -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">카테고리</label>
                    <select name="category" class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold bg-white focus:ring-2 focus:ring-primary">
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= e($cat) ?>" <?= ($item['category'] ?? '') === $cat ? 'selected' : '' ?>><?= e($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Event Date -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">행사 / 촬영 일자</label>
                    <input 
                        type="date" 
                        name="event_date" 
                        value="<?= e($item['event_date'] ?? date('Y-m-d')) ?>" 
                        required 
                        class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold bg-white focus:ring-2 focus:ring-primary">
                </div>

                <!-- Title -->
                <div class="sm:col-span-1">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                        게시물 제목 <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        value="<?= e($item['title'] ?? '') ?>" 
                        required 
                        placeholder="예: 2026 청년부 여름 수련회" 
                        class="w-full px-4 py-2.5 rounded-2xl border border-gray-200 text-xs sm:text-sm font-bold bg-white focus:ring-2 focus:ring-primary">
                </div>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- 1. 기존 등록된 사진 관리 (수정 모드일 때만 표시) -->
        <!-- ============================================================= -->
        <?php if (!empty($item['images'])): ?>
        <div class="bg-white rounded-3xl border border-gray-200 p-5 sm:p-6 space-y-4 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-gray-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-images"></i> 현재 등록된 사진 관리 
                        <span id="existingCountBadge" class="text-xs bg-emerald-100 text-emerald-800 px-2.5 py-0.5 rounded-full font-bold">
                            총 <?= count($item['images']) ?>장
                        </span>
                    </h3>
                    <p class="text-[11px] text-gray-500 mt-0.5">
                        마우스로 드래그하여 <strong>순서를 변경</strong>하거나, 체크박스를 선택하여 <strong>일괄 삭제</strong>할 수 있습니다.
                    </p>
                </div>

                <!-- Batch Actions for Existing Images -->
                <div class="flex items-center gap-2">
                    <button type="button" onclick="toggleSelectAllExisting()" class="px-3 py-1.5 rounded-xl border border-gray-200 bg-gray-50 hover:bg-gray-100 text-xs font-bold text-gray-700 transition-colors flex items-center gap-1">
                        <i class="fas fa-check-double"></i> 전체선택
                    </button>
                    <button type="button" id="btnDeleteSelected" onclick="deleteSelectedExisting()" class="px-3 py-1.5 rounded-xl border border-red-200 bg-red-50 hover:bg-red-100 text-xs font-bold text-red-700 transition-colors flex items-center gap-1 disabled:opacity-40 disabled:cursor-not-allowed">
                        <i class="fas fa-trash-can"></i> 선택 삭제 (<span id="selectedCount">0</span>)
                    </button>
                </div>
            </div>

            <!-- Existing Images Sortable Grid -->
            <div id="existingImagesGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                <?php foreach ($item['images'] as $idx => $img): ?>
                <div class="existing-image-card relative rounded-2xl overflow-hidden border-2 border-gray-200 bg-gray-50 aspect-square group shadow-2xs cursor-grab active:cursor-grabbing transition-all hover:border-primary hover:shadow-sm" 
                     draggable="true" 
                     data-url="<?= e($img) ?>">
                    
                    <!-- Thumbnail Image -->
                    <img src="<?= e($img) ?>" alt="Photo" class="w-full h-full object-cover select-none pointer-events-none">
                    
                    <!-- Hidden Form Input for Order -->
                    <input type="hidden" name="existing_images[]" value="<?= e($img) ?>" class="existing-image-input">

                    <!-- Order Badge -->
                    <div class="image-order-badge absolute top-2 left-2 px-2 py-0.5 rounded-lg text-[10px] font-black bg-black/70 text-white backdrop-blur-xs flex items-center gap-1">
                        <i class="fas fa-grip-vertical text-gray-300"></i>
                        <span class="order-num"><?= $idx + 1 ?></span>
                        <?php if ($idx === 0): ?>
                        <span class="thumb-tag text-[9px] text-amber-300 font-bold ml-0.5">대표</span>
                        <?php endif; ?>
                    </div>

                    <!-- Top Right Checkbox & Single Delete Button -->
                    <div class="absolute top-2 right-2 flex items-center gap-1">
                        <label class="w-6 h-6 rounded-lg bg-white/90 shadow-sm flex items-center justify-center cursor-pointer hover:bg-white transition-colors" title="선택">
                            <input type="checkbox" class="existing-check rounded border-gray-300 text-primary focus:ring-0 cursor-pointer" onchange="updateSelectedCount()">
                        </label>
                        <button type="button" onclick="removeSingleExisting(this)" class="w-6 h-6 rounded-lg bg-red-500/90 text-white shadow-sm flex items-center justify-center hover:bg-red-600 transition-colors" title="삭제">
                            <i class="fas fa-times text-xs"></i>
                        </button>
                    </div>

                    <!-- Bottom Overlay Bar on Hover -->
                    <div class="absolute inset-x-0 bottom-0 p-1.5 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-between text-[10px] text-white">
                        <span class="truncate px-1"><i class="fas fa-arrows-up-down-left-right text-gray-300"></i> 드래그로 순서 이동</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Notice when all existing images are deleted -->
            <div id="noExistingNotice" class="hidden text-center py-8 text-xs text-gray-400 border-2 border-dashed border-gray-200 rounded-2xl">
                <i class="fas fa-trash-can text-gray-300 text-2xl mb-1 block"></i>
                기존 사진이 모두 삭제되었습니다. 아래에서 새 사진을 추가해 주세요.
            </div>
        </div>
        <?php endif; ?>

        <!-- ============================================================= -->
        <!-- 2. 드래그 앤 드롭 파일 업로드 & 순서 변경 영역 -->
        <!-- ============================================================= -->
        <div class="bg-white rounded-3xl border border-gray-200 p-5 sm:p-6 space-y-4 shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <div>
                    <h3 class="text-sm font-bold text-[#154212] flex items-center gap-2">
                        <i class="fas fa-cloud-arrow-up"></i> <?= $item ? '새 사진 추가 업로드' : '사진 파일 업로드' ?>
                    </h3>
                    <p class="text-[11px] text-gray-500 mt-0.5">
                        사진들을 영역에 드래그하여 놓거나 파일 선택을 통해 여러 장을 한 번에 추가할 수 있습니다.
                    </p>
                </div>
                <button type="button" id="btnClearNewFiles" onclick="clearAllNewFiles()" class="hidden px-3 py-1.5 rounded-xl border border-gray-200 bg-gray-50 hover:bg-gray-100 text-xs font-bold text-gray-600 transition-colors">
                    <i class="fas fa-rotate-left"></i> 추가 목록 비우기
                </button>
            </div>

            <!-- Drag & Drop Zone -->
            <div id="dropZone" 
                 class="relative rounded-3xl border-2 border-dashed border-emerald-300 bg-emerald-50/40 hover:bg-emerald-50/80 transition-all p-8 sm:p-10 text-center cursor-pointer group flex flex-col items-center justify-center gap-3">
                
                <input 
                    type="file" 
                    id="fileInput" 
                    name="images[]" 
                    multiple 
                    accept="image/jpeg,image/png,image/webp,image/gif" 
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                <div class="w-14 h-14 rounded-2xl bg-white text-emerald-700 shadow-sm border border-emerald-100 flex items-center justify-center text-2xl group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <i class="fas fa-images"></i>
                </div>

                <div>
                    <p class="text-sm sm:text-base font-bold text-gray-800">
                        사진 파일들을 이곳으로 드래그해서 놓으세요
                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                        또는 <span class="text-primary font-bold underline underline-offset-2">여기를 클릭하여 파일 선택</span> (JPG, PNG, WEBP, GIF 다중 선택 가능)
                    </p>
                </div>

                <div class="flex items-center gap-2 text-[11px] text-emerald-800 bg-white/80 px-3 py-1 rounded-full border border-emerald-200/80 font-medium">
                    <i class="fas fa-magic text-emerald-600"></i> 업로드 전 미리보기에서 마우스로 순서를 자유롭게 바꿀 수 있습니다.
                </div>
            </div>

            <!-- New Files Preview & Reorder Grid -->
            <div id="newFilesSection" class="hidden space-y-3 pt-2">
                <div class="flex items-center justify-between text-xs text-gray-600 font-bold">
                    <span class="flex items-center gap-1.5 text-[#154212]">
                        <i class="fas fa-list-ol"></i> 업로드 대기 사진 (<span id="newFilesCount">0</span>장)
                        <span class="text-[11px] font-normal text-gray-500">※ 드래그하여 업로드 순서를 변경하세요. 맨 앞 사진이 대표 사진이 됩니다.</span>
                    </span>
                </div>

                <div id="newFilesGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                    <!-- Dynamic preview cards inserted here -->
                </div>
            </div>
        </div>

        <!-- Content / Description -->
        <div class="bg-white rounded-3xl border border-gray-200 p-5 sm:p-6 space-y-2 shadow-sm">
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">
                <i class="fas fa-pencil-alt text-primary mr-1"></i> 사진 설명 및 나눔 글
            </label>
            <textarea 
                name="content" 
                rows="5" 
                placeholder="은혜로운 사진들에 대한 설명이나 성도들과 나누고 싶은 이야기를 적어주세요." 
                class="w-full px-4 py-3 rounded-2xl border border-gray-200 text-xs sm:text-sm focus:ring-2 focus:ring-primary resize-none"><?= e($item['content'] ?? '') ?></textarea>
        </div>

        <!-- Actions -->
        <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="/admin/gallery" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-xs font-bold transition-all">
                취소
            </a>
            <button type="submit" id="btnSubmitForm" class="px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-2xl text-xs sm:text-sm font-bold shadow-md transition-all flex items-center gap-2">
                <i class="fas fa-check"></i> <?= $item ? '게시물 수정 저장' : '새 게시물 등록 완료' ?>
            </button>
        </div>

    </form>

</div>

<!-- ========================================================================= -->
<!-- 💡 Drag & Drop, Reordering, Batch Delete JavaScript Engine -->
<!-- ========================================================================= -->
<script>
// State for new files queue (File objects)
let newFilesList = [];

// Drag and drop state
let draggedCard = null;
let draggedCardType = null; // 'existing' or 'new'

document.addEventListener('DOMContentLoaded', () => {
    initDropZone();
    initExistingSortable();
});

// ==========================================
// 1. Drop Zone Event Handlers
// ==========================================
function initDropZone() {
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');

    if (!dropZone || !fileInput) return;

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.add('border-primary', 'bg-emerald-100/70', 'scale-[1.01]');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('border-primary', 'bg-emerald-100/70', 'scale-[1.01]');
        });
    });

    dropZone.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        if (files && files.length > 0) {
            handleIncomingFiles(files);
        }
    });

    fileInput.addEventListener('change', (e) => {
        if (fileInput.files && fileInput.files.length > 0) {
            handleIncomingFiles(fileInput.files);
        }
    });
}

function handleIncomingFiles(fileList) {
    const validImageTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    let addedCount = 0;

    Array.from(fileList).forEach(file => {
        if (validImageTypes.includes(file.type) || file.name.match(/\.(jpe?g|png|webp|gif)$/i)) {
            newFilesList.push(file);
            addedCount++;
        }
    });

    if (addedCount > 0) {
        renderNewFilesGrid();
        syncFileInputDataTransfer();
    }
}

// Render Preview Grid for New Files
function renderNewFilesGrid() {
    const container = document.getElementById('newFilesGrid');
    const section = document.getElementById('newFilesSection');
    const countSpan = document.getElementById('newFilesCount');
    const btnClear = document.getElementById('btnClearNewFiles');

    if (!container) return;

    if (newFilesList.length === 0) {
        section.classList.add('hidden');
        btnClear.classList.add('hidden');
        container.innerHTML = '';
        return;
    }

    section.classList.remove('hidden');
    btnClear.classList.remove('hidden');
    countSpan.textContent = newFilesList.length;
    container.innerHTML = '';

    const hasExisting = document.querySelectorAll('.existing-image-card').length > 0;

    newFilesList.forEach((file, index) => {
        const card = document.createElement('div');
        card.className = 'new-file-card relative rounded-2xl overflow-hidden border-2 border-emerald-300 bg-gray-50 aspect-square group shadow-2xs cursor-grab active:cursor-grabbing transition-all hover:border-primary hover:shadow-sm';
        card.draggable = true;
        card.dataset.index = index;

        // Order calculation
        const displayOrder = hasExisting ? (document.querySelectorAll('.existing-image-card').length + index + 1) : (index + 1);
        const isThumb = (!hasExisting && index === 0);

        card.innerHTML = `
            <img src="${URL.createObjectURL(file)}" alt="Preview" class="w-full h-full object-cover select-none pointer-events-none">
            <div class="absolute top-2 left-2 px-2 py-0.5 rounded-lg text-[10px] font-black bg-emerald-800/80 text-white backdrop-blur-xs flex items-center gap-1">
                <i class="fas fa-grip-vertical text-emerald-300"></i>
                <span>${displayOrder}</span>
                ${isThumb ? '<span class="text-[9px] text-amber-300 font-bold ml-0.5">대표</span>' : ''}
            </div>
            <button type="button" onclick="removeNewFile(${index})" class="absolute top-2 right-2 w-6 h-6 rounded-lg bg-red-500/90 text-white shadow-sm flex items-center justify-center hover:bg-red-600 transition-colors" title="제외">
                <i class="fas fa-times text-xs"></i>
            </button>
            <div class="absolute inset-x-0 bottom-0 p-1.5 bg-gradient-to-t from-black/80 to-transparent text-[10px] text-white truncate px-2">
                ${escapeHtml(file.name)}
            </div>
        `;

        // Drag events for new file cards
        card.addEventListener('dragstart', handleNewDragStart);
        card.addEventListener('dragover', handleDragOver);
        card.addEventListener('drop', handleNewDrop);
        card.addEventListener('dragend', handleDragEnd);

        container.appendChild(card);
    });
}

function removeNewFile(index) {
    newFilesList.splice(index, 1);
    renderNewFilesGrid();
    syncFileInputDataTransfer();
}

function clearAllNewFiles() {
    newFilesList = [];
    renderNewFilesGrid();
    syncFileInputDataTransfer();
}

// Sync newFilesList with hidden FileInput using DataTransfer API
function syncFileInputDataTransfer() {
    const fileInput = document.getElementById('fileInput');
    if (!fileInput) return;

    const dataTransfer = new DataTransfer();
    newFilesList.forEach(file => {
        dataTransfer.items.add(file);
    });
    fileInput.files = dataTransfer.files;
}

// ==========================================
// 2. Existing Images Sortable & Batch Delete
// ==========================================
function initExistingSortable() {
    const cards = document.querySelectorAll('.existing-image-card');
    cards.forEach(card => {
        card.addEventListener('dragstart', handleExistingDragStart);
        card.addEventListener('dragover', handleDragOver);
        card.addEventListener('drop', handleExistingDrop);
        card.addEventListener('dragend', handleDragEnd);
    });
    updateExistingOrders();
}

function handleExistingDragStart(e) {
    draggedCard = this;
    draggedCardType = 'existing';
    this.classList.add('opacity-40', 'scale-95');
    e.dataTransfer.effectAllowed = 'move';
}

function handleNewDragStart(e) {
    draggedCard = this;
    draggedCardType = 'new';
    this.classList.add('opacity-40', 'scale-95');
    e.dataTransfer.effectAllowed = 'move';
}

function handleDragOver(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'move';
    return false;
}

function handleExistingDrop(e) {
    e.stopPropagation();
    if (draggedCardType !== 'existing' || !draggedCard || draggedCard === this) return;

    const grid = document.getElementById('existingImagesGrid');
    const cards = Array.from(grid.querySelectorAll('.existing-image-card'));
    const fromIndex = cards.indexOf(draggedCard);
    const toIndex = cards.indexOf(this);

    if (fromIndex < toIndex) {
        grid.insertBefore(draggedCard, this.nextSibling);
    } else {
        grid.insertBefore(draggedCard, this);
    }
    updateExistingOrders();
}

function handleNewDrop(e) {
    e.stopPropagation();
    if (draggedCardType !== 'new' || !draggedCard || draggedCard === this) return;

    const fromIndex = parseInt(draggedCard.dataset.index, 10);
    const toIndex = parseInt(this.dataset.index, 10);

    const movedItem = newFilesList.splice(fromIndex, 1)[0];
    newFilesList.splice(toIndex, 0, movedItem);

    renderNewFilesGrid();
    syncFileInputDataTransfer();
}

function handleDragEnd() {
    if (draggedCard) {
        draggedCard.classList.remove('opacity-40', 'scale-95');
    }
    draggedCard = null;
    draggedCardType = null;
}

// Update badges for existing images
function updateExistingOrders() {
    const cards = document.querySelectorAll('.existing-image-card');
    const countBadge = document.getElementById('existingCountBadge');
    const noNotice = document.getElementById('noExistingNotice');

    if (countBadge) {
        countBadge.textContent = `총 ${cards.length}장`;
    }

    if (cards.length === 0 && noNotice) {
        noNotice.classList.remove('hidden');
    } else if (noNotice) {
        noNotice.classList.add('hidden');
    }

    cards.forEach((card, idx) => {
        const orderSpan = card.querySelector('.order-num');
        const thumbTag = card.querySelector('.thumb-tag');
        if (orderSpan) orderSpan.textContent = idx + 1;

        if (idx === 0) {
            if (!thumbTag) {
                const badge = card.querySelector('.image-order-badge');
                if (badge) {
                    const tag = document.createElement('span');
                    tag.className = 'thumb-tag text-[9px] text-amber-300 font-bold ml-0.5';
                    tag.textContent = '대표';
                    badge.appendChild(tag);
                }
            }
        } else {
            if (thumbTag) thumbTag.remove();
        }
    });

    // Also re-render new files order numbers if existing count changed
    if (newFilesList.length > 0) {
        renderNewFilesGrid();
    }
}

// Delete single existing image
function removeSingleExisting(btn) {
    const card = btn.closest('.existing-image-card');
    if (card) {
        card.style.transform = 'scale(0.8)';
        card.style.opacity = '0';
        setTimeout(() => {
            card.remove();
            updateExistingOrders();
            updateSelectedCount();
        }, 150);
    }
}

// Toggle select all existing images
let isAllSelected = false;
function toggleSelectAllExisting() {
    const checkboxes = document.querySelectorAll('.existing-check');
    isAllSelected = !isAllSelected;
    checkboxes.forEach(cb => {
        cb.checked = isAllSelected;
    });
    updateSelectedCount();
}

function updateSelectedCount() {
    const selected = document.querySelectorAll('.existing-check:checked');
    const countSpan = document.getElementById('selectedCount');
    const btnDelete = document.getElementById('btnDeleteSelected');

    if (countSpan) countSpan.textContent = selected.length;
    if (btnDelete) {
        btnDelete.disabled = (selected.length === 0);
    }
}

// Delete selected existing images in batch
function deleteSelectedExisting() {
    const selectedCheckboxes = document.querySelectorAll('.existing-check:checked');
    if (selectedCheckboxes.length === 0) return;

    if (!confirm(`선택하신 ${selectedCheckboxes.length}장의 사진을 삭제하시겠습니까?`)) {
        return;
    }

    selectedCheckboxes.forEach(cb => {
        const card = cb.closest('.existing-image-card');
        if (card) card.remove();
    });

    updateExistingOrders();
    updateSelectedCount();
}

function escapeHtml(str) {
    return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
}
</script>
