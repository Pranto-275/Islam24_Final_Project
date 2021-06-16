<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use Livewire\Component;
use App\models\Backend\ProductInfo\ProductProperties as ProductPropertiesInfo;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Support\Facades\Auth;

class ProductProperties extends Component
{
    public $product_id;
    public $size;
    public $color;
    public $status;
    public $ProductPropertiesId=NULL;
    public $QueryUpdate=NULL;

    public function productPropertiesEdit($id){
        $this->QueryUpdate = ProductPropertiesInfo::find($id);
        $this->ProductPropertiesId = $this->QueryUpdate->id;
        $this->product_id = $this->QueryUpdate->product_id;
        $this->size = $this->QueryUpdate->size;
        $this->color = $this->QueryUpdate->color;
        $this->status = $this->QueryUpdate->status;

        $this->emit('modal', 'productPropertiesInfoModal');
    }
    public function productPropertiesDelete($id){
        ProductPropertiesInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Product Property Deleted Successfully',
        ]);
    }

    public function productPropertiesSave()
    {
        $this->validate([
            'product_id' => 'required',
            'size' => 'required',
            'color' => 'required',
            'status' => 'required',
        ]);

        if($this->ProductPropertiesId){
            $Query = ProductPropertiesInfo::find($this->ProductPropertiesId);
        }else{
            $Query = new ProductPropertiesInfo();
            $Query->user_id = Auth::user()->id;
        }
        $Query->product_id = $this->product_id;
        $Query->size = $this->size;
        $Query->color = $this->color;
        $Query->status = $this->status;
        $Query->branch_id = 1;
        $Query->save();
        $this->reset();
        $this->productPropertiesInfoModal();
        $this->emit('success', [
            'text' => 'Product Property C/U Successfully',
        ]);
    }
    public function productPropertiesInfoModal(){
        $this->emit('modal','productPropertiesInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.product-properties',[
            'products'=>Product::get(),
        ]);
    }
}
