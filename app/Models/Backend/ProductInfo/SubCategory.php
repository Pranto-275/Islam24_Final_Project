<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inventory\Category;
use App\Models\Backend\ProductInfo\SubSubCategory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function SubSubCategory(){
        return $this->hasMany(SubSubCategory::class);
    }
}
