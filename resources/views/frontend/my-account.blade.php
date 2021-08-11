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
              {{-- Start My Account --}}
                 <div class="row">
                     {{-- Start Left Side --}}
                     <div class="col-md-4">
                         {{-- Start First Card --}}
                        <div class="card shadow-sm mb-3">
                            <center>
                            <img class="card-img-top rounded-circle mt-1" src="{{ asset('storage/photo/'.Auth::user()->profile_photo_path) }}" style="width:100px;height:100px;" alt="Profile Photo">
                            </center>
                            <div class="card-body">
                              <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                              <center>
                              <a href="#" class="btn px-0 py-2" style="width: 130px;background-color:rgb(110, 231, 175);">Check Account</a>
                              </center>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#basic-information" class="text-dark" data-toggle="tab">Basic Information</a></li>
                                {{-- <li class="list-group-item"><a class="text-dark" href="#address" data-toggle="tab">Addresses</a></li> --}}
                                <li class="list-group-item"><a class="text-dark" href="#order" data-toggle="tab">Orders</a></li>
                                {{-- <li class="list-group-item"><a id="#" class="text-dark" href="#" data-toggle="tab">Unconfirmed Orders</a></li> --}}
                                {{-- <li class="list-group-item"><a id="#" class="text-dark" href="#" data-toggle="tab">Reviews</a></li> --}}
                                {{-- <li class="list-group-item"><a id="#" class="text-dark" href="#" data-toggle="tab">Refund Settlements</a></li> --}}
                                <li class="list-group-item"><a class="text-dark" href="#change-password" data-toggle="tab">Change Password</a></li>
                                {{-- <li class="list-group-item"><a id="#" class="text-dark" href="#" data-toggle="tab">Appointment</a></li> --}}
                                <li class="list-group-item"><a class="text-dark" href="#transaction" data-toggle="tab">Transactions</a></li>
                            </ul>
                          </div>
                         {{-- End First Card --}}
                     </div>
                     {{-- End Left Side --}}

                     {{-- Start Right Side --}}
                     <div class="col-md-8">
                         {{-- Start Card For Basic Information --}}
                         <div class="card shadow-sm tab-content clearfix">
                            {{-- Start Basic Information Card --}}
                            <div class="card-body basic tab-pane active" id="basic-information">
                                @foreach ($contacts as $contact)
                                <h5 class="card-title">
                                    @if(Session::has('message'))
                                       <p class="alert alert-info">{{ Session::get('message') }}</p>
                                    @endif
                                </h5>
                                <form id="edit-info" action="{{ route('edit') }}" method="GET">
                                        @csrf
                                        <input type="number" value="{{$contact->id}}" name="editId" hidden/>
                                    <h5 class="card-title">
                                    Personal Information
                                    <input type="number" name="editId" value="{{ $contact->id }}" id="edit" hidden/>
                                    <button type="submit" class="float-right border p-1 rounded text-info">Edit</button>
                                    </h5>
                                    </form>
                                <hr class="mt-2">
                                <form id="edit-info-customer" action="{{ route('edit') }}" method="POST">
                                    @csrf
                                    <input type="number" name="editId" value="{{ $contact->id }}" id="edit" hidden/>
                                <div class="row">
                                  <div class="col-6 pb-2 font-weight-bold">First Name:</div>
                                  <div class="col-6 pb-2">
                                      {{-- {{$contact->first_name}} --}}
                                      <input @if(isset($EditId)) @if($EditId!=$contact->id) disabled @endif @else disabled @endif class="form-control" type="text" value="{{$contact->first_name}}" name="first_name"/>
                                  </div>
                                  <div class="col-6 pb-2 font-weight-bold">Last Name:</div>
                                  <div class="col-6 pb-2">
                                      {{-- {{$contact->last_name}} --}}
                                      <input @if(isset($EditId)) @if($EditId!=$contact->id) disabled @endif @else disabled @endif class="form-control" type="text" value="{{$contact->last_name}}" name="last_name"/>
                                  </div>
                                  <div class="col-6 pb-2 font-weight-bold">Contact Number:</div>
                                  <div class="col-6 pb-2">
                                      {{-- {{$contact->phone}} --}}
                                      <input @if(isset($EditId)) @if($EditId!=$contact->id) disabled @endif @else disabled @endif class="form-control" type="text" value="{{$contact->phone}}" name="phone"/>
                                  </div>
                                  <div class="col-6 pb-2 font-weight-bold">Date of Birth:</div>
                                  <div class="col-6 pb-2">
                                      {{-- {{$contact->birthday}} --}}
                                      <input @if(isset($EditId)) @if($EditId!=$contact->id) disabled @endif @else disabled @endif class="form-control" type="text" value="{{$contact->birthday}}" name="birthday"/>
                                  </div>
                                  <hr>
                                </div>
                                <h5 class="card-title">EMAIL ADDRESS</h5>
                                <hr class="mt-2">
                                <div class="row">
                                  <div class="col-6 pb-2 font-weight-bold">Primary Email:</div>
                                  <div class="col-6 pb-2">
                                      {{-- {{$contact->email}} --}}
                                      <input @if(isset($EditId)) @if($EditId!=$contact->id) disabled @endif @else disabled @endif class="form-control" type="email" value="{{$contact->email}}" name="email"/>
                                  </div>
                                  <div class="col-6 pb-2 font-weight-bold">Mobile:</div>
                                  <div class="col-6 pb-2">
                                      {{-- {{$contact->mobile}} --}}
                                      <input @if(isset($EditId)) @if($EditId!=$contact->id) readonly @endif @else disabled @endif class="form-control" type="text" value="{{$contact->mobile}}" name="mobile"/>
                                  </div>
                                  <hr>
                                </div>
                                <button type="submit" class="float-right border p-1 rounded text-info bg-info text-light" @if(isset($EditId)) @if($EditId!=$contact->id) disabled @endif @else disabled @endif>Save</button>
                                <br>
                               </form>
                                @endforeach
                              </div>
                              {{-- End Basic Information Card --}}
                              {{-- Start Address Card --}}
                              <div class="card-body basic tab-pane" id="address">
                                <h5 class="card-title">Address</h5>
                                <hr class="mt-2">
                                <div class="row">
                                   <div class="col-md-3 font-weight-bold">Full Name</div>
                                   <div class="col-md-3 font-weight-bold">Address</div>
                                   <div class="col-md-2 font-weight-bold">Region</div>
                                   <div class="col-md-2 font-weight-bold">Phone</div>
                                   <div class="col-md-2 font-weight-bold">Action</div>
                                   <div class="col-12">
                                    <hr class="mt-1">
                                   </div>
                                   <div class="col-md-3 font-weight-bold">Iqbal Hossain</div>
                                   <div class="col-md-3 font-weight-bold">Shahbagh, Dhaka</div>
                                   <div class="col-md-2 font-weight-bold">Dhaka</div>
                                   <div class="col-md-2 font-weight-bold">01700000000</div>
                                   <div class="col-md-2 font-weight-bold"></div>
                                   <div class="col-12">
                                    <hr class="mt-1 mx-5 mt-1">
                                   </div>
                                </div>
                              </div>
                              {{-- End Address Card --}}
                              {{-- Start Order Card --}}
                              <div class="card-body basic tab-pane" id="order">
                                <h5 class="card-title">Order</h5>
                                <hr class="mt-2">
                                <div class="row" style="overflow: scroll;">
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Discount</th>
                                            <th>S. Charge</th>
                                            <th>Payable</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                        @foreach ($contacts as $contact)
                                          @foreach ($contact->Order as $order)
                                          <tr>
                                            <th scope="row">{{++$i}}</th>
                                            <td>{{$order->order_date}}</td>
                                            <td>{{$order->total_amount}}</td>
                                            <td>{{$order->discount}}</td>
                                            <td>{{$order->shipping_charge}}</td>
                                            <td>{{$order->payable_amount}}</td>
                                          </tr>
                                          @endforeach
                                        @endforeach

                                        </tbody>
                                      </table>
                                </div>
                              </div>
                              {{-- End Order Card --}}
                               {{-- Start Change Password Card --}}
                               <div class="card-body basic tab-pane" id="change-password">
                                <h5 class="card-title">Change Password</h5>
                                <hr class="mt-2">
                                <form id="change-password-customer" action="{{ route('change-password-customer') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="oldpassword" id="oldpassword" type="text" class="form-control" placeholder="Old Password" required/>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input name="newpassword" id="newpassword" type="password" class="form-control" placeholder="New Password" required/>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required/>
                                        </div>
                                        <div class="col-md-12">
                                         <center>
                                             <button type="submit" style="background:rgb(9, 154, 238);margin-top:5px;padding:0.35em 1.2em;border:0.1em solid #FFFFFF;font-weight:300;color:#FFFFFF;text-align:center;">Change</button>
                                         </center>
                                        </div>
                                     </div>
                                </form>
                              </div>
                              {{-- End Change Password Card --}}
                              {{-- Start Transaction Card --}}
                              <div class="card-body basic tab-pane" id="transaction">
                                <h5 class="card-title">Order</h5>
                                <hr class="mt-2">
                                <div class="row" style="overflow: scroll;">
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Payment Method</th>
                                            <th>Transaction Id</th>
                                            <th>Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                        @foreach ($contacts as $contact)
                                           @foreach ($contact->Payment as $payment)
                                          <tr>
                                            <th scope="row">{{++$i}}</th>
                                            <td>{{$payment->date}}</td>
                                            <td>@if($payment->PaymentMethod) {{$payment->PaymentMethod->name}} @endif</td>
                                            <td>{{$payment->transaction_id}}</td>
                                            <td>{{$payment->amount}}</td>
                                          </tr>
                                           @endforeach
                                        @endforeach

                                        </tbody>
                                      </table>
                                </div>
                              </div>
                              {{-- End Transaction Card --}}
                          </div>

                         {{-- End Card For Basic Information --}}
                     </div>
                     {{-- End Right Side --}}
                 </div>
              {{-- End My Account --}}
            </div>
        </section>
        <!-- checkout-area-end -->

    </main>
    <!-- end row -->

</div>
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
		$('#change-password-customer').ajaxForm({
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
    $(document).ready(function(){
		$('#edit-info').ajaxForm({
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
