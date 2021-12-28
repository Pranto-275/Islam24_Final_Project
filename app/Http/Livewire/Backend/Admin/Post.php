<?php

namespace App\Http\Livewire\Backend\Admin;
use App\Models\Frontend\Imam\Post as PostInfo;
use Livewire\Component;

class Post extends Component
{
    public function ActiveStatus($id){
       $Query=PostInfo::find($id);
       $Query->status="Approved";
       $Query->save();
    }
    public function CancelStatus($id){
        $Query=PostInfo::find($id);
        $Query->status="Approved";
        $Query->save();
     }
    public function render()
    {
        return view('livewire.backend.admin.post',[
            'posts'=>PostInfo::whereStatus('Pending')->get(),
        ]);
    }
}
