<?php

namespace App\Http\Livewire\Inventory;
use App\Models\Inventory\Supplier as SupplierM;

use Livewire\Component;

class Supplier extends Component
{
    public $supplierCompanyName;
    public $supplierName;
    public $mobileNo;
    public $email;
    public $address;
    public function CategorySave()
    {
        dd($this->supplierCompanyName." ".$this->supplierName." ".$this->mobileNo." ".$this->email." ".$this->address);
    }
    public function CategoryModal(){
        $this->code=floor(time()-999999);
        $this->emit('modal', 'CategoryModal');
    }
    public function render()
    {
        return view('livewire.inventory.supplier');
    }
}
