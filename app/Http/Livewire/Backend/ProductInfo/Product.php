<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Product as ProductInfo;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\ProductInfo\ProductImage;
use App\models\Backend\ProductInfo\ProductProperties;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\Backend\ProductInfo\Color;
use App\Models\Backend\ProductInfo\Size;
use App\Models\Backend\Setting\Vat;
use App\Models\Backend\ContactInfo\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Product extends Component
{
    use WithFileUploads;

    public $code;
    public $name;
    public $sub_sub_category_id;
    public $short_description;
    public $long_description;
    public $regular_price;
    public $special_price;
    public $wholesale_price;
    public $purchase_price;
    public $discount;
    public $brand_id;
    public $contact_id;
    public $low_alert;
    public $youtube_link;
    public $meta_title;
    public $meta_description;
    public $meta_keyword;
    public $vat_id;
    public $status;

    public $images=[];
    public $selectedColors=[];
    public $selectedSizes=[];
    public $ProductId=NULL;
    public $QueryUpdate=NULL;

    public function productSave(){

        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'sub_sub_category_id' => 'required',
        ]);
        DB::transaction(function(){
        // Product Save
        if($this->ProductId){
           $Query=ProductInfo::find($this->ProductId);
        }else{
           $Query=new ProductInfo();
           $Query->user_id=Auth::user()->id;
        }

        $Query->code=$this->code;
        $Query->name=$this->name;
        $Query->short_description=$this->short_description;
        $Query->long_description=$this->long_description;
        $Query->regular_price=$this->regular_price;
        $Query->special_price=$this->special_price;
        $Query->wholesale_price=$this->wholesale_price;
        $Query->purchase_price=$this->purchase_price;
        $Query->discount=$this->discount;
        $Query->sub_sub_category_id=$this->sub_sub_category_id;
        $Query->brand_id=$this->brand_id;
        $Query->contact_id=$this->contact_id;
        $Query->low_alert=$this->low_alert;
        $Query->youtube_link=$this->youtube_link;
        $Query->meta_title=$this->meta_title;
        $Query->meta_description=$this->meta_description;
        $Query->meta_keyword=$this->meta_keyword;
        $Query->vat_id=$this->vat_id;
        $Query->status=$this->status;
        $Query->branch_id=1;
        $Query->save();

        if($this->images){
            ProductImage::whereProductId($Query->id)->delete();
        //   Image Save
          foreach($this->images as $image){
            $QueryImage=new ProductImage();
            $QueryImage->product_id=$Query->id;
            $path = $image->store('/public/photo');
            $QueryImage->image = basename($path);
            $QueryImage->user_id=Auth::user()->id;
            $QueryImage->branch_id=1;
            $QueryImage->save();
          }
        }

        // Product Property Save
        if($this->selectedColors && !$this->selectedSizes){
            foreach($this->selectedColors as $color){
               $QueryProperty=new ProductProperties();
               $QueryProperty->product_id=$Query->id;
               $QueryProperty->color_id=$color;
               $QueryProperty->branch_id=1;
               $QueryProperty->user_id=Auth::user()->id;
               $QueryProperty->save();
            }
        }elseif(!$this->selectedColors && $this->selectedSizes){
            foreach($this->selectedSizes as $size){
                $QueryProperty=new ProductProperties();
                $QueryProperty->product_id=$Query->id;
                $QueryProperty->size_id=$size;
                $QueryProperty->branch_id=1;
                $QueryProperty->user_id=Auth::user()->id;
                $QueryProperty->save();
             }
        }else{
            foreach($this->selectedColors as $color){
                foreach($this->selectedSizes as $size){
                $QueryProperty=new ProductProperties();
                $QueryProperty->product_id=$Query->id;
                $QueryProperty->size_id=$size;
                $QueryProperty->color_id=$color;
                $QueryProperty->branch_id=1;
                $QueryProperty->user_id=Auth::user()->id;
                $QueryProperty->save();
                }
            }
    }
    });
    $this->reset();
    $this->code = 'P'.floor(time() - 999999999);

    $this->emit('success', [
        'text' => 'Product C/U Successfully',
    ]);

    }
    public function mount(){
        $this->code = 'P'.floor(time() - 999999999);
    }
    public function render()
    {
        return view('livewire.backend.product-info.product',[
            'subSubCategories'=>SubSubCategory::get(),
            'brands'=>Brand::get(),
            'colors'=>Color::get(),
            'sizes'=>Size::get(),
            'vats'=>Vat::get(),
            'contacts'=>Contact::get(),
        ]);
    }
}
