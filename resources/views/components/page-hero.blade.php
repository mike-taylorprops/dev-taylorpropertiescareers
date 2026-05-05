@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => null,
])

<section class="relative overflow-hidden bg-gradient-to-br from-brand-900 via-brand-800 to-brand-950 pt-36 pb-20 text-white sm:pt-44 sm:pb-28">
    <div class="absolute -top-32 -left-24 h-[30rem] w-[30rem] rounded-full bg-accent-400/20 blur-3xl motion-safe:animate-blob"></div>
    <div class="absolute -bottom-40 right-[-10rem] h-[34rem] w-[34rem] rounded-full bg-brand-400/30 blur-3xl motion-safe:animate-blob-slow"></div>
    <div class="absolute inset-0 bg-grid opacity-30"></div>

    <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
        @if ($eyebrow)
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-accent-300">{{ $eyebrow }}</p>
        @endif
        <h1 class="mt-4 font-display text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl">
            {!! $title !!}
        </h1>
        @if ($subtitle)
            <p class="mx-auto mt-6 max-w-3xl text-lg text-white/80 sm:text-xl">{!! $subtitle !!}</p>
        @endif
        @isset($actions)
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                {{ $actions }}
            </div>
        @endisset
    </div>
</section>
