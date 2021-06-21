<?php

namespace App\Http\Livewire\Backend\Inventory;
use App\Models\Backend\Inventory\StockAdjustment as StockAdjustmentInfo;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\Setting\Warehouse;
use Livewire\Component;

class StockAdjustment extends Component
{
    public $date;
    public $type;
    public $contact_id;
    public $from_branch_id;
    public $to_branch_id;
    public $from_warehouse_id;
    public $to_warehouse_id;
    public $note;
    public $StockAdjustmentId=NULL;
    public function editStockAdjustment($id){
        $QueryUpdate=StockAdjustmentInfo::find($id);
        $this->StockAdjustmentId=$QueryUpdate->id;
        $this->date=$QueryUpdate->date;
        $this->type=$QueryUpdate->type;
        $this->contact_id=$QueryUpdate->contact_id;
        $this->from_branch_id=$QueryUpdate->from_branch_id;
        $this->to_branch_id=$QueryUpdate->to_branch_id;
        $this->from_warehouse_id=$QueryUpdate->from_warehouse_id;
        $this->to_warehouse_id=$QueryUpdate->to_warehouse_id;
        $this->note=$QueryUpdate->note;
    }
    public function saveStockAdjustment(){
        $this->validate([
            'type' => 'required',
            'contact_id' => 'required',
            'from_branch_id' => 'required',
            'to_branch_id' => 'required',
            'from_warehouse_id' => 'required',
            'to_warehouse_id' => 'required',
        ]);

        if($this->StockAdjustmentId){
           $Query=StockAdjustmentInfo::find($this->StockAdjustmentId);
        }else{
           $Query=new StockAdjustmentInfo();
        }

        $Query->date=$this->date;
        $Query->type=$this->type;
        $Query->contact_id=$this->contact_id;
        $Query->from_branch_id=$this->from_branch_id;
        $Query->to_branch_id=$this->to_branch_id;
        $Query->from_warehouse_id=$this->from_warehouse_id;
        $Query->to_warehouse_id=$this->to_warehouse_id;
        $Query->note=$this->note;
        $Query->save();

        $this->reset();
        $this->emit('success', [
            'text' => 'Stock Adjustment C/U Successfully',
        ]);
    }
    public function StockAdjustmentModal(){
        $this->emit('modal','StockAdjustmentModal');
    }
    public function render()
    {
        return view('livewire.backend.inventory.stock-adjustment',[
            'contacts'=>Contact::get(),
            'branches'=>Branch::get(),
            'warehouses'=>Warehouse::get(),
            'stockAdjustments'=>StockAdjustmentInfo::get(),
        ]);
    }
}
