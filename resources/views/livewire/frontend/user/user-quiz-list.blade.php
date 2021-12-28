@include('livewire.frontend.user.username')
<div class="mt-2">
    <div class="row">
        <!-- Start Side Content -->

        <div class="col-md-4">
        <div class="card">
  <div class="card-header">
    All Quizes
  </div>
  <ul class="list-group list-group-flush">
      @foreach($quizes as $quiz)
        <li class="list-group-item"><a href="{{ route('attempt-quiz',['id'=>$quiz->id]) }}">{{$quiz->name}}</a></li>
      @endforeach
  </ul>
</div>
        </div>
        <!-- End Side Content -->

        <!-- Start Content -->
        <div class="col-md-8">
            @include('livewire.frontend.user.prayertime')
        </div>
        <!-- End Content -->
    </div>
</div>
