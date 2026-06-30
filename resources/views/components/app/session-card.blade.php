@props(['session', 'showRegister' => false])

@php
    $isFull = $session->participants_count >= $session->max_participants;
    $pct = $session->max_participants > 0 ? min(100, round(($session->participants_count / $session->max_participants) * 100)) : 0;
@endphp

<div class="app-card flex flex-col p-5 transition hover:shadow-md">
    <div class="mb-4 flex items-start justify-between gap-2">
        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-primary">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        @if ($isFull)
            <x-admin.badge label="Complet" variant="warning" />
        @else
            <x-admin.badge :label="$session->max_participants - $session->participants_count . ' places'" variant="default" />
        @endif
    </div>

    <h3 class="font-display text-lg font-bold text-ink">{{ $session->title }}</h3>
    <p class="mt-2 line-clamp-2 text-sm text-ink-muted">{{ $session->description }}</p>

    <ul class="mt-4 space-y-2 text-sm text-ink-muted">
        <li class="flex items-center gap-2">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            {{ $session->start_time->format('d/m/Y H:i') }}
        </li>
        <li class="flex items-center gap-2">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $session->duration }} min
        </li>
        <li class="flex items-center gap-2">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="truncate">{{ $session->location }}</span>
        </li>
        @if ($session->coach)
            <li class="flex items-center gap-2">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                {{ $session->coach->name }}
            </li>
        @endif
    </ul>

    <div class="mt-4">
        <div class="mb-1 flex justify-between text-xs font-medium text-ink-muted">
            <span>Places occupées</span>
            <span class="font-mono text-ink">{{ $session->participants_count }}/{{ $session->max_participants }}</span>
        </div>
        <div class="h-2 overflow-hidden rounded-full bg-slate-100">
            <div class="h-full rounded-full transition-all {{ $isFull ? 'bg-amber-400' : 'bg-primary' }}" style="width: {{ $pct }}%"></div>
        </div>
    </div>

    <div class="mt-5 flex gap-2">
        <a href="{{ route('sessions.show', $session) }}" class="app-btn-secondary flex-1 text-center text-sm">Détails</a>
        @if ($showRegister && !$isFull)
            <form method="POST" action="{{ route('sessions.register', $session) }}" class="flex-1">
                @csrf
                <button type="submit" class="app-btn-primary w-full">S'inscrire</button>
            </form>
        @elseif ($isFull)
            <button type="button" disabled class="flex-1 rounded-lg bg-slate-100 px-4 py-2.5 text-sm font-semibold text-slate-400">Complet</button>
        @endif
    </div>
</div>
