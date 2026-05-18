@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Compare Brokerages | Taylor Properties')
@section('description', 'See what Taylor Properties charges - then run your own numbers against your current brokerage. The math is whatever you make it.')

@php
    $competitorData = json_decode(file_get_contents(resource_path('data/competitors.json')), true);
    $taylor = $competitorData['taylor'];
    $competitors = collect($competitorData['competitors'] ?? []) -> filter(fn($c) =>
        ($c['monthly_fee'] ?? null) !== null
        && ($c['transaction_fee'] ?? null) !== null
        && ($c['split_pct'] ?? null) !== null
        && !empty($c['source_url'])
    ) -> values();
@endphp

@section('content')

    <x-page-hero eyebrow="Side by side" title="The math doesn't lie."
                 subtitle="We don't guess your competitor's numbers. You enter what you actually pay - and the math tells the rest of the story.">
        <x-slot:actions>
            <x-button href="#calculator" variant="primary" size="lg">Run your numbers</x-button>
            <x-button :href="route('join')" variant="ghost" size="lg">Join Taylor</x-button>
        </x-slot:actions>
    </x-page-hero>

    {{-- Taylor at a glance --}}
    <section class="bg-white section-y">
        <div class="page-container">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">What Taylor charges</p>
                <h2 class="heading-page mt-3">No splits. No surprises. <span class="text-accent-500">One number.</span></h2>
            </div>

            <div class="mt-8 grid gap-4 sm:mt-12 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
                <div class="rounded-3xl border border-slate-200 bg-white card-pad text-center shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                    <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Monthly Fee</p>
                    <p class="mt-3 stat-hero text-brand-900">${{ $taylor['monthly_fee'] }}</p>
                    <p class="mt-2 text-sm text-slate-600">Flat. Every agent. Every month.</p>
                </div>
                <div class="rounded-3xl border-2 border-accent-400 bg-gradient-to-br from-accent-400 to-accent-500 card-pad text-center text-brand-950 shadow-xl shadow-accent-400/20">
                    <p class="text-xs font-bold uppercase tracking-wider text-brand-900/80">Annual Cap</p>
                    <p class="mt-3 stat-hero">${{ number_format($taylor['annual_cap_usd']) }}</p>
                    <p class="mt-2 text-sm font-semibold text-brand-900">The entire annual bill.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white card-pad text-center shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                    <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Agent Transaction Fee</p>
                    <p class="mt-3 stat-hero text-brand-900">$0</p>
                    <p class="mt-2 text-sm text-slate-600">Not per deal. Not at year-end. Zero.</p>
                </div>
                <div class="rounded-3xl border border-slate-200 bg-white card-pad text-center shadow-md transition hover:-translate-y-1 hover:shadow-xl">
                    <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Commission Split</p>
                    <p class="mt-3 stat-hero text-brand-900">100%</p>
                    <p class="mt-2 text-sm text-slate-600">Forever. From your first deal.</p>
                </div>
            </div>

            <div class="mt-8 mx-auto max-w-3xl rounded-2xl border border-brand-100 bg-brand-50 p-5 text-center sm:mt-10 sm:p-6">
                <p class="prose-body text-slate-700">
                    Most brokerages bury the math in splits, caps, royalty fees, agent transaction fees, and "platform" surcharges. We don't. <span class="font-semibold text-brand-900">${{ number_format($taylor['annual_cap_usd']) }}/year is the whole bill.</span>
                </p>
            </div>
        </div>
    </section>

    {{-- Optional comparison table - only renders if we have verified competitor data --}}
    @if ($competitors -> isNotEmpty())
        <section class="bg-slate-50 section-y">
            <div class="page-container">
                <div class="text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Verified comparisons</p>
                    <h2 class="heading-page-sm mt-3">Side by side, sourced.</h2>
                    <p class="mt-3 text-sm text-slate-600">Every cell is sourced directly from the brokerage's published fee structure.</p>
                </div>

                <div class="mt-10 overflow-x-auto rounded-3xl border border-slate-200 bg-white shadow-xl shadow-brand-500/5">
                    <table class="w-full min-w-[760px] text-left">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="sticky left-0 z-10 bg-slate-50 px-6 py-5 text-xs font-semibold uppercase tracking-wider text-slate-500">Cost</th>
                                <th class="px-6 py-5 text-center">
                                    <div class="font-display text-base font-bold text-brand-700">Taylor</div>
                                    <div class="mt-1 text-[11px] uppercase tracking-wider text-accent-500">You're here</div>
                                </th>
                                @foreach ($competitors as $c)
                                    <th class="px-6 py-5 text-center">
                                        <div class="font-display text-base font-bold text-slate-700">{{ $c['name'] }}</div>
                                        <div class="mt-1 text-[10px] text-slate-400">Source: {{ $c['source_date'] }}</div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @foreach ([
                                ['Monthly fee', 'monthly_fee', 'currency'],
                                ['Agent transaction fee', 'transaction_fee', 'currency'],
                                ['Commission split', 'split_pct', 'percent'],
                                ['Franchise/royalty fee', 'franchise_fee_pct', 'percent'],
                                ['Annual cap', 'annual_cap_usd', 'currency_or_label'],
                            ] as [$label, $key, $format])
                                <tr class="group">
                                    <th scope="row" class="sticky left-0 z-10 bg-white px-6 py-4 font-semibold text-slate-700 group-hover:bg-slate-50">{{ $label }}</th>
                                    <td class="bg-brand-50 px-6 py-4 text-center font-bold text-brand-700">
                                        @if ($format === 'currency')
                                            ${{ number_format($taylor[$key]) }}
                                        @elseif ($format === 'percent')
                                            {{ $taylor[$key] }}%
                                        @else
                                            {{ $taylor['annual_cap_label'] ?? '$' . number_format($taylor[$key]) }}
                                        @endif
                                    </td>
                                    @foreach ($competitors as $c)
                                        <td class="px-6 py-4 text-center text-slate-700">
                                            @php $val = $c[$key] ?? null; @endphp
                                            @if ($val === null)
                                                <span class="text-slate-300">—</span>
                                            @elseif ($format === 'currency')
                                                ${{ number_format($val) }}
                                            @elseif ($format === 'percent')
                                                {{ $val }}%
                                            @else
                                                {{ $c['annual_cap_label'] ?? '$' . number_format($val) }}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <p class="mt-4 text-xs text-slate-500">
                    Each competitor row is sourced from that brokerage's public fee documentation. Verify any number yourself:
                    @foreach ($competitors as $c)
                        <a href="{{ $c['source_url'] }}" target="_blank" rel="noopener" class="ml-2 text-brand-700 hover:underline">{{ $c['name'] }}</a>@if (!$loop -> last),@endif
                    @endforeach.
                </p>
            </div>
        </section>
    @endif

    {{-- Calculator: agent-driven, fully honest --}}
    <section id="calculator" class="bg-white pb-20 pt-4 sm:pb-28 sm:pt-8">
        <div class="page-container">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">The honest comparison</p>
                <h2 class="heading-page mt-3">Use your real numbers.</h2>
                <p class="mt-3 text-sm text-slate-600">We don't pretend to know exactly what you pay today. Type in your actual fees and split - we'll show you the difference at Taylor.</p>
            </div>
            <div class="mt-12">
                <x-calculator />
            </div>
        </div>
    </section>

    <x-cta-band title="Convinced yet?" subtitle="Get your custom plan in 15 minutes - no pressure, no commitment." />

@endsection
