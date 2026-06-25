<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#225a96">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Taylor Properties | Keep 100% of Your Commission')</title>
    <meta name="description" content="@yield('description', 'Taylor Properties pays you 100% commission for $99 a month with zero agent transaction fees. One of the largest independent brokerages on the east coast since 1985.')">

    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#225a96">

    <meta property="og:title" content="@yield('title', 'Taylor Properties Careers')">
    <meta property="og:description" content="@yield('description', 'Keep 100% of your commission. Pay $99 a month.')">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:type" content="website">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "RealEstateAgent",
            "name": "Taylor Properties",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('images/logo.png') }}",
            "telephone": "+1-800-590-0925",
            "address": {
                "@@type": "PostalAddress",
                "streetAddress": "175 Admiral Cochrane Dr., Suite 112",
                "addressLocality": "Annapolis",
                "addressRegion": "MD",
                "postalCode": "21401",
                "addressCountry": "US"
            },
            "areaServed": ["MD", "DC", "VA", "DE", "PA"],
            "foundingDate": "1985"
        }
    </script>

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    @stack('head')
</head>
<body class="nav-offset bg-white text-slate-800 antialiased">

    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:bg-brand-700 focus:text-white focus:px-4 focus:py-2 focus:rounded">Skip to content</a>

    <x-nav :transparent="$transparentNav ?? false" />

    <main id="main" class="min-h-screen">
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')
</body>
</html>
