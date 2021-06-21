<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function Product(){
        return $this->hasMany(Product::class);
    }
}
