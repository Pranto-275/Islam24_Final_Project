<div class="container">
<table class="table table-info table-striped">
    <thead class="bg-dark text-light">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Per Question Mark</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @php
          $i=0;
        @endphp
        @foreach($quizes as $quiz)
      <tr>
        <td>{{++$i}}</td>
        <td>{{ $quiz->name }}</td>
        <td>{{ $quiz->per_question_mark }}</td>
        <td>{{ $quiz->status }}</td>
        <td>
              <button type="button" class="btn btn-outline-primary" wire:click="ActiveStatus({{$quiz->id}})">Acive</button>
              <!-- <button type="button" class="btn btn-outline-danger">Cancel</button> -->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
