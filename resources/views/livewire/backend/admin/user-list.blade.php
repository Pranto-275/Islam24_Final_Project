<div class="container">
<table class="table table-info table-striped">
    <thead class="bg-dark text-light">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>NID</th>
        <th>Mosque</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @php
          $i=0;
        @endphp
        @foreach($users as $user)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->nid}}</td>
        <td>{{$user->mosque}}</td>
        <td>
            @if($user->is_active==0)
             Inactive
            @else
             Active
            @endif
        </td>
        <td>
        @if($user->is_active==0)
        <button type="button" class="btn btn-outline-danger" wire:click="ActiveStatus({{$user->id}})" style="width:100px;">Active</button>
            @else
            <button type="button" class="btn btn-outline-success" wire:click="InactiveStatus({{$user->id}})" style="width:100px;">Inactive</button>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
