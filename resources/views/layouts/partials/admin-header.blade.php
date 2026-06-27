<header class="sticky top-0 z-30 border-b border-primary/10 bg-white/90 backdrop-blur-xl shadow-sm">
    <div class="flex h-16 items-center gap-4 px-4 sm:px-6 lg:px-8">
        {{-- Bouton menu mobile --}}
        <button
            type="button"
            class="inline-flex items-center justify-center rounded-xl p-2 text-primary hover:bg-primary/10 focus:outline-none focus:ring-2 focus:ring-primary/30 lg:hidden"
            @click="sidebarOpen = true"
            aria-label="Ouvrir le menu"
            aria-controls="admin-sidebar"
        >
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        {{-- Titre de page --}}
        <div class="min-w-0 flex-1">
            @isset($header)
                <div class="truncate text-lg font-extrabold text-primary sm:text-xl">
                    {{ $header }}
                </div>
            @else
                <div class="truncate text-lg font-extrabold text-primary sm:text-xl">
                    Administration CoachPro+
                </div>
            @endisset
        </div>

        {{-- Zone droite --}}
        <div class="flex shrink-0 items-center gap-3">
            <span class="hidden rounded-full bg-accent/15 px-3 py-1 text-xs font-bold uppercase tracking-wide text-accent sm:inline-flex">
                Back Office
            </span>

            @auth
                <div class="flex items-center gap-3 rounded-xl border border-primary/10 bg-white/80 px-3 py-1.5 shadow-sm">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-sm font-bold text-white">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden min-w-0 sm:block">
                        <p class="truncate text-sm font-bold text-dark">{{ auth()->user()->name }}</p>
                        <p class="truncate text-xs text-gray-500">Administrateur</p>
                    </div>
                </div>
            @else
                <div class="flex items-center gap-3 rounded-xl border border-primary/10 bg-white/80 px-3 py-1.5 shadow-sm">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-sm font-bold text-white">
                        A
                    </div>
                    <div class="hidden min-w-0 sm:block">
                        <p class="truncate text-sm font-bold text-dark">Administrateur</p>
                        <p class="truncate text-xs text-gray-500">CoachPro+</p>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</header>
