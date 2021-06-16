<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\Branch as BranchInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Branch extends Component
{
    public $code;
    public $name;
    public $mobile;
    public $address;
    public $BranchId=NULL;
    public $QueryUpdate=NULL;
    public function branchEdit($id)
    {
        $Query = BranchInfo::find($id);
        $this->BranchId = $Query->id;
        $this->code = $Query->code;
        $this->name = $Query->name;
        $this->mobile = $Query->mobile;
        $this->address = $Query->address;
		$this->emit('modal', 'branchInfoModal');
    }
    public function branchDelete($id)
    {
        BranchInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Branch Deleted Successfully',
        ]);
    }
    public function branchSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
        ]);
        if ($this->BranchId) {
            $Query = BranchInfo::find($this->BranchId);
        } else {
            $Query = new BranchInfo();
            $Query->user_id = Auth::id();
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->mobile = $this->mobile;
        $Query->address = $this->address;
        $Query->save();

        $this->branchInfoModal();

        $this->emit('success', [
            'text' => 'Branch C/U Successfully',
        ]);
    }

    public function branchInfoModal(){
        $this->code = 'B'.floor(time() - 999999999);
        $this->emit('modal','branchInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.branch');
    }
}
