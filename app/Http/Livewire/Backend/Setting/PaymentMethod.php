<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class PaymentMethod extends Component
{
    public function PaymentMethodModal(){
        $this->emit('modal','PaymentMethodModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.payment-method');
    }
}
