@props([
    'icon' => 'sparkles',
    'title' => '',
    'tone' => 'light',
])

@php
    $iconBg = $tone === 'dark' ? 'bg-white/10 text-accent-300' : 'bg-brand-50 text-brand-600';
    $cardBg = $tone === 'dark'
        ? 'bg-white/5 border border-white/10 hover:bg-white/10 hover:border-white/20'
        : 'bg-white border border-slate-200 hover:border-brand-300 hover:shadow-2xl hover:shadow-brand-500/10';
    $titleColor = $tone === 'dark' ? 'text-white' : 'text-brand-900';
    $bodyColor = $tone === 'dark' ? 'text-white/70' : 'text-slate-600';
@endphp

<div
    x-data
    x-intersect.once="$el.classList.add('is-visible')"
    {{ $attributes->merge(['class' => 'reveal group relative flex flex-col gap-3 rounded-2xl p-4 transition-all duration-300 hover:-translate-y-1 sm:gap-4 sm:p-6 ' . $cardBg]) }}
>
    <div class="grid h-12 w-12 place-items-center rounded-xl {{ $iconBg }} transition group-hover:scale-110">
        <x-icon :name="$icon" class="h-6 w-6" />
    </div>
    <h3 class="font-display text-lg font-semibold sm:text-xl {{ $titleColor }}">{{ $title }}</h3>
    <div class="text-xs leading-relaxed sm:text-sm {{ $bodyColor }}">{{ $slot }}</div>
</div>
