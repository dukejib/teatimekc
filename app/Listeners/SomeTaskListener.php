<?php

namespace App\Listeners;

use \App\Events\SomeTaskNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SomeTaskListener
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
     * @param  SomeTaskNotification  $event
     * @return void
     */
    public function handle(SomeTaskNotification $event)
    {
        Log::info('Firing SomeTaskNotification Event');
        return 'ali';
    }
}
