<?php

namespace App\Listeners;

use App\Cart;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\CartTrait;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin implements ShouldQueue
{
    use CartTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {   
        $user = Auth::user();
        //if session,give session cart to database
        $cart = request()->session()->get('cart');
        if($cart){
            foreach($cart as $key => $value){
                $dbcart = Cart::firstOrCreate(['user_id' => $user->id,'eatable_id' => $value['id'],'eatable_type'=> $value['type']],['quantity' => $value['quantity']]);
            }
        }elseif($user->carts->isNotEmpty()){
            foreach($user->carts as $dbcart){
               $cart =  $this->addToCartSession($dbcart->eatable_type,$dbcart->eatable_id);
            }
        }

        
    }
}
