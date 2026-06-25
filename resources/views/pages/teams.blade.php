@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Teams | Taylor Properties')
@section('description', 'Build or bring your real estate team to Taylor Properties. Keep your brand, set custom team
    economics, and let us run the back office. Every seat stays at $99 a month and you personalize the commission splits
    from within your team. Never any agent transaction fees.')

@section('content')

    <x-page-hero eyebrow="For team leaders" title="Build your team on <span class='text-gradient'>your terms.</span>"
        subtitle="Bring your team to one of the largest independent brokerages on the East Coast. Keep your brand, set your own economics, and customize the commission splits within your team. Let us run the back office at only $99 a month per agent.    ">
        <x-slot:actions>
            <x-button :href="route('contact-us')" variant="primary" size="lg">Talk Team Economics</x-button>
            <x-button :href="route('commission-plans')" variant="ghost" size="lg">See the Plans</x-button>
        </x-slot:actions>
    </x-page-hero>

    {{-- Two leader paths --}}
    <x-section eyebrow="Two ways to lead" title="Start fresh, or bring what you've built."
        subtitle="Whether you're launching your first team or moving an established one, we set it up around how you already work.">
        <div class="grid gap-6 lg:grid-cols-2">

            {{-- Build a new team --}}
            <div
                class="border-brand-700/50 from-brand-700 via-brand-800 to-brand-950 card-pad flex flex-col rounded-3xl border bg-gradient-to-br text-white shadow-xl">
                <div class="flex items-center gap-4">
                    <div
                        class="bg-accent-400 text-brand-900 shadow-accent-400/40 grid h-14 w-14 shrink-0 place-items-center rounded-2xl shadow-lg">
                        <x-icon name="rocket" class="h-7 w-7" />
                    </div>
                    <div>
                        <p class="text-accent-300 text-sm font-semibold uppercase tracking-wider">Ready to scale</p>
                        <h3 class="font-display text-2xl font-bold">Build a new team</h3>
                    </div>
                </div>
                <p class="mt-5 text-sm leading-relaxed text-white/80">You're a producer ready to grow a roster. We help you
                    build up the brand, provide the with the tools and back you while you recruit.</p>
                <ul class="mt-6 space-y-3">
                    @foreach (['Custom team splits & caps through the Custom plan', 'Your team name and brand - front and center', 'Lead routing and tech configured to your structure', 'Recruiting and onboarding support from the brokerage', 'Back office handles splits & disbursements automatically'] as $item)
                        <li class="flex items-start gap-3 text-sm text-white/90">
                            <span
                                class="bg-accent-400 text-brand-900 mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full">
                                <x-icon name="check" class="h-3.5 w-3.5" />
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-auto pt-8">
                    <x-button :href="route('contact-us')" variant="primary" size="md" class="w-full">
                        Start a Team
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </x-button>
                </div>
            </div>

            {{-- Bring your existing team --}}
            <div class="card-pad flex flex-col rounded-3xl border border-slate-200 bg-white shadow-xl">
                <div class="flex items-center gap-4">
                    <div
                        class="from-brand-500 to-brand-700 shadow-brand-500/30 grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-gradient-to-br text-white shadow-lg">
                        <x-icon name="users" class="h-7 w-7" />
                    </div>
                    <div>
                        <p class="text-brand-500 text-sm font-semibold uppercase tracking-wider">Already leading</p>
                        <h3 class="font-display text-brand-900 text-2xl font-bold">Bring your existing team</h3>
                    </div>
                </div>
                <p class="mt-5 text-sm leading-relaxed text-slate-600">Switching brokerages shouldn't mean rebuilding your
                    team. We support your current setup providing a smooth transition for every agent.</p>
                <ul class="mt-6 space-y-3">
                    @foreach (['Keep your team brand, name, and identity', 'Custom economics matched to how you operate today', 'Smooth license transfer and onboarding for your agents', 'Customize the commission splits within your team', 'No franchise fees, no royalties, no transaction fees'] as $item)
                        <li class="flex items-start gap-3 text-sm text-slate-700">
                            <span
                                class="bg-brand-50 text-brand-600 mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full">
                                <x-icon name="check" class="h-3.5 w-3.5" />
                            </span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-auto pt-8">
                    <x-button :href="route('contact-us')" variant="outline" size="md" class="w-full">
                        Move Your Team
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </x-button>
                </div>
            </div>
        </div>
    </x-section>

    {{-- Stats strip --}}
    <section class="section-y bg-slate-50">
        <div class="page-container">
            <div class="grid grid-cols-2 gap-8 lg:grid-cols-4">
                <x-stat :number="100" suffix="%" label="Commission Split" sublabel="For every seat on your team"
                    tone="light" />
                <x-stat :number="99" prefix="$" label="Per Agent / Month" sublabel="No platform or tech fee"
                    tone="light" />
                <x-stat :number="0" prefix="$" label="Transaction Fees" sublabel="No per-deal cut"
                    tone="light" />
                <x-stat :number="5" label="States Covered" sublabel="MD, DC, VA, DE & PA" tone="light" />
            </div>
        </div>
    </section>

    {{-- What team leaders get --}}
    <x-section eyebrow="Why leaders pick Taylor" title="You run the team. We run the back office.">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
            <x-flip-card icon="dollar" title="Custom Team Economics" stat="Custom" teaser="Set your own splits and caps."
                variant="gold">
                Through the Custom plan we set up team economics that fit your structure - splits, caps, and member
                arrangements built around how your team actually works.
            </x-flip-card>
            <x-flip-card icon="sparkle" title="Your Team Brand" stat="Yours" teaser="Your name, front and center."
                variant="light">
                Build under your own team brand and identity. You're a team inside one of the largest independent brokerages
                on the East Coast - not a number on a franchise dashboard.
            </x-flip-card>
            <x-flip-card icon="cog" title="Automated Back Office" stat="Auto" variant="dark"
                teaser="Splits & disbursements, handled.">
                BoldTrail Back Office handles e-sign, compliance, commission splits, and disbursements automatically - so
                you're not chasing paperwork or doing math on every deal.
            </x-flip-card>
            <x-flip-card icon="chart" title="Shared Lead Routing" stat="Built-In"
                teaser="The right lead to the right agent." variant="light">
                Organic and paid leads route straight into the right agent's CRM - never the front desk, never sliced and
                diced.
            </x-flip-card>
            <x-flip-card icon="users" title="Recruiting Support" stat="We Help" teaser="Grow your roster with us."
                variant="light">
                Lean on the brokerage for onboarding and recruiting support, so adding the next agent to your team is fast
                and painless.
            </x-flip-card>
            <x-flip-card icon="academic" title="Training Pipeline" stat="Weekly" teaser="Live training, CE & masterminds."
                variant="dark">
                Plug your team into monthly live classes, masterminds, and CE through Metropolitan Real Estate Academy and
                The CE Shop - included.
            </x-flip-card>
        </div>
    </x-section>

    {{-- How to start --}}
    <section class="section-y bg-white">
        <div class="page-container-sm">
            <div class="text-center">
                <p class="text-brand-500 text-sm font-semibold uppercase tracking-[0.18em]">Getting started</p>
                <h2 class="heading-page mt-3">From conversation to launch in days.</h2>
            </div>

            <div class="mt-10 grid gap-6 sm:mt-14 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([['icon' => 'phone', 'label' => 'Talk to us', 'desc' => 'A quick 15-minute call to understand your team and your goals.'], ['icon' => 'dollar', 'label' => 'Design your economics', 'desc' => 'We build custom splits, caps, and a brand setup that fit your team.'], ['icon' => 'cog', 'label' => 'We set up the back office', 'desc' => 'Tools, lead routing, and commission splits configured and ready.'], ['icon' => 'rocket', 'label' => 'Recruit & grow', 'desc' => 'Bring your agents over and start scaling - with us behind you.']] as $i => $step)
                    <div x-data x-intersect.once="$el.classList.remove('opacity-0')"
                        class="relative flex flex-col items-center rounded-3xl border border-slate-200 bg-white p-6 text-center opacity-0 shadow-sm transition-opacity duration-700 hover:shadow-xl">
                        <div class="bg-brand-50 text-brand-600 grid h-14 w-14 place-items-center rounded-2xl">
                            <x-icon :name="$step['icon']" class="h-7 w-7" />
                        </div>
                        <span
                            class="bg-accent-400 text-brand-900 mt-4 inline-flex items-center justify-center rounded-full px-3 py-1 text-sm font-bold">Step
                            {{ $i + 1 }}</span>
                        <h3 class="font-display text-brand-900 mt-3 text-lg font-bold">{{ $step['label'] }}</h3>
                        <p class="mt-2 text-sm text-slate-600">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- What your agents get --}}
    <x-section tone="soft" eyebrow="Easy to recruit to" title="What every agent on your team gets."
        subtitle="The full Taylor stack comes standard - so recruiting to your team is an easy yes.">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 lg:grid-cols-3">
            <x-feature-card icon="shield" title="100% Commission, $99/mo">
                Every agent keeps 100% of their commission on the $99/month plan - no franchise fees, no transaction fees.
            </x-feature-card>
            <x-feature-card icon="computer" title="Free Tech Stack">
                BoldTrail CRM, IDX website, transaction management, and a branded client app - included for every seat.
            </x-feature-card>
            <x-feature-card icon="academic" title="Mentorship & Training">
                New agents get 1-on-1 mentorship through their first closings, plus live classes and CE every month.
            </x-feature-card>
            <x-feature-card icon="megaphone" title="Marketing Support">
                Real in-house designers and marketers - branded templates, social posts, and listing showcases.
            </x-feature-card>
            <x-feature-card icon="lightning" title="Same-Day Pay">
                When the deal funds, your agents get paid - same day, not a two-week wait.
            </x-feature-card>
            <x-feature-card icon="phone" title="Broker Availability">
                Brokers who actually pick up - contract questions and offer strategy answered same day, usually under an
                hour.
            </x-feature-card>
        </div>
    </x-section>

    {{-- FAQ --}}
    <x-section eyebrow="Teams FAQ" title="Common questions from team leaders.">
        <div class="mx-auto max-w-3xl">
            <x-faq question="Can I bring my existing team to Taylor?">Yes. We help teams transition over with their brand
                intact and set up custom economics that match how your team already operates. Reach out and we'll map it out
                with you.</x-faq>
            <x-faq question="How do team splits work?">We set up custom team economics through the Custom plan - splits,
                caps, and member arrangements built around your structure. Tell us how your team is organized and we'll
                design it to fit.</x-faq>
            <x-faq question="Do my agents still keep 100% commission and the $99 plan?">Every agent on your team stays on
                our 100% commission, $99/month model with zero agent transaction fees. Team arrangements are layered on top
                through the Custom plan.</x-faq>
            <x-faq question="Can I keep my team's brand and name?">Absolutely. You lead under your own team brand and
                identity inside the brokerage - your name stays front and center.</x-faq>
            <x-faq question="Who handles the paperwork and commission splits?">BoldTrail Back Office handles e-sign,
                compliance, and automatic commission splits and disbursements - so you're not doing math or chasing
                signatures on every deal.</x-faq>
            <x-faq question="Can I start a brand-new team from scratch?">Yes. Whether you're spinning up your first team or
                scaling an established one, we'll help with the brand setup, back office, lead routing, and recruiting
                support to get it off the ground.</x-faq>
        </div>
    </x-section>

    <x-cta-band title="Ready to build your team?"
        subtitle="Tell us about your team - or the one you want to build - and we'll send back custom numbers in 15 minutes. No pressure." />

@endsection
