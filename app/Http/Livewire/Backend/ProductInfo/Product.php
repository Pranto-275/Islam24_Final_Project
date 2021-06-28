<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Product as ProductInfo;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\ProductInfo\ProductImage;
use App\models\Backend\ProductInfo\ProductProperties;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Product extends Component
{
    use WithFileUploads;

    public $code;
    public $name;
    public $sale_price;
    public $wholesale_price;
    public $purchase_price;
    public $sub_sub_category_id;
    public $low_alert;
    public $contact_id;
    public $status;
    public $size;
    public $color;
    public $images=[];
    public $ProductId=NULL;
    public $QueryUpdate=NULL;

    public function productEdit($id){
        $this->QueryUpdate = ProductInfo::find($id);
        $this->ProductId = $this->QueryUpdate->id;
        $this->code = $this->QueryUpdate->code;
        $this->name = $this->QueryUpdate->name;
        $this->sale_price = $this->QueryUpdate->sale_price;
        $this->wholesale_price = $this->QueryUpdate->wholesale_price;
        $this->purchase_price = $this->QueryUpdate->purchase_price;
        $this->sub_sub_category_id = $this->QueryUpdate->sub_sub_category_id;
        $this->low_alert = $this->QueryUpdate->low_alert;
        $this->contact_id = $this->QueryUpdate->contact_id;
        $this->status = $this->QueryUpdate->status;

        $this->emit('modal', 'productInfoModal');
    }
    public function productDelete($id){
        ProductInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Product Deleted Successfully',
        ]);
    }

    public function productSave()
    {

        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'sub_sub_category_id' => 'required',
            'contact_id' => 'required',
        ]);

        DB::transaction(function(){
        // Product
        if($this->ProductId){
            $Query = ProductInfo::find($this->ProductId);
        }else{
            $Query = new ProductInfo();
            $Query->user_id = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->sale_price = $this->sale_price;
        $Query->wholesale_price = $this->wholesale_price;
        $Query->purchase_price = $this->purchase_price;
        $Query->sub_sub_category_id = $this->sub_sub_category_id;
        $Query->low_alert = $this->low_alert;
        $Query->contact_id = $this->contact_id;
        $Query->old_sale_price = 123;
        $Query->vat_id = 1;
        $Query->status = $this->status;
        $Query->branch_id = 1;
        $Query->save();
        //Product Image
        foreach($this->images as $image){
            $ImageInsert=new ProductImage();
            $ImageInsert->product_id=$Query->id;
            $path = $image->store('/public/photo');
            $ImageInsert->image = basename($path);
            $ImageInsert->user_id = Auth::user()->id;
            $ImageInsert->branch_id = 1;
            $ImageInsert->save();
        }
        //Product Properties
        $colorArray = explode(',', $this->color);
        $sizeArray = explode(',', $this->size);

        foreach($colorArray as $color){
            foreach($sizeArray as $size){
               $ProductProperties=new ProductProperties();
               $ProductProperties->product_id=$Query->id;
               $ProductProperties->size=$size;
               $ProductProperties->color=$color;
               $ProductProperties->user_id = Auth::user()->id;
               $ProductProperties->branch_id = 1;
               $ProductProperties->save();
            }
        }

     });
        $this->reset();
        $this->productInfoModal();
        $this->emit('success', [
            'text' => 'Product C/U Successfully',
        ]);
    }

    public function productInfoModal(){
        $this->code = 'C'.floor(time() - 999999999);
        $this->emit('modal','productInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.product',[
            'subSubCategories'=>SubSubCategory::get(),
            'contacts'=>Contact::get(),
        ]);
    }
}
