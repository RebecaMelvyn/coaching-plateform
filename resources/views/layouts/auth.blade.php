<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CoachPro+') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-shell min-h-screen bg-page font-sans text-ink antialiased">
    <div class="flex min-h-screen">
        {{-- Panneau branding --}}
        <div class="auth-brand-panel auth-brand-pattern lg:w-1/2">
            <div>
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white/20 text-white">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
                    </div>
                    <span class="font-display text-2xl font-bold">CoachPro+</span>
                </div>
                <h1 class="mt-10 font-display text-3xl font-bold leading-tight lg:text-4xl">
                    La plateforme de coaching en entreprise nouvelle génération
                </h1>
                <ul class="mt-8 space-y-4 text-sm text-blue-100">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Séances de coaching sport, bien-être et développement professionnel
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Coachs certifiés pour vos équipes
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Suivi des performances et statistiques en temps réel
                    </li>
                </ul>
            </div>
            <div class="border-t border-white/20 pt-6">
                <div class="grid grid-cols-3 gap-4 text-center text-sm">
                    <div><p class="font-display text-2xl font-bold">500+</p><p class="text-blue-100">Coachs certifiés</p></div>
                    <div><p class="font-display text-2xl font-bold">10k+</p><p class="text-blue-100">Séances réalisées</p></div>
                    <div><p class="font-display text-2xl font-bold">98%</p><p class="text-blue-100">Satisfaction client</p></div>
                </div>
            </div>
        </div>

        {{-- Formulaire --}}
        <div class="flex w-full flex-col bg-white lg:w-1/2">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
