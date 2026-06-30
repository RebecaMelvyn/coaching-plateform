@props(['title' => null])

<div {{ $attributes->merge(['class' => 'app-card overflow-hidden']) }}>
    @if ($title)
        <div class="flex flex-col gap-4 border-b border-slate-100 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-display text-lg font-bold text-ink">{{ $title }}</h2>
            @isset($actions)
                <div class="flex flex-wrap items-center gap-3">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    @endif
    <div class="p-6">
        {{ $slot }}
    </div>
</div>
