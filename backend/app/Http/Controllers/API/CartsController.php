<?php

namespace App\Http\Controllers\API;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;


class CartsController extends Controller
{
    public function getCart($user_id)
    {
        $cart = Cart::with('items.product')->firstOrCreate(['user_id' => $user_id]);
        return $cart;
    }

    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => $data['user_id']]);

        $item = CartItem::where('cart_id', $cart->id)
                        ->where('product_id', $data['product_id'])
                        ->first();

        if ($item) {
            $item->quantity += $data['quantity'];
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
            ]);
        }

        return response()->json(['message' => 'Added to cart'], 200);
    }

    public function updateItem(Request $request, $item_id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $item = CartItem::findOrFail($item_id);
        $item->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart item updated'], 200);
    }

    public function removeItem($item_id)
    {
        $item = CartItem::findOrFail($item_id);
        $item->delete();

        return response()->json(['message' => 'Item removed'], 200);
    }

    public function clearCart($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->first();
        if ($cart) {
            $cart->items()->delete();
        }

        return response()->json(['message' => 'Cart cleared'], 200);
    }
}

