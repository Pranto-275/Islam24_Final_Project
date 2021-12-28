@include('livewire.frontend.user.username');
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="card mt-2">
  <div class="card-header">
      <span>Ans These Question</span>
      <h5 class="text-center" style="color:red;">Obtain Marks {{$mark}}</h5>
  </div>
  <div class="card-body">
     @foreach($answers as $answer)
     <ul class="list-group">
  <li class="list-group-item">Q. {{$answer->ques}}</li>
  <li class="list-group-item"><button class="btn btn-sm btn-info" @if(isset($answer->Answer->question_id)) disabled @endif wire:click="SubmitAnswerA({{$answer->id}})">A:</button> {{$answer->A}}</li>
  <li class="list-group-item"><button class="btn btn-sm btn-info" @if(isset($answer->Answer->question_id)) disabled @endif wire:click="SubmitAnswerB({{$answer->id}})">B:</button> {{$answer->B}}</li>
  <li class="list-group-item"><button class="btn btn-sm btn-info" @if(isset($answer->Answer->question_id)) disabled @endif wire:click="SubmitAnswerC({{$answer->id}})">C:</button> {{$answer->C}}</li>
  <li class="list-group-item"><button class="btn btn-sm btn-info" @if(isset($answer->Answer->question_id)) disabled @endif wire:click="SubmitAnswerD({{$answer->id}})">D:</button> {{$answer->D}}</li>
</ul>
<hr>
     @endforeach
  </div>
</div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
