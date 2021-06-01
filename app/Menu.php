<?php

namespace App;


use App\Tag;
use App\Media;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    public function tags(){
        return $this->morphMany(Tag::class, 'taggable');
    }

    public function media(){
        return $this->morphOne(Media::class, 'mediable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
