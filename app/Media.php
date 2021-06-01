<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['name','format','mediable_id','mediable_type'];
    public function mediaable(){
        return $this->morphTo();
    }
}
