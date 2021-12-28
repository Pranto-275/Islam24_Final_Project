<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\CreateMap;
use Livewire\Component;

class Map extends Component
{
    public $MapId;
    public $SearchMap;
    public function render()
    {
        if($this->MapId){
            $this->SearchMap=CreateMap::find($this->MapId);
        }
        return view('livewire.frontend.user.map',[
            'maps'=>CreateMap::orderBy('id', 'DESC')->get(),
        ])->layout('layouts.front_end_user');
    }
}
