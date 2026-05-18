@props([
    'icon' => 'sparkles',
    'title' => '',
    'stat' => null,
    'teaser' => null,
    'variant' => 'light',
])

@php
    $variants = [
        'light' => [
            'front' => 'bg-white border border-slate-200 hover:border-brand-300 hover:shadow-2xl hover:shadow-brand-500/15',
            'iconBg' => 'bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-500/30',
            'stat' => 'text-brand-700',
            'title' => 'text-brand-900',
            'teaser' => 'text-slate-500',
            'cue' => 'text-brand-500',
        ],
        'dark' => [
            'front' => 'border border-brand-700/50 bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 text-white hover:shadow-2xl hover:shadow-brand-500/40',
            'iconBg' => 'bg-accent-400 text-brand-900 shadow-lg shadow-accent-400/40',
            'stat' => 'text-accent-300',
            'title' => 'text-white',
            'teaser' => 'text-white/60',
            'cue' => 'text-accent-300',
        ],
        'gold' => [
            'front' => 'border-2 border-accent-400 bg-gradient-to-br from-accent-400 to-accent-500 text-brand-950 hover:shadow-2xl hover:shadow-accent-400/50',
            'iconBg' => 'bg-brand-900 text-accent-300 shadow-lg shadow-brand-900/40',
            'stat' => 'text-brand-950',
            'title' => 'text-brand-950',
            'teaser' => 'text-brand-900/70',
            'cue' => 'text-brand-900',
        ],
    ];
    $v = $variants[$variant] ?? $variants['light'];
@endphp

<div
    x-data="flipCard"
    @click="flip"
    @keydown.enter.prevent="flip"
    @keydown.space.prevent="flip"
    tabindex="0"
    role="button"
    :aria-pressed="flipped"
    {{ $attributes->merge(['class' => 'perspective grid cursor-pointer outline-none focus-visible:ring-2 focus-visible:ring-accent-400 focus-visible:ring-offset-2 rounded-2xl group']) }}
>
    <div class="preserve-3d col-start-1 row-start-1 w-full transition-transform duration-700"
         :class="flipped ? 'rotate-y-180' : ''">

        {{-- Front (in document flow so height fits content on mobile) --}}
        <div class="backface-hidden relative overflow-hidden rounded-2xl p-4 shadow-md transition-all duration-300 group-hover:-translate-y-1 sm:p-6 {{ $v['front'] }}">

            <div class="pointer-events-none absolute -top-16 -right-16 h-40 w-40 rounded-full opacity-30 blur-3xl transition-opacity duration-300 group-hover:opacity-60"
                 style="background: radial-gradient(circle, white, transparent 70%);"></div>

            <div class="relative flex flex-col gap-3 sm:min-h-[17rem] sm:justify-between sm:gap-0">
                <div class="flex items-start justify-between gap-3">
                    <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6 sm:h-14 sm:w-14 sm:rounded-2xl {{ $v['iconBg'] }}">
                        <x-icon :name="$icon" class="h-6 w-6 sm:h-7 sm:w-7" />
                    </div>

                    @if ($stat)
                        <div class="text-right">
                            <div class="font-display text-2xl font-black leading-none tracking-tight sm:text-4xl {{ $v['stat'] }}">{{ $stat }}</div>
                        </div>
                    @endif
                </div>

                <div>
                    <h3 class="font-display text-xl font-bold leading-tight sm:text-2xl {{ $v['title'] }}">{{ $title }}</h3>
                    @if ($teaser)
                        <p class="mt-1.5 text-sm leading-relaxed sm:mt-2 {{ $v['teaser'] }}">{{ $teaser }}</p>
                    @endif

                    <div class="mt-3 inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider sm:mt-4 {{ $v['cue'] }}">
                        Tap to learn more
                        <svg class="h-3 w-3 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M5 12h13"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Back --}}
        <div class="backface-hidden rotate-y-180 absolute inset-0 flex flex-col justify-between overflow-hidden rounded-2xl bg-gradient-to-br from-brand-800 via-brand-900 to-brand-950 p-4 text-white shadow-xl sm:p-6">
            <div class="absolute -bottom-20 -left-12 h-48 w-48 rounded-full bg-white/20 blur-3xl"></div>
            <div class="absolute -top-12 -right-12 h-40 w-40 rounded-full bg-brand-400/30 blur-3xl"></div>

            <div class="relative">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-accent-400 text-brand-900 sm:h-12 sm:w-12">
                    <x-icon :name="$icon" class="h-5 w-5 sm:h-6 sm:w-6" />
                </div>
                <h3 class="mt-3 font-display text-lg font-bold sm:mt-4 sm:text-xl">{{ $title }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-white/90 sm:mt-3">{{ $slot }}</p>
            </div>
            <p class="relative mt-3 inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-accent-300 sm:mt-4">
                <svg class="h-3 w-3 rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M5 12h13"/>
                </svg>
                Tap to flip back
            </p>
        </div>
    </div>
</div>
