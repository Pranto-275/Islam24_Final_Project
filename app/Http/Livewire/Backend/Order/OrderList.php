<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\Backend\Inventory\SaleInvoice;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\Inventory\SalePayment;
use Livewire\Component;

class OrderList extends Component
{
    public function deleteOrder($id){
        SaleInvoice::whereId($id)->delete();
        SaleInvoiceDetail::whereSaleInvoiceId($id)->delete();
        SalePayment::whereSaleInvoiceId($id)->delete();

        $this->emit('success', [
            'text' => 'Order Deleted Successfully',
        ]);
    }
    public function render()
    {
        return view('livewire.backend.order.order-list',[
            'saleInvoices'=> SaleInvoice::whereInvoiceChannel('Web-Sale')->orderBy('id', 'desc')->get(),
        ]);
    }
}
