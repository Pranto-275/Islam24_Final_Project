@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        CUSTOMER PAYMENT
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4 class="card-title">Customer Payment</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{route('transaction.customer-payment-report')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">Payment Report</button></a>
                            </div>
                        </div><!-- end col-->
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Code</label>
                                <input class="form-control" type="text" wire:model.lazy="PaymentCode" placeholder="Payment Code">
                                 @error('PaymentCode') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Date</label>
                                <input type="text" class="form-control" placeholder="dd M, yyyy"  data-date-format="dd M, yyyy" data-provide="datepicker">
                                 @error('Date') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Transaction ID</label>
                                <input class="form-control" type="text" wire:model.lazy="TransactionID" placeholder="Transaction ID">
                                 @error('TransactionID') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Payment Method</label>
                                <select class="form-control" wire:model.lazy="type">
                                    <option value="">Select Method</option>
                                    <option value="One Option">One Option</option>
                                    <option value="Two Option">Two Option</option>
                                    <option value="Three Option">Three Option</option>
                                    <option value="Four Option">Four Option</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Search Customer</label>
                                <select class="form-control" wire:model.lazy="type">
                                    <option value="">Select Option</option>
                                    <option value="Sale">Walking Customer</option>
                                   
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Search Invoice Code</label>
                                <select class="form-control" wire:model.lazy="type">
                                    <option value="">Select Code</option>
                                    <option value="S62497774">S62497774</option>
                                    <option value="S62497768 ">S62497768</option>
                                    <option value="S62497798">S62497798</option>
                                    <option value="S624977244">S62497724</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Amount</label>
                                <input class="form-control" type="text" wire:model.lazy="Amount" placeholder="Amount">
                                 @error('Amount') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Cheq/Receipt No</label>
                                <input class="form-control" type="text" wire:model.lazy="CheqReceiptNo" placeholder="Cheq/Receipt No">
                                 @error('CheqReceiptNo') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Comments/Narration</label>
                                <input class="form-control" type="text" wire:model.lazy="Comments/Narration" placeholder="Comments/Narration">
                                 @error('Comments/Narration') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <center><button type="button" class="btn btn-success w-lg waves-effect waves-light">Submit</button></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div wire:ignore class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Code</th>
                                <th>Date</th>
                                <th>Total Amount</th>
                                <th>Narration</th>
                                <th>Add By</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">1</a> </td>
                                    <td>#SK2540</td>
                                    <td>Neal Matthews</td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <span>Walking Customer</span>
                                    </td>
                                    <td>
                                         Default Branch
                                    </td>
                                    
                                    <td>
                                        <a href="{{route('transaction.payment')}}" class="mr-3 text-primary"><i class="bx bx-printer font-size-18"></i></a>
                                        <a href="" class="mr-3 text-primary"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="sa-params"><i class="mdi mdi-close font-size-18"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">2</a> </td>
                                    <td>#SK2541</td>
                                    <td>Jamal Burnett</td>
                                    <td>
                                        $380
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <span>Walking Customer</span>
                                    </td>
                                    <td>
                                         Default Branch
                                    </td>
                                   
                                    <td>
                                        <a href="{{route('transaction.payment')}}" class="mr-3 text-primary"><i class="bx bx-printer font-size-18"></i></a>
                                        <a href="" class="mr-3 text-primary"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="sa-params"><i class="mdi mdi-close font-size-18"></i></a>
                                    </td>
                                </tr>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">2</a> </td>
                                    <td>#SK2542</td>
                                    <td>Juan Mitchell</td>
                                    <td>
                                        $384
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <span>Walking Customer</span>
                                    </td>
                                    <td>
                                         Default Branch
                                    </td>
                                    
                                    <td>
                                        <a href="{{route('transaction.payment')}}" class="mr-3 text-primary"><i class="bx bx-printer font-size-18"></i></a>
                                        <a href="" class="mr-3 text-primary"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="javascript:void(0);" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" id="sa-params"><i class="mdi mdi-close font-size-18"></i></a>
                                    </td>
                                </tr>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

