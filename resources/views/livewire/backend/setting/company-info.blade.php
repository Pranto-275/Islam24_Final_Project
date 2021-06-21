@push('css')

@endpush
<div>
    <x-slot name="title">
        Profile Setting
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form wire:submit.prevent="companyInfoSave">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="search-box mr-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <h4 class="card-title">Profile Setting</h4>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Profile Photo:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Profile Preview:</label>
                                    <div class="custom-file">
                                        <center><img class="rounded-circle header-profile-user" src="{{URL::asset('public/assets/images/users/avatar-1.jpg')}}"
                                        alt="Header Avatar"></center>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name:</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Company Name:">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Phone:</label>
                                    <input class="form-control" type="text" wire:model.lazy="phone" placeholder="Phone:">
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Mobile:</label>
                                    <input class="form-control" type="text" wire:model.lazy="mobile" placeholder="Mobile">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Address:</label>
                                    <input class="form-control" type="text" wire:model.lazy="address" placeholder="Address:">
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Email:</label>
                                    <input class="form-control" type="text" wire:model.lazy="email" placeholder="Email:">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Web:</label>
                                    <input class="form-control" type="text" wire:model.lazy="web" placeholder="Web">
                                    @error('web') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                        <option value="">Select Branch</option>
                                          <select class="form-control" wire:model.lazy="branch_id">
                                         @foreach ($branches as $branch)
                                            <option value="{{ $branch->name }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

{{--                            <div class="col-lg-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="basicpill-firstname-input">Status:</label>--}}
{{--                                    <input class="form-control" type="text" wire:model.lazy="city" placeholder="City">--}}
{{--                                    @error('city') <span class="error">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <center><button type="submit" class="btn btn-success w-lg waves-effect waves-light">Update</button></center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')

@endpush

