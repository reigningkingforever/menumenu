<?php

namespace App;

use App\Meal;
use App\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
    
}
