<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Fontend Routes
Route::get('/registation', [UserController::class, 'Registation'])->name('registation');
Route::get('/login', [UserController::class, 'Login'])->name('login');
Route::get('/sent-otp', [UserController::class, 'SentOTP'])->name('sent.otp');
Route::get('/verify-otp', [UserController::class, 'VerificationCode'])->name('verify.otp');
Route::get('/password-reset', [UserController::class, 'PasswordReset'])->name('password.reset');
Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');

//Backend Routes
Route::post('/user-registation', [UserController::class, 'UserRegistation']);
Route::post('/user-login', [UserController::class, 'UserLogin'])->name('user.login');
Route::post('/send-otp-code', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])
    ->middleware([TokenVerificationMiddleware::class]);
