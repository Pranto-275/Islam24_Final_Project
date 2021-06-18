<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
