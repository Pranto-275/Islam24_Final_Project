<?php

namespace App\Http\Livewire\Backend\ProductInfo;
use App\Models\Backend\ProductInfo\Color as ColorInfo;
use Livewire\Component;

class Size extends Component
{
    public $color_name;
    public $color_code;
    public $ColorId;
    public function deleteColor($id){
        ColorInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Color Deleted Successfully',
        ]);
    }
    public function editColor($id){
       $QueryUpdate=ColorInfo::find($id);
       $this->ColorId=$QueryUpdate->id;
       $this->color_name=$QueryUpdate->color_name;
       $this->color_code=$QueryUpdate->color_code;
    }
    public function colorSave(){
        $this->validate([
            'color_name' => 'required',
            'color_code' => 'required',
        ]);

        // Insert Or Update Color
        if($this->ColorId){
           $Query=ColorInfo::find($this->ColorId);
        }else{
            $Query=new ColorInfo();
        }

        $Query->color_name=$this->color_name;
        $Query->color_code=$this->color_code;
        $Query->save();
        $this->reset();

        $this->emit('success', [
            'text' => 'Color U/P Successfully',
        ]);
    }
    public function render()
    {
        return view('livewire.backend.product-info.size',[
            'colors'=>ColorInfo::get(),
        ]);
    }
}
