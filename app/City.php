<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['status'];

    public function state(){
        return $this->belongsTo(State::class);
    }
}
