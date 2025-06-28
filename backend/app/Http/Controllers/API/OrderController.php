<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
     public function index()
    {
        return response()->json(Order::where('user_id', JWTAuth::user()->id)->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'user_id'     => JWTAuth::user()->id,
            'product_id'  => $request->product_id,
            'quantity'    => $request->quantity,
            'total_price' => 100 * $request->quantity, // Static for example
            'status'      => 'pending'
        ]);

        return response()->json(['message' => 'Order placed successfully', 'order' => $order], 201);
    }
}
