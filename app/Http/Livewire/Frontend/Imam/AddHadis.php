<?php

namespace App\Http\Livewire\Frontend\Imam;
use Livewire\WithFileUploads;
use App\Models\Hadis;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddHadis extends Component
{
    use WithFileUploads;
    public $name;
    public $hadis;
    public function DeleteHadis($id){
        Hadis::find($id)->delete();
        $this->reset();
        $this->emit('success', [
            'text' => 'Hadis Deleted Successfully',
         ]);
    }
    public function SaveHadis(){
        $this->validate([
            'name' => 'required',
            'hadis' => 'required',
         ]);
        
         $Query=new Hadis();
         $Query->user_id=Auth::user()->id;
         $Query->name=$this->name;
         $path=$this->hadis->store('/public/hadis');
         $Query->hadis=basename($path);
         $Query->save();
         $this->reset();
         
         $this->emit('success', [
            'text' => 'Hadis Saved Successfully',
         ]);
    }
    public function render()
    {
        return view('livewire.frontend.imam.add-hadis',[
            'hadises'=>Hadis::whereUserId(Auth::user()->id)->get(),
        ])->layout('layouts.front_end');
    }
}
