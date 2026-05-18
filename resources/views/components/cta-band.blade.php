@props([
    'title' => 'Ready to keep more of what you earn?',
    'subtitle' => 'Get the exact numbers, the plan options, and answers to your questions in 15 minutes.',
])

<section class="relative overflow-hidden bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 section-y text-white">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-white/30 blur-3xl motion-safe:animate-blob"></div>
    <div class="absolute -bottom-32 -right-24 h-[28rem] w-[28rem] rounded-full bg-brand-400/30 blur-3xl motion-safe:animate-blob-slow"></div>
    <div class="absolute inset-0 bg-grid opacity-30"></div>

    <div class="relative page-container-cta">
        <h2 class="heading-section">{{ $title }}</h2>
        <p class="mx-auto mt-3 max-w-2xl text-sm text-white/80 sm:mt-5 sm:text-lg">{{ $subtitle }}</p>
        <div class="mt-6 flex flex-wrap items-center justify-center gap-3 sm:mt-10 sm:gap-4">
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
