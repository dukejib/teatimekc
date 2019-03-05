<?php

namespace App\Observers;

use App\Tag;
use App\Helpers\LogActivity;


class TagObserver
{

    public function creating(Tag $tag)
    {
        //Change tag first letter to Upper
        $tag->tag = ucwords($tag->tag);
    }

    public function created(Tag $tag)
    {
        // dd($tag->tag . " Tag is created via Observer");
        LogActivity::addToLog('[Tag] ' . $tag->tag . ' created');
    }

    public function updated(Tag $tag)
    {
        // dd($tag->tag . " Tag is updated via Observer");
        LogActivity::addToLog('[Tag] ' . $tag->tag . ' updated');
    }

    public function deleted(Tag $tag)
    {
        // dd($tag->tag . " Tag is deleted via Observer");
        LogActivity::addToLog('[Tag] ' . $tag->tag . ' deleted');
    }


}
