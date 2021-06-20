<?php

namespace App\Http\Livewire\Backend\ContactInfo;
use App\Models\Backend\ContactInfo\ContactCategory as ContactCategoryA;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ContactCategory extends Component
{

    public $type;
    public $code;
    public $name;
    public $status;
    public $branch_id;


  public function ContactCategoryInfoSave(){
  $contactCategory     =   new ContactCategoryA();
  $contactCategory->type        = $this->type;
  $contactCategory->code        = $this->code;
  $contactCategory->name        = $this->name;
  $contactCategory->status      = $this->status;
  $contactCategory->user_id     = Auth::id();
  $contactCategory->branch_id   = 1;
  $contactCategory->save();
  $this->reset();
  $this->emit('success',[
      'text' => 'Contact Category created successfully',
     ]);
  }

    public function ContactCategoryModal(){
        $this->code = 'C'.floor(time()- 999999);
        $this->emit('modal','ContactCategoryModal');
    }
    public function render()
    {
        return view('livewire.backend.contact-info.contact-category',[
            'ConatactCategories'=> ContactCategoryA::get(),
        ]);
    }
}
