@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Taylor Properties | Keep 100% of Your Commission')
@section('description', 'Maryland\'s largest independent brokerage. 100% commission, $99 a month, zero transaction fees. Keep more of what you earn.')

@section('content')

    {{-- Hero --}}
    <section class="relative isolate overflow-hidden bg-brand-950 pt-28 pb-24 text-white sm:pt-32 sm:pb-32 lg:pt-36 lg:pb-40">
        <div class="absolute -top-32 -left-32 h-[34rem] w-[34rem] rounded-full bg-brand-500/40 blur-3xl motion-safe:animate-blob"></div>
        <div class="absolute top-40 -right-32 h-[36rem] w-[36rem] rounded-full bg-accent-400/25 blur-3xl motion-safe:animate-blob-slow"></div>
        <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-brand-400/30 blur-3xl motion-safe:animate-float"></div>
        <div class="absolute inset-0 bg-grid opacity-30"></div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Headline numbers - the first thing seen --}}
            <div x-data x-intersect.once="$el.classList.add('is-visible')" class="reveal">
                <dl class="grid grid-cols-3 divide-x divide-white/10 overflow-hidden rounded-2xl border border-white/10 bg-white/5 backdrop-blur sm:rounded-3xl">
                    <div class="px-3 py-5 text-center sm:px-6 sm:py-7">
                        <dt class="text-[10px] font-semibold uppercase tracking-[0.15em] text-accent-300 sm:text-xs">Monthly Fee</dt>
                        <dd class="mt-2 font-display text-3xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">$99</dd>
                    </div>
                    <div class="px-3 py-5 text-center sm:px-6 sm:py-7">
                        <dt class="text-[10px] font-semibold uppercase tracking-[0.15em] text-accent-300 sm:text-xs">Agent Transaction Fees</dt>
                        <dd class="mt-2 font-display text-3xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">$0</dd>
                    </div>
                    <div class="px-3 py-5 text-center sm:px-6 sm:py-7">
                        <dt class="text-[10px] font-semibold uppercase tracking-[0.15em] text-accent-300 sm:text-xs">Commission Split</dt>
                        <dd class="mt-2 font-display text-3xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">100%</dd>
                    </div>
                </dl>
            </div>

            <div class="mt-12 grid items-center gap-12 sm:mt-16 lg:grid-cols-12">
                <div class="lg:col-span-7">
                    <div x-data x-intersect.once="$el.classList.add('is-visible')" class="reveal">
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-accent-300 backdrop-blur">
                            <span class="grid h-2 w-2 place-items-center rounded-full bg-accent-400"></span>
                            Maryland's Largest Independent Brokerage
                        </span>
                        <h1 class="mt-6 font-display text-5xl font-bold leading-[1.05] tracking-tight sm:text-6xl lg:text-7xl">
                            Keep <span class="text-gradient">100%</span> of your commission.
                        </h1>
                        <p class="mt-6 max-w-xl text-lg leading-relaxed text-white/80 sm:text-xl">
                            $99 a month. Zero transaction fees. No franchise fees. No surprises. The math is simple - and it's in your favor.
                        </p>
                        <div class="mt-10 flex flex-wrap items-center gap-4">
                            <x-button :href="route('join')" variant="primary" size="lg">
                                Join Taylor
                                <x-icon name="arrow-right" class="h-5 w-5" />
                            </x-button>
                            <a href="#calculator" class="inline-flex items-center gap-2 rounded-full px-6 py-4 text-base font-semibold text-white/90 transition hover:text-accent-300">
                                See your earnings
                                <x-icon name="arrow-right" class="h-4 w-4" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div x-data x-intersect.once="$el.classList.add('is-visible')" class="reveal motion-safe:animate-float relative">
                        {{-- Outer glow ring --}}
                        <div class="absolute -inset-6 -z-10 rounded-[3rem] bg-gradient-to-br from-accent-400/50 via-accent-300/30 to-brand-400/40 blur-3xl motion-safe:animate-blob"></div>

                        {{-- Hero card: gold-on-gold, the loudest thing on the page --}}
                        <div class="relative overflow-hidden rounded-3xl border-4 border-accent-300 bg-gradient-to-br from-accent-300 via-accent-400 to-accent-500 p-8 text-brand-950 shadow-[0_25px_80px_-15px_rgba(245,179,36,0.6)] sm:p-10">
                            {{-- Shimmer overlay --}}
                            <div class="pointer-events-none absolute inset-0 opacity-40 motion-safe:animate-shimmer"
                                 style="background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,0.7) 50%, transparent 70%); background-size: 200% 100%;"></div>
                            {{-- Decorative blob --}}
                            <div class="pointer-events-none absolute -top-20 -right-20 h-56 w-56 rounded-full bg-white/30 blur-3xl"></div>

                            <div class="relative">
                                <div class="inline-flex items-center gap-2 rounded-full bg-brand-950/15 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.2em] text-brand-950 backdrop-blur sm:text-xs">
                                    <span class="grid h-2 w-2 place-items-center rounded-full bg-brand-950"></span>
                                    Your annual cap at Taylor
                                </div>

                                <p class="mt-6 font-display text-7xl font-black leading-none tracking-tighter text-brand-950 sm:text-8xl lg:text-9xl">
                                    $1,188
                                </p>
                                <p class="mt-3 font-display text-xl font-bold text-brand-900 sm:text-2xl">
                                    The entire annual bill.
                                </p>
                                <p class="mt-2 text-sm font-semibold text-brand-900/80 sm:text-base">
                                    $99 &times; 12. No matter how many deals you close.
                                </p>

                                <div class="mt-8 grid grid-cols-2 gap-3">
                                    @foreach ([
                                        'No transaction fees',
                                        'No franchise fees',
                                        'No commission split',
                                        'No surprise charges',
                                    ] as $item)
                                        <div class="flex items-start gap-2">
                                            <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-950 text-accent-300">
                                                <x-icon name="check" class="h-3 w-3" />
                                            </span>
                                            <span class="text-sm font-semibold text-brand-950">{{ $item }}</span>
                                        </div>
                                    @endforeach
                                </div>

                                <a href="{{ route('compare') }}#calculator"
                                   class="mt-8 inline-flex items-center gap-2 rounded-full bg-brand-950 px-5 py-3 text-sm font-bold text-accent-300 shadow-lg transition hover:-translate-y-0.5 hover:bg-brand-900 hover:shadow-xl">
                                    Compare your current numbers
                                    <x-icon name="arrow-right" class="h-4 w-4" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats band --}}
    <section class="relative -mt-16 sm:-mt-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-px overflow-hidden rounded-3xl bg-slate-200 shadow-2xl shadow-brand-500/10 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white p-8">
                    <x-stat :number="1200" suffix="+" label="Active Agents" tone="light" />
                </div>
                <div class="bg-white p-8">
                    <x-stat :number="40" suffix="+" label="Years In Business" tone="light" />
                </div>
                <div class="bg-white p-8">
                    <x-stat :number="5" label="States Licensed" tone="light" />
                </div>
                <div class="bg-white p-8">
                    <x-stat :number="0" prefix="$" label="Transaction Fees" sublabel="Forever" tone="light" />
                </div>
            </div>
        </div>
    </section>

    {{-- Why agents switch --}}
    <x-section eyebrow="Why agents switch" title="Three reasons it adds up." subtitle="The math is straightforward. The support is the part you have to feel.">
        <div class="grid gap-6 md:grid-cols-3">
            <x-flip-card variant="light"
                         icon="dollar"
                         stat="$99"
                         title="Lowest Fixed Cost"
                         teaser="No franchise fees. No royalty fees. No per-transaction fees. No desk fees.">
                $99 a month covers everything. The bill is the bill - same number, every month, forever. Most brokerages charge that much in tech fees alone.
            </x-flip-card>

            <x-flip-card variant="gold"
                         icon="shield"
                         stat="100%"
                         title="Commission, Forever"
                         teaser="Every dollar you negotiate, you keep - from your first deal to your last.">
                No splits to chase. No caps to hit. No anniversary resets. Whether it's your first $5k commission or your fiftieth $50k commission, you keep the whole thing.
            </x-flip-card>

            <x-flip-card variant="dark"
                         icon="users"
                         stat="1:1"
                         title="Real Mentorship"
                         teaser="A person who picks up the phone. Not a chatbot, not a help-desk ticket.">
                Paired one-on-one with an experienced agent for your first three closings. Contract review, marketing help, broker availability - the kind of support that actually moves your business.
            </x-flip-card>
        </div>
    </x-section>

    {{-- Calculator --}}
    <section id="calculator" class="bg-slate-50 py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">The math doesn't lie</p>
                <h2 class="mt-3 font-display text-3xl font-bold tracking-tight text-brand-900 sm:text-5xl">
                    See what you'd take home.
                </h2>
                <p class="mt-5 text-lg text-slate-600">
                    Enter your business and the fees you pay at your current brokerage. We'll show your annual take-home at Taylor versus what you keep today - in real time.
                </p>
            </div>
            <div class="mt-12">
                <x-calculator />
            </div>
        </div>
    </section>

    {{-- Marquee --}}
    <section class="border-y border-slate-200 bg-white py-8">
        <p class="mb-4 text-center text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
            Licensed in five states &middot; member of every regional MLS
        </p>
        <x-marquee :items="['Bright MLS', 'MRIS', 'CAAR', 'GAAR', 'MAAR', 'MD REALTORS', 'NAR', 'DC AOR', 'NVAR', 'PVAR', 'SMAR', 'YORK COUNTY', 'DELMARVA']" />
    </section>

    {{-- Benefits preview --}}
    <x-section tone="soft" eyebrow="Everything included" title="Tools, training, and a team that picks up the phone.">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <x-feature-card icon="academic" title="Mentorship & Coaching">
                Paired with an experienced agent for your first deals. Live training, masterminds, and CE courses for whatever stage you're in.
            </x-feature-card>
            <x-feature-card icon="computer" title="Free Tech Stack">
                CRM, IDX website, e-signature, transaction management, lead generation, marketing templates - included, not extra.
            </x-feature-card>
            <x-feature-card icon="megaphone" title="Marketing Support">
                Branded templates, social content, listing showcases, and an in-house design team to make you look like the pro you are.
            </x-feature-card>
            <x-feature-card icon="briefcase" title="Transaction Coordination">
                Optional concierge support to take the paperwork off your plate so you can focus on the next deal.
            </x-feature-card>
            <x-feature-card icon="shield" title="Broker Availability">
                Real brokers, real availability. Contract questions answered the same day - usually within the hour.
            </x-feature-card>
            <x-feature-card icon="rocket" title="Referral Program">
                Refer-only? Hold your license for $99/year and earn 85% on every deal you send. No MLS, no association fees.
            </x-feature-card>
        </div>

        <div class="mt-12 text-center">
            <x-button :href="route('why-taylor')" variant="dark" size="md">
                Explore all benefits
                <x-icon name="arrow-right" class="h-4 w-4" />
            </x-button>
        </div>
    </x-section>

    {{-- Testimonials --}}
    <x-section eyebrow="Real agents, real numbers" title="What our agents say.">
        <x-testimonial-slider :testimonials="[
            ['quote' => 'I switched after 14 years at a franchise. My first year at Taylor I kept an extra $32,000. The numbers were honest - no surprises.', 'name' => 'Joelle R.', 'role' => 'Annapolis &middot; 9 years with Taylor'],
            ['quote' => 'The broker actually answers his phone. That alone was worth the move. The fee structure was the cherry on top.', 'name' => 'Marcus T.', 'role' => 'Bowie &middot; 4 years with Taylor'],
            ['quote' => 'I came in as a brand new agent. The mentorship program got me to my first closing in under 90 days.', 'name' => 'Priya K.', 'role' => 'Towson &middot; 2 years with Taylor'],
        ]" />
    </x-section>

    <x-cta-band />

@endsection
