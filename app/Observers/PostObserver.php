<?php

namespace App\Observers;

use App\Post;
use App\Helpers\LogActivity;
use App\Events\NewPostCreatedNotification;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->title = ucwords($post->title);
        $post->slug = str_slug($post->title);
    }

    public function created(Post $post)
    {
        LogActivity::addToLog('[POST] ' . $post->title . ' created');
        // dd($post->title . " Post is created via observer");
        //Raise Event s
        event(new NewPostCreatedNotification($post));
    }

    public function updated(Post $post)
    {
        LogActivity::addToLog('[POST] ' . $post->title . ' updated');
        // dd($post->title . " Post is updated via observer");
    }

    public function deleted(Post $post)
    {
        LogActivity::addToLog('[POST] ' . $post->title . ' deleted');
        // dd($post->title . " Post is deleted via observer");
    }

    public function restored(Post $post)
    {
        LogActivity::addToLog('[POST] ' . $post->title . ' restored');
        // dd($post->title . " Post is restored via observer");
    }

}
