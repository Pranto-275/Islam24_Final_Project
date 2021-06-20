<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\SubSubCategory as SubSubCategoryProductInfo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
class SubSubCategory extends Component
{
    use WithFileUploads;

    public $code;
    public $name;
    public $image;
    public $description;
    public $sub_category_id;
    public $status;
    public $subSubCategoryId=NULL;
    public $QueryUpdate=NULL;

    public function subSubCategoryEdit($id){

        $this->QueryUpdate = SubSubCategoryProductInfo::find($id);
        $this->subSubCategoryId = $this->QueryUpdate->id;
        $this->code = $this->QueryUpdate->code;
        $this->name = $this->QueryUpdate->name;
        $this->description = $this->QueryUpdate->description;
        $this->sub_category_id = $this->QueryUpdate->sub_category_id;
        $this->status = $this->QueryUpdate->status;

        $this->emit('modal', 'ProductSubSubCategoryInfoModal');
    }
    public function subSubCategoryDelete($id){
        SubSubCategoryProductInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Sub-Sub Category Deleted Successfully',
        ]);
    }
    public function saveSubSubCategory(){
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'sub_category_id' => 'required',
        ]);

        if($this->subSubCategoryId){
            $Query = SubSubCategoryProductInfo::find($this->subSubCategoryId);
        }else{
            $Query = new SubSubCategoryProductInfo();
            $Query->user_id = Auth::user()->id;
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        if($this->image){
        $path = $this->image->store('/public/photo');
        $Query->image = basename($path);
        }
        $Query->description = $this->description;
        $Query->sub_category_id = $this->sub_category_id;
        $Query->status = $this->status;
        $Query->branch_id = 1;

        $Query->save();
        $this->reset();
        $this->ProductSubSubCategoryInfoModal();
        $this->emit('success', [
            'text' => 'Sub-Sub Category Created Successfully',
        ]);
    }
    public function ProductSubSubCategoryInfoModal(){
        $this->code = 'C'.floor(time() - 999999999);
        $this->emit('modal','ProductSubSubCategoryInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.sub-sub-category',[
            'subCategories'=>SubCategory::get(),
        ]);
    }
}
