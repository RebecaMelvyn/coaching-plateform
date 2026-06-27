@php
    $navItems = [
        [
            'label' => 'Tableau de bord',
            'href' => route('admin.dashboard'),
            'icon' => 'dashboard',
            'color' => 'blue',
            'active' => request()->routeIs('admin.dashboard') || request()->is('admin'),
        ],
        [
            'label' => 'Utilisateurs',
            'href' => '#',
            'icon' => 'users',
            'color' => 'violet',
            'active' => request()->is('admin/users*'),
        ],
        [
            'label' => 'Entreprises',
            'href' => '#',
            'icon' => 'companies',
            'color' => 'orange',
            'active' => request()->is('admin/companies*'),
        ],
        [
            'label' => 'Séances',
            'href' => '#',
            'icon' => 'sessions',
            'color' => 'green',
            'active' => request()->is('admin/sessions*'),
        ],
        [
            'label' => 'Statistiques',
            'href' => '#',
            'icon' => 'stats',
            'color' => 'indigo',
            'active' => request()->is('admin/statistics*'),
        ],
    ];
@endphp

<aside
    id="admin-sidebar"
    class="admin-sidebar fixed inset-y-0 left-0 z-40 flex w-72 flex-col border-r border-primary/10 bg-white/95 shadow-xl-glass backdrop-blur-xl transition-transform duration-300 ease-in-out"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    @keydown.escape.window="sidebarOpen = false"
>
    {{-- Logo --}}
    <div class="flex h-20 shrink-0 items-center gap-3 border-b border-primary/10 px-6">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary text-white font-extrabold text-lg shadow-md">
            C+
        </div>
        <div class="min-w-0">
            <a href="#" class="block truncate text-xl font-extrabold tracking-tight text-primary">
                CoachPro+
            </a>
            <span class="text-xs font-semibold uppercase tracking-wider text-accent">Administration</span>
        </div>
        <button
            type="button"
            class="ml-auto inline-flex items-center justify-center rounded-xl p-2 text-gray-500 hover:bg-primary/10 hover:text-primary lg:hidden"
            @click="sidebarOpen = false"
            aria-label="Fermer le menu"
        >
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-4 py-6" aria-label="Navigation administration">
        <ul class="space-y-1.5">
            @foreach ($navItems as $item)
                <li>
                    <a
                        href="{{ $item['href'] }}"
                        @class([
                            'admin-nav-link',
                            'admin-nav-link-' . $item['color'],
                            'admin-nav-link-active' => $item['active'],
                        ])
                        @if ($item['active']) aria-current="page" @endif
                    >
                        @include('layouts.partials.admin-sidebar-icon', ['icon' => $item['icon']])
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    {{-- Déconnexion --}}
    <div class="shrink-0 border-t border-primary/10 p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                type="submit"
                class="admin-nav-link admin-nav-link-red w-full text-left"
            >
                @include('layouts.partials.admin-sidebar-icon', ['icon' => 'logout'])
                <span>Déconnexion</span>
            </button>
        </form>
    </div>
</aside>
