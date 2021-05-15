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
        $emails = [];
        foreach ($event->project->staff as $staff) {
            $emails[] = $staff->email;
        }
        Mail::to($emails)->send(new SendPhaseCompleteNotif($event->phase, $event->project));
    }
}
