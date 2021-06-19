<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\ProductInfo\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function SubCategory(){
        return $this->hasMany(SubCategory::class);
    }
}
