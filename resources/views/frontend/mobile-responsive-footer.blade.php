
    {{-- Start Modal --}}
       <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm m-0">
            <div class="modal-content p-3" style="">
                <div class="mobile-modal">
                    <h5>
                     <span>
                       <i class="fas fa-shopping-basket"></i>
                     </span>
                        PAIKARI Express Shahbagh
                    </h5>
                    <hr class="m-0 p-0">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('img/logo/logo.png') }}" class="img img-thumbnail"/>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <span id="mobile-modal-product-name"></span><br>
                                    @if($currencySymbol)
                                        {{ $currencySymbol->symbol }}
                                    @endif
                                    <span class="mobile-modal-product-unit-price"></span> x <span class="mobile-modal-product-quantity-label"></span>
                                </div>
                                <div class="col-4">
                                  <span class="text-danger" style="font-size: 18px;">
                                    @if($currencySymbol)
                                     {{ $currencySymbol->symbol }}
                                    @endif
                                    <span class="mobile-modal-product-price"></span>
                                  </span>
                                </div>
                                <div class="col-8 text-center">
                                    <td class="product-quantity">
                                        <div class="cart-plus">
                                            <form action="#">
                                                <div class="cart-plus-minus mobile-modal-cart-plus-minus" data-device="mobile">
                                                    <input type="text" class="mobile-modal-product-quantity " >
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="row">
                        <div class="col-6">
                            <center>
                                <a id="addToCart" class="cart-button cart-button1 mobile-modal-add-to-card">Add To Cart</a>
                            </center>
                        </div>
                        <div class="col-6">
                            <center>
                                <a href="{{ route('check-out') }}" class="cart-button cart-button2">Checkout</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- End Modal --}}
<footer id="mobileResponsiveFooter" style="z-index: 1;">
    <div class="card">
        <div class="card-body m-0 p-0">
          <div class="row">
            {{-- <div class="col-6 pt-1 text-center" id="shoppingStart">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{ URL::asset('venam/') }}/img/logo/logo_paikari_red.png" alt="Logo"></a>
                </div>
            </div> --}}
            <div class="col-3 pt-1 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{url('/')}}"><i class="fas fa-home text-dark" style="font-size: 20px;"></i></a><br>
                    <span style="font-size:10px;">PAIKARI</span>
            </div>
            <div class="col-3 pt-1 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{url('/')}}"><i class="fas fa-bullhorn text-dark" style="font-size: 20px;"></i></a><br>
                    <span style="font-size:10px;">Campaign</span>
            </div>
            <div class="col-3 pt-1 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{ route('cart') }}"><i class="fas fa-store-alt text-dark" style="font-size: 20px;"></i></a><br>
                    <span style="font-size:10px;">Order List</span>
            </div>
            <div class="col-3 pt-1 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{ route('cart') }}"><i class="fas fa-shopping-cart text-dark" style="font-size: 20px;"></i><span class="cart-count">{{ $cardBadge['data']['number_of_product'] }}</span></a><br>
                    <span style="font-size:10px;">Bag</span>
            </div>
          </div>
        </div>
      </div>
</footer>
<script>
    $("#addToCart").on("click", function (event) {
    $('.modal').modal('hide');
    });
  </script>
