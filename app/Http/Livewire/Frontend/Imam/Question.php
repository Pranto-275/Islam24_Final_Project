<?php

namespace App\Http\Livewire\Frontend\Imam;
use App\Models\Frontend\Quiz;
use App\Models\Frontend\Question as QuestionInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Question extends Component
{
    public $ques;
    public $A;
    public $B;
    public $C;
    public $D;
    public $ans;
    public $QuizId;
    public $QuestionId;

    public function AddQuestion(){
        $this->validate([
            'ques' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
            'ans' => 'required',
         ]);

         if($this->QuestionId){
             $Query=QuestionInfo::find($this->QuestionId);
         }else{
             $Query=new QuestionInfo();
             $Query->quiz_id=$this->QuizId;
             $Query->user_id=Auth::user()->id;
         }
         $Query->ques=$this->ques;
         $Query->A=$this->A;
         $Query->B=$this->B;
         $Query->C=$this->C;
         $Query->D=$this->D;
         $Query->ans=$this->ans;
         $Query->save();
         $this->reset(['ques', 'A', 'B', 'C', 'D', 'ans']);
         $this->emit('success', [
            'text' => 'Question C/U Successfully',
         ]);
    }
    public function mount($id){
       $this->QuizId=$id;
    }
    public function render()
    {
        return view('livewire.frontend.imam.question',[
            'quiz'=>Quiz::find($this->QuizId),
        ])->layout('layouts.front_end');
    }
}
