@push('css')

@endpush
<div>
    <x-slot name="title">
        STOCK ADJUSTMENT
    </x-slot>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                       <div class="col-md-12">
                           <h4>Stock Adjustment</h4>
                        </div>
                       <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                              <div class="form-group">
                                  <label for="basicpill-firstname-input">Date</label>
                                  <input class="form-control" type="date" wire:model.lazy="date">
                              </div>
                        </div>
                        <div class="col-md-4">
                              <div class="form-group">
                                <label for="basicpill-firstname-input">Type</label>
                                <select class="form-control" wire:model.lazy="type">
                                     <option value="">Select Type</option>
                                     <option value="Transfer">Transfer</option>
                                     <option value="Transfer">Increase</option>
                                     <option value="Transfer">Decrease</option>
                                </select>
                                @error('type') <span class="error">{{ $message }}</span> @enderror
                              </div>
                        </div>
                        <div class="col-md-4">
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

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="basicpill-firstname-input">From Branch</label>
                          <select class="form-control" wire:model.lazy="from_branch_id">
                               <option value="">Select Branch</option>
                               @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                               @endforeach
                          </select>
                          @error('from_branch_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="basicpill-firstname-input">To Branch</label>
                          <select class="form-control" wire:model.lazy="to_branch_id">
                               <option value="">Select Branch</option>
                               @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                               @endforeach
                          </select>
                          @error('to_branch_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="basicpill-firstname-input">From Warehouse</label>
                          <select class="form-control" wire:model.lazy="from_warehouse_id">
                               <option value="">Select Warehouse</option>
                               @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                               @endforeach
                          </select>
                          @error('from_warehouse_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-group">
                          <label for="basicpill-firstname-input">To Warehouse</label>
                          <select class="form-control" wire:model.lazy="to_warehouse_id">
                               <option value="">Select Warehouse</option>
                               @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                               @endforeach
                          </select>
                          @error('to_warehouse_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                      </div>

                      <div class="col-md-12">
                        <textarea placeholder="Note" class="form-control" wire:model.lazy="note"></textarea>
                      </div>
                      <div class="col-md-12">
                          <center>
                            <button class="btn btn-success btn-lg mt-2" wire:click="saveStockAdjustment">Submit</button>
                          </center>
                      </div>
                     </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">

                    </div>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Contact</th>
                                        <th>From Branch</th>
                                        <th>To Branch</th>
                                        <th>From Warehouse</th>
                                        <th>To Warehouse</th>
                                        <th colspan="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($stockAdjustments as $stockAdjustment)

                                    <tr>
                                        <td>
                                            <a href="javascript: void(0);" class="text-body font-weight-bold">{{ ++$i }}</a>
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->date }}
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->type }}
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->Contact->name }}
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->FromBranch->name }}
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->ToBranch->name }}
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->FromWarehouse->name }}
                                        </td>
                                        <td>
                                            {{ $stockAdjustment->ToWarehouse->name }}
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" wire:click="editStockAdjustment({{$stockAdjustment->id}})"><i class="bx bx-edit font-size-18"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="bx bx-window-close font-size-18"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')

@endpush

