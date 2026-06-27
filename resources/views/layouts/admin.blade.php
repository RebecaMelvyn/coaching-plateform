<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CoachPro+') }} — Administration</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body
    class="min-h-screen bg-background font-sans antialiased text-dark"
    x-data="{ sidebarOpen: false }"
    x-init="$watch('sidebarOpen', value => document.body.classList.toggle('overflow-hidden', value && window.innerWidth < 1024))"
>
    {{-- Overlay mobile --}}
    <div
        class="fixed inset-0 z-30 bg-dark/40 backdrop-blur-sm transition-opacity duration-300 lg:hidden"
        x-show="sidebarOpen"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        x-cloak
        aria-hidden="true"
    ></div>

    @include('layouts.partials.admin-sidebar')

    <div class="flex min-h-screen flex-col lg:pl-72">
        @include('layouts.partials.admin-header')

        <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')

    <style>
        [x-cloak] { display: none !important; }
    </style>
</body>
</html>
