<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CoachPro') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('scripts')
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50 min-h-screen">
        <!-- Barre de navigation -->
        <nav class="w-full flex justify-between items-center px-8 py-4 bg-white shadow-md fixed top-0 left-0 z-20 backdrop-blur">
            <a href="/" class="flex items-center gap-2 font-extrabold text-blue-700 text-xl">
                CoachPro+
            </a>
            <div class="flex gap-4 items-center">
                <a href="{{ route('dashboard') }}" class="text-blue-700 font-semibold hover:text-violet-600 transition">Dashboard</a>
                <a href="{{ route('sessions.index') }}" class="text-blue-700 font-semibold hover:text-violet-600 transition">Sessions</a>
                <a href="{{ route('companies.index') }}" class="text-blue-700 font-semibold hover:text-violet-600 transition">Entreprises</a>
                <a href="{{ route('calendar') }}" class="text-blue-700 font-semibold hover:text-violet-600 transition">Calendrier</a>
                <a href="{{ route('profile.edit') }}" class="text-blue-700 font-semibold hover:text-violet-600 transition">Profil</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="ml-2 px-4 py-2 rounded-lg font-semibold text-white bg-blue-700 hover:bg-violet-600 transition">Déconnexion</button>
                </form>
            </div>
        </nav>
        <div class="pt-24 max-w-6xl mx-auto px-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-xl mx-auto mt-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if (isset($header))
                <header class="bg-white text-blue-700 rounded-2xl px-8 py-8 mb-8 shadow-lg">
                    <div class="text-2xl font-bold">{{ $header }}</div>
                </header>
            @endif
            <main class="flex-1 flex flex-col items-center justify-center w-full">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
