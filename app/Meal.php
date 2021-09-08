<?php

namespace App;

use App\Meal;
use App\Media;
use App\Order;
use App\Comment;
use App\Bookmark;
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

    public function calendar(){
        return $this->hasOne(MealCalendar::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeAvailable($query){
        return $query->whereHas('calendar', function ($q) {
            $q->whereBetween('start_at', [now(), today()->addDays(7)->addHours(21)]);
          })->with('calendar');
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
