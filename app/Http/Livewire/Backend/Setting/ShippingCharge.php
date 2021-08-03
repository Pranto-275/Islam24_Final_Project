<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\ShippingCharge as ShippingChargeInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShippingCharge extends Component
{
    public $code;
    public $title;
    public $location;
    public $amount;
    public $is_active;
    public $ShippingChargeId;

    public function ShippingChargeEdit($id){
        $QueryUpdate = ShippingChargeInfo::find($id);
        $this->ShippingChargeId = $QueryUpdate->id;
        $this->code = $QueryUpdate->code;
        $this->title = $QueryUpdate->title;
        $this->location = $QueryUpdate->location;
        $this->amount = $QueryUpdate->amount;
        $this->is_active = $QueryUpdate->is_active;
		$this->ShippingChargeModal();
    }
    public function ShippingChargeDelete($id){
        ShippingChargeInfo::find($id)->delete();
        $this->emit('success',[
           'text' => 'Shipping Charge Deleted Successfully',
        ]);
    }
    public function ShippingChargeSave(){
        $this->validate([
            'code'            => 'required',
            'title'            => 'required',
            'location'    => 'required',
            'amount'      => 'required',
            'is_active'      => 'required',
        ]);

        if ($this->ShippingChargeId){
            $Query  = ShippingChargeInfo::find($this->ShippingChargeId);
        }else{
            $Query = new ShippingChargeInfo();
            $Query->created_by = Auth::user()->id;
        }

        $Query->code = $this->code;
        $Query->title = $this->title;
        $Query->location = $this->location;
        $Query->amount = $this->amount;
        $Query->branch_id = Auth::user()->branch_id;
        $Query->is_active = $this->is_active;
        $Query->save();

        $this->reset();
        $this->ShippingChargeModal();
        $this-> emit('success',[
           'text' => 'Shipping Charge Saved Successfully',
        ]);
    }
    public function ShippingChargeModal(){
        $this->code = 'SC'. floor(time()-999999);
        $this->emit('modal','ShippingChargeMOdal');
    }
    public function render()
    {
        return view('livewire.backend.setting.shipping-charge');
    }
}
