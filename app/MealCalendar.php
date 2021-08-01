<?php

namespace App;
use App\Meal;
use App\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MealCalendar extends Model
{
    protected $fillable = ['datentime','meal_id','period','day'];
    protected $dates = ['datentime'];

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function getWeek(){
        if($this->datentime < Carbon::now()->endOfWeek())
        return 'this week';
        else return 'next week';
    }
    public function scopeAvailable($query){
        return $query->whereBetween('datentime', [now(), today()->addDays(7)->addHours(21)]);
    }
}
