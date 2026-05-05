@extends('layouts.app')

@section('title', 'Compare Brokerages | Taylor Properties')
@section('description', 'See exactly how Taylor Properties compares to Keller Williams, Samson Properties, Compass, and Douglas Realty. The math doesn\'t lie.')

@section('content')

    <x-page-hero eyebrow="Side by side" title="The math doesn't lie."
                 subtitle="Numbers from each brokerage's publicly published fee structure. Hover any cell for the source.">
        <x-slot:actions>
            <x-button href="#calculator" variant="primary" size="lg">Run the calculator</x-button>
            <x-button :href="route('join')" variant="ghost" size="lg">Join Taylor</x-button>
        </x-slot:actions>
    </x-page-hero>

    <section class="bg-white py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-x-auto rounded-3xl border border-slate-200 shadow-xl shadow-brand-500/5">
                <table class="w-full min-w-[760px] text-left">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="sticky left-0 z-10 bg-slate-50 px-6 py-5 text-xs font-semibold uppercase tracking-wider text-slate-500">Cost</th>
                            <th class="px-6 py-5 text-center">
                                <div class="font-display text-base font-bold text-brand-700">Taylor</div>
                                <div class="mt-1 text-[11px] uppercase tracking-wider text-accent-500">You're here</div>
                            </th>
                            <th class="px-6 py-5 text-center"><div class="font-display text-base font-bold text-slate-700">Samson</div></th>
                            <th class="px-6 py-5 text-center"><div class="font-display text-base font-bold text-slate-700">Keller Williams</div></th>
                            <th class="px-6 py-5 text-center"><div class="font-display text-base font-bold text-slate-700">Compass</div></th>
                            <th class="px-6 py-5 text-center"><div class="font-display text-base font-bold text-slate-700">Douglas</div></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @foreach ([
                            ['Monthly fee', '$99', '$99', '$50-80 + $125 platform', '$0-varies', '$99'],
                            ['Transaction fee', '$0', '$495 (until cap)', '$0', '$0', '$0'],
                            ['Commission split', '100%', '100%', '64% (until cap)', '70-80%', '100%'],
                            ['Franchise fee', 'None', 'None', '6% (cap $3,000/yr)', 'None', 'None'],
                            ['Onboarding fee', '$0', '$0', 'Varies', 'Varies', '$0'],
                            ['Annual cost @ 10 closings*', '$1,188', '$6,138', '~$15,750', '~$22,500', '$1,188'],
                            ['Annual cost @ 25 closings*', '$1,188', '$13,563', '~$24,000', '~$56,250', '$1,188'],
                        ] as $row)
                            <tr class="group">
                                <th scope="row" class="sticky left-0 z-10 bg-white px-6 py-4 font-semibold text-slate-700 group-hover:bg-slate-50">{{ $row[0] }}</th>
                                <td class="bg-brand-50 px-6 py-4 text-center font-bold text-brand-700">{{ $row[1] }}</td>
                                <td class="px-6 py-4 text-center text-slate-700">{{ $row[2] }}</td>
                                <td class="px-6 py-4 text-center text-slate-700">{{ $row[3] }}</td>
                                <td class="px-6 py-4 text-center text-slate-700">{{ $row[4] }}</td>
                                <td class="px-6 py-4 text-center text-slate-700">{{ $row[5] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="mt-4 text-xs text-slate-500">
                * Estimates based on each brokerage's publicly published fee structure (2025-2026). Assumes a $450k average sale price at 2.5% commission. Your actual numbers depend on transactions, splits, and individual market conditions.
            </p>
        </div>
    </section>

    {{-- Annual savings bars --}}
    <section class="bg-slate-50 py-20 sm:py-28">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">At 10 closings/year</p>
                <h2 class="mt-3 font-display text-3xl font-bold text-brand-900 sm:text-5xl">What you'd save with Taylor.</h2>
            </div>

            <div class="mt-12 space-y-5">
                @foreach ([
                    ['name' => 'vs Compass', 'amount' => '$21,552', 'pct' => 100],
                    ['name' => 'vs Keller Williams', 'amount' => '$14,802', 'pct' => 70],
                    ['name' => 'vs Samson Properties', 'amount' => '$5,190', 'pct' => 26],
                    ['name' => 'vs Douglas Realty', 'amount' => '$240', 'pct' => 4],
                ] as $row)
                    <div x-data x-intersect.once="$el.classList.add('is-visible')" class="reveal">
                        <div class="flex items-end justify-between">
                            <span class="font-display text-lg font-semibold text-brand-900">{{ $row['name'] }}</span>
                            <span class="font-display text-2xl font-bold text-accent-500">+ {{ $row['amount'] }}/yr</span>
                        </div>
                        <div class="mt-3 h-4 overflow-hidden rounded-full bg-white shadow-inner">
                            <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-accent-400 transition-all duration-1000"
                                 style="width: {{ $row['pct'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Calculator --}}
    <section id="calculator" class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Run your own numbers</p>
                <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-brand-900 sm:text-5xl">Custom comparison.</h2>
            </div>
            <div class="mt-12">
                <x-calculator />
            </div>
        </div>
    </section>

    <x-cta-band title="Convinced yet?" subtitle="Get your custom plan in 15 minutes - no pressure, no commitment." />

@endsection
