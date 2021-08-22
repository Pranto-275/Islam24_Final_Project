@extends('layouts.front_end')
@section('content')
<div>

    <x-slot name="title">
        Category
    </x-slot>
    <x-slot name="header">
       Category
    </x-slot>

    <main>
        <!-- checkout-area -->
        <section class="checkout-area pt-50 pb-100">
            <div class="container">
                <form id="checkout" method="POST" action="{{ route('confirm-order') }}" enctype="multipart/form-data" class="checkout-form" accept-charset="utf-8">
                   @csrf
                   <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="checkout-wrap">
                            <h5 class="title">Quick Checkout</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-grp">
                                            <label for="fName">First Name <span>*</span></label>
                                            <input type="text" name="fName" required value="@if(Auth::user()){{Auth::user()->name}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-grp">
                                            <label for="fName">Last Name <span>*</span></label>
                                            <input type="text" name="lName" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label for="mobile">Your Mobile <span>*</span></label>
                                            <input type="text" name="mobile" required value="@if(Auth::user()){{Auth::user()->mobile}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-grp">
                                            <label for="shipping_address">Shipping ADDRESS *</label>
                                            <input type="text" name="shipping_address" required value="@if(Auth::user()){{Auth::user()->address}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label>District *</label>
                                            <select class="custom-select" id="district" name="district" required>
                                                <option value="New York">Chittagang</option>
                                                <option value="California">Barisal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <aside class="shop-cart-sidebar checkout-sidebar">
                            <div class="shop-cart-widget">
                                <h6 class="title">Cart Totals</h6>
                                    <ul>
                                        <li><span>SUBTOTAL</span> {{ $cardBadge['data']['total_price'] }}</li>
                                        <li>
                                            <span>SHIPPING</span>
                                            <div class="shop-check-wrap">
                                                @if($shipping_charge)
                                                @foreach ($shipping_charge as $shippingCharge )
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="shipping_charge" class="shipping-charge" required id="customCheck_" value="{{$shippingCharge->shipping_fee}}">{{$shippingCharge->title}}: {{$shippingCharge->shipping_fee}}
                                                    {{--<input type="radio" name="shipping_charge" class="custom-control-input" id="customCheck_">
                                                    <label class="custom-control-label" for="customCheck1">{{$shippingCharge->title}}: {{$shippingCharge->shipping_fee}}</label>--}}
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" name="shipping_charge" class="shipping-charge" id="customCheck_" value="0" checked> FREE SHIPPING
                                                    {{--<input type="radio" name="shipping_charge" class="custom-control-input" id="customCheck_">
                                                    <label class="custom-control-label" for="customCheck2">FREE SHIPPING</label>--}}
                                                </div>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="cart-total-amount"><span>TOTAL</span>
                                            <input type="hidden" name="check_out_total_amount" class="check-out-total-amount" value="{{ $cardBadge['data']['total_price'] }}">
                                            <span class="amount check-out-total-amount" >{{ $cardBadge['data']['total_price'] }}</span>
                                        </li>
                                    </ul>
                                    <div class="bank-transfer">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">Cash On Delivery</label>
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
                                        </div>
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
                                    <div class="payment-terms">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                            <label class="custom-control-label" for="customCheck7">I have read and agree to the website terms
                                            and conditions *</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-submit" type="submit">Confirm</button>
                            </div>
                        </aside>
                    </div>

                </div>
            </form>
            </div>
        </section>
        <!-- checkout-area-end -->

                    <!-- core-features -->
                    <section class="core-features-area core-features-style-two">
                        <div class="container">
                            <div class="core-features-border">
                                <div class="row justify-content-center">
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="core-features-item mb-50">
                                            <div class="core-features-icon">
                                                <img src="img/icon/core_features01.png" alt="">
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
                                                <img src="img/icon/core_features02.png" alt="">
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
                                                <img src="img/icon/core_features03.png" alt="">
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
                                                <img src="img/icon/core_features04.png" alt="">
                                            </div>
                                            <div class="core-features-content">
                                                <h6>Online Support</h6>
                                                <span>30 days money back guarantee</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- core-features-end -->
    </main>
    <!-- end row -->

</div>
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
   data:{"_token": "{{ csrf_token() }}", fName:fName, lName:lName, mobile:mobile, shipping_address:shipping_address, district:district},

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
	$(document).ready(function(){
		$('#checkout').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				// window.location.replace(responseText.redirect_url);
                formSuccess(responseText, statusText, xhr, $form);
			},
			clearForm: true,
			resetForm: true
		});


	});
</script>
@endsection
