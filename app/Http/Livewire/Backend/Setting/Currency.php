<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class Currency extends Component
{
    public function CurrencyInfoModal(){
        $this->emit('modal','CurrencyInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.currency');
    }
}
