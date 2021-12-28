<?php

namespace App\Http\Livewire\Frontend\User;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.home')->layout('layouts.front_end_user');
    }
}
