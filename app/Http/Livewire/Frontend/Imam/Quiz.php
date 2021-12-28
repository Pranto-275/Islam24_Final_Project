<?php

namespace App\Http\Livewire\Frontend\Imam;
use App\Models\Frontend\Quiz as QuizInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quiz extends Component
{
    public $name;
    public $per_question_mark;
    public $QuizId;

    public function AddQuiz(){
        $this->validate([
            'name' => 'required',
            'per_question_mark' => 'required',
         ]);

        if($this->QuizId){
          $Query=QuizInfo::find($this->QuizId);
        }else{
          $Query=new QuizInfo();
          $Query->user_id=Auth::user()->id;
          $Query->status='Pending';
        }
        $Query->name=$this->name;
        $Query->per_question_mark=$this->per_question_mark;
        $Query->save();
        $this->reset();
        $this->emit('success', [
            'text' => 'Quiz C/U Successfully',
         ]);
    }
    public function render()
    {
        return view('livewire.frontend.imam.quiz',[
            'quizes'=>QuizInfo::whereUserId(Auth::user()->id)->get(),
        ])->layout('layouts.front_end');
    }
}
