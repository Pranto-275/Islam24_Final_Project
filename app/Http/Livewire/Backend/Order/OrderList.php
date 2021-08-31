<?php

namespace App\Http\Livewire\Backend\Order;
use App\Models\Backend\Inventory\SaleInvoice;
use App\Models\Backend\Inventory\SaleInvoiceDetail;
use App\Models\Backend\Inventory\SalePayment;
use App\Models\FrontEnd\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderList extends Component
{
    public $status;
    public function OrderStatus(){
        $IdStatus=explode(' ', $this->status);
        $this->status=$IdStatus['0'];
        $id=$IdStatus['1'];
        if($this->status=="approved"){
            DB::transaction(function() use($id) {
        // Start Data From Order To Sale Invoice
             $order=Order::find($id);
             $saleInvoice=SaleInvoice::whereOrderId($order->id)->firstOrNew();
             $saleInvoice->order_id=$order->id;
             $saleInvoice->code='SI'.floor(time() - 999999999);
             $saleInvoice->contact_id=$order->contact_id;
             $saleInvoice->sale_date=Carbon::now();
             $saleInvoice->total_amount	=$order->total_amount;
             $saleInvoice->discount=$order->discount;
             $saleInvoice->shipping_charge=$order->shipping_charge;
             $saleInvoice->vat=$order->vat;
             $saleInvoice->payable_amount=$order->payable_amount;
             $saleInvoice->branch_id=Auth::user()->branch_id;
             $saleInvoice->created_by=Auth::user()->id;
             $saleInvoice->save();
        // End Data From Order To Sale Invoice

        // Start Order Detail To Sale Invoice Details
           foreach($order->OrderDetail as $orderProduct){
               $saleInvoiceDetail=new SaleInvoiceDetail();
               $saleInvoiceDetail->sale_invoice_id=$saleInvoice->id;
               $saleInvoiceDetail->product_id=$orderProduct->product_id;
               $saleInvoiceDetail->unit_price=$orderProduct->unit_price;
               $saleInvoiceDetail->quantity=$orderProduct->quantity;
               $saleInvoiceDetail->quantity=$orderProduct->quantity;
               $saleInvoiceDetail->quantity=$orderProduct->quantity;
               $saleInvoiceDetail->branch_id=Auth::user()->branch_id;
               $saleInvoiceDetail->created_by=Auth::user()->id;
               $saleInvoiceDetail->save();
           }
        // End Order Detail To Sale Invoice Details

        // Approve Order
             $order->status="approved";
             $order->save();
            });
             $this->emit('success',[
                'text' => 'Order Approved Successfully',
             ]);
        }else if($this->status="cancel"){
        //  Approve Order
            $order=Order::find($id);
            $order->status="cancel";
            $order->save();

            $this->emit('success',[
                'text' => 'Order Cancel Successfully',
             ]);
        }
    }
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
            'orders'=> Order::whereStatus('pending')->orderBy('id', 'DESC')->get(),
        ]);
    }
}
