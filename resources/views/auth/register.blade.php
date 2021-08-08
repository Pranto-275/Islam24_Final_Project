{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
 <x-jet-authentication-card-logo />
            <img class="img-fluid border shadow-xl rounded-full" src="./icon.png" alt="" style="width:100px;height:100px;">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
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

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ URL::asset('venam/') }}/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>আপনার অ্যাকাউন্ট নিবন্ধন করুন</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">হোম</a></li>
                                <li class="breadcrumb-item active" aria-current="page">রেজিস্ট্রেশন</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- my-account-area -->
    <section class="my-account-area pattern-bg pt-100 pb-100" data-background="{{ URL::asset('venam/') }}/img/bg/pattern_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="login-page-title">
                        <h2 class="title">প্রবেশ / নিবন্ধন</h2>
                    </div>
                    <div class="my-account-bg" data-background="{{ URL::asset('venam/') }}/img/bg/my_account_bg.png">
                        <div class="my-account-content">
                            <p>Welcome Vanam Please Login Your <span>Account</span></p>
                            <div class="direct-login">
                                <a href="#"><i class="fab fa-facebook-f"></i>Login with facebook</a>
                                <a href="#" class="xing"><i class="fab fa-xing"></i>Login with xing</a>
                            </div>
                            <span class="or">- OR -</span>
                            {{-- <x-jet-authentication-card> --}}
                                <x-slot name="logo">
                                    {{-- <x-jet-authentication-card-logo /> --}}
                                               {{-- <img cqlass="img-fluid border shadow-xl rounded-full" src="./icon.png" alt="" style="width:100px;height:100px;"> --}}
                                           </x-slot>
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('register') }}" class="login-form">
                                @csrf
                                <div class="form-grp">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                </div>
                                <div class="form-grp">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                </div>
                                <div class="form-grp">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                    {{-- <i class="far fa-eye"></i> --}}
                                </div>
                                <div class="form-grp">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                </div>
                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-jet-label for="terms">
                                        <div class="flex items-center">
                                            <x-jet-checkbox name="terms" id="terms"/>

                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-jet-label>
                                </div>
                            @endif

                                <div class="form-grp-bottom">
                                    <div class="remember">
                                        <input type="checkbox" id="check">
                                        <label for="check">Remember me</label>
                                    </div>
                                    <div class="forget-pass">
                                        <a href="#">forgot password</a>
                                    </div>
                                </div>
                                <div class="form-grp-btn" >
                                    <button type="submit" class="btn">Sign up</button>

                                    <x-jet-button class="ml-4" type="submit">
                                        {{ __('Register') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        {{-- </x-jet-authentication-card> --}}
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



