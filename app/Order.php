<?php

namespace App;

use App\User;
use App\Media;
use App\Payment;
use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $dates = ['required_at','delivered_at'];
    
    public function details(){
        return $this->hasMany(OrderDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable');
    }
}
