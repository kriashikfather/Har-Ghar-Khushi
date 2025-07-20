<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|string']);
        return Category::create($request->all());
    }

    public function show(Category $category) {
        return $category;
    }

    public function update(Request $request, Category $category) {
        $category->update($request->all());
        return $category;
    }

    public function destroy(Category $category) {
        $category->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
