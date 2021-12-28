<?php

namespace App\Http\Livewire\Frontend\Imam;
use App\Models\Donation as DonationInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Donation extends Component
{
    public $bKash;
    public $rocket;
    public $bank_details;

    public function mount(){
        $Query=DonationInfo::whereUserId(Auth::user()->id)->first();
        if($Query){
            $this->bKash=$Query->bKash;
            $this->rocket=$Query->rocket;
            $this->bank_details=$Query->bank_details;
        }
    }
    public function AddAppointment(){
         $Query=DonationInfo::whereUserId(Auth::user()->id)->firstOrNew();
         $Query->bKash=$this->bKash;
         $Query->rocket=$this->rocket;
         $Query->bank_details=$this->bank_details;
         $Query->user_id=Auth::user()->id;
         $Query->save();
        //  $this->reset();

         $this->emit('success', [
            'text' => 'Donation Saved!',
         ]);
    }
    public function render()
    {
        return view('livewire.frontend.imam.donation')->layout('layouts.front_end');
    }
}
