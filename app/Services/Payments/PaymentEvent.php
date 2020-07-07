<?php

namespace App\Services\Payments;

use App\Payment;

abstract class PaymentEvent
{
    private $payment;

    public function __construct(Payment $payment) {
        $this->payment = $payment;
    }

    public function getPayment(): Payment {
        return $this->payment;
    }
}