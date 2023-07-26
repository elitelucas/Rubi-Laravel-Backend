<?php

namespace App\Listeners;

use App\Events\InvitationMade;
use App\Mail\InvitationMail;
use Illuminate\Support\Facades\Mail;

class SendInvitation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InvitationMade $event): void
    {
        Mail::to($event->invitation->email)->send(
            new InvitationMail(invitation: $event->invitation)
        );
    }
}
