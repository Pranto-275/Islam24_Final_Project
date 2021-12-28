<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FrontendHomeUserImam extends Component
{
    public function render()
    {
        return view('livewire.frontend-home-user-imam')->layout('layouts.home');
    }
}
