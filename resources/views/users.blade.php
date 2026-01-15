<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="p-6 bg-gray-50/50 min-h-screen font-sans"> {{-- Container Utama dengan latar lembut --}}
        <div class="max-w-7xl mx-auto space-y-6">
            {{-- HEADER HALAMAN --}}
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 pb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 tracking-tight">User Management</h1>
                    <p class="text-sm text-gray-500">Kelola anggota proyek dan pemilihan user acak di sini.</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- KOLOM KIRI: FORM & RANDOM USER (Side Control) --}}
            @livewire('user-registration-form')
            {{-- KOLOM KANAN: DATA TABLE (Main Content) --}}
            @livewire('users-list', ['lazy' => true])
        </div>
    </div>
</body>

</html>
