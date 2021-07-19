<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Setting\CouponCode as CouponCodeInfo;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CouponCode extends Component
{
    public $code;
    public $expired_date;
    public $offer_type;
    public $amount;
    public $min_buy_amount;
    public $is_active;
    public $couponCode_id;
    public $user_id;
    public $branch_id;




public function couponCodeSave(){
    $this->validate([
       'code'                 => 'required',
       'expired_date'         => 'required',
        'offer_type'          => 'required',
        'amount'              => 'required',
        'min_buy_amount'      => 'required'
    ]);


    if ($this->couponCode_id){
        $Query = CouponCodeInfo::find($this->couponCode_id);
    }else{
        $Query  = new CouponCodeInfo();
        $Query->user_id = Auth::user()->id;
    }

    $Query->code               = $this->code;
    $Query->expired_date       = $this->expired_date;
    $Query->offer_type         = $this->offer_type;
    $Query->amount             = $this->amount;
    $Query->min_buy_amount     = $this->min_buy_amount;
    $Query->is_active             = $this->is_active;
    $Query->branch_id          = 1;
    $Query->save();
    $this->reset();
    $this->emit('success',[
       'text' => 'Coupon code saved successfully',
    ]);

}

public function couponEdit($id){
   $this->QueryUpdate        = CouponCodeInfo::find($id);
   $this->couponCode_id      = $this->QueryUpdate->id;
   $this->code               = $this->QueryUpdate->code;
   $this->expired_date       = $this->QueryUpdate->expired_date;
   $this->offer_type         = $this->QueryUpdate->offer_type;
   $this->amount             = $this->QueryUpdate->amount;
   $this->min_buy_amount     = $this->QueryUpdate->min_buy_amount;
   $this->is_active             = $this->QueryUpdate->is_active;
   $this->couponCodeModal();
}

public function couponDelete($id){
    CouponCodeInfo::find($id)->delete();
    $this->emit('success',[
       'text' => 'CouponInfo deleted successfully',
    ]);
}


    public function couponCodeModal(){
        $this->code = 'C'. floor(time()-99999);
        $this->emit('modal','couponCodeModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.coupon-code');
    }
}
