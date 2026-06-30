@props([
    'label',
    'value',
    'trend' => null,
    'color' => 'blue',
])

@php
    $iconBg = [
        'blue' => 'bg-blue-50 text-blue-600',
        'violet' => 'bg-violet-50 text-violet-600',
        'sky' => 'bg-sky-50 text-sky-600',
        'amber' => 'bg-amber-50 text-amber-600',
        'emerald' => 'bg-emerald-50 text-emerald-600',
        'pink' => 'bg-pink-50 text-pink-600',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'app-card p-5']) }}>
    <div class="flex items-start justify-between gap-3">
        <div @class(['flex h-10 w-10 shrink-0 items-center justify-center rounded-lg', $iconBg[$color] ?? $iconBg['blue']])>
            {{ $icon }}
        </div>
    </div>
    <p class="mt-4 text-sm font-medium text-ink-muted">{{ $label }}</p>
    <p class="mt-1 font-display text-3xl font-bold text-ink">{{ $value }}</p>
    @if ($trend !== null)
        <p class="mt-3 flex items-center gap-1 font-mono text-xs text-emerald-600">
            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
            {{ $trend }}
        </p>
    @endif
</div>
