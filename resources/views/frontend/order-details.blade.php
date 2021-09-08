@extends('layouts.front_end')
@section('content')
<div>
    <style>
        #headerOneCheckOut,
        #sticky-header,
        #headerThreeCheckout,
        #footerOneCheckOut {
            display: none;
        }

        @media only screen and (min-width: 768px) {
            #cartForMobile {
                display: none;
            }
        }

        @media only screen and (max-width: 768px) {

            #cartForDeskTop,
            #headerOneCheckOut,
            #sticky-header,
            #headerThreeCheckout {
                display: none;
            }
        }

        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #fdfdfd;
            border: 1px solid #ddd;
            padding: .35em;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {}

        /* general styling */
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.25;
        }

        #mobileResponsiveFooter {
            display: none;
        }
    </style>
    <x-slot name="title">
        Cart
    </x-slot>
    <x-slot name="header">
        Cart
    </x-slot>
    <!-- main-area -->
    <main>



        <!-- shop-cart-area -->
        <section class="shop-cart-area wishlist-area">
            <div class="text-center py-2 rounded"
                style="background-color: black;position:fixed;width: 100%; z-index:2;">
                <a href="{{ route('home') }}" class="float-left">
                    {{-- <i class="fas fa-backspace"
                        style="color: rgb(0, 0, 0);font-size: 30px;"></i> --}}
                    <i class="fas fa-arrow-left pl-1" style="color: white;font-size: 20px;"></i>
                </a>
                <span class="mt-1" style="color: white;font-weight: bold;font-size: 20px;">Order No.
                    {{$order->code}}</span>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {{-- <th scope="col">SL.</th> --}}
                                {{-- <th scope="col">Order No.</th> --}}
                                {{-- <th scope="col">Date</th> --}}
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Qty.</th>
                                <th scope="col">MRP.</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0;$sum=0;
                            @endphp
                            @foreach ($orderDetails as $orderDetail)
                            <tr>
                                {{-- <th scope="row">{{++$i}}</th> --}}
                                {{-- <td>
                                    {{date('d F Y', strtotime($order->order_date))}}
                                </td> --}}
                                <td>
                                    @if($orderDetail->Product)
                                       {{$orderDetail->Product->name}}
                                    @endif
                                </td>
                                <td>
                                    <img class="rounded" @if($orderDetail->Product->ProductImageFirst)
                                    src="{{ asset('storage/photo/'.$orderDetail->Product->ProductImageFirst->image)}}"
                                    @endif style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                </td>
                                <td>
                                    {{$orderDetail->quantity}}
                                </td>
                                <td>
                                    {{$orderDetail->unit_price}}
                                    @php
                                        $sum += ($orderDetail->quantity* $orderDetail->unit_price);
                                    @endphp
                                </td>
                                <td>
                                    {{$orderDetail->quantity * $orderDetail->unit_price}}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="4">Total</th>
                                <th>{{$sum}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- shop-cart-area-end -->

    </main>
    @endsection
    <!-- main-area-end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            });
    </script>
</div>
@push('scripts')

@endpush
