@extends('layouts.front_end')
@section('content')
<div>
    <x-slot name="title">
        Cart
    </x-slot>
    <x-slot name="header">
        Cart
    </x-slot>
    <!-- main-area -->
    <form action="{{ route('check-out') }}">
        <!-- Start of Main -->
        <main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="active"><a href="{{ route('cart')}}">Shopping Cart</a></li>
                        <li><a href="{{ route('check-out')}}">Checkout</a></li>
                        <li><a href="{{ route('order-completed') }}">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cardBadge['data']['products'] as $productId => $product)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <div class="p-relative">
                                                <a href="product-default.html">
                                                    <figure>
                                                        <img @if($product['Info']['image']!='blank-product-image.png' )
                                                            src="{{ asset('storage/photo/'.$product['Info']['image']) }}"
                                                            @else src="{{ asset('image-not-available.jpg') }}" @endif
                                                            alt="product" width="300" height="338">
                                                    </figure>
                                                </a>
                                                <button type="submit" class="btn btn-close"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <a href="product-default.html">
                                                @if(strlen($product['Info']['product_name'])>23)
                                                {{ substr($product['Info']['product_name'], 0,22).'...' }}
                                                @else
                                                {{ $product['Info']['product_name'] }}
                                                @endif
                                            </a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">
                                                @if($currencySymbol)
                                                {{ $currencySymbol->symbol }}
                                                @endif
                                                {{ $product['unit_price'] }}
                                            </span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="input-group">
                                                <input
                                                    class="quantity form-control product_quantity product-quantity-cart"
                                                    type="number" min="1" max="100000"
                                                    id="product_quantity_{{ $productId }}"
                                                    data-product-id="{{ $productId }}"
                                                    data-minimum-quantity="{{ $product['minimum_order_quantity'] }}"
                                                    value="{{ $product['quantity'] }}">
                                                <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">
                                                @if($currencySymbol)
                                                {{ $currencySymbol->symbol }}
                                                @endif
                                                {{ $product['total_price'] }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="cart-action mb-6">
                                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                        class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart"
                                    value="Clear Cart">Clear Cart</button>
                                <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart"
                                    value="Update Cart">Update Cart</button>
                            </div>

                            <form class="coupon">
                                <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                                <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..."
                                    required />
                                <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span>$100.00</span>
                                    </div>

                                    <hr class="divider">

                                    <ul class="shipping-methods mb-2">
                                        <li>
                                            <label class="shipping-title text-dark font-weight-bold">Shipping</label>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="free-shipping" class="custom-control-input"
                                                    name="shipping">
                                                <label for="free-shipping" class="custom-control-label color-dark">Free
                                                    Shipping</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="local-pickup" class="custom-control-input"
                                                    name="shipping">
                                                <label for="local-pickup" class="custom-control-label color-dark">Local
                                                    Pickup</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio">
                                                <input type="radio" id="flat-rate" class="custom-control-input"
                                                    name="shipping">
                                                <label for="flat-rate" class="custom-control-label color-dark">Flat
                                                    rate:
                                                    $5.00</label>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="shipping-calculator">
                                        <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                                        <form class="shipping-calculator-form">
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select name="country" class="form-control form-control-md">
                                                        <option value="default" selected="selected">United States
                                                            (US)
                                                        </option>
                                                        <option value="us">United States</option>
                                                        <option value="uk">United Kingdom</option>
                                                        <option value="fr">France</option>
                                                        <option value="aus">Australia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="select-box">
                                                    <select name="state" class="form-control form-control-md">
                                                        <option value="default" selected="selected">California
                                                        </option>
                                                        <option value="ohaio">Ohaio</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="town-city"
                                                    placeholder="Town / City">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" name="zipcode"
                                                    placeholder="ZIP">
                                            </div>
                                            <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                                                Totals</button>
                                        </form>
                                    </div>

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50">$100.00</span>
                                    </div>
                                    <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
    </form>
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
