@props([
    'label',
    'variant' => 'default',
])

@php
    $variants = [
        'default' => 'bg-blue-50 text-blue-700',
        'success' => 'bg-emerald-50 text-emerald-700',
        'warning' => 'bg-amber-50 text-amber-700',
        'danger' => 'bg-red-50 text-red-700',
        'muted' => 'bg-slate-100 text-slate-600',
        'violet' => 'bg-violet-50 text-violet-700',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold ' . ($variants[$variant] ?? $variants['default'])]) }}>
    {{ $label }}
</span>
