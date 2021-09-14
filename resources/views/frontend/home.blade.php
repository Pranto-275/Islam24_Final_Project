@extends('layouts.front_end')
@section('content')
<div>

    <x-slot name="title">
        Home
    </x-slot>
    <x-slot name="header">
        Home
    </x-slot>

    <div class="page-wrapper">

        <main class="main">
            <div class="intro-section">
                <div class="owl-carousel owl-theme owl-nav-inner owl-dot-inner row gutter-no cols-1 animation-slider"
                    data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'items': 1,
                    'autoplay': false,
                    'responsive': {
                        '1630': {
                            'nav': true,
                            'dots': false
                        }
                    }
                }">
                    @foreach ($sliderImages as $sliderImage)
                    <div class="banner banner-fixed intro-slide intro-slide1"
                        style="background-image: url(wolmart/assets/images/demos/demo2/slides/slide-1.jpg); background-color: #f1f0f0;">
                        <div class="container">
                            <figure class="slide-image floating-item slide-animate" data-animation-options="{
                                'name': 'fadeInDownShorter', 'duration': '1s'
                            }" data-options="{'relativeInput':true,'clipRelativeInput':true,'invertX':true,'invertY':true}"
                                data-child-depth="0.2">
                                <img src="{{ asset('storage/photo/'.$sliderImage->image) }}" alt="Ski" width="729"
                                    height="570" />
                            </figure>
                            <div class="banner-content text-right y-50 ml-auto">
                                <h5 class="banner-subtitle text-uppercase font-weight-bold mb-2 slide-animate"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter', 'duration': '1s'
                                }">Deals And Promotions</h5>
                                <h3 class="banner-title ls-25 mb-6 slide-animate" data-animation-options="{
                                    'name': 'fadeInUpShorter', 'duration': '1s'
                                }">Fashion <span class="text-primary">Skiwears</span> for the ardent Sports devotees
                                </h3>
                                <a href="shop-banner-sidebar.html"
                                    class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                                    data-animation-options="{
                                    'name': 'fadeInUpShorter', 'duration': '1s'
                                }">
                                    Shop Now<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            <!-- End of .banner-content -->
                        </div>
                        <!-- End of .container -->
                    </div>
                    @endforeach

                    <!-- End of .intro-slide1 -->
                </div>
            </div>
            <!-- End of .intro-section -->

            <div class="container">
                <div class="owl-carousel owl-theme row cols-md-4 cols-sm-3 cols-1 icon-box-wrapper appear-animate br-sm mt-6 mb-10 appear-animate"
                    data-owl-options="{
                    'nav': false,
                    'dots': false,
                    'loop': true,
                    'autoplay': true,
                    'autoplayTimeout': 4000,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 3
                        },
                        '1200': {
                            'items': 4
                        }
                    }
                }">
                    <div class="icon-box icon-box-side text-dark">
                        <span class="icon-box-icon icon-shipping">
                            <i class="w-icon-truck"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Free Shipping & Returns</h4>
                            <p class="text-default">For all orders over $99</p>
                        </div>
                    </div>
                    <div class="icon-box icon-box-side text-dark">
                        <span class="icon-box-icon icon-payment">
                            <i class="w-icon-bag"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Secure Payment</h4>
                            <p class="text-default">We ensure secure payment</p>
                        </div>
                    </div>
                    <div class="icon-box icon-box-side text-dark icon-box-money">
                        <span class="icon-box-icon icon-money">
                            <i class="w-icon-money"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Money Back Guarantee</h4>
                            <p class="text-default">Any back within 30 days</p>
                        </div>
                    </div>
                    <div class="icon-box icon-box-side text-dark icon-box-chat">
                        <span class="icon-box-icon icon-chat">
                            <i class="w-icon-chat"></i>
                        </span>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title">Customer Support</h4>
                            <p class="text-default">Call or email us 24/7</p>
                        </div>
                    </div>
                </div>
                <!-- End of Iocn Box Wrapper -->

                {{-- <div class="title-link-wrapper mb-3 appear-animate">
                    <h2 class="title title-deals mb-1">Deals Of The Day</h2>
                    <div class="product-countdown-container font-size-sm text-dark align-items-center">
                        <label>Offer Ends in: </label>
                        <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"
                            data-relative="true" data-compact="true">10days,00:00:00</div>
                    </div>
                    <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">More Products<i
                            class="w-icon-long-arrow-right"></i></a>
                </div> --}}
                <!-- End of .title-link-wrapper -->

                {{-- <div class="owl-carousel owl-theme row cols-lg-5 cols-md-4 cols-2 product-deals-wrapper appear-animate mb-7"
                    data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'items': 5,
                    'autoplay': false,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2,
                            'nav': false
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        }
                    }
                }">
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                        width="300" height="338">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Women's Comforter</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$45.62 - $58.28</ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-2.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                    <label class="product-label label-discount">-35%</label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">White Valise</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$40.00</ins><span class="old-price">$49.89</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-3-1.jpg" alt="Product"
                                        width="300" height="338">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-3-2.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Brown Leather Shoes</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(6 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$36.26 - $59.75</ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-4.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Portable Flashlight</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$10.00</ins><del class="old-price">$11.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-5.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">USB Charger</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$17.00</ins><del class="old-price">$20.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End of Product Deals Warpper -->

                <div class="row category-wrapper electronics-cosmetics appear-animate mb-7">
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-sm">
                            <figure>
                                <img src="wolmart/assets/images/demos/demo2/categories/1-1.jpg" alt="Category Banner"
                                    width="640" height="200" style="background-color: #25282D;" />
                            </figure>
                            <div class="banner-content y-50">
                                <h3 class="banner-title text-white ls-25 mb-0">Electronics</h3>
                                <div class="banner-price-info text-white font-weight-bold text-uppercase mb-1">Starting
                                    At
                                    <strong class="text-secondary">$125.00</strong>
                                </div>
                                <hr class="banner-divider bg-white" />
                                <a href="shop-banner-sidebar.html"
                                    class="btn btn-white btn-link btn-underline btn-icon-right">
                                    Shop Now<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-sm">
                            <figure>
                                <img src="wolmart/assets/images/demos/demo2/categories/1-2.jpg" alt="Category Banner"
                                    width="640" height="200" style="background-color: #eeedec;" />
                            </figure>
                            <div class="banner-content y-50">
                                <h3 class="banner-title ls-25 text-capitalize mb-0">Cosmetics Sets</h3>
                                <div class="banner-price-info font-weight-bold text-uppercase mb-1">Sale Up To
                                    <strong class="text-secondary">30% Off</strong>
                                </div>
                                <hr class="banner-divider bg-dark" />
                                <a href="shop-banner-sidebar.html"
                                    class="btn btn-dark btn-link btn-underline btn-icon-right">
                                    Shop Now<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Category Wrapper -->

                {{-- <h2 class="title mb-5 appear-animate">Top Weekly Vendors</h2> --}}
                {{-- <div class="owl-carousel owl-theme vendor-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1 mb-4 appear-animate"
                    data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '1200': {
                            'items': 4
                        }
                    }
                }"> --}}
                    {{-- <div class="vendor-widget vendor-widget-1">
                        <div class="vendor-products grid-type">
                            <div class="vendor-product lg-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-1.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-2.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-3.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <div class="vendor-details">
                            <figure class="vendor-logo">
                                <a href="vendor-dokan-store.html">
                                    <img src="wolmart/assets/images/demos/demo2/vendor-logo/1.jpg" alt="Vendor Logo"
                                        width="70" height="70">
                                </a>
                            </figure>
                            <div class="vendor-personal">
                                <h4 class="vendor-name">
                                    <a href="vendor-dokan-store.html">Vendor 1</a>
                                </h4>
                                <span class="vendor-product-count">(27 Products)</span>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End of Vendor Widget -->
                    {{-- <div class="vendor-widget vendor-widget-1">
                        <div class="vendor-products grid-type">
                            <div class="vendor-product lg-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-4.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-5.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-6.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <div class="vendor-details">
                            <figure class="vendor-logo">
                                <a href="vendor-dokan-store.html">
                                    <img src="wolmart/assets/images/demos/demo2/vendor-logo/2.jpg" alt="Vendor Logo"
                                        width="70" height="70">
                                </a>
                            </figure>
                            <div class="vendor-personal">
                                <h4 class="vendor-name">
                                    <a href="vendor-dokan-store.html">Vendor 2</a>
                                </h4>
                                <span class="vendor-product-count">(20 Products)</span>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End of Vendor Widget -->
                    {{-- <div class="vendor-widget vendor-widget-1">
                        <div class="vendor-products grid-type">
                            <div class="vendor-product lg-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-7.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-8.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-9.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <div class="vendor-details">
                            <figure class="vendor-logo">
                                <a href="vendor-dokan-store.html">
                                    <img src="wolmart/assets/images/demos/demo2/vendor-logo/3.jpg" alt="Vendor Logo"
                                        width="70" height="70">
                                </a>
                            </figure>
                            <div class="vendor-personal">
                                <h4 class="vendor-name">
                                    <a href="vendor-dokan-store.html">Vendor 3</a>
                                </h4>
                                <span class="vendor-product-count">(16 Products)</span>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End of Vendor Widget -->
                    {{-- <div class="vendor-widget vendor-widget-1">
                        <div class="vendor-products grid-type">
                            <div class="vendor-product lg-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-10.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-11.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                            <div class="vendor-product sm-item">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="wolmart/assets/images/demos/demo2/products/2-12.jpg"
                                            alt="Vendor Product" width="300" height="338">
                                    </a>
                                </figure>
                            </div>
                        </div>
                        <div class="vendor-details">
                            <figure class="vendor-logo">
                                <a href="vendor-dokan-store.html">
                                    <img src="wolmart/assets/images/demos/demo2/vendor-logo/4.jpg" alt="Vendor Logo"
                                        width="70" height="70">
                                </a>
                            </figure>
                            <div class="vendor-personal">
                                <h4 class="vendor-name">
                                    <a href="vendor-dokan-store.html">Vendor 4</a>
                                </h4>
                                <span class="vendor-product-count">(23 Products)</span>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End of Vendor Widget -->
                {{-- </div> --}}
                <!-- End of Vendor Wrapper -->
                <div class="tab tab-with-title tab-nav-boxed appear-animate">
                    <h2 class="title">Consumer Electronics</h2>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-2">Best Seller</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-3">Most Popular</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-4">View All</a>
                        </li>
                    </ul>
                </div>
                <!-- End of Tab Title-->
                <div class="tab-content appear-animate">
                    <div class="tab-pane active" id="tab-1">
                        <div class="row grid-type products">
                            <div class="product-wrap lg-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-1-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-1-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">-15%</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Magenetic Charge Box</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$79.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($newProducts as $newProduct)

                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{route('product-details',['id'=>$newProduct->id])}}">
                                            <img src="{{ asset('storage/photo/'.$newProduct->ProductImageFirst->image) }}"
                                                alt="Product" width="300" height="338">
                                            <img src="{{ asset('storage/photo/'.$newProduct->ProductImageLast->image) }}"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart add-to-card buy-now buy-now-button cartModal"
                                            data-product-id="{{ $newProduct->id }}"   title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a
                                                href="product-default.html">{{ $newProduct->name }}</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">{{$newProduct->special_price}}</ins><del
                                                class="old-price">{{$newProduct->regular_price}}</del>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row grid-type products">
                            <div class="product-wrap lg-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-2-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-2-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Gold Watch</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$164.47</ins><del class="old-price">$183.47</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($bestSellingProducts as $bestSellingProduct)
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="{{ asset('storage/photo/'.$bestSellingProduct->ProductImageFirst->image) }}"
                                                alt="Product" width="300" height="338">
                                            <img src="{{ asset('storage/photo/'.$bestSellingProduct->ProductImageLast->image) }}"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Charge &amp; Alarm
                                                Machine</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$39.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row grid-type products">
                            <div class="product-wrap lg-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-5-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-5-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Charge &amp; Alarm
                                                Machine</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$39.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-4-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-4-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Multi-colorful Music
                                                Player</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(6 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$24.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-1-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-1-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Magenetic Charge Box</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$79.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-3-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-3-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Drone Wireless</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$89.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-7-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-7-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Hight Quality Screen
                                                Tablet</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$173.84</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-6-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-6-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Mini Wireless
                                                Earphone</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$3.66</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-2-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-2-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Gold Watch</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$164.47</ins><del class="old-price">$183.47</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row grid-type products">
                            <div class="product-wrap lg-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-3-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-3-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Drone Wireless</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$89.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-2-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-2-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Gold Watch</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$164.47</ins><del class="old-price">$183.47</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-6-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-6-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Mini Wireless
                                                Earphone</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$3.66</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-5-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-5-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Charge &amp; Alarm
                                                Machine</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$39.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-4-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-4-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Multi-colorful Music
                                                Player</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(6 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$24.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-7-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-7-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Hight Quality Screen
                                                Tablet</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$173.84</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap sm-item">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-1-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/3-1-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Magenetic Charge Box</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$79.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Tab Content -->

                <div class="sale-banner banner br-sm appear-animate">
                    <div class="banner-content">
                        <h4
                            class="content-left banner-subtitle text-uppercase mb-8 mb-md-0 mr-0 mr-md-4 text-secondary ls-25">
                            <span class="text-dark font-weight-bold lh-1 ls-normal">Up
                                <br>To</span>70% Sale!</h4>
                        <div class="content-right">
                            <h3 class="banner-title text-uppercase font-weight-normal mb-4 mb-md-0 ls-25 text-white">
                                <span>Pay Only For
                                    <strong class="mr-10 pr-lg-10">Your Lovling Electronics</strong>
                                    Pay Only For
                                    <strong class="mr-10 pr-lg-10">Your Lovling Electronics</strong>
                                    Pay Only For
                                    <strong class="mr-10 pr-lg-10">Your Lovling Electronics</strong>
                                </span>
                            </h3>
                            <a href="#" class="btn btn-white btn-rounded">Shop Now
                                <i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End of Sale Banner -->

                <div class="banner-product-wrapper appear-animate row mb-8">
                    <div class="col-xl-5col col-md-4 mb-4">
                        <div class="categories h-100">
                            <h2 class="title text-left">Clothes &amp; Fashion Apparel</h2>
                            <ul class="list-style-none mb-4">
                                <li><a href="shop-banner-sidebar.html">Accessories</a></li>
                                <li><a href="shop-banner-sidebar.html">Bodyclothes</a></li>
                                <li><a href="shop-banner-sidebar.html">Dress &amp; Skirts</a></li>
                                <li><a href="shop-banner-sidebar.html">Jeans</a></li>
                                <li><a href="shop-banner-sidebar.html">Jumpers</a></li>
                                <li><a href="shop-banner-sidebar.html">Knitwears</a></li>
                                <li><a href="shop-banner-sidebar.html">Lounge &amp; Underwear</a></li>
                                <li><a href="shop-banner-sidebar.html">Shoes</a></li>
                                <li><a href="shop-banner-sidebar.html">T-shirts</a></li>
                            </ul>
                            <a href="shop-boxed-banner.html"
                                class="btn btn-dark btn-link btn-underline btn-icon-right font-weight-bolder text-capitalize ls-50">
                                Browse All<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-5col4 col-md-8 mb-4">
                        <div class="banner br-sm mb-4" style="background-image: url(wolmart/assets/images/demos/demo2/banners/1.jpg);
                            background-color: #EEF0EF;">
                            <div class="banner-content d-block d-lg-flex align-items-center">
                                <div class="content-left mr-auto">
                                    <h5
                                        class="banner-subtitle font-weight-normal text-capitalize texyt-dark ls-25 mb-0">
                                        Flash Sale <strong class="text-uppercase text-secondary">50% Off</strong>
                                    </h5>
                                    <h3 class="banner-title text-capitalize ls-25">Fashion Figure Skate Sale</h3>
                                    <p class="text-dark">Only until the end of this week.</p>
                                </div>
                                <a href="shop-banner-sidebar.html" class="content-left btn btn-dark btn btn-outline
                                    btn-rounded btn-icon-right mt-4 mt-lg-0">Shop Now<i
                                        class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- End of Banner -->
                        <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3" data-owl-options="{
                            'nav': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 2
                                },
                                '992': {
                                    'items': 3
                                },
                                '1200': {
                                    'items': 4
                                }
                            }
                        }">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/4-1-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/4-1-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">White Schoolbag</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$56.48</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/4-2-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/4-2-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Women's Comforter</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$35.99</ins><del class="old-price">$37.89</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/4-3.jpg" alt="Product"
                                                width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Blue Traingin Shoes</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(6 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$58.99</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/4-4.jpg" alt="Product"
                                                width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Beyond OTP Shirt</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$26.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End fo Carousel -->
                    </div>
                </div>
                <!-- End of Banner Product Wrapper -->

                <div class="row category-wrapper sports-fashion mb-8 appear-animate">
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-sm">
                            <figure>
                                <img src="wolmart/assets/images/demos/demo2/categories/2-1.jpg" alt="Category Banner"
                                    width="640" height="200" style="background-color: #EAEAEA;" />
                            </figure>
                            <div class="banner-content y-50 text-right">
                                <h5 class="banner-subtitle text-uppercase font-weight-bold">New Arrivals</h5>
                                <h3 class="banner-title text-capitalize ls-25">Sport Outfits</h3>
                                <hr class="banner-divider bg-dark ml-auto mb-3">
                                <div class="banner-price-info text-dark">
                                    From <span class="text-secondary font-weight-bolder ls-25">$150.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="banner banner-fixed br-sm">
                            <figure>
                                <img src="wolmart/assets/images/demos/demo2/categories/2-2.jpg" alt="Category Banner"
                                    width="640" height="200" style="background-color: #181411;" />
                            </figure>
                            <div class="banner-content y-50">
                                <h5 class="banner-subtitle text-uppercase font-weight-normal text-white">SmartWatches
                                </h5>
                                <h3 class="banner-title text-white ls-25">Sale up to 20% Off</h3>
                                <hr class="banner-divider bg-white">
                                <div class="banner-price-info text-white">
                                    Starting at <span class="text-secondary font-weight-bolder ls-25">$270.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Category Wrapper -->

                <div class="banner-product-wrapper appear-animate row mb-8">
                    <div class="col-xl-5col col-md-4 mb-4">
                        <div class="categories h-100">
                            <h2 class="title text-left">Computers &amp; Technologies</h2>
                            <ul class="list-style-none mb-4">
                                <li><a href="shop-banner-sidebar.html">Desktop PC</a></li>
                                <li><a href="shop-banner-sidebar.html">Headphones</a></li>
                                <li><a href="shop-banner-sidebar.html">Laptops</a></li>
                                <li><a href="shop-banner-sidebar.html">Monitors</a></li>
                                <li><a href="shop-banner-sidebar.html">Smartphones</a></li>
                                <li><a href="shop-banner-sidebar.html">Speakers</a></li>
                                <li><a href="shop-banner-sidebar.html">Storage &amp; Memory</a></li>
                                <li><a href="shop-banner-sidebar.html">Tablets</a></li>
                                <li><a href="shop-banner-sidebar.html">Watches</a></li>
                            </ul>
                            <a href="shop-boxed-banner.html"
                                class="btn btn-dark btn-link btn-underline btn-icon-right font-weight-bolder text-capitalize ls-50">
                                Browse All<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-5col4 col-md-8 mb-4">
                        <div class="banner br-sm mb-4 pt-9" style="background-image: url(wolmart/assets/images/demos/demo2/banners/2.jpg);
                            background-color: #E0E1E5;">
                            <div class="banner-content">
                                <h5 class="banner-subtitle font-weight-normal text-capitalize texyt-dark ls-25 mb-0">
                                    From Onlin Store
                                </h5>
                                <h3 class="banner-title text-capitalize ls-25 mb-4">
                                    Xbox One's <span class="text-primary">Limited</span> Edition
                                </h3>
                                <a href="shop-boxed-banner.html"
                                    class="btn btn-dark btn-link btn-underline btn-icon-right">
                                    View Detail<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- End of Banner -->
                        <div class="owl-carousel owl-theme row cols-xl-4 cols-lg-3" data-owl-options="{
                            'nav': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 2
                                },
                                '992': {
                                    'items': 3
                                },
                                '1200': {
                                    'items': 4
                                }
                            }
                        }">
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/5-1-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/5-1-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Bluetooth Music
                                                Recorder</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$28.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/5-2.jpg" alt="Product"
                                                width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Magenetic Charge Box</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 80%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$79.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/5-3-1.jpg"
                                                alt="Product" width="300" height="338">
                                            <img src="wolmart/assets/images/demos/demo2/products/5-3-2.jpg"
                                                alt="Product" width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                        <div class="product-label-group">
                                            <label class="product-label label-new">New</label>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Soft Sound Marker</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(5 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$27.00</ins><del class="old-price">$35.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="product-default.html">
                                            <img src="wolmart/assets/images/demos/demo2/products/5-4.jpg" alt="Product"
                                                width="300" height="338">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                            <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                                title="Quickview"></a>
                                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                                title="Add to Compare"></a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="product-default.html">Men's Black Watch</a>
                                        </h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(9 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">$50.00</ins><del class="old-price">$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End fo Carousel -->
                    </div>
                </div>
                <!-- End of Banner Product Wrapper -->

                <div class="banner br-sm banner-electronics appear-animate" style="background-image: url(wolmart/assets/images/demos/demo2/banners/3.jpg);
                    background-color: #333;">
                    <div class="banner-content mr-10 pr-1">
                        <div class="banner-price-info text-white font-weight-normal ls-25">
                            Save Big on <span class="font-weight-bolder text-secondary text-uppercase">50% Off</span>
                        </div>
                        <h3 class="banner-title text-white mb-0 ls-25">Cameras and Leans Sale</h3>
                    </div>
                    <a href="shop-banner-sidebar.html" class="btn btn-white btn-rounded btn-icon-right mt-1">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
                <!-- End of Banner -->

                <div class="title-link-wrapper mb-2 appear-animate">
                    <h2 class="title">Top Rated Products</h2>
                    <a href="shop-boxed-banner.html" class="font-weight-bold ls-25">More Products<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>

                <div class="owl-carousel owl-theme top-products row cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-6 appear-animate"
                    data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        }
                    }
                }">
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/4-1-1.jpg" alt="Product"
                                        width="300" height="338">
                                    <img src="wolmart/assets/images/demos/demo2/products/4-1-2.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-label-group">
                                    <label class="product-label label-discount">-15%</label>
                                </div>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                                <div class="product-countdown-container">
                                    <div class="product-countdown countdown-compact" data-until="2021, 9, 9"
                                        data-format="DHMS" data-compact="false"
                                        data-labels-short="Days, Hours, Mins, Secs">
                                        00:00:00:00</div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">White Schoolbag</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$56.48</ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-1-1.jpg" alt="Product"
                                        width="300" height="338">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-1-2.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Women's Comforter</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$45.62 - $58.28</ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/3-2-1.jpg" alt="Product"
                                        width="300" height="338">
                                    <img src="wolmart/assets/images/demos/demo2/products/3-2-2.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Gold Watch</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(3 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$164.47</ins><del class="old-price">$183.47</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/1-4.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                                <div class="product-label-group">
                                    <label class="product-label label-new">New</label>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Portable Flashlight</a></h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$10.00</ins><del class="old-price">$11.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/6-1.jpg" alt="Product"
                                        width="300" height="338">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Fashionable Original Coat</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-default.html" class="rating-reviews">(8 Reviews)</a>
                                </div>
                                <div class="product-price">
                                    <ins class="new-price">$54.00 - $59.88</ins>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Owl Carousel -->

                <h2 class="title text-left text-capitalize mb-5 appear-animate">Your Recent Views</h2>
                <div class="owl-carousel owl-theme appear-animate viewed-products row cols-xl-8 cols-lg-6 cols-md-4 cols-2 mb-7"
                    data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 5
                        },
                        '992': {
                            'items': 6
                        },
                        '1200': {
                            'items': 8,
                            'dots': true
                        }
                    }
                }">
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/3-5-1.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Charge &amp; Alarm Machine</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/4-2-1.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Women's Comforter</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/3-2-1.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Gold Watch</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/3-6-1.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Mini Wireless Earphone</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/4-1-1.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">White Schoolbag</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/3-7-1.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">High Quality Screen Tablet</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/4-4.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Beyond OTP Shirt</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                    <div class="product-wrap">
                        <div class="product text-center product-absolute">
                            <figure class="product-media">
                                <a href="product-defaproduct-default.html">
                                    <img src="wolmart/assets/images/demos/demo2/products/4-3.jpg" alt="Category image"
                                        width="300" height="338" style="background-color: #fff" />
                                </a>
                            </figure>
                            <h4 class="product-name">
                                <a href="product-default.html">Blue Training Shoes</a>
                            </h4>
                        </div>
                    </div>
                    <!-- End of Product Wrap -->
                </div>
                <!-- End of Owl Carousel -->

                <h2 class="title text-left mb-5 appear-animate">Our Clients</h2>
                <div class="owl-carousel owl-theme row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2 brands-wrapper br-sm mb-10 appear-animate"
                    data-owl-options="{
                    'nav': false,
                    'dots': false,
                    'autoplay': true,
                    'autoplayTimeout': 4000,
                    'loop': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 6
                        },
                        '1200': {
                            'items': 8
                        }
                    }
                }">
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/1.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/2.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/3.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/4.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/5.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/6.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/7.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                    <figure>
                        <img src="wolmart/assets/images/demos/demo2/brands/8.png" alt="Brand" width="290"
                            height="100" />
                    </figure>
                </div>
                <!-- End of Brands Wrapper -->

                <h2 class="title text-left mb-5 pt-1 appear-animate">From Our Blog</h2>
                <div class="owl-carousel owl-theme post-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1 mb-10 mb-lg-5 appear-animate"
                    data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        }
                    }
                }">
                    <div class="post">
                        <figure class="post-media br-sm">
                            <a href="post-single.html">
                                <img src="wolmart/assets/images/demos/demo2/blog/1.jpg" alt="Post" width="620"
                                    height="398" style="background-color: #898078;">
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">05</span>
                                <span class="post-month">Mar</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">We want to be different, and Fashion gives
                                    me that outlet to do</a></h4>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet conse ctetur adip.</p>
                            </div>
                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="post">
                        <figure class="post-media br-sm">
                            <a href="post-single.html">
                                <img src="wolmart/assets/images/demos/demo2/blog/2.jpg" alt="Post" width="620"
                                    height="398" style="background-color: #EDEFEE;">
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">14</span>
                                <span class="post-month">Mar</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">Explore Fashion For Women In</a></h4>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet conse ctetur adip
                                    isic ing elit, sed do eiusmod.</p>
                            </div>
                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="post">
                        <figure class="post-media br-sm">
                            <a href="post-single.html">
                                <img src="wolmart/assets/images/demos/demo2/blog/3.jpg" alt="Post" width="620"
                                    height="398" style="background-color: #A1A09E;">
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">25</span>
                                <span class="post-month">Mar</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">Fashion tells about who you are from
                                    external point of view</a></h4>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet conse ctetur adip.</p>
                            </div>
                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="post">
                        <figure class="post-media br-sm">
                            <a href="post-single.html">
                                <img src="wolmart/assets/images/demos/demo2/blog/4.jpg" alt="Post" width="620"
                                    height="398" style="background-color: #EDF1F2;">
                            </a>
                            <div class="post-calendar">
                                <span class="post-day">16</span>
                                <span class="post-month">Mar</span>
                            </div>
                        </figure>
                        <div class="post-details">
                            <h4 class="post-title"><a href="post-single.html">Just found the ultimate denim dresses</a>
                            </h4>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet conse ctetur adip
                                    isic ing elit, sed do eiusmod.</p>
                            </div>
                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline">Read More<i
                                    class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Container -->
        </main>
        <!-- End of Main -->
    </div>
    <!-- End of .page-wrapper -->

    <!-- Start of Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="demo2.html" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="shop-banner-sidebar.html" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="my-account.html" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="cart.html" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Beige knitted elas<br>tic
                                    runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="wolmart/assets/images/cart/product-1.jpg" alt="product" height="84"
                                    width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Blue utility pina<br>fore
                                    denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="wolmart/assets/images/cart/product-2.jpg" alt="product" width="84"
                                    height="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="cart-total">
                    <label>Subtotal:</label>
                    <span class="price">$58.67</span>
                </div>

                <div class="cart-action">
                    <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay"></div>
        <!-- End of .mobile-menu-overlay -->

        <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
        <!-- End of .mobile-menu-close -->

        <div class="mobile-menu-container scrollable">
            <form action="#" method="get" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#main-menu" class="nav-link active">Main Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#categories" class="nav-link">Categories</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="main-menu">
                    <ul class="mobile-menu">
                        <li><a href="demo2.html">Home</a></li>
                        <li>
                            <a href="shop-banner-sidebar.html">Shop</a>
                            <ul>
                                <li>
                                    <a href="#">Shop Pages</a>
                                    <ul>
                                        <li><a href="shop-banner-sidebar.html">Banner With Sidebar</a></li>
                                        <li><a href="shop-boxed-banner.html">Boxed Banner</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Full Width Banner</a></li>
                                        <li><a href="shop-horizontal-filter.html">Horizontal Filter<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="shop-off-canvas.html">Off Canvas Sidebar<span
                                                    class="tip tip-new">New</span></a></li>
                                        <li><a href="shop-infinite-scroll.html">Infinite Ajax Scroll</a></li>
                                        <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="shop-both-sidebar.html">Both Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Shop Layouts</a>
                                    <ul>
                                        <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>
                                        <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>
                                        <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>
                                        <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>
                                        <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>
                                        <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>
                                        <li><a href="shop-list.html">List Mode</a></li>
                                        <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Pages</a>
                                    <ul>
                                        <li><a href="product-variable.html">Variable Product</a></li>
                                        <li><a href="product-featured.html">Featured &amp; Sale</a></li>
                                        <li><a href="product-accordion.html">Data In Accordion</a></li>
                                        <li><a href="product-section.html">Data In Sections</a></li>
                                        <li><a href="product-swatch.html">Image Swatch</a></li>
                                        <li><a href="product-extended.html">Extended Info</a>
                                        </li>
                                        <li><a href="product-without-sidebar.html">Without Sidebar</a></li>
                                        <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span
                                                    class="tip tip-new">New</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Product Layouts</a>
                                    <ul>
                                        <li><a href="product-default.html">Default<span
                                                    class="tip tip-hot">Hot</span></a></li>
                                        <li><a href="product-vertical.html">Vertical Thumbs</a></li>
                                        <li><a href="product-grid.html">Grid Images</a></li>
                                        <li><a href="product-masonry.html">Masonry</a></li>
                                        <li><a href="product-gallery.html">Gallery</a></li>
                                        <li><a href="product-sticky-info.html">Sticky Info</a></li>
                                        <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>
                                        <li><a href="product-sticky-both.html">Sticky Both</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="vendor-dokan-store.html">Vendor</a>
                            <ul>
                                <li>
                                    <a href="#">Store Listing</a>
                                    <ul>
                                        <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                        <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                        <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                        <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Vendor Store</a>
                                    <ul>
                                        <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                        <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a></li>
                                        <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a></li>
                                        <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog.html">Classic</a></li>
                                <li><a href="blog-listing.html">Listing</a></li>
                                <li>
                                    <a href="blog-grid.html">Grid</a>
                                    <ul>
                                        <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                        <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                        <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                        <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Masonry</a>
                                    <ul>
                                        <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                        <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                        <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                        <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mask</a>
                                    <ul>
                                        <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                        <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="post-single.html">Single Post</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="about-us.html">Pages</a>
                            <ul>

                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="become-a-vendor.html">Become A Vendor</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                                <li><a href="error-404.html">Error 404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="elements.html">Elements</a>
                            <ul>
                                <li><a href="element-products.html">Products</a></li>
                                <li><a href="element-titles.html">Titles</a></li>
                                <li><a href="element-typography.html">Typography</a></li>
                                <li><a href="element-categories.html">Product Category</a></li>
                                <li><a href="element-buttons.html">Buttons</a></li>
                                <li><a href="element-accordions.html">Accordions</a></li>
                                <li><a href="element-alerts.html">Alert &amp; Notification</a></li>
                                <li><a href="element-tabs.html">Tabs</a></li>
                                <li><a href="element-testimonials.html">Testimonials</a></li>
                                <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                <li><a href="element-instagrams.html">Instagrams</a></li>
                                <li><a href="element-cta.html">Call to Action</a></li>
                                <li><a href="element-vendors.html">Vendors</a></li>
                                <li><a href="element-icon-boxes.html">Icon Boxes</a></li>
                                <li><a href="element-icons.html">Icons</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="categories">
                    <ul class="mobile-menu">
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-tshirt2"></i>Fashion
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Women</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                Watches</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Sale</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Men</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Jewlery &
                                                Watches</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-home"></i>Home & Garden
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Bedroom</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                                Bases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                                Headboards</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Living Room</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                                Beds</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Cabinets &
                                                Chests</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Office</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Breakroom
                                                Tables</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Kitchen & Dining</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                                Cabinets</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Dining Room
                                                Tables</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-electronics"></i>Electronics
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Laptops &amp; Computers</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Desktop
                                                Computers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                                Storage</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Computer
                                                Accessories</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">TV &amp; Video</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Home Audio
                                                Speakers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Media Streaming
                                                Devices</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Digital Cameras</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Digital SLR
                                                Cameras</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Sports & Action
                                                Cameras</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Digital Memory
                                                Cards</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Cell Phones</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                                Cases</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Cellphone
                                                Chargers</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-furniture"></i>Furniture
                            </a>
                            <ul>
                                <li>
                                    <a href="#">Furniture</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="#">Lighting</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Bathroom
                                                Lighting</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="#">Home Accessories</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Decorative
                                                Accessories</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Candals &
                                                Holders</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="#">Garden & Outdoors</a>
                                    <ul>
                                        <li><a href="shop-fullwidth-banner.html">Garden
                                                Furniture</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                        </li>
                                        <li><a href="shop-fullwidth-banner.html">Pressure
                                                Washers</a></li>
                                        <li><a href="shop-fullwidth-banner.html">All Garden
                                                Tools</a></li>
                                        <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-heartbeat"></i>Healthy & Beauty
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-gift"></i>Gift Ideas
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-gamepad"></i>Toy & Games
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-ice-cream"></i>Cooking
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-ios"></i>Smart Phones
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-camera"></i>Cameras & Photo
                            </a>
                        </li>
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-ruby"></i>Accessories
                            </a>
                        </li>
                        <li>
                            <a href="shop-banner-sidebar.html"
                                class="font-weight-bold text-primary text-uppercase ls-25">
                                View All Categories<i class="w-icon-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Mobile Menu -->

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky mb-0">
                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                        <figure class="product-image">
                            <img src="wolmart/assets/images/products/popup/1-440x494.jpg"
                                data-zoom-image="wolmart/assets/images/products/popup/1-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="wolmart/assets/images/products/popup/2-440x494.jpg"
                                data-zoom-image="wolmart/assets/images/products/popup/2-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="wolmart/assets/images/products/popup/3-440x494.jpg"
                                data-zoom-image="wolmart/assets/images/products/popup/3-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                        <figure class="product-image">
                            <img src="wolmart/assets/images/products/popup/4-440x494.jpg"
                                data-zoom-image="wolmart/assets/images/products/popup/4-800x900.jpg"
                                alt="Water Boil Black Utensil" width="800" height="900">
                        </figure>
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                            <div class="product-thumb active">
                                <img src="wolmart/assets/images/products/popup/1-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="wolmart/assets/images/products/popup/2-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="wolmart/assets/images/products/popup/3-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                            <div class="product-thumb">
                                <img src="wolmart/assets/images/products/popup/4-103x116.jpg" alt="Product Thumb"
                                    width="103" height="116">
                            </div>
                        </div>
                        <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                        <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 class="product-title">Electronics Black Wrist Watch</h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="wolmart/assets/images/products/brand/brand-1.jpg" alt="Brand" width="102"
                                height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span class="product-category"><a href="#">Electronics</a></span>
                            </div>
                            <div class="product-sku">
                                SKU: <span>MS46891340</span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    <div class="product-price">$40.00</div>

                    <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div>

                    <div class="product-short-desc">
                        <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul>
                    </div>

                    <hr class="product-divider">

                    <div class="product-form product-variation-form product-color-swatch">
                        <label>Color:</label>
                        <div class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div>
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div class="flex-wrap d-flex align-items-center product-variations">
                            <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a>
                        </div>
                        <a href="#" class="product-variation-clean">Clean All</a>
                    </div>

                    <div class="product-variation-price">
                        <span></span>
                    </div>

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-cart">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>

                    <div class="social-links-wrapper">
                        <div class="social-links">
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                        <span class="divider d-xs-show"></span>
                        <div class="product-link-wrapper d-flex">
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                            <a href="#"
                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->


</div>
<style>
    /* .col-6 {
            margin-bottom: 50px !important;
        } */
</style>
@endsection
