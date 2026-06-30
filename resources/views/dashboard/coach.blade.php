<x-app-layout>
    <x-slot name="header">Tableau de bord</x-slot>
    <x-slot name="subtitle">Bonjour {{ auth()->user()->name }}, voici votre activité du jour</x-slot>
    <x-slot name="action">
        <a href="{{ route('sessions.create') }}" class="app-btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Nouvelle séance
        </a>
    </x-slot>

    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <x-admin.stat-card label="Séances créées" :value="$sessionsCreated" color="blue">
            <x-slot name="icon"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></x-slot>
        </x-admin.stat-card>
        <x-admin.stat-card label="Séances à venir" :value="$upcomingSessions" :trend="'Prochaine : ' . ($nextSessions->first()?->start_time?->translatedFormat('d M') ?? '—')" color="emerald">
            <x-slot name="icon"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></x-slot>
        </x-admin.stat-card>
        <x-admin.stat-card label="Participants inscrits" :value="$totalParticipants" color="violet">
            <x-slot name="icon"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></x-slot>
        </x-admin.stat-card>
    </div>

    <x-admin.page-card title="Séances à venir">
        <x-slot name="actions">
            <a href="{{ route('sessions.index') }}" class="text-sm font-semibold text-primary hover:text-primary-dark">Voir tout →</a>
        </x-slot>

        @if ($nextSessions->isEmpty())
            <p class="text-center text-sm text-ink-muted">Aucune séance prévue.</p>
        @else
            <ul class="divide-y divide-slate-100">
                @foreach ($nextSessions->take(5) as $session)
                    @php $pct = $session->max_participants > 0 ? min(100, round(($session->participants_count / $session->max_participants) * 100)) : 0; @endphp
                    <li class="flex flex-col gap-4 py-4 first:pt-0 sm:flex-row sm:items-center">
                        <div class="flex min-w-0 flex-1 items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h3 class="font-display font-bold text-ink">{{ $session->title }}</h3>
                                <div class="mt-1 flex flex-wrap gap-3 text-xs text-ink-muted">
                                    <span>{{ $session->start_time->format('Y-m-d') }}</span>
                                    <span>{{ $session->start_time->format('H:i') }}</span>
                                    <span>{{ $session->location }}</span>
                                </div>
                                <div class="mt-3 h-1.5 max-w-xs overflow-hidden rounded-full bg-slate-100">
                                    <div class="h-full rounded-full bg-primary" style="width: {{ $pct }}%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex shrink-0 items-center gap-3">
                            <span class="font-mono text-sm font-semibold text-ink">{{ $session->participants_count }}/{{ $session->max_participants }}</span>
                            <x-admin.badge label="À venir" variant="default" />
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-admin.page-card>
</x-app-layout>
