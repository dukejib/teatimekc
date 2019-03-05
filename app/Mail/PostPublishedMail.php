<?php

namespace App\Mail;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostPublishedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        // Log::info('04 : in NPCM Construct()');
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Log::info('05 : in NPCM build()');
        // return $this->view('mail.newpost');
        return $this->from(config('blog.email_address'))->subject('Post Published!')
        ->view('emails.postpublished');
        // ->with('name',$data);
    }
}
