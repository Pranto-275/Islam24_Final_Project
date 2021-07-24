@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <!-- DataTables -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        Purchase List
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Purchase List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{route('inventory.purchase')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">New Purchase</button></a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="PurchaseTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Modal content for the above example -->
    {{-- <div wire:ignore.self class="modal fade" id="PurchaseModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="CategorySave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Category Code</label>
                                    <input class="form-control" type="text" wire:model.lazy="code" placeholder="Cost code">
                                     @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Supplier</label>
                                    <select class="form-control" wire:model.lazy="contact_id">
                                       @foreach ($contacts as $contact)
                                           <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                       @endforeach
                                    </select>
                                     @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Discount</label>
                                    <input class="form-control" type="text" wire:model.lazy="discount" placeholder="Discount">
                                     @error('discount') <span class="error">{{ $message }}</span> @enderror
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
    </div><!-- /.modal --> --}}

</div>
@push('scripts')
<script>
    function callEdit(id) {
        @this.call('PurchaseEdit', id);
    }
    function callDelete(id) {
        @this.call('PurchaseDelete', id);
    }

    $(document).ready(function () {

        var datatable = $('#PurchaseTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.purchase_invoice')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Purchase Date',
                    data: 'purchase_date',
                    name:'purchase_date'
                },
                {
                    title: 'Supplier',
                    data: 'contact_id',
                    name:'contact_id'
                },
                {
                    title: 'Total Amount',
                    data: 'total_amount',
                    name:'total_amount'
                },
                {
                    title: 'Discount',
                    data: 'discount',
                    name:'discount'
                },
                {
                    title: 'Payable Amount',
                    data: 'payable_amount',
                    name:'payable_amount'
                },
                {
                    title: 'Action',
                    data: 'action',
                    name:'action'
                },
            ]
        });

        window.livewire.on('success', message => {
            datatable.draw(true);
        });
    });
</script>

        <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

@endpush

