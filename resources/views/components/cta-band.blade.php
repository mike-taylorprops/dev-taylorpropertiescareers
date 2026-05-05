@props([
    'title' => 'Ready to keep more of what you earn?',
    'subtitle' => 'Get the exact numbers, the plan options, and answers to your questions in 15 minutes.',
])

<section class="relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 py-20 text-white sm:py-28">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-accent-400/30 blur-3xl motion-safe:animate-blob"></div>
    <div class="absolute -bottom-32 -right-24 h-[28rem] w-[28rem] rounded-full bg-brand-400/30 blur-3xl motion-safe:animate-blob-slow"></div>
    <div class="absolute inset-0 bg-grid opacity-30"></div>

    <div class="relative mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="font-display text-3xl font-bold tracking-tight sm:text-5xl">{{ $title }}</h2>
        <p class="mx-auto mt-5 max-w-2xl text-lg text-white/80">{{ $subtitle }}</p>
        <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
            <x-button :href="route('join')" variant="primary" size="lg">
                Get Started
                <x-icon name="arrow-right" class="h-5 w-5" />
            </x-button>
            <x-button :href="route('contact-us')" variant="ghost" size="lg">
                Talk to Us
            </x-button>
        </div>
    </div>
</section>
