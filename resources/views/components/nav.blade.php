@props(['transparent' => false])

@php
    $groups = [
        ['label' => 'Why Taylor', 'route' => 'why-taylor'],
        [
            'label' => 'Plans',
            'children' => [
                ['label' => 'Commission Plans', 'route' => 'commission-plans', 'desc' => '100% commission. $99 a month.'],
                ['label' => 'Compare Brokerages', 'route' => 'compare', 'desc' => 'Run your numbers next to ours.'],
                ['label' => 'Referral Company', 'route' => 'referral-company', 'desc' => 'Refer-only agents. $99/year.'],
            ],
        ],
        [
            'label' => 'Tools & Training',
            'children' => [
                ['label' => 'Technology', 'route' => 'technology', 'desc' => 'BoldTrail front-end + back office.'],
                ['label' => 'Mentoring', 'route' => 'mentoring', 'desc' => '1-on-1 coaching, live training, CE.'],
            ],
        ],
        [
            'label' => 'About',
            'children' => [
                ['label' => 'About Us', 'route' => 'about-us', 'desc' => 'Family-owned since 1985.'],
                ['label' => 'Our Staff', 'route' => 'our-staff', 'desc' => 'Meet the team behind the brokerage.'],
                ['label' => 'Teams', 'route' => 'teams', 'desc' => 'Browse teams inside Taylor.'],
                ['label' => 'Contact Us', 'route' => 'contact-us', 'desc' => 'Phone, email, message us.'],
            ],
        ],
    ];

    $isActiveGroup = function ($group) {
        if (isset($group['route']) && request()->routeIs($group['route'])) return true;
        if (isset($group['children'])) {
            foreach ($group['children'] as $child) {
                if (request()->routeIs($child['route'])) return true;
            }
        }
        return false;
    };
@endphp

<header
    x-data="nav"
    :class="scrolled || open ? 'bg-brand-500/95 backdrop-blur-md shadow-lg' : '{{ $transparent ? 'bg-transparent' : 'bg-brand-500' }}'"
    class="fixed inset-x-0 top-0 z-40 transition-all duration-300"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}"
           class="flex items-center gap-3 transition-opacity duration-300"
           @if (request()->routeIs('home')) :class="scrolled || open ? 'opacity-100' : 'opacity-0 pointer-events-none'" @endif>
            <img src="{{ asset('images/logo-white.png') }}" alt="Taylor Properties" class="h-10 w-auto sm:h-12">
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            @foreach ($groups as $group)
                @if (isset($group['route']))
                    <a href="{{ route($group['route']) }}"
                       class="rounded-full px-4 py-2 text-sm font-medium text-white/90 transition hover:bg-white/10 hover:text-white {{ $isActiveGroup($group) ? 'bg-white/10 text-white' : '' }}">
                        {{ $group['label'] }}
                    </a>
                @else
                    <div x-data="{
                            open: false,
                            timer: null,
                            show() { clearTimeout(this.timer); this.open = true; },
                            hide() { this.timer = setTimeout(() => this.open = false, 180); }
                         }"
                         @mouseenter="show"
                         @mouseleave="hide"
                         class="relative">
                        <button @click="open = !open"
                                @focus="show"
                                class="inline-flex items-center gap-1 rounded-full px-4 py-2 text-sm font-medium text-white/90 transition hover:bg-white/10 hover:text-white {{ $isActiveGroup($group) ? 'bg-white/10 text-white' : '' }}">
                            {{ $group['label'] }}
                            <svg class="h-4 w-4 transition" :class="open && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 -translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="pointer-events-none absolute left-1/2 top-full z-50 w-72 -translate-x-1/2 pt-2"
                             style="display:none">
                            <div @mouseenter="show"
                                 @mouseleave="hide"
                                 class="pointer-events-auto overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl">
                                <div class="p-2">
                                    @foreach ($group['children'] as $child)
                                        <a href="{{ route($child['route']) }}"
                                           class="block rounded-xl px-4 py-3 transition hover:bg-brand-50 {{ request()->routeIs($child['route']) ? 'bg-brand-50' : '' }}">
                                            <div class="font-display text-sm font-semibold text-brand-900">{{ $child['label'] }}</div>
                                            <div class="mt-0.5 text-xs text-slate-500">{{ $child['desc'] }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('join') }}"
               class="hidden rounded-full bg-accent-400 px-5 py-2.5 text-sm font-semibold text-brand-900 shadow-lg shadow-accent-400/30 transition hover:bg-accent-300 hover:shadow-accent-400/50 sm:inline-flex">
                Join Now
            </a>
            <button @click="toggle" class="rounded-md p-2 text-white lg:hidden" aria-label="Toggle menu">
                <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display:none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>

    {{-- Mobile drawer --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="max-h-[80vh] overflow-y-auto border-t border-white/10 bg-brand-500/95 backdrop-blur-md lg:hidden"
         style="display:none">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6">
            <div class="space-y-1">
                @foreach ($groups as $group)
                    @if (isset($group['route']))
                        <a href="{{ route($group['route']) }}" @click="close"
                           class="block rounded-lg px-4 py-3 text-base font-medium text-white/90 hover:bg-white/10">
                            {{ $group['label'] }}
                        </a>
                    @else
                        <div x-data="{ subopen: {{ $isActiveGroup($group) ? 'true' : 'false' }} }">
                            <button @click="subopen = !subopen"
                                    class="flex w-full items-center justify-between rounded-lg px-4 py-3 text-base font-medium text-white/90 hover:bg-white/10">
                                <span>{{ $group['label'] }}</span>
                                <svg class="h-4 w-4 transition" :class="subopen && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6"/>
                                </svg>
                            </button>
                            <div x-show="subopen" x-collapse class="ml-3 mt-1 space-y-1 border-l border-white/10 pl-3" style="display:none">
                                @foreach ($group['children'] as $child)
                                    <a href="{{ route($child['route']) }}" @click="close"
                                       class="block rounded-lg px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
                <a href="{{ route('join') }}" @click="close"
                   class="mt-3 block rounded-lg bg-accent-400 px-4 py-3 text-center text-base font-semibold text-brand-900">
                    Join Now
                </a>
            </div>
        </div>
    </div>
</header>
