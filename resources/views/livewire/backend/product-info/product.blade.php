@push('css')

@endpush
<div>

    <x-slot name="title">
        Add New Product
    </x-slot>
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Add Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

    <div class="row">
        <div class="col-12">
    <form wire:ignore.self wire:submit.prevent="productSave">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Basic Information</h4>
                    <p class="card-title-desc">Fill all information below</p>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="code">Product Code</label>
                                    <input id="code" type="text" class="form-control" wire:model.lazy="code" placeholder="Product Code">
                                     @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Sub-sub Category</label>
                                    <select class="form-control select2" wire:model.lazy="sub_sub_category_id">
                                        <option>Select</option>
                                        @foreach ($subSubCategories as $subSubCategory)
                                           <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input id="name" type="text" class="form-control" wire:model.lazy="name" placeholder="Name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Brand</label>
                                    <select class="form-control" wire:model.lazy="brand_id" wire:model.lazy="brand_id">
                                        <option>Select</option>
                                        @foreach ($brands as $brand)
                                           <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div wire:ignore class="form-group">
                                    <label class="control-label">Colors</label>
                                    <select class="select2 form-control select2-multiple js-example-basic-multiple" wire:model.lazy="selectedColors" multiple="multiple" data-placeholder="Choose ...">
                                        @foreach ($colors as $color)
                                           <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div wire:ignore class="form-group">
                                    <label class="control-label">Sizes</label>
                                    <select class="select2 form-control select2-multiple js-example-basic-multiple" multiple="multiple" wire:model.lazy="selectedSizes" data-placeholder="Choose ...">
                                        @foreach ($sizes as $size)
                                           <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Vat</label>
                                    <select class="select2 form-control" wire:model.lazy="vat_id">
                                        <option value="">Select</option>
                                        @foreach ($vats as $vat)
                                           <option value="{{ $vat->id }}">{{ $vat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="low_alert">Low Alert</label>
                                    <input id="low_alert" type="number" step="any" class="form-control" wire:model.lazy="low_alert" placeholder="Low Alert">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="control-label">Contact</label>
                                    <select class="select2 form-control" wire:model.lazy="contact_id">
                                        <option value="">Select</option>
                                        @foreach ($contacts as $contact)
                                           <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="regular_price">Regular Price</label>
                                    <input id="regular_price" type="number" step="any" class="form-control" wire:model.lazy="regular_price" placeholder="Regular Price">
                                </div>
                                <div class="form-group">
                                    <label for="special_price">Special Price</label>
                                    <input id="special_price" type="number" step="any" class="form-control" wire:model.lazy="special_price" placeholder="Special Price">
                                </div>
                                <div class="form-group">
                                    <label for="wholesale_price">Wholesale Price</label>
                                    <input id="wholesale_price" type="number" step="any" class="form-control" wire:model.lazy="wholesale_price" placeholder="Wholesale Price">
                                </div>
                                <div class="form-group">
                                    <label for="purchase_price">Purchase Price</label>
                                    <input id="purchase_price" type="number" step="any" class="form-control" wire:model.lazy="purchase_price" placeholder="Purchase Price">
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input id="discount" type="number" step="any" class="form-control" wire:model.lazy="discount" placeholder="Discount">
                                </div>
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Status</label>
                                    <select class="form-control" wire:model.lazy="is_active">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productdesc">Short Description</label>
                                    <textarea class="form-control" id="short_description" rows="3" wire:model.lazy="short_description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productdesc">Long Description</label>
                                    <textarea class="form-control" id="long_description" rows="3" wire:model.lazy="long_description"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                        <button type="submit" class="btn btn-secondary waves-effect">Cancel</button> --}}


                </div>
            </div>

            <div class="card">
                <div class="card-body">

                     <div class="row">
                        <div class="col-md-4">
                            Product Image (600*600)
                        </div>
                        <div class="col-md-8">
                            @if($QueryUpdate)
                                @foreach ($QueryUpdate->ProductImageTop4 as $image)
                                <img class="rounded mb-1" src="{{ asset('storage/photo/'.$image->image) }}"  style="height:30px; weight:30px;" alt="Image" class="img-circle img-fluid">
                                @endforeach
                            @endif
                           <input type="file" class="form-control form-control-lg inputBox" wire:model.lazy="images" multiple/>
                        </div>

                        <div class="col-md-4 mt-2">
                            Youtube Link
                        </div>
                        <div class="col-md-8 mt-2">
                           <input type="text" class="form-control form-control-lg inputBox" wire:model.lazy="youtube_link" placeholder="Video Link"/>
                        </div>

                      </div>

                </div>

            </div> <!-- end card-->

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Meta Data</h4>
                    <p class="card-title-desc">Fill all information below</p>

                        <div class="row">
                            <div class="col-sm-6">
                                {{--<div class="form-group">
                                    <label for="metatitle">Meta title</label>
                                    <input id="metatitle" name="productname" type="text" class="form-control" wire:model.lazy="meta_title">
                                </div>--}}
                                <div class="form-group">
                                    <label for="metakeywords">Meta Keywords</label>
                                    <input id="metakeywords" name="manufacturername" type="text" class="form-control" wire:model.lazy="meta_keyword">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="metadescription">Meta Description</label>
                                    <textarea class="form-control" id="metadescription" rows="5" wire:model.lazy="meta_description"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                        {{-- <button type="submit" class="btn btn-secondary waves-effect">Cancel</button> --}}


                </div>
            </div>
    </form>

        </div>

    </div>
    <!-- end row -->

</div>

@push('scripts')

<script>
    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });
</script>
@endpush
