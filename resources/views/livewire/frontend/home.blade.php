@push('css')

@endpush
<div>
    <x-slot name="title">
        Home
    </x-slot>
    <x-slot name="header">
        Home
    </x-slot>
    <div class="main-container container">
        <div id="content">
            <div class="content-top-w">
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 main-left">
                    <div class="module col1 hidden-sm hidden-xs"></div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 main-right">
                    <div class="slider-container row">

                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 col2">
                            <div class="module sohomepage-slider ">
                                <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                    @foreach ($sliderImages as $sliderImage)
                                      <div class="yt-content-slide">
                                        <a href="#"><img src="{{ asset('storage/photo/'.$sliderImage->image) }}" alt="slider1" class="img-responsive" style="width:1090px;height:350px;"></a>
                                      </div>
                                    @endforeach
                                </div>

                                <div class="loadeding"></div>
                            </div>

                        </div>


                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col3">
                            <div class="module product-simple extra-layout1">
                                <h3 class="modtitle">
                                    <span>Best Selling</span>
                                </h3>
                                <div class="modcontent">
                                    <div id="so_extra_slider_1" class="so-extraslider" >
                                        <!-- Begin extraslider-inner -->
                                        <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                            <div class="item ">
                                                <div class="product-layout item-inner style1 ">
                                                    <div class="item-image">
                                                        <div class="item-img-info">
                                                            <a href="product.html" target="_self" title="Mandouille short ">
                                                                <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/1.jpg" alt="Mandouille short">
                                                                </a>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a href="product.html" target="_self" title="Mandouille short">Mandouille short </a>
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                        <div class="content_price price">
                                                            <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                            <span class="price-old">$76.00 </span>&nbsp;

                                                        </div>
                                                    </div>
                                                    <!-- End item-info -->
                                                    <!-- End item-wrap-inner -->
                                                </div>
                                                <!-- End item-wrap -->
                                            </div>
                                            <div class="item ">
                                                <div class="product-layout item-inner style1 ">
                                                    <div class="item-image">
                                                        <div class="item-img-info">
                                                            <a href="#" target="_self" title="Qeserunt shortloin ">
                                                            <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/5.jpg" alt="Qeserunt shortloin">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a href="#" target="_self" title="Qeserunt shortloin">
                                                    Qeserunt shortloin
                                                </a>
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                </span>
                                                            <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                </span>
                                                            <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                </span>
                                                            <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                </span>
                                                            <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                </span>
                                                        </div>
                                                        <div class="content_price price">
                                                            <span class="price product-price">
                                                        $88.00
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <!-- End item-info -->
                                                    <!-- End item-wrap-inner -->
                                                </div>
                                                <!-- End item-wrap -->
                                                <div class="product-layout item-inner style1 ">
                                                    <div class="item-image">
                                                        <div class="item-img-info">
                                                            <a href="#" target="_self" title="Consecte quichuck ">
                                                            <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/6.jpg" alt="Consecte quichuck">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a href="#" target="_self" title="Consecte quichuck">
                                                    Consecte quichuck
                                                </a>
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                            <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                            <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                            <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                            <span class="fa fa-stack">
                                                        <i class="fa fa-star fa-stack-2x"></i>
                                                    </span>
                                                        </div>
                                                        <div class="content_price price">
                                                            <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                            <span class="price-old">$61.00 </span>&nbsp;



                                                        </div>
                                                    </div>
                                                    <!-- End item-info -->
                                                    <!-- End item-wrap-inner -->
                                                </div>
                                                <!-- End item-wrap -->
                                                <div class="product-layout item-inner style1 ">
                                                    <div class="item-image">
                                                        <div class="item-img-info">
                                                            <a href="#" target="_self" title="Neatball bresaola ">
                                                        <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/7.jpg" alt="Neatball bresaola">
                                                        </a>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a href="#" target="_self" title="Neatball bresaola">
                                                    Neatball bresaola
                                                </a>
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                        </span>
                                                            <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                        </span>
                                                            <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                        </span>
                                                            <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                        </span>
                                                            <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                        </span>
                                                        </div>
                                                        <div class="content_price price">
                                                            <span class="price-new product-price">$65.00 </span>&nbsp;&nbsp;

                                                            <span class="price-old">$71.00 </span>&nbsp;



                                                        </div>
                                                    </div>
                                                    <!-- End item-info -->
                                                    <!-- End item-wrap-inner -->
                                                </div>
                                                <!-- End item-wrap -->
                                                <div class="product-layout item-inner style1 ">
                                                    <div class="item-image">
                                                        <div class="item-img-info">
                                                            <a href="#" target="_self" title="Yutculpa ullamco ">
                                                            <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/8.jpg" alt="Yutculpa ullamco">
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-title">
                                                            <a href="#" target="_self" title="Yutculpa ullamco">
                                                                Yutculpa ullamco
                                                            </a>
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-2x"></i>
                                                            </span>
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-2x"></i>
                                                            </span>
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-2x"></i>
                                                            </span>
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-2x"></i>
                                                            </span>
                                                            <span class="fa fa-stack">
                                                                <i class="fa fa-star fa-stack-2x"></i>
                                                            </span>
                                                        </div>
                                                        <div class="content_price price">
                                                            <span class="price-new product-price">$60.00 </span>&nbsp;&nbsp;

                                                            <span class="price-old">$77.00 </span>&nbsp;



                                                        </div>
                                                    </div>
                                                    <!-- End item-info -->
                                                    <!-- End item-wrap-inner -->
                                                </div>
                                                <!-- End item-wrap -->
                                            </div>
                                        </div>
                                        <!--End extraslider-inner -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row content-main-w">

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 main-left">

                    <div class="module">
                        <div class="banners banners2">
                            <div class="banner">
                                <a href="#"><img src="{{ asset('supermarke/') }}/image/catalog/banners/banner1.jpg" alt="image"></a>
                            </div>
                        </div>
                    </div>

                    <div class="module product-simple extra-layout1">
                        <h3 class="modtitle">
                            <span>Latest Products</span>
                        </h3>
                        <div class="modcontent">
                            <div id="so_extra_slider_1" class="so-extraslider" >
                                <!-- Begin extraslider-inner -->
                                <div class="yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                    <div class="item ">
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="product.html" target="_self" title="Mandouille short "><img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/5.jpg" alt="Mandouille short"></a>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="product.html" target="_self" title="Mandouille short">Mandouille short </a>
                                                </div>
                                                <div class="rating">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                </div>
                                                <div class="content_price price">
                                                    <span class="price-new product-price">$55.00 </span>&nbsp;&nbsp;

                                                    <span class="price-old">$76.00 </span>&nbsp;

                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        <!-- End item-wrap -->
                                    </div>
                                    <div class="item ">
                                        <div class="product-layout item-inner style1 ">
                                            <div class="item-image">
                                                <div class="item-img-info">
                                                    <a href="#" target="_self" title="Qeserunt shortloin ">
                                                    <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/80/1.jpg" alt="Qeserunt shortloin">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">
                                                    <a href="#" target="_self" title="Qeserunt shortloin">
                                            Qeserunt shortloin
                                        </a>
                                                </div>
                                                <div class="rating">
                                                    <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                        </span>
                                                    <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                        </span>
                                                    <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                        </span>
                                                    <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                        </span>
                                                    <span class="fa fa-stack">
                                            <i class="fa fa-star fa-stack-2x"></i>
                                        </span>
                                                </div>
                                                <div class="content_price price">
                                                    <span class="price product-price">
                                                $88.00
                                            </span>
                                                </div>
                                            </div>
                                            <!-- End item-info -->
                                            <!-- End item-wrap-inner -->
                                        </div>
                                        <!-- End item-wrap -->
                                    </div>
                                </div>
                                <!--End extraslider-inner -->
                            </div>
                        </div>
                    </div>

                    <div class="module">
                        <div class="policy-w">
                            <a href="#"><img src="{{ asset('supermarke/') }}/image/catalog/banners/call-us.jpg" alt="image"></a>
                            <ul class="block-infos">
                                <li class="info1">
                                    <div class="inner">
                                    <i class="fa fa-file-text-o"></i>
                                    <div class="info-cont">
                                    <a href="#">free delivery</a>
                                    <p>On order over $49.86</p>
                                    </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="module extra">
                        <h3 class="modtitle">
                            <span>Recommended</span>
                        </h3>
                        <div class="modcontent">
                            <div id="so_extra_slider_1" class="so-extraslider" >
                                <!-- Begin extraslider-inner -->
                                <div class="products-list yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="yes" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                    <div class="item">
                                        <div class="item-inner product-layout transition product-grid">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">

                                                    <div class="product-image-container second_img">
                                                        <a href="product.html" target="_self" title="Duis aute irure ">
                                                            <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/e10.jpg" class="img-1 img-responsive" alt="image1">
                                                            <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/e7.jpg" class="img-2 img-responsive" alt="image2">
                                                        </a>
                                                    </div>
                                                    <!--quickview-->
                                                    <div class="so-quickview">
                                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                    </div>
                                                    <!--end quickview-->


                                                </div>
                                                <div class="right-block">
                                                    <div class="button-group so-quickview cartinfo--left">
                                                        <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                            <span>Add to cart </span>
                                                        </button>
                                                        <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                        </button>
                                                        <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                        </button>

                                                    </div>
                                                    <div class="caption hide-cont">
                                                        <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        </div>
                                                        <h4><a href="product.html" title="Pastrami bacon" target="_self">Duis aute irure </a></h4>

                                                    </div>
                                                    <p class="price">
                                                        <span class="price-new">$48.00</span>

                                                    </p>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--End extraslider-inner -->
                            </div>
                        </div>
                    </div>

                    <div class="module so-latest-blog blog-sidebar">

                        <h3 class="modtitle"><span>Latest Posts</span></h3>
                        <div class="modcontent clearfix">

                            <div class="so-blog-external buttom-type1 button-type1">
                                <div class="blog-external-simple">
                                    <div class="cat-wrap">
                                        <div class="media">

                                            <div class="item item-1">
                                                <div class="media-left">
                                                    <a href="#" target="_self">
                                                    <img src="{{ asset('supermarke/') }}/image/catalog/blog/1.jpg" alt="Biten demons lector in henderit in vulp" class="media-object">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                    <a href="#" title="Biten demons lector in henderit in vulp" target="_self">Biten demons lector in henderit in vulp nemusa tumps</a>
                                                    </h4>
                                                    <div class="media-content">
                                                        <div class="media-date-added"><i class="fa fa-calendar"></i> December 4th, 2017</div>
                                                        <div class="media-subcontent">
                                                        <span class="media-comment"><i class="fa fa-comments"></i>0  Comment</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="cat-wrap">
                                        <div class="media">

                                            <div class="item item-2">
                                                <div class="media-left">
                                                    <a href="#" target="_self">
                                                        <img src="{{ asset('supermarke/') }}/image/catalog/blog/2.jpg" alt="Commodo laoreet semper tincidun sit" class="media-object">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                    <a href="#" title="Commodo laoreet semper tincidun sit" target="_self">Commodo laoreet semper tincidun sit dolor spums</a>
                                                    </h4>
                                                    <div class="media-content">
                                                        <div class="media-date-added"><i class="fa fa-calendar"></i> November 15th, 2017</div>
                                                        <div class="media-subcontent">
                                                            <span class="media-comment"><i class="fa fa-comments"></i>0  Comment</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="module testimonials">
                        <h3 class="modtitle"><span>Testimonials</span></h3>
                        <div class="slider-testimonials">
                            <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-hoverpause="yes">
                                <div class="item">
                                    <div class="img"><img src="{{ asset('supermarke/') }}/image/catalog/demo/client/user-1.jpg" alt="Image"></div>
                                    <div class="name">Johny Walker</div>
                                    <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore”</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="module">
                        <div class="banners banners5">
                            <div class="banner">
                                <a href="#"><img src="{{ asset('supermarke/') }}/image/catalog/banners/banner2.jpg" alt="image"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 main-right">


                    <div class="static-cates">
                        <ul>
                            @foreach ($topCategories as $topCategory)

                            <li>
                                <a href="{{route('category_wise_product',['id'=>$topCategory->id])}}"><img src="{{ asset('storage/photo/'.$topCategory->image) }}" alt="image" style="height:120px;"></a>
                            </li>

                            @endforeach
                        </ul>
                    </div>

                    <!-- Deals -->
                    <div class="module deals-layout1">
                        <div class="head-title">
                            <div class="modtitle">
                                <span>Flash Sale</span>
                                <div class="cslider-item-timer">
                                    <div class="product_time_maxprice">

                                    <div class="item-time">
                                        <div class="item-timer">
                                        <div class="defaultCountdown-30"></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                    <a class="viewall" href="?route=product/special">View All</a>

                            </div>
                        </div>
                        <div class="modcontent">
                            <div id="so_deal_1" class="so-deal style1">
                                <div class="extraslider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="6" data-items_column0="5" data-items_column1="3" data-items_column2="2"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                @foreach ($products as $product)
                                    <div class="item">
                                        <div class="item-inner product-layout transition product-grid">
                                            <div class="product-item-container">
                                                <div class="left-block left-b">
                                                    <div class="box-label">
                                                        <span class="label-product label-sale">-11%</span>
                                                    </div>
                                                    <div class="product-image-container second_img">
                                                        <a href="{{route('product_view',['id'=>$product->id])}}" target="_self" title="Pastrami bacon">
                                                            @foreach ($product->ProductImage as $productImage)
                                                               <img src="{{ asset('storage/photo/'.$productImage->image) }}" class="img-1 img-responsive" alt="image1">
                                                            @endforeach
                                                        </a>
                                                    </div>
                                                    <!--quickview-->
                                                    <div class="so-quickview">
                                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                    </div>
                                                    <!--end quickview-->


                                                </div>
                                                <div class="right-block">
                                                    <div class="button-group so-quickview cartinfo--left">
                                                        <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                            <span>Add to cart </span>
                                                        </button>
                                                        <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                        </button>
                                                        <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                        </button>

                                                    </div>
                                                    <div class="caption hide-cont">
                                                        <div class="ratings">
                                                            <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                            </div>
                                                            <span class="rating-num">( 2 )</span>
                                                        </div>
                                                        <h4><a href="product.html" title="Pastrami bacon" target="_self">{{ $product->name  }}</a></h4>

                                                    </div>
                                                    <p class="price">
                                                        <span class="price-new">{{ $product->sale_price  }}</span>
                                                    </p>
                                                </div>

                                                <div class="item-available">
                                                    <div class="available">
                                                        <span class="color_width" data-title="77%" data-toggle='tooltip' style="width: 77%"></span>
                                                    </div>
                                                    <p class="a2">Sold: <b>51</b>  </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                </div>
                            </div>
                            </div>
                    </div>
                    <!-- End Deals -->

                    <!-- Banners -->
                    <div class="banners3 banners">
                        <div class="item1">
                            <a href="#"><img src="{{ asset('supermarke/') }}/image/catalog/banners/banner3.jpg" alt="image"></a>
                        </div>
                        <div class="item2">
                            <a href="#"><img src="{{ asset('supermarke/') }}/image/catalog/banners/banner4.jpg" alt="image"></a>
                        </div>

                    </div>
                    <!-- end Banners -->

                    <!-- Category Slider 1 -->
                    <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1">
                        <div class="modcontent">
                            <div class="page-top">
                                <div class="page-title-categoryslider">Technology</div>
                                <div class="item-sub-cat">
                                    <ul>
                                        <li><a href="#" title="Smartphone" target="_self">Smartphone</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="categoryslider-content">
                                <div class="item-cat-image" style="min-height: 351px;">
                                    <a href="#" title="Technology" target="_self">
                                        <img class="categories-loadimage" alt="Technology" src="{{ asset('supermarke/') }}/image/catalog/demo/category/tab1.jpg">
                                    </a>
                                </div>
                                <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                    @foreach($categories as $category)
                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href="{{route('category_wise_product',['id'=>$category->id])}}" target="_self" title="Lastrami bacon">
                                                                <img src="{{ asset('storage/photo/'.$category->image1) }}" class="img-1 img-responsive" alt="image1">
                                                                <img src="{{ asset('storage/photo/'.$category->image2) }}" class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="ratings">
                                                                <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <span class="rating-num">( 2 )</span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Lastrami bacon</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$80.00</span>

                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end Category Slider 1 -->

                    <!-- Category Slider 2 -->
                    <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider2">
                        <div class="modcontent">
                            <div class="page-top">
                                <div class="page-title-categoryslider">Funiture & Decor</div>
                                <div class="item-sub-cat">
                                    <ul>
                                        <li><a href="#" title="Smartphone" target="_self">Living room</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="categoryslider-content">
                                <div class="item-cat-image" style="min-height: 351px;">
                                    <a href="#" title="Funiture & Decor" target="_self">
                                        <img class="categories-loadimage" alt="Funiture & Decor" src="{{ asset('supermarke/') }}/image/catalog/demo/category/tab2.jpg">
                                    </a>
                                </div>
                                <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">
                                                        <div class="box-label">
                                                            <span class="label-product label-new">New</span>
                                                        </div>
                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Sunt inculpa qui">
                                                                <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/fu1.jpg" class="img-1 img-responsive" alt="image1">
                                                                <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/fu10.jpg" class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="ratings">
                                                                <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <span class="rating-num">( 2 )</span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Sunt inculpa qui</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$60.00</span>

                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Category Slider 2 -->

                    <!-- Category Slider 3 -->
                    <div id="so_category_slider_1" class="so-category-slider container-slider module cateslider1">
                        <div class="modcontent">
                            <div class="page-top">
                                <div class="page-title-categoryslider">Fashion & Accessories</div>
                                <div class="item-sub-cat">
                                    <ul>
                                        <li><a href="#" title="Smartphone" target="_self">Smartphone</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="categoryslider-content">
                                <div class="item-cat-image" style="min-height: 351px;">
                                    <a href="#" title="Fashion & Accessories" target="_self">
                                        <img class="categories-loadimage" alt="Fashion & Accessories" src="{{ asset('supermarke/') }}/image/catalog/demo/category/tab3.jpg">
                                    </a>
                                </div>
                                <div class="slider category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="2" data-items_column2="1"  data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">

                                        <div class="item">
                                            <div class="item-inner product-layout transition product-grid">
                                                <div class="product-item-container">
                                                    <div class="left-block left-b">

                                                        <div class="product-image-container second_img">
                                                            <a href="product.html" target="_self" title="Lastrami bacon">
                                                                <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/f1.jpg" class="img-1 img-responsive" alt="image1">
                                                                <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/f7.jpg" class="img-2 img-responsive" alt="image2">
                                                            </a>
                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                        </div>
                                                        <!--end quickview-->


                                                    </div>
                                                    <div class="right-block">
                                                        <div class="button-group so-quickview cartinfo--left">
                                                            <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                                <span>Add to cart </span>
                                                            </button>
                                                            <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                            </button>
                                                            <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                            </button>

                                                        </div>
                                                        <div class="caption hide-cont">
                                                            <div class="ratings">
                                                                <div class="rating-box">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                </div>
                                                                <span class="rating-num">( 3 )</span>
                                                            </div>
                                                            <h4><a href="product.html" title="Pastrami bacon" target="_self">Lastrami bacon</a></h4>

                                                        </div>
                                                        <p class="price">
                                                            <span class="price-new">$80.00</span>

                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Category Slider 3 -->

                    <!-- Banners -->
                    <div class="banners4 banners">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a href="#"><img src="{{ asset('supermarke/') }}/image/catalog/banners/bn1.jpg" alt="image"></a>
                            </div>
                        </div>
                    </div>
                    <!-- end Banners -->

                    <!-- Listing tabs -->
                    <div class="module listingtab-layout1">

                        <div id="so_listing_tabs_1" class="so-listing-tabs first-load">
                            <div class="loadeding"></div>
                            <div class="ltabs-wrap">
                                <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="5" data-md="3" data-sm="2" data-xs="1" data-margin="30">
                                    <!--Begin Tabs-->
                                    <div class="ltabs-tabs-wrap">
                                    <span class="ltabs-tab-selected">Bathroom</span> <span class="ltabs-tab-arrow">▼</span>
                                        <div class="item-sub-cat">
                                            <ul class="ltabs-tabs cf">
                                                <li class="ltabs-tab tab-sel" data-category-id="20" data-active-content=".items-category-20"> <span class="ltabs-tab-label">Best Seller</span> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Tabs-->
                                </div>

                                <div class="ltabs-items-container products-list grid">
                                    <!--Begin Items-->
                                    <div class="ltabs-items ltabs-items-selected items-category-20" data-total="16">
                                        <div class="ltabs-items-inner ltabs-slider">
                                            <div class="item">
                                                <div class="item-inner product-layout transition product-grid">
                                                    <div class="product-item-container">
                                                        <div class="left-block left-b">

                                                            <div class="product-image-container second_img">
                                                                <a href="product.html" target="_self" title="Ullamco occaeca">
                                                                    <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/h1.jpg" class="img-1 img-responsive" alt="image1">
                                                                    <img src="{{ asset('supermarke/') }}/image/catalog/demo/product/270/h7.jpg" class="img-2 img-responsive" alt="image2">
                                                                </a>
                                                            </div>
                                                            <!--quickview-->
                                                            <div class="so-quickview">
                                                                <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                            </div>
                                                            <!--end quickview-->


                                                        </div>
                                                        <div class="right-block">
                                                            <div class="button-group so-quickview cartinfo--left">
                                                                <button type="button" class="addToCart" title="Add to cart" onclick="cart.add('60 ');">
                                                                    <span>Add to cart </span>
                                                                </button>
                                                                <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"><i class="fa fa-heart-o"></i><span>Add to Wish List</span>
                                                                </button>
                                                                <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"><i class="fa fa-retweet"></i><span>Compare this Product</span>
                                                                </button>

                                                            </div>
                                                            <div class="caption hide-cont">
                                                                <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                </div>
                                                                <h4><a href="product.html" title="Pastrami bacon" target="_self">Ullamco occaeca </a></h4>

                                                            </div>
                                                            <p class="price">
                                                                <span class="price-new">$45.00</span>

                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="ltabs-items items-category-18 grid" data-total="16">
                                        <div class="ltabs-loading"></div>

                                    </div>
                                    <div class="ltabs-items  items-category-25 grid" data-total="16">
                                        <div class="ltabs-loading"></div>
                                    </div>
                                    <!--End Items-->
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end Listing tabs -->

                    <!-- Slider Brands -->
                    <div class="slider-brands col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="yt-content-slider contentslider" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="7" data-items_column0="7" data-items_column1="5" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes"
                                data-pagination="no" data-lazyload="yes" data-loop="yes">
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('supermarke/') }}/image/catalog/brands/b1.png" alt="brand">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Brands -->
                </div>

            </div>

        </div>
    </div>
</div>
@push('scripts')

@endpush
