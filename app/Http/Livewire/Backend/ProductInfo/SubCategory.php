<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class SubCategory extends Component
{

    public function SubCategoryModal(){
        $this->emit('modal','SubCategoryModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.sub-category');
    }
}
