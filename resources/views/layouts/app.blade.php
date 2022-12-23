<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','/public/assets/css/custom.css','/public/assets/css/swiper.css', '/public/assets/js/swiper.js', '/public/assets/js/customswiper.js', '/public/assets/css/bootstrap.min.css', '/public/assets/js/bootstrap.bundle.min.js', '/public/assets/js/jquery-3.6.2.min.js'])
    @livewireStyles()
</head>
<body>
    <div id="app">
        @include('layouts.includes.frontend.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts()
</body>

</html>
