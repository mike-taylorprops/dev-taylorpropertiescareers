@extends('layouts.app')

@section('title', 'Technology | Taylor Properties')
@section('description', 'BoldTrail front-end and BoldTrail Back Office (formerly Brokermint) - one unified platform for CRM, marketing, websites, and brokerage operations.')

@section('content')

    <x-page-hero eyebrow="Tech that fights for you"
                 title="One platform. <span class='text-gradient'>Front to back.</span>"
                 subtitle="Taylor agents run their business on BoldTrail - a fully unified front-end and back office platform. Two best-in-class systems that recently merged into one.">
    </x-page-hero>

    {{-- The two halves --}}
    <section class="bg-white py-20 sm:py-28"
             x-data="{ active: null, open(p) { this.active = p; document.body.style.overflow = 'hidden'; }, close() { this.active = null; document.body.style.overflow = ''; } }"
             @keydown.escape.window="close">
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

                        <button type="button" @click="open('frontend')"
                                class="mt-8 inline-flex items-center gap-2 rounded-full bg-brand-700 px-5 py-2.5 text-sm font-semibold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-brand-800 hover:shadow-lg">
                            See how it works
                            <x-icon name="arrow-right" class="h-4 w-4" />
                        </button>
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

                        <button type="button" @click="open('backoffice')"
                                class="mt-8 inline-flex items-center gap-2 rounded-full bg-accent-400 px-5 py-2.5 text-sm font-semibold text-brand-950 shadow-md transition hover:-translate-y-0.5 hover:bg-accent-300 hover:shadow-lg">
                            See how it works
                            <x-icon name="arrow-right" class="h-4 w-4" />
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div x-show="active !== null"
             x-transition.opacity
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display:none">
            <div @click="close" class="absolute inset-0 bg-brand-950/80 backdrop-blur-sm"></div>

            {{-- Front End Modal --}}
            <div x-show="active === 'frontend'"
                 x-trap.inert.noscroll="active === 'frontend'"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="relative max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-3xl bg-white shadow-2xl"
                 style="display:none">
                <div class="relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 p-8 text-white">
                    <div class="absolute -top-20 -right-20 h-56 w-56 rounded-full bg-accent-400/30 blur-3xl"></div>
                    <button @click="close"
                            class="absolute right-4 top-4 rounded-full bg-white/10 p-2 text-white hover:bg-white/20"
                            aria-label="Close">
                        <x-icon name="x" class="h-5 w-5" />
                    </button>
                    <div class="relative">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-bold uppercase tracking-wider text-accent-300">
                            <span class="h-2 w-2 rounded-full bg-accent-400"></span> Front End Platform
                        </span>
                        <h3 class="mt-4 font-display text-4xl font-bold">BoldTrail</h3>
                        <p class="mt-2 text-sm font-semibold uppercase tracking-wider text-accent-300">CRM &middot; Marketing &middot; Websites</p>
                        <p class="mt-5 max-w-xl text-white/90">
                            BoldTrail is the front-end command center for your business. Every lead, every conversation, every listing, every campaign - one branded dashboard, on web and mobile.
                        </p>
                    </div>
                </div>

                <div class="p-8">
                    <h4 class="font-display text-lg font-bold text-brand-900">What you get</h4>
                    <div class="mt-5 grid gap-5 sm:grid-cols-2">
                        @foreach ([
                            ['Smart CRM', 'AI lead scoring, automated email/text/voice follow-up, contact timelines, and pipeline views.'],
                            ['Branded IDX Website', 'Custom-designed agent site with real-time MLS search, neighborhood pages, and home valuations.'],
                            ['Lead Generation Engine', 'Organic & paid lead pipelines route directly to your CRM - never the front desk.'],
                            ['Listing Machine', 'Auto-generated single-property websites, social posts, and email blasts for every new listing.'],
                            ['Design Center', 'On-brand templates for flyers, postcards, social graphics - edit in your browser, no Photoshop required.'],
                            ['Branded Client App', 'Your own mobile app for clients - searches, neighborhood reports, push alerts, direct chat.'],
                            ['Social Autopilot', 'Auto-publish market updates, new listings, and just-sold posts to Facebook, Instagram & LinkedIn.'],
                            ['CMA Builder', 'Polished, comparative market analysis presentations clients actually read - in minutes.'],
                        ] as [$h, $b])
                            <div class="rounded-xl border border-slate-200 bg-slate-50/50 p-4">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 grid h-7 w-7 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700">
                                        <x-icon name="check" class="h-4 w-4" />
                                    </span>
                                    <div>
                                        <p class="font-semibold text-brand-900">{{ $h }}</p>
                                        <p class="mt-1 text-sm text-slate-600">{{ $b }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 rounded-2xl bg-brand-50 p-6">
                        <p class="text-xs font-semibold uppercase tracking-wider text-brand-700">Bottom line</p>
                        <p class="mt-2 text-sm text-slate-700">
                            If you tried to buy this stack a la carte - CRM, IDX site, lead gen, marketing automation, branded app - you'd pay <span class="font-bold text-brand-900">$300+/month</span>. At Taylor it's included in your $79.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Back Office Modal --}}
            <div x-show="active === 'backoffice'"
                 x-trap.inert.noscroll="active === 'backoffice'"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="relative max-h-[90vh] w-full max-w-3xl overflow-y-auto rounded-3xl bg-white shadow-2xl"
                 style="display:none">
                <div class="relative overflow-hidden bg-gradient-to-br from-accent-400 to-accent-500 p-8 text-brand-950">
                    <div class="absolute -top-20 -right-20 h-56 w-56 rounded-full bg-white/30 blur-3xl"></div>
                    <button @click="close"
                            class="absolute right-4 top-4 rounded-full bg-brand-950/10 p-2 text-brand-950 hover:bg-brand-950/20"
                            aria-label="Close">
                        <x-icon name="x" class="h-5 w-5" />
                    </button>
                    <div class="relative">
                        <span class="inline-flex items-center gap-2 rounded-full bg-brand-950/10 px-3 py-1 text-xs font-bold uppercase tracking-wider text-brand-900">
                            <span class="h-2 w-2 rounded-full bg-brand-700"></span> Back Office Platform
                        </span>
                        <h3 class="mt-4 font-display text-4xl font-bold">BoldTrail Back Office</h3>
                        <p class="mt-2 text-sm font-semibold uppercase tracking-wider text-brand-900/70">Transactions &middot; Compliance &middot; Commissions</p>
                        <p class="mt-5 max-w-xl text-brand-900/80">
                            Formerly Brokermint, now unified with BoldTrail. The back office that runs every contract from ratified to disbursed - so you spend zero time chasing paperwork.
                        </p>
                    </div>
                </div>

                <div class="p-8">
                    <h4 class="font-display text-lg font-bold text-brand-900">What you get</h4>
                    <div class="mt-5 grid gap-5 sm:grid-cols-2">
                        @foreach ([
                            ['End-to-End Transactions', 'Track every deal from contract to closing - milestones, deadlines, and tasks auto-managed.'],
                            ['E-Signature Included', 'Built-in e-sign at no extra cost. Send, sign, and store - no DocuSign bill.'],
                            ['Compliance Made Easy', 'Required-document checklists, broker review queues, and audit-ready file storage.'],
                            ['Auto Commission Disbursement', 'When a deal closes, your check is calculated and processed automatically. Same day.'],
                            ['Accounting Integration', 'Direct sync to QuickBooks and Xero - so your books are never behind your business.'],
                            ['Production Reporting', 'Personal dashboards for GCI, units, conversion - know exactly where your business stands.'],
                            ['Mobile Tracking', 'Approve documents, check status, and sign from your phone - the deal doesn\'t wait.'],
                            ['Secure File Vault', 'Every document, every transaction, archived securely and instantly retrievable.'],
                        ] as [$h, $b])
                            <div class="rounded-xl border border-slate-200 bg-slate-50/50 p-4">
                                <div class="flex items-start gap-3">
                                    <span class="mt-0.5 grid h-7 w-7 shrink-0 place-items-center rounded-full bg-accent-100 text-accent-600">
                                        <x-icon name="check" class="h-4 w-4" />
                                    </span>
                                    <div>
                                        <p class="font-semibold text-brand-900">{{ $h }}</p>
                                        <p class="mt-1 text-sm text-slate-600">{{ $b }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 rounded-2xl bg-brand-50 p-6">
                        <p class="text-xs font-semibold uppercase tracking-wider text-brand-700">Bottom line</p>
                        <p class="mt-2 text-sm text-slate-700">
                            Less time hunting for documents and waiting on commission checks. More time selling. The back office runs itself - you stay focused on clients.
                        </p>
                    </div>
                </div>
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
