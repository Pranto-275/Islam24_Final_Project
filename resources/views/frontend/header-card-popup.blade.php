@if($cardBadge['data']['products'])
<div style="height: 300px;overflow-y: scroll;">
    @foreach($cardBadge['data']['products'] as $productId => $product)
        <li class="d-flex align-items-start" id="li_row_{{ $productId }}">
            <div class="cart-img">
                <a href="#">
                    <img src="{{ asset('storage/photo/'.$product['Info']['image']) }}" alt="">
                </a>
            </div>
            <div class="cart-content">
                <h4>
                    <a href="#" style="text-transform: capitalize;">{{ $product['Info']['product_name'] }}</a>
                </h4>
                <div class="cart-price">
                    <span class="new">{{ $product['Info']['special_price'] }}</span>
                    <span>
                        <del>{{ $product['Info']['regular_price'] }}</del>
                    </span>
                </div>
                <div id="quantity_{{ $productId }}">
                    {{ $product['quantity'] }} X {{ $product['unit_price'] }} = {{ $product['total_price'] }}
                </div>
            </div>
            <div class="del-icon" >
                <a href="javascript:void(0)" class="btn-product-delete"  data-product-id="{{ $productId }}">
                    <i class="far fa-trash-alt"></i>
                </a>
            </div>
        </li>
    @endforeach
</div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        /*$('.btn-product-delete').on('click', function () {
            var productId = $(this).attr('data-product-id');
            //console.log(productId)
            productDeleteMiniCart(productId)
        });*/

        $(document).on('click','.btn-product-delete', function () {
            var productId = $(this).attr('data-product-id');
            //console.log(productId)
            productDeleteMiniCart(productId)
        });

        $(document).on('click', '.add-to-card', function () {
            //alert($(this).attr('data-product-id'))
            var productId = $(this).attr('data-product-id');
            $('.cart-total-price').html('');
            $('.cart-count').html('');
            $.ajax({
                method:'POST',
                url: '{{ route('ajax-add-to-card-store') }}',
                data: {
                    "product_id": productId
                },
                success: function (result, text) {
                    if(result.errorStatus) {
                        alert(result.message);

                        return false;
                    }

                    $('#total_mini_cart_amount').html(result.data.total_price)
                    $('.cart-total-price').html(result.data.total_price)
                    $('.cart-count').html(result.data.number_of_product)
                    //$("#clone_mini_cart").clone().appendTo(".minicart");
                    cloneMiniCart(result.data)
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
        })
    })
    function cloneMiniCart(data){
        const obj = JSON.parse(data.product_card.data);

        if ($('#li_row_'+data.product_card.product_id).length > 0) {
            $('#quantity_'+data.product_card.product_id).html('');
            $('#quantity_'+data.product_card.product_id).html(+data.product_card.quantity+' X '+data.product_card.unit_price+' = '+data.product_card.total_price);
        } else {
            $(".minicart").prepend('<li class="d-flex align-items-start" id="li_row_'+data.product_card.product_id+'">' +
                '<div class="cart-img"><a href="#"><img src="" alt=""></a></div>' +
                '<div class="cart-content"><h4><a href="#">'+obj.product_name+'</a></h4><div class="cart-price"><span class="new">'+obj.special_price+'</span><span><del>'+obj.regular_price+'</del></span></div><div id="quantity_'+data.product_card.product_id+'">'+data.product_card.quantity+' X '+data.product_card.unit_price+' = '+data.product_card.total_price+'</div></div>' +
                '<div class="del-icon" ><a href="javascript:void(0)" class="btn-product-delete"  data-product-id="'+data.product_card.product_id+'"><i class="far fa-trash-alt"></i></a></div>'
            );
        }
    }
    function productDeleteMiniCart(productId) {
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

                $('#row_'+productId).remove();
                $('#li_row_'+productId).remove();
                $('#total_mini_cart_amount').html(result.data.data.total_price)
                $('.cart-total-price').html(result.data.data.total_price)
                $('.cart-count').html(result.data.data.number_of_product)
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
