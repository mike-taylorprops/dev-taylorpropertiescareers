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

                <div class="rounded-3xl border border-slate-200 bg-slate-50 card-pad shadow-xl">
                    <h2 class="font-display text-2xl font-bold text-brand-900">Send us a message</h2>
                    <p class="mt-2 text-sm text-slate-600">We'll get back to you within one business day.</p>
                    <div class="mt-6">
                        <x-nutshell-form form="16y4wq" />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
