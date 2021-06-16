<?php

namespace App\Http\Livewire\Backend\Setting;
use App\Models\Backend\Setting\DeliveryMethod as DeliveryMethodInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeliveryMethod extends Component
{
    public $code;
    public $name;
    public $address;
    public $branch_name;
    public $DeliveryId=NULL;

    public function deliveryMethodEdit($id)
    {
        $Query = DeliveryMethodInfo::find($id);
        $this->DeliveryId = $Query->id;
        $this->code = $Query->code;
        $this->name = $Query->name;
        $this->branch_name = $Query->branch_name;
        $this->address = $Query->address;
		$this->emit('modal', 'deliveryMethodInfoModal');
    }
    public function deliveryMethodDelete($id)
    {
        DeliveryMethodInfo::find($id)->delete();

        $this->emit('success', [
            'text' => 'Delivery Method Deleted Successfully',
        ]);
    }
    public function deliveryMethodSave()
    {
        $this->validate([
            'code' => 'required',
            'name' => 'required',
            'branch_name' => 'required',
        ]);
        if ($this->DeliveryId) {
            $Query = DeliveryMethodInfo::find($this->DeliveryId);
        } else {
            $Query = new DeliveryMethodInfo();
        }
        $Query->code = $this->code;
        $Query->name = $this->name;
        $Query->branch_name = $this->branch_name;
        $Query->address = $this->address;
        $Query->save();

        $this->deliveryMethodModal();

        $this->emit('success', [
            'text' => 'Delivery Method C/U Successfully',
        ]);
    }
    public function deliveryMethodModal(){
        $this->code = 'D'.floor(time() - 999999999);
        $this->emit('modal','deliveryMethodInfoModal');
    }
    public function render()
    {
        return view('livewire.backend.setting.delivery-method');
    }
}
