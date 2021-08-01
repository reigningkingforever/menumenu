<?php
namespace App\Http\Traits;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;

trait BookmarkTrait
{
    protected function addBookmark($item_id){
        $user = Auth::user();
        $bookmark = Bookmark::firstOrCreate(['user_id' => $user->id,'calendar_id' => $item_id]);
    }
    protected function removeBookmark($item_id){
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id',$user->id)->where('calendar_id',$item_id)->delete();
    }
    
}

