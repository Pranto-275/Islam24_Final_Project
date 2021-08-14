<?php

namespace App\Http\Livewire\Backend\Transaction;
use App\Models\Backend\Inventory\PurchaseInvoice;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\PaymentMethod;
use App\Models\Backend\Transaction\Payment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SupplierPayment extends Component
{
    public $contact_id;
    public $date;
    public $purchase_code;
    public $code;
    public $transaction_id;
    public $payment_method_id;
    public $receipt_no;
    public $amount;
    public $PaymentId;

    public function editPayment($id){
        $this->PaymentId=$id;
        $QueryUpdate=Payment::find($this->PaymentId);
        $Invoice=PurchaseInvoice::whereId($QueryUpdate->invoice_id)->first();
        $this->contact_id=$QueryUpdate->contact_id;
        $this->date=$QueryUpdate->date;
        $this->sale_code=$Invoice->code;
        $this->code=$QueryUpdate->code;
        $this->transaction_id=$QueryUpdate->transaction_id;
        $this->payment_method_id=$QueryUpdate->payment_method_id;
        $this->receipt_no=$QueryUpdate->receipt_no;
        $this->amount=$QueryUpdate->amount;
    }
    public function deletePayment($id){
       Payment::whereId($id)->delete();
       $this->emit('success', [
        'text' => 'Payment Deleted Successfully',
    ]);
    }
    public function paymentSave(){
        $this->validate([
            'code' => 'required',
            'purchase_code' => 'required',
            'date' => 'required',
            'contact_id' => 'required',
            'transaction_id' => 'required',
            'payment_method_id' => 'required',
            'receipt_no' => 'required',
            'amount' => 'required',
        ]);

        // dd($this->sale_code);
        $purchase_invoice_id=PurchaseInvoice::whereCode($this->purchase_code)->first();
        // dd($sale_invoice_id);
        if($this->PaymentId){
            $Query=Payment::find($this->PaymentId);
        }else{
           $Query=new Payment();
           $Query->created_by=Auth::user()->id;
        }
        $Query->code=$this->code;
        $Query->date=$this->date;
        $Query->type="SupplierPayment";
        $Query->contact_id=$this->contact_id;
        $Query->invoice_id=$purchase_invoice_id->id;
        $Query->amount=$this->amount;
        $Query->payment_method_id=$this->payment_method_id;
        $Query->transaction_id=$this->transaction_id;
        $Query->receipt_no=$this->receipt_no;
        $Query->branch_id=Auth::user()->branch_id;
        $Query->save();

        $this->emit('success', [
            'text' => 'Purchase Payment C/U Successfully',
        ]);
    }
    public function mount($purchase_code=NULL){
        $this->code = 'SP'.floor(time() - 999999999);
        $this->transaction_id = 'TI'.floor(time() - 999999999);

      if($purchase_code){
         $this->purchase_code=$purchase_code;
      }
    //   dd($this->sale_code);
    }
    public function render()
    {
        return view('livewire.backend.transaction.supplier-payment',[
            'purchase_codes'=>PurchaseInvoice::get(),
            'contacts'=>Contact::whereType('Supplier')->get(),
            'payment_methods'=>PaymentMethod::get(),
            'payments'=>Payment::whereType('SupplierPayment')->get(),
        ]);
    }
}
