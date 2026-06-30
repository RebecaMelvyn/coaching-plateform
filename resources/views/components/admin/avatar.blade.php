@props([
    'initials',
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'h-8 w-8 text-xs',
        'md' => 'h-10 w-10 text-sm',
        'lg' => 'h-12 w-12 text-base',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex shrink-0 items-center justify-center rounded-full bg-primary font-semibold text-white ' . ($sizes[$size] ?? $sizes['md'])]) }}>
    {{ strtoupper($initials) }}
</div>
