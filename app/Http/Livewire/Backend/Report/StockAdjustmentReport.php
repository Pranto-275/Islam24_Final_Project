<?php

namespace App\Http\Livewire\Backend\Report;


use App\Models\Backend\Inventory\StockAdjustment;
use Carbon\Carbon;
use Livewire\Component;

class StockAdjustmentReport extends Component
{
    public $to_date = Null;
    public $from_date = Null;
    public $second=NULL;
   
    public $Query;
    public $StockAdjustmentReportId=NULL;
    public function dateFilter($model){
        return $model->where('date', '>=', Carbon::parse($this->from_date)->format('Y-m-d'))->where('date', '<=', Carbon::parse($this->to_date)->format('Y-m-d'));
    }
    public function saveStockAdjustmentReport()
    {
        // dd('$true');

        $this->validate([

            'to_date' => 'required',
            'from_date' => 'required',
            
        ]);

     
            // Product
            if($this->StockAdjustmentReportId){
               $Query=StockAdjustment::find($this->StockAdjustmentReportId);
            }else{
               $Query=new StockAdjustment();
            }
  
            $Query->to_date=$this->to_date;
            $Query->from_date=$this->from_date;
           
            $Query->save();
           //    Stock
        $this->reset();
        $this->emit('success', [
            'text' => 'Stock Adjustment C/U Successfully',
        ]);
    }

    public function render()
    {
        

        return view('livewire.backend.report.stock-adjustment-report',[
            'stocks' => StockAdjustment::get(),
        ]);
    }
}
