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
    <section class="order-complete-area pt-20 pb-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="order-complete-bg" data-background="img/bg/order_comp_bg.png" style="background-color: rgb(241, 232, 232);">
                        <div class="order-complete-content">
                            <div style="color: black; font-weight: bold;"> আপনার অর্ডারটি কমপ্লিট হয়েছে!</div>
                            <div class="pt-2" style="color: black;font-size: 15px;"><span class="" style="color: red; font-size: 25px;">*</span>অর্ডার নাম্বার - <span style="color: red; font-weight: bold;">{{$orderCode}}</span></div>
                            {{-- <div class="check mb-5">
                                <img src="img/icon/check.png" alt="">
                            </div> --}}
                            <br><br>
                            <div style="color: black;font-weight: bold;">অর্ডার করার জন্যে আপনাকে অসংখ্য ধন্যবাদ!</div>
                            <div class="py-0 my-0" style="color: black;">আপনার অর্ডারটি প্রসেসিং অবস্থায় আছে,আমরা খুব অল্প সময়ের মধ্যে আপনার অর্ডারটি ডেলিভারি করে দিব,ইনশা-আল্লাহ।</div>
                            <a href="{{route('my-account')}}" class="btn" style="background-color: brown;">আপনার অর্ডার গুলি দেখুন</a>
                            <a href="{{route('home')}}" class="btn mt-2">আরও অর্ডার করুন</a>
                            {{-- <p class="get-ans">Get answers to all your <a href="#">Questions</a> you might have.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order-complete-area-end -->
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
