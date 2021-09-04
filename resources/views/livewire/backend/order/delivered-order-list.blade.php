@push('css')

@endpush
<div>
    <x-slot name="title">
        Delivered Order List
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Delivered Order List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('order.order-list') }}">
                                    <button type="button"
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-plus mr-1"></i>Delivered List
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
                                            <th>Business Name</th>
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

                                         @foreach ($deliveredOrders as $deliveredOrder)

                                        <tr>
                                            <td>
                                                <a href="javascript: void(0);" class="text-body font-weight-bold">{{ ++$i }}</a>
                                            </td>
                                            <td>
                                                {{$deliveredOrder->Contact->business_name}}
                                            </td>
                                            <td>
                                                {{$deliveredOrder->order_date}}
                                            </td>

                                            <td>
                                              {{$deliveredOrder->total_amount}}
                                            </td>

                                            <td>
                                              {{$deliveredOrder->discount}}
                                            </td>
                                            <td>
                                                {{$deliveredOrder->shipping_charge}}
                                            </td>
                                            <td>
                                                {{$deliveredOrder->payable_amount}}
                                            </td>
                                            {{-- <td wire:ignore>
                                                <select class="form-control" style="border-radius: 15px;background-color:rgb(229, 240, 219);" wire:model.lazy="status" wire:change="OrderStatus">
                                                     <option value="">Status</option>
                                                     <option value="approved {{$pendingOrder->id}}">Approved</option>
                                                     <option value="cancel {{$pendingOrder->id}}">Cancel</option>
                                                </select>
                                            </td> --}}
                                            <td>
                                                <a class="btn btn-info btn-sm btn-block mb-1" href="{{ route('order.order-invoice',['id'=>$deliveredOrder->id]) }}"><i class="fas fa-eye font-size-18"></i></a>
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

        @push('scripts')

        @endpush



