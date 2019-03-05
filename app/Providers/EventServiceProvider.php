<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\NewPostCreatedNotification;
use App\Listeners\NewPostCreatedListener;
use App\Events\SomeTaskNotification;
use App\Listeners\SomeTaskListener;
use App\Events\InviteNewMemberNotification;
use App\Listeners\InviteNewMemberListener;
use App\Events\PostPublishedNotification;
use App\Listeners\PostPublishedListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewPostCreatedNotification::class  => [
            NewPostCreatedListener::class,
        ],
        InviteNewMemberNotification::class => [
            InviteNewMemberListener::class,
        ],
        PostPublishedNotification::class => [
            PostPublishedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
