<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class ReturnedOrderList extends Component
{
    public function render()
    {
        return view('livewire.backend.order.returned-order-list',[
            'returnOrders'=> Order::whereStatus('returned')->orderBy('id', 'DESC')->get(),
        ]);
    }
}
