@extends('layouts.app', ['transparentNav' => true])

@section('title', 'Our Staff | Taylor Properties')
@section('description', 'Meet the Taylor Properties team. We\'re here to help you grow your business.')

@section('content')

    <x-page-hero eyebrow="The team behind the brokerage"
                 title="People who <span class='text-gradient'>are actually there for you.</span>"
                 subtitle="The folks who keep Taylor running, from contract review to marketing from the moment you transfer in.">
    </x-page-hero>

    <section
        x-data="{
            modal: false,
            sent: false,
            sending: false,
            error: null,
            employee: { name: '', first_name: '', email: '' },
            form: { name: '', email: '', phone: '', message: '' },
            open(name, first, email) {
                this.employee = { name: name, first_name: first, email: email };
                this.form = { name: '', email: '', phone: '', message: '' };
                this.error = null;
                this.sent = false;
                this.modal = true;
            },
            close() { this.modal = false; },
            async submit() {
                if (!this.form.name || !this.form.email || !this.form.message) {
                    this.error = 'Please fill in your name, email, and message.';
                    return;
                }
                this.sending = true;
                this.error = null;
                try {
                    const response = await fetch('{{ route('email-employee') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content,
                        },
                        body: JSON.stringify({
                            ...this.form,
                            to_name: this.employee.name,
                            to_email: this.employee.email,
                        }),
                    });
                    if (!response.ok) throw new Error('Send failed');
                    this.sent = true;
                } catch (e) {
                    this.error = 'Something went wrong. Please try again or call us directly.';
                } finally {
                    this.sending = false;
                }
            },
        }"
        class="bg-white section-y"
    >
        <div class="page-container">

            @if ($employees -> isEmpty())
                <div class="mx-auto max-w-md rounded-3xl border border-slate-200 bg-slate-50 p-12 text-center">
                    <p class="text-slate-600">Staff directory is being updated. Please check back shortly.</p>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($employees as $employee)
                        @php
                            $photoUrl = $employee -> photo_location_url ?: asset('images/staff-placeholder.svg');
                            $name = $employee -> fullname ?? trim(($employee -> first_name ?? '') . ' ' . ($employee -> last_name ?? ''));
                        @endphp
                        <div class="group flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-500/10">
                            <div class="relative aspect-[4/5] overflow-hidden bg-slate-100">
                                <img src="{{ $photoUrl }}" alt="{{ $name }}" class="h-full w-full object-cover object-top transition duration-500 group-hover:scale-105">
                                {{-- <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-brand-950/80 to-transparent"></div> --}}
                            </div>
                            <div class="flex flex-1 flex-col p-6">
                                <h3 class="font-display text-lg font-bold text-brand-900">{{ $name }}</h3>
                                <p class="mt-1 text-sm font-semibold text-accent-500">{{ $employee -> job_title }}</p>
                                <div class="mt-auto pt-4">
                                    <button
                                        @click="open('{{ addslashes($name) }}', '{{ addslashes($employee -> first_name ?? '') }}', '{{ addslashes($employee -> email ?? '') }}')"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-brand-700 px-4 py-2 text-sm font-semibold text-white transition hover:bg-brand-800">
                                        <x-icon name="mail" class="h-4 w-4" />
                                        Contact {{ $employee -> first_name ?? 'Us' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Modal --}}
        <div x-show="modal"
             x-transition.opacity
             @keydown.escape.window="close"
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="display:none">
            <div @click="close" class="absolute inset-0 bg-brand-950/80 backdrop-blur-sm"></div>
            <div x-trap.inert.noscroll="modal"
                 class="relative max-h-[90vh] w-full max-w-md overflow-y-auto rounded-2xl bg-white p-6 shadow-2xl sm:p-8">
                <button @click="close"
                        class="absolute right-4 top-4 rounded-full p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600"
                        aria-label="Close">
                    <x-icon name="x" class="h-5 w-5" />
                </button>

                <div x-show="!sent">
                    <h3 class="font-display text-2xl font-bold text-brand-900">
                        Message <span x-text="employee.name"></span>
                    </h3>
                    <form @submit.prevent="submit" class="mt-6 space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Your name</label>
                            <input type="text" x-model="form.name" required
                                   class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Email</label>
                            <input type="email" x-model="form.email" required
                                   class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Phone</label>
                            <input type="tel" x-model="form.phone"
                                   class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700">Message</label>
                            <textarea x-model="form.message" rows="4" required
                                      class="mt-1 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20"></textarea>
                        </div>
                        <p x-show="error" x-text="error" class="text-sm text-red-600"></p>
                        <button type="submit" :disabled="sending"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-accent-400 px-6 py-3 text-sm font-bold text-brand-900 transition hover:bg-accent-300 disabled:opacity-60">
                            <span x-show="!sending">Send Message</span>
                            <span x-show="sending">Sending...</span>
                        </button>
                    </form>
                </div>

                <div x-show="sent" class="py-8 text-center">
                    <div class="mx-auto grid h-16 w-16 place-items-center rounded-full bg-green-100 text-green-600">
                        <x-icon name="check" class="h-8 w-8" />
                    </div>
                    <h3 class="mt-4 font-display text-xl font-bold text-brand-900">Message sent.</h3>
                    <p class="mt-2 text-sm text-slate-600"><span x-text="employee.first_name"></span> will be in touch soon.</p>
                    <button @click="close" class="mt-6 inline-flex items-center justify-center rounded-full bg-brand-700 px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-800">Close</button>
                </div>
            </div>
        </div>
    </section>

@endsection
