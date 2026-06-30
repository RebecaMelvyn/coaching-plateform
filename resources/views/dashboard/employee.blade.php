<x-app-layout>
    <x-slot name="header">Séances disponibles</x-slot>
    <x-slot name="subtitle">Réservez vos séances de coaching en entreprise</x-slot>

    <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <x-admin.stat-card label="Séances disponibles" :value="$availableSessions" color="blue">
            <x-slot name="icon"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></x-slot>
        </x-admin.stat-card>
        <x-admin.stat-card label="Mes inscriptions" :value="$registeredSessions" color="emerald">
            <x-slot name="icon"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></x-slot>
        </x-admin.stat-card>
        <x-admin.stat-card label="À venir" :value="$nextSessions->count()" trend="Ce trimestre" color="violet">
            <x-slot name="icon"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg></x-slot>
        </x-admin.stat-card>
    </div>

    @if ($nextSessions->isNotEmpty())
        <x-admin.page-card title="Mes réservations" class="mb-8">
            <ul class="divide-y divide-slate-100">
                @foreach ($nextSessions as $session)
                    <li class="flex flex-col gap-2 py-4 first:pt-0 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="font-display font-bold text-ink">{{ $session->title }}</h3>
                            <p class="text-sm text-ink-muted">{{ $session->coach?->name }} · {{ $session->start_time->format('d/m/Y H:i') }}</p>
                        </div>
                        <x-admin.badge label="Inscrit" variant="success" />
                    </li>
                @endforeach
            </ul>
        </x-admin.page-card>
    @endif

    <x-admin.page-card title="Séances à venir">
        @if ($allAvailable->isEmpty())
            <p class="text-center text-sm text-ink-muted">Aucune séance disponible pour le moment.</p>
        @else
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($allAvailable as $session)
                    <x-app.session-card :session="$session" :show-register="true" />
                @endforeach
            </div>
        @endif
    </x-admin.page-card>
</x-app-layout>
