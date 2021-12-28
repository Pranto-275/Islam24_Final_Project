<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\Appointment;
use Livewire\Component;

class AppointmentList extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.appointment-list',[
           'lists'=>Appointment::whereStatus(1)->orderBy('id', 'DESC')->get(),
        ])->layout('layouts.front_end_user');
    }
}
