<?php

namespace App;

use App\User;
use App\Media;
use App\Payment;
use App\Delivery;
use App\OrderDetail;
use App\MealCalendar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id','subtotal','discount','coupon_code','vat','delivery_fee','delivery_address','amount'];
    protected $dates = ['required_at','delivered_at'];
    
    public function items(){
        return $this->hasMany(OrderDetail::class);
    }

    public function calendar(){
        return $this->hasMany(MealCalendar::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'name' => 'no-image.jpg',
        ]);
    }
}
