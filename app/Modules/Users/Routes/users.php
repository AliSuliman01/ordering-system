<?php


use App\Modules\Users\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('change_password', [UserController::class, 'change_password'])->middleware('auth:sanctum');
});
