<?php

namespace App\Http\Livewire\Backend\ProductInfo;

use App\Models\Backend\ProductInfo\Category as ProductInfoCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Category extends Component
{
    use WithFileUploads;

    public $code;
    public $name;
    public $image1;
    public $image2;
    public $is_active;
    public $top_show;
    public $CategoryId=NULL;
    public $QueryUpdate=NULL;

    public function categoryEdit($id){
        $this->QueryUpdate = ProductInfoCategory::find($id);
        $this->CategoryId = $this->QueryUpdate->id;
        $this->code = $this->QueryUpdate->code;
        $this->name = $this->QueryUpdate->name;
        $this->is_active = $this->QueryUpdate->is_active;
        $this->top_show = $this->QueryUpdate->top_show;

        $this->emit('modal', 'categoryModal');
    }
    public function categoryDelete($id){
        ProductInfoCategory::find($id)->delete();

        $this->emit('success', [
            'text' => 'Category Deleted Successfully',
        ]);
    }
    public function categoryModal()
    {
        $this->code = 'C'.floor(time() - 999999999);
        $this->emit('modal', 'categoryModal');
    }

    public function categorySave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        if($this->CategoryId){
            $Query = ProductInfoCategory::find($this->CategoryId);
        }else{
            $Query = new ProductInfoCategory();
            $Query->created_by = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        if($this->image1){
        $path = $this->image1->store('/public/photo');
        $Query->image1 = basename($path);
        }
        if($this->image2){
            $path = $this->image2->store('/public/photo');
            $Query->image2 = basename($path);
        }
        $Query->branch_id = 1;
        $Query->is_active = $this->is_active;
        if($this->top_show){
           $Query->top_show = 1;
        }else{
           $Query->top_show = 0;
        }
        $Query->save();
        $this->reset();
        $this->CategoryModal();
        $this->emit('success', [
            'text' => 'Category Created Successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.product-info.category');
    }
}
