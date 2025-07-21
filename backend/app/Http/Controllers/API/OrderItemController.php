<?php

namespace App\Http\Controllers\API;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::with(['order', 'product'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric'
        ]);

        return OrderItem::create($data);
    }

    public function show(OrderItem $orderItem)
    {
        return $orderItem->load(['order', 'product']);
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $orderItem->update($request->all());
        return $orderItem;
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return response()->json(['message' => 'Order item deleted']);
    }
}
