<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\ProductInfo\ProductImage;
use App\Models\Backend\ProductInfo\ProductProperties;
use App\Models\Backend\ProductInfo\ProductInfo;
use Livewire\Component;

class ProductList extends Component
{
    public function deleteProduct($id){
        Product::find($id)->delete();
        ProductInfo::whereProductId($id)->delete();
        ProductImage::whereProductId($id)->delete();
        // ProductProperties::whereProductId($id)->delete();

        $this->emit('success', [
            'text' => 'Product Deleted Successfully',
        ]);
    }
    public function render()
    {
        return view('livewire.backend.product-info.product-list',[
            'products'=>Product::orderBy('id','desc')->get(),
        ]);
    }
}
