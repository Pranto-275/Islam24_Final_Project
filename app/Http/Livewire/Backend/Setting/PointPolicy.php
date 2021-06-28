<?php

namespace App\Http\Livewire\Backend\Setting;

use App\Models\Backend\Setting\PointPolicy as PointPolicyM;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PointPolicy extends Component
{
    public $name;
    public $amount;
    public $point_value;
    public $point_amount;
    public $PointPolicy = null;

    public function mount()
    {
        $this->PointPolicy = PointPolicyM::first();
        if ($this->PointPolicy) {
            $this->name = $this->PointPolicy->name;
            $this->amount = $this->PointPolicy->amount;
            $this->point_value = $this->PointPolicy->point_value;
            $this->point_amount = $this->PointPolicy->point_amount;
        }
    }

    public function ProfileSave()
    {
        // dd(true);
        $this->validate([
            'name' => 'required',
            'amount' => 'required',
            'point_value' => 'required',
            'point_amount' => 'required',
        ]);
        $this->PointPolicy = PointPolicyM::first();
        if ($this->PointPolicy) {
            $Query = $this->PointPolicy;
        } else {
            $Query = new PointPolicyM();
        }
        $Query->name = $this->name;
        $Query->amount = $this->amount;
        $Query->point_value = $this->point_value;
        $Query->point_amount = $this->point_amount;
        $Query->save();
        $this->emit('success', ['text' => 'Point Policy C/U Successfully']);
    }

    public function render()
    {
        return view('livewire.backend.setting.point-policy');
    }
}


