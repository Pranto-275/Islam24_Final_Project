@push('css')
       
@endpush
<div>
    <x-slot name="title">
        Stock Adjustment Reports
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <h4 class="card-title">Stock Adjustment Reports</h4>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                    <div class="col-md-4">
                              <div class="form-group">
                                  <label for="basicpill-firstname-input">Date</label>
                                  <input class="form-control" type="date" wire:model.lazy="date">
                              </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="basicpill-firstname-input">Stock Type</label>
                                <select class="form-control" wire:model.lazy="type">
                                    <option value="">Select Stock Type</option>
                                    <option value="Transfer">Transfer</option>
                                     <option value="Transfer">Increase</option>
                                     <option value="Transfer">Decrease</option>
                                </select>
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
                              <button class="btn btn-success btn-lg mt-2" wire:click="saveStockAdjustmentReport">Submit</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div wire:ignore class="table-responsive">
                        <table class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Contact Id</th>
                                <th>From Branch Id</th>
                                <th>To Branch Id</th>
                                <th>From Warehouse Id</th>
                                <th>To Warehouse Id</th>
                                <th>Note</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                             $i=0;
                            @endphp
                                @foreach($stocks as $stock)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $stock->date }}</td>
                                    <td>{{ $stock->type }}</td>
                                    <td>{{ $stock->contact_id }}</td>
                                    <td>{{ $stock->from_branch_id }}</td>
                                    <td>{{ $stock->to_branch_id }}</td>
                                    <td>{{ $stock->from_warehouse_id }}</td>
                                    <td>{{ $stock->to_warehouse_id }}</td>
                                    <td>{{ $stock->note }}</td>
                                    <td>
                                            <button class="btn btn-primary btn-sm" wire:click="editStock({{$stock->id}})"><i class="bx bx-edit font-size-18"></i></button>
                                            <button class="btn btn-danger btn-sm" wire:click="deleteStock({{$stock->id}})"><i class="bx bx-window-close font-size-18"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
       
@endpush

