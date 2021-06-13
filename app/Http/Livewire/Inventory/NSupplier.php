<?php

namespace App\Http\Livewire\Inventory;
use App\Models\Inventory\NSupplier as NSupplierM;

use Livewire\Component;

class NSupplier extends Component
{
    public $nsupplierCompanyName;
    public $nsupplierName;
    public $mobileNo;
    public $email;
    public $address;
    public function CategorySave()
    {
        dd($this->nsupplierCompanyName." ".$this->nsupplierName." ".$this->mobileNo." ".$this->email." ".$this->address);
    }
    public function CategoryModal(){
        $this->code=floor(time()-999999);
        $this->emit('modal', 'CategoryModal');
    }
    public function render()
    {
        return view('livewire.inventory.nsupplier');
    }
}