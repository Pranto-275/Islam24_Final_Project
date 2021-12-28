<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="card mt-2">
  <div class="card-header">
    Add Donation Info
  </div>
  <div class="card-body">
  <form wire:submit.prevent="AddAppointment">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">bKash</label>
                                    <input class="form-control" type="text" wire:model.lazy="bKash" placeholder="bKash">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Rocket</label>
                                    <input class="form-control" type="text" wire:model.lazy="rocket" placeholder="Rocket">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" wire:model.lazy="bank_details" placeholder="Bank Details"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Save</button>
                </form>
  </div>
</div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
