<div class="p-6 bg-gray-50/50 min-h-screen font-sans"> {{-- Container Utama dengan latar lembut --}}
    <div class="max-w-7xl mx-auto space-y-6">

        {{-- HEADER HALAMAN --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">User Management</h1>
                <p class="text-sm text-gray-500">Kelola anggota proyek dan pemilihan user acak di sini.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- KOLOM KIRI: FORM & RANDOM USER (Side Control) --}}
            <div class="lg:col-span-1 space-y-6">

                {{-- KARTU 1: RANDOM USER --}}
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white transition-all hover:shadow-md">
                    <div class="border-b border-gray-100 py-3 px-5 bg-white flex justify-between items-center">
                        <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider">{{ $title }}</h3>
                        <button wire:click="showRandomUser" wire:loading.attr="disabled"
                            class="inline-flex items-center px-4 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-[10px] font-bold uppercase tracking-widest rounded-lg transition-all active:scale-95 disabled:opacity-50 cursor-pointer shadow-sm">
                            <svg wire:loading wire:target="showRandomUser"
                                class="animate-spin -ml-1 mr-2 h-3 w-3 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Roll User
                        </button>
                    </div>
                    <div class="p-5">
                        @if ($randomUser)
                            <div class="p-4 bg-indigo-50 border border-indigo-100 rounded-xl">
                                <div class="text-sm font-bold text-indigo-900">{{ $randomUser->name }}</div>
                                <div class="text-xs text-indigo-700 font-medium mt-0.5">{{ $randomUser->email }}</div>
                            </div>
                        @else
                            <div class="text-center py-6 border-2 border-dashed border-gray-100 rounded-xl">
                                <span class="text-xs text-gray-400 italic">Belum ada user terpilih.</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- KARTU 3: REGISTER FORM --}}
                <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">
                    <div class="border-b border-gray-100 py-3 px-5 bg-white">
                        <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Register Member</h3>
                    </div>
                    <form wire:submit.prevent="createUser" class="p-5 space-y-4">
                        @if (session('success'))
                            <div
                                class="p-3 text-[10px] font-bold text-emerald-700 bg-emerald-50 rounded-lg text-center border border-emerald-100 uppercase tracking-widest animate-pulse">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Full
                                Name</label>
                            <input wire:model="name" type="text" placeholder="e.g. John Doe"
                                class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                            @error('name')
                                <p class="text-[10px] text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Email
                                Address</label>
                            <input wire:model="email" type="email" placeholder="john@example.com"
                                class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                            @error('email')
                                <p class="text-[10px] text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label
                                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Password</label>
                            <input wire:model="password" type="password" placeholder="••••••••"
                                class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                            @error('password')
                                <p class="text-[10px] text-red-500 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-2 border-t border-gray-50 mt-4">
                            <label
                                class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-2 text-center">Profile
                                Picture</label>
                            <div class="flex flex-col items-center gap-4">
                                <label
                                    class="group flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-200 rounded-xl hover:bg-indigo-50 hover:border-indigo-300 transition-all cursor-pointer">
                                    <svg class="w-6 h-6 text-gray-300 group-hover:text-indigo-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 4v16m8-8H4" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    <span class="text-[10px] mt-1 text-gray-400 font-bold uppercase">Pilih File</span>
                                    <input wire:model="avatar" id="avatar" name="avatar" type="file"
                                        class="sr-only">

                                </label>


                                <div class="relative w-full flex justify-center min-h-[100px]">
                                    {{-- Animasi Loading Shimmer --}}
                                    <div wire:loading wire:target="avatar"
                                        class="flex flex-col items-center justify-center h-24 w-24 rounded-xl border-2 border-dashed border-indigo-100 bg-indigo-50/30 animate-pulse">
                                        <div
                                            class="animate-spin h-5 w-5 border-2 border-indigo-500 border-t-transparent rounded-full">
                                        </div>


                                    </div>



                                    {{-- PREVIEW + ALPINE ZOOM LOGIC --}}
                                    <div x-data="{ open: false }" wire:loading.remove wire:target="avatar">
                                        @if ($avatar)
                                            <div class="relative inline-block mt-2"> {{-- Container relatif kunci posisi --}}

                                                {{-- TOMBOL SILANG (X) UNTUK HAPUS --}}
                                                <button type="button" wire:click="clearAvatar" {{-- Memanggil fungsi reset di Class --}}
                                                    class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-[10px] font-bold shadow-lg z-10 transition-all cursor-pointer">
                                                    ✕
                                                </button>
                                                <div class="text-center">
                                                    <img src="{{ $avatar->temporaryUrl() }}" @click="open = true"
                                                        class="h-24 w-24 object-cover rounded-xl border-2 border-white shadow-md cursor-zoom-in hover:scale-105 transition-transform">
                                                    <p
                                                        class="text-[9px] text-gray-400 mt-1 uppercase font-bold tracking-tighter italic">
                                                        Klik untuk memperbesar</p>
                                                </div>

                                                {{-- MODAL ZOOM --}}
                                                <div x-show="open" x-cloak
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="transition ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
                                                    <div @click.away="open = false"
                                                        class="relative max-w-3xl w-full flex flex-col items-center">
                                                        <img src="{{ $avatar->temporaryUrl() }}"
                                                            class="max-h-[80vh] rounded-xl shadow-2xl">
                                                        <button type="button" @click="open = false"
                                                            class="mt-4 text-white font-bold text-xs bg-white/20 px-4 py-2 rounded-full hover:bg-white/30 transition-all">CLOSE
                                                            (ESC)</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs uppercase tracking-[0.2em] rounded-xl shadow-lg shadow-indigo-100 transition-all active:scale-[0.98]">
                            Complete Registration
                        </button>
                    </form>
                </div>
            </div>

            {{-- KOLOM KANAN: DATA TABLE (Main Content) --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- KARTU 4: ALL USERS --}}
                <form wire:submit="searchUsers" class="max-w-md mx-auto">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 group-focus-within:text-indigo-500 transition-colors"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24">
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
                                    <tr wire:key="user-{{ $user->id }}"
                                        class="hover:bg-indigo-50/30 transition-colors group">
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
                                        <td colspan="4"
                                            class="px-6 py-24 text-center text-gray-400 italic text-sm">Belum ada
                                            anggota ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100">
                        <div class="pagination-wrapper text-xs">
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
                                        <td colspan="2"
                                            class="px-6 py-4 text-center text-xs text-gray-400 italic font-mono">Queue
                                            empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
