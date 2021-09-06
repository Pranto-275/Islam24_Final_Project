<?php

namespace App\Models\Backend\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\Setting\Branch;
use Illuminate\Database\Eloquent\Model;

class DeliveryMethod extends Model
{
    use HasFactory;
    public function Branch(){
        return $this->belongsTo(Branch::class);
    }
}
