<?php

namespace App\Http\Livewire\Component;

use App\Models\Backend\Inventory\SaleInvoice;
use Livewire\Component;

class SaleInvoiceSearchDropdown extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function searchSelect($selected)
    {
        $this->emit('sale_invoice_search', $selected);
        $this->reset('search');
    }

    public function render()
    {

        $SaleInvoice = SaleInvoice::where('code', 'like', '%'.$this->search.'%');
        $SaleInvoice = $SaleInvoice->get();
        // dd($SaleInvoice);
        return view('livewire.component.sale-invoice-search-dropdown',
        [
            'search_list' => $SaleInvoice,
        ]
    );
    }
}
