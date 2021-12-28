<div class="row mt-2">
  <style>
    .card-img {
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}

.card-title {
  margin-bottom: 0.3rem;
}

.cat {
  display: inline-block;
  margin-bottom: 1rem;
}

.fa-users {
  margin-left: 1rem;
}

.card-footer {
  font-size: 0.8rem;
}
  </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
        <div class="col-md-3"></div>
        <div class="col-6">
            <div class="card" style="background-color: #f7fbf6;">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3"></div>
                        <form   wire:submit.prevent="SaveHadis" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                            <div class="form-group">
                                    <label for="basicpill-firstname-input">Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Hadis Name">
                                    @error('name') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Add Hadis</label>
                                    <input class="form-control" type="file" wire:model.lazy="hadis">
                                    @error('hadis') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Add Hadis</button>
                            </div>
                        </div>
                        </form>
                        <div class="col-md-3"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Hadis</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hadises as $hadis)
    <tr>
      <th scope="row"> {{ $loop-> iteration }}</th>
      <td>{{$hadis->name}}</td>
      <td>
        <button class="btn btn-info" wire:click="DeleteHadis({{$hadis->id}})">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>
                    <!-- Start Post Show -->
                    <div class="row">

  </div>
                    <!-- End Post Show -->
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
