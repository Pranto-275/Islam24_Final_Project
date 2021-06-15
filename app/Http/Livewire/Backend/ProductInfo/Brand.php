<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class Brand extends Component
{
    public function BrandAInfoModal(){
        $this->emit('modal','BrandAInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.brand');
    }
}
