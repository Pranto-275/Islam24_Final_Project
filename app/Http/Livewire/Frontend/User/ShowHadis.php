<?php

namespace App\Http\Livewire\Frontend\User;
use App\Models\Hadis;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowHadis extends Component
{
    public function DownloadHadis($id=NULL){
      $hadis=Hadis::find($id);
      return Storage::download('public/hadis/'.$hadis->hadis);

    }
    public function render()
    {

        return view('livewire.frontend.user.show-hadis',['hadises'=>Hadis::orderBy('id', 'DESC')->get(),

        ])->layout('layouts.front_end_user');
    }
}
