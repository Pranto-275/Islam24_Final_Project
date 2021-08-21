<header class="header-style-two header-style-three">
    <!-- header-top -->
    <style>
        .blue {
         background: #ffffff;
}

.news {
    /* box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4), 0 5px 10px rgba(0,0,0,0.5); */
       /* width: 890px; */
    margin: 20px auto;
    overflow: hidden;
    border-radius: 4px;
    /* padding: 1px; */
    -webkit-user-select: none;
}

.news span {
    float: left;
    color: rgb(19, 10, 10);
    padding: 9px;
    position: relative;
    top: 1%;
    /* box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4); */
    font: 16px 'Raleway', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -webkit-user-select: none;
    cursor: pointer;
}

.text1{

 box-shadow:none !important;
    width: 60%;
}

@media only screen and (min-width: 768px) {
    #breakingNews{
        display: none;
    }
    #privacyPolicy, #termCondition, #aboutUs{
        display: none;
    }
}
    </style>
    <div class="header-top-area">
        <div class="custom-container-two">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="header-top-left">
                        <ul>
                            <li>
                                <div class="ship-to">
                                    <span>Language</span>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="img/icon/bng.png" alt=""> BANGLA
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><img
                                                    src="{{ URL::asset('venam/') }}/img/icon/bng.png" alt="">BANGLA</a>
                                            <a class="dropdown-item" href="#"><img
                                                    src="{{ URL::asset('venam/') }}/img/icon/australia.png"
                                                    alt="">ENGLISH</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heder-top-guide">
                                    <div class="dropdown">
                                        <button aria-haspopup="true" aria-expanded="false">
                                            অর্ডার করার নিয়ম
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="heder-top-guide">
                                    <div class="dropdown">
                                        {{-- <a href="{{route('order-track')}}"> --}}
                                            <button aria-haspopup="true" aria-expanded="false">
                                                অর্ডার ট্র্যাক করুন
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5">
                    <div class="header-top-right">
                        <ul>
                            <li>
                                <a href="#"><i class="fas fa-user"></i></a>
                            </li>
                            @if(Auth::user())
                            <li>
                                <div class="heder-top-guide">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton3"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            style="background-color: #f8f9fa; color: black;border: none;color: rgb(12, 6, 6);padding: 7px 16px; text-align: center;text-decoration: none;font-size: 14px;cursor: pointer;">
                                            {{Auth::user()->name}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                            <a class="dropdown-item" href="{{ route('my-account') }}">My Account</a>
                                            <a class="log-out-btn dropdown-item text-danger" href="#"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                    class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                                Sign Out </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li>



                                <a href="{{route('register')}}"><i class="flaticon-user"></i>Sign Up</a>
                                <span>Or</span>
                                <a href="{{route('sign-in')}}">Sign In</a>


                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top-end -->

    <!-- menu-area -->
    <div id="sticky-header" class="main-header menu-area mb-0 pb-0">
        <div class="custom-container-two">
            <div class="row">
                <div class="col-12" id="responsive-header">
                    <div class="mobile-nav-toggler float-left mt-1"><i class="fas fa-bars"></i>&nbsp;</div>
                    {{-- Start Mobile Responsive Search Box --}}
                    <form action="{{ route('product-search') }}" method="GET">
                        <center>
                            <div class="input-group" id="mobile-response-search-box" style="width: 80%;">
                                <input type="text" class="form-control mb-2" name="search_product_name" id="search_product_category" style="border-radius: 30px 0px 0px 30px;" aria-label="Text input with dropdown button" placeholder="Search..">
                                {{-- <div class="input-group-append">
                                    <select class="custom-select mb-2" name="search_product_category" id="search_product_category" style="width:110px;">
                                        <option selected="" value="" >Category</option>
                                        @foreach ($categories as $category)
                                        <a href="{{ route('search-category-wise',['id'=>$category->id]) }}">
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        </a>
                                        @endforeach
                                        <option>In All Categories</option>
                                    </select>
                                </div> --}}
                                <div class="input-group-append mb-2" style="width: 20px;">
                                    <button type="submit"
                                        style="border-radius: 0px 30px 30px 0px;background-color:rgb(27, 27, 29);"><i
                                            class="fa fa-search text-light"></i></button>
                                    {{-- <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                  </div> --}}
                                </div>
                            </div>
                        </center>
                       </form>
                        {{-- End Mobile Responsive Search Box --}}
                        {{-- Start Breaking News --}}
                        <div id="breakingNews" class="news blue my-1">
                            <span style="background-color: #f7ba01;z-index:2;">Latest News</span><span class="text1" >
                              <marquee>
                               @foreach ($BreakingNews as $news)
                               <i class="fas fa-star"></i><i class="fas fa-star"></i> {{$news->news}}
                               @endforeach
                              </marquee>
                            </span>
                        </div>
                        {{-- End Breaking News --}}
                        {{-- &nbsp;&nbsp; --}}
                    <div class="menu-wrap">
                        <nav class="menu-nav show">
                            <div class="logo" id="paikaryLogo">
                                <a href="{{url('/')}}"><img
                                        src="@if($companyInfo) {{ asset('storage/photo/'.$companyInfo->logo) }} @endif"
                                        style="height:39.9px;background-image: cover;" alt="Logo"></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{route('search-category-wise')}}">Shop</a></li>
                                    {{-- <li><a href="#">SPECIAL</a></li> --}}
                                    <li><a href="{{route('contact-us')}}">contacts</a></li>
                                    @if(Auth::user())
                                    <li>
                                        <a href="{{ route('my-account') }}">My Account</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route('privacy-policy')}}" id="privacyPolicy">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="{{route('terms-conditios')}}" id="termCondition">Terms & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="{{route('about')}}" id="aboutUs">About Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul>

                                    <li><a href="#"><i class="flaticon-two-arrows"></i></a></li>
                                    <li><a href="{{route('wish-list')}}"><i class="flaticon-heart"></i></a></li>
                                    <li class="header-shop-cart"><a href="{{ route('cart') }}"><i class="flaticon-shopping-bag"></i><span class="cart-count">{{ $cardBadge['data']['number_of_product'] }}</span></a>
                                        <span class="cart-total-price" style="width: 120px;">
                                            @if($currencySymbol)
                                            {{ $currencySymbol->symbol }}
                                            @endif
                                            {{ $cardBadge['data']['total_price'] }}
                                        </span>
                                        <ul class="minicart">
                                            @include('frontend.header-card-popup')
                                        </ul>
                                    </li>
                                    {{-- <li><a href="{{route('my-profile')}}"><i class="fas fa-user"></i></a>My account
                                    </li> --}}
                                </ul>
                            </div>

                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <div class="menu-backdrop"></div>
                        <div class="close-btn"><i class="fas fa-times"></i></div>

                        <nav class="menu-box">
                            <div class="nav-logo">
                                <a href="{{url('/')}}">
                                    <img src="@if($companyInfo) {{'storage/photo/'.$companyInfo->logo}} @endif"
                                        style="height:39.9px;background-image: cover;" alt="Logo">
                                </a>
                            </div>
                            <div class="menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- menu-area-end -->
    <!-- header-search-area -->
    <div class="header-search-area d-none d-md-block">
        <div class="custom-container-two">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <div class="header-category d-none d-lg-block">
                        <a href="#" class="cat-toggle"><i class="flaticon-menu"></i>Categories</a>
                        <ul class="category-menu" style="z-index: 3;">
                        @foreach ($categories as $category)
                            <li class="has-dropdown">
                                <a href="{{ route('search-category-wise',['id'=>$category->id]) }}">
                                    <div class="cat-menu-img"><img src="{{ asset('storage/photo/'.$category->image1) }}"
                                            alt="" style="width:35px;height:35px;"></div>
                                    {{$category->name}}
                                </a>
                                <ul class="mega-menu">
                                    @foreach ($category->SubCategory as $subCategory)
                                    <li>
                                        <ul>
                                            <li class="dropdown-title"><a
                                                    href="{{ route('search-subCategory-wise',['id'=>$subCategory->id]) }}">{{ $subCategory->name }}</a>
                                            </li>
                                            @foreach ($subCategory->SubSubCategory as $subSubCategory)
                                            <li><a
                                                    href="{{ route('search-subSubCategory-wise',['id'=>$subSubCategory->id]) }}">{{$subSubCategory->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li>
                                <ul class="more_slide_open">
                                    <li><a href="#">
                                            <div class="cat-menu-img"><img
                                                    src="{{ URL::asset('venam/') }}/img/product/category_menu_img01.png"
                                                    alt=""></div> Western woman
                                        </a></li>
                                    <li><a href="#">
                                            <div class="cat-menu-img"><img
                                                    src="{{ URL::asset('venam/') }}/img/product/category_menu_img02.png"
                                                    alt=""></div> Health Product
                                        </a></li>
                                    <li><a href="#">
                                            <div class="cat-menu-img"><img
                                                    src="{{ URL::asset('venam/') }}/img/product/category_menu_img03.png"
                                                    alt=""></div> Industrial Product
                                        </a></li>
                                </ul>
                            </li>
                            <li class="more_categories">More Categories<i class="fas fa-angle-down"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                        <div class="header-search-wrap">
                            <form action="{{ route('product-search') }}" method="GET">
                                <input type="text" name="search_product_name" id="search_product_name"
                                    placeholder="Search for your item's type.....">
                                <select class="custom-select" name="search_product_category"
                                    id="search_product_category">
                                    <option selected="" value="">All Categories</option>
                                    @foreach ($categories as $category)
                                    <a href="{{ route('search-category-wise',['id'=>$category->id]) }}">
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    </a>
                                    @endforeach
                                    <option>In All Categories</option>
                                </select>
                                <button type="submit" id="btn-product-search"><i
                                        class="flaticon-magnifying-glass-1"></i></button>
                            </form>
                        </div>
                        <div class="header-free-shopping">
                            <p>Free Shipping on Orders <span>$39+</span></p>
                        </div>
                    </div>
                </div>
            </div>
             {{-- Start Breaking News --}}
             <div id="breakingNews1" class="news blue my-1">
                <span style="background-color: #ffc001;z-index:2;">Latest News</span><span class="text1" >
                  <marquee>
                   @foreach ($BreakingNews as $news)
                   <i class="fas fa-star"></i><i class="fas fa-star"></i>{{$news->news}}
                   @endforeach
                  </marquee>
                </span>
            </div>
            {{-- End Breaking News --}}
        </div>
    </div>
    <!-- header-search-area-end -->
</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#btn-product-search').on('click', function (){
           /*var url = '{{ route('check-out') }}';
           var searchProductName = $('#search_product_name').val();
           var searchProductCategory = $('#search_product_category').val();

            window.location = '"'+url+'/'+searchProductName+'/'+searchProductCategory+'"';*/
        });
    });
</script>
