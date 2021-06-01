<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
