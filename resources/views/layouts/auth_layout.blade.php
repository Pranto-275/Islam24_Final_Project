<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Islam24</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Islam 24">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->

    <!-- WebFont.js -->
    {{-- <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ URL::asset('wolmart/') }}/assets/js/webfont.js;
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script> --}}

    <link rel="preload" href="{{ URL::asset('wolmart/') }}/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ URL::asset('wolmart/') }}/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ URL::asset('wolmart/') }}/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ URL::asset('wolmart/') }}/assets/fonts/wolmart.ttf?png09e" as="font" type="font/ttf"
        crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('wolmart/') }}/assets/vendor/fontawesome-free/css/all.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('wolmart/') }}/assets/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('wolmart/') }}/assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ URL::asset('wolmart/') }}/assets/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('wolmart/') }}/assets/css/demo2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('wolmart/') }}/assets/css/style.min.css">
</head>

<body>



    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html" id="scrollTop">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('frontend.header')
    <!-- header-area-end -->

    <!-- main-area -->

    @yield('content')
    <!-- main-area-end -->

    <!-- footer-area -->
    @include('frontend.footer')
    <!-- footer-area-end -->

    <!-- Start Mobile Responseive Footer -->
    @include('frontend.mobile-responsive-footer')
    <!-- Start Mobile Responseive Footer -->
    <br>

    <!-- Plugin JS File -->
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ URL::asset('wolmart/') }}/assets/vendor/floating-parallax/parallax.min.js"></script>

    <!-- Main Js -->
    <script src="{{ URL::asset('wolmart/') }}/assets/js/main.min.js"></script>

    <script>
        $.ajaxSetup({
                crossDomain: true,
                xhrFields: {
                    withCredentials: true
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    </script>

</body>

</html>
