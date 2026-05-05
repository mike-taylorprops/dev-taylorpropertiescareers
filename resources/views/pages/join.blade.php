@extends('layouts.app')

@section('title', 'Join Taylor Properties')
@section('description', 'Start the process to join Maryland\'s largest independent brokerage. 100% commission. $99 a month.')

@section('content')

    <x-page-hero eyebrow="Get started"
                 title="Welcome to <span class='text-gradient'>Taylor.</span>"
                 subtitle="Tell us a little about yourself. We'll send back exact numbers for your situation - no pressure, no commitment.">
    </x-page-hero>

    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-5">

                <aside class="lg:col-span-2">
                    <div class="sticky top-24 space-y-6">
                        <div class="rounded-3xl border border-slate-200 bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 p-8 text-white">
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

                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-xl lg:col-span-3">
                    @if ($program === 'referral')
                        <p class="inline-block rounded-full bg-accent-400/20 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-accent-700">Referral Plan</p>
                    @endif
                    <h2 class="mt-3 font-display text-3xl font-bold text-brand-900">Tell us about you.</h2>
                    <p class="mt-2 text-sm text-slate-600">All fields confidential. We'll only contact you about joining Taylor.</p>
                    <div class="mt-8">
                        <x-nutshell-form form="16y4wq" />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
