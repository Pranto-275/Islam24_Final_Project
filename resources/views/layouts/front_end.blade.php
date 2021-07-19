<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Basic page needs
    ============================================ -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SuperMarket') }}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}

    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('supermarke/') }}/ico/favicon-16x16.png"/>

    <!-- Libs CSS
    ============================================ -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

   <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('supermarke/') }}/css/bootstrap/css/bootstrap.min.css">
    <link href="{{ asset('supermarke/') }}/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/themecss/lib.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/js/minicolors/miniColors.css" rel="stylesheet">

    <!-- Theme CSS
    ============================================ -->
    <link href="{{ asset('supermarke/') }}/css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/themecss/so-categories.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/themecss/so-category-slider.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/themecss/so-newletter-popup.css" rel="stylesheet">

    <link href="{{ asset('supermarke/') }}/css/footer/footer1.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/header/header1.css" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('supermarke/') }}/css/theme.css" rel="stylesheet">
    <link href="{{ asset('supermarke/') }}/css/responsive.css" rel="stylesheet">

     <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
    <style type="text/css">
         body{font-family:'Poppins', sans-serif;}
    </style>
    @livewireStyles

    @livewireScripts

</head>

<body class="common-home res layout-1">

    <div id="wrapper" class="wrapper-fluid banners-effect-3">
        <!-- Header Container  -->
        @include('livewire.frontend.header')
        <!-- //Header Container  -->

        <!-- Main Container  -->
              {{$slot}}
        <!-- //Main Container -->

        <!-- Footer Container -->
        @include('livewire.frontend.footer')
        <!-- //end Footer Container -->
    </div>

<!-- End Color Scheme
============================================ -->

<!-- Include Libs & Plugins
============================================ -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/slick-slider/slick.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/themejs/libs.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/unveil/jquery.unveil.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/datetimepicker/moment.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/modernizr/modernizr-2.6.2.min.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/minicolors/jquery.miniColors.min.js"></script>

<!-- Theme files
============================================ -->

<script type="text/javascript" src="{{ asset('supermarke/') }}/js/themejs/application.js"></script>

<script type="text/javascript" src="{{ asset('supermarke/') }}/js/themejs/homepage.js"></script>

<script type="text/javascript" src="{{ asset('supermarke/') }}/js/themejs/toppanel.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/themejs/so_megamenu.js"></script>
<script type="text/javascript" src="{{ asset('supermarke/') }}/js/themejs/addtocart.js"></script>
<script type="text/javascript">
<!--
// Check if Cookie exists
    if($.cookie('display')){
        view = $.cookie('display');
    }else{
        view = 'grid';
    }
    if(view) display(view);
//-->
</script>
</body>
</html>
