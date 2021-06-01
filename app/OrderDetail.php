<?php

namespace App;

use App\Meal;
use App\Media;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    // public function media(){
    //     return $this->morphOne(Media::class, 'mediable');
    // }
}
