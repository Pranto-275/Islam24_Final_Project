<footer class="footer-area footer-style-two">
    <div class="footer-top pt-35 pb-25" id="desktopFooter">
        <div class="custom-container-two">
            {{-- <div class="footer-newsletter-wrap footer-newsletter-two">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-8 col-lg-6">
                        <div class="newsletter-title">
                            <h4>Subscribe <span>Now !</span></h4>
                            <span>Venam By Signing Up To Our Newsletter.</span>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Enter Your Email....">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget mb-50">
                        <div class="footer-logo mb-30">
                            <a href="{{url('/')}}"><img src="@if($companyInfo) {{ asset('storage/photo/'.$companyInfo->logo) }} @endif" style="height:39.9px;background-image: cover;" alt=""></a>
                        </div>
                        <div class="footer-text mb-35">
                            <h5 class="call-us">Got Question? Call us 24/7</h5>
                            <h6 class="number">@if($companyInfo) {!! $companyInfo->mobile !!} @endif</h6>
                            <p>@if($companyInfo) {!! $companyInfo->address !!} @endif</p>
                            <a href="#" class="btn"><i class="fas fa-map-marker-alt"></i>view on map</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>Customer Service</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="{{route('contact-us')}}">Help Center</a></li>
                                <li><a href="{{route('return-policy')}}">Returns policy</a></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>Menu</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('terms-conditios')}}">Terms & Conditions</a></li>
                                <li><a href="{{route('about')}}">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <div class="footer-widget mb-50">
                        <div class="fw-title mb-35">
                            <h5>My Account</h5>
                        </div>
                        <div class="fw-link">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Orders History</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap copyright-style-two">
        <div class="custom-container-two">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-text">
                        <p>Copyright © {{ date("Y") }} <a href="#">Paikari Electronics</a> All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-none d-md-block">
                    <div class="payment-method-img text-right">
                        <a href="#"><img src="{{ URL::asset('venam/') }}/img/payment_method/bkash.png" style="width:60px; height: 30px;" alt=""></a>
                        <a href="#"><img src="{{ URL::asset('venam/') }}/img/payment_method/nagad.png" style="width:60px; height: 30px;" alt=""></a>
                        <a href="#"><img src="{{ URL::asset('venam/') }}/img/payment_method/rocket.png" style="width:60px; height: 30px;" alt=""></a>
                        <a href="#"><img src="{{ URL::asset('venam/') }}/img/payment_method/shiurcash.png" style="width:60px; height: 30px;" alt=""></a>
                        {{-- <img src="{{ URL::asset('venam/') }}/img/images/card_img.png" alt="img"> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</footer>
