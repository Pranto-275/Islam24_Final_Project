@push('css')
<style>
    .table-responsive-stack tr {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
    }


    .table-responsive-stack td,
    .table-responsive-stack th {
        display: block;
        /*
   flex-grow | flex-shrink | flex-basis   */
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
    }

    .table-responsive-stack .table-responsive-stack-thead {
        font-weight: bold;
    }

    @media screen and (max-width: 768px) {
        .table-responsive-stack tr {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            border-bottom: 3px solid #ccc;
            display: block;

        }

        /*  IE9 FIX   */
        .table-responsive-stack td {
            float: left\9;
            width: 100%;
        }
    }
</style>
@endpush
<div>
    <x-slot name="title">
        Cancelled Order List
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Cancelled Order List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('order.order-list') }}">
                                    <button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-plus mr-1"></i>Order List
                                    </button>
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <hr>
                    <div class="row">
                        {{-- <div class="col-md-4"></div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">From Date</label>
                                <input type="date" class="form-control" wire:model.debounce.150ms="from_date" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">To Date</label>
                                <input type="date" class="form-control" wire:model.debounce.150ms="to_date" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                            </div>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0 table-nowrap table-responsive-stack"
                                        id="tableOne">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>SL</th>
                                                <th>Business Name</th>
                                                <th>Order Date</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=0;
                                            @endphp

                                            @foreach ($this->dateFilter($cancelOrders) as $cancelOrder)

                                            <tr>
                                                <td>
                                                    <a href="javascript: void(0);"
                                                        class="text-body font-weight-bold">{{ ++$i }}</a>
                                                </td>
                                                <td>
                                                    @if($cancelOrder->Contact)
                                                    {{$cancelOrder->Contact->business_name}}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{date('d F Y', strtotime($cancelOrder->order_date))}}
                                                </td>
                                                <td>
                                                    {{$cancelOrder->payable_amount}}
                                                </td>
                                                <td>
                                                    {{$cancelOrder->status}}
                                                </td>
                                                {{-- <td wire:ignore>
                                                <select class="form-control" style="border-radius: 15px;background-color:rgb(229, 240, 219);" wire:model.lazy="status" wire:change="OrderStatus">
                                                     <option value="">Status</option>
                                                     <option value="approved {{$pendingOrder->id}}">Approved</option>
                                                <option value="cancel {{$pendingOrder->id}}">Cancel</option>
                                                </select>
                                                </td> --}}
                                                <td>
                                                    <a class="btn btn-info btn-sm btn-block mb-1"
                                                        href="{{ route('order.order-invoice',['id'=>$cancelOrder->id]) }}"><i
                                                            class="fas fa-eye font-size-18"></i></a>
                                                    <div wire:ignore>
                                                        @if($cancelOrder->status!='delivered')
                                                        <select class="form-control"
                                                            style="border-radius: 15px;background-color:rgb(229, 240, 219);"
                                                            wire:model.lazy="status" wire:change="OrderStatus">
                                                            <option value="">Status</option>
                                                            <option value="processing {{$cancelOrder->id}}">Processing
                                                            </option>
                                                            <option value="shipped {{$cancelOrder->id}}">Shipped
                                                            </option>
                                                            <option value="delivered {{$cancelOrder->id}}">Delivered
                                                            </option>
                                                            <option value="returned {{$cancelOrder->id}}">Returned
                                                            </option>
                                                        </select>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Invoice Modal goes here--}}
        {{--
        <div class="modal fade exampleModal" id="popupInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                        <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 255</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Hoodie (Blue)</h5>
                                            <p class="text-muted mb-0">$ 145 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 145</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Shipping:</h6>
                                    </td>
                                    <td>
                                        Free
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{route('order.print-order')}}" class="btn btn-secondary">Print</a>
    </div>

</div>
</div>
</div> --}}
@push('scripts')
<script>
    $(document).ready(function() {


// inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
$('.table-responsive-stack').each(function (i) {
var id = $(this).attr('id');
//alert(id);
$(this).find("th").each(function(i) {
$('#'+id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+             $(this).text() + ':</span> ');
$('.table-responsive-stack-thead').hide();

});
});
$( '.table-responsive-stack' ).each(function() {
var thCount = $(this).find("th").length;
var rowGrow = 100 / thCount + '%';
//console.log(rowGrow);
$(this).find("th, td").css('flex-basis', rowGrow);
});




function flexTable(){
if ($(window).width() < 768) {

$(".table-responsive-stack").each(function (i) {
$(this).find(".table-responsive-stack-thead").show();
$(this).find('thead').hide();
});


// window is less than 768px
} else {


$(".table-responsive-stack").each(function (i) {
$(this).find(".table-responsive-stack-thead").hide();
$(this).find('thead').show();
});



}
// flextable
}

flexTable();

window.onresize = function(event) {
flexTable();
};

});

</script>
<script>
    $(document).ready(function() {


// inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
$('.table-responsive-stack').each(function (i) {
var id = $(this).attr('id');
//alert(id);
$(this).find("th").each(function(i) {
$('#'+id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+             $(this).text() + ':</span> ');
$('.table-responsive-stack-thead').hide();

});



});





$( '.table-responsive-stack' ).each(function() {
var thCount = $(this).find("th").length;
var rowGrow = 100 / thCount + '%';
//console.log(rowGrow);
$(this).find("th, td").css('flex-basis', rowGrow);
});




function flexTable(){
if ($(window).width() < 768) {

$(".table-responsive-stack").each(function (i) {
$(this).find(".table-responsive-stack-thead").show();
$(this).find('thead').hide();
});


// window is less than 768px
} else {


$(".table-responsive-stack").each(function (i) {
$(this).find(".table-responsive-stack-thead").hide();
$(this).find('thead').show();
});



}
// flextable
}

flexTable();

window.onresize = function(event) {
flexTable();
};

});
@endpush
