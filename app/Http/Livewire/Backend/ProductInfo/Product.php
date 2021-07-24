<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\Backend\ProductInfo\Color;
use App\Models\Backend\ProductInfo\Product as ProductTable;
use App\Models\Backend\ProductInfo\ProductImage;
use App\Models\Backend\ProductInfo\ProductInfo;
use App\models\Backend\ProductInfo\ProductProperties;
use App\Models\Backend\ProductInfo\Size;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\Setting\Vat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

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
    public $is_active;

    public $images = [];
    public $selectedColors = [];
    public $selectedSizes = [];
    public $ProductId = null;
    public $QueryUpdate;

    public function mount($id = null)
    {
        if ($id) {
            // Update Product
            $this->QueryUpdate = ProductTable::find($id);
            $this->ProductId = $this->QueryUpdate->id;
            $this->code = $this->QueryUpdate->code;
            $this->name = $this->QueryUpdate->name;

            $this->regular_price = $this->QueryUpdate->regular_price;
            $this->special_price = $this->QueryUpdate->special_price;
            $this->wholesale_price = $this->QueryUpdate->wholesale_price;
            $this->purchase_price = $this->QueryUpdate->purchase_price;
            $this->discount = $this->QueryUpdate->discount;
            $this->sub_sub_category_id = $this->QueryUpdate->sub_sub_category_id;
            $this->brand_id = $this->QueryUpdate->brand_id;
            // $this->contact_id=$this->QueryUpdate->contact_id;
            $this->low_alert = $this->QueryUpdate->low_alert;

            $this->vat_id = $this->QueryUpdate->vat_id;
            $this->is_active = $this->QueryUpdate->is_active;
            $this->branch_id = 1;

            $productInfo = ProductInfo::whereProductId($id)->first();
            if ($productInfo) {
                $this->youtube_link = $productInfo->youtube_link;
                $this->meta_title = $productInfo->meta_title;
                $this->meta_description = $productInfo->meta_description;
                $this->meta_keyword = $productInfo->meta_keyword;
                $this->short_description = $productInfo->short_description;
                $this->long_description = $productInfo->long_description;
            }

            // $i = 0;
            // $j = 0;
            // foreach ($this->QueryUpdate->ProductProperties as $product) {
            //     if ($product->size_id) {
            //         $this->selectedSizes[$i++] = $product->size_id;
            //     }
            //     if ($product->color_id) {
            //         $this->selectedColors[$j++] = $product->color_id;
            //     }
            // }
            // $this->selectedSizes = array_unique($this->selectedSizes);
            // $this->selectedColors = array_unique($this->selectedColors);
        }
        // Product Code
        $this->code = 'P'.floor(time() - 999999999);
    }

    public function productSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'sub_sub_category_id' => 'required',
        ]);
        DB::transaction(function () {
            // Product Save
            if ($this->ProductId) {
                $Query = ProductTable::find($this->ProductId);
            } else {
                $Query = new ProductTable();
                $Query->created_by = Auth::user()->id;
            }

            $Query->code = $this->code;
            $Query->name = $this->name;

            $Query->regular_price = $this->regular_price;
            $Query->special_price = $this->special_price;
            $Query->wholesale_price = $this->wholesale_price;
            $Query->purchase_price = $this->purchase_price;
            $Query->discount = $this->discount;
            $Query->sub_sub_category_id = $this->sub_sub_category_id;
            $Query->brand_id = $this->brand_id;
            // $Query->contact_id=$this->contact_id;
            $Query->low_alert = $this->low_alert;
            $Query->vat_id = $this->vat_id;
            $Query->is_active = $this->is_active;
            $Query->branch_id = 1;
            $Query->save();

            $productInfo = ProductInfo::whereProductId($Query->id)->firstOrNew();
            $productInfo->product_id = $Query->id;
            $productInfo->youtube_link = $this->youtube_link;
            $productInfo->meta_title = $this->meta_title;
            $productInfo->meta_description = $this->meta_description;
            $productInfo->meta_keyword = $this->meta_keyword;
            $productInfo->short_description = $this->short_description;
            $productInfo->long_description = $this->long_description;
            $productInfo->branch_id = 1;
            $productInfo->created_by = Auth::user()->id;
            $productInfo->save();

            if ($this->images) {
                if ($this->ProductId) {
                    // Delete Old Image
                    ProductImage::whereProductId($this->ProductId)->delete();
                }
                //   Image Save
                foreach ($this->images as $image) {
                    $QueryImage = new ProductImage();
                    $QueryImage->product_id = $Query->id;
                    $path = $image->store('/public/photo');
                    $QueryImage->image = basename($path);
                    $QueryImage->created_by = Auth::user()->id;
                    $QueryImage->branch_id = 1;
                    $QueryImage->save();
                }
            }

            // if ($this->ProductId) {
            //     $QueryProperty = ProductProperties::whereProductId($this->ProductId)->delete();
            // }
            // Product Property Save
            // if ($this->selectedColors && !$this->selectedSizes) {
            //     foreach ($this->selectedColors as $color) {
            //         $QueryProperty = new ProductProperties();
            //         $QueryProperty->product_id = $Query->id;
            //         $QueryProperty->color_id = $color;
            //         $QueryProperty->branch_id = 1;
            //         $QueryProperty->created_by = Auth::user()->id;
            //         $QueryProperty->save();
            //     }
            // } elseif (!$this->selectedColors && $this->selectedSizes) {
            //     foreach ($this->selectedSizes as $size) {
            //         $QueryProperty = new ProductProperties();
            //         $QueryProperty->product_id = $Query->id;
            //         $QueryProperty->size_id = $size;
            //         $QueryProperty->branch_id = 1;
            //         $QueryProperty->created_by = Auth::user()->id;
            //         $QueryProperty->save();
            //     }
            // } else {
            //     foreach ($this->selectedColors as $color) {
            //         foreach ($this->selectedSizes as $size) {
            //             $QueryProperty = new ProductProperties();
            //             $QueryProperty->product_id = $Query->id;
            //             $QueryProperty->size_id = $size;
            //             $QueryProperty->color_id = $color;
            //             $QueryProperty->branch_id = 1;
            //             $QueryProperty->created_by = Auth::user()->id;
            //             $QueryProperty->save();
            //         }
            //     }
            // }
        });
        if (!$this->ProductId) {
            $this->reset();
            $this->code = 'P'.floor(time() - 999999999);

            $this->emit('success', [
        'text' => 'Product C/U Successfully',
        ]);
        } else {
            $this->emit('success_redirect', [
                'text' => 'Product C/U Successfully',
                'url' => route('product.product-list'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.backend.product-info.product', [
            'subSubCategories' => SubSubCategory::get(),
            'brands' => Brand::get(),
            'colors' => Color::get(),
            'sizes' => Size::get(),
            'vats' => Vat::get(),
            'contacts' => Contact::get(),
        ]);
    }
}
