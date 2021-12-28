<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\Donation as DonationInfo;
use Livewire\Component;

class MoneyDonation extends Component
{
    public function render()
    {
        return view('livewire.frontend.user.money-donation',[
            'donations'=>DonationInfo::orderBy('id', 'DESC')->get(),
        ])->layout('layouts.front_end_user');
    }
}
