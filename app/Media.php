<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['name','format','mediable_id','mediable_type'];
    public function mediable(){
        return $this->morphTo();
    }
}
