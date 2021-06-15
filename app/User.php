<?php

namespace App;

use App\Cart;
use App\Media;
use App\Order;
use App\Address;
use App\Payment;
use App\Bookmark;
use App\OrderDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
        'wedding_anniversary' => 'date',
    ];

    public function media(){
        return $this->morphOne(Media::class, 'mediable');
    }
    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function orderDetails(){
        return $this->hasManyThrough(OrderDetail::class,Order::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}

