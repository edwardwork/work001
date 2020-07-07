<?php

namespace App\Contracts\Payments;

interface PaymentProcess
{
    public function process();

    public function generateUUID();

    public function sendRequestToAPI();

    public function getPaymentType();
}