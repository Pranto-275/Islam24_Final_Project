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
                                    <h4>orderList</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="">
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
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Order Date</th>
                                            <th>Pick up Date</th>
                                            <th>order status</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=0;
                                        @endphp
                                        {{--                                            @foreach ($stockAdjustments as $stockAdjustment)--}}

                                        <tr>
                                            {{--                                                    <td>--}}
                                            {{--                                                        <a href="javascript: void(0);" class="text-body font-weight-bold">{{ ++$i }}</a>--}}
                                            {{--                                                    </td>--}}
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->date }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->type }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->Contact->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->FromBranch->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->ToBranch->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->FromWarehouse->name }}--}}
                                            </td>
                                            <td>
                                                {{--                                                        {{ $stockAdjustment->ToWarehouse->name }}--}}
                                            </td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" wire:click="popupInvoice()"><i
                                                        class="fas fa-check font-size-18"></i></button>
                                                <button class="btn btn-primary btn-sm" wire:click="editOrderlist()"><i
                                                        class="bx bx-edit font-size-18"></i></button>
                                                <button class="btn btn-danger btn-sm" wire:click="deleteOrderlist()"><i
                                                        class="bx bx-window-close font-size-18"></i></button>
                                            </td>
                                        </tr>
                                        {{--                                            @endforeach--}}
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

        <div wire:ignore.self class="modal fade" id="popupInvoice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice Report</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent="categorySave">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body m-0 p-0">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="card">
                                                                                <div class="card-body m-0 p-0">
                                                                                    <div class="row mb-2">
                                                                                        <div class="col-md-2"></div>
                                                                                        <div class="col-md-8">
                                                                                            <center>
                                                                                                <img src="../../storage/photo/{{ Auth::user()->profile_photo_path }}" alt="Logo" style="width: 100px; height: 100px;" class="avatar-md rounded-circle img-thumbnail">
                                                                                            </center>
                                                                                            <h3 class="text-center">
                                                                                                {{-- @if($profileSetting)
                                                                                                 {{ $profileSetting->business_name }}
                                                                                                @endif --}}
                                                                                            </h3>
                                                                                            <h6 class="text-center">
                                                                                                {{-- @if($profileSetting)
                                                                                                {{ $profileSetting->phone }}
                                                                                               @endif --}}
                                                                                            </h6>
                                                                                            <p class="text-center">
                                                                                                {{-- @if($profileSetting)
                                                                                                {{ $profileSetting->address }}
                                                                                               @endif --}}
                                                                                            </p>
                                                                                            <hr>
                                                                                            <p><span class="font-weight-bold">Invoice</span><?php echo str_repeat('&nbsp;', 45); ?>:<?php echo str_repeat('&nbsp;', 60); ?>
                                                                                                {{--                                                                        @if ($Invoice)--}}
                                                                                                {{--                                                                            {{ $Invoice->code }}--}}
                                                                                                {{--                                                                        @endif--}}
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Date</span><?php echo str_repeat('&nbsp;', 50); ?>:<?php echo str_repeat('&nbsp;', 60); ?>
                                                                                                {{--                                                                        @if ($Invoice)--}}
                                                                                                {{--                                                                            {{ $Invoice->date }}--}}
                                                                                                {{--                                                                        @endif--}}
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Sales By</span>
                                                                                                {{--                                                                        @if ($Invoice)--}}
                                                                                                {{--                                                                            {{ $Invoice->User->name }}--}}
                                                                                                {{--                                                                        @endif--}}
                                                                                            </p>

                                                                                            <div class="invoiceTable">
                                                                                                <table class="table table-bordered mb-0">
                                                                                                    <thead>
                                                                                                    <tr>
                                                                                                        <th><center>Item</center></th>
                                                                                                        <th><center>Price</center></th>
                                                                                                        <th><center>Quantity</center></th>
                                                                                                        <th><center>Vat</center></th>
                                                                                                        <th><center>Total</center></th>
                                                                                                    </tr>
                                                                                                    </thead>

                                                                                                    <tbody>

                                                                                                    <tr>
                                                                                                        <th scope="row"><center></center></th>
                                                                                                        <td>
                                                                                                            <center>

                                                                                                            </center>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <center>

                                                                                                            </center>
                                                                                                        </td>
                                                                                                        <td><center> </center></td>
                                                                                                        <td><center> </center></td>
                                                                                                    </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>

                                                                                            <p class="mt-2"><span class="font-weight-bold">Sub Total</span>
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Total Vat</span>
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Total Discount</span>
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Shipping Charge</span>
                                                                                            </p>


                                                                                            <p><span class="font-weight-bold">Net Amount</span>
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Paid Amount</span>
                                                                                            </p>
                                                                                            <p><span class="font-weight-bold">Due Amount Change Amount </span>
                                                                                            </p>

                                                                                            <p>Thank You For Shopping. Come again!!</p>

                                                                                        </div>
                                                                                        <div class="col-md-2"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @push('scripts')
            <script>


            </script>
        @endpush


