<?php

namespace App;

use App\Meal;
use App\Menu;
use Illuminate\Database\Eloquent\Model;

class MealItem extends Model
{
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function meal(){
        return $this->hasMany(Meal::class);
    }
}
