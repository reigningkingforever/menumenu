<?php

namespace App\Observers;

use App\Payment;
use App\Notifications\PaymentNotification;

class PaymentObserver
{
    public function created(Payment $payment)
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

    
    public function updated(Payment $payment)
    {
        $role = Role::where('name','auditor')->first();
        $users = User::where('role_id',$role->id)->get();
        Notification::send($users, new AuditorNotification($payment));
        if($payment->isDirty('status')){
            if($payment->status == 'success'){
                $this->settlement($payment);
            }
            elseif($payment->status == 'failed'){
                $wallet = Wallet::where('user_id',$payment->beneficiary_id)->where('currency_id',$payment->currency_id)->first();
                switch($payment->type){
                    case "withdraw":    $wallet->amount += $payment->value;
                                        $wallet->save();
                                        Settlement::create(['user_id'=> $payment->beneficiary_id,'amount'=>$payment->value,'currency_id'=> $payment->currency_id,'settlementable_id'=> $payment->id,'settlementable_type'=> 'App\Payment','status'=> 'completed']);
                    break;
                }
                $payment->user->notify(new PaymentTransactionNotification($payment));
            }
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
