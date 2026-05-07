@props(['compact' => false])

<div
    x-data="calculator()"
    x-cloak
    {{ $attributes -> merge(['class' => 'overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-brand-500/10']) }}
>
    <div class="grid gap-8 p-6 sm:p-10 lg:grid-cols-5 lg:gap-12">
        <div class="space-y-8 lg:col-span-3">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Earnings Calculator</p>
                <h3 class="mt-2 font-display text-2xl font-bold text-brand-900 sm:text-3xl">Compare your real numbers.</h3>
                <p class="mt-2 text-sm text-slate-600">Enter what you actually pay at your current brokerage. We'll show you exactly what you'd take home at Taylor instead.</p>
            </div>

            {{-- Your business --}}
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-700">Your business</p>
                <div class="mt-4 space-y-5">
                    <label class="block">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700">Average sale price</span>
                            <span class="text-sm font-bold text-brand-700" x-text="money(salePrice)"></span>
                        </div>
                        <input type="range" min="150000" max="1500000" step="25000" x-model.number="salePrice"
                               class="mt-2 w-full accent-brand-500">
                    </label>

                    <label class="block">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700">Your commission %</span>
                            <span class="text-sm font-bold text-brand-700" x-text="commissionPct + '%'"></span>
                        </div>
                        <input type="range" min="1" max="6" step="0.25" x-model.number="commissionPct"
                               class="mt-2 w-full accent-brand-500">
                    </label>

                    <label class="block">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-slate-700">Closings per year</span>
                            <span class="text-sm font-bold text-brand-700" x-text="closings"></span>
                        </div>
                        <input type="range" min="1" max="60" step="1" x-model.number="closings"
                               class="mt-2 w-full accent-brand-500">
                    </label>
                </div>
            </div>

            {{-- Current brokerage --}}
            <div>
                <div class="flex items-baseline justify-between">
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-brand-700">Your current brokerage</p>
                    <p class="text-[11px] text-slate-400">Only you know these</p>
                </div>
                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-xs font-semibold text-slate-700">Monthly fee</span>
                        <div class="mt-1 flex items-center rounded-lg border border-slate-300 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/20">
                            <span class="pl-3 text-sm text-slate-400">$</span>
                            <input type="number" min="0" step="1" x-model.number="currentMonthly"
                                   class="w-full bg-transparent px-2 py-2 text-sm text-slate-700 focus:outline-none">
                        </div>
                    </label>

                    <label class="block">
                        <span class="text-xs font-semibold text-slate-700">Agent transaction fee per deal</span>
                        <div class="mt-1 flex items-center rounded-lg border border-slate-300 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/20">
                            <span class="pl-3 text-sm text-slate-400">$</span>
                            <input type="number" min="0" step="1" x-model.number="currentTransactionFee"
                                   class="w-full bg-transparent px-2 py-2 text-sm text-slate-700 focus:outline-none">
                        </div>
                    </label>

                    <label class="block">
                        <span class="text-xs font-semibold text-slate-700">Your split %</span>
                        <div class="mt-1 flex items-center rounded-lg border border-slate-300 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/20">
                            <input type="number" min="0" max="100" step="1" x-model.number="currentSplitPct"
                                   class="w-full bg-transparent px-3 py-2 text-sm text-slate-700 focus:outline-none">
                            <span class="pr-3 text-sm text-slate-400">%</span>
                        </div>
                        <p class="mt-1 text-[11px] text-slate-400">Your portion (e.g. 70 if it's a 70/30)</p>
                    </label>

                    <label class="block">
                        <span class="text-xs font-semibold text-slate-700">Franchise/royalty %</span>
                        <div class="mt-1 flex items-center rounded-lg border border-slate-300 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/20">
                            <input type="number" min="0" max="20" step="0.5" x-model.number="currentFranchisePct"
                                   class="w-full bg-transparent px-3 py-2 text-sm text-slate-700 focus:outline-none">
                            <span class="pr-3 text-sm text-slate-400">%</span>
                        </div>
                        <p class="mt-1 text-[11px] text-slate-400">Off the top, before your split. 0 if none.</p>
                    </label>

                    <label class="block sm:col-span-2">
                        <span class="text-xs font-semibold text-slate-700">Annual brokerage cap (optional)</span>
                        <div class="mt-1 flex items-center rounded-lg border border-slate-300 focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500/20">
                            <span class="pl-3 text-sm text-slate-400">$</span>
                            <input type="number" min="0" step="500" x-model.number="currentSplitCap"
                                   class="w-full bg-transparent px-2 py-2 text-sm text-slate-700 focus:outline-none">
                        </div>
                        <p class="mt-1 text-[11px] text-slate-400">Max your brokerage can collect from splits per year. Leave 0 for no cap.</p>
                    </label>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="relative h-full overflow-hidden rounded-2xl bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 p-6 text-white sm:p-8">
                <div class="absolute -top-12 -right-12 h-48 w-48 rounded-full bg-white/30 blur-3xl motion-safe:animate-blob"></div>

                <div class="relative space-y-6">
                    <div>
                        <p class=" font-semibold uppercase tracking-wider text-accent-300">Annual gross commission</p>
                        <p class="mt-1 font-display text-3xl font-bold" x-text="money(grossAnnual)"></p>
                    </div>

                    {{-- Hero savings --}}
                    <div class="relative overflow-hidden rounded-2xl border-2 border-accent-400 bg-gradient-to-br from-accent-400 to-accent-500 p-6 shadow-2xl shadow-accent-400/40">
                        <div class="absolute inset-0 opacity-30 motion-safe:animate-shimmer"
                             style="background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,0.6) 50%, transparent 70%); background-size: 200% 100%;"></div>
                        <div class="relative">
                            <p class="text-sm font-bold uppercase tracking-[0.18em] text-brand-900/80">Earn an extra</p>
                            <p class="mt-1 font-display text-5xl font-black tracking-tight text-brand-950 sm:text-6xl" x-text="money(savings)"></p>
                            <p class="mt-2  font-semibold text-brand-900">
                                per year with Taylor
                                <span x-show="savingsPct > 0">&middot; <span x-text="savingsPct + '%'"></span> more take-home</span>
                            </p>
                        </div>
                    </div>

                    {{-- Side by side bars --}}
                    <div class="space-y-3">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-accent-300">Taylor take-home</span>
                                <span class="font-display font-bold text-white" x-text="money(taylorAnnual)"></span>
                            </div>
                            <div class="mt-1.5 h-3 overflow-hidden rounded-full bg-white/10">
                                <div class="h-full rounded-full bg-accent-400 transition-all duration-700"
                                     :style="`width: ${Math.min(100, (taylorAnnual / grossAnnual) * 100)}%`"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-white/60">Current brokerage take-home</span>
                                <span class="font-display font-bold text-white/80" x-text="money(currentAnnual)"></span>
                            </div>
                            <div class="mt-1.5 h-3 overflow-hidden rounded-full bg-white/10">
                                <div class="h-full rounded-full bg-white/40 transition-all duration-700"
                                     :style="`width: ${Math.max(0, Math.min(100, (currentAnnual / grossAnnual) * 100))}%`"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Taylor cap callout --}}
                    <div class="rounded-xl border border-accent-400/30 bg-white/5 p-4">
                        <p class="text-sm font-semibold uppercase tracking-wider text-accent-300">Your max possible cost at Taylor</p>
                        <p class="my-4 font-display text-3xl font-bold text-white">$1,188 / yr</p>
                        <p class="mt-1 text-sm text-white/60">$99 &times; 12. No splits. No transaction fees. No franchise fees. No surprises.</p>
                    </div>

                    <p class="text-[11px] leading-relaxed text-white/50">
                        Numbers are based on what you enter for your current brokerage. Taylor's side uses our actual published structure.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
