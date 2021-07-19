<?php

namespace App\Http\Livewire\Backend\Report;

use Livewire\Component;
use App\Models\Backend\Inventory\Invoice;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\ContactInfo\Contact;

class SaleReport extends Component
{
    public function render()
    {
        return view('livewire.backend.report.sale-report', [
            'Customers' => Invoice::get(),
             'branches' => Invoice::get(),
              'sales' => Invoice::get(),

            
        ]);
    }
}
