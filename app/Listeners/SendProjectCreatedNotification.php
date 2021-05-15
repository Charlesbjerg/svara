<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Mail\ProjectSignoffNotification;
use App\Mail\SendPhaseCompleteNotif;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectCreatedNotification
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
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        $emails = [];
        foreach ($event->project->staff as $staff) {
            $emails[] = $staff->email;
        }
        Mail::to($emails)->send(new SendPhaseCompleteNotif($event->project));
    }
}
