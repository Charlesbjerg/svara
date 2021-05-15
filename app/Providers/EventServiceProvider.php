<?php

namespace App\Providers;

use App\Events\AccountCreated;
use App\Events\MessageSent;
use App\Events\PhaseSignedOff;
use App\Events\ProjectCreated;
use App\Events\ProjectPhaseCompleted;
use App\Listeners\SendAccountActivation;
use App\Listeners\SendMessageThreadNotification;
use App\Listeners\SendPhaseCompleteNotification;
use App\Listeners\SendProjectCreatedNotification;
use App\Listeners\SendSignedOffNotification;
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
        ],
        AccountCreated::class => [
            SendAccountActivation::class,
        ],
        PhaseSignedOff::class => [
            SendSignedOffNotification::class,
        ],
        ProjectCreated::class => [
            SendProjectCreatedNotification::class,
        ],
        MessageSent::class => [
            SendMessageThreadNotification::class
        ],
        ProjectPhaseCompleted::class => [
            SendPhaseCompleteNotification::class,
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
