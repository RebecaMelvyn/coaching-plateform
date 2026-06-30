<x-admin-layout>
    <x-slot name="header">{{ __('Tableau de bord') }}</x-slot>
    <x-slot name="subtitle">{{ __('Vue d\'ensemble de la plateforme CoachPro+') }}</x-slot>

    @include('admin.partials.flash')

    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-6">
        <x-admin.stat-card label="Utilisateurs" :value="number_format($stats['users'], 0, ',', ' ')" :trend="$trends['users']" color="blue">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </x-slot>
        </x-admin.stat-card>

        <x-admin.stat-card label="Coachs" :value="number_format($stats['coaches'], 0, ',', ' ')" :trend="$trends['coaches']" color="violet">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </x-slot>
        </x-admin.stat-card>

        <x-admin.stat-card label="Salariés" :value="number_format($stats['employees'], 0, ',', ' ')" :trend="$trends['employees']" color="sky">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </x-slot>
        </x-admin.stat-card>

        <x-admin.stat-card label="Entreprises" :value="number_format($stats['companies'], 0, ',', ' ')" :trend="$trends['companies']" color="amber">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </x-slot>
        </x-admin.stat-card>

        <x-admin.stat-card label="Séances" :value="number_format($stats['sessions'], 0, ',', ' ')" :trend="$trends['sessions']" color="emerald">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </x-slot>
        </x-admin.stat-card>

        <x-admin.stat-card label="Inscriptions" :value="number_format($stats['registrations'], 0, ',', ' ')" :trend="$trends['registrations']" color="pink">
            <x-slot name="icon">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            </x-slot>
        </x-admin.stat-card>
    </div>

    <x-admin.page-card title="Séances récentes">
        @if ($recentSessions->isEmpty())
            <p class="text-center text-sm text-ink-muted">Aucune séance enregistrée.</p>
        @else
            <ul class="divide-y divide-slate-100">
                @foreach ($recentSessions as $session)
                    @php
                        $isFull = $session->participants_count >= $session->max_participants;
                    @endphp
                    <li class="flex flex-col gap-4 py-4 first:pt-0 last:pb-0 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex min-w-0 items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h3 class="font-display font-bold text-ink">{{ $session->title }}</h3>
                                <p class="mt-0.5 text-sm text-ink-muted">
                                    {{ $session->coach?->name ?? 'Coach non assigné' }}
                                    <span class="text-slate-300">•</span>
                                    {{ $session->start_time->format('Y-m-d') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex shrink-0 items-center gap-4 sm:justify-end">
                            <span class="font-mono text-sm font-semibold text-ink">
                                {{ $session->participants_count }}/{{ $session->max_participants }}
                            </span>
                            @if ($isFull)
                                <x-admin.badge label="Complet" variant="warning" />
                            @else
                                <x-admin.badge label="À venir" variant="default" />
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-admin.page-card>
</x-admin-layout>
