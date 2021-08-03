@push('css')

@endpush
<div>
    <x-slot name="title">
        Order List
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Order List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('inventory.sale') }}">
                                    <button type="button"
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-plus mr-1"></i>New Order
                                    </button>
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                            </div>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0 table-nowrap">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>SL</th>
                                            <th>Customer</th>
                                            <th>Order Date</th>
                                            <th>Total Amount</th>
                                            <th>Discount</th>
                                            <th>Shipping Charge</th>
                                            <th>Payable Amount</th>
                                            {{-- <th>Status</th> --}}
                                            <th colspan="2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=0;
                                        @endphp

                                         @foreach ($orders as $order)

                                        <tr>
                                            <td>
                                                <a href="javascript: void(0);" class="text-body font-weight-bold">{{ ++$i }}</a>
                                            </td>
                                            <td>
                                                {{$order->Contact->first_name}}
                                            </td>
                                            <td>
                                                {{$order->order_date}}
                                            </td>

                                            <td>
                                              {{$order->total_amount}}
                                            </td>

                                            <td>
                                              {{$order->discount}}
                                            </td>
                                            <td>
                                                {{$order->shipping_charge}}
                                            </td>
                                            <td>
                                                {{$order->payable_amount}}
                                            </td>
                                            <td wire:ignore>
                                                <select class="form-control" style="border-radius: 15px;background-color:rgb(229, 240, 219);" wire:model.lazy="status" wire:change="OrderStatus">
                                                     <option value="">Status</option>
                                                     <option value="approved {{$order->id}}">Approved</option>
                                                     <option value="cancel {{$order->id}}">Cancel</option>
                                                </select>
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

        @endpush


