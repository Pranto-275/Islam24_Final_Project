<?php

namespace App\Http\Livewire\Backend\Report;


use App\Models\Backend\Inventory\StockAdjustment;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Setting\Branch;
use App\Models\Backend\Setting\Warehouse;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StockAdjustmentReport extends Component
{
    public $date;
    public $type;
    public $contact_id;
    public $from_branch_id;
    public $to_branch_id;
    public $from_warehouse_id;
    public $to_warehouse_id;
    public $StockAdjustmentReportId=NULL;
    public $note;
    public function saveStockAdjustmentReport()
    {
        // dd('$true');

        $this->validate([
            'type' => 'required',
            // 'contact_id' => 'required',
            'from_branch_id' => 'required',
            'to_branch_id' => 'required',
            'from_warehouse_id' => 'required',
            'to_warehouse_id' => 'required',
        ]);

     
            // Product
            if($this->StockAdjustmentReportId){
               $Query=StockAdjustment::find($this->StockAdjustmentReportId);
            }else{
               $Query=new StockAdjustment();
            }
  
            $Query->date=$this->date;
            $Query->type=$this->type;
            $Query->contact_id= $this->contact_id;
            $Query->from_branch_id=$this->from_branch_id;
            $Query->to_branch_id=$this->to_branch_id;
            $Query->from_warehouse_id=$this->from_warehouse_id;
            $Query->to_warehouse_id=$this->to_warehouse_id;
            $Query->note=$this->note;
            $Query->save();
           //    Stock
           
   

        $this->reset();
        $this->emit('success', [
            'text' => 'Stock Adjustment C/U Successfully',
        ]);
    }

    public function deleteStock($id)
    {
        StockAdjustment::find($id)->delete();
        $this->emit('success',[
            'text' => 'stock delete successfully',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.report.stock-adjustment-report',[
            'stocks' => StockAdjustment::get(),
            'contacts' => Contact::get(),
            'branches' => Branch::get(),
            'warehouses' => Warehouse::get(),
        ]);
    }
}
