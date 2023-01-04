<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="meta_title" content="@yield('meta_title')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @vite(['/public/assets/css/owl.carousel.min.css','/public/assets/css/owl.theme.default.min.css','/public/assets/exzoom/exzoom/jquery.exzoom.css', 'resources/js/app.js', '/public/assets/css/custom.css', '/public/assets/css/swiper.css', '/public/assets/js/swiper.js', '/public/assets/js/customswiper.js', '/public/assets/css/bootstrap.min.css', '/public/assets/js/bootstrap.bundle.min.js', '/public/assets/js/jquery-3.6.2.min.js','/public/assets/exzoom/exzoom/jquery.exzoom.js','public/assets/js/owl.carousel.min.js'])
    @livewireStyles()
</head>

<body>
    <div id="app">
        @include('layouts.includes.frontend.navbar')
        <main>
            @yield('content')
        </main>
        @include('frontend.footer.index')
    </div>
    <!-- alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        window.addEventListener('status', event => {
            if (event.detail) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify(event.detail.text, event.detail.type, 5);
            }
        });
    </script>
    @yield('script')
    @livewireScripts()
    @stack('scripts')
</body>

</html>
