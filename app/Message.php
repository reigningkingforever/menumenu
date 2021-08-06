<?php

namespace App;

use App\User;
use App\Media;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }
}
