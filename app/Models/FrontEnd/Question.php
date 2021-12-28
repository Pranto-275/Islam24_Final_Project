<?php

namespace App\Models\FrontEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FrontEnd\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    use HasFactory;
    public function Answer(){
        return $this->hasOne(Answer::class)->whereUserId(Auth::user()->id);
    }
}
