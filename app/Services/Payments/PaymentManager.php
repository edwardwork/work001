<?php

namespace App\Services\Payments;

use App\Events\PaymentCanceled;
use App\Events\PaymentRefunded;
use App\Events\PaymentSucceeded;

class PaymentManager
{
    const TYPES = [
      'yandex_kassa'    => YandexKassaProcess::class,
      'pay_pal'         => PayPalProcess::class,
      'sber_bank'       => SberBankProcess::class,
    ];

    const EVENTS = [
        'succeeded'     => PaymentSucceeded::class,
        'canceled'      => PaymentCanceled::class,
        'refunded'      => PaymentRefunded::class,
    ];
}