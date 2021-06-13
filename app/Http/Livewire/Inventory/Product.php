<?php

namespace App\Http\Livewire\Inventory;
use App\Models\Inventory\Product as ProductM;

use Livewire\Component;

class Product extends Component
{
    public $brandId;
    public $brandName;
    public $productId;
    public $productName;
    public $productPrice;
    public $productQuality;
    public $productPurchase;
    public $productPieces;
    public $productQuantity;
    public $productUnit;
   
    public function CategorySave()
    {
        dd($this->brandId." ".$this->brandName." ".$this->productId." ".$this->productName." ".
        $this->productPrice." ".$this->productQuality." ".$this->productPurchase." ".$this->productPieces." ".
        $this->productQuantity." ".$this->productUnit);
    }
    public function CategoryModal(){
        $this->code=floor(time()-999999);
        $this->emit('modal', 'CategoryModal');
    }
    public function render()
    {
        return view('livewire.inventory.product');
    }
}
