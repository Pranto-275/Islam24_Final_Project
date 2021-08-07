<footer id="mobileResponsiveFooter">
    <div class="card">
        <div class="card-body m-0 p-0">
          <div class="row">
            <div class="col-6 py-1 text-center" id="shoppingStart">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{ URL::asset('venam/') }}/img/logo/logo_paikari_red.png" alt="Logo"></a>
                </div>
            </div>
            <div class="col-3 py-1 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{ route('cart') }}"><i class="fas fa-store-alt" style="font-size: 20px;"></i></a><br>
                    <span style="font-size:10px;">Order List</span>
            </div>
            <div class="col-3 py-1 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{ route('cart') }}"><i class="fas fa-shopping-cart" style="font-size: 20px;"></i><span class="cart-count">{{ $cardBadge['data']['number_of_product'] }}</span></a><br>
                    <span style="font-size:10px;">Bag</span>
            </div>
          </div>
        </div>
      </div>
</footer>
