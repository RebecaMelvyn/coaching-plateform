<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CoachPro+') }} — Administration</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body
    class="app-shell min-h-screen bg-page font-sans text-ink antialiased"
    x-data="{ sidebarOpen: false }"
    x-init="$watch('sidebarOpen', value => document.body.classList.toggle('overflow-hidden', value && window.innerWidth < 1024))"
>
    <div
        class="fixed inset-0 z-30 bg-slate-900/50 backdrop-blur-sm transition-opacity duration-300 lg:hidden"
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        x-cloak
        aria-hidden="true"
    ></div>

    @include('layouts.partials.admin-sidebar')

    <div class="flex min-h-screen flex-col lg:pl-64">
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            <x-admin.top-bar
                :title="$header ?? 'Administration'"
                :subtitle="$subtitle ?? null"
            />

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')

    <style>[x-cloak] { display: none !important; }</style>
</body>
</html>
