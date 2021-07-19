@push('css')

@endpush
<div>
    <x-slot name="title">
        INVOICE
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Invoice List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="InvoiceModal"><i class="mdi mdi-plus mr-1"></i> New Invoice</button>

                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="InvoiceTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div wire:ignore.self class="modal fade" id="InvoiceModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="invoiceSave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Code</label>
                                    <input class="form-control" type="text" wire:model.lazy="code" placeholder="code">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Type</label>
                                    <select class="form-control" wire:model.lazy="type">
                                        <option value="">Select Type</option>
                                        <option value="Order">Order</option>
                                        <option value="Sales">Sales</option>
                                        <option value="Purchase">Purchase</option>
                                        <option value="Quate">Quate</option>
                                    </select>
                                    @error('type') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Date</label>
                                    <input class="form-control" type="date" wire:model.lazy="date" placeholder="Date">
                                    @error('date') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <select class="form-control" wire:model.lazy="contact_id">
                                        <option value="">Select Contact Name</option>
                                        @foreach ($Contacts as $Contact)
                                            <option value="{{ $Contact->id }}">{{ $Contact->first_name }} {{ $Contact->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('contact_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Sub Total</label>
                                    <input class="form-control" type="text" wire:model.lazy="subtotal" placeholder="Sub Total">
                                    @error('subtotal') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Vat Total</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_total" placeholder="Vat Total">
                                    @error('vat_total') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Discount Value</label>
                                    <input class="form-control" type="text" wire:model.lazy="discount_value" placeholder="Discount Value">
                                    @error('discount_value') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Discount</label>
                                    <input class="form-control" type="text" wire:model.lazy="discount" placeholder="Discount">
                                    @error('discount') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Earn point</label>
                                    <input class="form-control" type="text" wire:model.lazy="earn_point" placeholder="Earn Point">
                                    @error('earn_point') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Earn Point Amount</label>
                                    <input class="form-control" type="text" wire:model.lazy="earn_point_amount" placeholder="Earn Point Amount">
                                    @error('earn_point_amount') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Expense point</label>
                                    <input class="form-control" type="text" wire:model.lazy="expense_point" placeholder="Expense point">
                                    @error('expense_point') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Expense point Amount</label>
                                    <input class="form-control" type="text" wire:model.lazy="expense_point_amount" placeholder="Expense point Amount">
                                    @error('expense_point_amount') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Grand Total</label>
                                    <input class="form-control" type="text" wire:model.lazy="grand_total" placeholder="Grand Total">
                                    @error('grand_total') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">User Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="user_id" placeholder="User Name">
                                    @error('user_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div> --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Branch Name</label>
                                    <select class="form-control" wire:model.lazy="branch_id">
                                        <option value="">Select Branch Name</option>
                                        @foreach ($Branches as $Branch)
                                            <option value="{{ $Branch->id }}">{{ $Branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Status</label>
                                    <select class="form-control" wire:model.lazy="status">
                                        <option value="">Select Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="In Process">In Process</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Accept">Accept</option>
                                    </select>
                                    @error('status') <span class="error">{{ $message }}</span> @enderror
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
    <script>
        function callEdit(id) {
        @this.call('invoiceEdit', id);
        }
        function callDelete(id) {
        @this.call('invoiceDelete', id);
        }

        $(document).ready(function () {
            var datatable = $('#InvoiceTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.invoiceSave')}}",
                columns: [
                    {
                        title: 'SL',
                        data:  'id'
                    },

                    {
                        title: 'Code',
                        data:  'code',
                        name:  'code'
                    },


                    {
                        title: 'Type',
                        data:  'type',
                        name:  'type'
                    },


                   {
                        title: 'VaT Total',
                        data:  'vat_total',
                        name:  'vat_total'
                    },

                    {
                        title: 'Discount',
                        data:  'discount',
                        name:  'discount'
                    },

                    {
                        title: 'Earn point Amount',
                        data:  'earn_point_amount',
                        name:  'earn_point_amount'
                    },

                    {
                        title: 'Expense point Amount',
                        data:  'expense_point_amount',
                        name:  'expense_point_amount'
                    },

                    {
                        title: 'Grand Total',
                        data:  'grand_total',
                        name:  'grand_total'
                    },

                    {
                        title: 'Action',
                        data:  'action',
                        name:  'action'
                    },
                ]
            });

            window.livewire.on('success', message => {
                datatable.draw(true);
            });
        });
    </script>
@endpush

