<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class DeliveryMethod extends Component
{
    public function DeliveryMethodInfoModal(){
        $this->emit('modal','DeliveryMethodInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.delivery-method');
    }
}
