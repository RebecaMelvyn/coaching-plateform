@props(['title' => null])

<div {{ $attributes->merge(['class' => 'glass-card shadow-xl']) }}>
    @if ($title)
        <div class="flex flex-col gap-4 border-b border-primary/10 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-lg font-bold text-primary">{{ $title }}</h3>
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
