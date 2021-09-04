<?php

namespace App\Observers;

use App\Message;
use App\Mail\NewsLetter;
use Illuminate\Support\Facades\Mail;

class MessageObserver
{
    public function created(Message $message)
    {
        if($message->status){
            $this->sendEMail($message);
        }
    }

    public function updated(Message $message)
    {
        if($message->status){
            $this->sendEMail($message);
        }
    }

    public function sendEMail(Message $message){
        $users = User::all();
        Mail::to($users)->send(new NewsLetter($message));
    }

    public function deleted(Message $message)
    {
        //
    }

    public function restored(Message $message)
    {
        //
    }

    public function forceDeleted(Message $message)
    {
        //
    }
}
