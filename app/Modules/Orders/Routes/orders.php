<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Orders\Controllers\OrderController;

Route::apiResource('orders',OrderController::class);
