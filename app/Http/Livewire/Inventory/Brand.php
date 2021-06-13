<?php

namespace App\Http\Livewire\Inventory;
use App\Models\Inventory\Brand as BrandM;

use Livewire\Component;

class Brand extends Component
{
    public $code;
    public $name;
    public $branch_id;
    public $image;
    public function CategorySave()
    {
        dd($this->name." ".$this->code." ".$this->branch_id." ".$this->image);
    }
    public function CategoryModal(){
        $this->code=floor(time()-999999);
        $this->emit('modal', 'CategoryModal');
    }
    public function render()
    {
        return view('livewire.inventory.brand');
    }
}
