<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class CancelOrderList extends Component
{
    public function render()
    {
        return view('livewire.backend.order.cancel-order-list',[
            'cancelOrders'=> Order::whereStatus('cancelled')->orderBy('id', 'DESC')->get(),
        ]);
    }
}
