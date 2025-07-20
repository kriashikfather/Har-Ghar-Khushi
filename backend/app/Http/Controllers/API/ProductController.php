<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

 class ProductController extends Controller
{
    public function index() {
        return Product::with('category')->get();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|string'
        ]);
        return Product::create($data);
    }

    public function show(Product $product) {
        return $product->load('category');
    }

    public function update(Request $request, Product $product) {
        $product->update($request->all());
        return $product;
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
