<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class CheckUserType extends Component
{
    public function render()
    {
        if (Auth::user()->hasAnyRole('imam')) {
            return view('livewire.frontend.imam.home')->layout('layouts.front_end');
        }else if (Auth::user()->hasAnyRole('user')) {
            return view('livewire.frontend.user.home')->layout('layouts.front_end_user');
        }
    }
}
