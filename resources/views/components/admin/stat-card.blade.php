@props(['label', 'value', 'color' => 'blue'])

@php
    $valueColors = [
        'blue' => 'text-blue-600',
        'violet' => 'text-violet-500',
        'green' => 'text-green-600',
        'amber' => 'text-amber-500',
        'indigo' => 'text-indigo-600',
    ];
    $labelColors = [
        'blue' => 'text-primary',
        'violet' => 'text-accent',
        'green' => 'text-green-600',
        'amber' => 'text-amber-500',
        'indigo' => 'text-indigo-600',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'glass-card flex flex-col items-center p-6 text-center shadow-xl']) }}>
    <h3 class="mb-2 text-sm font-semibold {{ $labelColors[$color] ?? 'text-primary' }}">{{ $label }}</h3>
    <p class="text-4xl font-extrabold drop-shadow {{ $valueColors[$color] ?? 'text-blue-600' }}">{{ $value }}</p>
</div>
