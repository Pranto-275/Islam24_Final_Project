@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        Supplier Payment Reports
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4 class="card-title">Supplier Payment Reports</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{route('transaction.supplier-payment')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">Supplier Payment</button></a>
                            </div>
                        </div><!-- end col-->
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">From Date</label>
                                <input id= "daterange" type="date" class="form-control" wire:model.lazy="from_date"/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">To Date</label>
                                <input id= "daterange" type="date" class="form-control" wire:model.lazy="to_date"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Select Supplier</label>
                                <select class="form-control" wire:model.lazy="type">
                                    <option value="">Select Supplier</option>
                                    <option value="Walking Customer">Walking Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Branch</label>
                                <select class="form-control" wire:model.lazy="type">
                                    <option value="">Select Branch</option>
                                    <option value="Default Branch">Default Branch</option>
                                </select>
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
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Supplier</th>
                                <th>Payment Method</th>
                                <th>Amount</th>
                            </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i=0;$sum=0;
                                @endphp
                                @foreach ($supplier_payments as $supplier_payment)
                                <tr>
                                   <td>{{++$i}}</td>
                                   <td>{{$supplier_payment->date}}</td>
                                   <td>{{$supplier_payment->Contact->first_name}} {{$supplier_payment->Contact->last_name}}</td>
                                   <td>{{$supplier_payment->PaymentMethod->name}}</td>
                                   <td>{{$supplier_payment->amount}}</td>
                                   @php
                                       $sum+=$supplier_payment->amount;
                                   @endphp
                                </tr>
                                @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th colspan="4"><center>Total</center></th>
                                        <th>{{$sum}}</th>

                                    </tr>
                                </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
        <script>
            $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
            });
        </script>
        <!-- Plugins js -->
        <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <!-- Sweet alert init js -->
        <script src="{{ URL::asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
@endpush

