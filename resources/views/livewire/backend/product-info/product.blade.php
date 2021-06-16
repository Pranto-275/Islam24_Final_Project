@push('css')

@endpush
<div>
    <x-slot name="title">
        PRODUCT INFO
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Product Info</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="productInfoModal"><i class="mdi mdi-plus mr-1"></i>Product Info</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="ProductInfoTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div wire:ignore.self class="modal fade" id="productInfoModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Product Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="productSave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Code</label>
                                    <input class="form-control" type="text" wire:model.lazy="code" placeholder="Enter product Code">
                                    @error('code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Sub Sub Category</label>
                                    <select class="form-control" wire:model.lazy="sub_sub_category_id">
                                       <option value=""> Select Sub-sub Category </option>
                                       @foreach ($subSubCategories as $subSubCategory)
                                          <option value="{{ $subSubCategory->id }}">{{ $subSubCategory->name }}</option>
                                       @endforeach
                                    </select>
                                    @error('sub_sub_category_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Contact</label>
                                    <select class="form-control" wire:model.lazy="contact_id">
                                        <option value="">Select Contact</option>
                                        @foreach ($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('contact_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter product name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Sale Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="sale_price" placeholder="Enter sale price">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Whole Sales Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="wholesale_price" placeholder="Enter Whole sale price">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Purchase Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="purchase_price" placeholder="Enter Purchase price">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Low alert Price</label>
                                    <input class="form-control" type="number" step="any" wire:model.lazy="low_alert" placeholder="Enter low alert price">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Status</label>
                                    <select class="form-control" wire:model.lazy="status">
                                        <option value="">Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
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
    <script>
    function callEdit(id) {
        @this.call('productEdit', id);
    }
    function callDelete(id) {
        @this.call('productDelete', id);
    }
        $(document).ready(function () {
            var datatable = $('#ProductInfoTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.product_table')}}",
                columns: [
                    {
                        title: 'SL',
                        data: 'id'
                    },
                    {
                        title: 'Code',
                        data: 'code',
                        name: 'code'
                    },

                    {
                        title: 'Name',
                        data:  'name',
                        name:  'name'
                    },

                    {
                        title: 'Sales Price',
                        data:  'sale_price',
                        name:  'sale_price'
                    },

                    {
                        title: 'Whole sales Price',
                        data: 'wholesale_price',
                        name:'wholesale_price'
                    },

                    {
                        title: 'Purchase Price',
                        data: 'purchase_price',
                        name:'purchase_price'
                    },
                    {
                        title: 'Action',
                        data: 'action',
                        name:'action'
                    },
                ]
            });

            window.livewire.on('success', message => {
                datatable.draw(true);
            });
        });
    </script>
@endpush

