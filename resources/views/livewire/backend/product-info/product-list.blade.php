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
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Regular Price</th>
                                            <th>Special Price</th>
                                            <th>Wholesale Price</th>
                                            <th>Purchase Price</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                              <tr>
                                                 <td>{{ $product->code }}</td>
                                                 <td>{{ $product->name }}</td>
                                                 <td>
                                                    @if($product->SubSubCategory)
                                                      {{ $product->SubSubCategory->name }}
                                                    @endif
                                                 </td>
                                                 <td>
                                                     @if($product->Brand)
                                                         {{ $product->Brand->name }}
                                                     @endif
                                                 </td>
                                                 <td>
                                                     @foreach($product->ProductProperties as $color)
                                                       {{ $color->Color->color_name }}
                                                     @endforeach
                                                 </td>
                                                 <td>
                                                    @foreach($product->ProductProperties as $size)
                                                      {{ $size->Size->size_name }}
                                                    @endforeach

                                                 </td>
                                                 <td>{{ $product->regular_price }}</td>
                                                 <td>{{ $product->special_price }}</td>
                                                 <td>{{ $product->wholesale_price }}</td>
                                                 <td>{{ $product->purchase_price }}</td>
                                                 <td>
                                                    <button class="btn btn-primary btn-sm"><i class="bx bx-edit font-size-12"></i></button>
                                                    <button class="btn btn-danger btn-sm"><i class="bx bx-window-close font-size-12"></i></button>
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
