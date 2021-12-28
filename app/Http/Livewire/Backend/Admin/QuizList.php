<?php

namespace App\Http\Livewire\Backend\Admin;
use App\Models\Frontend\Quiz;
use Livewire\Component;

class QuizList extends Component
{
    public function ActiveStatus($id){
        $Query=Quiz::find($id);
       $Query->status="Approve";
       $Query->save();

       $this->emit('success', [
        'text' => 'Quiz Approved Successfully',
     ]);
    }
    public function render()
    {
        return view('livewire.backend.admin.quiz-list',[
            'quizes'=>Quiz::get(),
        ]);
    }
}
