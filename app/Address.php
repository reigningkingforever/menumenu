<?php

namespace App;
use App\City;
use App\Town;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function town(){
        return $this->belongsTo(Town::class);
    }
}
