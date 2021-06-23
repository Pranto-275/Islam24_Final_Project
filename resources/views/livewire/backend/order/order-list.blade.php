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
                              <a href=""><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i>New Order</button></a>
                            </div>
                        </div><!-- end col-->
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
                                                        <button class="btn btn-primary btn-sm"  wire:click="editOrderlist()"><i class="bx bx-edit font-size-18"></i></button>
                                                        <button class="btn btn-danger btn-sm" wire:click="deleteOrderlist()"><i class="bx bx-window-close font-size-18"></i></button>
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
    <!--  Modal content for the above example -->
@push('scripts')
    <script>


    </script>
@endpush


