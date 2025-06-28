<?php

use Illuminate\Routing\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ProductController;

Route::group([

    'middleware' => 'api',
    // 'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::middleware(['auth:api'])->group(function () {

    // Admin-only route
    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::post('/admin/add-product', [ProductController::class, 'store']);
    });

    // Public user route
    Route::get('/products', [ProductController::class, 'index']);
});
