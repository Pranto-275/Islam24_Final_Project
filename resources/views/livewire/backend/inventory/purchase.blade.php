@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endpush

<div>
    <x-slot name="title">
        Purchase Add
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4 class="card-title">Purchase Add</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" data-toggle="modal" data-target=".productModal"><i class="mdi mdi-plus mr-1"></i> New Product</button>
                                {{-- <a href="{{route('inventory.purchase-list')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">Purchase List</button></a> --}}
                            </div>
                        </div><!-- end col-->
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Purchase Code</label>
                                <input class="form-control" type="text" wire:model.lazy="code" placeholder="Purchase Code">
                                 @error('code') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Date</label>
                                <input id="date" type="date" class="form-control" wire:model.lazy="date" placeholder="Date" required>
                                @error('date') <span class="error">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        {{-- <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label">Warehouse</label>
                                <select class="form-control" wire:model.lazy="warehouse_id" id="select2-dropdown">
                                    <option>Select Warehouse</option>
                                   @foreach ($warehouses as $warehouse)
                                       <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                   @endforeach
                                </select>
                                @error('warehouse_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div> --}}
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="control-label">Supplier</label>
                                <select class="form-control" wire:model.lazy="contact_id" id="select2-dropdown">
                                    <option>Select Supplier</option>
                                   @foreach ($contacts as $contact)
                                       <option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
                                   @endforeach
                                </select>
                                @error('contact_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Search Product</label>
                                <livewire:component.product-search-dropdown/>
                                @error('ProductName') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    {{-- <th>Unit</th>
                                    <th>Vat</th> --}}
                                    <th>Pur Rate</th>
                                    <th>Discount</th>
                                    <th>Regular Rate</th>
                                    <th>Amount</th>
                                    <th colspan="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderProductList as $key => $product)

                                <tr>
                                    <td>
                                        {{ $product['code'] }}
                                    </td>
                                    <td>
                                        {{ $product['name'] }}
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" wire:model.debounce.500ms="product_quantity.{{$key}}" style="width: 100px;" placeholder="Quantity" step="any">
                                    </td>
                                    {{-- <td>
                                        {{ $Item->Unit->name }}
                                    </td>
                                    <td>
                                        {{ $Item->Vat->name }}
                                    </td> --}}
                                    <td>
                                        <input type="text" class="form-control"  wire:model.debounce.500ms="product_rate.{{$key}}" placeholder="Pur Rate">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" wire:model.debounce.500ms="product_discount.{{$key}}" style="width: 100px;" placeholder="Discount">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"  value="{{ $product['regular_price'] }}" placeholder="Sale Rate">
                                    </td>
                                    <td>
                                        {{$product_subtotal[$key]}}
                                    </td>
                                    <td>
                                        <center><a href="#" class="btn btn-danger btn-sm" wire:click="removeProduct({{$key}})"><i class="fa fa-trash"></i></a></center>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th>Bill Total</th>
                                    <th>Discount</th>
                                    <th>Shipping Charge</th>
                                    <th>Amt to Pay</th>
                                    <th>Paid Amount</th>
                                    <th>Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="number" step="any" class="form-control" name="BillTotal"  style="width: 200px;"  wire:model.debounce.500ms="subtotal" placeholder="Bill Total" readonly>
                                        @error('subtotal') <span class="error">{{ $message }}</span> @enderror

                                    </td>
                                    <td>
                                        <input type="number" step="any" class="form-control" name="Discount" style="width: 200px;" placeholder="Discount" wire:model.debounce.500ms="discount">
                                    </td>
                                    <td>
                                        <input type="number" step="any" class="form-control" name="ShippingCharge" style="width: 200px;" placeholder="Shipping Charge" wire:model.debounce.500ms="shipping_charge">
                                    </td>
                                    <td>
                                        <input type="number" step="any" class="form-control" name="AmttoPay" wire:model.debounce.500ms="grand_total"  style="width: 200px;"  placeholder="Amt to Pay" readonly>
                                    </td>
                                    <td>
                                        <input type="number" step="any" class="form-control" name="PaidAmount" placeholder="Paid Amount"wire:model.debounce.500ms="paid_amount" readonly>
                                    </td>
                                    <td>
                                        <input type="number" step="any" class="form-control" name="Due" placeholder="Due" wire:model.debounce.500ms="due" style="width:80px;" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive">

                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th><center>Payment Method</center></th>
                                        <th><center>Txn Id</center></th>
                                        <th><center>Amount</center></th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($paymentMethodList as $key => $item)
                                    <tr>
                                        <th scope="row"><center>{{$item['payment_method_name']}}</center></th>
                                        <td>
                                            {{$item['transaction_id']}}
                                        </td>
                                        <td>
                                           {{$item['payment_amount']}}
                                        </td>

                                        <td>
                                            <center><button class="btn btn-danger btn-sm" wire:click="removePaymentList({{$key}})"><i class="fa fa-trash"></i></button></center>
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
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Add Payment</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Payment Date</td>
                                    <th>
                                        <input type="text" class="form-control" placeholder="dd M, yyyy"  data-date-format="dd M, yyyy" data-provide="datepicker">
                                    </th>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <th>
                                        <select class="form-control" wire:model.lazy="payment_method_id">
                                            <option>Select Method</option>
                                            @foreach ($payments as $payment)
                                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Transaction Id</td>
                                    <th>
                                        <input type="text" class="form-control" placeholder="Transaction Id" wire:model.lazy="transaction_id">
                                    </th>
                                </tr>
                                <tr>
                                    <td>Code</td>
                                    <th>
                                        <input type="text" class="form-control" placeholder="Code" wire:model.lazy="payment_code">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <th>
                                        <input type="text" class="form-control" name="Amount" placeholder="Amount" wire:model.lazy="payment_amount">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <button class="btn btn-warning" type="submit" wire:click="AddPaymentMethod()">Add Payment</button>
                            <button type="submit" class="btn btn-primary" wire:click="Submit">Submit</button>
                        </center>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>



    <!--  Product Add Modal -->
    <div wire:ignore.self class="modal fade productModal" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Product Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="productSave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Code</label>
                                    <input class="form-control" type="text" wire:model.lazy="code" placeholder="Enter product Code">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Sub Sub Category</label>
                                    <select class="form-control" wire:model.lazy="sub_sub_category_id">
                                       <option value=""> Select Sub-sub Category </option>
                                       @foreach ($subSubCategories as $subSubCategory)
                                          <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->name }}</option>
                                       @endforeach
                                    </select>
                                    @error('sub_sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Contact</label>
                                    <select class="form-control" wire:model.lazy="contact_id">
                                        <option value="">Select Contact</option>
                                        @foreach ($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('contact_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter product name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Image (517.38*492 jpg)</label>
                                    <div class="custom-file">
                                        {{-- <input type="file" wire:model.lazy="image" class="custom-file-input" id="customFile"> --}}

                                        <input type="file" wire:model.lazy="images" x-ref="images" multiple>
                                        @error('images') <span class="error">{{ $message }}</span> @enderror

                                        {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Regular Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="regular_price" placeholder="Enter Regular price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Special Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="special_price" placeholder="Enter Special Price">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Whole Sales Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="wholesale_price" placeholder="Enter Whole sale price">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Purchase Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="purchase_price" placeholder="Enter Purchase price">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Low alert Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="low_alert" placeholder="Enter low alert price">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Status</label>
                                    <select class="form-control" wire:model.lazy="is_active">
                                        <option value="">Select Status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</div>

@push('scripts')

{{-- Start Print --}}
<script>

$(document).ready(function () {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('contact_id', data);
           });
        });

    }
</script>
{{-- End Print --}}

        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

@endpush

