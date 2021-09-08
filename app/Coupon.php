<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Coupon extends Model
{
    use Sluggable;

    protected $casts = ['meal_limit'=> 'array','state_limit'=> 'array','city_limit'=> 'array','town_limit'=> 'array'];
    protected $dates = ['start_at','end_at'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'separator' => '_'
            ]
        ];
    }
    public function getRouteKeyName(){
        return 'slug';
    }
}
