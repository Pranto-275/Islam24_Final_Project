<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('/dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">01</span>
                        <span>Dashboards</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="" class=" waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Customer Accounts</span>
                    </a>
                </li>
                <li>
                    <a href=""  class=" waves-effect">
                        <i class="dripicons-cart"></i>
                        <span>Supplier Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span class="badge badge-pill badge-danger float-right">05</span>
                        <span>Accounts Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Transaction Head</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Inventory</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('inventory.invoice')}}">Invoice</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('inventory.stock-adjustment')}}">Stock Adjustment</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('inventory.stock-manager')}}">Stock Manager</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Product Info</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.category')}}">Category</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.sub-category')}}">Sub Category</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.sub-sub-category')}}">Sub Sub Category</a></li>
                    </ul>


                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.brand')}}">Brand</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.product')}}">Product</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.product-image')}}">Product Image</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.product-properties')}}">Product Properties</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.unit')}}">Unit Info</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Setting</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.branch')}}">Branch</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.currency')}}">Currency</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.delivery-method')}}">Delivery Method</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.invoice-setting')}}">Invoice Setting</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.payment-method')}}">Payment Method</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.vat')}}">Vat Info</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('setting.warehouse')}}">Warehouse Info</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Transaction</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('transaction.payment')}}">Payment Info</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>ContactInfo</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contact-info.contact')}}">Contact</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contact-info.contact-category')}}">Contact Category</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
