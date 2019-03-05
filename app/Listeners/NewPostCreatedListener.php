<?php

namespace App\Listeners;

use App\Mail\NewPostCreatedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use \App\Events\NewPostCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPostCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // Log::info('02 : In NPCL Listener Construct()');
    }

    /**
     * Handle the event.
     *
     * @param  NewPostCreatedNotification  $event
     * @return void
     */
    public function handle(NewPostCreatedNotification $post)
    {
        // dd($post);
        // dd($post->post->title); 
        // Log::info('03 : In NPCN Listener Handle()');
        //Send Email
        Mail::to(config('blog.email_address'))->send(new NewPostCreatedMail($post));
        // event(new NewPostCreatedMail("Ali Jibran"));
    }
}
