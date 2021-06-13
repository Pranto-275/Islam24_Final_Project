<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use App\Models\Backend\ProductInfo\Category as ProductInfoCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Category extends Component
{
    public $code;
    public $name;
    public $status;

    public function CategoryModal()
    {
        // dd(true);
        $this->emit('modal', 'CategoryModal');
    }

    public function CategorySave()
    {
        $Category = new ProductInfoCategory();
        $Category->code = $this->code;
        $Category->name = $this->name;
        $Category->branch_id = 1;
        $Category->user_id = Auth::id();
        $Category->status = $this->status;
        $Category->save();
        $this->reset();
        $this->emit('success', [
            'text' => 'Category Created Successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.product-info.category');
    }
}
