<?php

namespace App\Http\Livewire\Backend\Inventory;
use App\Models\Backend\Inventory\Invoice as InvoiceInfo;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\Branch;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Invoice extends Component
{

    public $code;
    public $type;
    public $date;
    public $contact_id;
    public $subtotal;
    public $vat_total;
    public $discount_value;
    public $discount;
    public $earn_point;
    public $earn_point_amount;
    public $expense_point;
    public $expense_point_amount;
    public $grand_total;
    public $invoice_id;
    public $user_id;
    public $branch_id;
    public $status;




    public function invoiceSave()
    {
        if ($this->invoice_id){
          $invoiceInfo = invoiceInfo::find($this->invoice_id);
        }else{
        $invoiceInfo = new InvoiceInfo();
        $invoiceInfo->user_id = Auth::user()->id;
    }

       $invoiceInfo->type                     = $this->type;
       $invoiceInfo->date                     = $this->date;
       $invoiceInfo->code                     = $this->code;
       $invoiceInfo->contact_id               = $this->contact_id;
       $invoiceInfo->subtotal                 = $this->subtotal;
       $invoiceInfo->vat_total                = $this->vat_total;
       $invoiceInfo->discount_value           = $this->discount_value;
       $invoiceInfo->discount                 = $this->discount;
       $invoiceInfo->earn_point               = $this->earn_point;
       $invoiceInfo->earn_point_amount        = $this->earn_point_amount;
       $invoiceInfo->expense_point            = $this->expense_point;
       $invoiceInfo->expense_point_amount     = $this->expense_point_amount;
       $invoiceInfo->grand_total              = $this->grand_total;
       $invoiceInfo->branch_id                = 1;
       $invoiceInfo->status                   = $this->status;
       $invoiceInfo->save();
       $this->reset();
       $this->emit('success',[
          'text' => 'InvoiceInfo Saved Successfully',
       ]);
    }


    public function invoiceEdit($id){
        $this->invoiceInfoUpdate     = InvoiceInfo::find($id);
        $this->invoice_id            = $this->invoiceInfoUpdate->id;
        $this->type                  = $this->invoiceInfoUpdate->type;
        $this->date                  = $this->invoiceInfoUpdate->date;
        $this->code                  = $this->invoiceInfoUpdate->code;
        $this->contact_id            = $this->invoiceInfoUpdate->contact_id;
        $this->subtotal              = $this->invoiceInfoUpdate->subtotal;
        $this->vat_total             = $this->invoiceInfoUpdate->vat_total;
        $this->discount_value        = $this->invoiceInfoUpdate->discount_value;
        $this->discount              = $this->invoiceInfoUpdate->discount;
        $this->earn_point            = $this->invoiceInfoUpdate->earn_point;
        $this->earn_point_amount     = $this->invoiceInfoUpdate->earn_point_amount;
        $this->expense_point         = $this->invoiceInfoUpdate->expense_point;
        $this->expense_point_amount  = $this->invoiceInfoUpdate->expense_point_amount;
        $this->grand_total           = $this->invoiceInfoUpdate->grand_total;
        $this->status                = $this->invoiceInfoUpdate->status;
        $this->InvoiceModal();
    }




    public function invoiceDelete($id){
        InvoiceInfo::find($id)->delete();
        $this->emit('success',[
           'text' => 'InvoiceInfo deleted Successfully',
        ]);
    }


    public function InvoiceModal(){
//        dd('');
        $this->code = 'IC'. floor(time()- 99999);
        $this->emit('modal','InvoiceModal');
    }
    public function render()
    {
        return view('livewire.backend.inventory.invoice',[
            'Branches' => Branch::get(),
            'Contacts'  => Contact::get(),
        ]);
    }
}
