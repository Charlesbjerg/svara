<?php

namespace App\Listeners;

use App\Events\MessageSent;
use App\Mail\SendMessageSentNotif;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMessageThreadNotification
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        Mail::to($event->user->email)->send(new SendMessageSentNotif($event->user, $event->thread));
    }
}
