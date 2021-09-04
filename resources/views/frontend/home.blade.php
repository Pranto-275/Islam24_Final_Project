@extends('layouts.front_end')
@section('content')
    <div>
        <x-slot name="title">
            Home
        </x-slot>
        <x-slot name="header">
            Home
        </x-slot>
        <main>
            <!-- slider-area -->
            <section class="third-slider-area">
                <div class="custom-container-two">
                    {{-- Start Main Slider --}}
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        {{-- <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol> --}}
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 slider-image" @if($sliderImageLast) src="{{ asset('storage/photo/'.$sliderImageLast->image) }}" @endif alt="First slide">
                            </div>
                            @foreach ($sliderImages as $sliderImage)

                                <div class="carousel-item">
                                    <img class="d-block w-100 slider-image" src="{{ asset('storage/photo/'.$sliderImage->image) }}" alt="Second slide">
                                </div>

                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    {{-- End Main Slider --}}

                </div>

            </section>
            <!-- slider-area-end -->
            <section class="exclusive-collection pt-20 pb-20">
                {{-- Start Top Category Show Slider --}}
                @if(count($topFourCategories)>0)
                  <h5 class="text-center">ক্যাটাগরি সমূহ</h5>
                @endif
                <hr class="mt-0 pt-0">
                <div class="container">
                    <div class="carousel slide" data-ride="carousel" id="multi_item">
                      <div class="carousel-inner">
                        <div class="carousel-item active" data-interval="4000">
                          <div class="row">
                        @foreach ($topFourCategories as $topFourCategory)
                            <div class="col-3">
                                <a href="{{ route('search-category-wise',['id'=>$topFourCategory->id]) }}">
                                <img class="d-block w-100" src="{{ asset('storage/photo/'.$topFourCategory->image1) }}" alt="{{$topFourCategory->id}}">
                                <div class="text-center" style="color: #ff0000; font-weight: bold;font-size: 14px;height:55px;">
                                    {{$topFourCategory->name}}
                                    {{-- @if(strlen($topFourCategory->name)>20)
                                       {{ substr($topFourCategory->name, 0,19).'...' }}
                                    @else
                                       {{ $topFourCategory->name }}
                                    @endif --}}
                                    {{-- Q --}}
                                </div>
                               </a>
                            </div>
                        @endforeach
                          </div>
                        </div>

                         @if(count($topCategories)!=0)
                        @php
                            $check=count($topCategories);
                            $p=0;
                            $count=($check/4);
                        @endphp
                        @while($count>0)
                        <div class="carousel-item" data-interval="4000">
                          <div class="row">
                              @php
                                  $flag=0;
                              @endphp
                            @foreach ($topCategories->skip($p) as $topCategory)
                            @if($flag<4)
                            @php
                                $p++;
                            @endphp
                            <div class="col-3">
                                 <a href="{{ route('search-category-wise',['id'=>$topCategory->id]) }}">
                                 <img class="d-block w-100" src="{{ asset('storage/photo/'.$topCategory->image1) }}" alt="">
                                 <div class="text-center" style="color: #ff0000; font-weight: bold;font-size: 12px;height: 55px;">
                                    {{$topCategory->name}}
                                    {{-- @if(strlen($topCategory->name)>20)
                                       {{ substr($topCategory->name, 0,19).'...' }}
                                    @else
                                       {{ $topCategory->name }}
                                    @endif --}}
                                    {{-- Q --}}
                                </div>
                                </a>
                            </div>
                            @endif

                            @php
                                $flag++;
                            @endphp
                            @endforeach
                          </div>
                        </div>
                        @php
                           $count--;
                        @endphp
                        @endwhile
                        @endif

                      </div>
                      {{-- <a class="carousel-control-prev" href="#multi_item" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#multi_item" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a> --}}
                    </div>
                  </div>
                {{-- End Top Category Show Slider --}}
                <div class="custom-container-two mt-3">
                    <!-- exclusive-collection-area -->
                    <div class="row justify-content-center pb-2">
                        <div class="col-lg-8">
                            <div class="section-title text-center">
                                {{-- <span class="sub-title">exclusive collection</span> --}}
                                <h2 class="title">নতুন ইলেকট্রনিক্স পণ্য</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {{-- Start New Electronics --}}
                        @if($data['products_desc'])
                            @foreach($data['products_desc'] as $product)
                                <div class="col-xl-2 col-md-2 col-6">
                                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                                        <div class="exclusive-item-thumb">
                                            <a href="{{route('product-details',['id'=>$product['id']])}}">
                                                <img
                                                @if($product['product_image_first'])
                                                src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}"
                                                @else
                                                src="{{ asset('image-not-available.jpg') }}"
                                                @endif
                                                style="height: 190px;" alt="{{$product['name']}}"
                                                >
                                                {{-- <img class="overlay-product-thumb" @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif style="height: 190px;" alt="{{$product['name']}}"> --}}
                                            </a>
                                            @if($product['discount'])
                                              <span class="sd-meta" style="background-color: #ff5c00;">{{ intval($product['discount']) }}% ছাড়</span>
                                            @endif
                                            {{-- <span class="sd-meta">New!</span> --}}
                                            {{-- <ul class="action">
                                                <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li>
                                                <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i class="flaticon-supermarket"></i></a></li>
                                                <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                            </ul> --}}
                                        </div>
                                        <div class="exclusive-item-content">
                                            <h5>
                                                <a href="{{route('product-details',['id'=>$product['id']])}}" style="text-transform: capitalize; font-size: 14px;">
                                                @if(strlen($product['name'])>50)
                                                      {{ substr($product['name'], 0,49).'...' }}
                                                @else
                                                      {{ $product['name'] }}
                                                @endif
                                                </a>
                                            </h5>
                                            <div class="exclusive--item--price pb-10">
                                                <span class="new-price" style="color:#ff0000;">
                                                  @if($currencySymbol)
                                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product['special_price'] }}
                                                  @else
                                                        {{ $product['special_price'] }}
                                                  @endif

                                                  </span>
                                                <del class="old-price">
                                                    @if($currencySymbol)
                                                    <span class="text-dark"><span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product['regular_price'] }}</span>
                                                    @else
                                                        {{ $product['regular_price'] }}
                                                    @endif

                                                </del>
                                            </div>
                                            {{-- <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div> --}}
                                            @php
                                            $minimumQuantity = $product['min_order_qty'];
                                            $orderQuantity = 0;
                                            if(isset($cardBadge['data']['products'][$product['id']])) {
                                                $minimumQuantity = $cardBadge['data']['products'][$product['id']]['minimum_order_quantity'];
                                                $orderQuantity = $cardBadge['data']['products'][$product['id']]['quantity'];
                                            }
                                            @endphp
                                            <input type="hidden" class="product_quantity" id="product_quantity_{{ $product['id'] }}" data-minimum-quantity="{{ $minimumQuantity }}" value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}" >
                                            <a href="javascript:void(0)" class="add-to-card buy-now buy-now-button cartModal" data-product-id="{{ $product['id'] }}" @if($product['in_stock']=="Out of Stock") style="pointer-events: none;" @endif style="color: #ff5c00;">
                                                @if($product['in_stock']=="Out of Stock")
                                                স্টক শেষ
                                               @else
                                                ক্রয় করুণ
                                               @endif
                                            </a>
                                            <a href="javascript:void(0)" class=" buy-now buy-now-button cartModal1 btn-mobile-modal" data-product-id="{{ $product['id'] }}" data-product-name="{{ $product['name'] }}" data-product-price="{{ $product['special_price'] }}" data-product-quantity="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}" data-product-minimum-quantity="{{ $minimumQuantity }}" @if($product['product_image_first']) data-product-image="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}" @endif data-toggle="modal" data-target=".bd-example-modal-sm" @if($product['in_stock']=="Out of Stock") style="pointer-events: none;" @endif style="color: #ff5c00;">
                                                @if($product['in_stock']=="Out of Stock")
                                                স্টক শেষ
                                                @else
                                                 ক্রয় করুণ
                                                @endif
                                            </a>
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button> --}}
                                            <?php
                                            /*echo "<pre>";
                                            //print_r($cardBadge['data']['products'][$product['id']]['product_id']);
                                            print_r($product['min_order_qty']);
                                            echo "</pre>";*/
                                            ?>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <div class="alert alert-info text-center"> Op's there is no products </div>
                            </div>
                        @endif
                        {{-- End New Electronics --}}

                    </div>
                    <!-- exclusive-collection-area-end -->

                    <!-- testimonial-area -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-title text-center mb-5">
                                <h2 class="title">সর্বাধিক বিক্রিত পণ্য</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @if($data['products'])
                            @foreach($data['products'] as $product)
                                <div class="col-xl-2 col-md-2 col-6">
                                    <div class="exclusive-item exclusive-item-three text-center mb-40">
                                        <div class="exclusive-item-thumb">
                                            <a href="{{route('product-details',['id'=>$product['id']])}}">
                                                <img
                                                @if($product['product_image_first'])
                                                   src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}"
                                                @else
                                                   src="{{ asset('image-not-available.jpg') }}"
                                                @endif
                                                style="height: 190px;"
                                                alt="{{$product['name']}}">
                                                {{-- <img class="overlay-product-thumb" @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif style="height: 190px;" alt="{{$product['name']}}"> --}}
                                            </a>
                                            @if($product['discount'])
                                              <span class="sd-meta">{{ intval($product['discount']) }}% ছাড়</span>
                                            @endif
                                            {{-- <ul class="action">
                                                <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li>
                                                <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i class="flaticon-supermarket"></i></a></li>
                                                <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                            </ul> --}}
                                        </div>
                                        <div class="exclusive-item-content">
                                            <h5>
                                                <a href="{{route('product-details',['id'=>$product['id']])}}" style="text-transform: capitalize; font-size: 14px;">

                                                    @if(strlen($product['name'])>50)
                                                      {{ substr($product['name'], 0,49).'...' }}
                                                    @else
                                                      {{ $product['name'] }}
                                                    @endif
                                                </a>
                                            </h5>
                                            <div class="exclusive--item--price pb-10">
                                                <span class="new-price" style="color:#ff0000;">
                                                    @if($currencySymbol)
                                                          <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product['special_price'] }}
                                                    @else
                                                          {{ $product['special_price'] }}
                                                    @endif

                                                    </span>
                                                  <del class="old-price">
                                                      @if($currencySymbol)
                                                      <span class="text-dark"><span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{ $product['regular_price'] }}</span>
                                                      @else
                                                          {{ $product['regular_price'] }}
                                                      @endif

                                                  </del>
                                           </div>
                                            {{-- <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div> --}}
                                            @php
                                            $minimumQuantity = $product['min_order_qty'];
                                            $orderQuantity = 0;
                                            if(isset($cardBadge['data']['products'][$product['id']])) {
                                                $minimumQuantity = $cardBadge['data']['products'][$product['id']]['minimum_order_quantity'];
                                                $orderQuantity = $cardBadge['data']['products'][$product['id']]['quantity'];
                                            }
                                            @endphp
                                            <input type="hidden" class="product_quantity" id="product_quantity_{{ $product['id'] }}" data-minimum-quantity="{{ $minimumQuantity }}" value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}" >
                                            <a href="javascript:void(0)" class="add-to-card buy-now buy-now-button cartModal" data-product-id="{{ $product['id'] }}" style="color: #ff5c00;">
                                                @if($product['in_stock']=="Out of Stock")
                                                 Sold Out
                                                @else
                                                 ক্রয় করুণ
                                                @endif
                                            </a>
                                            <a href="javascript:void(0)" class=" buy-now buy-now-button cartModal1 btn-mobile-modal" data-product-id="{{ $product['id'] }}" data-product-name="{{ $product['name'] }}" data-product-price="{{ $product['special_price'] }}" data-product-quantity="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}" data-product-minimum-quantity="{{ $minimumQuantity }}" @if($product['product_image_first']) data-product-image="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}" @endif data-toggle="modal" data-target=".bd-example-modal-sm" style="color: #ff5c00;">
                                                @if($product['in_stock']=="Out of Stock")
                                                Sold Out
                                               @else
                                                ক্রয় করুণ
                                               @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12">
                                <div class="alert alert-info text-center"> Op's there is no products </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <center>
                            <a class="btn text-center" style="background: #ff6000;color:white;"  href="{{route('search-category-wise')}}">আরও পণ্য দেখুন</a>
                        </center>
                        </div>
                    </div>
                    <!-- testimonial-area-end -->
                </div>
            </section>
            <!-- furniture-cat-banner -->
            {{-- <div class="furniture-cat-banner-area">
                <div class="custom-container-three">
                    <div class="row">
                        <div class="col-12">
                            <div class="deal-day-top">
                                <div class="deal-day-title">
                                    <h4 class="title">মূল্যপরিশোধ পদ্ধতি</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-6">
                                <div class="top-cat-banner-item mt-10">
                                    <a href="shop-left-sidebar.html"><img src="{{ URL::asset('venam/') }}/img/payment_method/bkash.png" id="paymentCard" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="top-cat-banner-item mt-10">
                                    <a href="shop-left-sidebar.html"><img src="{{ URL::asset('venam/') }}/img/payment_method/nagad.png" id="paymentCard" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="top-cat-banner-item mt-10">
                                    <a href="shop-left-sidebar.html"><img src="{{ URL::asset('venam/') }}/img/payment_method/rocket.png" id="paymentCard" alt=""></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="top-cat-banner-item mt-10">
                                    <a href="shop-left-sidebar.html"><img src="{{ URL::asset('venam/') }}/img/payment_method/shiurcash.png" id="paymentCard" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- furniture-cat-banner-end -->
            <!-- core-features -->
            <section class="core-features-area core-features-style-two" id="footerTopMenu">
                <div class="container">
                    <hr>
                    <div>
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="core-features-item mb-10">
                                    <div class="core-features-icon">
                                        <img src="{{ URL::asset('venam/') }}/img/icon/core_features01.png" alt="">
                                    </div>
                                    <div class="core-features-content">
                                        <h6>Free Shipping On Over $ 50</h6>
                                        <span>Agricultural mean crops livestock</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="core-features-item mb-10">
                                    <div class="core-features-icon">
                                        <img src="{{ URL::asset('venam/') }}/img/icon/core_features02.png" alt="">
                                    </div>
                                    <div class="core-features-content">
                                        <h6>Membership Discount</h6>
                                        <span>Only MemberAgricultural livestock</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="core-features-item mb-10">
                                    <div class="core-features-icon">
                                        <img src="{{ URL::asset('venam/') }}/img/icon/core_features03.png" alt="">
                                    </div>
                                    <div class="core-features-content">
                                        <h6>Money Return</h6>
                                        <span>30 days money back guarantee</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="core-features-item mb-10">
                                    <div class="core-features-icon">
                                        <img src="{{ URL::asset('venam/') }}/img/icon/core_features04.png" alt="">
                                    </div>
                                    <div class="core-features-content">
                                        <h6>24/7 Support !</h6>
                                        <span>Saving Every Moments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- core-features-end -->
        </main>
    </div>
    {{--<div class="hide" id="clone_mini_cart">
        <li class="d-flex align-items-start" id="li_row_">
            <div class="cart-img">
                <a href="#">
                    <img src="" alt="">
                </a>
            </div>
            <div class="cart-content">
                <h4>
                    <a href="#">product name</a>
                </h4>
                <div class="cart-price">
                    <span class="new">special_price</span>
                    <span>
                            <del>regular_price</del>
                    </span>
                </div>
            </div>
            <div class="del-icon" >
                <a href="javascript:void(0)" class="btn-product-delete"  data-product-id="">
                    <i class="far fa-trash-alt"></i>
                </a>
            </div>
        </li>
    </div>--}}
    <style>
        /* .col-6 {
            margin-bottom: 50px !important;
        } */
    </style>
@endsection

