<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="The Best Booking System For Salons & Spas. 
            Sign Up Free. Grow Your Salon And Save Time "
        />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

        <link
            rel="preload"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
            as="style"
            onload="this.onload=null;this.rel='stylesheet'"
        />
        <noscript>
            <link
                href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
                rel="stylesheet"
            />
        </noscript>

        <!-- Swiper css -->

        <!-- Swiper js -->

        <!-- My javascript file -->

        <script defer src="../js/index.js"></script>
        <link rel="stylesheet" href="../styles/styles.css" />
        <title>Meetendo</title>
    </head>
<body>
    @include('website.layouts.salonheader-1')
    @yield('website_content')

    <!-- end per-loader -->
    {{-- @include('website.layouts.header') --}}

    {{-- @yield('website_content') --}}

    @include('website.layouts.newfooter')


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