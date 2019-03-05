<?php

namespace App\Listeners;

use App\Mail\InviteNewMemberMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\InviteNewMemberNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteNewMemberListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
         // Log::info('02 : In INMN Listener Construct()');
    }



    /**
     * Handle the event.
     *
     * @param  InviteNewMemberNotification  $event
     * @return void
     */
    public function handle($regToken)
    {
        // dd($regToken->regToken->email);
        // dd($post->post->title); 
        Log::info('03 : In INML Listener Handle()');
        //Send Email
        Mail::to($regToken->regToken->email)->send(new InviteNewMemberMail($regToken));
        // event(new NewPostCreatedMail("Ali Jibran"));
    }
}
