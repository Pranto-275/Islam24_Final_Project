<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class ShippedOrderList extends Component
{
    public function render()
    {
        return view('livewire.backend.order.shipped-order-list',[
            'shippedOrders'=> Order::whereStatus('shipped')->orderBy('id', 'DESC')->get(),
        ]);
    }
}
