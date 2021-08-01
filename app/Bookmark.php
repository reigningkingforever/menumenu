<?php

namespace App;

use App\User;
use App\MealCalendar;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['user_id','calendar_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function calendar(){
        return $this->belongsTo(MealCalendar::class);
    }
}
