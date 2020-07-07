<?php

namespace App\Listeners;

use App\Events\PaymentSucceeded;
use App\Payment;
use App\Services\Payments\PaymentEventType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentSucceededListener
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
     * @param  PaymentSucceeded  $event
     * @return void
     */
    public function handle(PaymentSucceeded $event)
    {
        $uuid = $event->getPayment()->uuid;
        Payment::where('uuid', $uuid)->update(['status' => PaymentEventType::PAYMENT_SUCCEEDED]);
    }
}
