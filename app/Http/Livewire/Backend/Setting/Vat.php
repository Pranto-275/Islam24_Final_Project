<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class Vat extends Component
{
    public function VatModal(){
        $this->emit('modal','VatModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.vat');
    }
}
