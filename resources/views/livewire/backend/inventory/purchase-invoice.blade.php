<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-right font-size-16">
                            Purchase # {{$PurchaseId}}<br>
                            <address>
                                Date: {{$PurchaseInvoice->purchase_date}}<br><br>
                            </address>
                        </h4>
                        <div class="mb-4">
                            <img src="@if($InvoiceSetting) {{ asset('storage/photo/'.$InvoiceSetting->logo)}}@endif" alt="logo" style="border-radius: 50%;height:40px;width:40px;"/>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{$PurchaseInvoice->Contact->first_name}} {{$PurchaseInvoice->Contact->last_name}}<br>
                                {{$PurchaseInvoice->Contact->address}}<br>
                                {{$PurchaseInvoice->Contact->phone}}<br>
                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <address class="mt-2 mt-sm-0">
                                <strong>Supplier</strong><br>
                                {{$PurchaseInvoice->Contact->first_name}} {{$PurchaseInvoice->Contact->last_name}}<br>
                                {{$PurchaseInvoice->Contact->address}}<br>
                                {{$PurchaseInvoice->Contact->phone}}<br>
                            </address>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-6 mt-3">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Visa ending **** 4242<br>
                                jsmith@email.com
                            </address>
                        </div>
                        <div class="col-sm-6 mt-3 text-sm-right">
                            <address>
                                <strong>Purchase Date:</strong><br>
                                {{$PurchaseInvoice->purchase_date}}<br><br>
                            </address>
                        </div>
                    </div> --}}
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 font-weight-bold">Purchase summary</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">Sr.</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=0;
                                    $subTotal=0;
                                @endphp
                             @foreach ($PurchaseInvoice->PurchaseInvoiceDetail as $purchaseInvoiceDetail)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <img class="rounded" @if($purchaseInvoiceDetail->Product->ProductImageFirst) src="{{ asset('storage/photo/'.$purchaseInvoiceDetail->Product->ProductImageFirst->image)}}" @endif  style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                    </td>
                                    <td>{{$purchaseInvoiceDetail->Product->name}}</td>
                                    <td>{{$purchaseInvoiceDetail->quantity}}</td>
                                    <td class="text-right">{{$purchaseInvoiceDetail->unit_price * $purchaseInvoiceDetail->quantity}}</td>
                                    @php
                                        $subTotal += $purchaseInvoiceDetail->unit_price * $purchaseInvoiceDetail->quantity;
                                    @endphp
                                </tr>
                              @endforeach
                              <tr>
                                <td colspan="4" class="text-right">Sub Total</td>
                                <td class="text-right">
                                    @if($currencySymbol)
                                        {{ $currencySymbol->symbol }}
                                    @endif
                                    {{$subTotal}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border-0 text-right">
                                    <strong>Discount</strong></td>
                                <td class="border-0 text-right">
                                    @if($currencySymbol)
                                        {{ $currencySymbol->symbol }}
                                    @endif
                                    {{$PurchaseInvoice->discount}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border-0 text-right">
                                    <strong>Shipping</strong></td>
                                <td class="border-0 text-right">
                                    @if($currencySymbol)
                                       {{ $currencySymbol->symbol }}
                                    @endif
                                    {{$PurchaseInvoice->shipping_charge}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border-0 text-right">
                                    <strong>Total</strong></td>
                                <td class="border-0 text-right">
                                    <h4 class="m-0">
                                        @if($currencySymbol)
                                           {{ $currencySymbol->symbol }}
                                        @endif
                                        {{$subTotal + $PurchaseInvoice->shipping_charge - $PurchaseInvoice->discount}}
                                    </h4>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-print-none">
                        <div class="float-right">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Column -->
    </div>
    <!-- end row -->


<footer class="footer">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <script>document.write(new Date().getFullYear())</script> © Skote.
        </div>
        <div class="col-sm-6">
            <div class="text-sm-right d-none d-sm-block">
                Design & Develop by Themesbrand
            </div>
        </div>
    </div>
</div>
</footer>
</div>
