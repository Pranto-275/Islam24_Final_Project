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
        <div class="furniture-cat-banner-area">
            <div class="custom-container-three">
                <div class="row">
                    <div class="col-12">
                        <div class="deal-day-top">
                            <div class="deal-day-title">
                                <h4 class="title">Product Search Result</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @if($data['products'])
                        @foreach($data['products'] as $product)
                            <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="exclusive-item exclusive-item-three text-center mb-40">
                                    <div class="exclusive-item-thumb">
                                        <a href="{{route('product-details',['id'=>$product['id']])}}">
                                            <img @if($product['product_image_first']) src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}" @endif style="height: 220px;" alt="{{$product['name']}}">
                                            <img class="overlay-product-thumb" @if($product['product_image_last']) src="{{ asset('storage/photo/'.$product['product_image_last']['image']) }}" @endif style="height: 220px;" alt="{{$product['name']}}">
                                        </a>
                                        <ul class="action">
                                            <li><a href="#"><i class="flaticon-shuffle-1"></i></a></li>
                                            <li><a href="javascript:void(0)" class="add-to-card" data-product-id="{{ $product['id'] }}"><i class="flaticon-supermarket"></i></a></li>
                                            <li><a href="#"><i class="flaticon-witness"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="exclusive-item-content">
                                        <h5><a href="shop-details.html" style="text-transform: capitalize;">{{ $product['name'] }}</a></h5>
                                        <div class="exclusive--item--price">
                                            <del class="old-price">{{ $product['regular_price'] }}</del>
                                            <span class="new-price">{{ $product['special_price'] }}</span>
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
                    @else
                        <div class="col-md-12">
                            <div class="alert alert-info text-center"> Op's there is no products </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </main>
</div>
@endsection
