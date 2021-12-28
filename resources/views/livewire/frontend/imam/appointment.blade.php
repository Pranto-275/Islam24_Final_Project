<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="card mt-2">
  <div class="card-header">
    Add Appointment
  </div>
  <div class="card-body">
  <form wire:submit.prevent="AddAppointment">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Status</label>
                                    <select class="form-control" wire:model.lazy="status">
                                        <option value="">--Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Meet Link</label>
                                    <input class="form-control" type="text" wire:model.lazy="meetlink" placeholder="Meet Link">
                                    @error('meetlink') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Add Appointment</button>
                </form>
  </div>
</div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
