@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Mentoring & Training | Taylor Properties')
@section('description', 'One-on-one mentorship, live training, masterminds, and continuing education through Metropolitan Real Estate Academy and The CE Shop.')

@section('content')

    <x-page-hero eyebrow="Mentoring &amp; Training"
                 title="A coach, a class, <span class='text-gradient'>and a community.</span>"
                 subtitle="Whether you're brand new or 20 years in, we have the structure to keep you growing.">
    </x-page-hero>

    <x-section eyebrow="Three pillars" title="Built for every stage of your career.">
        <div class="grid gap-8 md:grid-cols-3">
            <div class="rounded-3xl border border-slate-200 bg-white card-pad transition hover:shadow-2xl hover:shadow-brand-500/10">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-brand-50 text-brand-600">
                    <x-icon name="users" class="h-7 w-7" />
                </div>
                <h3 class="mt-6 font-display text-2xl font-bold text-brand-900">Mentorship</h3>
                <p class="mt-3 text-sm text-slate-600">A 1-on-1 mentor walks alongside you for your first three closings. Contract review, marketing help, listing-presentation prep - the real stuff.</p>
                <ul class="mt-6 space-y-2 text-sm text-slate-700">
                    @foreach (['Paired by market and specialty', 'Joins your first listing appointment', 'Reviews every contract', 'Marketing & lead-gen guidance'] as $f)
                        <li class="flex items-start gap-2"><x-icon name="check" class="h-4 w-4 shrink-0 text-accent-500 mt-1" /><span>{{ $f }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="rounded-3xl border-2 border-accent-400 bg-gradient-to-br from-brand-700 to-brand-950 card-pad text-white shadow-2xl">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-white/10 text-accent-300">
                    <x-icon name="academic" class="h-7 w-7" />
                </div>
                <h3 class="mt-6 font-display text-2xl font-bold">Live Training &amp; Masterminds</h3>
                <p class="mt-3 text-sm text-white/80">Weekly live classes on the topics that move your business: prospecting, listing presentations, contracts, social media, geo-farming.</p>
                <ul class="mt-6 space-y-2 text-sm text-white/90">
                    @foreach (['Weekly live training', 'Topic-specific deep-dives', 'Peer masterminds by region', 'Recorded library on demand'] as $f)
                        <li class="flex items-start gap-2"><x-icon name="check" class="h-4 w-4 shrink-0 text-accent-300 mt-1" /><span>{{ $f }}</span></li>
                    @endforeach
                </ul>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white card-pad transition hover:shadow-2xl hover:shadow-brand-500/10">
                <div class="grid h-14 w-14 place-items-center rounded-2xl bg-brand-50 text-brand-600">
                    <x-icon name="building" class="h-7 w-7" />
                </div>
                <h3 class="mt-6 font-display text-2xl font-bold text-brand-900">Continuing Education</h3>
                <p class="mt-3 text-sm text-slate-600">Stay current. Stay sharp. Stay licensed. Through our partner programs, all your CE is in one place.</p>
                <ul class="mt-6 space-y-2 text-sm text-slate-700">
                    <li class="flex items-start gap-2"><x-icon name="check" class="h-4 w-4 shrink-0 text-accent-500 mt-1" /><span><a href="https://metropolitanrealestateacademy.com" target="_blank" rel="noopener" class="text-brand-700 underline">Metropolitan Real Estate Academy</a></span></li>
                    <li class="flex items-start gap-2"><x-icon name="check" class="h-4 w-4 shrink-0 text-accent-500 mt-1" /><span><a href="https://www.theceshop.com" target="_blank" rel="noopener" class="text-brand-700 underline">The CE Shop</a></span></li>
                    <li class="flex items-start gap-2"><x-icon name="check" class="h-4 w-4 shrink-0 text-accent-500 mt-1" /><span>Pre-licensing classes</span></li>
                    <li class="flex items-start gap-2"><x-icon name="check" class="h-4 w-4 shrink-0 text-accent-500 mt-1" /><span>Multi-state CE</span></li>
                </ul>
            </div>
        </div>
    </x-section>

    <x-section tone="soft" eyebrow="Topics covered" title="A library of training that grows every month.">
        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (['Prospecting', 'Listing Presentations', 'Buyer Representation', 'Contracts &amp; Addenda', 'Open Houses', 'Geo-Farming', 'Social Media', 'Lead Generation', 'CMAs', 'Sphere of Influence', 'Marketing', 'Tech Stack Mastery', 'Negotiation', 'Pricing Strategy', 'Team Building', 'Investor Clients'] as $topic)
                <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white px-4 py-3 transition hover:border-brand-300 hover:shadow">
                    <span class="grid h-8 w-8 shrink-0 place-items-center rounded-lg bg-brand-50 text-brand-600">
                        <x-icon name="check" class="h-4 w-4" />
                    </span>
                    <span class="text-sm font-medium text-slate-700">{!! $topic !!}</span>
                </div>
            @endforeach
        </div>
    </x-section>

    <x-cta-band title="Ready to grow?" subtitle="Get matched with a mentor and your first set of training in your first week." />

@endsection
