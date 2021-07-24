<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class SignIn extends Component
{
    public function render()
    {
        return view('livewire.frontend.sign-in')
        ->layout('layouts.front_end');
    }
}
