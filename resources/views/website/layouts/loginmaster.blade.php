<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <!-- Swiper css -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Swiper js -->

    <!-- My javascript file -->

    <script defer src="../js/index.js"></script>
    <link rel="stylesheet" href="../styles/styles.css" />

    <!-- his stuff -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('/') }}">

    <?php $color = \App\AdminSetting::find(1)->color; ?>
    <?php $currency = \App\AdminSetting::find(1)->currency_symbol; ?>
    <?php $currency_name = \App\AdminSetting::find(1)->currency; ?>

    <meta name="main_color" content="{{ $color }}">
    <meta name="currency" content="{{ $currency }}">
    <meta name="currency_name" content="{{ $currency_name }}">

    <!-- Title -->
    <?php $app_name = \App\AdminSetting::find(1)->app_name; ?>
    <title>{{$app_name}}</title>

    <!-- Favicon -->
    <?php $favicon = \App\AdminSetting::find(1)->favicon; ?>
    <link href="{{asset('storage/images/app/'.$favicon)}}" rel="icon" type="image/png">

    <!-- Google Fonts -->

    <!-- Template CSS Files -->

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('includes/website/css/styles.css')}}">

</head>

<body>
    @include('website.layouts.newheader')
    @yield('website_content')

    <!-- end per-loader -->
    {{-- @include('website.layouts.header') --}}

    {{-- @yield('website_content') --}}

    <!-- @include('website.layouts.newfooter') -->


    <!-- start back-to-top -->


    {{-- @include('website.layouts.login')  --}}
    {{-- @include('website.layouts.forgotPassword')  --}}
    {{-- @include('website.layouts.register')  --}}
    {{-- @include('website.layouts.verify')  --}}
    {{-- @include('website.layouts.otp')  --}}

    <!-- Template JS Files -->


    <script src="{{ asset('includes/website/js/index.js') }}"></script>
</body>

</html>