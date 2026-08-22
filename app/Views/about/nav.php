<div class="mb-10 w-full overflow-x-auto scrollbar-none -mx-4 px-4 sm:mx-0 sm:px-0 flex sm:justify-center">
    <div class="inline-flex p-1.5 rounded-2xl bg-surface-container border border-outline-variant/30 text-xs font-semibold shrink-0">
        <a href="/about" class="px-3.5 sm:px-4 py-2 rounded-xl transition-all whitespace-nowrap <?= ($tab ?? '') === 'intro' ? 'bg-primary text-white shadow-sm font-bold' : 'text-gray-600 hover:text-primary' ?>">
            푸른나무교회 이야기
        </a>
        <a href="/pastor" class="px-3.5 sm:px-4 py-2 rounded-xl transition-all whitespace-nowrap <?= ($tab ?? '') === 'pastor' ? 'bg-primary text-white shadow-sm font-bold' : 'text-gray-600 hover:text-primary' ?>">
            섬기는 사람들 (담임목사)
        </a>
        <a href="/schedule" class="px-3.5 sm:px-4 py-2 rounded-xl transition-all whitespace-nowrap <?= ($tab ?? '') === 'schedule' ? 'bg-primary text-white shadow-sm font-bold' : 'text-gray-600 hover:text-primary' ?>">
            모임 및 예배 안내
        </a>
        <a href="/location" class="px-3.5 sm:px-4 py-2 rounded-xl transition-all whitespace-nowrap <?= ($tab ?? '') === 'location' ? 'bg-primary text-white shadow-sm font-bold' : 'text-gray-600 hover:text-primary' ?>">
            오시는 길 (위치)
        </a>
    </div>
</div>
