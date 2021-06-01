<?php

namespace App;

use App\Meal;
use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class VendorMenu extends Model
{
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
