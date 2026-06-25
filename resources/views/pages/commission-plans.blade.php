@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Commission Plans | Taylor Properties')
@section('description', '$99 a month, 100% commission. The plan most agents pick - plus two alternatives if it doesn\'t fit your business.')

@section('content')

    <x-page-hero eyebrow="Pick your plan"
                 title="$99 a month. <span class='text-gradient'>100% commission.</span>"
                 subtitle="The plan most of our agents are on. If it's not the right fit, two alternatives are below - or talk to us about a custom plan.">
        <x-slot:actions>
            <x-button href="#calculator" variant="primary" size="lg">Run the numbers</x-button>
            <x-button :href="route('compare')" variant="ghost" size="lg">Compare brokerages</x-button>
        </x-slot:actions>
    </x-page-hero>

    {{-- Plans --}}
    <section x-data="{ show_commission_request_form: false, show_custom_header: false }" class="bg-white section-y">
        <div class="page-container">
            <div class="grid gap-6 lg:grid-cols-3">

                <div class="relative rounded-3xl border-2 border-accent-400 bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 card-pad text-white shadow-2xl shadow-accent-400/20">
                    <span class="absolute -top-3 left-1/2 -translate-x-1/2 rounded-full bg-accent-400 px-4 py-1 text-xs font-bold uppercase tracking-wider text-brand-900">Most Popular</span>
                    <p class="text-xs font-semibold uppercase tracking-wider text-accent-300">Standard</p>
                    <h3 class="mt-2 font-display text-2xl font-bold sm:text-3xl">100% Plan</h3>
                    <p class="mt-2 text-sm text-white/80">For most full-time agents. Lowest fixed cost, highest take-home.</p>
                    <p class="mt-6">
                        <span class="stat-hero text-accent-300">$99</span>
                        <span class="text-white/70">/month</span>
                    </p>
                    <ul class="mt-6 space-y-3 text-sm text-white/90">
                        @foreach (['100% commission - keep every dollar', 'Zero agent transaction fees', 'No franchise or royalty fees', 'Free CRM, IDX site, e-sign', 'Mentorship + training included', 'Same low fee, every month'] as $f)
                            <li class="flex items-start gap-2">
                                <x-icon name="check" class="h-5 w-5 shrink-0 text-accent-300" />
                                <span>{{ $f }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <button @click="show_commission_request_form = true; show_custom_header = false"
                            class="mt-8 inline-flex w-full items-center justify-center rounded-full bg-accent-400 px-6 py-3 text-sm font-bold text-brand-900 transition hover:bg-accent-300">
                        Request Details
                    </button>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white card-pad shadow-sm transition hover:shadow-xl">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Teams</p>
                    <h3 class="mt-2 font-display text-2xl font-bold text-brand-900 sm:text-3xl">Team Plans</h3>
                    <p class="mt-2 text-sm text-slate-600">Have a team? High volume? Let's design a plan around your business.</p>
                    <p class="mt-6">
                        <span class="stat-hero text-brand-700">Talk to us</span>
                    </p>
                    <ul class="mt-6 space-y-3 text-sm text-slate-700">
                        @foreach (['Custom split or flat-fee structure', 'Team-friendly pricing', 'Specialty (commercial, rental) terms',  'Dedicated broker support'] as $f)
                            <li class="flex items-start gap-2">
                                <x-icon name="check" class="h-5 w-5 shrink-0 text-accent-500" />
                                <span>{{ $f }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <button @click="show_commission_request_form = true; show_custom_header = true"
                            class="mt-8 inline-flex w-full items-center justify-center rounded-full bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800">
                        Design My Plan
                    </button>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white card-pad shadow-sm transition hover:shadow-xl">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Referral</p>
                    <h3 class="mt-2 font-display text-2xl font-bold text-brand-900 sm:text-3xl">Referral Plan</h3>
                    <p class="mt-2 text-sm text-slate-600">For licensees who want to refer business without active production.</p>
                    <p class="mt-6">
                        <span class="stat-hero text-brand-700">$99</span>
                        <span class="text-slate-500">/year</span>
                    </p>
                    <ul class="mt-6 space-y-3 text-sm text-slate-700">
                        @foreach (['85/15 commission split', 'No MLS or association fees', 'No monthly bills', 'Hold your license active', 'Refer to any agent in the country', 'Easy onboarding'] as $f)
                            <li class="flex items-start gap-2">
                                <x-icon name="check" class="h-5 w-5 shrink-0 text-accent-500" />
                                <span>{{ $f }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('referral-company') }}"
                       class="mt-8 inline-flex w-full items-center justify-center rounded-full border-2 border-brand-700 px-6 py-3 text-sm font-semibold text-brand-700 transition hover:bg-brand-700 hover:text-white">
                        Learn More
                    </a>
                </div>
            </div>
        </div>

        {{-- Commission request modal --}}
        <div x-show="show_commission_request_form"
             x-transition.opacity
             @keydown.escape.window="show_commission_request_form = false"
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display:none">
            <div @click="show_commission_request_form = false" class="absolute inset-0 bg-brand-950/80 backdrop-blur-sm"></div>
            <div x-trap.inert.noscroll="show_commission_request_form"
                 class="relative max-h-[90vh] w-full max-w-xl overflow-y-auto rounded-2xl bg-white p-6 shadow-2xl sm:p-8">
                <button @click="show_commission_request_form = false"
                        class="absolute right-4 top-4 rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600"
                        aria-label="Close">
                    <x-icon name="x" class="h-5 w-5" />
                </button>
                <h3 class="font-display text-2xl font-bold text-brand-900">
                    <span x-show="show_custom_header">Custom Commission</span>
                    <span x-show="!show_custom_header">Commission Details</span> Request
                </h3>
                <p class="mt-2 text-sm text-slate-600">Fill out the form and we'll send the full plan details to your inbox.</p>
                <div class="mt-6" x-data="commissionForm()">
                    <form x-show="!success" @submit.prevent="submit" class="space-y-4">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <input type="text" name="first_name" x-model="form['first_name']" required placeholder="First name" autocomplete="given-name"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                                <p x-show="errors['first_name']" x-text="errors['first_name']?.[0]" class="mt-1 text-sm text-red-600" x-cloak></p>
                            </div>
                            <div>
                                <input type="text" name="last_name" x-model="form['last_name']" required placeholder="Last name" autocomplete="family-name"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                                <p x-show="errors['last_name']" x-text="errors['last_name']?.[0]" class="mt-1 text-sm text-red-600" x-cloak></p>
                            </div>
                        </div>
                        <div>
                            <input type="email" name="email" x-model="form['email']" required placeholder="Email address" autocomplete="email"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                            <p x-show="errors['email']" x-text="errors['email']?.[0]" class="mt-1 text-sm text-red-600" x-cloak></p>
                        </div>
                        <div>
                            <input type="tel" name="phone" x-model="form['phone']" required placeholder="Phone number" autocomplete="tel"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                            <p x-show="errors['phone']" x-text="errors['phone']?.[0]" class="mt-1 text-sm text-red-600" x-cloak></p>
                        </div>
                        <div>
                            <textarea name="message" x-model="form['message']" required rows="4" placeholder="Tell us about the commission plan you're interested in"
                                class="w-full resize-none rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"></textarea>
                            <p x-show="errors['message']" x-text="errors['message']?.[0]" class="mt-1 text-sm text-red-600" x-cloak></p>
                        </div>
                        <p x-show="errors['_']" x-text="errors['_']?.[0]" class="text-sm text-red-600" x-cloak></p>
                        <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true" />
                        @if(config('app.turnstile_site_key'))
                            <div class="cf-turnstile" data-sitekey="{{ config('app.turnstile_site_key') }}" data-theme="light"></div>
                        @endif
                        <button type="submit" :disabled="sending"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 disabled:opacity-60">
                            <span x-text="sending ? 'Sending…' : 'Send Request'"></span>
                        </button>
                    </form>
                    <div x-show="success" class="py-8 text-center" x-cloak>
                        <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-full bg-emerald-100 text-emerald-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </div>
                        <h4 class="font-display text-xl font-bold text-brand-900">Request sent!</h4>
                        <p class="mt-2 text-sm text-slate-600">We'll send the plan details to your inbox shortly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Worked example --}}
    <section class="bg-slate-50 section-y">
        <div class="page-container-sm">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Real example</p>
                <h2 class="heading-page-sm mt-3">Two listings. $400k each. 3% commission.</h2>
            </div>

            <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl sm:mt-12">
                <div class="grid gap-px bg-slate-100 sm:grid-cols-3">
                    <div class="bg-white card-pad text-center">
                        <p class="text-xs uppercase tracking-wider text-slate-500">Two sales @ 3%</p>
                        <p class="mt-2 font-display text-2xl font-bold text-brand-900 sm:text-3xl">$24,000</p>
                        <p class="mt-1 text-xs text-slate-500">Gross commission</p>
                    </div>
                    <div class="bg-white card-pad text-center">
                        <p class="text-xs uppercase tracking-wider text-slate-500">Monthly fee</p>
                        <p class="mt-2 font-display text-2xl font-bold text-brand-900 sm:text-3xl">- $99</p>
                        <p class="mt-1 text-xs text-slate-500">Your only cost that month</p>
                    </div>
                    <div class="bg-gradient-to-br from-brand-700 to-brand-950 card-pad text-center text-white">
                        <p class="text-xs uppercase tracking-wider text-accent-300">You take home</p>
                        <p class="mt-2 font-display text-2xl font-bold text-accent-300 sm:text-3xl">$23,901</p>
                        <p class="mt-1 text-xs text-white/70">99.6% of gross</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Calculator --}}
    <section id="calculator" class="bg-white section-y">
        <div class="page-container">
            <div class="mx-auto max-w-3xl text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-500">Plug in your numbers</p>
                <h2 class="heading-page mt-3">Earnings calculator.</h2>
            </div>
            <div class="mt-12">
                <x-calculator />
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <x-section eyebrow="Frequently asked" title="Questions agents always ask first.">
        <div class="mx-auto max-w-3xl">
            <x-faq question="Is there really no transaction fee?">Yes - we don't charge a per-deal transaction fee. Your $99/month is the entire bill, no matter how many deals you close.</x-faq>
            <x-faq question="Are there any onboarding or join fees?">No. Sign your independent contractor agreement, transfer your license, get to work.</x-faq>
            <x-faq question="Can I be on a team?">Absolutely. We have great teams across MD, DC, VA, DE, and PA. We can also set up custom team economics through the Custom plan.</x-faq>
            <x-faq question="What if I'm new to real estate?">Perfect. Our mentorship program pairs you with an experienced agent through your first three closings - no extra cost.</x-faq>
            <x-faq question="What if I just want to refer business?">The Referral Plan is for you. $99/year, 85% on every referred deal, no MLS or association fees.</x-faq>
        </div>
    </x-section>

    <x-cta-band />

@endsection
