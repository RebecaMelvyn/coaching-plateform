<x-app-layout>
    @if(auth()->user()->role === 'coach')
        <x-slot name="header">Mes séances</x-slot>
        <x-slot name="subtitle">Gérez vos séances de coaching</x-slot>
        <x-slot name="action">
            <a href="{{ route('sessions.create') }}" class="app-btn-primary">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Nouvelle séance
            </a>
        </x-slot>
    @else
        <x-slot name="header">Mes réservations</x-slot>
        <x-slot name="subtitle">Séances inscrites et disponibles</x-slot>
    @endif

    @if(auth()->user()->role === 'employee')
        @php
            $registeredSessions = $sessions->filter(fn ($s) => $s->participants->contains(auth()->id()));
            $availableSessions = $sessions->filter(fn ($s) => !$s->participants->contains(auth()->id()) && $s->participants_count < $s->max_participants);
        @endphp

        @if($registeredSessions->isNotEmpty())
            <x-admin.page-card title="Séances auxquelles je suis inscrit" class="mb-8">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach($registeredSessions as $session)
                        <x-app.session-card :session="$session" />
                    @endforeach
                </div>
            </x-admin.page-card>
        @endif

        <x-admin.page-card title="Séances disponibles à la réservation">
            @if($availableSessions->isEmpty())
                <p class="text-center text-sm text-ink-muted">Aucune séance disponible.</p>
            @else
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach($availableSessions as $session)
                        <x-app.session-card :session="$session" :show-register="true" />
                    @endforeach
                </div>
            @endif
        </x-admin.page-card>
    @else
        <x-admin.page-card title="Toutes mes séances">
            @if($sessions->isEmpty())
                <p class="text-center text-sm text-ink-muted">Aucune séance trouvée.</p>
            @else
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @foreach($sessions as $session)
                        <x-app.session-card :session="$session" />
                    @endforeach
                </div>
            @endif
        </x-admin.page-card>
    @endif
</x-app-layout>
