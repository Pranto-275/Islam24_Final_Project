<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class Warehouse extends Component
{
    public function WarehouseModal(){
        $this->emit('modal','WarehouseModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.warehouse');
    }
}
