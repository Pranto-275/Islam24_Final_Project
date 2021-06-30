<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Product;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        return view('livewire.backend.product-info.product-list',[
            'products'=>Product::get(),
        ]);
    }
}
