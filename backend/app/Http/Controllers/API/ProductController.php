<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // ✅ All products (with category)
    public function index()
    {
        return response()->json(Product::with('category')->get());
    }

    // ✅ Add new product (admin only)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'unit'        => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::create($validator->validated());

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $product,
        ], 201);
    }
}
