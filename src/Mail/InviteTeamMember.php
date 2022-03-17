<?php

namespace Truefrontier\JetstreamTeamInvites\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Truefrontier\JetstreamTeamInvites\Models\Invitation;
use Illuminate\Notifications\Messages\MailMessage;

class InviteTeamMember extends Mailable
{
    use Queueable, SerializesModels;

    public $invite;

    public bool $hasAccount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invitation $invite, bool $hasAccount)
    {
        $this->invite = $invite;
        $this->hasAccount = $hasAccount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.teams.invite')
                    ->subject($this->invite->user->name . ' invites you to join ' . $this->invite->team->name)
                    ->with(['invite' => $this->invite]);
    }
}
