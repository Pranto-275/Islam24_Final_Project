<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class ApproveOrderList extends Component
{
    public function render()
    {
        return view('livewire.backend.order.approve-order-list',[
            'approveOrders'=> Order::whereStatus('approved')->get(),
        ]);
    }
}
