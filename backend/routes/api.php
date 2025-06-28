<?php

use Illuminate\Routing\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ProductController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::middleware(['auth:api'])->group(function () {

    // Admin-only route
    Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
        Route::post('/admin/add-product', [ProductController::class, 'store']);
    });

    // Public user route
    Route::get('/products', [ProductController::class, 'index']);
});
