<?php

namespace App\Mail;

use App\Models\Project;
use App\Models\ProjectSignoff;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSignedOffNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $project;
    public $signoff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Project $project, ProjectSignoff $signoff)
    {
        $this->project = $project;
        $this->signoff = $signoff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mailables.phase-signed-off', [
            'project' => $this->project,
            'signoff' => $this->signoff,
            'url' => url('/projects/' . $this->project->id),
        ]);
    }
}
