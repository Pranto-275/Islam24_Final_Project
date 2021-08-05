<footer id="mobileResponsiveFooter">
    <div class="card">
        <div class="card-body m-0 p-0">
          <div class="row">
            <div class="col-3 text-center">
                {{-- <i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i> --}}
                <li class="header-shop-cart"><a href="{{ route('check-out') }}"><i class="fas fa-shopping-cart mt-2" style="font-size: 30px;"></i><span class="cart-count">{{ $cardBadge['data']['number_of_product'] }}</span></a>
            </div>
            <div class="col-6 py-3 text-center" id="shoppingStart">Shopping Start</div>
            <div class="col-3 text-center">
                <i class="fab fa-facebook-messenger mt-2 pr-1"  style="font-size: 30px;"></i>
            </div>
          </div>
        </div>
      </div>
</footer>
