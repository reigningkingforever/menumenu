<?php

namespace App;
use App\Meal;
use App\Bookmark;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MealCalendar extends Model
{
    protected $fillable = ['start_at','end_at','meal_id','period','day'];
    protected $dates = ['start_at','end_at'];

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class,'calendar_id');
    }
    public function orderItems(){
        return $this->hasMany(OrderDetail::class,'calendar_id');
    }
    
    public function getWeek(){
        if($this->start_at < Carbon::now()->endOfWeek())
        return 'this week';
        else return 'next week';
    }
    public function scopeAvailable($query){
        return $query->whereBetween('end_at', [now(), today()->addDays(6)->addHours(21)]);
    }
}
