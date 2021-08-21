<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\CompanyInfo as CompanyInfoDetails;
use App\Models\Backend\Setting\Branch;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class CompanyInfo extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $mobile;
    public $address;
    public $hotline;
    public $logo;
    public $privacy_policy;
    public $terms_condition;
    public $return_policy;
    public $email;
    public $web;
    public $facebook_link;
    public $youtube_link;
    public $is_active;
    public $CompanyInfo;



public function mount(){
    $this->CompanyInfo  = CompanyInfoDetails::whereCreatedBy(Auth::user()->id)->first();
    if ($this->CompanyInfo){
        $this->name= $this->CompanyInfo->name;
        $this->phone= $this->CompanyInfo->phone;
        $this->mobile= $this->CompanyInfo->mobile;
        $this->address=$this->CompanyInfo->address;
        $this->hotline=$this->CompanyInfo->hotline;
        $this->email=$this->CompanyInfo->email;
        $this->privacy_policy=$this->CompanyInfo->privacy_policy;
        $this->terms_condition=$this->CompanyInfo->terms_condition;
        $this->return_policy=$this->CompanyInfo->return_policy;
        $this->web= $this->CompanyInfo->web;
        $this->facebook_link= $this->CompanyInfo->facebook_link;
        $this->youtube_link= $this->CompanyInfo->youtube_link;
    }
}

public function companyInfoSave(){

    $this->validate([
       'name'   => 'required',
       'phone'  => 'required',
       'address' => 'required',
    ]);
    $Query  = CompanyInfoDetails::whereCreatedBy(Auth::user()->id)->first();
    if (!$Query){
        $Query= new CompanyInfoDetails();
        $Query->created_by= Auth::user()->id;
    }

          $Query->name = $this->name;
          $Query->phone = $this->phone;
          $Query->mobile = $this->mobile;
          $Query->address = $this->address;
          $Query->hotline = $this->hotline;
          $Query->email = $this->email;
          $Query->privacy_policy = $this->privacy_policy;
          $Query->terms_condition = $this->terms_condition;
          $Query->return_policy  = $this->return_policy;
          $Query->web = $this->web;
          $Query->facebook_link = $this->facebook_link;
          $Query->youtube_link = $this->youtube_link;
          if($this->logo){
            $path = $this->logo->store('/public/photo');
            $Query->logo = basename($path);
          }
          $Query->branch_id = Auth::user()->branch_id;
          $Query->save();
          $this->emit('success',[
             'text' => 'CompanyInfo Saved Successfully',
          ]);
}

    public function render()
    {
        return view('livewire.backend.setting.company-info',[
            'branches' => Branch::get(),
        ]);
    }
}
