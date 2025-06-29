<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ProductController;

Route::get('/', function () {
    return response()->json(['message' => 'Hello world!']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::put('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});

Route::middleware(['auth:api'])->group(function () {

    // Admin-only route
    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::post('/admin/add-product', [ProductController::class, 'store']);
    });

    // Public user route
    Route::get('/products', [ProductController::class, 'index']);
});
