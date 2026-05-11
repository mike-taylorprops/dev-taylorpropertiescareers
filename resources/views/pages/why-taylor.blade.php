@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Why Taylor | All Your Benefits in One Place')
@section('description',
    'Money, support, and tools - everything Taylor Properties includes for our agents. The deepest
    list in Maryland.')

@section('content')

    <x-page-hero eyebrow="Why agents pick Taylor"
        title="Everything you get. <br><span class='text-gradient'>Nothing you don't.</span>"
        subtitle="The longest 'free' list in the business. Tabs below break it down by what kind of help you're looking for.">
    </x-page-hero>

    <section class="bg-white py-16 sm:py-24" x-data="tabs(0)">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div
                class="flex flex-wrap justify-center gap-2 rounded-full border border-slate-200 bg-slate-50 p-2 sm:mx-auto sm:max-w-2xl">
                @foreach (['The Money', 'The Support', 'The Tools'] as $i => $label)
                    <button @click="set({{ $i }})" :class="is({{ $i }})
                        ? 'bg-brand-700 text-white shadow'
                        : 'text-slate-600 hover:bg-white'"
                        class="flex-1 rounded-full px-5 py-2.5 text-sm font-semibold transition">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="mt-12 grid gap-8 lg:grid-cols-12">
                <div class="lg:col-span-8">

                    {{-- The Money --}}
                    <div x-show="is(0)" x-transition.opacity x-cloak>
                        <p class="text-brand-500 text-xs font-semibold uppercase tracking-wider">Lowest fixed cost in the
                            region</p>
                        <h2 class="font-display text-brand-900 mt-2 text-3xl font-bold sm:text-4xl">More money, less math.
                        </h2>
                        <p class="mt-4 text-slate-600">No franchise fees. No royalties. No agent transaction fees. No surprise
                            charges. The bill is the bill.</p>

                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <x-flip-card icon="dollar" title="Monthly Fee" stat="$99"
                                teaser="All-in. No platform fee. No tech fee." variant="gold">
                                $99/month is the entire bill. No platform fee on top. No tech fee. No surprise charges.
                            </x-flip-card>
                            <x-flip-card icon="shield" title="Commission Split" stat="100%"
                                teaser="Forever. From your first deal." variant="light">
                                Keep 100% from day one. No anniversary resets. No caps to hit. No splits to negotiate.
                            </x-flip-card>
                            <x-flip-card icon="check" title="Agent Transaction Fees" stat="$0"
                                teaser="No per-deal cut. Ever." variant="dark">
                                Many brokerages charge a per-closing transaction fee on top of your split. We don't - your
                                $99/month is the entire bill.
                            </x-flip-card>
                            <x-flip-card icon="x" title="Franchise Fees" stat="0%"
                                teaser="No royalty off the top." variant="light">
                                Franchise brokerages take a percentage of every commission as a royalty fee, every year.
                                We're independent - we take 0%.
                            </x-flip-card>
                            <x-flip-card icon="lightning" title="Fast Pay" stat="Same Day"
                                teaser="Funding day = pay day. No two-week wait." variant="light">
                                When the deal funds, you get paid. Same day. Other shops make you wait 10-14 days for
                                processing.
                            </x-flip-card>
                        </div>
                    </div>

                    {{-- The Support --}}
                    <div x-show="is(1)" x-transition.opacity x-cloak style="display:none">
                        <p class="text-brand-500 text-xs font-semibold uppercase tracking-wider">Real people, real
                            availability</p>
                        <h2 class="font-display text-brand-900 mt-2 text-3xl font-bold sm:text-4xl">A team that picks up.
                        </h2>
                        <p class="mt-4 text-slate-600">Brokerage support that doesn't require a help-desk ticket and a
                            48-hour wait.</p>

                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <x-flip-card icon="users" title="1-on-1 Mentorship" stat="3 Deals"
                                teaser="Paired with a pro through your first 3 closings." variant="gold">
                                Every new agent is paired with an experienced producer who walks you through your first
                                three closings - on every detail.
                            </x-flip-card>
                            <x-flip-card icon="phone" title="Broker Access" stat="< 1 hr"
                                teaser="Same-day answers on contracts and offers." variant="light">
                                Contract questions, offer strategy, tricky negotiations - our brokers pick up. Same day,
                                usually under an hour.
                            </x-flip-card>
                            <x-flip-card icon="academic" title="Live Training" stat="Weekly"
                                teaser="Classes, masterminds & CE - included." variant="dark">
                                Weekly live classes, monthly masterminds, and CE through Metropolitan Real Estate Academy
                                and The CE Shop.
                            </x-flip-card>
                            <x-flip-card icon="briefcase" title="Transaction Coordination" stat="Optional"
                                teaser="Take paperwork off your plate." variant="light">
                                Concierge transaction coordination available when you want it - so you can spend time
                                selling, not chasing signatures.
                            </x-flip-card>
                            <x-flip-card icon="megaphone" title="Marketing Help" stat="In-House"
                                teaser="Real designers. Not template libraries." variant="light">
                                Real in-house designers and marketers - branded templates, social posts, listing showcases
                                that look custom, because they are.
                            </x-flip-card>
                            <x-flip-card icon="heart" title="Family Culture" stat="Since '85"
                                teaser="An agent. Never a number." variant="gold">
                                Family-owned since 1985. We answer to our agents - not to a corporate franchise dashboard
                                halfway across the country.
                            </x-flip-card>
                        </div>
                    </div>

                    {{-- The Tools --}}
                    <div x-show="is(2)" x-transition.opacity x-cloak style="display:none">
                        <p class="text-brand-500 text-xs font-semibold uppercase tracking-wider">A tech stack that fights
                            for you</p>
                        <h2 class="font-display text-brand-900 mt-2 text-3xl font-bold sm:text-4xl">All the tools, included.
                        </h2>
                        <p class="mt-4 text-slate-600">Everything you'd otherwise pay $300+/month for, included in your $99.
                        </p>

                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <x-flip-card icon="computer" title="Smart CRM" stat="$0"
                                teaser="Auto follow-up by email, text & phone." variant="dark">
                                BoldTrail's full CRM - smart drip campaigns, AI follow-up, contact scoring - included in
                                your $99.
                            </x-flip-card>
                            <x-flip-card icon="globe" title="IDX Website" stat="Free"
                                teaser="Branded MLS search + home valuations." variant="light">
                                A custom-branded agent site with real-time MLS search, IDX listings, and home valuation lead
                                capture.
                            </x-flip-card>
                            <x-flip-card icon="chart" title="Lead Generation" stat="Built-In"
                                teaser="Leads land in your CRM, not the front desk." variant="gold">
                                Organic + paid lead pipeline routed straight to your CRM - never the front desk, never
                                sliced and diced.
                            </x-flip-card>
                            <x-flip-card icon="cog" title="Transaction Mgmt" stat="e-Sign"
                                teaser="BoldTrail Back Office. Fully integrated." variant="light">
                                BoldTrail Back Office (formerly Brokermint) handles e-sign, docs, compliance, and commission
                                disbursements - all in one place.
                            </x-flip-card>
                            <x-flip-card icon="megaphone" title="Listing Kit" stat="Auto"
                                teaser="Single-prop sites & social posts in one click." variant="light">
                                Every new listing gets a single-property website, social media graphics, and email templates
                                - generated automatically.
                            </x-flip-card>
                            <x-flip-card icon="rocket" title="Client App" stat="Branded"
                                teaser="Search, market snapshots & messaging." variant="dark">
                                A branded mobile app for your clients - home searches, neighborhood reports, and direct chat
                                with you.
                            </x-flip-card>
                        </div>
                    </div>
                </div>

                {{-- Sticky right rail --}}
                <aside class="lg:col-span-4">
                    <div
                        class="from-brand-700 via-brand-800 to-brand-950 sticky top-24 rounded-3xl border border-slate-200 bg-gradient-to-br p-8 text-white shadow-xl">
                        <p class="text-accent-300 text-xs font-semibold uppercase tracking-wider">Schedule a chat</p>
                        <h3 class="font-display mt-2 text-2xl font-bold">15 minutes. Real numbers.</h3>
                        <p class="mt-3 text-sm text-white/80">Tell us a little about your business and we'll send back
                            exact numbers for your situation - no pressure.</p>
                        <div class="mt-6">
                            <x-button :href="route('join')" variant="primary" size="md" class="w-full">
                                Get Started
                                <x-icon name="arrow-right" class="h-4 w-4" />
                            </x-button>
                            <x-button :href="route('contact-us')" variant="ghost" size="md" class="mt-3 w-full">
                                Just have a question
                            </x-button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <x-cta-band />

@endsection
