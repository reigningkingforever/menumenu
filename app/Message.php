<?php

namespace App;

use App\User;
use App\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\MessageObserver);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }
}
