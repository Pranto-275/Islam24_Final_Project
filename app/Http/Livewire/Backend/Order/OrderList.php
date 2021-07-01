<?php

namespace App\Http\Livewire\Backend\Order;

use Livewire\Component;

class OrderList extends Component
{

    public function popupInvoice(){
        $this->emit('modal','popupInvoice');
    }
    public function render()
    {
        return view('livewire.backend.order.order-list');
    }
}