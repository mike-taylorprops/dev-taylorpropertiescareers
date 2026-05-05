@props(['items' => []])

<div class="relative w-full overflow-hidden mask-fade-x">
    <div class="flex w-max motion-safe:animate-marquee gap-12 py-2">
        @foreach (array_merge($items, $items) as $item)
            <div class="flex shrink-0 items-center gap-2 px-4">
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-brand-50 text-brand-700">
                    <x-icon name="building" class="h-5 w-5" />
                </span>
                <span class="whitespace-nowrap font-display text-sm font-semibold text-slate-700">{{ $item }}</span>
            </div>
        @endforeach
    </div>
</div>
