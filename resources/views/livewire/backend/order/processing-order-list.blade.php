@push('css')

@endpush
<div>
    <x-slot name="title">
        Processing Order List
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Processing Order List</h4>
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
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=0;
                                            @endphp

                                            @foreach ($processingOrders as $processingOrder)

                                            <tr>
                                                <td>
                                                    <a href="javascript: void(0);"
                                                        class="text-body font-weight-bold">{{ ++$i }}</a>
                                                </td>
                                                <td>
                                                    {{$processingOrder->Contact->business_name}}
                                                </td>
                                                <td>
                                                    {{date('d F Y', strtotime($processingOrder->order_date))}}
                                                </td>
                                                <td>
                                                    {{$processingOrder->payable_amount}}
                                                </td>
                                                <td>
                                                    {{$processingOrder->status}}
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
                                                        href="{{ route('order.order-invoice',['id'=>$processingOrder->id]) }}"><i
                                                            class="fas fa-eye font-size-18"></i></a>
                                                    <div wire:ignore>
                                                        @if($processingOrder->status!='delivered')
                                                        <select class="form-control"
                                                            style="border-radius: 15px;background-color:rgb(229, 240, 219);"
                                                            wire:model.lazy="status" wire:change="OrderStatus">
                                                            <option value="">Status</option>
                                                            </option>
                                                            <option value="shipped {{$processingOrder->id}}">Shipped
                                                            </option>
                                                            <option value="delivered {{$processingOrder->id}}">Delivered
                                                            </option>
                                                            <option value="returned {{$processingOrder->id}}">Returned
                                                            </option>
                                                            <option value="cancelled {{$processingOrder->id}}">Cancelled
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

        @push('scripts')

        @endpush
