<?php

namespace App;

use App\Meal;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
