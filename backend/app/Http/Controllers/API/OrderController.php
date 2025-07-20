<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index() {
        return Order::with(['items.product', 'user'])->get();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric'
        ]);

        $total = collect($data['items'])->sum(function ($item) {
            return $item['quantity'] * $item['price'];
        });

        $order = Order::create([
            'user_id' => JWTAuth::user()->id,
            'total_price' => $total,
        ]);

        foreach ($data['items'] as $item) {
            $order->items()->create($item);
        }

        return response()->json($order->load('items.product'), 201);
    }

    public function updateStatus(Request $request, Order $order) {
        $request->validate(['status' => 'required']);
        $order->update(['status' => $request->status]);
        return $order;
    }

    public function show(Order $order) {
        return $order->load(['items.product', 'user']);
    }
}

