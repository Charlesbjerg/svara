<?php

namespace App\Mail;

use App\Models\ProjectSignoff;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectSignoffNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $signoff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, ProjectSignoff $signoff)
    {
        $this->user = $user;
        $this->signoff = $signoff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mailables.signoff-phase', [
            'user' => $this->user,
            'signoff' => $this->signoff,
        ]);
    }
}
