<nav x-data="{ open: false }" class="backdrop-blur-xl bg-white/90 dark:bg-[#232635]/90 shadow-xl-glass border-b border-primary/10 sticky top-0 z-50 rounded-b-2xl">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center gap-10">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="19" cy="19" r="19" fill="#2563eb"/>
                            <ellipse cx="19" cy="19" rx="10" ry="5" fill="#a78bfa"/>
                            <ellipse cx="19" cy="13" rx="6" ry="3" fill="#22c55e"/>
                        </svg>
                        <span class="text-2xl font-extrabold tracking-tight text-primary drop-shadow-sm dark:text-white">CoachPro</span>
                    </a>
                </div>
                <div class="hidden space-x-8 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link nav-link-blue">{{ __('Tableau de bord') }}</x-nav-link>
                    <x-nav-link :href="route('sessions.index')" :active="request()->routeIs('sessions.*')" class="nav-link nav-link-violet">{{ __('Sessions') }}</x-nav-link>
                    <x-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')" class="nav-link nav-link-green">{{ __('Calendrier') }}</x-nav-link>
                    @if(Auth::user() && Auth::user()->role !== 'employee')
                        <x-nav-link :href="route('companies.index')" :active="request()->routeIs('companies.*')" class="nav-link nav-link-orange">{{ __('Entreprises') }}</x-nav-link>
                    @endif
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center gap-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-base font-bold rounded-xl text-primary bg-white/80 dark:bg-[#232635] dark:text-white shadow-md hover:bg-primary/10 transition-all duration-200">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-2">
                                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Mon profil') }}</x-dropdown-link>
                        <x-dropdown-link :href="route('calendar')">{{ __('Calendrier') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">@csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Déconnexion') }}</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-primary dark:text-white hover:text-dark hover:bg-primary/10 focus:outline-none focus:bg-primary/10 focus:text-dark transition duration-150 ease-in-out">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link nav-link-blue">{{ __('Dashboard') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sessions.index')" :active="request()->routeIs('sessions.*')" class="nav-link nav-link-violet">{{ __('Sessions') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')" class="nav-link nav-link-green">{{ __('Calendrier') }}</x-responsive-nav-link>
            @if(Auth::user() && Auth::user()->role !== 'employee')
                <x-responsive-nav-link :href="route('companies.index')" :active="request()->routeIs('companies.*')" class="nav-link nav-link-orange">{{ __('Entreprises') }}</x-responsive-nav-link>
            @endif
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">@csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Déconnexion') }}</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    <style>
        .nav-link {
            position: relative;
            font-weight: 700;
            font-size: 1.08rem;
            color: #222;
            padding: 0.5rem 1.2rem;
            border-radius: 1rem;
            transition: color 0.18s, background 0.18s, box-shadow 0.18s;
        }
        .dark .nav-link {
            color: #f3f4f6;
        }
        .nav-link-blue:hover, .nav-link-blue[aria-current="page"] {
            color: #fff;
            background: #2563eb;
            box-shadow: 0 2px 16px 0 #2563eb33;
        }
        .nav-link-violet:hover, .nav-link-violet[aria-current="page"] {
            color: #fff;
            background: #a78bfa;
            box-shadow: 0 2px 16px 0 #a78bfa33;
        }
        .nav-link-green:hover, .nav-link-green[aria-current="page"] {
            color: #fff;
            background: #22c55e;
            box-shadow: 0 2px 16px 0 #22c55e33;
        }
        .nav-link-orange:hover, .nav-link-orange[aria-current="page"] {
            color: #fff;
            background: #fbbf24;
            box-shadow: 0 2px 16px 0 #fbbf2433;
        }
    </style>
</nav>
