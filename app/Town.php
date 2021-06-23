<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['status'];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
