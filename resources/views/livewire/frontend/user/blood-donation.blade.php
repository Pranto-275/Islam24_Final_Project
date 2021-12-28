<div class="mt-2">
    <div class="row">
        <!-- Start Add -->
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <form wire:submit.prevent="BloodDonationSave">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Blood Group</label>
                                    <select class="form-control" wire:model.lazy="group">
                                        <option value="">--Select--</option>
                                        <option value="A">A</option>
                                        <option value="A+">A+</option>
                                        <option value="B">B</option>
                                        <option value="B+">B+</option>
                                        <option value="O">O</option>
                                        <option value="O+">O+</option>
                                        <option value="AB">AB</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    @error('group') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Phone</label>
                                    <input class="form-control" type="text" wire:model.lazy="phone" placeholder="Phone">
                                    @error('phone') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm float-right my-2">Save</button>
                </form>
           </div>
           <div class="col-md-3"></div>
        <!-- End Add -->
        <div class="col-md-3"></div>

        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    Blood Group
  </div>
  <ul class="list-group list-group-flush">
      <table class="table my-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Blood Group</th>
    </tr>
  </thead>
  <tbody>
      @php
       $i=0;
      @endphp
  @foreach($donations as $donation)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$donation->User->name}}</td>  
      <td>{{$donation->phone}}</td>  
      <td>{{$donation->group}}</td>  
    </tr>
    @endforeach
  </tbody>
</table>
  </ul>
</div>
        </div>
        <div class="col-md-3"></div>
        <!-- End Side Content -->

    </div>
</div>