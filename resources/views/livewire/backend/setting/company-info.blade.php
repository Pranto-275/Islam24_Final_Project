@push('css')

@endpush
<div>
    <x-slot name="title">
        Company Info
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
                                        <h4 class="card-title">Company Info</h4>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Company Name">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Phone</label>
                                    <input class="form-control" type="text" wire:model.lazy="phone" placeholder="Phone">
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Mobile</label>
                                    <input class="form-control" type="text" wire:model.lazy="mobile" placeholder="Mobile">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Address</label>
                                    <input class="form-control" type="text" wire:model.lazy="address" placeholder="Address">
                                    @error('address') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Hotline</label>
                                    <input class="form-control" type="text" wire:model.lazy="hotline" placeholder="Hotline">
                                    @error('hotline') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Email:</label>
                                    <input class="form-control" type="text" wire:model.lazy="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Web</label>
                                    <input class="form-control" type="text" wire:model.lazy="web" placeholder="Web">
                                    @error('web') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="control-label">Logo  (517.38*492 jpg)
                                        @if (!$logo)
                                        @if($CompanyInfo)
                                           <img src="{{ asset('storage/photo/'.$CompanyInfo->logo)}}"  style="height:30px; weight:30px;" alt="Image2" class="img-circle img-fluid">
                                        @endif
                                       @endif

                                       @if ($logo)
                                            <img src="{{ $logo->temporaryUrl() }}" style="height:30px; weight:30px;" alt="Image" class="img-circle img-fluid">
                                        @endif
                                    </label>
                                    <input type="file" wire:model.lazy="logo" x-ref="logo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Facebook Link</label>
                                    <input class="form-control" type="text" wire:model.lazy="facebook_link" placeholder="Facebook Link">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Youtube Link</label>
                                    <input class="form-control" type="text" wire:model.lazy="youtube_link" placeholder="Youtube Link">
                                </div>
                            </div>
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

