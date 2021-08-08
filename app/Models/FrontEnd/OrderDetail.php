<?php

namespace App\Models\FrontEnd;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class);
    }
}
