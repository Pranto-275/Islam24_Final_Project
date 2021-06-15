<?php

namespace App\Http\Livewire\Backend\Inventory;

use Livewire\Component;

class StockAdjustment extends Component
{
    public function StockAdjustmentModal(){
//        dd('');
        $this->emit('modal','StockAdjustmentModal');
    }
    public function render()
    {
        return view('livewire.backend.inventory.stock-adjustment');
    }
}
