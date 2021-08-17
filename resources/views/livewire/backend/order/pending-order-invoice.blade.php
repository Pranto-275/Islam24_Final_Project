<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-right font-size-16">
                            Pending Order # {{$OrderId}}<br>
                            Date: {{$OrderInvoice->order_date}}
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
                                {{$OrderInvoice->Contact->first_name}} {{$OrderInvoice->Contact->last_name}}<br>
                                {{$OrderInvoice->Contact->address}}<br>
                                {{$OrderInvoice->Contact->phone}}<br>

                            </address>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <address class="mt-2 mt-sm-0">
                                <strong>Shipped To:</strong><br>
                                {{$OrderInvoice->Contact->first_name}} {{$OrderInvoice->Contact->last_name}}<br>
                                {{$OrderInvoice->Contact->shipping_address}}<br>
                                {{$OrderInvoice->Contact->phone}}<br>
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
                                <strong>Sale Date:</strong><br>
                                {{$SaleInvoice->sale_date}}<br><br>
                            </address>
                        </div>
                    </div> --}}
                    <div class="py-2 mt-3">
                        <h3 class="font-size-15 font-weight-bold">Order summary</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">Sr.</th>
                                    <th>Image</th>
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
                             @foreach ($OrderInvoice->OrderDetail as $orderDetail)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>
                                        <img class="rounded" @if($orderDetail->Product->ProductImageFirst) src="{{ asset('storage/photo/'.$orderDetail->Product->ProductImageFirst->image)}}" @endif  style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                    </td>
                                    <td>{{$orderDetail->Product->name}}</td>
                                    <td>{{$orderDetail->quantity}}</td>
                                    <td class="text-right">{{$orderDetail->unit_price * $orderDetail->quantity}}</td>
                                    @php
                                        $subTotal += $orderDetail->unit_price * $orderDetail->quantity;
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
                                    {{$OrderInvoice->discount}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border-0 text-right">
                                    <strong>Shipping</strong></td>
                                <td class="border-0 text-right">
                                    @if($currencySymbol)
                                       {{ $currencySymbol->symbol }}
                                    @endif
                                    {{$OrderInvoice->shipping_charge}}
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
                                        {{$subTotal + $OrderInvoice->shipping_charge - $OrderInvoice->discount}}
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
