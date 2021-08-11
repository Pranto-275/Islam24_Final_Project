<?php

namespace App\Models\Backend\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\Setting\PaymentMethod;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
}
