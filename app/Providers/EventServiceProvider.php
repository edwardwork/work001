<?php

namespace App\Providers;

use App\Events\PaymentCanceled;
use App\Events\PaymentRefunded;
use App\Events\PaymentSucceeded;
use App\Listeners\PaymentCanceledListener;
use App\Listeners\PaymentRefundedListener;
use App\Listeners\PaymentSucceededListener;
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
        PaymentSucceeded::class => [
            PaymentSucceededListener::class,
        ],
        PaymentCanceled::class => [
            PaymentCanceledListener::class,
        ],
        PaymentRefunded::class => [
            PaymentRefundedListener::class,
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
