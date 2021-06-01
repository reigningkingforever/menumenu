<?php

namespace App;

use App\Meal;
use App\Media;
use App\Comment;
use App\MealItem;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function items(){
        return $this->belongsToMany(Menu::class,'meal_items');
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
