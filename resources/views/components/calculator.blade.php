@props(['compact' => false])

<div
    x-data="calculator()"
    x-cloak
    {{ $attributes->merge(['class' => 'overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-brand-500/10']) }}
>
    <div class="grid gap-8 p-6 sm:p-10 lg:grid-cols-5 lg:gap-12">
        <div class="space-y-6 lg:col-span-3">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-500">Earnings Calculator</p>
                <h3 class="mt-2 font-display text-2xl font-bold text-brand-900 sm:text-3xl">See what you'd keep at Taylor.</h3>
                <p class="mt-2 text-sm text-slate-600">Adjust the inputs. We'll compare your annual take-home vs other major brokerages in real time.</p>
            </div>

            <div class="space-y-5">
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

                <label class="block">
                    <span class="text-sm font-semibold text-slate-700">Compare to</span>
                    <select x-model="competitor"
                            class="mt-2 w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                        <template x-for="(c, key) in competitors" :key="key">
                            <option :value="key" x-text="c.label"></option>
                        </template>
                    </select>
                </label>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="relative h-full overflow-hidden rounded-2xl bg-gradient-to-br from-brand-700 via-brand-800 to-brand-950 p-6 text-white sm:p-8">
                <div class="absolute -top-12 -right-12 h-48 w-48 rounded-full bg-accent-400/30 blur-3xl motion-safe:animate-blob"></div>

                <div class="relative space-y-6">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-accent-300">Annual gross commission</p>
                        <p class="mt-1 font-display text-3xl font-bold" x-text="money(grossAnnual)"></p>
                    </div>

                    {{-- Hero savings - the big payoff --}}
                    <div class="relative overflow-hidden rounded-2xl border-2 border-accent-400 bg-gradient-to-br from-accent-400 to-accent-500 p-6 shadow-2xl shadow-accent-400/40">
                        <div class="absolute inset-0 opacity-30 motion-safe:animate-shimmer"
                             style="background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,0.6) 50%, transparent 70%); background-size: 200% 100%;"></div>
                        <div class="relative">
                            <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-brand-900/80">Earn an extra</p>
                            <p class="mt-1 font-display text-5xl font-black tracking-tight text-brand-950 sm:text-6xl" x-text="money(savings)"></p>
                            <p class="mt-2 text-sm font-semibold text-brand-900">
                                per year with Taylor
                                <span x-show="savingsPct > 0">&middot; <span x-text="savingsPct + '%'"></span> more take-home</span>
                            </p>
                        </div>
                    </div>

                    {{-- Side-by-side comparison bars --}}
                    <div class="space-y-3">
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-semibold text-accent-300">Taylor take-home</span>
                                <span class="font-display font-bold text-white" x-text="money(taylorAnnual)"></span>
                            </div>
                            <div class="mt-1.5 h-3 overflow-hidden rounded-full bg-white/10">
                                <div class="h-full rounded-full bg-accent-400 transition-all duration-700"
                                     :style="`width: ${Math.min(100, (taylorAnnual / grossAnnual) * 100)}%`"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-semibold text-white/60" x-text="competitors[competitor].label + ' take-home'"></span>
                                <span class="font-display font-bold text-white/80" x-text="money(competitorAnnual)"></span>
                            </div>
                            <div class="mt-1.5 h-3 overflow-hidden rounded-full bg-white/10">
                                <div class="h-full rounded-full bg-white/40 transition-all duration-700"
                                     :style="`width: ${Math.max(0, Math.min(100, (competitorAnnual / grossAnnual) * 100))}%`"></div>
                            </div>
                        </div>
                    </div>

                    <p class="text-[11px] leading-relaxed text-white/50">
                        Estimates based on each brokerage's publicly stated fee structure. Your actual numbers depend on transactions, splits, and individual market conditions.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
