@extends('layouts.front_end')
@section('content')
<div>
    <style>
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
}

    </style>
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
                        <img class="d-block w-100 slider-image" src="{{ asset('storage/photo/'.$sliderImageLast->image) }}" alt="First slide">
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
        <section class="exclusive-collection pt-20 pb-55">
            {{-- Start Top Category Show Slider --}}
            <h5 class="text-center">Top Categories</h5>
            <hr class="mt-0 pt-0">
                <div class="row">
                    @foreach ($topSixCategories as $topCategory)
                    <div class="col-xl-2 col-4">
                        <div class="text-center">
                            <div class="exclusive-item-thumb">
                                <a href="{{ route('search-category-wise',['id'=>$topCategory->id]) }}">
                                    <center>
                                        <img class="rounded topCategoryImage" src="{{ asset('storage/photo/'.$topCategory->image1) }}" alt="Image">
                                        <img class="rounded topCategoryImage overlay-product-thumb" src="{{ asset('storage/photo/'.$topCategory->image2) }}" alt="">
                                    </center>
                                </a>
                            </div>
                            <div class="exclusive-item-content">
                                <h5 id="categoryName" class="text-center"><a href="shop-details.html">{{$topCategory->name}}</a></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if(count($topSixCategories)>0)
                <div>
                    <center><a href="{{route('search-category-wise')}}" class="btn btn-sm" style="padding:10px;margin-bottom:10px;width:100px;height:30px;color:#03030a;background-color:rgb(236, 240, 14);">See More</a></center>
                </div>
                @endif
            {{-- End Top Category Show Slider --}}
            <div class="custom-container-two mt-5">
                 <!-- exclusive-collection-area -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-60">
                            <span class="sub-title">exclusive collection</span>
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
                                        <img @if($product['product_image_first']) src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}" @endif style="height: 200px;" alt="{{$product['name']}}">
                                        <img class="overlay-product-thumb" @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif style="height: 200px;" alt="{{$product['name']}}">
                                    </a>
                                    @if($product['discount'])
                                    <span class="discount" style="width:46px;">{{ $product['discount'] }}%</span>
                                    @endif
                                    <span class="sd-meta">New!</span>
                                    <ul class="action">
                                        {{-- <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li> --}}
                                        <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i class="flaticon-supermarket"></i></a></li>
                                        <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                    </ul>
                                </div>
                                <div class="exclusive-item-content">
                                    <h5><a href="shop-details.html" style="text-transform: capitalize;">{{ $product['name'] }}</a></h5>
                                    <div class="exclusive--item--price">
                                        <del class="old-price">
                                            @if($currencySymbol)
                                                {{ $currencySymbol->symbol }}
                                            @endif
                                            {{ $product['regular_price'] }}
                                        </del>
                                        <span class="new-price">
                                            @if($currencySymbol)
                                                {{ $currencySymbol->symbol }}
                                            @endif
                                            {{ $product['special_price'] }}
                                        </span>
                                    </div>
                                    {{-- <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div> --}}
                                    <a href="javascript:void(0)" class="add-to-card buy-now buy-now-button" data-product-id="{{ $product['id'] }}">Buy Now</a>

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
                        <div class="section-title text-center mb-60">
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
                                            <img @if($product['product_image_first']) src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}" @endif style="height: 200px;" alt="{{$product['name']}}">
                                            <img class="overlay-product-thumb" @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif style="height: 200px;" alt="{{$product['name']}}">
                                        </a>
                                        @if($product['discount'])
                                        <span class="discount" style="width:46px;">{{ $product['discount'] }}%</span>
                                        @endif
                                        <ul class="action">
                                            {{-- <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li> --}}
                                            <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i class="flaticon-supermarket"></i></a></li>
                                            <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="exclusive-item-content">
                                        <h5><a href="shop-details.html" style="text-transform: capitalize;">{{ $product['name'] }}</a></h5>
                                        <div class="exclusive--item--price">
                                            <del class="old-price">
                                                @if($currencySymbol)
                                                    {{ $currencySymbol->symbol }}
                                                @endif
                                                {{ $product['regular_price'] }}
                                            </del>
                                            <span class="new-price">
                                                @if($currencySymbol)
                                                {{ $currencySymbol->symbol }}
                                                @endif
                                                {{ $product['special_price'] }}
                                            </span>
                                        </div>
                                        {{-- <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div> --}}
                                    <a href="javascript:void(0)" class="add-to-card buy-now buy-now-button" data-product-id="{{ $product['id'] }}">Buy Now</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <div class="alert alert-info text-center"> Op's there is no products </div>
                        </div>
                    @endif
                </div>
                <!-- testimonial-area-end -->
            </div>
        </section>
        <!-- furniture-cat-banner -->
        <div class="furniture-cat-banner-area">
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
        </div>
        <!-- furniture-cat-banner-end -->
        <!-- core-features -->
        <section class="core-features-area core-features-style-two">
            <div class="container">
                <div class="core-features-border">
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

@endsection

