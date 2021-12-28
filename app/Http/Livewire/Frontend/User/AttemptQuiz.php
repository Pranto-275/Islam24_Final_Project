<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\FrontEnd\Question;
use App\Models\FrontEnd\Answer;
use App\Models\Frontend\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AttemptQuiz extends Component
{
    public $QuizId;
    public $mark=0;
    public function SubmitAnswerA($id){
       $Quiz=Question::find($id);
       $Query=new Answer();
       $Query->quiz_id=$this->QuizId;
       $Query->question_id=$id;
       $Query->user_id=Auth::user()->id;
       $Query->given_ans='A';
       $Query->real_ans=$Quiz->ans;
       $Query->save();
       $this->UpdatedMark();

       $this->emit('success', [
        'text' => 'Submitted Your Answer Successfully',
     ]);
    }
    public function SubmitAnswerB($id){
        $Quiz=Question::find($id);
        $Query=new Answer();
        $Query->quiz_id=$this->QuizId;
        $Query->question_id=$id;
        $Query->user_id=Auth::user()->id;
        $Query->given_ans='B';
        $Query->real_ans=$Quiz->ans;
        $Query->save();
        $this->UpdatedMark();
 
        $this->emit('success', [
         'text' => 'Submitted Your Answer Successfully',
      ]);
     }
     public function SubmitAnswerC($id){
        $Quiz=Question::find($id);
        $Query=new Answer();
        $Query->quiz_id=$this->QuizId;
        $Query->question_id=$id;
        $Query->user_id=Auth::user()->id;
        $Query->given_ans='C';
        $Query->real_ans=$Quiz->ans;
        $Query->save();
        $this->UpdatedMark();
 
        $this->emit('success', [
         'text' => 'Submitted Your Answer Successfully',
      ]);
     }
     public function SubmitAnswerD($id){
        $Quiz=Question::find($id);
        $Query=new Answer();
        $Query->quiz_id=$this->QuizId;
        $Query->question_id=$id;
        $Query->user_id=Auth::user()->id;
        $Query->given_ans='D';
        $Query->real_ans=$Quiz->ans;
        $Query->save();
        $this->UpdatedMark();
 
        $this->emit('success', [
         'text' => 'Submitted Your Answer Successfully',
      ]);
     }
    public function mount($id){
       $this->QuizId=$id;
       $this->UpdatedMark();
    }
    public function UpdatedMark(){
        $totalCorrect=0;
        $Correct=Answer::whereUserId(Auth::user()->id)->whereQuizId($this->QuizId)->get();
        foreach($Correct as $Corr){
            if($Corr->given_ans==$Corr->real_ans){
            $totalCorrect++;
            }
        }
        $Quiz=Quiz::whereId($this->QuizId)->first();
        $this->mark=$totalCorrect*$Quiz->per_question_mark;
    }
    public function render()
    {
        return view('livewire.frontend.user.attempt-quiz',[
            'answers'=>Question::join('quizzes', 'quizzes.id', '=', 'quiz_id')->whereQuizId($this->QuizId)->select('questions.*')->get(),
        ])->layout('layouts.front_end_user');
    }
}
