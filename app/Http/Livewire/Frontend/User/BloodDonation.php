<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\Blood;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BloodDonation extends Component
{
    public $group;
    public $phone;
    public function BloodDonationSave(){
        $this->validate([
            'group' => 'required',
            'phone' => 'required',
         ]);

         $Query=Blood::whereUserId(Auth::user()->id)->firstOrNew();
         $Query->user_id = Auth::user()->id;
         $Query->group = $this->group;
         $Query->phone = $this->phone;
         $Query->save();

         $this->emit('success', [
            'text' => 'Blood Group Saved Successfully!!',
         ]);
    }
    public function render()
    {
        return view('livewire.frontend.user.blood-donation',[
            'donations'=>Blood::orderBy('id', 'DESC')->get(),
        ])->layout('layouts.front_end_user');
    }
}
