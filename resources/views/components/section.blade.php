@props([
    'eyebrow' => null,
    'title' => null,
    'subtitle' => null,
    'align' => 'center',
    'tone' => 'light',
])

@php
    $tones = [
        'light' => 'bg-white text-slate-800',
        'soft' => 'bg-slate-50 text-slate-800',
        'brand' => 'bg-brand-50 text-slate-800',
        'dark' => 'bg-brand-950 text-white',
        'gradient' => 'bg-gradient-to-br from-brand-900 via-brand-800 to-brand-950 text-white',
    ];
    $alignClass = $align === 'center' ? 'text-center mx-auto' : 'text-left';
@endphp

<section {{ $attributes->merge(['class' => 'relative overflow-hidden py-20 sm:py-28 ' . ($tones[$tone] ?? $tones['light'])]) }}>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if ($eyebrow || $title || $subtitle)
            <div class="{{ $alignClass }} max-w-3xl">
                @if ($eyebrow)
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] {{ $tone === 'dark' || $tone === 'gradient' ? 'text-accent-300' : 'text-brand-500' }}">
                        {{ $eyebrow }}
                    </p>
                @endif
                @if ($title)
                    <h2 class="mt-3 font-display text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
                        {!! $title !!}
                    </h2>
                @endif
                @if ($subtitle)
                    <p class="mt-5 text-lg leading-relaxed {{ $tone === 'dark' || $tone === 'gradient' ? 'text-white/70' : 'text-slate-600' }}">
                        {!! $subtitle !!}
                    </p>
                @endif
            </div>
        @endif

        <div class="@if($eyebrow || $title || $subtitle) mt-14 @endif">
            {{ $slot }}
        </div>
    </div>
</section>
