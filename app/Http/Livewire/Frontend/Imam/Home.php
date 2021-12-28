<?php

namespace App\Http\Livewire\Frontend\Imam;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.imam.home')->layout('layouts.front_end');
    }
}
