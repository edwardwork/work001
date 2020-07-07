<?php

namespace App\Http\Controllers;

use App\Contracts\Payments\PaymentProcess;
use App\Payment;
use App\Services\Payments\PaymentManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function thank()
    {
        return view('thank');
    }
    public function store(Request $request, $slug)
    {
        /** @var PaymentProcess $paymentHandler */
        $className = PaymentManager::TYPES[$slug];
        $paymentHandler = new $className();
        $paymentHandler->process();

        return redirect(route('thank'));
    }

    public function handleWebHook(Request $request)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $paymentUuid = $requestBody['uuid'];

        $payment = Payment::where('uuid', $paymentUuid)->first();
        if (!$payment) {
            throw new \Exception('Not found payment with uuid = ' . $paymentUuid);
        }

        $className = PaymentManager::EVENTS[$requestBody['event']];
        $notification = new $className($payment);
        if (!$notification) {
            throw new \Exception('Unsupported event type');
        }
        event($notification);

        return response()->json([], JsonResponse::HTTP_OK);
    }
}
