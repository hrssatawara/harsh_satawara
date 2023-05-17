<?php

namespace App\Listeners;

use App\Events\BirthdayWishEvent;
use App\Mail\SendBirthdayWish;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BirthdayWishListener
{
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
     * @param  \App\Events\BirthdayWishEvent  $event
     * @return void
     */
    public function handle(BirthdayWishEvent $event)
    {
        $email = $event->user->email;
        Mail::to($email)->send(new SendBirthdayWish($event->user));
    }
}
