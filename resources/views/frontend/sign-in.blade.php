@extends('layouts.front_end')
@section('content')
<div>

    <x-slot name="title">
        Category
    </x-slot>
    <x-slot name="header">
        Category
    </x-slot>

    <!-- Start of Main -->
    <main class="main login-page">
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
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form method="POST" action="{{ route('customer_sign_in') }}" class="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Mobile *</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="text" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1"
                                            required="">
                                        <label for="remember1">Remember me</label>
                                        <a href="#">Last your password?</a>
                                    </div>
                                    {{-- <a href="#" class="btn btn-primary">Sign In</a> --}}
                                    <button class="btn btn-primary btn-block" type="submit">
                                        {{ __('লগইন') }}
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sign-up">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="business_name" class="form-control" name="business_name" id="business_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label>District</label>
                                    <select class="form-control" name="district_id" id="district_id" required>
                                        <option value="">সিলেক্ট করুন</option>
                                        @foreach ($Districts as $zilla)
                                        <option value="{{$zilla->id}}"
                                            class="district-items division_id_{{$zilla->division_id}} "
                                             style="color:black;" @if($zilla->
                                             name=='Dhaka') selected @endif>{{$zilla->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Delivery address</label>
                                    <input type="text" class="form-control" name="address" id="address" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Confirm Password *</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                {{-- <div class="checkbox-content login-vendor">
                                    <div class="form-group mb-5">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" name="first-name" id="first-name"
                                            required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" name="last-name" id="last-name"
                                            required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Shop Name *</label>
                                        <input type="text" class="form-control" name="shop-name" id="shop-name"
                                            required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Shop URL *</label>
                                        <input type="text" class="form-control" name="shop-url" id="shop-url" required>
                                        <small>https://d-themes.com/wordpress/wolmart/demo-1/store/</small>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Phone Number *</label>
                                        <input type="text" class="form-control" name="phone-number" id="phone-number"
                                            required>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-checkbox user-checkbox mt-0">
                                    <input type="checkbox" class="custom-checkbox checkbox-round active"
                                        id="check-customer" name="check-customer" required="">
                                    <label for="check-customer" class="check-customer mb-1">I am a customer</label>
                                    <br>
                                    <input type="checkbox" class="custom-checkbox checkbox-round" id="check-seller"
                                        name="check-seller" required="">
                                    <label for="check-seller" class="check-seller">I am a vendor</label>
                                </div>
                                <p>Your personal data will be used to support your experience
                                    throughout this website, to manage access to your account,
                                    and for other purposes described in our <a href="#" class="text-primary">privacy
                                        policy</a>.</p>
                                <a href="#" class="d-block mb-5 text-primary">Signup as a vendor?</a>
                                <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="remember" name="remember"
                                        required="">
                                    <label for="remember" class="font-size-md">I agree to the <a href="#"
                                            class="text-primary font-size-md">privacy policy</a></label>
                                </div> --}}
                                <button class="btn btn-primary btn-block">Sign Un</button>
                                {{-- <x-jet-button class="ml-4">
                                    {{ __('Register') }}
                                </x-jet-button> --}}
                            </form>
                            </div>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End of Main -->

</div>

<script>
    function visibility() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection
