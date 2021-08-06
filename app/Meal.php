<?php

namespace App;

use App\Meal;
use App\Media;
use App\Comment;
use App\Bookmark;
use App\MealCalendar;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use Sluggable;
    protected $casts = ['period'=> 'array'];

    public function sluggable(){
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '_'
            ]
        ];
    }
    public function items(){
        return $this->belongsToMany(Menu::class,'meal_items');
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'name' => 'no-image.jpg',
        ]);
    }

    public function calendar(){
        return $this->hasOne(MealCalendar::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function bookmarks(){
        return $this->morphMany(Bookmark::class, 'eatable');
    }
    public function scopeAvailable($query){
        return $query->whereHas('calendar', function ($q) {
            $q->whereBetween('start_at', [now(), today()->addDays(7)->addHours(21)]);
          })->with('calendar');
    }
}
