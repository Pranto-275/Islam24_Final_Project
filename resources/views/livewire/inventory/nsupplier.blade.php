@push('css')
<!-- Sweet Alert -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        NSUPPLEIR
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>N-Supplier List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="CategoryModal"><i class="mdi mdi-plus mr-1"></i>N-New Supplier</button>

                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="CategoryTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!--  Modal content for the above example -->
                <div wire:ignore.self class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">NSupplier</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form wire:submit.prevent="CategorySave">
                                <div class="modal-body">
                                    <div class="row">
                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">NSupplier Company Name</label>
                                                <input class="form-control" type="text" wire:model.lazy="nsupplierCompanyName" placeholder="Enter NSupplier Company Name">
                                                 @error('nsupplier company name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-firstname-input">NSupplier Name</label>
                                                <input class="form-control" type="text" wire:model.lazy="nsupplierName" placeholder="NSupplier Name">
                                                 @error('nsupplier name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Mobile No</label>
                                                <input class="form-control" type="text" wire:model.lazy="mobileNo" placeholder="Enter Mobile Number">
                                                 @error('mobile number') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Email</label>
                                                <input class="form-control" type="email" wire:model.lazy="email" placeholder="Enter Email">
                                                 @error('email') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Address</label>
                                                <input class="form-control" type="text" wire:model.lazy="address" placeholder="Address">
                                                 @error('address') <span class="error">{{ $message }}</span> @enderror
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


        <!-- Plugins js -->
        <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
@endpush