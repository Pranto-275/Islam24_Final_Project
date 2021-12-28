<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\Frontend\Quiz;
use Livewire\Component;

class UserQuizList extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.user-quiz-list',[
            'quizes'=>Quiz::whereStatus('Approve')->get(),
        ])->layout('layouts.front_end_user');
    }
}
