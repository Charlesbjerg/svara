<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessageSentNotif extends Mailable
{
    use Queueable, SerializesModels;

        public $thread;
        public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($thread, $project)
    {
        $this->thread = $thread;
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
        return $this->markdown('mailables.message-sent', [
            'thread' => $this->thread,
            'project' => $this->project,
            'url' => $threadUrl,
        ]);
    }
}
