<?php

namespace App\Http\Controllers\API;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;


class CartItemsController extends Controller
{
    // ✅ List all cart items (with product details)
    public function index()
    {
        return CartItem::with(['cart.user', 'product'])->get();
    }

    // ✅ Show single cart item
    public function show(CartItem $cartItem)
    {
        return $cartItem->load(['cart.user', 'product']);
    }

    // ✅ Add new cart item manually (alternative to CartController)
    public function store(Request $request)
    {
        $data = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $existing = CartItem::where('cart_id', $data['cart_id'])
                            ->where('product_id', $data['product_id'])
                            ->first();

        if ($existing) {
            $existing->quantity += $data['quantity'];
            $existing->save();
            return response()->json(['message' => 'Quantity updated', 'item' => $existing], 200);
        }

        $cartItem = CartItem::create($data);
        return response()->json(['message' => 'Cart item created', 'item' => $cartItem], 201);
    }

    // ✅ Update quantity
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart item updated', 'item' => $cartItem], 200);
    }

    // ✅ Delete cart item
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return response()->json(['message' => 'Cart item deleted'], 200);
    }
}
