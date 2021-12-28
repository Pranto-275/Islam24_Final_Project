<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="card mt-2">
  <div class="card-header">
    Add Map
  </div>
  <div class="card-body">
  <form wire:submit.prevent="AddMap">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Mosque Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Name">
                                    @error('name') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Location</label>
                                    <input class="form-control" type="text" wire:model.lazy="location" placeholder="Location">
                                    @error('location') <span class="error" style="color:red;">{{ $message }}</span> @enderror
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

    <table class="table table-info table-striped">
    <thead class="bg-dark text-light">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Location</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @php
          $i=0;
        @endphp
        @foreach($maps as $map)
      <tr>
        <td>{{++$i}}</td>
        <td>{{ $map->name }}</td>
        <td>{{ $map->location }}</td>
        <td>
              <button type="button" class="btn btn-outline-primary" wire:click="EditMap({{$map->id}})">Edit</button>
              <button type="button" class="btn btn-outline-danger" wire:click="DeleteMap({{$map->id}})">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>