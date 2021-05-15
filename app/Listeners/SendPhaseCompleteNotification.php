<?php

namespace App\Listeners;

use App\Events\ProjectPhaseCompleted;
use App\Mail\SendPhaseCompleteNotif;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPhaseCompleteNotification
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
     * @param  ProjectPhaseCompleted  $event
     * @return void
     */
    public function handle(ProjectPhaseCompleted $event)
    {
        Mail::to($event->user->email)->send(new SendPhaseCompleteNotif($event->user, $event->phase));
    }
}
