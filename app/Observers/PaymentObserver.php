<?php

namespace App\Observers;

use App\Payment;
use App\Notifications\PaymentNotification;

class PaymentObserver
{
    public function created(Payment $payment)
    {
        
    }

    
    public function updated(Payment $payment)
    {
        if($payment->status == 'success'){
            //update coupon
            if($payment->coupon && $payment->coupon->available){
                --$payment->coupon->available;
                $payment->coupon->save();
            }
            //send thank you email to user
            //send email/sms to admin
            $payment->user->notify(new PaymentNotification($payment));
        }
    }

    
    public function deleted(Payment $payment)
    {
        //
    }

    /**
     * Handle the payment "restored" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function restored(Payment $payment)
    {
        //
    }

    /**
     * Handle the payment "force deleted" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function forceDeleted(Payment $payment)
    {
        //
    }
}
