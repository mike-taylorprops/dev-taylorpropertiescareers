import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';
import { CountUp } from 'countup.js';
import Splide from '@splidejs/splide';
import { initVisitTracking } from './visit-tracking';

initVisitTracking();

import { calculator } from './calculator.js';

Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.plugin(focus);

window.calculator = calculator;

window.counter = function (target, options = {}) {
    return {
        started: false,
        init() {
            this._target = target;
            this._options = options;
        },
        start() {
            if (this.started) return;
            this.started = true;
            const opts = {
                duration: 2.2,
                separator: ',',
                decimalPlaces: this._options.decimals ?? 0,
                prefix: this._options.prefix ?? '',
                suffix: this._options.suffix ?? '',
                ...this._options,
            };
            const counter = new CountUp(this.$el, this._target, opts);
            if (!counter.error) counter.start();
        },
    };
};

window.reveal = function () {
    return {
        init() {
            this.$el.classList.add('reveal');
        },
        show() {
            this.$el.classList.add('is-visible');
        },
    };
};

if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}

window.nav = function () {
    return {
        scrolled: false,
        open: false,
        init() {
            this.onScroll();
            window.addEventListener('scroll', () => this.onScroll(), { passive: true });
        },
        onScroll() {
            this.scrolled = window.scrollY > 20;
        },
        toggle() {
            this.open = !this.open;
            document.body.style.overflow = this.open ? 'hidden' : '';
        },
        close() {
            this.open = false;
            document.body.style.overflow = '';
        },
    };
};

window.flipCard = function () {
    return {
        flipped: false,
        flip() {
            this.flipped = !this.flipped;
        },
    };
};

window.tabs = function (initial = 0) {
    return {
        active: initial,
        is(i) {
            return this.active === i;
        },
        set(i) {
            this.active = i;
        },
    };
};

window.faq = function () {
    return {
        open: false,
        toggle() {
            this.open = !this.open;
        },
    };
};

window.splide = function (options = {}) {
    return {
        init() {
            const defaults = {
                type: 'loop',
                perPage: 1,
                autoplay: true,
                interval: 6000,
                pauseOnHover: true,
                arrows: false,
                pagination: true,
                gap: '2rem',
            };
            new Splide(this.$el, { ...defaults, ...options }).mount();
        },
    };
};

window.mouseGradient = function () {
    return {
        init() {
            this.$el.addEventListener('mousemove', (e) => {
                const rect = this.$el.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                this.$el.style.setProperty('--mx', `${x}%`);
                this.$el.style.setProperty('--my', `${y}%`);
            });
        },
    };
};

const crmPost = async (url, data) => {
    const res = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        },
        body: JSON.stringify(data),
    });
    return res;
};

const cfToken = () => document.querySelector('[name="cf-turnstile-response"]')?.value || '';
const cfReset = () => { if (window.turnstile) window.turnstile.reset(); };

window.contactForm = function () {
    return {
        sending: false,
        form: { first_name: '', last_name: '', email: '', phone: '', message: '' },
        errors: {},
        success: false,
        async submit() {
            this.sending = true;
            this.errors = {};
            try {
                const res = await crmPost('/contact/submit', { ...this.form, cf_turnstile_token: cfToken() });
                if (res.status === 422) {
                    this.errors = (await res.json()).errors || {};
                    cfReset();
                } else if (res.ok) {
                    this.success = true;
                } else {
                    this.errors = { _: ['Something went wrong. Please try again.'] };
                    cfReset();
                }
            } catch {
                this.errors = { _: ['Something went wrong. Please try again.'] };
                cfReset();
            } finally {
                this.sending = false;
            }
        },
    };
};

window.commissionForm = function () {
    return {
        sending: false,
        form: { first_name: '', last_name: '', email: '', phone: '', message: '' },
        errors: {},
        success: false,
        async submit() {
            this.sending = true;
            this.errors = {};
            try {
                const res = await crmPost('/commission/submit', { ...this.form, cf_turnstile_token: cfToken() });
                if (res.status === 422) {
                    this.errors = (await res.json()).errors || {};
                    cfReset();
                } else if (res.ok) {
                    this.success = true;
                } else {
                    this.errors = { _: ['Something went wrong. Please try again.'] };
                    cfReset();
                }
            } catch {
                this.errors = { _: ['Something went wrong. Please try again.'] };
                cfReset();
            } finally {
                this.sending = false;
            }
        },
    };
};

window.joinForm = function () {
    return {
        sending: false,
        form: { first_name: '', last_name: '', email: '', phone: '', message: '', how_did_you_hear: '' },
        errors: {},
        success: false,
        async submit() {
            this.sending = true;
            this.errors = {};
            try {
                const res = await crmPost('/join/submit', { ...this.form, cf_turnstile_token: cfToken() });
                if (res.status === 422) {
                    this.errors = (await res.json()).errors || {};
                    cfReset();
                } else if (res.ok) {
                    this.success = true;
                } else {
                    this.errors = { _: ['Something went wrong. Please try again.'] };
                    cfReset();
                }
            } catch {
                this.errors = { _: ['Something went wrong. Please try again.'] };
                cfReset();
            } finally {
                this.sending = false;
            }
        },
    };
};

window.Alpine = Alpine;
Alpine.start();
