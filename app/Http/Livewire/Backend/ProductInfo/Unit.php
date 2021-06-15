<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class Unit extends Component
{
    public function ProductUnitInfoModal(){
        $this->emit('modal','ProductUnitInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.unit');
    }
}
