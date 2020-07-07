<?php

namespace App\Services\Payments;

class PaymentEventType
{
    const PAYMENT_PENDING   = 'pending';
    const PAYMENT_SUCCEEDED = 'succeeded';
    const PAYMENT_CANCELED  = 'canceled';
    const PAYMENT_REFUND    = 'refund';
}