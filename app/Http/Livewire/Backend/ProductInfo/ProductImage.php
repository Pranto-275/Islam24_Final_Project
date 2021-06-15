<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class ProductImage extends Component
{
    public function productImageInfoModal(){
        $this->emit('modal','productImageInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.product-image');
    }
}
