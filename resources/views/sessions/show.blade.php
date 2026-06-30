<x-app-layout>
    <x-slot name="header">{{ $session->title }}</x-slot>
    <x-slot name="subtitle">{{ $session->start_time->format('d/m/Y H:i') }} · {{ $session->location }}</x-slot>

    <div class="mx-auto max-w-3xl">
        <x-admin.page-card>
            <div class="space-y-4 text-sm">
                <p class="text-ink-muted">{{ $session->description }}</p>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div><span class="font-medium text-ink">Coach</span><p class="text-ink-muted">{{ $session->coach?->name ?? '—' }}</p></div>
                    <div><span class="font-medium text-ink">Entreprise</span><p class="text-ink-muted">{{ $session->company?->name ?? '—' }}</p></div>
                    <div><span class="font-medium text-ink">Durée</span><p class="text-ink-muted">{{ $session->duration }} min</p></div>
                    <div><span class="font-medium text-ink">Participants</span><p class="font-mono text-ink">{{ $session->registrations_count }}/{{ $session->max_participants }}</p></div>
                </div>
            </div>

            <div class="mt-6 flex flex-wrap gap-3">
                @if(auth()->user()->role === 'coach' && $session->coach_id === auth()->id())
                    <a href="{{ route('sessions.edit', $session) }}" class="app-btn-primary">Modifier</a>
                    <form method="POST" action="{{ route('sessions.destroy', $session) }}" onsubmit="return confirm('Supprimer cette séance ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="app-btn-danger">Supprimer</button>
                    </form>
                @elseif(auth()->user()->role === 'employee')
                    @if($session->registrations_count < $session->max_participants)
                        <form method="POST" action="{{ route('sessions.register', $session) }}">
                            @csrf
                            <button type="submit" class="app-btn-primary">Participer à la session</button>
                        </form>
                    @else
                        <x-admin.badge label="Séance complète" variant="warning" />
                    @endif
                @endif
                <a href="{{ route('sessions.index') }}" class="app-btn-secondary">Retour</a>
            </div>
        </x-admin.page-card>
    </div>
</x-app-layout>
