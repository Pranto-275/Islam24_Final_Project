<?php

namespace App\Http\Livewire\Backend\ContactInfo;
use App\Models\Backend\ContactInfo\ContactCategory as ContactCategoryInfo;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ContactCategory extends Component
{

    public $type;
    public $code;
    public $name;
    public $is_active;
    public $branch_id;
    public $contact_Category_id;


  public function ContactCategoryInfoSave(){
    $this->validate([
        'type'=> 'required',
        'code'=> 'required',
        'name'=> 'required',
    ]);
      if ($this->contact_Category_id){
          $Query  = ContactCategoryInfo::find($this->contact_Category_id);
      }else{
          $Query               = new ContactCategoryInfo();
          $Query->user_id      = Auth::user()->id;
      }

          $Query->type        = $this->type;
          $Query->code        = $this->code;
          $Query->name        = $this->name;
          $Query->is_active      = $this->is_active;
          $Query->branch_id   = 1;
          $Query->save();
          $this->reset();
          $this->ContactCategoryModal();

          $this->emit('success',[
              'text' => 'Contact Category C/U successfully',
             ]);
  }


  public function contactCategoryEdit($id){
     $this->QueryUpdate  = ContactCategoryInfo::find($id);
     $this->contact_Category_id = $this->QueryUpdate->id;
     $this->type                = $this->QueryUpdate->type;
     $this->code                = $this->QueryUpdate->code;
     $this->name                = $this->QueryUpdate->name;
     $this->is_active              = $this->QueryUpdate->is_active;
     $this->ContactCategoryModal();
  }

  public function contactCategoryDelete($id){
      ContactCategoryInfo::find($id)->delete();
      $this->emit('success',[
         'text' => 'Contact Category Deleted Successfully',
      ]);
  }

    public function ContactCategoryModal(){
        $this->code = 'C'.floor(time()- 999999);
        $this->emit('modal','ContactCategoryModal');
    }
    public function render()
    {
        return view('livewire.backend.contact-info.contact-category');
    }
}
