<div wire:poll class="lg:col-span-2 space-y-6">
    <form wire:submit="searchUsers" class="max-w-md mx-auto">
        <label for="search" class="sr-only">Search</label>
        <div class="relative group">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400 group-focus-within:text-indigo-500 transition-colors" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model.live.debounce.250ms="search" type="search" id="search"
                class="block w-full p-3 ps-10 bg-white border border-gray-200 text-gray-900 text-sm rounded-xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400 shadow-sm"
                placeholder="Cari anggota..." />
            <button type="submit"
                class="absolute end-2 bottom-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-[10px] uppercase tracking-wider rounded-lg px-4 py-1.5 transition-all active:scale-95 shadow-sm">
                Search
            </button>
        </div>
    </form>

    {{-- MODIFIKASI: Hapus h-full dan flex-col agar tidak memaksa tinggi maksimal --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">

        <div class="border-b border-gray-100 py-4 px-6 bg-white flex justify-between items-center">
            <h2 class="text-lg font-bold text-gray-800 tracking-tight">{{ $title3 ?? 'Member Directory' }}
            </h2>
            <button wire:click="createFakeUser" wire:loading.attr="disabled"
                class="px-4 py-1.5 bg-gray-800 hover:bg-black text-white text-[10px] font-bold uppercase tracking-widest rounded-lg transition-all active:scale-95 cursor-pointer shadow-sm">
                Generate Fake User
            </button>
        </div>

        {{-- MODIFIKASI: Tambahkan max-height dan overflow-y agar scroll di dalam jika lebih dari 7 baris --}}
        <div class="overflow-x-auto max-h-[600px] overflow-y-auto">
            <table class="min-w-full text-left text-sm">
                <thead
                    class="bg-gray-50/50 text-[10px] font-bold uppercase tracking-[0.15em] text-gray-400 border-b border-gray-100 sticky top-0 bg-white z-10">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Full Name</th>
                        <th class="px-6 py-4">Account Email</th>
                        <th class="px-6 py-4">Avatar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($users as $user)
                        <tr wire:key="user-{{ $user->id }}" class="hover:bg-indigo-50/30 transition-colors group">
                            <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-700 group-hover:text-indigo-600">
                                {{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-500 font-medium">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ $user->avatar ? '/storage/' . $user->avatar : asset('img/default-picture.jpg') }}"
                                    class="w-10 h-10 rounded-full object-cover">
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-24 text-center text-gray-400 italic text-sm">Belum ada
                                anggota ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100 cursor-pointer">
            <div class="pagination-wrapper text-xs ">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    {{-- KARTU 2: NEW USERS LIST --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">
        <div class="border-b border-gray-100 py-3 px-5 bg-white">
            <h3 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                {{ $title2 ?? 'Recently Added' }}</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <tbody class="divide-y divide-gray-100">
                    @forelse ($newUsers as $newUser)
                        <tr wire:key="new-{{ $loop->index }}" class="bg-emerald-50/30">
                            <td class="px-6 py-3 font-medium text-emerald-900">
                                {{ $newUser['name'] ?? $newUser->name }}</td>
                            <td class="px-6 py-3 text-emerald-700 text-right">
                                {{ $newUser['email'] ?? $newUser->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-xs text-gray-400 italic font-mono">
                                Queue
                                empty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
