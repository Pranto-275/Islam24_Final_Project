<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Brand as BrandInfo;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Brand extends Component
{
    use WithFileUploads;


    public $code;
    public $name;
    public $image;
    public $description;
    public $user_id;
    public $branch_id;
    public $status;
    public $brand_id;



    public function brandInfoSave(){


        $this->validate([
           'name'   => 'required',
           'image'  => 'required',
            'description' => 'required'
        ]);

        if ($this->brand_id){
          $Query  = BrandInfo::find($this->brand_id);
        }else{
            $Query           = new BrandInfo();
            $Query->user_id        =  Auth::user()->id;
        }
       $Query->code           =  $this->code;
       $Query->name           =  $this->name;
        if($this->image){
            $path = $this->image->store('/public/photo');
            $Query->image = basename($path);
        }
       $Query->image          =  $this->image;
       $Query->description    =  $this->description;
       $Query->branch_id      = 1;
       $Query->status         = $this->status;
       $Query->save();
       $this->reset();
       $this->emit('success', [
          'text' => 'brand info saved successfully',
       ]);

    }

    public function brandEdit($id){
        $this->QueryUpdate  = BrandInfo::find($id);
        $this->brand_id     =  $this->QueryUpdate->id;
        $this->code         =  $this->QueryUpdate->code;
        $this->name         =  $this->QueryUpdate->name;
        $this->image        =  $this->QueryUpdate->image;
        $this->description  =  $this->QueryUpdate->description;
        $this->status       =  $this->QueryUpdate->status;
        $this->BrandAInfoModal();
    }

    public function brandDelete($id){
        BrandInfo::find($id)->delete();
        $this->emit('success',[
           'text' => 'Brand Info deleted successfully',
        ]);
    }

    public function BrandAInfoModal(){
        $this->code = 'C'.floor(time()-999999);
        $this->emit('modal','BrandAInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.product-info.brand');
    }
}
