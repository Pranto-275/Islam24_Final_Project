@extends('layouts.front_end')
@section('content')
<div>
    <x-slot name="title">
        Product View
    </x-slot>
    <x-slot name="header">
        Product View
    </x-slot>
        <!-- main-area -->
                 <!-- main-area -->
        <main>


            <!-- shop-area -->
            <div class="shop-area gray-bg pt-20 pb-100">
                <div class="custom-container-two">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 order-2 order-lg-0">
                            <aside class="shop-sidebar">
                                <div class="widget shop-widget mb-30">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Product Categories</h6>
                                    </div>
                                    <div class="shop-cat-list">
                                        <ul>
                                            @foreach ($categories as $category)

                                            <li><a href="{{ route('search-category-wise',['id'=>$category->id]) }}">{{$category->name}}</a><span>{{$category->SubCategory->count()}}</span></li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget shop-widget mb-30">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Filter By Price</h6>
                                    </div>
                                    <div class="price_filter">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <span>Price :</span>
                                            <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card widget shop-widget mb-30">
                                    <div class="shop-widget-title">
                                        <h6 class="title">NEW PRODUCT</h6>
                                        <div class="slider-nav"></div>
                                    </div>
                                    <div class="sidebar-product-active">
                                        <div class="sidebar-product-list">
                                            <ul>
                                                @foreach ($newProducts as $newProduct)

                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="{{route('product-details',['id'=>$newProduct->id])}}"><img @if($newProduct->ProductImageFirst) src="{{ asset('storage/photo/'.$newProduct->ProductImageFirst->image)}}" @endif style="width:30px;height:30px;" alt="Image"></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="{{route('product-details',['id'=>$newProduct['id']])}}" style="text-transform: capitalize;">{{$newProduct->name}}</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>

                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="sidebar-product-list">
                                            <ul>
                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="shop-details.html"><img src="img/product/sidebar_product01.jpg" alt=""></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="shop-details.html">Slim Fit Cotton</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="shop-details.html"><img src="img/product/sidebar_product02.jpg" alt=""></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="shop-details.html">Slim Fit Cotton</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="shop-details.html"><img src="img/product/sidebar_product03.jpg" alt=""></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="shop-details.html">Slim Fit Cotton</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget shop-widget mb-30">
                                    <div class="shop-widget-title">
                                        <h6 class="title">Product Brand</h6>
                                    </div>
                                    <div class="sidebar-brand-list">
                                        <ul>
                                            @foreach ($brands as $brand)
                                            <li><a href="{{ route('search-brand-wise',['id'=>$brand->id]) }}">{{$brand->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="shop-sidebar-size">
                                        <div class="shop-widget-title">
                                            <h6 class="title">Size</h6>
                                        </div>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="shop-sidebar-color">
                                        <div class="shop-widget-title">
                                            <h6 class="title">Filter Color</h6>
                                        </div>
                                        <div class="shop-size-list">
                                            <ul>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="shop-widget-banner special-offer-banner">
                                        {{-- <a href="shop-left-sidebar.html"><img src="img/product/sidebar_banner_ad.jpg" alt=""></a> --}}
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="shop-top-meta mb-40">
                                <p class="show-result">Showing Products 1-12 Of 10 Result</p>
                                <div class="shop-meta-right">
                                    <ul>
                                        <li class="active"><a href="#"><i class="flaticon-grid"></i></a></li>
                                        <li><a href="#"><i class="flaticon-list"></i></a></li>
                                    </ul>
                                    <form action="#">
                                        <select class="custom-select">
                                            <option selected="">Default Sorting</option>
                                            <option>Free Shipping</option>
                                            <option>Best Match</option>
                                            <option>Newest Item</option>
                                            <option>Size A - Z</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                 @foreach ($data['products'] as $product)

                                <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6">
                                    <div class="exclusive-item exclusive-item-three text-center mb-50">
                                        <div class="exclusive-item-thumb">
                                            <a href="{{route('product-details',['id'=>$product['id']])}}">
                                                <img @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image'])}}" @endif style="height:200px;" alt="{{$product['name']}}">
                                                <img class="overlay-product-thumb" @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif style="height:200px;" alt="{{$product['name']}}">
                                            </a>
                                            <ul class="action">
                                                <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li>
                                                <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i class="flaticon-supermarket"></i></a></li>
                                                <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="exclusive-item-content">
                                            <h5><a href="{{route('product-details',['id'=>$product['id']])}}">{{ $product['name'] }}</a></h5>
                                            <div class="exclusive--item--price">
                                                @if($currencySymbol)
                                                     {{ $currencySymbol->symbol }}
                                                @endif
                                                <del class="old-price">
                                                    {{ $product['regular_price'] }}
                                                </del>
                                                <span class="new-price">
                                                    @if($currencySymbol)
                                                     {{ $currencySymbol->symbol }}
                                                    @endif
                                                    {{ $product['special_price'] }}
                                                </span>
                                            </div>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <div class="pagination-wrap">
                                <ul>
                                    <li class="prev"><a href="#"><i class="fas fa-long-arrow-alt-left"></i> Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li class="next"><a href="#">Next <i class="fas fa-long-arrow-alt-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shop-area-end -->

        </main>
        <!-- main-area-end -->
        <!-- main-area-end -->
</div>
@endsection
@push('scripts')

@endpush

