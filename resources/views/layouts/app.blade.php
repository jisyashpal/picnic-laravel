<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', $meta_description ?? 'PICNIC Ice Creams offers delicious kulfi and ice creams made with 100% pure cow milk.')">

    <title>@yield('title', $page_title ?? config('app.name', 'PICNIC Ice Creams'))</title>
    <link rel="icon" type="image/png" href="{{ asset('public/assets/images/favicon.png') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/gliker" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/instagram-feed.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/video-feed.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/media.css') }}">

    @stack('styles')
</head>
<body>
    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="{{ asset('public/assets/js/slider.js') }}"></script>
    <script src="{{ asset('public/assets/js/index.js') }}"></script>
    <script src="{{ asset('public/assets/js/swiper-init.js') }}"></script>
    <script src="{{ asset('public/assets/js/video-swiper.js') }}"></script>
    @stack('scripts')
</body>
</html>
