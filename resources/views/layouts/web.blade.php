<!doctype html>
<html lang="en">

<head>
    {{-- Basic Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Clear Men Bangladesh">

    {{-- Dynamic SEO Meta --}}
    <title>@yield('title', 'Clear Men Guinness World Records (Official Attempts)')</title>
    <meta name="description"
        content="@yield('meta_description', 'Join Clear Men’s official Guinness World Record attempts. Register now, watch ATTEMPTS, and be part of history.')">
    <meta name="keywords"
        content="@yield('meta_keywords', 'Clear Men, Guinness World Records, record attempts, Bangladesh, registration, official event, world record, CLEARMENGWR, clearmen guinnesse world records official attempts')">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', 'Clear Men Guinness World Records official Attempts')">
    <meta property="og:description"
        content="@yield('og_description', 'Be part of Clear Men’s Guinness World Record attempts — register now to witness and join history in the making.')">
    <meta property="og:image"
        content="@yield('og_image', asset('http://127.0.0.1:8000/assets/images/logo.png'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Clear Men Guinness World Records">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Clear Men Guinness World Records')">
    <meta name="twitter:description"
        content="@yield('twitter_description', 'Join the official Clear Men Guinness World Record attempts. Register to take part!')">
    <meta name="twitter:image"
        content="@yield('twitter_image', asset('http://127.0.0.1:8000/assets/images/logo.png'))">
    <meta name="twitter:site" content="@clearmenbd">

    {{-- Favicon & App Icons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">
    <meta name="theme-color" content="#0d6efd">
    <meta name="msapplication-TileColor" content="#0d6efd">

    {{-- Structured Data JSON-LD --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Clear Men Guinness World Records (OFFICIAL ATTEMPTS)",
      "url": "https://www.clearmengwr.com/",
      "logo": "https://clearmengwr.com/assets/images/logo.png",
      "sameAs": [
        "https://www.facebook.com/clearmen.bd?rdid=P70b1xrkepaNtilQ&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17phjBhsR7%2F#",
        "https://www.tiktok.com/discover/clear-men?lang=en",
        "https://www.instagram.com/accounts/login/?next=%2Fclearmen_bd%2F&source=omni_redirect"
      ]
    }
    </script>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/templatemo-kind-heart-charity.css') }}" rel="stylesheet">

    {{-- Extra Styles --}}
    @stack('styles')
</head>

<body id="section_1">

    {{-- Header --}}
    @include('include.web.header')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('include.web.footer')

    {{-- JavaScript Files --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/click-scroll.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    <!-- jQuery (for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables CSS & JS -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    {{-- Extra Scripts --}}
    @yield('custom_js')
</body>

</html>