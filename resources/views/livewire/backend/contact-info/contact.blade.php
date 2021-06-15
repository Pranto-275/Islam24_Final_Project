@push('css')

@endpush
<div>
    <x-slot name="title">
        CONTACT INFO
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Contact Info</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="ContactModal"><i class="mdi mdi-plus mr-1"></i>Add ContactInfo</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="ContactTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div wire:ignore.self class="modal fade" id="ContactModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">ContactInfo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="ContactInfoSave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Type</label>
                                    <input class="form-control" type="text" wire:model.lazy="type" placeholder="Enter type">
                                    @error('type') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter Name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Address</label>
                                    <input class="form-control" type="text" wire:model.lazy="address" placeholder="Enter Address">
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Shipping Address</label>
                                    <input class="form-control" type="text" wire:model.lazy="shipping_address" placeholder="Enter Shipping address">
                                    @error('shipping_address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Phone</label>
                                    <input class="form-control" type="text" wire:model.lazy="phone" placeholder="Enter Phone">
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Mobile</label>
                                    <input class="form-control" type="text" wire:model.lazy="mobile" placeholder="Enter Mobile Number">
                                    @error('mobile') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Email</label>
                                    <input class="form-control" type="text" wire:model.lazy="email" placeholder="Enter email address">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Due date</label>
                                    <input class="form-control" type="text" wire:model.lazy="due_date" placeholder="Give Due date">
                                    @error('due_date') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Birth Day</label>
                                    <input class="form-control" type="text" wire:model.lazy="birthday" placeholder="Enter birthdate">
                                    @error('birthday') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">opening Balance</label>
                                    <input class="form-control" type="text" wire:model.lazy="opening_balance" placeholder="Enter opening balance">
                                    @error('opening_balance') <span class="error">{{ $message }}</span> @enderror
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
                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Contact Category</label>
                                    <select class="form-control" wire:model.lazy="contact_category_id">
                                        <option value="">Select Contact Category</option>
                                        @foreach($ContactCategory as $contactCategory)
                                        <option value="{{$contactCategory->type}}">{{$contactCategory->type}}</option>
                                        @endforeach
                                    </select>
                                    @error('status') <span class="error">{{ $message }}</span> @enderror
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
        $(document).ready(function () {
            var datatable = $('#ContactTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.contact_table')}}",
                columns: [
                    {
                        title: 'SL',
                        data: 'id'
                    },
                    {
                        title: 'Type',
                        data: 'type',
                        name:'type'
                    },
                    {
                        title: 'Name',
                        data: 'name',
                        name:'name'
                    },
                    {
                        title: 'Address',
                        data: 'address',
                        name:'address'
                    },
                    {
                        title: 'Shipping Address',
                        data: 'shipping address',
                        name:'shipping address'
                    },

                    {
                        title: 'Email',
                        data: 'email',
                        name:'email'
                    },

                    {
                        title: 'Phone',
                        data: 'phone',
                        name:'phone'
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
