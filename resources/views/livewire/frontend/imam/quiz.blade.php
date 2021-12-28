<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="card mt-2">
  <div class="card-header">
    Add Quiz
  </div>
  <div class="card-body">
  <form wire:submit.prevent="AddQuiz">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Quiz Name</label>
                                    <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter Your Quiz Name">
                                    @error('name') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="basicpill-firstname-input">Marks Per Question</label>
                                    <input class="form-control" type="text" wire:model.lazy="per_question_mark" placeholder="Marks Per Question">
                                    @error('per_question_mark') <span class="error" style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm float-right">Add Quiz</button>
                </form>
  </div>
</div>
        </div>
        <div class="col-md-2"></div>
    </div>

     <!-- Start Quiz Show -->
      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
          <table class="table table-hover mt-2">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Per Question Mark</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($quizes as $quiz)
    <tr>
      <th scope="row">1</th>
      <td>{{ $quiz->name }}</td>
      <td>{{ $quiz->per_question_mark }}</td>
      <td>{{ $quiz->status }}</td>
      <td>
      <a href="{{ route('question',['id'=>$quiz->id]) }}" class="btn btn-info btn-sm">Add Option</a>
      <a class="btn btn-primary btn-sm">Edit</a>
      <a class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
          </div>
          <div class="col-md-1"></div>
      </div>
     <!-- End Quiz Show -->

</div>