<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Tables\Controllers\TableController;

Route::apiResource('tables',TableController::class);
