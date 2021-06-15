<?php

namespace App\Http\Livewire\Backend\ContactInfo;
use App\Models\Backend\ContactInfo\Contact as Customer_Contact;
use App\Models\Backend\ContactInfo\ContactCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contact extends Component
{
   public $type;
   public $name;
   public $address;
   public $shipping_address;
   public $phone;
   public $mobile;
   public $email;
   public $due_date;
   public $birth_date;
   public $opening_balance;
   public $contact_category_id;
   public $status;



    public function ContactModal(){
//        dd('');
        $this->emit('modal','ContactModal');
    }
    public function ContactInfoSave(){
        $customer_contact = new Customer_Contact();
        $customer_contact->type                  = $this->type;
        $customer_contact->name                  = $this->name;
        $customer_contact->address               = $this->address;
        $customer_contact->shipping_address      = $this->shipping_address;
        $customer_contact->phone                 = $this->phone;
        $customer_contact->mobile                = $this->mobile;
        $customer_contact->email                 = $this->email;
        $customer_contact->due_date              = $this->due_date;
        $customer_contact->birthday              = $this->birth_date;
        $customer_contact->opening_balance       = $this->opening_balance;
        $customer_contact->status                = $this->status;
        $customer_contact->user_id               = Auth::id();
        $customer_contact->branch_id             = 1;
        $customer_contact->ContactCategory       = $this->contact_category_id;
        $customer_contact->save();
        $this->reset();
        $this->emit('success',[
            'text' => 'Category Created Successfully',
        ]);
    }


    public function render()
    {
        return view('livewire.backend.contact-info.contact',[
            'ContactCategory'=>ContactCategory::get()
        ]);
    }
}
