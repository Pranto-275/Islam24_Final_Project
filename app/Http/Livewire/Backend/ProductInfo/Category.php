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
    public $image;
    public $status;
    public $CategoryId=NULL;
    public $QueryUpdate=NULL;

    public function categoryEdit($id){
        $this->QueryUpdate = ProductInfoCategory::find($id);
        $this->CategoryId = $this->QueryUpdate->id;
        $this->code = $this->QueryUpdate->code;
        $this->name = $this->QueryUpdate->name;
        $this->status = $this->QueryUpdate->status;

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
            $Query->user_id = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        if($this->image){
        $path = $this->image->store('/public/photo');
        $Query->image = basename($path);
        }
        $Query->branch_id = 1;
        $Query->status = $this->status;
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
