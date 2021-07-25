<?php

namespace App;

use App\User;
use App\Media;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'separator' => '_'
            ]
        ];
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function media(){
        return $this->morphMany(Media::class, 'mediable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
