<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Inventory\Invoice;
use Livewire\Component;

class OrderList extends Component
{


    public function popupInvoice(){
        $this->emit('modal','popupInvoice');
    }
    public function render()
    {
        return view('livewire.backend.order.order-list',[
            'invoices'=> Invoice::whereType('order')->get(),
            'contacts'=> Contact::get(),
        ]);
    }
}
