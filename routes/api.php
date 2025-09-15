<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/user-registation', [UserController::class, 'UserRegistation']);
// Route::post('/user-login', [UserController::class, 'UserLogin']);

// Route::post('/send-otp-code', [UserController::class, 'SendOTPCode']);
// Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
// Route::post('reset-password', [UserController::class, 'ResetPassword'])
//     ->middleware([TokenVerificationMiddleware::class]);