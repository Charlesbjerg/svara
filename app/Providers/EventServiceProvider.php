<?php

namespace App\Providers;

use App\Events\AccountCreated;
use App\Listeners\SendAccountActivation;
use App\Listeners\SendProjectCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
            SendProjectCreatedNotification::class,
        ],
        AccountCreated::class => [
            SendAccountActivation::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
//    protected $subscribe = [
//        AccountCreated::class,
//    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
