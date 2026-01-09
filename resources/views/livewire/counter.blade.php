<div
    class="flex flex-col items-center justify-center p-8 bg-white rounded-xl border border-gray-200 shadow-sm max-w-xs mx-auto">
    {{-- Label Judul --}}
    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-4">Counter Tool</h3>

    {{-- Angka Counter --}}
    <div class="text-6xl font-bold text-indigo-600 mb-8 transition-all tabular-nums">
        {{ $count }}
    </div>

    {{-- Container Tombol --}}
    <div class="flex items-center space-x-4">
        {{-- Button Kurang (-) --}}
        <button wire:click="decrement"
            class="flex items-center justify-center w-12 h-12 rounded-lg bg-red-50 text-red-600 border border-red-200 hover:bg-red-100 hover:scale-105 active:scale-95 transition-all shadow-sm font-bold text-xl cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
            </svg>
        </button>

        {{-- Button Tambah (+) --}}
        <button wire:click="increment"
            class="flex items-center justify-center w-12 h-12 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 hover:scale-105 active:scale-95 transition-all shadow-md font-bold text-xl cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>

    {{-- Indicator Loading --}}
    <p wire:loading class="mt-4 text-xs text-indigo-400 animate-pulse">Updating...</p>
</div>
