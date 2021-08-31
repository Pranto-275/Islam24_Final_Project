@extends('layouts.front_end')
@section('content')
<form id="checkout" method="POST" action="{{ route('confirm-order') }}" enctype="multipart/form-data"
    class="checkout-form" accept-charset="utf-8">

    <div>
        <style>
            #headerOneCheckOut,
            #sticky-header,
            #headerThreeCheckout,
            #footerOneCheckOut {
                display: none;
            }
            }

            table {
                border: 1px solid #ccc;
                border-collapse: collapse;
                margin: 0;
                padding: 0;
                width: 100%;
                table-layout: fixed;
            }

            table caption {
                font-size: 1.5em;
                margin: .5em 0 .75em;
            }

            table tr {
                background-color: #fdfdfd;
                border: 1px solid #ddd;
                padding: .35em;
            }

            table th,
            table td {
                padding: .625em;
                text-align: center;
            }

            table th {
                font-size: .85em;
                letter-spacing: .1em;
                text-transform: uppercase;
            }

            @media screen and (max-width: 600px) {
                table {
                    border: 0;
                }

                table caption {
                    font-size: 1.3em;
                }

                table thead {
                    border: none;
                    clip: rect(0 0 0 0);
                    height: 1px;
                    margin: -1px;
                    overflow: hidden;
                    padding: 0;
                    position: absolute;
                    width: 1px;
                }

                table tr {
                    border-bottom: 3px solid #ddd;
                    display: block;
                    margin-bottom: .625em;
                }

                table td {
                    border-bottom: 1px solid #ddd;
                    display: block;
                    font-size: .8em;
                    text-align: right;
                }

                table td::before {
                    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
                    content: attr(data-label);
                    float: left;
                    font-weight: bold;
                    text-transform: uppercase;
                }

                table td:last-child {
                    border-bottom: 0;
                }
            }

            /* general styling */
            body {
                font-family: "Open Sans", sans-serif;
                line-height: 1.25;
            }

            #mobileResponsiveFooter {
                display: none;
            }
        </style>
        <x-slot name="title">
            Category
        </x-slot>
        <x-slot name="header">
            Category
        </x-slot>

        <main>
            <!-- checkout-area -->
            <section class="checkout-area pb-20">
                <div class="text-center py-2 rounded" style="background-color: black;">
                    <a href="{{ route('home') }}" class="float-left">
                        {{-- <i class="fas fa-backspace"
                        style="color: rgb(0, 0, 0);font-size: 30px;"></i> --}}
                        <i class="fas fa-arrow-left pl-1" style="color: white;font-size: 20px;"></i>
                    </a>
                        <span class="mt-1" style="color: white;font-weight: bold; font-size: 16px;">কুইক চেকআউট</span>
                </div>
                {{-- <hr class="mb-0 mt-3">
                <br>
                <br> --}}
                <div class="container pt-10">

                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="checkout-wrap">
                                {{-- <h5 class="title text-center mt-2" style="color: #ff5c00;">কুইক চেকআউট</h5> --}}
                                <div class="row">
                                    @if(!Auth::user())
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label for="fName">আপনার নাম<span>*</span></label>
                                            <input type="text" name="fName" required
                                                value="@if(Auth::user()){{Auth::user()->name}}@endif"
                                                placeholder="আপনার নাম লিখুন">
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="form-grp">
                                            <label for="fName">Last Name <span>*</span></label>
                                            <input type="text" name="lName" required>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label for="mobile">মোবাইল নাম্বার<span>*</span></label>
                                            <input type="text" name="mobile" required
                                                value="@if(Auth::user()){{Auth::user()->mobile}}@endif"
                                                placeholder="মোবাইল নাম্বার লিখুন">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label>জেলা *</label>
                                            <select class="custom-select" id="district" name="district" required>
                                                @foreach ($zillas as $zilla)
                                                <option value="{{$zilla->id}}" @if($zilla->bn_name=="ঢাকা") selected
                                                    @endif>{{$zilla->bn_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label>উপজেলা *</label>
                                            <select class="custom-select" id="district" name="district" required>
                                                @foreach ($upazillas as $upazilla)
                                                <option value="{{ $upazilla->bn_name}}">{{ $upazilla->bn_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-grp">
                                            <label for="shipping_address">পূর্ণ ঠিকানা*</label>
                                            <input type="text" name="shipping_address" required
                                                value="@if(Auth::user()){{Auth::user()->address}}@endif"
                                                placeholder="আপনার পূর্ণ ঠিকানা লিখুন">
                                        </div>
                                    </div>
                                    @endif
                                    @if(Auth::user())
                                    <div class="col-12 mt-0 mb-0 pb-0 pt-4">
                                        <div class="form-grp mt-0 pt-1">
                                            <label for="shipping_address" style="font-weight: bold;">ডেলিভারি এড্রেস</label>
                                            <input type="text" name="shipping_address" required
                                                value="@if(Auth::user()){{Auth::user()->Contact->shipping_address}}@endif" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-0 pt-0">
                                        <div class="form-grp mt-0 pt-0">
                                            <label for="shipping_address" style="font-weight: bold;">মোবাইল নাম্বার</label>
                                            <input type="text" name="shipping_address" required
                                                value="@if(Auth::user()){{Auth::user()->Contact->mobile}}@endif" readonly>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    {{-- Start Cart Product --}}
                    <h5 class="text-center" style="color: #ff5c00;">আপনার অর্ডারকৃত পণ্যসমূহ</h5>
                    <div class="table-responsive-xl">
                        @php $totalPrice = 0; @endphp
                        @if($cardBadge['data']['products'])
                        @php $totalPrice = $cardBadge['data']['total_price'] @endphp
                        <table class="" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail"></th>
                                    {{-- <th scope="col" class="product-name" style="font-weight: bold;">পণ্য</th> --}}
                                    <th scope="col" class="product-price" style="font-weight: bold;">মূল্য</th>
                                    <th scope="col" class="product-quantity" style="font-weight: bold;">সংখ্যা</th>
                                    <th scope="col" class="product-subtotal" style="font-weight: bold;">SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cardBadge['data']['products'] as $productId => $product)
                                <tr id="row_{{ $productId }}" style="color: black;">
                                    <td class="product-thumbnail" style="border-style: none;">
                                        <a href="javascript:void(0)" class="wishlist-remove"
                                            data-product-id="{{ $productId }}"><i class="flaticon-cancel-1 text-danger"
                                                style="font-weight: bold;"></i></a>
                                        <a href="{{ route('product-details',['id'=>$productId]) }}" style="float:left;">
                                            <img src="{{ asset('storage/photo/'.$product['Info']['image']) }}"
                                                style="height: 90px;width:103px;129px;" alt="">
                                        </a>
                                        {{-- </td>
                                 <td class="product-name">
                                     <h4> --}}
                                        <a href="{{ route('product-details',['id'=>$productId]) }}"
                                            style="text-transform: capitalize;float: left;font-weight: bold;color: black;">
                                            @if(strlen($product['Info']['product_name'])>23)
                                            {{ substr($product['Info']['product_name'], 0,22).'...' }}
                                            @else
                                            {{ $product['Info']['product_name'] }}
                                            @endif
                                        </a>

                                        {{-- </h4> --}}
                                        {{-- <p>Cramond Leopard & Pythong Anorak</p>
                                     <span>65% poly, 35% rayon</span> --}}
                                    </td>
                                    <td data-label="মূল্য" class="product-price" style="border-style: none;">
                                        @if($currencySymbol)
                                        {{ $currencySymbol->symbol }}
                                        @endif
                                        {{ $product['unit_price'] }}
                                    </td>
                                    <td data-label="সংখ্যা" class="product-quantity py-0 mt-3 pl-2"
                                        style="height: 50px;color: black;">
                                        <div class="cart-plus float-right">
                                            <form action="#">
                                                <div class="cart-plus-minus" data-product-id="{{ $productId }}"
                                                    data-device="desktop">
                                                    <input type="text" class="product_quantity product-quantity-cart"
                                                        id="product_quantity_{{ $productId }}"
                                                        data-product-id="{{ $productId }}"
                                                        data-minimum-quantity="{{ $product['minimum_order_quantity'] }}"
                                                        value="{{ $product['quantity'] }}">
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                    </td>
                                    <td data-label="SUBTOTAL" class="product-subtotal"
                                        id="product_subtotal_{{ $productId }}" style="font-weight: bold;">
                                        <span>
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
                        @else
                        <div class="alert alert-warning text-center">প্রিয় কাস্টমার, আপনি এখনো কোন প্রডাক্ট শপিংব্যাগে যুক্ত করেননি,দুঃখিত।</div>
                        @endif
                    </div>
                    {{-- End Cart Product --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <aside class="shop-cart-sidebar checkout-sidebar py-1">
                            <div class="shop-cart-widget py-0 my-0 pt-1">
                                <h6 class="title text-center">শপিংব্যাগ সর্বমোট বিল</h6>
                                <ul>
                                    <li style="color: black;"><span>SUBTOTAL:</span>
                                        @if($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                            @endif
                                        {{ $cardBadge['data']['total_price'] }}
                                    </li>
                                    <li style="display: none">
                                        <span>SHIPPING</span>
                                        <div class="shop-check-wrap">
                                            @if($shipping_charge)
                                            @foreach ($shipping_charge as $shippingCharge )
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="shipping_charge" class="shipping-charge"
                                                    id="customCheck_"
                                                    value="{{$shippingCharge->shipping_fee}}">{{$shippingCharge->title}}:
                                                {{$shippingCharge->shipping_fee}}
                                                {{--<input type="radio" name="shipping_charge" class="custom-control-input" id="customCheck_">
                                                <label class="custom-control-label" for="customCheck1">{{$shippingCharge->title}}:
                                                {{$shippingCharge->shipping_fee}}</label>--}}
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="shipping_charge" class="shipping-charge"
                                                    id="customCheck_" value="0" checked> FREE SHIPPING
                                                {{--<input type="radio" name="shipping_charge" class="custom-control-input" id="customCheck_">
                                                <label class="custom-control-label" for="customCheck2">FREE SHIPPING</label>--}}
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="cart-total-amount py-1" style="color: black; ">
                                        <span>ডিসকাউন্ট:</span>
                                        <span>
                                            @if($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                            @endif
                                            0
                                        </span>
                                    </li>
                                    <li class="cart-total-amount pt-2" style="color: black;font-weight: bold;">
                                        <span>সর্বমোট বিল:</span>
                                        <input type="hidden" name="check_out_total_amount"
                                            class="check-out-total-amount"
                                            value="{{ $cardBadge['data']['total_price'] }}">
                                        <span class="amount check-out-total-amount">
                                            @if($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                            @endif
                                            {{ $cardBadge['data']['total_price'] }}
                                        </span>
                                    </li>
                                </ul>
                                <div class="bank-transfer">
                                    {{-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                                        <label class="custom-control-label" for="customCheck4">ক্যাশ অন
                                            ডেলিভারি</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">bKash</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Nagad</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Rocket</label>
                                    </div> --}}
                                    <input type="checkbox" class="mb-3" id="customCheck4" checked>
                                    <label class="mb-3" for="customCheck4" style="color: black;">ক্যাশ অন
                                        ডেলিভারি</label>
                                </div>

                                {{-- <div class="paypal-method">
                                    <div class="paypal-method-flex">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">Nagad</label>
                                        </div>
                                        <div class="paypal-logo"><img src="img/images/paypal_logo.png" alt=""></div>
                                    </div>
                                    <p>Pay via PayPal; you can pay with your credit
                                    card if you don’t have a PayPal account</p>
                                </div> --}}
                                {{-- <div class="paypal-method">
                                    <div class="paypal-method-flex">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                            <label class="custom-control-label" for="customCheck6">Payments on Card</label>
                                        </div>
                                        <div class="paypal-logo"><img src="img/images/payment_card.png" alt=""></div>
                                    </div>
                                </div> --}}
                                <div class="payment-terms py-0 my-0" style="color: black; font-size: 12px;">
                                    * I have read and agree to the website
                                    <a href="{{route('terms-conditios')}}">terms
                                        and conditions</a>
                                </div>
                                <button class="btn btn-submit" type="submit" style="background-color:red;width: 100%;"
                                    id="orderFinishCheckout">অর্ডার
                                    সম্পন্ন করুন</button>
                            </div>
                            <br>
                            <br>
                        </aside>
                    </div>
                </div>
            </section>
            <!-- checkout-area-end -->
        </main>
        <!-- end row -->

    </div>
    <button class="btn btn-submit" type="submit"
        style="position: fixed;bottom: 0px;right: 0px;width: 100%;background-color:red;"
        id="orderFinishCheckoutMobile">অর্ডার সম্পন্ন করুন</button>
</form>
<script>
    $(document).ready(function (){
        $('.shipping-charge').on('change', function (){
            var subTotal = {{ $cardBadge['data']['total_price'] }}
            var shippingCharge = 0;
            if( $(this).is(":checked") ){
                shippingCharge = parseFloat($(this).val());
            }
            $(".check-out-total-amount").html(shippingCharge+subTotal)
            $(".check-out-total-amount").val(shippingCharge+subTotal)
        })
    })
</script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){
jQuery('#district').change(function(e){
e.preventDefault();
// alert(jQuery('#district').val());
$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
   }
});
jQuery.ajax({
   url: "{{ url('upazila-search') }}",
   method: 'post',
   data: {
      name: jQuery('#district').val(),
   },
   success: function(result){
      jQuery('.alert').show();
      jQuery('.alert').html(result.success);
   }});
});
});
</script>

@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
 $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

  $(".btn-submit").click(function(e){
   e.preventDefault();
   let fName = $("#fName").val();
   let lName = $("#lName").val();
   let mobile = $("#mobile").val();
   let shipping_address = $("#shipping_address").val();
   let district = $("#district").val();
  $.ajax({

   type:'POST',
   url:"{{ route('confirm-order') }}",
data:{"_token": "{{ csrf_token() }}", fName:fName, lName:lName, mobile:mobile, shipping_address:shipping_address,
district:district},

success:function(response){
// console.log(data);
},

});

// console.log(fName);
});
</script> --}}
{{-- @push('scripts')

<script src="assets/libs/select2/js/select2.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/ecommerce-select2.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
@endpush --}}
@section('script')
<script>
    // $(document).ready(function(){

	// 	$('#checkout').ajaxForm({
	// 		beforeSend: formBeforeSend,
	// 		beforeSubmit: formBeforeSubmit,
	// 		error: formError,
	// 		success: function (responseText, statusText, xhr, $form) {
	// 			// window.location.replace(responseText.redirect_url);
    //             formSuccess(responseText, statusText, xhr, $form);
	// 		},
	// 		clearForm: true,
	// 		resetForm: true
	// 	});


	// });
</script>
@endsection
