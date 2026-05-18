@props([
    'number' => 0,
    'prefix' => '',
    'suffix' => '',
    'label' => '',
    'sublabel' => null,
    'tone' => 'dark',
])

@php
    $isDark = $tone === 'dark';
    $opts = json_encode(['prefix' => $prefix, 'suffix' => $suffix]);
@endphp

<div {{ $attributes->merge(['class' => 'text-center']) }}>
    <div
        x-data="counter({{ $number }}, {{ $opts }})"
        x-intersect.once="start"
        class="stat-hero lg:text-6xl {{ $isDark ? 'text-white' : 'text-brand-700' }}"
    >{{ $prefix }}0{{ $suffix }}</div>
    <div class="mt-3 text-sm font-semibold uppercase tracking-wider {{ $isDark ? 'text-accent-300' : 'text-brand-500' }}">
        {{ $label }}
    </div>
    @if ($sublabel)
        <div class="mt-1 text-xs {{ $isDark ? 'text-white/60' : 'text-slate-500' }}">{{ $sublabel }}</div>
    @endif
</div>
