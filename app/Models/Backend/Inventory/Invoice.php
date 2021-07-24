<?php

namespace App\Models\Backend\Inventory;
use App\Models\Backend\ContactInfo\Contact;
use App\Models\Backend\Inventory\StockManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function StockManager(){
        return $this->hasMany(StockManager::class);
    }

    public function ContactName(){
        return $this->hasOne(Contact::class);
    }


}
