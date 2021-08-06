<?php

namespace App;

use App\User;
use App\Order;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['user_id','address','order_id','delivery_date','delivery_time'];
    protected $dates = ['delivery_date'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
