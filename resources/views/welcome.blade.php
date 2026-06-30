<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CoachPro+ — Plateforme de coaching en entreprise</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-shell min-h-screen bg-page font-sans text-ink antialiased">

    {{-- Header --}}
    <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/90 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="flex items-center gap-2.5">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-primary text-white shadow-sm">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
                </div>
                <span class="font-display text-xl font-bold text-ink">CoachPro+</span>
            </a>

            <nav class="hidden items-center gap-8 md:flex">
                <a href="#fonctionnalites" class="text-sm font-medium text-ink-muted transition hover:text-primary">Fonctionnalités</a>
                <a href="#espaces" class="text-sm font-medium text-ink-muted transition hover:text-primary">Espaces</a>
                <a href="{{ route('login') }}" class="text-sm font-medium text-ink-muted transition hover:text-primary">Connexion</a>
            </nav>

            <a href="{{ route('login') }}" class="app-btn-primary shrink-0 px-5 py-2.5 text-sm">Se connecter</a>
        </div>
    </header>

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-white">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(37,99,235,0.08),transparent_50%)]"></div>
        <div class="relative mx-auto max-w-6xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-28">
            <div class="mx-auto max-w-3xl text-center">
                <h1 class="font-display text-3xl font-bold leading-tight text-ink sm:text-4xl lg:text-5xl">
                    Centralisez la gestion de vos séances de coaching en entreprise
                </h1>
                <p class="mt-6 text-base leading-relaxed text-ink-muted sm:text-lg">
                    CoachPro+ permet aux coachs, salariés et administrateurs de gérer facilement les séances, les inscriptions et le suivi des participants.
                </p>
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="{{ route('login') }}" class="app-btn-primary w-full px-8 py-3 sm:w-auto">Se connecter</a>
                    <a href="#fonctionnalites" class="app-btn-secondary w-full px-8 py-3 sm:w-auto">Découvrir la plateforme</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Fonctionnalités --}}
    <section id="fonctionnalites" class="border-t border-slate-100 bg-page py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="font-display text-2xl font-bold text-ink sm:text-3xl">Des espaces adaptés à chaque profil</h2>
                <p class="mt-3 text-ink-muted">Une plateforme unique pour orchestrer le coaching en entreprise.</p>
            </div>

            <div id="espaces" class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="app-card p-6 transition hover:shadow-md">
                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-primary">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h3 class="font-display text-lg font-bold text-ink">Pour les coachs</h3>
                    <p class="mt-2 text-sm leading-relaxed text-ink-muted">Créez, modifiez et suivez vos séances depuis un espace dédié.</p>
                </div>
                <div class="app-card p-6 transition hover:shadow-md">
                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-display text-lg font-bold text-ink">Pour les salariés</h3>
                    <p class="mt-2 text-sm leading-relaxed text-ink-muted">Consultez les séances disponibles et inscrivez-vous en quelques clics.</p>
                </div>
                <div class="app-card p-6 transition hover:shadow-md">
                    <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-lg bg-violet-50 text-violet-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="font-display text-lg font-bold text-ink">Pour les administrateurs</h3>
                    <p class="mt-2 text-sm leading-relaxed text-ink-muted">Supervisez les utilisateurs, les entreprises, les séances et les statistiques.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Avantages --}}
    <section class="border-t border-slate-100 bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="font-display text-2xl font-bold text-ink sm:text-3xl">Pourquoi CoachPro+ ?</h2>
            </div>
            <ul class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    'Interface responsive',
                    'Gestion sécurisée des accès',
                    'Suivi des inscriptions',
                    'Back Office administrateur',
                    'Tableau de bord clair',
                ] as $avantage)
                    <li class="flex items-center gap-3 rounded-xl border border-slate-100 bg-page px-5 py-4">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="text-sm font-medium text-ink">{{ $avantage }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Aperçu produit --}}
    <section class="border-t border-slate-100 bg-page py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="font-display text-2xl font-bold text-ink sm:text-3xl">Aperçu du tableau de bord</h2>
                <p class="mt-3 text-ink-muted">Visualisez l'activité de votre organisation en un coup d'œil.</p>
            </div>

            <div class="mx-auto mt-12 max-w-4xl">
                <div class="app-card overflow-hidden shadow-lg">
                    <div class="border-b border-slate-100 bg-white px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-white">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
                            </div>
                            <span class="font-display font-bold text-ink">CoachPro+</span>
                            <span class="ml-auto rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-primary">Tableau de bord</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 bg-page p-6 sm:grid-cols-4">
                        @foreach ([
                            ['label' => 'Utilisateurs', 'value' => '248', 'color' => 'text-primary'],
                            ['label' => 'Séances', 'value' => '56', 'color' => 'text-emerald-600'],
                            ['label' => 'Inscriptions', 'value' => '312', 'color' => 'text-violet-600'],
                            ['label' => 'Entreprises', 'value' => '18', 'color' => 'text-amber-600'],
                        ] as $stat)
                            <div class="rounded-xl border border-slate-100 bg-white p-4 text-center">
                                <p class="text-xs font-semibold uppercase tracking-wider text-ink-muted">{{ $stat['label'] }}</p>
                                <p class="mt-2 font-display text-2xl font-bold {{ $stat['color'] }}">{{ $stat['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="border-t border-slate-100 bg-white px-6 py-5">
                        <div class="space-y-3">
                            @foreach (['Coaching leadership — TechCorp', 'Bien-être au travail — Innovate SA', 'Prise de parole — Global Services'] as $item)
                                <div class="flex items-center justify-between rounded-lg bg-page px-4 py-3">
                                    <span class="text-sm font-medium text-ink">{{ $item }}</span>
                                    <span class="rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">Confirmée</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="border-t border-slate-100 bg-primary py-16 text-white sm:py-20">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="font-display text-2xl font-bold sm:text-3xl">Prêt à simplifier votre coaching en entreprise ?</h2>
            <p class="mt-4 text-blue-100">Connectez-vous pour accéder à votre espace CoachPro+.</p>
            <a href="{{ route('login') }}" class="mt-8 inline-flex items-center justify-center rounded-lg bg-white px-8 py-3 text-sm font-semibold text-primary shadow-sm transition hover:bg-blue-50">
                Se connecter
            </a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="border-t border-slate-100 bg-white py-8">
        <div class="mx-auto max-w-6xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm text-ink-muted">CoachPro+ — Plateforme de coaching en entreprise</p>
        </div>
    </footer>

</body>
</html>
