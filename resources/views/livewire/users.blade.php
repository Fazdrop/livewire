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
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    Email Address
                </label>
                <input wire:model="email" type="email" id="email" name="email" autocomplete="email"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                    placeholder="name@company.com">
            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                    Password
                </label>
                <input wire:model="password" type="password" id="password" name="password"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                    placeholder="••••••••">
            </div>

            {{-- Button Submit --}}
            <div class="pt-2">
                <button wire:click.prevent="createUser"
                    class="w-full cursor-pointer inline-flex justify-center items-center px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-lg transition-all shadow-sm active:transform active:scale-[0.98]">
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

        <table class="w-full text-left text-sm">
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
