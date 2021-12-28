<?php

namespace App\Models\FrontEnd\Imam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\FrontEnd\Imam\Like;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Like(){
        return $this->hasMany(Like::class);
    }
}
