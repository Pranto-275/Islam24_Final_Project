<?php

namespace App\Http\Livewire\Backend\Report;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Inventory\PurchaseInvoiceDetail;
use Livewire\Component;

class PurchaseDetailsReport extends Component
{
    public $from_date;
    public $to_date;
    public $contact_id;

    public function render()
    {
        $PurchaseInvoiceDetail=PurchaseInvoiceDetail::orderBy('id', 'desc');
        if($this->contact_id){
            $PurchaseInvoiceDetail=$PurchaseInvoiceDetail->SaleInvoice->whereContactId($this->contact_id);
        }
        return view('livewire.backend.report.purchase-details-report', [
            'suppliers' => Contact::whereType('Supplier')->get(),
             'purchaseDetails' => $PurchaseInvoiceDetail->get(),
        ]);
    }
}
