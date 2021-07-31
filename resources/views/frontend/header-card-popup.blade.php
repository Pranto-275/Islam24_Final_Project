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
    <li class="d-flex align-items-start">

        <div class="cart-content">
            <h4>
                <a href="#">Op's there is no product</a>
            </h4>
        </div>
    </li>
@endif
<li>
    <div class="total-price">
        <span class="f-left">Total:</span>
        <span class="f-right">$ {{ $cardBadge['data']['total_price'] }}</span>
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
        $('.btn-product-delete').on('click', function () {
            var productId = $(this).attr('data-product-id');
            //console.log(productId)
            productDelete(productId)
        });
    })
    function productDelete(productId) {
        $.ajax({
            method:'POST',
            url: '{{ route('ajax-add-to-card-product-delete') }}',
            data: {
                "product_id" : productId
            },
            success: function (result, text) {
                if(result.errorStatus) {
                    alert(result.message);

                    return false;
                }
                console.log(result.data.number_of_product)
                $('#li_row_'+productId).remove();
                $('.cart-total-price').html(result.data.total_price)
                $('.cart-count').html(result.data.number_of_product)
            },
            error: function (request, status, error) {
                var responseText = JSON.parse(request.responseText);
                //console.log(responseText.message)
                var errorText = '';
                $.each(responseText.errors, function(key, item) {
                    //console.log(key+' ---- ' +item);
                    errorText += item +'\n';
                });

                alert(errorText)
            }
        })
    }
</script>
