<?php
namespace App\Http\Traits;
use App\Cart;
use App\Meal;
use App\Menu;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use App\Http\Traits\OrderTrait;
use Illuminate\Support\Facades\Auth;

trait CartTrait
{
    use OrderTrait;
    protected function addToCartSession($item,$item_id){
        $product = $this->getItem($item,$item_id);
        if(!$product)
        abort(404);
        $cart = request()->session()->get('cart');
        // if cart is empty then this is the first product
        if(!$cart) {
            $cart = [
                    $item.'-'.$product->id => [
                        "id" => $item_id,
                        "type" => $item,
                        "product" => $product,
                        "quantity" => request()->quantity ? request()->quantity :1,
                        "delivery" => strtolower($product->calendar->datetime->format('l').' '.$this->getWeek($product->calendar->datetime)),
                        
                    ]
            ];
            request()->session()->put('cart', $cart);
        }else{
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$item.'-'.$product->id])) {
                $cart[$item.'-'.$product->id]['quantity']++;
                request()->session()->put('cart', $cart);
            }else{
                // if item not exist in cart then add to cart with quantity = 1
                $cart[$item.'-'.$product->id] = [
                    "id" => $item_id,
                    "type" => $item,
                    "product" => $product,
                    "quantity" => request()->quantity ? request()->quantity : 1,
                    "delivery" => strtolower($product->calendar->datetime->format('l').' '.$this->getWeek($product->calendar->datetime)),
                    
                    
                ];
                request()->session()->put('cart', $cart);
            }
        }
        return $cart;
    }

    protected function removeFromCartSession($item,$item_id){
        $product = $this->getItem($item,$item_id);
        $oldcart = request()->session()->get('cart');
        $cart = Arr::except($oldcart, $item.'-'.$product->id);
        request()->session()->put('cart', $cart);
        return $cart;
    }

    protected function addToCartDb($item,$item_id){
        $user = Auth::user();
        $dbcart = Cart::firstOrNew(['user_id' => $user->id,'eatable_id' => $item_id,'eatable_type' => $item]);
        $dbcart->quantity = $dbcart->quantity + 1;
        $dbcart->save();
    }
    
    protected function removeFromCartDb($item,$item_id){
        $user = Auth::user();
        $dbcart = Cart::where('user_id',$user->id)->where('eatable_id',$item_id)->where('eatable_type',$item)->delete();
    }

    protected function getItem($item,$item_id){
        switch($item){
            case 'App\Meal': $product = Meal::find($item_id);
                break;
            case 'App\Menu': $product = Menu::find($item_id);
                break;
        }
        return $product;
    }
}

