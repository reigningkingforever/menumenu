<?php

namespace App;

use App\Meal;
use App\Media;
use App\Comment;
use App\Bookmark;
use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function items(){
        return $this->belongsToMany(Menu::class,'meal_items');
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'name' => 'meal-no-image.jpg',
        ]);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function orders(){
        return $this->morphMany(OrderDetail::class, 'itemable');
    }

    public function bookmarks(){
        return $this->morphMany(Bookmark::class, 'eatable');
    }
}
