<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;

class CheckOut extends Component
{
    public function render()
    {

        return view('livewire.frontend.check-out')
        ->layout('layouts.front_end');
    }
}
