<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Routing\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:api'])->group(function () {

    // Admin-only route
    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::post('/admin/add-product', [ProductController::class, 'store']);
    });

    // Public user route
    Route::get('/products', [ProductController::class, 'index']);
});
