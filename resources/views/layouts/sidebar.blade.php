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
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Inventory</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('inventory.purchase')}}">Purchase</a></li>
                        <li><a href="{{route('inventory.sale')}}">Sale</a></li>
                        <li><a href="{{route('inventory.purchase-list')}}">Purchase List</a></li>
                        <li><a href="{{route('inventory.sale-list')}}">Sale List</a></li>
                        <li><a href="{{route('inventory.stock-adjustment')}}">Stock Adjustment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Products</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('product.category')}}">Category</a></li>
                        <li><a href="{{route('product.sub-category')}}">Sub Category</a></li>
                        <li><a href="{{route('product.sub-sub-category')}}">Sub Sub Category</a></li>
                        <li><a href="{{route('product.brand')}}">Brand</a></li>
                        <li><a href="{{route('product.product')}}">Add Product</a></li>
                        <li><a href="{{route('product.product-list')}}">Product List</a></li>
                        <li><a href="{{route('product.unit')}}">Unit Info</a></li>
                        <li><a href="{{route('product.color')}}">Color</a></li>
                        <li><a href="{{route('product.size')}}">Size</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Setting</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="{{route('setting.company')}}">Company Info</a></li> --}}
                        <li><a href="{{route('setting.branch')}}">Branch</a></li>
                        <li><a href="{{route('setting.vat')}}">Vat</a></li>
                        <li><a href="{{route('setting.shipping-charge')}}">Shipping Charge</a></li>
                        <li><a href="{{route('setting.warehouse')}}">Warehouse</a></li>
                        <li><a href="{{route('setting.companyinfo')}}">Company Info</a></li>
                        <li><a href="{{route('setting.currency')}}">Currency</a></li>
                        <li><a href="{{route('setting.delivery-method')}}">Delivery Method</a></li>
                        <li><a href="{{route('setting.invoice-setting')}}">Invoice Setting</a></li>
                        <li><a href="{{route('setting.payment-method')}}">Payment Method</a></li>
                        <li><a href="{{route('setting.coupon-code')}}">Coupon code</a></li>
                        <li><a href="{{route('setting.slider')}}">Slider</a></li>
                        <li><a href="{{route('setting.point-policy')}}">Point Policy</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Transaction</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('transaction.payment')}}">Payment Info</a></li>
                        <li><a href="{{route('transaction.customer-payment')}}">Customer Payment</a></li>
                        <li><a href="{{route('transaction.customer-payment-report')}}">Customer Payment Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>ContactInfo</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('contact-info.contact-category')}}">Contact Category</a></li>
                        <li><a href="{{route('contact-info.customer')}}">Customer</a></li>
                        <li><a href="{{route('contact-info.supplier')}}">Supplier</a></li>
                        <li><a href="{{route('contact-info.staff')}}">Staff</a></li>
                    </ul>
                </li>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('report.purchase-report')}}">Purchase Report</a></li>
                        <li><a href="{{route('report.sale-report')}}">Sales Report</a></li>
                        <li><a href="{{route('report.purchase-details-report')}}">Purchase Detail Report</a></li>
                        <li><a href="{{route('report.sale-details-report')}}">Sales Detail Report</a></li>
                        <li><a href="{{route('report.stock-report')}}">Stock Report</a></li>
                        {{-- <li><a href="{{route('report.customer-ledger')}}">Customer Ledger</a></li>
                        <li><a href="{{route('report.coupons-report')}}">Coupons Report</a></li>
                        <li><a href="{{route('report.stock-adjustment-report')}}">Stock Adjustment Report</a></li>
                        <li><a href="{{route('report.purchase-return-report')}}">Purchase Return Report</a></li>
                        <li><a href="{{route('report.sales-return-report')}}">Sales Return Report</a></li>
                        <li><a href="{{route('report.supplier-ledger')}}">Supplier Ledger</a></li>
                        <li><a href="{{route('report.profit-loss')}}">Profit Loss</a></li>
                        <li><a href="{{route('report.order-report')}}">Order Report</a></li> --}}
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('order.order-list')}}">Order List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
