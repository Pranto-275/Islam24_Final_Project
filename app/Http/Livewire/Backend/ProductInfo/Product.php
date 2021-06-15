<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class Product extends Component
{
    public function ProductInfoModal(){

        $this->emit('modal','ProductInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.product');
    }
}
