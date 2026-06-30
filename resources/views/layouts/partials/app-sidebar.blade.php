@php
    $user = auth()->user();
    $isCoach = $user->role === 'coach';
    $roleLabel = $isCoach ? 'Coach' : (in_array($user->role, ['employee', 'employé']) ? 'Salarié' : ucfirst($user->role));

    $navItems = $isCoach
        ? [
            ['label' => 'Tableau de bord', 'href' => route('dashboard'), 'icon' => 'dashboard', 'active' => request()->routeIs('dashboard')],
            ['label' => 'Mes séances', 'href' => route('sessions.index'), 'icon' => 'sessions', 'active' => request()->routeIs('sessions.*')],
            ['label' => 'Participants', 'href' => route('participants.index'), 'icon' => 'participants', 'active' => request()->routeIs('participants.*')],
            ['label' => 'Entreprises', 'href' => route('companies.index'), 'icon' => 'companies', 'active' => request()->routeIs('companies.*')],
            ['label' => 'Calendrier', 'href' => route('calendar'), 'icon' => 'calendar', 'active' => request()->routeIs('calendar')],
            ['label' => 'Profil', 'href' => route('profile.edit'), 'icon' => 'profile', 'active' => request()->routeIs('profile.*')],
        ]
        : [
            ['label' => 'Tableau de bord', 'href' => route('dashboard'), 'icon' => 'dashboard', 'active' => request()->routeIs('dashboard')],
            ['label' => 'Mes réservations', 'href' => route('sessions.index'), 'icon' => 'bookings', 'active' => request()->routeIs('sessions.*')],
            ['label' => 'Calendrier', 'href' => route('calendar'), 'icon' => 'calendar', 'active' => request()->routeIs('calendar')],
            ['label' => 'Mon profil', 'href' => route('profile.edit'), 'icon' => 'profile', 'active' => request()->routeIs('profile.*')],
        ];

    $initials = collect(explode(' ', $user->name))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('');
@endphp

<aside
    id="app-sidebar"
    class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col bg-sidebar transition-transform duration-300 ease-in-out"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    @keydown.escape.window="sidebarOpen = false"
>
    <div class="flex h-16 shrink-0 items-center gap-3 border-b border-slate-700/50 px-5">
        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary text-white shadow-sm">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6L12 2z"/></svg>
        </div>
        <div class="min-w-0 flex-1">
            <a href="{{ route('dashboard') }}" class="block truncate font-display text-base font-bold text-white">CoachPro+</a>
            <span class="text-xs text-slate-400">{{ $roleLabel }}</span>
        </div>
        <button type="button" class="inline-flex rounded-lg p-1.5 text-slate-400 hover:bg-slate-800 hover:text-white lg:hidden" @click="sidebarOpen = false" aria-label="Fermer le menu">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 py-4" aria-label="Navigation principale">
        <ul class="space-y-1">
            @foreach ($navItems as $item)
                <li>
                    <a href="{{ $item['href'] }}" @class(['app-sidebar-link', 'app-sidebar-link-active' => $item['active']]) @if($item['active']) aria-current="page" @endif>
                        @include('layouts.partials.sidebar-icon', ['icon' => $item['icon']])
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="shrink-0 border-t border-slate-700/50 p-3">
        <div class="mb-3 flex items-center gap-3 rounded-lg bg-slate-800/60 px-3 py-2.5">
            <x-admin.avatar :initials="$initials" size="sm" />
            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-white">{{ $user->name }}</p>
                <p class="truncate text-xs text-slate-400">{{ $user->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="app-sidebar-link w-full text-red-400 hover:bg-slate-800 hover:text-red-300">
                @include('layouts.partials.sidebar-icon', ['icon' => 'logout'])
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>
