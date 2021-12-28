<header class="header-style-two header-style-three">

    <div class="header-top-area pb-0" id="headerOneCheckOut">
        <div class="custom-container-two">
            <div class="row">
                <div class="col-md-4 col-sm-5">

                    <div class="header-top-right">
                        <ul>
                            @if(Auth::user())
                            
                @else
                <li id="signInSignOut">



                    <a href="{{route('register')}}"><i class="flaticon-user"></i>
                        @if (isset($language->sign_up))
                        {{ $language->sign_up }}
                        @else
                        Sign Up
                        @endif
                    </a>
                    <span>Or</span>
                    <a href="{{route('sign-in')}}">
                        @if (isset($language->sign_in))
                        {{ $language->sign_in }}
                        @else
                        Sign In
                        @endif
                    </a>


                </li>
                @endif

                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- header-top-end -->
    </div>
    <!-- header-search-area-end -->
</header>

