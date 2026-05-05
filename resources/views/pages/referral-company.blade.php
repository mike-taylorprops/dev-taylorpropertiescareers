@extends('layouts.app')

@section('title', 'Referral Company | Taylor Properties')
@section('description', 'Hold your real estate license for $99/year and earn 85% on every referral. Perfect for licensed agents who want to refer business without active production.')

@section('content')

    <x-page-hero eyebrow="For licensed referral agents"
                 title="Hold your license. <span class='text-gradient'>Send referrals.</span>"
                 subtitle="$99 a year. 85% on every referred deal. No MLS dues, no association fees, no monthly bills.">
        <x-slot:actions>
            <x-button :href="route('join') . '?program=referral'" variant="primary" size="lg">Join the Referral Co.</x-button>
        </x-slot:actions>
    </x-page-hero>

    <x-section eyebrow="The plan in one screen" title="Built for the referral-only agent.">
        <div class="grid gap-6 md:grid-cols-3">
            <x-feature-card icon="dollar" title="$99 a year">
                That's the whole annual fee. No monthly bill, no per-transaction fee.
            </x-feature-card>
            <x-feature-card icon="chart" title="85/15 split">
                You keep 85% of every commission you generate through a referred transaction.
            </x-feature-card>
            <x-feature-card icon="shield" title="Active license">
                Hold your license active, stay current, and keep your earning power.
            </x-feature-card>
            <x-feature-card icon="x" title="No MLS fees">
                No MLS dues, no association fees, no monthly platform charges - because you're not actively listing.
            </x-feature-card>
            <x-feature-card icon="globe" title="Refer to any agent, anywhere">
                Send your client to any agent in the country - whoever's the best fit for their market. Bonus: 1,000+ Taylor agents already in MD, DC, VA, DE, and PA when you want to keep it in-house.
            </x-feature-card>
            <x-feature-card icon="lightning" title="Easy onboarding">
                Switch over in days, not weeks. Simple paperwork, fast license transfer.
            </x-feature-card>
        </div>
    </x-section>

    <section class="bg-slate-50 py-20 sm:py-28">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Quick math</p>
                <h2 class="mt-3 font-display text-3xl font-bold text-brand-900 sm:text-4xl">Refer 4 deals a year. Net thousands.</h2>
            </div>

            <div class="mt-12 grid gap-px overflow-hidden rounded-3xl bg-slate-200 sm:grid-cols-3">
                <div class="bg-white p-8 text-center">
                    <p class="text-xs uppercase tracking-wider text-slate-500">Annual fee</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-900">$99</p>
                </div>
                <div class="bg-white p-8 text-center">
                    <p class="text-xs uppercase tracking-wider text-slate-500">4 referrals @ 25% of $12k</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-900">$12,000</p>
                </div>
                <div class="bg-gradient-to-br from-brand-700 to-brand-950 p-8 text-center text-white">
                    <p class="text-xs uppercase tracking-wider text-accent-300">Your take-home</p>
                    <p class="mt-2 font-display text-3xl font-bold text-accent-300">$10,101</p>
                </div>
            </div>
            <p class="mt-4 text-center text-xs text-slate-500">Assumes 4 referrals at $300k sale price, 2.5% commission, 25% referral fee, 85% to you.</p>
        </div>
    </section>

    <x-cta-band title="Ready to put your license to work?" subtitle="Tell us a little about your situation - we'll send the full referral plan details." />

@endsection
