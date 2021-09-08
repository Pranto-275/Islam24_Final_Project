<?php

namespace App\Http\Livewire\Backend\Order;

use App\Models\FrontEnd\Order;
use Carbon\Carbon;
use Livewire\Component;

class DeliveredOrderList extends Component
{
    public $from_date = '00-00-00';
    public $to_date = '01-01-3000';
    public function dateFilter($model)
    {
        return $model->where('order_date', '>=', Carbon::parse($this->from_date)->format('Y-m-d'))->where('order_date', '<=', Carbon::parse($this->to_date)->format('Y-m-d'));
    }
    public function render()
    {
        return view('livewire.backend.order.delivered-order-list', [
            'deliveredOrders' => Order::whereStatus('delivered')->orderBy('id', 'DESC')->get(),
        ]);
    }
}
