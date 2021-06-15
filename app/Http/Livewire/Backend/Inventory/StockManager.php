<?php

namespace App\Http\Livewire\Backend\Inventory;

use Livewire\Component;

class StockManager extends Component
{
    public function StockManagerModal(){
        $this->emit('modal','StockManagerModal');
    }
    public function render()
    {
        return view('livewire.backend.inventory.stock-manager');
    }
}
