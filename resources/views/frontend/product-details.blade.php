@extends('layouts.front_end')
@section('content')

<div>
    <x-slot name="title">
        Product Views
    </x-slot>
    <x-slot name="header">
        Product View
    </x-slot>
    <!-- main-area -->
    <main>

        <!-- shop-details-area -->
        <section class="shop-details-area pt-40 pb-20">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-xl-7 col-lg-6">
                        <div class="shop-details-nav-wrap">
                            <div class="shop-details-nav">
                                @foreach ($productDetails->ProductImages as $productImage)
                                <div class="shop-nav-item">
                                    <img src="{{ asset('storage/photo/'.$productImage->image) }}" alt="">
                                </div>
                                {{-- <div class="shop-nav-item">
                                            <img src="{{ URL::asset('venam/') }}/img/product/sd_bottom02.jpg" alt="">
                            </div>
                            <div class="shop-nav-item">
                                <img src="{{ URL::asset('venam/') }}/img/product/sd_bottom03.jpg" alt="">
                            </div>
                            <div class="shop-nav-item">
                                <img src="{{ URL::asset('venam/') }}/img/product/sd_bottom04.jpg" alt="">
                            </div>
                            <div class="shop-nav-item">
                                <img src="{{ URL::asset('venam/') }}/img/product/sd_bottom03.jpg" alt="">
                            </div> --}}
                            @endforeach
                        </div>
                    </div>
                    <div class="shop-details-img-wrap">
                        <div class="shop-details-active">
                            @foreach ($productDetails->ProductImages as $productImage)
                            <div class="shop-details-img">
                                <a href="{{ asset('storage/photo/'.$productImage->image) }}" class="popup-image"><img
                                        src="{{ asset('storage/photo/'.$productImage->image) }}" alt=""></a>
                            </div>

                            @endforeach

                            {{-- <div class="shop-details-img">
                                        <a href="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg"
                            class="popup-image"><img src="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg"
                                alt=""></a>
                        </div>
                        <div class="shop-details-img">
                            <a href="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg"
                                class="popup-image"><img
                                    src="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg" alt=""></a>
                        </div>
                        <div class="shop-details-img">
                            <a href="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg"
                                class="popup-image"><img
                                    src="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg" alt=""></a>
                        </div>
                        <div class="shop-details-img">
                            <a href="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg"
                                class="popup-image"><img
                                    src="{{ URL::asset('venam/') }}/img/product/shop_details_img01.jpg" alt=""></a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="shop-details-content">
                    <h2 style="font-size: 18px;">{{ $productDetails->name }}</h2>
                    {{-- <div class="shop-details-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>- 3 Customer Reviews</span>
                                </div> --}}
                    <div class="shop-details-price mt-2">
                        <h2 class="m-0 p-0">
                            @if($currencySymbol)
                            <span style="color: #ff0000;"><span
                                    style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{$productDetails->special_price}}</span>
                            @else
                            <span style="color: #ff0000;">{{$productDetails->special_price}}</span>
                            @endif
                            <span style="font-size: 10px;">
                                <del class="text-danger">
                                    @if($currencySymbol)
                                    <span class="text-dark">
                                        <span
                                            style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>{{$productDetails->regular_price}}
                                    </span>
                                    @else
                                    <span class="text-dark">
                                        {{$productDetails->regular_price}}
                                    </span>
                                    @endif
                                </del>
                            </span>
                            &nbsp;
                            <span style="font-size: 16px;color: #ff0000;">{ {{ intval($productDetails->discount) }}%
                                ছাড়ে }</span>

                        </h2>
                        <div>
                            <div class="mt-1">
                                <span style="color: black;">সর্বনিম্ন অর্ডার: </span>
                                <span class="badge badge-light"
                                    style="color: red;font-weight: bold;font-size: 12px;">{{$productDetails->min_order_qty}}
                                    &nbsp; পিছ</span>

                                <span class="stock-info m-0 mt-3 ml-2">{{ $productDetails->in_stock }}</span>
                            </div>
                        </div>
                    </div>
                    <p>@if($productDetails->ProductInfo) {{ $productDetails->ProductInfo->long_description }} @endif</p>
                    {{-- <div class="product-details-size mb-40">
                                    <span>Size : </span>
                                    <a href="#">Guide</a>
                                    <a href="#">Can't Find Your Size?</a>
                                    <ul>
                                        <li><a href="#">XXS</a></li>
                                        <li><a href="#">XS</a></li>
                                        <li><a href="#">s</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                    </ul>
                                </div> --}}
                    @if($productDetails->in_stock!="Out of Stock")
                    <div class="perched-info mb-0">
                        <div class="cart-plus">
                            <form action="#">
                                <div class="cart-plus-minus" data-product-id="{{ $productDetails->id }}"
                                    data-device="desktop">
                                    @php
                                    $productQuantity =
                                    isset($cardBadge['data']['products'][$productDetails->id]['quantity']) ?
                                    $cardBadge['data']['products'][$productDetails->id]['quantity'] : 0;
                                    @endphp
                                    <input type="text" class="product_quantity"
                                        id="product_quantity_{{ $productDetails->id }}"
                                        data-minimum-quantity="{{ $productDetails->min_order_qty }}"
                                        value="{{ $productQuantity ? $productQuantity : $productDetails->min_order_qty }}">
                                </div>
                            </form>
                        </div>
                        {{-- <a href="javascript:void(0)" class="btn add-card-btn add-to-card" data-product-id="{{ $productDetails->id }}">
                            ক্রয় করুণ
                        </a> --}}
                        <a href="javascript:void(0)" class="add-to-card buy-now buy-now-button cartModal"
                        data-product-id="{{ $productDetails->id }}" style="color: #ff5c00;">
                        @if($productDetails->in_stock=="Out of Stock")
                        Sold Out
                        @else
                        ক্রয় করুণ
                        @endif
                    </a>
                    @php
                    $minimumQuantity = $productDetails->min_order_qty;
                    $orderQuantity = 0;
                    if(isset($cardBadge['data']['products'][$productDetails->id])) {
                    $minimumQuantity = $cardBadge['data']['products'][$productDetails->id]['minimum_order_quantity'];
                    $orderQuantity = $cardBadge['data']['products'][$productDetails->id]['quantity'];
                    }
                    @endphp
                    <a href="javascript:void(0)" class=" buy-now buy-now-button cartModal1 btn-mobile-modal"
                        data-product-id="{{ $productDetails->id }}" data-product-name="{{ $productDetails->name }}"
                        data-product-price="{{ $productDetails->special_price }}"
                        data-product-quantity="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}"
                        data-product-minimum-quantity="{{ $minimumQuantity }}"
                        @if($productDetails->ProductImageFirst)
                        data-product-image="{{ asset('storage/photo/'.$productDetails->ProductImageFirst->image) }}"
                        @endif
                        data-toggle="modal" data-target=".bd-example-modal-sm" style="color: #ff5c00;">
                        @if($productDetails->in_stock=="Out of Stock")
                        Sold Out
                        @else
                        ক্রয় করুণ
                        @endif
                    </a>
                    </div>
                    @endif
                    <div class="shop-details-bottom">
                        <h5>
                            {{-- <a href="#">
                                            <i class="far fa-heart"></i> Add To Wishlist
                                        </a> --}} </h5>

                        <div>
                            <p class="m-0">
                                <span class="text-dark">ক্যাটাগরি : </span>
                                <span
                                    style="color: #ff0000; font-weight:bold;">{{$productDetails->Category->name}}</span>
                            </p>
                            <p class="m-0">
                                <span class="text-dark">ব্রান্ড:</span>
                                <span style="color: #ff0000; font-weight:bold;">{{$productDetails->Brand->name}}</span>
                            </p>
                            <div class="social-links pt-2">
                                <a href="{{$companyInfo->facebook_link}}"><span class="fab fa-facebook-square"
                                        style="font-size: 20px;"></span></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{$companyInfo->youtube_link}}"><span
                                        class="fab fa-youtube" style="font-size: 20px;color: red;"></span></a>
                            </div>
                            <p class="m-0">
                                @if($productDetails->ProductInfo->youtube_link)
                                <span><i class="fab fa-youtube text-danger"></i></span>
                                <a href="{{$productDetails->ProductInfo->youtube_link}}">Youtube Link</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="product-desc-wrap mb-20">
            <ul class="nav nav-tabs mb-25" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab"
                        aria-controls="details" aria-selected="true">Product Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="val-tab" data-toggle="tab" href="#val" role="tab" aria-controls="val"
                        aria-selected="false">Return Policy</a>
                </li>
                {{-- <li class="nav-item">
                                        <a class="nav-link" id="looks-tab" data-toggle="tab" href="#looks" role="tab" aria-controls="looks"
                                           aria-selected="false">Looks</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                                           aria-selected="false">Product Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="qa-tab" data-toggle="tab" href="#qa" role="tab" aria-controls="qa"
                                           aria-selected="false">Q&A</a>
                                    </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div class="product-desc-content">
                        {{-- <h4 class="title">Product Details</h4> --}}
                        <div class="row">
                            {{-- <div class="col-xl-3 col-md-4">
                                                    <div class="product-desc-img">
                                                        <img src="{{ asset('storage/photo/'.$productDetails->ProductImageFirst->image) }}"
                            alt="">
                            <img src="{{ asset('storage/blank-product-image.png') }}" alt="">
                        </div>
                    </div> --}}
                    <div class="col-12">
                        {{-- <h5 class="small-title" style="font-size: 12px;">{{$productDetails->name}}</h5> --}}
                        <p>{!!$productDetails->ProductInfo->short_description!!}</p>
                        <p>{{$productDetails->ProductInfo->long_description}}</p>
                        <p>{{$productDetails->ProductInfo->meta_description}}</p>
                        {{-- <ul class="product-desc-list">
                                                        <li>65% poly, 35% rayon</li>
                                                        <li>Hand wash cold</li>
                                                        <li>Partially lined</li>
                                                        <li>Hidden front button closure with keyhole accents</li>
                                                        <li>Button cuff sleeves</li>
                                                        <li>Made in USA</li>
                                                    </ul> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="val" role="tabpanel" aria-labelledby="val-tab">
            <div class="product-desc-content">
                <h4 class="title text-center">Return Policy</h4>
                <div class="row">
                    {{-- <div class="col-xl-3 col-md-4">
                                                    <div class="product-desc-img">
                                                        <img src="{{ URL::asset('venam/') }}/img/product/desc_img.jpg"
                    alt="">
                </div>
            </div> --}}
            <div class="col-xl-12 col-md-12">
                {{-- <h5 class="small-title">The Christina Fashion</h5>
                                                    <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining Lorem
                                                        Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> --}}
                <ul class="product-desc-list">
                    <li> {!! $companyInfo->return_policy !!}</li>
                    {{-- <li>Hand wash cold</li>
                                                        <li>Partially lined</li>
                                                        <li>Hidden front button closure with keyhole accents</li>
                                                        <li>Button cuff sleeves</li>
                                                        <li>Made in USA</li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="looks" role="tabpanel" aria-labelledby="looks-tab">
    <div class="product-desc-content">
        <h4 class="title text-center">Product Details</h4>
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="product-desc-img">
                    <img src="{{ URL::asset('venam/') }}/img/product/desc_img.jpg" alt="">
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h5 class="small-title">The Christina Fashion</h5>
                <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting,
                    remaining Lorem
                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy
                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                    type specimen book.</p>
                <ul class="product-desc-list">
                    <li>65% poly, 35% rayon</li>
                    <li>Hand wash cold</li>
                    <li>Partially lined</li>
                    <li>Hidden front button closure with keyhole accents</li>
                    <li>Button cuff sleeves</li>
                    <li>Made in USA</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
    <div class="product-desc-content">
        <h4 class="title">Product Details</h4>
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="product-desc-img">
                    <img src="{{ URL::asset('venam/') }}/img/product/desc_img.jpg" alt="">
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h5 class="small-title">The Christina Fashion</h5>
                <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting,
                    remaining Lorem
                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy
                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                    type specimen book.</p>
                <ul class="product-desc-list">
                    <li>65% poly, 35% rayon</li>
                    <li>Hand wash cold</li>
                    <li>Partially lined</li>
                    <li>Hidden front button closure with keyhole accents</li>
                    <li>Button cuff sleeves</li>
                    <li>Made in USA</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="qa" role="tabpanel" aria-labelledby="qa-tab">
    <div class="product-desc-content">
        <h4 class="title">Product Details</h4>
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="product-desc-img">
                    <img src="{{ URL::asset('venam/') }}/img/product/desc_img.jpg" alt="">
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h5 class="small-title">The Christina Fashion</h5>
                <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting,
                    remaining Lorem
                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy
                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                    type specimen book.</p>
                <ul class="product-desc-list">
                    <li>65% poly, 35% rayon</li>
                    <li>Hand wash cold</li>
                    <li>Partially lined</li>
                    <li>Hidden front button closure with keyhole accents</li>
                    <li>Button cuff sleeves</li>
                    <li>Made in USA</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
{{-- <div class="shop-details-add mb-95">
                                <a href="#"><img src="{{ URL::asset('venam/') }}/img/product/shop_details_add.jpg"
alt=""></a>
</div> --}}
<div class="related-product-wrap pb-20">
    <div class="deal-day-top">
        <div class="deal-day-title">
            <h4 class="title">Similar Product</h4>
        </div>
        <div class="related-slider-nav">
            <div class="slider-nav"></div>
        </div>
    </div>
    <div class="row ">
        {{-- Start Similar Product --}}
        @foreach ($data['products'] as $product)
        <div class="col-xl-2 col-md-2 col-6">
            <div class="exclusive-item exclusive-item-three text-center mb-40">
                <div class="exclusive-item-thumb">
                    <a href="{{route('product-details',['id'=>$product['id']])}}">
                        <img
                            @if($product['product_image_first'])
                               src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}"
                            @else
                                src="{{ asset('image-not-available.jpg')}}"
                            @endif
                            style="width: 100%;height: auto;" alt="{{$product['name']}}">
                        {{-- <img class="overlay-product-thumb" @if($product['product_image_last'])
                            src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif
                            style="width: 100%;height: auto;" alt="{{$product['name']}}"> --}}
                    </a>
                    @if($product['discount'])
                    <span class="sd-meta" style="width:70px;">{{ intval($product['discount']) }}% ছাড়</span>
                    @endif
                    {{-- <ul class="action">
                                                    <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li>
                                                    <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i
                        class="flaticon-supermarket"></i></a></li>
                    <li><a href="#"><i class="flaticon-witness"></i></a></li>
                    </ul> --}}
                </div>
                <div class="exclusive-item-content">
                    <h5>
                        <a href="{{route('product-details',['id'=>$product['id']])}}"
                            style="text-transform: capitalize; font-size: 14px;">

                            @if(strlen($product['name'])>50)
                            {{ substr($product['name'], 0,49).'...' }}
                            @else
                            {{ $product['name'] }}
                            @endif
                        </a>
                    </h5>
                    <div class="exclusive--item--price pb-10">
                        <span class="new-price">
                            @if($currencySymbol)
                            {{ $currencySymbol->symbol }}
                            @endif
                            {{ $product['special_price'] }}
                        </span>
                        <del class="old-price">
                            @if($currencySymbol)
                            {{ $currencySymbol->symbol }}
                            @endif
                            {{ $product['regular_price'] }}
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
                    <input type="hidden" class="product_quantity" id="product_quantity_{{ $product['id'] }}"
                        data-minimum-quantity="{{ $minimumQuantity }}"
                        value="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}">
                    <a href="javascript:void(0)" class="add-to-card buy-now buy-now-button cartModal"
                        data-product-id="{{ $product['id'] }}" style="color: #ff5c00;">
                        @if($product['in_stock']=="Out of Stock")
                        Sold Out
                        @else
                        ক্রয় করুণ
                        @endif
                    </a>
                    <a href="javascript:void(0)" class=" buy-now buy-now-button cartModal1 btn-mobile-modal"
                        data-product-id="{{ $product['id'] }}" data-product-name="{{ $product['name'] }}"
                        data-product-price="{{ $product['special_price'] }}"
                        data-product-quantity="{{ $orderQuantity ? $orderQuantity : $minimumQuantity }}"
                        data-product-minimum-quantity="{{ $minimumQuantity }}"
                        @if($product['product_image_first'])
                           data-product-image="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}"
                        @endif
                        data-toggle="modal" data-target=".bd-example-modal-sm" style="color: #ff5c00;">
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
        {{-- End Similar Product --}}
        <div class="col-md-12">
            <center>
                @if(isset($product['category_id']))
                <a class="btn text-center" style="background: #ff6000;color:white;"
                    href="{{route('search-category-wise',['id'=>$product['category_id']])}}">আরও পণ্য দেখুন</a>
                @endif
            </center>
        </div>
    </div>
</div>
{{-- <div class="product-reviews-wrap">
                                <div class="deal-day-top">
                                    <div class="deal-day-title">
                                        <h4 class="title">Product Reviews</h4>
                                    </div>
                                </div>
                                <div class="reviews-count-title">
                                    <h5 class="title">3 review for Pouch Pocket Jacket</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="product-review-list blog-comment">
                                            <ul>
                                                <li>
                                                    <div class="single-comment">
                                                        <div class="comment-avatar-img">
                                                            <img src="{{ URL::asset('venam/') }}/img/product/review_author_thumb01.jpg"
alt="img">
</div>
<div class="comment-text">
    <div class="comment-avatar-info">
        <h5>Emaliy Watson <span class="comment-date"> - November 13, 2020</span></h5>
        <div class="rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
    </div>
    <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting, remaining.
    </p>
</div>
</div>
</li>
<li>
    <div class="single-comment">
        <div class="comment-avatar-img">
            <img src="{{ URL::asset('venam/') }}/img/product/review_author_thumb02.jpg" alt="img">
        </div>
        <div class="comment-text">
            <div class="comment-avatar-info">
                <h5>Tomas Alexzender <span class="comment-date"> - November 13, 2020</span></h5>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting,
                remaining.</p>
        </div>
    </div>
</li>
<li>
    <div class="single-comment">
        <div class="comment-avatar-img">
            <img src="{{ URL::asset('venam/') }}/img/product/review_author_thumb03.jpg" alt="img">
        </div>
        <div class="comment-text">
            <div class="comment-avatar-info">
                <h5>Rana Watson <span class="comment-date"> - November 13, 2020</span></h5>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting,
                remaining.</p>
        </div>
    </div>
</li>
<li>
    <div class="single-comment">
        <div class="comment-avatar-img">
            <img src="{{ URL::asset('venam/') }}/img/product/review_author_thumb04.jpg" alt="img">
        </div>
        <div class="comment-text">
            <div class="comment-avatar-info">
                <h5>Emaliy Watson <span class="comment-date"> - November 13, 2020</span></h5>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <p>Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the leap into electronic typesetting,
                remaining.</p>
        </div>
    </div>
</li>
</ul>
</div>
</div>
<div class="col-lg-6">
    <div class="product-review-form">
        <p>Your email address will not be published. Required fields are marked *</p>
        <div class="rising-star mb-40">
            <h5>Your Rating</h5>
            <div class="rising-rating"></div>
        </div>
        <form action="#">
            <div class="form-grp">
                <label for="message">YOUR REVIEW *</label>
                <textarea name="message" id="message"></textarea>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-grp">
                        <label for="uea">YOUR NAME *</label>
                        <input type="text" id="uea">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-grp">
                        <label for="email">YOUR Email *</label>
                        <input type="email" id="email">
                    </div>
                </div>
            </div>
            <button class="btn">SUBMIT</button>
        </form>
    </div>
</div>
</div>
</div> --}}
</div>
</div>
</div>
</section>
<!-- shop-details-area-end -->
</main>
<!-- main-area-end -->
</div>
@endsection
