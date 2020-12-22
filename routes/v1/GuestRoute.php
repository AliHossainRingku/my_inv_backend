<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\{LoginController, RegisterController};

Route::prefix('auth')->group(function(){
    Route::post('login', LoginController::class);
    Route::post('register', RegisterController::class);
});
