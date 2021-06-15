<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;

class SubSubCategory extends Component
{
    public function ProductSubSubCategoryInfoModal(){
        $this->emit('modal','ProductSubSubCategoryInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.sub-sub-category');
    }
}
