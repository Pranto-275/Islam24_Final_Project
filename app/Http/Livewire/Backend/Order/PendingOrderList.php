<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class PendingOrderList extends Component
{
    public function render()
    {
        return view('livewire.backend.order.pending-order-list',[
            'pendingOrders'=> Order::whereStatus('pending')->orderBy('id', 'DESC')->get(),
        ]);
    }
}
