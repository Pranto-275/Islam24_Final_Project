@extends('layouts.front_end')
@section('content')
    <div>
        <style>
            @media only screen and (min-width: 768px) {
                #cartForMobile{
                    display: none;
                }
            }
            @media only screen and (max-width: 768px) {
                #cartForDeskTop{
                    display: none;
                }
            }
        </style>
        <x-slot name="title">
            Cart
        </x-slot>
        <x-slot name="header">
            Cart
        </x-slot>
        <!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb-area breadcrumb-bg py-2" data-background="{{ URL::asset('venam/') }}/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content text-center">
                                <h2>Shopping Cart</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- shop-cart-area -->
            <section class="shop-cart-area wishlist-area pt-100 pb-100">
                <div class="container">
                    <div class="row justify-content-center">
                        {{-- For Block In Mobile id="cartForDeskTop" --}}
                        {{-- Start Cart --}}
                        <div class="col-lg-8 mb-1" id="">
                            <div class="table-responsive-xl">
                                @php $totalPrice = 0; @endphp
                                @if($cardBadge['data']['products'])
                                    @php $totalPrice = $cardBadge['data']['total_price'] @endphp
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">QUANTITY</th>
                                            <th class="product-subtotal">SUBTOTAL</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cardBadge['data']['products'] as $productId => $product)
                                            <tr id="row_{{ $productId }}">
                                                <td class="product-thumbnail"><a href="javascript:void(0)" class="wishlist-remove" data-product-id="{{ $productId }}"><i class="flaticon-cancel-1"></i></a><a href="shop-details.html"><img src="{{ URL::asset('venam/') }}/img/product/wishlist_thumb01.jpg" alt=""></a>
                                                </td>
                                                <td class="product-name">
                                                    <h4><a href="{{ route('product-details',['id'=>$productId]) }}" style="text-transform: capitalize;">{{ $product['Info']['product_name'] }}</a></h4>
                                                    <p>Cramond Leopard & Pythong Anorak</p>
                                                    <span>65% poly, 35% rayon</span>
                                                </td>
                                                <td class="product-price">
                                                    @if($currencySymbol)
                                                        {{ $currencySymbol->symbol }}
                                                    @endif
                                                    {{ $product['unit_price'] }}
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="cart-plus">
                                                        <form action="#">
                                                            <div class="cart-plus-minus" data-product-id="{{ $productId }}" data-device="desktop">
                                                                <input type="text" class="product_quantity product-quantity-cart" id="product_quantity_{{ $productId }}" data-product-id="{{ $productId }}" data-minimum-quantity="{{ $product['minimum_order_quantity'] }}" value="{{ $product['quantity'] }}">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" id="product_subtotal_{{ $productId }}">
                                                <span>
                                                    @if($currencySymbol)
                                                        {{ $currencySymbol->symbol }}
                                                    @endif
                                                    {{ $product['total_price'] }}
                                                </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{--<tr>
                                            <td class="product-thumbnail"><a href="#" class="wishlist-remove"><i class="flaticon-cancel-1"></i></a><a href="shop-details.html"><img src="{{ URL::asset('venam/') }}/img/product/wishlist_thumb01.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <h4><a href="{{route('product-view')}}">Woman Lathers Jacket</a></h4>
                                                <p>Cramond Leopard & Pythong Anorak</p>
                                                <span>65% poly, 35% rayon</span>
                                            </td>
                                            <td class="product-price">$ 29.00</td>
                                            <td class="product-quantity">
                                                <div class="cart-plus">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="2">
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span>$ 68.00</span></td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#" class="wishlist-remove"><i class="flaticon-cancel-1"></i></a><a href="shop-details.html"><img src="{{ URL::asset('venam/') }}/img/product/wishlist_thumb02.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name">
                                                <h4><a href="{{route('product-view')}}">Woman Lathers Jacket</a></h4>
                                                <p>Cramond Leopard & Pythong Anorak</p>
                                                <span>65% poly, 35% rayon</span>
                                            </td>
                                            <td class="product-price">$ 29.00</td>
                                            <td class="product-quantity">
                                                <div class="cart-plus">
                                                    <form action="#">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="2">
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span>$ 68.00</span></td>
                                        </tr>--}}
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-warning text-center">Op's there is no product</div>
                                @endif
                            </div>
                            <div class="shop-cart-bottom mt-20">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="cart-coupon">
                                            <form action="#">
                                                <input type="text" placeholder="Enter Coupon Code...">
                                                <button class="btn">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="continue-shopping">
                                            <a href="{{route('search-category-wise')}}" class="btn">Continue Shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Cart --}}
                        <div class="col-lg-4 col-md-8">
                            <aside class="shop-cart-sidebar">
                                <div class="shop-cart-widget">
                                    <h6 class="title">Cart Totals</h6>
                                    <form action="{{ route('check-out') }}">
                                        <ul>
                                            <li><span>SUBTOTAL</span>
                                                <span class="cart-total-price">
                                                    @if($currencySymbol)
                                                        {{ $currencySymbol->symbol }}
                                                    @endif
                                                    {{ $totalPrice }}
                                                </span></li>
                                            <li>
                                                <span>SHIPPING</span>
                                                <div class="shop-check-wrap">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">FLAT RATE: $15</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">FREE SHIPPING</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="cart-total-amount">
                                                <span>TOTAL</span>
                                                <span class="amount cart-total-price">
                                                @if($currencySymbol)
                                                        {{ $currencySymbol->symbol }}
                                                    @endif
                                                    {{ $totalPrice }}
                                                </span>
                                            </li>
                                        </ul>
                                        <button class="btn">PROCEED TO CHECKOUT</button>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop-cart-area-end -->

        </main>
    @endsection
    <!-- main-area-end -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

            });
        </script>
    </div>
    @push('scripts')

    @endpush
