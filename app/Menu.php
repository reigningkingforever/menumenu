<?php

namespace App;


use App\Tag;
use App\Media;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use Sluggable;

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
    
    public function tags(){
        return $this->morphMany(Tag::class, 'taggable');
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable')->withDefault([
            'name' => 'meal-no-image.jpg',
        ]);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
