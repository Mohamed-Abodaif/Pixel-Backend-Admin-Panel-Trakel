<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use PixelApp\Events\EmailAuthenticatableEvents\EmailAuthenticatableRegisteredEvent;
use PixelApp\Events\EmailAuthenticatableEvents\EmailChangingEvent;
use PixelApp\Listeners\EmailAuthenticatableEventsListeners\ChangedEmailVerificationSenderListener;
use PixelApp\Listeners\EmailAuthenticatableEventsListeners\EmailChangingMessageSenderListener;
use PixelApp\Listeners\EmailAuthenticatableEventsListeners\NewEmailVerificationSenderListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        EmailAuthenticatableRegisteredEvent::class => [
            NewEmailVerificationSenderListener::class
        ],
        EmailChangingEvent::class => [
            ChangedEmailVerificationSenderListener::class,
            EmailChangingMessageSenderListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }

    //to avoid laravel's default Registered Event behaviour
    protected function configureEmailVerification()
    {
        // ...
    }
}
