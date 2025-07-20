<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('order')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'method' => 'required|in:cash_on_delivery,esewa,khalti,fonepay',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,failed',
            'transaction_id' => 'nullable|string',
        ]);

        return Payment::create($data);
    }

    public function show(Payment $payment)
    {
        return $payment->load('order');
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());
        return $payment;
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(['message' => 'Payment deleted']);
    }
}
