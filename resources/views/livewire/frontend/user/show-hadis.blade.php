<div class="mt-2">
    <div class="row">
        <!-- Start Side Content -->
        <div class="col-md-3"></div>

        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    All Hadith
  </div>
  <ul class="list-group list-group-flush">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
  <tbody>
      @php
       $i=0;
      @endphp
  @foreach($hadises as $hadis)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{ $hadis->name }}</td>
      <td>
          <button class="btn btn-primary" wire:click="DownloadHadis({{$hadis->id}})">Download</button>
      </td>
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
