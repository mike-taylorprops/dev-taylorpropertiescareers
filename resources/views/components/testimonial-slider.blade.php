@props(['testimonials' => []])

<div x-data="splide({ perPage: 1, gap: '2rem' })" class="splide" aria-label="Agent testimonials">
    <div class="splide__track">
        <ul class="splide__list">
            @foreach ($testimonials as $t)
                <li class="splide__slide">
                    <figure class="mx-auto max-w-3xl rounded-3xl border border-slate-200 bg-white p-8 text-center shadow-xl shadow-brand-500/5 sm:p-12">
                        <svg class="mx-auto h-10 w-10 text-accent-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9.13 8.05c-2.6 0-4.71 2.11-4.71 4.71 0 2.61 2.11 4.72 4.71 4.72.06 0 .11-.01.16-.01-.27 1.74-1.69 3.12-3.51 3.31v2.21c4.04-.4 7.13-3.74 7.13-7.86V8.05H9.13zm10.7 0c-2.6 0-4.7 2.11-4.7 4.71 0 2.61 2.1 4.72 4.7 4.72.06 0 .11-.01.16-.01-.27 1.74-1.69 3.12-3.51 3.31v2.21c4.04-.4 7.13-3.74 7.13-7.86V8.05h-3.78z"/>
                        </svg>
                        <blockquote class="mt-6 font-display text-xl leading-snug text-brand-900 sm:text-2xl">
                            &ldquo;{{ $t['quote'] }}&rdquo;
                        </blockquote>
                        <figcaption class="mt-6">
                            <div class="font-semibold text-brand-900">{{ $t['name'] }}</div>
                            <div class="text-sm text-slate-500">{{ $t['role'] }}</div>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        </ul>
    </div>
</div>
