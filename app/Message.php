<?php

namespace App;

use App\User;
use App\Media;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function media(){
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'name' => 'no-image.jpg',
        ]);
    }
    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }
}
