<?php

namespace App;
use App\Meal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MealCalendar extends Model
{
    protected $fillable = ['datetime','meal_id','period'];
    protected $dates = ['datetime'];

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    public function getWeek(){
        if($this->datetime < Carbon::now()->endOfWeek())
        return 'this week';
        else return 'next week';
    }
}
