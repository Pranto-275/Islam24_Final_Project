<?php

namespace App\Models\Backend\Inventory;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\Inventory\PurchaseInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoiceDetail extends Model
{
    use HasFactory;
    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function PurchaseInvoice(){
        return $this->belongsTo(PurchaseInvoice::class);
    }
}
