<?php

namespace App\Providers;

use App\Events\KepsekCreated;
use App\Events\SomeoneIsTryingToLogin;
use App\Listeners\SendAccountActivationCode;
use App\Listeners\SendOneTimePassword;
use App\Listeners\UploadImageKepsek;
use App\Listeners\WelcomeKepsek;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        SomeoneIsTryingToLogin::class => [
            SendOneTimePassword::class
        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        KepsekCreated::class => [
            WelcomeKepsek::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
