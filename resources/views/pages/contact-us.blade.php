@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Contact Us | Taylor Properties')
@section('description', 'Talk to a real person. Phone, email, or message form - we\'re here.')

@section('content')

    <x-page-hero eyebrow="Get in touch"
                 title="Real people. <span class='text-gradient'>Real availability.</span>"
                 subtitle="Call us, message us, or stop by. Mon-Fri, 9 to 5.">
    </x-page-hero>

    <section class="bg-white section-y">
        <div class="page-container">
            <div class="grid gap-8 lg:grid-cols-2 sm:gap-12">

                <div>
                    <h2 class="heading-page-sm">We're easy to reach.</h2>
                    <p class="mt-3 text-slate-600">Pick the channel that works for you. We respond same-day on weekdays.</p>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-6 transition hover:shadow-lg">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600">
                                <x-icon name="phone" class="h-6 w-6" />
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Phone</p>
                                <a href="tel:8005900925" class="mt-1 block font-display text-xl font-bold text-brand-900 hover:text-brand-700">(800) 590-0925</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-6 transition hover:shadow-lg">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600">
                                <x-icon name="home" class="h-6 w-6" />
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Headquarters</p>
                                <address class="mt-1 not-italic font-display text-base font-semibold text-brand-900">
                                    175 Admiral Cochrane Dr., Suite 112<br>Annapolis, MD 21401
                                </address>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-6 transition hover:shadow-lg">
                            <div class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600">
                                <x-icon name="check" class="h-6 w-6" />
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Hours</p>
                                <p class="mt-1 font-display text-base font-semibold text-brand-900">Monday-Friday, 9am-5pm ET</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 card-pad shadow-xl" x-data="contactForm()">
                    <h2 class="font-display text-2xl font-bold text-brand-900">Send us a message</h2>
                    <p class="mt-2 text-sm text-slate-600">We'll get back to you within one business day.</p>

                    <form x-show="!success" @submit.prevent="submit" class="mt-6 space-y-4">
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
                            <textarea name="message" x-model="form['message']" required rows="4" placeholder="How can we help?"
                                class="w-full resize-none rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm placeholder:text-slate-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"></textarea>
                            <p x-show="errors['message']" x-text="errors['message']?.[0]" class="mt-1 text-xs text-red-600" x-cloak></p>
                        </div>
                        <p x-show="errors['_']" x-text="errors['_']?.[0]" class="text-sm text-red-600" x-cloak></p>
                        <button type="submit" :disabled="sending"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-brand-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-800 disabled:opacity-60">
                            <svg x-show="sending" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                            </svg>
                            <span x-text="sending ? 'Sending…' : 'Send message'"></span>
                        </button>
                    </form>

                    <div x-show="success" class="py-8 text-center" x-cloak>
                        <div class="mx-auto mb-4 grid h-14 w-14 place-items-center rounded-full bg-emerald-100 text-emerald-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        </div>
                        <h4 class="font-display text-xl font-bold text-brand-900">Message sent!</h4>
                        <p class="mt-2 text-sm text-slate-600">We'll get back to you within one business day.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
