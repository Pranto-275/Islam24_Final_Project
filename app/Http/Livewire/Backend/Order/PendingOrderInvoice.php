<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\FrontEnd\Order;
use Livewire\Component;

class PendingOrderInvoice extends Component
{
    public $OrderId;
    public $OrderInvoiceId;
    public function mount($id){
      $this->OrderInvoiceId=$id;
      $this->OrderId='P'.floor(time() - 999999999);
    }
    public function render()
    {
        return view('livewire.backend.order.pending-order-invoice',[
            'OrderInvoice'=>Order::whereId($this->OrderInvoiceId)->first(),
        ]);
    }
}
