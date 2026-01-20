@props(['active' => false])

@php
    // Class yang selalu muncul baik aktif maupun tidak
    $baseClasses = 'block py-2 px-3 rounded md:p-0 transition-colors';

    // Class khusus saat menu AKTIF
    $activeClasses = 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500';

    // Class khusus saat menu TIDAK AKTIF (Default)
    $defaultClasses =
        'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $active ? "$baseClasses $activeClasses" : "$baseClasses $defaultClasses"]) }}
    aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
