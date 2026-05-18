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

<section {{ $attributes->merge(['class' => 'relative overflow-hidden section-y ' . ($tones[$tone] ?? $tones['light'])]) }}>
    <div class="relative page-container">
        @if ($eyebrow || $title || $subtitle)
            <div class="{{ $alignClass }} max-w-3xl">
                @if ($eyebrow)
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] sm:text-sm {{ $tone === 'dark' || $tone === 'gradient' ? 'text-accent-300' : 'text-brand-500' }}">
                        {{ $eyebrow }}
                    </p>
                @endif
                @if ($title)
                    <h2 class="heading-section mt-2 sm:mt-3">
                        {!! $title !!}
                    </h2>
                @endif
                @if ($subtitle)
                    <p class="mt-3 text-sm leading-relaxed sm:mt-5 sm:text-lg {{ $tone === 'dark' || $tone === 'gradient' ? 'text-white/70' : 'text-slate-600' }}">
                        {!! $subtitle !!}
                    </p>
                @endif
            </div>
        @endif

        <div class="@if($eyebrow || $title || $subtitle) mt-6 sm:mt-14 @endif">
            {{ $slot }}
        </div>
    </div>
</section>
