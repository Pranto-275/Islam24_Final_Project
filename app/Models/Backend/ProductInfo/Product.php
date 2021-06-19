<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\ProductInfo\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function ProductImage(){
        return $this->hasMany(ProductImage::class)->take(1);
    }
}
