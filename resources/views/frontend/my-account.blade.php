@extends('layouts.front_end')
@section('content')
<div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        .image-upload>input {
            display: none;
        }

        #profile-submit-button {
            display: none;
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
    </style>
    <x-slot name="title">
        Category
    </x-slot>
    <x-slot name="header">
        Category
    </x-slot>

    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <a class="log-out-btn text-danger border border-danger p-1 pt-2 rounded"
        href="#"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
            class="bx bx-power-off font-size-16 align-middle text-danger"></i>
        লগ আউট</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST"
        style="display: none;">
        {{ csrf_field() }}
    </form>
        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">

                        <li class="nav-item">
                            <a href="#account-orders" class="nav-link active">Order List</a>
                        </li>
                        <li class="nav-item">
                            <a href="#change-password" class="nav-link">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="#delivery-address" class="nav-link">Delivery Address</a>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">
                        <div class="tab-pane" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">John Doe</span>
                                (not
                                <span class="text-dark font-weight-bold">John Doe</span>?
                                <a href="#" class="text-primary">Log out</a>)
                            </p>

                            <p class="mb-4">
                                From your account dashboard you can view your <a href="#account-orders"
                                    class="text-primary link-to-tab">recent orders</a>,
                                manage your <a href="#delivery-address" class="text-primary link-to-tab">shipping
                                    and billing
                                    addresses</a>, and
                                <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                    account details.</a>
                            </p>

                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-orders">
                                                <i class="w-icon-orders"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#change-password" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-download">
                                                <i class="w-icon-download"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Downloads</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#delivery-address" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-address">
                                                <i class="w-icon-map-marker"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Addresses</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-account">
                                                <i class="w-icon-user"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="wishlist.html" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-wishlist">
                                                <i class="w-icon-heart"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-logout">
                                                <i class="w-icon-logout"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Logout</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane active in mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-orders">
                                    <i class="w-icon-orders"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                    <tr>
                                        <th class="order-id">Order</th>
                                        <th class="order-date">Date</th>
                                        <th class="order-status">Status</th>
                                        <th class="order-total">Total</th>
                                        <th class="order-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($contact->Order))
                                    @foreach ($contact->Order as $order)
                                    <tr>
                                        <td class="order-id">{{$order->code}}</td>
                                        <td class="order-date">{{date('d F Y', strtotime($order->order_date))}}</td>
                                        <td class="order-status">{{$order->status}}</td>
                                        <td class="order-total">
                                            <span class="order-price">
                                                @if($currencySymbol)
                                                <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                                @endif
                                                {{$order->total_amount}}
                                            </span> for
                                            <span class="order-quantity">{{ count($order->OrderDetail) }}</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="change-password">
                            <h5 class="card-title">Change Password</h5>
                            <hr class="mt-2">
                            <form id="change-password-customer" action="{{ route('change-password-customer') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="oldpassword" id="oldpassword" type="password" class="form-control"
                                            placeholder="পূর্বের পাসওয়ার্ড" required />
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input name="newpassword" id="newpassword" type="password" class="form-control"
                                            placeholder="নতুন পাসওয়ার্ড" required />
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <input name="password_confirmation" id="password_confirmation" type="password"
                                            class="form-control" placeholder="কনফার্ম পাসওয়ার্ড" required />
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary mt-2">Change</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>

                        <div class="tab-pane" id="delivery-address">
                              {{-- Start Delivery Address --}}
                              <div class="card-body basic tab-pane" id="delivery-address">
                                <form action="{{ route('edit-shipping-address') }}" method="POST">
                                    @csrf
                                    <h5 class="card-title">ডেলিভারি এড্রেস</h5>
                                    <hr class="mt-2">
                                    {{-- <div class="row">
                                  <div class="col-6 pb-2 font-weight-bold">Delivery Address:</div>
                                  <div class="col-6 pb-2">
                                      <input class="form-control" type="shipping_address" name="shipping_address" value="@if(Auth::user()->Contact) {{Auth::user()->Contact->shipping_address}}
                                    @endif" name="email"/>
                            </div>
                            <hr>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-grp">
                                    <label for="fName" style="color: black;">দোকানের নাম<span>*</span></label>
                                    <input class="form-control" type="text" name="business_name" required
                                        value="@if(Auth::user() && Auth::user()->Contact){{Auth::user()->Contact->business_name}}@endif"
                                        placeholder="আপনার দোকানের নাম লিখুন">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-grp">
                                    <label for="mobile" style="color: black;">মোবাইল নাম্বার<span>*</span></label>
                                    <input class="form-control" type="text" name="mobile" required
                                        value="@if(Auth::user() && Auth::user()->Contact){{Auth::user()->Contact->mobile}}@endif"
                                        placeholder="মোবাইল নাম্বার লিখুন">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-1">
                                <div class="form-grp">
                                    <label style="color: black;">জেলা *</label>
                                    <select class="form-control custom-select district" name="district_id" required>
                                        <option value="">সিলেক্ট করুন</option>
                                        @foreach ($Districts as $zilla)
                                        <option value="{{$zilla->id}}"
                                            class="district-items division_id_{{$zilla->division_id}} "
                                            @if(Auth::user()->Contact && !Auth::user()->Contact->District) @if($zilla->name=='Dhaka') selected
                                            @endif @elseif(Auth::user()->Contact && $zilla->name==Auth::user()->Contact->District->name) selected
                                            @endif style="color:black;">{{$zilla->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6 mt-1">
                                <div class="form-grp">
                                    <label style="color: black;">উপজেলা *</label>
                                    <select class="custom-select form-control" id="district" name="district" required>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="New York">Chittagang</option>
                                        <option value="California">Barisal</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-12 mt-1">
                                <div class="form-grp">
                                    <label for="shipping_address" style="color: black;">পূর্ণ ঠিকানা*</label>
                                    {{-- <input class="form-control" type="text" name="shipping_address" required
                                        value="@if(Auth::user()){{Auth::user()->Contact->shipping_address}}@endif"
                                    placeholder="আপনার পূর্ণ ঠিকানা লিখুন" style="height: 50px;"> --}}
                                    <textarea id="shipping_address" class="form-control" name="shipping_address"
                                        placeholder="আপনার পূর্ণ ঠিকানা লিখুন" style="height: 100px;" required
                                        placeholder="আপনার পূর্ণ ঠিকানা লিখুন">@if(Auth::user() && Auth::user()->Contact){{Auth::user()->Contact->shipping_address}}@endif</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                            </div>
                        </div>

                        <br>
                        </form>
                    </div>
                    {{-- End Delivery Address --}}

                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-account mr-2">
                                    <i class="w-icon-user"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First name *</label>
                                            <input type="text" id="firstname" name="firstname" placeholder="John"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last name *</label>
                                            <input type="text" id="lastname" name="lastname" placeholder="Doe"
                                                class="form-control form-control-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="display-name">Display name *</label>
                                    <input type="text" id="display-name" name="display_name" placeholder="John Doe"
                                        class="form-control form-control-md mb-0">
                                    <p>This will be how your name will be displayed in the account section and in
                                        reviews</p>
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email_1">Email address *</label>
                                    <input type="email" id="email_1" name="email_1"
                                        class="form-control form-control-md">
                                </div>

                                <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">Current Password leave blank to leave
                                        unchanged</label>
                                    <input type="password" class="form-control form-control-md" id="cur-password"
                                        name="cur_password">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">New Password leave blank to leave
                                        unchanged</label>
                                    <input type="password" class="form-control form-control-md" id="new-password"
                                        name="new_password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md" id="conf-password"
                                        name="conf_password">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->

</div>

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
		$('#edit-info-customer').ajaxForm({
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    // Start Image Image Preview
    $('#file-input').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#imagePreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

    });
    // End Image Preview
  $('#profile_photo_path').ajaxForm({
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
$( "#profile_photo_path" ).change(function() {
    $("#profile-submit-button").css("display", "block");
});
</script>
@endsection
