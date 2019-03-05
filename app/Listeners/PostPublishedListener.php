<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\PostPublishedNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostPublishedMail;

class PostPublishedListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostPublishedNotification $post)
    {
        // dd($post->post->user->email);
        // Log::info('In Post PublishedNotification');
        Mail::to($post->post->user->email)->send(new PostPublishedMail($post));

    }
}
