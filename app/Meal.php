<?php

namespace App;

use App\Meal;
use App\Media;
use App\Comment;
use App\Bookmark;
use App\OrderDetail;
use App\MealCalendar;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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

    public function media(){
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'name' => 'no-image.jpg',
        ]);
    }

    public function calendars(){
        return $this->hasMany(MealCalendar::class);
    }
    
    public function orderItems(){
        return $this->hasManyThrough(OrderDetail::class, MealCalendar::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeAvailable($query){
        return $query->whereHas('calendar', function ($q) {
            $q->whereBetween('start_at', [now(), today()->addDays(7)->addHours(21)]);
          })->with('calendar');
    }
    public function bookmarks(){
        return $this->hasManyThrough(Bookmark::class, MealCalendar::class);
    }
}
