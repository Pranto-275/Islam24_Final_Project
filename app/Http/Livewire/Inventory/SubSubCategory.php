<?php

namespace App\Http\Livewire\Inventory;
use App\Models\Inventory\SubSubCategory as SubSubCategoryM;

use Livewire\Component;

class SubSubCategory extends Component
{
    public $code;
    public $name;
    public $branch_id;
    public $image;
    public function CategorySave()
    {
        dd($this->name." ".$this->code." ".$this->branch_id);
    }
    public function CategoryModal(){
        $this->code=floor(time()-999999);
        $this->emit('modal', 'CategoryModal');
    }
    public function render()
    {
        return view('livewire.inventory.sub-sub-category');
    }
}
