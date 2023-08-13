<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Orders\Controllers\OrderController;

Route::apiResource('orders',OrderController::class);

Route::prefix('orders')
    ->group(function () {
        Route::post('add_to_order', [OrderController::class, 'add_to_order']);
    });
