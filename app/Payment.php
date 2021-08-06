<?php

namespace App;

use App\User;
use App\Order;
use App\Coupon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id','order_id','coupon_id','amount','status'];
    
    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\PaymentObserver);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
}
