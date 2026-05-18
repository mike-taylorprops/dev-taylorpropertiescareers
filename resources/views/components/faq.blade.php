@props([
    'question' => '',
])

<div x-data="faq" class="border-b border-slate-200">
    <button
        @click="toggle"
        :aria-expanded="open"
        class="flex w-full items-center justify-between gap-4 py-4 text-left sm:py-5"
    >
        <span class="font-display text-base font-semibold text-brand-900 sm:text-lg">{{ $question }}</span>
        <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600 transition" :class="open && 'rotate-45'">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
        </span>
    </button>
    <div x-show="open" x-collapse style="display:none">
        <div class="pb-5 pr-12 text-slate-600 leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</div>
