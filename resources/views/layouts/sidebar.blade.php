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
                        <span>Dashboard</span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="" class=" waves-effect">--}}
{{--                        <i class="bx bx-calendar"></i>--}}
{{--                        <span>Customer Accounts</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span class="badge badge-pill badge-danger float-right">05</span>
                        <span>Inventory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Inventory.category')}}">Category</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Inventory.currency')}}">Currency</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Inventory.language')}}">Languages</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Inventory.pointPolicy')}}">Point Policy</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Inventory.delivery-method')}}">Delivery Method</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Inventory.ware-house')}}">Ware House</a></li>
                    </ul>
                </li>
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
{{--                        <i class="bx bx-store"></i>--}}
{{--                        <span>Currency</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li><a href="">Recipe Profile</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="bx bx-send"></i>--}}
{{--                        <span class="badge badge-pill badge-danger float-right">03</span>--}}
{{--                        <span>Sales Module</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li><a href="">POS Terminal</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--				<li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
{{--                        <i class="bx bx-briefcase-alt-2"></i>--}}
{{--                        <span>Accounts Module</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li><a href="">Make Transaction</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="bx bxs-store-alt"></i>--}}
{{--                        <span class="badge badge-pill badge-danger float-right">04</span>--}}
{{--                        <span>Stock Adjustment</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li><a href="">Wastage List</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
{{--                        <i class="bx bx-task"></i>--}}
{{--                        <span>Report</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li><a href="">Sales Report</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
