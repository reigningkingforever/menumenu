<?php
namespace App\Http\Traits;
use App\Meal;
use App\Menu;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;

trait BookmarkTrait
{
    protected function addBookmark($item,$item_id){
        $user = Auth::user();
        $product = $this->getProduct($item,$item_id);
        $bookmark = Bookmark::firstOrCreate(['user_id' => $user->id,'eatable_id' => $item_id,'eatable_type' => $item,'day'=> $item == 'App\Meal'? $product->day:null ,'period'=>  $item == 'App\Meal'? $product->period:null]);
    }
    protected function removeBookmark($item,$item_id){
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id',$user->id)->where('eatable_id',$item_id)->where('eatable_type',$item)->delete();
    }

    protected function getProduct($item,$item_id){
        switch($item){
            case 'App\Meal': $product = Meal::find($item_id);
                break;
            case 'App\Menu': $product = Menu::find($item_id);
                break;
        }
        return $product;
    }
    
}

