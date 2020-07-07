<?php

namespace App\Services\Payments;

use App\Contracts\Payments\PaymentProcess;
use App\Payment;
use Illuminate\Support\Str;

class SberBankProcess implements PaymentProcess
{
    const PAYMENT_NAME = 'sber_bank';

    public function process()
    {
        Payment::create([
            'uuid'          => $this->generateUUID(),
            'payment_type'  => $this->getPaymentType()
        ]);
        $this->sendRequestToAPI();
    }

    public function generateUUID()
    {
        return (string) Str::uuid();
    }

    public function sendRequestToAPI()
    {
        /**
         * Тут обращаемся по API к банку
         */
        return 123;
    }

    public function getPaymentType()
    {
        return static::PAYMENT_NAME;
    }
}