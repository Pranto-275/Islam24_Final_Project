<?php

namespace App\Models\Backend\ContactInfo;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FrontEnd\Order;
use App\Models\Backend\Transaction\Payment;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public function Order(){
        return $this->hasMany(Order::class)->orderBy('id', 'DESC');
    }
    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function Payment(){
        return $this->hasMany(Payment::class);
    }
    public function District(){
        return $this->belongsTo(District::class);
    }
}
