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


    <!-- order-complete-area -->
    <section class="order-complete-area pattern-bg pt-20 pb-100" data-background="img/bg/pattern_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="order-complete-bg" data-background="img/bg/order_comp_bg.png">
                        <div class="order-complete-content">
                            <h3><span>your</span> Order Is Completed! Order No-{{$orderCode}}</h3>
                            <div class="check mb-25">
                                <img src="img/icon/check.png" alt="">
                            </div>
                            <p>Thank you for your order! Your order is being processed and will be completed within 6-12 Hours. You will receive an
                            email confirmation when your order is completed.</p>
                            <a href="{{route('home')}}" class="btn">CONTINUE SHOPPING</a>
                            <p class="get-ans">Get answers to all your <a href="#">Questions</a> you might have.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order-complete-area-end -->
        <!-- core-features -->
        <section class="core-features-area core-features-style-two">
            <div class="container">
                <div class="core-features-border">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="core-features-item mb-50">
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
                            <div class="core-features-item mb-50">
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
                            <div class="core-features-item mb-50">
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
                            <div class="core-features-item mb-50">
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
