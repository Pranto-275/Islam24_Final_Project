@include('livewire.frontend.user.username');
<div class="mt-2">
    <div class="row">
        <!-- Start Side Content -->
        <div class="col-md-3"></div>

        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    All Appointment
  </div>
  <ul class="list-group list-group-flush">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Meet Link</th>
    </tr>
  </thead>
  <tbody>
      @php
       $i=0;
      @endphp
  @foreach($lists as $list)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{ $list->User->name }}</td>
      <td>
          <a class="btn btn-outline-info" href="{{$list->meetlink}}" target="_blank">Meet Link</a>
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
