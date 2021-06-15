<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
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
