<div class="container">
<table class="table table-info table-striped">
    <thead class="bg-dark text-light">
      <tr>
        <th>#</th>
        <th>Post</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @php
          $i=0;
        @endphp
        @foreach($posts as $post)
      <tr>
        <td>{{++$i}}</td>
        <td>{!!$post->post!!}</td>
        <td>{{ $post->status }}</td>
        <td>
              <button type="button" class="btn btn-outline-primary" wire:click="ActiveStatus({{$post->id}})">Acive</button>
              <!-- <button type="button" class="btn btn-outline-danger">Cancel</button> -->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
