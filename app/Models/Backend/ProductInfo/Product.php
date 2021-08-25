<?php

namespace App\Models\Backend\ProductInfo;

use App\Models\Backend\Inventory\PurchaseInvoiceDetail;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\Inventory\StockManager;
use App\Models\Backend\Setting\Vat;
use app\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function ProductImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class)->take(1);
    }

    public function ProductImageFirst()
    {
        return $this->hasOne(ProductImage::class)->whereIsDefault(1);
    }

    public function ProductImageLast()
    {
        return $this->hasOne(ProductImage::class)->orderBy('id', 'desc');
    }

    public function ProductImageTop4()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function SubSubCategory()
    {
        return $this->belongsTo(SubSubCategory::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ProductProperties()
    {
        return $this->hasMany(ProductProperties::class);
    }

    public function Vat()
    {
        return $this->belongsTo(Vat::class);
    }

    public function StockManager()
    {
        return $this->hasOne(StockManager::class);
    }

    public function PurchaseInvoiceDetail()
    {
        return $this->hasMany(PurchaseInvoiceDetail::class);
    }

    public function SaleInvoiceDetail()
    {
        return $this->hasMany(SaleInvoiceDetail::class);
    }

    public function ProductInfo()
    {
        return $this->hasOne(ProductInfo::class);
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
