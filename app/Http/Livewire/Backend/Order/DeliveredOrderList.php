<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class DeliveredOrderList extends Component
{
    public function render()
    {
        return view('livewire.backend.order.delivered-order-list',[
            'deliveredOrders'=> Order::whereStatus('delivered')->orderBy('id','DESC')->get(),
        ]);
    }
}
