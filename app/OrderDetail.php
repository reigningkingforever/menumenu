<?php

namespace App;

use App\Order;
use App\Vendor;
use App\MealCalendar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    protected $dates = ['required_at'];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function calendar(){
        return $this->belongsTo(MealCalendar::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    
    
}
