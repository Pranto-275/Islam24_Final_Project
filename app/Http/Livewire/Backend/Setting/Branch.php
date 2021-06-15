<?php

namespace App\Http\Livewire\Backend\Setting;

use Livewire\Component;

class Branch extends Component
{
    public function BranchInfoModal(){
        $this->emit('modal','BranchInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.branch');
    }
}
