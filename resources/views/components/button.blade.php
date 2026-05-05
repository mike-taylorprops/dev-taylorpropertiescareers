@props([
    'variant' => 'primary',
    'href' => null,
    'size' => 'md',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-full font-semibold transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2';
    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3 text-base',
        'lg' => 'px-8 py-4 text-lg',
    ];
    $variants = [
        'primary' => 'bg-accent-400 text-brand-900 shadow-lg shadow-accent-400/30 hover:bg-accent-300 hover:shadow-accent-400/50 focus-visible:ring-accent-400',
        'secondary' => 'bg-brand-500 text-white shadow-lg shadow-brand-500/30 hover:bg-brand-600 focus-visible:ring-brand-500',
        'ghost' => 'border border-white/20 text-white hover:bg-white/10 focus-visible:ring-white',
        'outline' => 'border-2 border-brand-500 text-brand-700 hover:bg-brand-500 hover:text-white focus-visible:ring-brand-500',
        'dark' => 'bg-brand-900 text-white hover:bg-brand-800 focus-visible:ring-brand-700',
    ];
    $classes = $base . ' ' . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }}>
        {{ $slot }}
    </button>
@endif
