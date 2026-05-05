@props([
    'form' => '16y4wq',
    'instance' => '371467',
])

@php
    $targetId = 'nutshell-form-' . $form;
@endphp

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
