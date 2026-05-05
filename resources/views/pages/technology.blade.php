@extends('layouts.app')

@section('title', 'Technology | Taylor Properties')
@section('description', 'BoldTrail front-end and BoldTrail Back Office (formerly Brokermint) - one unified platform for CRM, marketing, websites, and brokerage operations.')

@section('content')

    <x-page-hero eyebrow="Tech that fights for you"
                 title="One platform. <span class='text-gradient'>Front to back.</span>"
                 subtitle="Taylor agents run their business on BoldTrail - a fully unified front-end and back office platform. Two best-in-class systems that recently merged into one.">
    </x-page-hero>

    {{-- The two halves --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2">

                {{-- Front End --}}
                <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-br from-white to-slate-50 p-8 shadow-md transition hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-500/10">
                    <div class="absolute -top-16 -right-16 h-48 w-48 rounded-full bg-brand-200/40 blur-3xl"></div>
                    <div class="relative">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3 py-1 text-xs font-bold uppercase tracking-wider text-brand-700">
                                <span class="h-2 w-2 rounded-full bg-brand-500"></span> Front End
                            </span>
                        </div>
                        <h3 class="mt-4 font-display text-3xl font-bold text-brand-900">BoldTrail</h3>
                        <p class="mt-2 text-sm font-semibold uppercase tracking-wider text-accent-500">CRM &middot; Marketing &middot; Websites</p>
                        <p class="mt-4 text-slate-600">
                            Capture leads, nurture clients, market listings, and run your IDX site - all from one branded dashboard. AI-powered, mobile-first, and built for the way modern agents actually work.
                        </p>

                        <ul class="mt-6 space-y-3 text-sm">
                            @foreach ([
                                'Smart CRM with AI lead scoring & automated follow-up',
                                'Custom IDX website with real-time MLS search',
                                'Listing Machine + Design Center for marketing materials',
                                'Built-in lead generation (organic + paid)',
                                'Branded mobile app for you and your clients',
                                'Single-property websites for every listing',
                                'Social media autopilot',
                                'CMA + presentation builder',
                            ] as $feature)
                                <li class="flex items-start gap-2 text-slate-700">
                                    <x-icon name="check" class="h-4 w-4 shrink-0 mt-0.5 text-accent-500" />
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="https://boldtrail.com/platform/" target="_blank" rel="noopener"
                           class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-900">
                            Visit BoldTrail
                            <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                    </div>
                </div>

                {{-- Back Office --}}
                <div class="group relative overflow-hidden rounded-3xl border border-slate-200 bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 p-8 text-white shadow-xl transition hover:-translate-y-1 hover:shadow-2xl">
                    <div class="absolute -top-16 -right-16 h-48 w-48 rounded-full bg-accent-400/30 blur-3xl"></div>
                    <div class="relative">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-bold uppercase tracking-wider text-accent-300">
                                <span class="h-2 w-2 rounded-full bg-accent-400"></span> Back Office
                            </span>
                        </div>
                        <h3 class="mt-4 font-display text-3xl font-bold">BoldTrail Back Office</h3>
                        <p class="mt-2 text-sm font-semibold uppercase tracking-wider text-accent-300">Transactions &middot; Compliance &middot; Commissions</p>
                        <p class="mt-4 text-white/80">
                            Formerly Brokermint - now part of BoldTrail. Handles every transaction from contract to commission disbursement, with full e-sign, document compliance, and accounting built in.
                        </p>

                        <ul class="mt-6 space-y-3 text-sm">
                            @foreach ([
                                'End-to-end transaction management',
                                'E-signature included',
                                'Document compliance & broker review',
                                'Automated commission disbursement',
                                'Direct accounting integration',
                                'Detailed pipeline & production reporting',
                                'Mobile transaction tracking',
                                'Audit-ready file storage',
                            ] as $feature)
                                <li class="flex items-start gap-2 text-white/90">
                                    <x-icon name="check" class="h-4 w-4 shrink-0 mt-0.5 text-accent-300" />
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="https://brokermint.com/" target="_blank" rel="noopener"
                           class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-accent-300 hover:text-accent-200">
                            Visit BoldTrail Back Office
                            <x-icon name="arrow-right" class="h-4 w-4" />
                        </a>
                    </div>
                </div>
            </div>

            {{-- Merger callout --}}
            <div class="mt-10 rounded-2xl border border-brand-200 bg-brand-50 p-6 text-center sm:p-8">
                <div class="mx-auto inline-flex items-center gap-3 rounded-full bg-white px-4 py-2 text-xs font-semibold uppercase tracking-wider text-brand-700">
                    <x-icon name="sparkles" class="h-4 w-4 text-accent-500" />
                    Now one unified platform
                </div>
                <p class="mt-4 mx-auto max-w-2xl text-sm text-slate-700">
                    BoldTrail and Brokermint used to be two separate best-in-class tools. They've merged - so you get a single login, one source of truth, and a workflow that runs from your first lead to your final commission check.
                </p>
            </div>
        </div>
    </section>

    {{-- Stack value --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-brand-900 via-brand-800 to-brand-950 py-20 text-white sm:py-28">
        <div class="absolute inset-0 bg-grid opacity-20"></div>
        <div class="absolute -top-32 -left-24 h-96 w-96 rounded-full bg-brand-400/30 blur-3xl motion-safe:animate-blob"></div>
        <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-[0.18em] text-accent-300">Stack value</p>
            <h2 class="mt-3 font-display text-3xl font-bold sm:text-5xl">If you bought this stack a la carte...</h2>
            <p class="mt-6 font-display text-7xl font-bold text-accent-300 motion-safe:animate-float">$300+/mo</p>
            <p class="mt-4 text-white/70">Front-end CRM, IDX site, lead-gen, marketing automation, branded app, plus back-office transaction management and accounting.</p>
            <div class="mx-auto mt-10 max-w-md rounded-3xl border-2 border-accent-400 bg-white/5 p-8 backdrop-blur">
                <p class="text-xs uppercase tracking-wider text-accent-300">At Taylor</p>
                <p class="mt-1 font-display text-5xl font-bold text-white">$79/mo</p>
                <p class="mt-2 text-sm text-white/70">Everything included.</p>
            </div>
        </div>
    </section>

    <x-cta-band title="Want to see the platform live?" subtitle="Schedule a 15-minute walkthrough - we'll demo BoldTrail front-end and back office side by side." />

@endsection
