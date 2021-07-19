<?php

namespace App\Http\Livewire\Backend\Report;

use Livewire\Component;
use App\Models\Backend\Inventory\Invoice;

class PurchaseReport extends Component
{
    public function render()
    {
        return view('livewire.backend.report.purchase-report', [
            'suppliers' => Invoice::get(),
            
        ]);
    }
}
