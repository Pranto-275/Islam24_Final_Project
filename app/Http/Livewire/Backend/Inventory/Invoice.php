<?php

namespace App\Http\Livewire\Backend\Inventory;


use Livewire\Component;

class Invoice extends Component
{
    public function InvoiceModal(){
//        dd('');
        $this->emit('modal','InvoiceModal');
    }
    public function render()
    {
        return view('livewire.backend.inventory.invoice');
    }
}
