<?php

namespace App;

use App\MealCalendar;
use App\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function calendar(){
        return $this->belongsTo(Calendar::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    
    
}
