<?php

namespace App\Listeners;

use App\Events\PaymentRefunded;
use App\Payment;
use App\Services\Payments\PaymentEventType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentRefundedListener
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
     * @param  PaymentRefunded  $event
     * @return void
     */
    public function handle(PaymentRefunded $event)
    {
        $uuid = $event->getPayment()->uuid;
        Payment::where('uuid', $uuid)->update(['status' => PaymentEventType::PAYMENT_REFUND]);
    }
}
