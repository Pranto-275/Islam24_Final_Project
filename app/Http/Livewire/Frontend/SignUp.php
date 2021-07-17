<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class SignUp extends Component
{
    public function render()
    {
        return view('livewire.frontend.sign-up')
        ->layout('layouts.front_end');
    }
}
