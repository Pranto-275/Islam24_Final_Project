<?php

namespace App\Models\Backend\ProductInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\ProductInfo\ProductImage;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\Backend\ProductInfo\ProductProperties;
use App\Models\Backend\Setting\Vat;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function ProductImage()
    {
        return $this->hasMany(ProductImage::class)->take(1);
    }

    public function ProductImageFirst()
    {
        return $this->hasOne(ProductImage::class);
    }

    public function ProductImageLast()
    {
        return $this->hasOne(ProductImage::class)->orderBy('id', 'desc');
    }

    public function ProductImageTop4()
    {
        return $this->hasMany(ProductImage::class)->take(4);
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
}
