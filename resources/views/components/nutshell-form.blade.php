@props([
    'form' => '16y4wq',
    'instance' => '371467',
])

@php
    $targetId = 'nutshell-form-' . $form;
@endphp

@if (app()->isProduction())
    <div id="{{ $targetId }}" class="nutshell-form-target"></div>
    <script>
        (function(n, u, t) {
            n[u] = n[u] || function() {
                (n[u].q = n[u].q || []).push(arguments)
            }
        }(window, 'Nutsheller'));
        Nutsheller('initForm', {
            form: '{{ $form }}',
            instance: '{{ $instance }}',
            authToken: '',
            target: '{{ $targetId }}'
        });
    </script>
    @once
        @push('scripts')
            <script async src="https://loader.nutshell.com/nutsheller.js"></script>
        @endpush
    @endonce
@else
    <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 p-8 text-center">
        <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-amber-800">
            <span class="h-2 w-2 rounded-full bg-amber-500"></span>
            {{ app()->environment() }} environment
        </span>
        <h4 class="mt-4 font-display text-lg font-bold text-brand-900">Nutshell form placeholder</h4>
        <p class="mt-2 text-sm text-slate-600">
            The live Nutshell CRM form (<code class="rounded bg-white px-1.5 py-0.5 text-xs text-slate-700">{{ $form }}</code>) renders here in production.
            Hidden in <code class="rounded bg-white px-1.5 py-0.5 text-xs text-slate-700">{{ app()->environment() }}</code> to avoid hCaptcha errors and CRM pollution.
        </p>
    </div>
@endif
