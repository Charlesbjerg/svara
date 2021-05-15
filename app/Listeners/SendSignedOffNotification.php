<?php

namespace App\Listeners;

use App\Events\PhaseSignedOff;
use App\Mail\SendSignedOffNotif;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSignedOffNotification
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
     * @param  PhaseSignedOff  $event
     * @return void
     */
    public function handle(PhaseSignedOff $event)
    {
        $emails = [];
        foreach ($event->project->staff as $staff) {
           $emails[] = $staff->email;
        }
        Mail::to($emails)->send(new SendSignedOffNotif($event->project, $event->signoff));
    }
}
