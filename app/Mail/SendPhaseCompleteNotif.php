<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPhaseCompleteNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $phase;
    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($phase, $project)
    {
        $this->phase = $phase;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $threadUrl = url("/projects/{$this->project->id}");
        return $this->markdown('mailables.phase-complete', [
            'phase' => $this->phase,
            'project' => $this->project,
            'url' => $threadUrl,
        ]);
    }
}
