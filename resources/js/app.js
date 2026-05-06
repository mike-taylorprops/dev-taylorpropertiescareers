import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import focus from '@alpinejs/focus';
import { CountUp } from 'countup.js';
import Splide from '@splidejs/splide';

import { calculator } from './calculator.js';

Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.plugin(focus);

Alpine.data('calculator', calculator);

Alpine.data('counter', (target, options = {}) => ({
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
}));

Alpine.data('reveal', () => ({
    init() {
        this.$el.classList.add('reveal');
    },
    show() {
        this.$el.classList.add('is-visible');
    },
}));

if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}

Alpine.data('nav', () => ({
    scrolled: false,
    open: false,
    init() {
        this.onScroll();
        window.addEventListener('scroll', () => this.onScroll(), { passive: true });
    },
    onScroll() {
        this.scrolled = window.scrollY > 120;
    },
    toggle() {
        this.open = !this.open;
        document.body.style.overflow = this.open ? 'hidden' : '';
    },
    close() {
        this.open = false;
        document.body.style.overflow = '';
    },
}));

Alpine.data('flipCard', () => ({
    flipped: false,
    flip() {
        this.flipped = !this.flipped;
    },
}));

Alpine.data('tabs', (initial = 0) => ({
    active: initial,
    is(i) {
        return this.active === i;
    },
    set(i) {
        this.active = i;
    },
}));

Alpine.data('faq', () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
}));

Alpine.data('splide', (options = {}) => ({
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
}));

Alpine.data('mouseGradient', () => ({
    init() {
        this.$el.addEventListener('mousemove', (e) => {
            const rect = this.$el.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            this.$el.style.setProperty('--mx', `${x}%`);
            this.$el.style.setProperty('--my', `${y}%`);
        });
    },
}));

window.Alpine = Alpine;
Alpine.start();
