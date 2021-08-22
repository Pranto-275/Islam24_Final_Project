<div>
    <x-slot name="title">
        Product List
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Product List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">

                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>

                                        <tr>
                                            <th>Sr.</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>image</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            {{-- <th>Color</th> --}}
                                            {{-- <th>Size</th> --}}
                                            <th>Regular Price</th>
                                            <th>Special Price</th>
                                            <th>Wholesale Price</th>
                                            <th>Purchase Price</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            @php
                                                $p=0;
                                            @endphp
                                            @foreach($products as $product)
                                              <tr>
                                                  <td>{{ ++$p }}</td>
                                                 <td>{{ $product->code }}</td>
                                                 <td>
                                                     {{-- {{ $product->name }} --}}
                                                     {{ substr($product->name,0,39).'...' }}
                                                </td>
                                                 <td>
                                                     <img @if($product->ProductImageFirst) src="{{ asset('storage/photo/'.$product->ProductImageFirst->image)}}" @endif style="height:100px;"/>

                                                 </td>
                                                 <td>
                                                    @if($product->SubSubCategory)
                                                      @if($product->SubSubCategory) {{ $product->SubSubCategory->name }} @endif
                                                    @endif
                                                 </td>
                                                 <td>
                                                     @if($product->Brand)
                                                         @if($product->Brand) {{ $product->Brand->name }} @endif
                                                     @endif
                                                 </td>
                                                 {{-- <td>
                                                     @foreach($product->ProductProperties->unique('color_id') as $color)
                                                       @if($color->Color) {{ $color->Color->name }} @endif
                                                     @endforeach
                                                 </td> --}}


                                                 {{-- <td>
                                                    @foreach($product->ProductProperties->unique('size_id') as $size)
                                                      @if($size->Size) {{ $size->Size->name }} @endif
                                                    @endforeach
                                                 </td> --}}


                                                 <td>{{ $product->regular_price }}</td>
                                                 <td>{{ $product->special_price }}</td>
                                                 <td>{{ $product->wholesale_price }}</td>
                                                 <td>{{ $product->purchase_price }}</td>
                                                 <td>
                                                    <a href="{{ route('product.product', ['id'=>$product->id]) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit font-size-12"></i></a>
                                                    <button class="btn btn-danger btn-sm" wire:click="deleteProduct({{ $product->id }})"><i class="bx bx-window-close font-size-12"></i></button>
                                                 </td>
                                              </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    {{-- {{ $cashBankBooks->links('pagination::bootstrap-4') }} --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
