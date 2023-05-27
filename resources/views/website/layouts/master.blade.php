<!DOCTYPE html>
<html @if(App::getLocale()=='ar' ) dir="rtl" lang="ar" @else lang="en" @endif>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('/') }}">

    <?php $color = \App\AdminSetting::find(1)->color; ?>
    <?php $currency = \App\AdminSetting::find(1)->currency_symbol; ?>
    <?php $currency_name = \App\AdminSetting::find(1)->currency; ?>
    <style>
    :root {
        --primary_color: <?php echo $color ?>;
        --primary_color_hover: <?php echo $color.'cc'?>;
    }
    </style>
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
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <!-- Template CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    @if(App::getLocale() == 'ar')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">

    @endif
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"
        integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css"
        integrity="sha512-GqP/pjlymwlPb6Vd7KmT5YbapvowpteRq9ffvufiXYZp0YpMTtR9tI6/v3U3hFi1N9MQmXum/yBfELxoY+S1Mw=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css"
        integrity="sha512-GQz6nApkdT7cWN1Cnj/DOAkyfzNOoq+txIhSEK1G4HTCbSHVGpsrvirptbAP60Nu7qbw0+XlAAPGUmLU2L5l4g=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
        integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css"
        integrity="sha512-649quy9en6dRSOUU+ljT78RxjPQHJK+Uu+EAV2/GXKHG5r7FWRKUfCs13OxOCsjNrBaqQZcgxfe5hhqnjttbfw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('includes/website/css/style.css')}}">
    @if(App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('includes/website/css/rtl.css')}}">
    @endif
</head>

<body>
    <!-- start per-loader -->
    <div class="loader-container">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- end per-loader -->
    @include('website.layouts.header')
    @yield('website_content')


    @include('website.layouts.footer')


    <!-- start back-to-top -->
    <div id="back-to-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>

    @include('website.layouts.login')
    @include('website.layouts.forgotPassword')
    @include('website.layouts.register')
    @include('website.layouts.verify')
    @include('website.layouts.otp')

    <!-- Template JS Files -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('includes/website/js/popper.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    @if(App::getLocale() == 'ar')
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js"
        integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous">
    </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"
        integrity="sha512-ZKNVEa7gi0Dz4Rq9jXcySgcPiK+5f01CqW+ZoKLLKr9VMXuCsw3RjWiv8ZpIOa0hxO79np7Ec8DDWALM0bDOaQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"
        integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script src="{{ asset('includes/website/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('includes/website/js/jquery-rating.js') }}"></script>
    <script src="{{ asset('includes/website/js/gmap-script.js') }}"></script>
    <script src="{{ asset('includes/website/js/main.js') }}"></script>
</body>

</html>