<?php

namespace App\Http\Livewire\Backend\Admin;
use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function InactiveStatus($id){
        $User=User::find($id);
        $User->is_active=0;
        $User->save();
        $this->emit('success', [
            'text' => 'User Inactive Successfully',
         ]);
    }
    public function ActiveStatus($id){
        $User=User::find($id);
        $User->is_active=1;
        $User->save();
        $this->emit('success', [
            'text' => 'User Active Successfully',
         ]);
    }
    public function render()
    {
        return view('livewire.backend.admin.user-list');
    }
}
