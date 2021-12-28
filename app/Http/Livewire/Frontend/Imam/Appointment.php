<?php

namespace App\Http\Livewire\Frontend\Imam;
use App\Models\Appointment as AppointmentInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Appointment extends Component
{
    public $status;
    public $meetlink;

    public function mount(){
        $Query=AppointmentInfo::whereUserId(Auth::user()->id)->first();
        if($Query){
            $this->status=$Query->status;
            $this->meetlink=$Query->meetlink;
        }
    }
    public function AddAppointment(){
        $this->validate([
            'status' => 'required',
            'meetlink' => 'required',
         ]);

         $Query=AppointmentInfo::whereUserId(Auth::user()->id)->firstOrNew();
         $Query->status=$this->status;
         $Query->meetlink=$this->meetlink;
         $Query->user_id=Auth::user()->id;
         $Query->save();
        //  $this->reset();

         $this->emit('success', [
            'text' => 'Appointment Saved!',
         ]);
    }
    public function render()
    {
        return view('livewire.frontend.imam.appointment',[
            'appointment'=>AppointmentInfo::whereUserId(Auth::user()->id)->get(),
        ])->layout('layouts.front_end');
    }
}
