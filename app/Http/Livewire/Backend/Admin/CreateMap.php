<?php

namespace App\Http\Livewire\Backend\Admin;
use App\Models\CreateMap as CreateMapInfo;
use Livewire\Component;

class CreateMap extends Component
{
    public $name;
    public $location;
    public $MapId;
    
    public function DeleteMap($id){
        CreateMapInfo::find($id)->delete();
        $this->emit('success', [
            'text' => 'Map Deleted Successfully!',
         ]);
    }
    public function EditMap($id){
        $Query=CreateMapInfo::find($id);
        $this->name=$Query->name;
        $this->location=$Query->location;
        $this->MapId=$Query->id;
    }
    public function AddMap(){
        $this->validate([
            'name' => 'required',
            'location' => 'required',
         ]);
         if($this->MapId){
            $Query=CreateMapInfo::find($this->MapId);
         }else{
             $Query=new CreateMapInfo();
         }

         $Query->name=$this->name;
         $Query->location=$this->location;

         $Query->save();
         $this->reset();
         $this->emit('success', [
            'text' => 'Map C/U Successfully!',
         ]);
    }
    public function render()
    {
        return view('livewire.backend.admin.create-map',[
            'maps'=>CreateMapInfo::orderBy('id', 'desc')->get(),
        ]);
    }
}
