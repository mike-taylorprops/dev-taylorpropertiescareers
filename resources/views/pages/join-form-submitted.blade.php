@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Welcome to Taylor Properties')
@section('description', 'Your application is in. Here\'s what happens next.')

@section('content')

    <section class="relative isolate overflow-hidden bg-gradient-to-br from-brand-900 via-brand-800 to-brand-950 pt-32 pb-20 text-white sm:pt-44 sm:pb-32">
        <div class="absolute -top-32 -left-24 h-[34rem] w-[34rem] rounded-full bg-white/30 blur-3xl motion-safe:animate-blob"></div>
        <div class="absolute -bottom-40 right-[-10rem] h-[34rem] w-[34rem] rounded-full bg-brand-400/30 blur-3xl motion-safe:animate-blob-slow"></div>
        <div class="absolute inset-0 bg-grid opacity-30"></div>

        <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <div class="mx-auto grid h-20 w-20 place-items-center rounded-full bg-accent-400 text-brand-900 motion-safe:animate-float">
                <x-icon name="check" class="h-10 w-10" />
            </div>

            <h1 class="mt-8 font-display text-4xl font-bold sm:text-6xl">
                @if ($firstName)
                    Welcome, {{ $firstName }}!
                @else
                    You're in.
                @endif
            </h1>
            <p class="mt-6 text-lg text-white/80 sm:text-xl">
                Your application is in our hands. A real person will reach out within one business day with your custom numbers and next steps.
            </p>

            <div class="mx-auto mt-12 grid max-w-2xl gap-4 sm:grid-cols-3">
                @foreach ([
                    ['icon' => 'phone', 'label' => 'We call you'],
                    ['icon' => 'chart', 'label' => 'Custom numbers'],
                    ['icon' => 'rocket', 'label' => 'License transfer'],
                ] as $step)
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-6 text-center backdrop-blur">
                        <div class="mx-auto grid h-10 w-10 place-items-center rounded-xl bg-accent-400 text-brand-900">
                            <x-icon :name="$step['icon']" class="h-5 w-5" />
                        </div>
                        <p class="mt-3 text-sm font-semibold">{{ $step['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                <x-button :href="route('home')" variant="primary" size="lg">Back to home</x-button>
            </div>
        </div>
    </section>

@endsection
