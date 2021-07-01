<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class CustomerRegister extends Component
{
    public function render()
    {
        return view('livewire.frontend.customer-register')
        ->layout('layouts.front_end');
    }
}
