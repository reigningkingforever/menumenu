<?php
namespace App\Http\Traits;
use App\Cart;
use App\MealCalendar;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Http\Traits\OrderTrait;
use Illuminate\Support\Facades\Auth;

trait CartTrait
{
    use OrderTrait;
    protected function addToCartSession($item_id){
        $calendar = MealCalendar::find($item_id);
        if(!$calendar)
        abort(404);
        $cart = request()->session()->get('cart');
        // if cart is empty then this is the first product
        if(!$cart) {
            $cart = [
                    $calendar->id => [
                        "id" => $item_id,
                        "calendar" => $calendar,
                        "quantity" => request()->quantity ? request()->quantity :1,
                        "delivery" => strtolower($calendar->datentime->format('l').' '.$this->getWeek($calendar->datentime)),    
                    ]
            ];
            request()->session()->put('cart', $cart);
        }else{
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$calendar->id])) {
                $cart[$calendar->id]['quantity']++;
                request()->session()->put('cart', $cart);
            }else{
                // if item not exist in cart then add to cart with quantity = 1
                $cart[$calendar->id] = [
                    "id" => $item_id,
                    "calendar" => $calendar,
                    "quantity" => request()->quantity ? request()->quantity : 1,
                    "delivery" => strtolower($calendar->datentime->format('l').' '.$this->getWeek($calendar->datentime)),
                ];
                request()->session()->put('cart', $cart);
            }
        }
        return $cart;
    }

    protected function addToCartDb($item_id){
        $user = Auth::user();
        $dbcart = Cart::firstOrNew(['user_id' => $user->id,'calendar_id' => $item_id]);
        $dbcart->quantity = $dbcart->quantity + 1;
        $dbcart->save();
    }

    protected function removeFromCartSession($item_id){
        $oldcart = request()->session()->get('cart');
        $cart = Arr::except($oldcart, $item_id);
        request()->session()->put('cart', $cart);
        return $cart;
    }

    
    
    protected function removeFromCartDb($item_id){
        $user = Auth::user();
        $dbcart = Cart::where('user_id',$user->id)->where('calendar_id',$item_id)->delete();
    }

}

