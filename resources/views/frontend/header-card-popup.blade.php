@if($cardBadge['data']['products'])
    @foreach($cardBadge['data']['products'] as $productId => $product)
        <li class="d-flex align-items-start" id="li_row_{{ $productId }}">
            <div class="cart-img">
                <a href="#">
                    <img src="{{ URL::asset('venam/') }}/img/product/cart_p01.jpg" alt="">
                </a>
            </div>
            <div class="cart-content">
                <h4>
                    <a href="#">{{ $product['Info']['product_name'] }}</a>
                </h4>
                <div class="cart-price">
                    <span class="new">{{ $product['Info']['special_price'] }}</span>
                    <span>
                        <del>{{ $product['Info']['regular_price'] }}</del>
                    </span>
                </div>
            </div>
            <div class="del-icon" >
                <a href="javascript:void(0)" class="btn-product-delete"  data-product-id="{{ $productId }}">
                    <i class="far fa-trash-alt"></i>
                </a>
            </div>
        </li>
    @endforeach
@else
    {{--<li class="d-flex align-items-start">

        <div class="cart-content">
            <h4>
                <a href="#">Op's there is no product</a>
            </h4>
        </div>
    </li>--}}
@endif

<li>
    <div class="total-price">
        <span class="f-left">Total:</span>
        <span class="f-right" id="total_mini_cart_amount">$ {{ $cardBadge['data']['total_price'] }}</span>
    </div>
</li>
<li>
    <div class="checkout-link">
        <a href="{{ route('cart') }}">Shopping Cart</a>
        <a class="red-color" href="{{ route('check-out') }}">Checkout</a>
    </div>
</li>

<script>
    $(document).ready(function (){

    })

</script>
