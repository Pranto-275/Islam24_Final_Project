<?php

namespace App\Http\Livewire\Inventory;
use App\Models\Inventory\Customer as CustomerM;

use Livewire\Component;

class Customer extends Component
{
    public $customerName;
    public $mobileNo;
    public $email;
    public $address;
    public function CategorySave()
    {
        dd($this->customerName." ".$this->mobileNo." ".$this->email." ".$this->address);
    }
    public function CategoryModal(){
        $this->code=floor(time()-999999);
        $this->emit('modal', 'CategoryModal');
    }
    public function render()
    {
        return view('livewire.inventory.customer');
    }
}
