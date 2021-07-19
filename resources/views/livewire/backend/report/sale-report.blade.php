@push('css')
        <!-- Sweet Alert -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
@endpush
<div>
    <x-slot name="title">
        Sales Reports
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4 class="card-title">Sales Reports</h4>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">From Date</label>
                                    <input type="date" class="form-control" wire:model.lazy="date"/>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">To Date</label>
                                    <input type="date" class="form-control" wire:model.lazy="date1"/>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Select Customer</label>

                                <select class="form-control" placeholder="Customer" wire:model.lazy="contact_id">
                                    <option value="">Select Customer</option>
                                    @foreach ($Customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('contact_id') <span class="error">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="basicpill-lastname-input">Branch</label>
                                <select class="form-control" wire:model.lazy="branch_id">
                                    <option value="">Select Branch</option>
                                   @foreach ($branches as $branch)
                                     <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                             </select>
                                @error('branch_id') <span class="error">{{ $message }}</span> @enderror
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
                        <table id="datatable-buttons" class="table table-striped table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Sale Code</th>
                                    <th>Sub Total</th>
                                    <th>Discount</th>
                                    <th>Shipping Charge</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; $subTotal=0; $discount=0; $shipping_charge=0; $grand_total=0;$paid_amount=0;$due=0; ?>
                                @foreach ($sales as $sale)
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{ ++$i }}</a></td>
                                    <td>{{ $sale->date }}</td>
                                    <td>{{ $sale->Contact->name }}</td>
                                    <td>
                                        {{ $sale->code }}
                                    </td>
                                    <td>
                                        {{ $sale->subtotal }}
                                        <?php $subTotal +=$sale->subtotal ?>
                                    </td>
                                    <td>
                                        {{ $sale->discount }}
                                        <?php $discount += $sale->discount ?>
                                    </td>
                                    <td>
                                        {{ $sale->shipping_charge }}
                                        <?php $shipping_charge += $sale->shipping_charge ?>
                                    </td>
                                    <td>
                                        {{ $sale->grand_total }}
                                        <?php $grand_total += $sale->grand_total ?>

                                    </td>
                                    <td>
                                        {{ $sale->paid_amount }}
                                        <?php $paid_amount += $sale->paid_amount ?>

                                    </td>
                                    <td>
                                        {{ $sale->due }}
                                        <?php $due += $sale->due ?>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody> 
                            <thead>
                                <tr>
                                    <th colspan="4"><center>Total</center></th>
                                    
                                    <th>{{ $subTotal }}</th>
                                    <th>{{ $discount }}</th>
                                    <th>{{ $shipping_charge }}</th>
                                    <th>{{ $grand_total }}</th>
                                    <th>{{ $paid_amount }}</th>
                                    <th>{{ $due }}</th>
                                    
                                    
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
           $( "#daterange" ).change(function() {
                // $this->date=$( ".date" ).val();
                @this.set(date, $( "#daterange" ).val());
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

