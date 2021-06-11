<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function itemable(){
        return $this->morphTo();
    }
    // public function media(){
    //     return $this->morphOne(Media::class, 'mediable');
    // }
}
