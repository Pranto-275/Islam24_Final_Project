@push('css')

@endpush
<div>
    <x-slot name="title">
        Coupon code
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Coupon code</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="couponCodeModal"><i class="mdi mdi-plus mr-1"></i>Coupon code</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="CouponTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div wire:ignore.self class="modal fade" id="couponCodeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Coupon Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="couponCodeSave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Coupon Code</label>
                                    <input class="form-control" type="text" wire:model.lazy="code" placeholder="Coupon code">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Offer Type</label>
                                    <select class="form-control" wire:model.lazy="offer_type">
                                        <option>Select Offer type</option>
                                        <option value="Percentage">Percentage</option>
                                        <option value="Amount">Amount</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Amount</label>
                                    <input class="form-control" type="text" wire:model.lazy="amount" placeholder="Enter Amount">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Min Buy Amount</label>
                                    <input class="form-control" type="text" wire:model.lazy="min_buy_amount" placeholder="Enter Min Amount">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Expired Date</label>
                                    <input class="form-control" type="date" wire:model.lazy="expired_date" placeholder="Enter expired date">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Status</label>
                                    <select class="form-control" wire:model.lazy="status">
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
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
    <script>
        function callEdit(id) {
        @this.call('couponEdit', id);
        }
        function callDelete(id) {
        @this.call('couponDelete', id);
        }
        $(document).ready(function () {
            var datatable = $('#CouponTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.coupon_table')}}",
                columns: [
                    {
                        title: 'SL',
                        data: 'id'
                    },
                    {
                        title:  'Code',
                        data:   'code',
                        name:   'code'
                    },
                    {
                        title: 'Expired Date',
                        data:  'expired_date',
                        name:  'expired_date'
                    },
                    {
                        title: 'Offer Type',
                        data:  'offer_type',
                        name:  'offer_type'
                    },
                    {
                        title: 'Amount',
                        data:  'amount',
                        name:  'amount'
                    },
                    {
                        title: 'Buy Amount',
                        data:  'min_buy_amount',
                        name:  'min_buy_amount'
                    },

                    {
                        title: 'Status',
                        data:  'status',
                        name:  'status'
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
