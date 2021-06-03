<?php

namespace App;

use App\Meal;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['user_id','eatable_id','eatable_type','day','period'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
