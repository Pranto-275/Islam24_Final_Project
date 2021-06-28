<?php

namespace App\Http\Livewire\Backend\ContactInfo;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\ContactInfo\ContactCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Customer extends Component
{
   public $type;
   public $name;
   public $address;
   public $shipping_address;
   public $phone;
   public $mobile;
   public $email;
   public $due_date;
   public $birthday;
   public $opening_balance;
   public $contact_category_id;
   public $CustomerCategoryId;
   public $status;




    public function ContactInfoSave(){
        $this->validate([
            'contact_category_id'                   => 'required',
            'name'                   => 'required',
        ]);
// dd($this->contact_category_id);
        if ($this->CustomerCategoryId){
           $Query = Contact::find($this->CustomerCategoryId);
        }else{
            $Query           = new Contact();
            $Query->user_id  = Auth::id();
        }
        $Query->type                  = "Customer";
        $Query->name                  = $this->name;
        $Query->address               = $this->address;
        $Query->shipping_address      = $this->shipping_address;
        $Query->phone                 = $this->phone;
        $Query->mobile                = $this->mobile;
        $Query->email                 = $this->email;
        $Query->due_date              = $this->due_date;
        $Query->birthday              = $this->birthday;
        $Query->opening_balance       = $this->opening_balance;
        $Query->contact_category_id       = $this->contact_category_id;
        $Query->status                = $this->status;
        $Query->branch_id             = 1;
        $Query->save();
        $this->reset();
        $this->ContactModal();
        $this->emit('success',[
            'text' => 'Customer C/U Successfully',
        ]);
    }

    public function contactDelete($id){
        Contact::find($id)->delete();

        $this->emit('success',[
           'text' => 'Customer deleted successfully',
        ]);
    }

    public function contactEdit($id){
       $this->QueryUpdate         = Contact::find($id);
       $this->CustomerCategoryId  = $this->QueryUpdate->id;
       $this->type                = $this->QueryUpdate->type;
       $this->name                = $this->QueryUpdate->name;
       $this->address             = $this->QueryUpdate->address;
       $this->shipping_address    = $this->QueryUpdate->shipping_address;
       $this->phone               = $this->QueryUpdate->phone;
       $this->mobile              = $this->QueryUpdate->mobile;
       $this->email               = $this->QueryUpdate->email;
       $this->due_date            = $this->QueryUpdate->due_date;
       $this->birthday            = $this->QueryUpdate->birthday;
       $this->opening_balance     = $this->QueryUpdate->opening_balance;
       $this->contact_category_id     = $this->QueryUpdate->contact_category_id;
       $this->status              = $this->QueryUpdate->status;
       $this->ContactModal();
    }


    public function ContactModal(){
        $this->code  = 'C'.floor(time()-999999);
        $this->emit('modal','ContactModal');
    }


    public function render()
    {
        return view('livewire.backend.contact-info.customer',[
            'customerCategories'=>ContactCategory::whereType('Customer')->get(),
        ]);
    }
}
