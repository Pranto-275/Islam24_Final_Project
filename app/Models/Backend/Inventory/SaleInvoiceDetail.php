<?php

namespace App\Models\Backend\Inventory;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\Inventory\SaleInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoiceDetail extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function SaleInvoice(){
        return $this->belongsTo(SaleInvoice::class);
    }
}
