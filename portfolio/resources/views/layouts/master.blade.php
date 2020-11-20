<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta-description')">
    <title>@yield('title')</title>
    <link rel="preload" href="/assets/main/fonts/ubuntu-v15-latin_cyrillic-300.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/assets/main/fonts/ubuntu-v15-latin_cyrillic-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/assets/main/fonts/ubuntu-v15-latin_cyrillic-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/assets/main/fonts/ubuntu-v15-latin_cyrillic-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/assets/main/img/head/bg.jpg" as="image">
    <link rel="stylesheet" href="/assets/main/css/style.min.css"> 
    <link rel="shortcut icon" href="/assets/favicon.png" type="image/png">
</head>
<body data-locale="{{ $locale }}">
    <div class="page">
        @include('layouts.header')
        @yield('content')
    </div>
    @yield('modal')
    <script src="/assets/main/js/script.min.js"></script>
</body>
</html>