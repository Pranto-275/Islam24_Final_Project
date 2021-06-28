<?php

namespace App\Http\Livewire\Backend\Report;

use Livewire\Component;
use App\Models\Backend\Inventory\Invoice;

class SaleDetailsReport extends Component
{
    public function render()
    {
        return view('livewire.backend.report.sale-details-report', [
            'Customers' => Invoice::get(),
            'branches' => Invoice::get(),
             'salesDetails' => Invoice::get(),

        ]);
    }
}
