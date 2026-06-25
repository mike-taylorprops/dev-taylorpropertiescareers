@extends('layouts.app', ['transparentNav' => true])

@section('title', 'About Taylor Properties')
@section('description', 'Family-owned since 1985. Maryland\'s largest independent brokerage. The story of how Taylor Properties got here.')

@section('content')

    <x-page-hero eyebrow="Our story"
                 title="40+ years. <span class='text-gradient'>One mission.</span>"
                 subtitle="Help real estate professionals keep more of what they earn - without sacrificing the support they need to grow.">
    </x-page-hero>

    <section class="relative overflow-hidden bg-white section-y">
        <div class="relative page-container">
            <div class="grid items-center gap-8 lg:grid-cols-12 sm:gap-12">

                <div class="lg:col-span-7">
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Built for agents, by an agent</p>
                    <h2 class="heading-page mt-3 leading-tight">
                        Founded in <span class="text-accent-500">1985</span> on a simple idea.
                    </h2>

                    <div class="mt-6 space-y-4 prose-body text-slate-700 sm:mt-8 sm:space-y-6">
                        <p>
                            Robb Taylor opened Taylor Properties with one mission: build a brokerage that serves the <em class="text-brand-700 not-italic font-semibold">agent</em>, not the other way around.
                        </p>
                        <p>
                            In an industry where franchise fees, agent transaction fees, and split structures eat up half an agent's commission, we built something different. We pioneered the 100% commission model in Maryland - and never looked back.
                        </p>
                        <p>
                            Today, we're the <strong class="text-brand-900">largest independent brokerage in Maryland</strong>. Still family-owned. Still independently operated. Still focused on the same mission.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="relative">
                        <div class="absolute -inset-4 rounded-3xl bg-gradient-to-br from-brand-500/10 via-white/30 to-brand-700/10"></div>
                        <div class="relative grid auto-rows-fr grid-cols-2 gap-4">
                            <div class="flex h-full flex-col rounded-3xl border border-slate-200 bg-white p-4 shadow-md sm:p-6">
                                <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Founded</p>
                                <p class="mt-2 font-display text-3xl font-bold text-brand-900 sm:text-4xl">1985</p>
                                <p class="mt-auto pt-2 text-xs text-slate-500">In Annapolis, MD</p>
                            </div>
                            <div class="mt-8 flex h-full flex-col rounded-3xl border border-slate-200 bg-gradient-to-br from-brand-700 to-brand-950 p-6 text-white shadow-md">
                                <p class="text-xs font-semibold uppercase tracking-wider text-accent-300">Agents</p>
                                <p class="mt-2 font-display text-3xl font-bold sm:text-4xl">1,200+</p>
                                <p class="mt-auto pt-2 text-xs text-white/70">In 5 states</p>
                            </div>
                            <div class="flex h-full flex-col rounded-3xl border border-slate-200 bg-gradient-to-br from-accent-400 to-accent-500 p-6 text-brand-950 shadow-md">
                                <p class="text-xs font-bold uppercase tracking-wider text-brand-900/80">Model</p>
                                <p class="mt-2 font-display text-3xl font-bold sm:text-4xl">100%</p>
                                <p class="mt-auto pt-2 text-xs text-brand-900/80">Commission</p>
                            </div>
                            <div class="mt-8 flex h-full flex-col rounded-3xl border border-slate-200 bg-white p-4 shadow-md sm:p-6">
                                <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Owned by</p>
                                <p class="mt-2 font-display text-2xl font-bold leading-tight text-brand-900 sm:text-3xl">Taylor Family</p>
                                <p class="mt-auto pt-2 text-xs text-slate-500">Independently operated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Timeline --}}
    <section class="relative bg-slate-50 section-y">
        <div class="page-container-sm">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Milestones</p>
                <h2 class="heading-page mt-3">From a one-office brokerage to 1,200 agents.</h2>
            </div>

            <div class="relative mt-10 sm:mt-16">
                <div class="absolute left-4 top-0 h-full w-0.5 bg-brand-200 sm:left-1/2 sm:-translate-x-1/2"></div>

                @foreach ([
                    ['1985', 'Founded', 'Robb Taylor opens Taylor Properties in Annapolis, MD.'],
                    ['1995', 'First 100% Plan', 'We launch one of Maryland\'s first 100%-commission models.'],
                    ['2005', 'Multi-State Expansion', 'Licensing expands to DC and VA - same model, more reach.'],
                    ['2015', 'Tech Stack Built', 'Custom CRM, IDX, and marketing tools - all included for agents.'],
                    ['2020', '1,000+ Agents', 'Crossed the thousand-agent mark while staying family-owned.'],
                    ['Today', 'Largest Independent in MD', '1,200+ agents in 5 states. $99/month. Zero agent transaction fees.'],
                ] as $i => $event)
                    <div x-data x-intersect.once="$el.classList.remove('opacity-0')"
                         class="relative mb-12 flex items-start gap-6 opacity-0 transition-opacity duration-700 sm:gap-12 {{ $i % 2 === 0 ? 'sm:flex-row' : 'sm:flex-row-reverse' }}">
                        <div class="hidden w-1/2 sm:block {{ $i % 2 === 0 ? 'text-right' : 'text-left' }}"></div>
                        <div class="absolute left-4 z-10 -translate-x-1/2 sm:left-1/2">
                            <div class="grid h-8 w-8 place-items-center rounded-full border-4 border-slate-50 bg-accent-400 text-xs font-bold text-brand-900 shadow-lg">
                                <span>&bull;</span>
                            </div>
                        </div>
                        <div class="ml-12 w-full sm:ml-0 sm:w-1/2">
                            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-md transition hover:shadow-xl">
                                <p class="font-display text-2xl font-bold text-accent-500">{{ $event[0] }}</p>
                                <h3 class="mt-1 font-display text-lg font-bold text-brand-900">{{ $event[1] }}</h3>
                                <p class="mt-2 text-sm text-slate-600">{{ $event[2] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- States --}}
    <x-section eyebrow="Where we work" title="Five states. One unified team.">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
            @foreach (['Maryland', 'Washington, DC', 'Virginia', 'Delaware', 'Pennsylvania'] as $state)
                <div x-data x-intersect.once="$el.classList.remove('opacity-0')"
                     class="flex flex-col items-center gap-3 rounded-2xl border border-slate-200 bg-white p-6 text-center opacity-0 transition-opacity duration-700 hover:border-brand-300 hover:shadow-xl">
                    <div class="grid h-12 w-12 place-items-center rounded-xl bg-brand-50 text-brand-600">
                        <x-icon name="home" class="h-6 w-6" />
                    </div>
                    <span class="font-display font-semibold text-brand-900">{{ $state }}</span>
                </div>
            @endforeach
        </div>
    </x-section>

    <x-cta-band title="Want to be part of the next chapter?" subtitle="Join 1,200+ agents who chose family-owned over franchise." />

@endsection
