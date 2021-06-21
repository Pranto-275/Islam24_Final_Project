@push('css')

@endpush
<div>
    <x-slot name="title">
        CATEGORY
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Category List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="categoryModal"><i class="mdi mdi-plus mr-1"></i> New Category</button>

                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="CategoryTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!--  Modal content for the above example -->
                <div wire:ignore.self class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form wire:submit.prevent="categorySave">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-firstname-input">Category Code</label>
                                                <input class="form-control" type="text" wire:model.lazy="code" placeholder="Cost code">
                                                 @error('code') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Name</label>
                                                <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter Name">
                                                 @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Image 1 (517.38*492 jpg)</label>
                                                <div class="custom-file">
                                                    {{-- <input type="file" wire:model.lazy="image" class="custom-file-input" id="customFile"> --}}

                                                    <input type="file" wire:model.lazy="image1" x-ref="image1">
                                                    @if (!$image1)
                                                    @if($QueryUpdate)
                                                    <img src="{{ asset('storage/photo')}}/{{ $QueryUpdate->image1 }}"  style="height:30px; weight:30px;" alt="Image" class="img-circle img-fluid">
                                                    @endif
                                                    @endif
                                                    @if ($image1)
                                                    <img src="{{ $image1->temporaryUrl() }}" style="height:30px; weight:30px;" alt="Image1" class="img-circle img-fluid">
                                                    @endif
                                                    {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Image 2 (517.38*492 jpg)</label>
                                                <div class="custom-file">
                                                    {{-- <input type="file" wire:model.lazy="image" class="custom-file-input" id="customFile"> --}}

                                                    <input type="file" wire:model.lazy="image2" x-ref="image2">
                                                    @if (!$image2)
                                                    @if($QueryUpdate)
                                                    <img src="{{ asset('storage/photo')}}/{{ $QueryUpdate->image2 }}"  style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                                    @endif
                                                    @endif
                                                    @if ($image1)
                                                    <img src="{{ $image2->temporaryUrl() }}" style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                                    @endif
                                                    {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Status</label>
                                                <select class="form-control" wire:model.lazy="status">
                                                    <option value="">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="checkbox" name="terms"  wire:model.lazy="top_show" @if($top_show) checked @endif>
                                                <label>Top Show Image</label><br/><br/>
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
        @this.call('categoryEdit', id);
    }
    function callDelete(id) {
        @this.call('categoryDelete', id);
    }
        $(document).ready(function () {
            var datatable = $('#CategoryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.category_table')}}",
                columns: [
                    {
                        title: 'SL',
                        data: 'id'
                    },
                    {
                        title: 'Category Code',
                        data:   'code',
                        name:   'code'
                    },
                    {
                        title: 'Name',
                        data:  'name',
                        name:  'name'
                    },
                    {
                        title: 'Image1',
                        data:  'image1',
                        name:  'image1'
                    },
                    {
                        title: 'Image2',
                        data:  'image2',
                        name:  'image2'
                    },
                    {
                        title: 'Status',
                        data:  'status',
                        name:  'status'
                    },
                    {
                        title: 'Action',
                        data:  'action',
                        name:  'action'
                    },
                ]
            });

            window.livewire.on('success', message => {
                datatable.draw(true);
            });
        });
    </script>
@endpush
