<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CoachPro') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-gradient-to-br from-blue-100 via-white to-violet-100 min-h-screen flex flex-col">
        <div class="w-full flex justify-center items-center pt-12">
            <a href="/" class="flex items-center gap-2 font-extrabold text-blue-700 text-2xl">
                CoachPro+
            </a>
        </div>
        <div class="flex-1 flex flex-col justify-center items-center">
            <div class="w-full max-w-md mt-8 px-8 py-8 bg-white/90 shadow-xl rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
