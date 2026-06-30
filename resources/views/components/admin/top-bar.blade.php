@props([
    'title',
    'subtitle' => null,
])

<header class="mb-8">
    <div class="flex items-start justify-between gap-4">
        <div class="flex min-w-0 items-start gap-3">
            <button
                type="button"
                class="mt-0.5 inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-slate-200 bg-white text-ink-muted shadow-sm transition hover:bg-slate-50 lg:hidden"
                @click="sidebarOpen = true"
                aria-label="Ouvrir le menu"
                aria-controls="app-sidebar"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="min-w-0">
                <h1 class="font-display text-2xl font-bold text-ink sm:text-3xl">{{ $title }}</h1>
                @if ($subtitle)
                    <p class="mt-1 text-sm text-ink-muted">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        @isset($action)
            <div class="flex shrink-0 items-center gap-2">
                {{ $action }}
            </div>
        @endisset
    </div>
</header>
