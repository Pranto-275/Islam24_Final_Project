@push('css')

@endpush
<div>
    <x-slot name="title">
        Invoice setting
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form wire:submit.prevent="invoiceSettingSave">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="search-box mr-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <h4 class="card-title">Invoice setting</h4>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Type</label>
                                    <select class="form-control" wire:model.lazy="type">
                                        <option value="">Select Type</option>
                                        <option value="Invoice">Invoice</option>
                                        <option value="Receipt">Receipt</option>
                                    </select>
                                    @error('type') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Invice Header:</label>
                                    <input class="form-control" type="text" wire:model.lazy="invoice_header" placeholder="Invoice Header">
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Logo  (517.38*492 jpg)</label>
                                    <div class="custom-file">
                                        {{-- <input type="file" wire:model.lazy="image" class="custom-file-input" id="customFile"> --}}

                                        <input type="file" wire:model.lazy="logo" x-ref="logo">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Invoice Title:</label>
                                    <input class="form-control" type="text" wire:model.lazy="invoice_title" placeholder="Invoice Title:">
                                    @error('invoice_title') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Invoice Footer:</label>
                                    <input class="form-control" type="text" wire:model.lazy="invoice_footer" placeholder="Invoice Footer:">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Vat Registration Number:</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_reg_no" placeholder="Vat Registration Number">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Vat Area Code:</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_area_code" placeholder="Vat Area code">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Vat Text:</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_text" placeholder="Vat Text">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Web Site:</label>
                                    <input class="form-control" type="text" wire:model.lazy="website" placeholder="Website address">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Currency</label>
                                    <select class="form-control" wire:model.lazy="currency_id">
                                        <option value="">Select Currency</option>
                                        @foreach($Currencies as $Currency)
                                            <option value="{{$Currency->id}}">{{$Currency->symbol}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <option value="">Select Branch</option>
                                    <select class="form-control" wire:model.lazy="branch_id">
                                        <option value="">Select Branch</option>
                                                @foreach ($Branches as $Branch)
                                                    <option value="{{ $Branch->id }}">{{ $Branch->name }}</option>
                                                @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_paid_due_hide" type="checkbox"
                                           wire:model.lazy="is_paid_due_hide"@if ($is_paid_due_hide) checked @endif>
                                      <label class="form-check-label" for="flexCheckDefault">
                                         is_paid_due_hide
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_memo_no_hide" type="checkbox"
                                           wire:model.lazy="is_memo_no_hide"@if ($is_memo_no_hide) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        is_memo_no_hide
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_chalan_no_hide" type="checkbox"
                                           wire:model.lazy="is_chalan_no_hide"@if ($is_chalan_no_hide) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        is_chalan_no_hide
                                    </label>
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
                                <center><button type="submit" class="btn btn-success w-lg waves-effect waves-light" style="margin-top: 39px;
                                  margin-right: 180px;">Update</button></center>
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

