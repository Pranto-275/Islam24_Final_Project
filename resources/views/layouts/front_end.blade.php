<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} </title>
        <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
        <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
        <meta name="author" content="Magentech">
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('venam/') }}/img/favicon.png">
		<!-- CSS here -->
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/jquery-ui.min.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/odometer.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/aos.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/slick.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/default.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/style.css">
        <link rel="stylesheet" href="{{ URL::asset('venam/') }}/css/responsive.css">

        <style>
            @media only screen and (max-width: 768px) {
               #scrollTop, #headerTop{
                  display: none;
               }
               #desktopFooter{
                  display: none;
               }
            }
            .super-deal-thumb span.sd-meta,
.exclusive-item-thumb .sd-meta,
.exclusive-item-thumb .discount,
.list-product-tag {
	position: absolute;
	left: 0;
	top: 0;
	height: 21px;
	background: #ff6000;
	color: #fff;
	font-size: 12px;

	line-height: 21px;
	padding: 0 8px;
	border-radius: 3px;
	font-weight: 500;
	text-transform: capitalize;
	z-index: 1;
}
.exclusive-item-thumb .discount {
	top: 3px;
	left: 3px;
	background: #f7ba01;
}
.exclusive-item-thumb .sd-meta {
    top: 3px;
    right: 3px;
    left: auto;
}
.buy-now{
                border: 2px solid black;
                background-color: white;
                color: black;
                padding: 7px 22px;
                font-size: 16px;
                border-radius: 25px;
                cursor: pointer;
            }
            .buy-now-button:hover{
                background: black;
                color: white;
                font-weight: bold;
            }
            .topCategoryImage{
                width:150px;
                height:177px;
            }

            @media only screen and (min-width: 768px) {
                .slider-image{
                    height: 470px;background-repeat: no-repeat;background-size: cover;
                }
                #paymentCard{
                    height: 100px;
                }
                .cartModal1{
                    display: none;
                }
            }
            @media only screen and (max-width: 768px) {
                .slider-image{
                    height: 200px;background-repeat: no-repeat;background-size: cover;
                }
                .topCategoryImage{
                    height:80px;
                    /* width: 20px; */
                }
                #categoryName{
                    font-size: 12px;
                }
                .cartModal{
                    display: none;
                }
            }
            /* .footer-area{
                position:relative;
            } */

            .modal-dialog {
                position:absolute;
                /* top: 200px; */
                right: 0px;
                bottom: 0;
                left: 0;
                z-index: 10040;
            }
            .cart-button{
                background-color: #4CAF50; /* Green */
                border: none;
                color: rgb(12, 1, 1);
                padding: 8px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 12px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
            }
            .cart-button1{
                background-color: white;
                color: black;
                border: 2px solid #e7e7e7;
            }
            .cart-button1:hover {
                background-color: #555555;
                color:white;
            }
            .cart-button2{
                background-color: white;
                color: black;
                border: 2px solid #4CAF50;
            }
            .cart-button2:hover {
                background-color: #4CAF50;
                color: white;
            }
         </style>
    </head>
    <body>
        <!-- preloader  -->
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="P" class="letters-loading">
                            P
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="I" class="letters-loading">
                            I
                        </span>
                        <span data-text-preloader="K" class="letters-loading">
                            K
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="R" class="letters-loading">
                            R
                        </span>
                        <span data-text-preloader="I" class="letters-loading">
                            I
                        </span>
                    </div>
                </div>
                <div class="loader">
                    <div class="row">
                        <div class="col-3 loader-section section-left">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-left">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-right">
                            <div class="bg"></div>
                        </div>
                        <div class="col-3 loader-section section-right">
                            <div class="bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->


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

		<!-- JS here -->
        <script src="{{ URL::asset('venam/') }}/js/vendor/jquery-3.5.0.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/popper.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/isotope.pkgd.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/owl.carousel.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/jquery.odometer.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/jquery.countdown.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/jquery.appear.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/slick.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/ajax-form.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/wow.min.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/aos.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/plugins.js"></script>
        <script src="{{ URL::asset('venam/') }}/js/main.js"></script>

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
