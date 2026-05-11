@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Teams | Taylor Properties')
@section('description', 'Meet the teams thriving inside Taylor Properties. Coming soon.')

@section('content')

    <x-page-hero eyebrow="Coming soon"
                 title="Our Teams. <span class='text-gradient'>Coming soon.</span>"
                 subtitle="We're putting together profiles of every team thriving inside Taylor Properties. Check back shortly.">
        <x-slot:actions>
            <x-button :href="route('join')" variant="primary" size="lg">Join Taylor</x-button>
            <x-button :href="route('contact-us')" variant="ghost" size="lg">Have a team? Talk to us</x-button>
        </x-slot:actions>
    </x-page-hero>

    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <div class="mx-auto grid h-20 w-20 place-items-center rounded-2xl bg-brand-50 text-brand-600">
                <x-icon name="users" class="h-10 w-10" />
            </div>
            <h2 class="mt-6 font-display text-3xl font-bold text-brand-900 sm:text-4xl">This page is being built.</h2>
            <p class="mt-4 text-slate-600">Soon you'll be able to browse every team inside Taylor Properties - their focus, their leaders, and how to join them.</p>
        </div>
    </section>

@endsection
