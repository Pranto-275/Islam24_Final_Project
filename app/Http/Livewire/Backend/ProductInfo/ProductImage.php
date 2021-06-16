<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\ProductInfo\ProductImage as ProductImageInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class ProductImage extends Component
{
    use WithFileUploads;

    public $product_id;
    public $image;
    public $status;
    public $ProductImageId=NULL;
    public $QueryUpdate=NULL;

    public function productImageEdit($id){
        $this->QueryUpdate = ProductImageInfo::find($id);
        $this->ProductImageId = $this->QueryUpdate->id;
        $this->product_id = $this->QueryUpdate->product_id;
        $this->status = $this->QueryUpdate->status;
        $this->emit('modal', 'productImageInfoModal');
    }
    public function productImageDelete($id){
        ProductImageInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Product Image Deleted Successfully',
        ]);
    }
    public function validation($id=NULL){
        if($id){
          $this->validate([
               'product_id' => 'required',
          ]);
        }else{
            $this->validate([
                'product_id' => 'required',
                'image' => 'required',
           ]);
        }
    }
    public function productImageSave()
    {

        if($this->ProductImageId){
            $this->validation($this->ProductImageId);
            $Query = ProductImageInfo::find($this->ProductImageId);
        }else{
            $this->validation();
            $Query = new ProductImageInfo();
            $Query->user_id = Auth::user()->id;
        }
        $Query->product_id = $this->product_id;
        if($this->image){
            $path = $this->image->store('/public/photo');
            $Query->image = basename($path);
        }
        $Query->status = $this->status;
        $Query->branch_id = 1;
        $Query->save();

        $this->reset();
        $this->productImageInfoModal();
        $this->emit('success', [
            'text' => 'Product Image C/U Successfully',
        ]);
    }
    public function productImageInfoModal(){
        $this->emit('modal','productImageInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.product-image',[
            'products'=>Product::get(),
        ]);
    }
}
