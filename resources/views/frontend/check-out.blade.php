@extends('layouts.front_end')
@section('content')
<div>
    <style>
        #headerOneCheckOut, #sticky-header, #headerThreeCheckout, #footerOneCheckOut{
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
        <section class="checkout-area pt-10 pb-20">
            <div class="container">
                <a href="{{ route('home') }}" class="pt-10"><i class="fas fa-backspace" style="color: red;font-size: 30px;"></i></a>
                <form id="checkout" method="POST" action="{{ route('confirm-order') }}" enctype="multipart/form-data" class="checkout-form" accept-charset="utf-8">
                   @csrf
                   <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="checkout-wrap">
                            <h5 class="title text-center" style="color: #ff5c00;">কুইক চেকআউট</h5>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label for="fName">আপনার নাম<span>*</span></label>
                                            <input type="text" name="fName" required value="@if(Auth::user()){{Auth::user()->name}}@endif" placeholder="আপনার নাম লিখুন">
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
                                            <input type="text" name="mobile" required value="@if(Auth::user()){{Auth::user()->mobile}}@endif" placeholder="মোবাইল নাম্বার লিখুন">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label>জেলা *</label>
                                            <select class="custom-select" id="district" name="district" required>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="New York">Chittagang</option>
                                                <option value="California">Barisal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-grp">
                                            <label>উপজেলা *</label>
                                            <select class="custom-select" id="district" name="district" required>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="New York">Chittagang</option>
                                                <option value="California">Barisal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-grp">
                                            <label for="shipping_address">পূর্ণ ঠিকানা*</label>
                                            <input type="text" name="shipping_address" required value="@if(Auth::user()){{Auth::user()->address}}@endif" placeholder="আপনার পূর্ণ ঠিকানা লিখুন">
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <aside class="shop-cart-sidebar checkout-sidebar py-3">
                            <div class="shop-cart-widget">
                                <h6 class="title">শপিংব্যাগ সর্বমোট বিল</h6>
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
                                            <label class="custom-control-label" for="customCheck4">ক্যাশ অন ডেলিভারি</label>
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
                                    <button class="btn btn-submit" type="submit" style="background-color:red;">অর্ডার সম্পন্ন করুন</button>
                            </div>
                        </aside>
                    </div>

                </div>
            </form>
            </div>
        </section>
        <!-- checkout-area-end -->
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
