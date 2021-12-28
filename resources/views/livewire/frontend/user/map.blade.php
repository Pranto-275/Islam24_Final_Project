<div class="mt-2">
    <div class="row">
        <!-- Start Add -->
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <form wire:submit.prevent="BloodDonationSave">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="card">
                                   <div class="card-body">
                                   <div class="form-group">
                                    <label for="basicpill-firstname-input">Mosque</label>
                                    <select class="form-control" wire:model.lazy="MapId">
                                        <option value="">--Select--</option>
                                        @foreach($maps as $map)
                                        <option value="{{$map->id}}">{{$map->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('group') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                </form>
           </div>
           <div class="col-md-3"></div>
        <!-- End Add -->
        <div class="col-md-3"></div>

        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    Mosque Location
  </div>
  <div class="card-body">
      @if(isset($SearchMap))
         <div class="row">
             <div class="col-md-4">{{$SearchMap->name}}</div>
             <div class="col-md-4">{{$SearchMap->location}}</div>
         </div>
      @endif
  </div>
  <ul class="list-group list-group-flush">

  </ul>
</div>
        </div>
        <div class="col-md-3"></div>
        <!-- End Side Content -->

    </div>

    <div class="text-center p-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d240895.39656292213!2d90.18107888668516!3d23.875507297494618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c23e9098a073%3A0x9a707416b7fb3c64!2sDaffodil%20International%20University!5e0!3m2!1sen!2sbd!4v1639808987097!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>


</div>
