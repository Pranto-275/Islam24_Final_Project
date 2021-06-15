<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class ProductProperties extends Component
{

    public function ProductPropertiesInfoModal(){
        $this->emit('modal','ProductPropertiesInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.product-properties');
    }
}
