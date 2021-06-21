@push('css')

@endpush
<div>
    <x-slot name="title">
        Invoice Setting  INFO
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4>Invoice Setting Info</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="InvoiceSettingModal"><i class="mdi mdi-plus mr-1"></i>Invoice Setting Info</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="InvoiceSettingTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Modal content for the above example -->
    <div wire:ignore.self class="modal fade" id="InvoiceSettingModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Invoice Setting Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="InvoiceSettingSave">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">select Invoice Type</label>
                                    <select class="form-control" wire:model.lazy="type">
                                        <option value="">Select Currency</option>
                                        <option value="Invoice">Invoice</option>
                                        <option value="Receipt">Receipt</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Invoice Header</label>
                                    <input class="form-control" type="text" wire:model.lazy="invoice_header" placeholder="Enter Invoice Header">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Choose Logo</label>
                                    <div class="custom-file">
                                        {{-- <input type="file" wire:model.lazy="image" class="custom-file-input" id="customFile"> --}}

                                        <input type="file" wire:model.lazy="logo" x-ref="logo">
                                        {{--                                        @if (!$image)--}}
                                        {{--                                            @if($QueryUpdate)--}}
                                        {{--                                                <img src="{{ asset('storage/photo')}}/{{ $QueryUpdate->image }}"  style="height:30px; weight:30px;" alt="Image" class="img-circle img-fluid">--}}
                                        {{--                                            @endif--}}
                                        {{--                                        @endif--}}
                                        {{--                                        @if ($image)--}}
                                        {{--                                            <img src="{{ $image->temporaryUrl() }}" style="height:30px; weight:30px;" alt="Image" class="img-circle img-fluid">--}}
                                        {{--                                        @endif--}}
                                        {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Invoice Title</label>
                                    <input class="form-control" type="text" wire:model.lazy="invoice_title" placeholder="Enter Invoice Title">
                                    @error('invoice_title') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Invoice Footer</label>
                                    <input class="form-control" type="text" wire:model.lazy="invoice_footer" placeholder="Enter Invoice Footer">
                                    @error('invoice_footer') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Vat Registration Number</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_reg_no" placeholder="Enter Vat Registration Number">
                                    @error('vat_reg_no') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Vat Area Code</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_area_code" placeholder="Enter Vat Area Code">
                                    @error('vat_area_code') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Vat Text</label>
                                    <input class="form-control" type="text" wire:model.lazy="vat_text" placeholder="Enter Vat Text">
                                    @error('vat_text') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="basicpill-lastname-input">Website</label>
                                    <input class="form-control" type="text" wire:model.lazy="website" placeholder="Enter Website Name">
                                    @error('website') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select class="form-control"  wire:model.lazy="currency_id">
                                        <option value="">Select Currency</option>
                                        @foreach ($Currencies as $Currency)
                                            <option value="{{ $Currency->id }}">{{ $Currency->symbol }}</option>
                                        @endforeach
                                    </select>
                                    @error('currency_id') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

{{--                            <div class="col-lg-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input type="checkbox" name="terms"  wire:model.lazy="top_show" @if($top_show) checked @endif>--}}
{{--                                    <label>Top Show Image</label><br/><br/>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input"  type="checkbox" wire:model.lazy="is_paid_due_hide" @if($is_paid_due_hide)  checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        is_paid_due_hide
                                    </label>
                                </div>
                                @error('is_paid_due_hide') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.lazy="is_memo_no_hide" @if($is_memo_no_hide)checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        is_memo_no_hide
                                    </label>
                                </div>
                                    @error('is_paid_due_hide') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire.model.lazy="is_chalan_no_hide" @if($is_chalan_no_hide) checked @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        is_chalan_no_hide
                                    </label>
                                </div>
                                @error('is_chalan_no_hide') <span class="error">{{ $message }}</span> @enderror
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
        @this.call('invoiceSettingEdit', id);
        }
        function callDelete(id) {
        @this.call('invoiceSettingDelete', id);
        }

        $(document).ready(function () {
            var datatable = $('#InvoiceSettingTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('data.invoiceSetting_table')}}",
                columns: [
                    {
                        title: 'SL',
                        data:  'id'
                    },
                    {
                        title: 'Type',
                        data:  'type',
                        name:  'type'
                    },
                    {
                        title:  'Logo',
                        data:  'logo',
                        name:  'logo'
                    },

                    {
                        title: 'Invoice Title',
                        data: 'invoice_title',
                        name: 'invoice_title'
                    },

                    {
                        title: 'Website',
                        data: 'website',
                        name: 'website'
                    },

                    {
                        title: 'Currency',
                        data: 'currency_id',
                        name: 'currency_id'
                    },

                    {
                        title: 'Action',
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

            window.livewire.on('success', message => {
                datatable.draw(true);
            });
        });
    </script>
@endpush

