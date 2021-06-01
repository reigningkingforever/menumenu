<?php

namespace App;

use App\Meal;
use App\Purchase;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
