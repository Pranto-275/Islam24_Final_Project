@extends('layouts.front_end')
@section('content')
<div>

    <x-slot name="title">
        Category
    </x-slot>
    <x-slot name="header">
       Category
    </x-slot>
   <!-- main-area -->
   <main>

    <!-- my-account-area -->
    <section class="my-account-area pattern-bg pt-20 pb-20" data-background="{{ URL::asset('venam/') }}/img/bg/pattern_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="my-account-bg" data-background="{{ URL::asset('venam/') }}/img/bg/my_account_bg.png">
                        <div class="my-account-content">
                            <p>Welcome To PAIKARI ELECTRONICS Please Login Your <span>Account</span></p>
                            <div class="direct-login">
                                <a href="{{route('register')}}"><i class="form-grp-btn"></i>রেজিস্টার</a>
                                {{-- <a href="#" class="xing"><i class="fab fa-xing"></i>Login with xing</a> --}}
                            </div>
                            <form method="POST" action="{{ route('customer_sign_in') }}" class="login-form">
                                @csrf
                                <div class="form-grp">
                                    <x-jet-label for="mobile" value="{{ __('মোবাইল নং') }}" />
                                     <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autofocus />
                                </div>
                                <div class="form-grp">
                                    <x-jet-label for="password" value="{{ __('পাসওয়ার্ড') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                    <i class="far fa-eye"></i>
                                </div>
                                <div class="form-grp-bottom">
                                    <div class="remember">
                                        <label for="remember_me" class="flex items-center">
                                            <x-jet-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="forget-pass">
                                        <a href="#">forgot password</a>
                                    </div>
                                </div>
                                <div class="form-grp-btn">
                                    {{-- <a href="#" class="btn">Login</a> --}}
                                    <button class="btn" type="submit" style="background: #ff6000;color:white;">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my-account-area-end -->
</main>
<!-- main-area-end -->

</div>
@endsection


