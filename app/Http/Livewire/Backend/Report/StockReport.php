<?php

namespace App\Http\Livewire\Backend\Report;

use Livewire\Component;
use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\Backend\ProductInfo\Product;

class StockReport extends Component
{
    public $category_id;
    public function render()
    {
        return view('livewire.backend.report.stock-report', [
            'categories' => Category::get(),
            'brands' => Brand::get(),
            'products' => Product::get(),
        ]);
    }
}
