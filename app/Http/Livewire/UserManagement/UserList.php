<?php

namespace App\Http\Livewire\UserManagement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserList extends Component
{
    public $name;
    public $email;
    public $password;
    public $type;
    public $user_id=null;

    public function UserSave()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);
        if ($this->user_id) {
            $Query = User::find($this->user_id);
        } else {
            $Query = new User();
            $Query->current_team_id = Auth::id();
        }
        $Query->name = $this->name;
        $Query->email = $this->email;
        $Query->password = Hash::make('$this->password');
        $Query->type = $this->type;
        $Query->save();

        $this->UserModal();

        $this->emit('success', [
            'text' => 'User C/U Successfully',
        ]);
    }
    public function UserEdit($id)
    {
        $Query = User::find($id);
        $this->user_id = $Query->id;
        $this->name = $Query->name;
        $this->email = $Query->email;
        if (!empty($this->password)) {
            $this->password = Hash::make($Query->password);
        }
        $this->type= $Query->type;
        // $this->password = $Query->password;
        // $this->password = Hash::make('$Query->password');
		$this->emit('modal', 'UserModal');
    }
    public function UserDelete($id)
    {
        User::find($id)->delete();

        $this->emit('success', [
            'text' => 'User Delete Successfully',
        ]);
    }
    public function UserModal()
    {
        $this->reset();
        $this->emit('modal', 'UserModal');
    }
    public function UserPermission()
    {
        $this->reset();
        $this->emit('modal', 'UserPermission');
    }
    public function render()
    {
        return view('livewire.user-management.user-list');
    }
}
