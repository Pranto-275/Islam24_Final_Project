<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class InvoiceSetting extends Component
{
    public function InvoiceSettingModal(){
        $this->emit('modal','InvoiceSettingModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.invoice-setting');
    }
}
