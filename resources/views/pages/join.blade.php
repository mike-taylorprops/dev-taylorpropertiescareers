@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Join Taylor Properties')
@section('description', 'Start the process to join Maryland\'s largest independent brokerage. 100% commission. $99 a month.')

@section('content')

    <x-page-hero eyebrow="Get started"
                 title="Welcome to <span class='text-gradient'>Taylor.</span>"
                 subtitle="Tell us a little about yourself. We'll send back exact numbers for your situation - no pressure, no commitment.">
    </x-page-hero>

    <section class="bg-white section-y">
        <div class="page-container">
            <div class="grid gap-8 lg:grid-cols-5 sm:gap-12">

                <aside class="lg:col-span-2">
                    <div class="sticky top-24 space-y-6">
                        <div class="rounded-3xl border border-slate-200 bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 card-pad text-white">
                            <p class="text-xs font-semibold uppercase tracking-wider text-accent-300">What happens next</p>
                            <ol class="mt-6 space-y-5">
                                @foreach (['Submit the form', 'Quick 15-minute call', 'Get your custom plan', 'License transfer in days'] as $i => $step)
                                    <li class="flex items-start gap-4">
                                        <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-accent-400 font-display text-sm font-bold text-brand-900">{{ $i + 1 }}</span>
                                        <span class="pt-1 text-sm">{{ $step }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-6">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Prefer to talk?</p>
                            <a href="tel:8005900925" class="mt-1 block font-display text-2xl font-bold text-brand-900 hover:text-brand-700">(800) 590-0925</a>
                        </div>
                    </div>
                </aside>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 card-pad shadow-xl lg:col-span-3" x-data="joinForm()">
                    @if ($program === 'referral')
                        <p class="inline-block rounded-full bg-accent-400/20 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-accent-700">Referral Plan</p>
                    @endif
                    <h2 class="heading-page-sm mt-3">Tell us about you.</h2>
                    <p class="mt-2 text-sm text-slate-600">All fields confidential. We'll only contact you about joining Taylor.</p>

                    <form x-show="!success" @submit.prevent="submit" class="mt-8 space-y-4">
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <input type="text" name="first_name" x-model="form['first_name']" required placeholder="First name" autocomplete="given-name"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                                <p x-show="errors['first_name']" x-text="errors['first_name']?.[0]" class="mt-1 text-xs text-red-600" x-cloak></p>
                            </div>
                            <div>
                                <input type="text" name="last_name" x-model="form['last_name']" required placeholder="Last name" autocomplete="family-name"
                                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                                <p x-show="errors['last_name']" x-text="errors['last_name']?.[0]" class="mt-1 text-xs text-red-600" x-cloak></p>
                            </div>
                        </div>
                        <div>
                            <input type="email" name="email" x-model="form['email']" required placeholder="Email address" autocomplete="email"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                            <p x-show="errors['email']" x-text="errors['email']?.[0]" class="mt-1 text-xs text-red-600" x-cloak></p>
                        </div>
                        <div>
                            <input type="tel" name="phone" x-model="form['phone']" required placeholder="Phone number" autocomplete="tel"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100" />
                            <p x-show="errors['phone']" x-text="errors['phone']?.[0]" class="mt-1 text-xs text-red-600" x-cloak></p>
                        </div>
                        <div>
                            <select name="how_did_you_hear" x-model="form['how_did_you_hear']"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100">
                                <option value="">How did you hear about us?</option>
                                <option value="Referral">Referral</option>
                                <option value="Recruiting Email">Recruiting Email</option>
                                <option value="Google Search">Google Search</option>
                                <option value="Event">Event</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="message" x-model="form['message']" required rows="4" placeholder="Tell us a bit about yourself and your real estate experience"
                                class="w-full resize-none rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"></textarea>
                            <p x-show="errors['message']" x-text="errors['message']?.[0]" class="mt-1 text-xs text-red-600" x-cloak></p>
                        </div>
                        <p x-show="errors['_']" x-text="errors['_']?.[0]" class="text-sm text-red-600" x-cloak></p>
                        @if(config('app.turnstile_site_key'))
                            <div class="cf-turnstile" data-sitekey="{{ config('app.turnstile_site_key') }}" data-theme="light"></div>
                        @endif
                        <button type="submit" :disabled="sending"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 disabled:opacity-60">
                            <svg x-show="sending" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <span x-text="sending ? 'Submitting…' : 'Submit application'"></span>
                        </button>
                    </form>

                    <div x-show="success" class="py-8 text-center" x-cloak>
                        <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-full bg-emerald-100 text-emerald-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </div>
                        <h4 class="font-display text-xl font-bold text-brand-900">Application received!</h4>
                        <p class="mt-2 text-sm text-slate-600">We'll reach out within one business day to set up a quick call.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
