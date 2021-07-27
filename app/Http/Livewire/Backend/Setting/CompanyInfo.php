<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\CompanyInfo as CompanyInfoDetails;
use App\Models\Backend\Setting\Branch;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Null_;

class CompanyInfo extends Component
{

    public $name;
    public $phone;
    public $mobile;
    public $address;
    public $email;
    public $web;
    public $is_active;
    public $branch_id;
    public $companyInfo_id;
    public $CompanyInfoDetails=null;



public function mount(){
    $this->CompanyInfoDetails  = CompanyInfoDetails::first();
    if ($this->CompanyInfoDetails){
        $this->name         = $this->CompanyInfoDetails->name;
        $this->phone        = $this->CompanyInfoDetails->phone;
        $this->mobile       = $this->CompanyInfoDetails->mobile;
        $this->address      = $this->CompanyInfoDetails->address;
        $this->email        = $this->CompanyInfoDetails->email;
        $this->web          = $this->CompanyInfoDetails->web;
    }
}

public function companyInfoSave(){

    $this->validate([
       'name'   => 'required',
       'phone'  => 'required',
        'mobile' => 'required',
        'address' => 'required',
        'email'   => 'required',

    ]);
    if ($this->CompanyInfoDetails){
       $Query = $this->CompanyInfoDetails;
    }else{
        $Query               = new CompanyInfoDetails();
        $Query->created_by      = Auth::user()->id;
    }

          $Query->name         = $this->name;
          $Query->phone        = $this->phone;
          $Query->mobile       = $this->mobile;
          $Query->address      = $this->address;
          $Query->web          = $this->email;
          $Query->branch_id    = 1;
          $Query->save();
          $this->emit('success',[
             'text' => 'CompanyInfo save successfully',
          ]);
}

    public function render()
    {
        return view('livewire.backend.setting.company-info',[
            'branches' => Branch::get(),
        ]);
    }
}
