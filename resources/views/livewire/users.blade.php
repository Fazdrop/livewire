<div class="p-6 space-y-8"> {{-- Container Utama dengan jarak antar kartu --}}

    {{-- KARTU 1: RANDOM USER --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">
        <div class="border-b border-gray-200 py-4 px-6 bg-white flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">
                {{ $title }}
            </h1>

            <button wire:click="showRandomUser" wire:loading.attr="disabled"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm disabled:opacity-50">
                <svg wire:loading wire:target="showRandomUser" class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Show Random User
            </button>
        </div>

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs font-semibold uppercase tracking-wider text-gray-600">
                <tr>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email Address</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if ($randomUser)
                    <tr class="bg-blue-50/30">
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $randomUser->name }}</div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                            {{ $randomUser->email }}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2" class="px-6 py-10 text-center text-gray-400 italic">
                            Belum ada user random yang dipilih.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- KARTU 2: NEW USERS LIST --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">
        <div class="border-b border-gray-200 py-4 px-6 bg-white flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">{{ $title2 ?? 'New Users' }}</h2>

            <button wire:click="createFakeUser" wire:loading.attr="disabled"
                class="cursor-pointer inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm disabled:opacity-50">
                <svg wire:loading wire:target="createFakeUser" class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span>Add Fake User</span>
            </button>
        </div>

        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs font-semibold uppercase tracking-wider text-gray-600">
                <tr>
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email Address</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($newUsers as $newUser)
                    {{-- Gunakan wire:key agar Livewire bisa melacak baris dengan efisien --}}
                    <tr wire:key="user-{{ $loop->index }}" class="transition-colors hover:bg-gray-50">
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $newUser['name'] ?? $newUser->name }}</div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                            {{ $newUser['email'] ?? $newUser->email }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-10 text-center text-gray-400 italic">
                            Belum ada user baru. Klik tombol Add Fake User!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- KARTU 3: CREATE USER MANUAL --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">
        {{-- Header Form --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-600 rounded-base bg-green-100 text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif


        <div class="border-b border-gray-200 py-4 px-6 bg-white">
            <h2 class="text-xl font-bold text-gray-800">Register New User</h2>
        </div>

        {{-- Body Form --}}
        <form wire:submit="createUser"action="#" method="POST" class="p-6 space-y-5">
            {{-- Input Nama --}}
            <div>
                <label for="name" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    Full Name
                </label>
                <input wire:model="name" type="text" id="name" name="name" autocomplete="name"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                    placeholder="e.g. John Doe">
                @error('name')
                    <p class="mt-2.5 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    Email Address
                </label>
                <input wire:model="email" type="email" id="email" name="email" autocomplete="email"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                    placeholder="name@company.com">
                @error('email')
                    <p class="mt-2.5 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                @enderror

            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    Password
                </label>
                <input wire:model="password" type="password" id="password" name="password"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-2.5 text-sm text-red-600"><span class="font-medium">{{ $message }}</span></p>
                @enderror
            </div>

            {{-- upload file/photo --}}
            <div class="col-span-full">
                <label for="profile-picture"
                    class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    Profile Picture
                </label>
                <div
                    class="mt-2 flex justify-center rounded-lg border-2 border-dashed border-gray-300 px-6 py-10 transition-colors hover:border-indigo-400 bg-gray-50/50">
                    <div class="text-center">
                        {{-- Icon --}}
                        <svg viewBox="0 0 24 24" fill="currentColor" class="mx-auto size-12 text-gray-400"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" />
                        </svg>

                        <div class="mt-4 flex flex-col items-center text-sm leading-6 text-gray-600">
                            <label for="avatar"
                                class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-600 focus-within:outline-none hover:text-indigo-500">
                                <span>Upload a file</span>
                                {{-- Tambahkan wire:model jika nanti menggunakan Livewire File Uploads --}}
                                <input wire:model="avatar" id="avatar" name="avatar" type="file"
                                    class="sr-only">
                            </label>
                            <p class="text-gray-500">or drag and drop</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-400 mt-1">PNG, JPG, GIF up to 5MB</p>
                    </div>
                </div>


                {{-- Container Loading dengan Animasi Shimmer --}}
                <div wire:loading wire:target="avatar" class="mt-2">
                    <div
                        class="flex flex-col items-center justify-center h-40 w-40 rounded-xl border-2 border-dashed border-indigo-100 bg-indigo-50/30 animate-pulse transition-all">

                        {{-- Icon Spinner Sederhana --}}
                        <svg class="animate-spin h-6 w-6 text-indigo-500 mb-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>

                        <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">Processing</span>
                    </div>
                </div>

                {{-- Preview --}}
                <div x-data="{ open: false }">
                    @if ($avatar)
                        <p class="text-xs font-semibold text-gray-600 uppercase mb-2">Preview:</p>

                        <img src="{{ $avatar->temporaryUrl() }}" @click="open = true"
                            class="mt-2 max-h-40 rounded-lg border cursor-pointer hover:opacity-80 transition-all shadow-sm"
                            alt="Preview">

                        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">

                            <div @click.away="open = false" x-show="open"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="relative max-w-4xl w-full flex flex-col items-center">

                                <img src="{{ $avatar->temporaryUrl() }}"
                                    class="max-h-[85vh] rounded-xl shadow-2xl border-2 border-white/20">

                                <button @click="open = false"
                                    class="mt-4 text-white/70 hover:text-white text-sm transition-colors">
                                    Close (Esc)
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                @error('avatar')
                    {{-- Sesuaikan nama variabel errornya nanti --}}
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Button Submit --}}
            <div class="pt-2">
                <button wire:click.prevent="createUser" wire:loading.attr="disabled"
                    class="w-full cursor-pointer inline-flex justify-center items-center px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-lg transition-all shadow-sm active:transform active:scale-[0.98]">
                    <svg wire:loading wire:target="createUser" class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    REGISTER
                </button>
            </div>
        </form>
    </div>



    {{-- KARTU 4: SHOW ALL USERS --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm bg-white">
        <div class="border-b border-gray-200 py-4 px-6 bg-white flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">{{ $title3 ?? 'All Users' }}</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-gray-50 text-xs font-semibold uppercase tracking-wider text-gray-600">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Email Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($users as $user)
                        {{-- Gunakan $user->id untuk wire:key yang lebih stabil daripada $loop->index --}}
                        <tr wire:key="user-{{ $user->id }}" class="transition-colors hover:bg-gray-50">
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $loop->iteration }}</div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $user->name }}</div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                {{ $user->email }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-10 text-center text-gray-400 italic">
                                Belum ada user baru. Klik tombol Add Fake User!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    



</div>
