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
        $emails = [];
        foreach ($event->project->staff as $staff) {
            $emails[] = $staff->email;
        }
        Mail::to($emails)->send(new SendMessageSentNotif($event->thread, $event->project));
    }
}
