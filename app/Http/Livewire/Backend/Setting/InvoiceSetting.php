<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\InvoiceSetting as InvoiceSettingInfo;
use App\Models\Backend\Setting\Currency;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class InvoiceSetting extends Component
{
    use WithFileUploads;

    public $type;
    public $logo;
    public $invoice_header;
    public $invoice_title;
    public $invoice_footer;
    public $vat_reg_no;
    public $vat_area_code;
    public $vat_text;
    public $website;
    public $currency_id;
    public $is_paid_due_hide;
    public $is_memo_no_hide;
    public $is_chalan_no_hide;
    public $user_id;
    public $invoiceSetting_id;
    public $branch_id;



    public function InvoiceSettingSave(){
        if ($this->invoiceSetting_id){
            $Query = InvoiceSettingInfo::find($this->invoiceSetting_id);
        }else{
            $Query  = new InvoiceSettingInfo();
            $Query->user_id    = Auth::user()->id;
        }
        $Query->type                = $this->type;
        if($this->logo){
          $path = $this->logo->store('/public/photo');
          $Query->logo = basename($path);
        }
        $Query->invoice_header      = $this->invoice_header;
        $Query->invoice_title       = $this->invoice_title;
        $Query->invoice_footer      = $this->invoice_footer;
        $Query->vat_reg_no          = $this->vat_reg_no;
        $Query->vat_area_code       = $this->vat_area_code;
        $Query->vat_text            = $this->vat_text;
        $Query->website             = $this->website;
        $Query->currency_id         = $this->currency_id;
        $Query->is_paid_due_hide    = $this->is_paid_due_hide;
        $Query->is_memo_no_hide     = $this->is_memo_no_hide;
        $Query->is_chalan_no_hide   = $this->is_chalan_no_hide;
        $Query->branch_id           = 1;
        $Query->save();
        $this->emit('success',[
           'text' => 'Invoice setting has been saved successfully',
        ]);
    }

    public function invoiceSettingEdit($id){
        $this->QueryUpdate          = InvoiceSettingInfo::find($id);
        $this->invoiceSetting_id    = $this->QueryUpdate->id;
        $this->type                 = $this->QueryUpdate->type;
        $this->invoice_header       = $this->QueryUpdate->invoice_header;
        $this->invoice_title        = $this->QueryUpdate->invoice_title;
        $this->invoice_footer       = $this->QueryUpdate->invoice_footer;
        $this->vat_reg_no           = $this->QueryUpdate->vat_reg_no;
        $this->vat_area_code        = $this->QueryUpdate->vat_area_code;
        $this->vat_text             = $this->QueryUpdate->vat_text;
        $this->website              = $this->QueryUpdate->website;
        $this->InvoiceSettingModal();
    }


    public function invoiceSettingDelete($id){
        InvoiceSettingInfo::find($id)->delete();
        $this->emit('success', [
           'text' => 'InvoiceSetting deleted successfully',
        ]);
    }
    public function InvoiceSettingModal(){
        $this->emit('modal','InvoiceSettingModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.invoice-setting',[
            'Currencies' => Currency::get(),
        ]);
    }
}
