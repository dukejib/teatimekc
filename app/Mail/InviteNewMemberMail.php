<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteNewMemberMail extends Mailable
{
    use Queueable, SerializesModels;

    public $regToken;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($regToken)
    {
        // Log::info('04 : in NPCM Construct()');
        $this->regToken = $regToken;
        // dd($regToken);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('05 : in INMM build()');
        return $this->from(config('blog.email_address'))->subject('Teatime Blog Registration Invite!')
        ->view('emails.invite');
    }
}
