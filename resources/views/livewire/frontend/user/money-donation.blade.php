<div class="mt-2">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
        <div class="card">
  <div class="card-header">
    Money Donation
  </div>
  <ul class="list-group list-group-flush">
      <table class="table my-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Mosque Name</th>
      <th scope="col">Address</th>
      <th scope="col">bKash</th>
      <th scope="col">Rocket</th>
      <th scope="col">Bank Details</th>
    </tr>
  </thead>
  <tbody>
      @php
       $i=0;
      @endphp
  @foreach($donations as $donation)
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$donation->User->mosque}}</td>  
      <td>{{$donation->address}}</td>  
      <td>{{$donation->bKash}}</td>  
      <td>{{$donation->rocket}}</td>  
      <td>{{$donation->bank_details}}</td>  
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