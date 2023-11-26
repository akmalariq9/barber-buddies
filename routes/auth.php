<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BarbershopController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
        
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/barbershop/register', [BarberShopController::class, 'create']);
    
    Route::post('/barbershop/register', [BarberShopController::class, 'store'])->name('barbershop-register');
});

// Route::middleware('guest')->group(function () {
//     Route::get('barbershop/register', [RegisteredBarberController::class, 'create'])
//         ->name('barbershop-register');

//     Route::post('barbershop/register', [RegisteredBarberController::class, 'store']);

//     Route::get('barbershop/login', [AuthenticatedSessionController::class, 'createbarber'])
//         ->name('barbershop-login');
//         // ->middleware(['web', 'auth:barbershop']);

//     Route::post('barbershop/login', [AuthenticatedSessionController::class, 'storebarber'])
//         ->name('barbershop-login');


//     Route::get('barbershop/forgot-password', [PasswordResetLinkController::class, 'create'])
//         ->name('barbershop-password.request');

//     Route::post('barbershop/forgot-password', [PasswordResetLinkController::class, 'store'])
//         ->name('barbershop-password.email');

//     Route::get('barbershop/reset-password/{token}', [NewPasswordController::class, 'create'])
//         ->name('barbershop-password.reset');

//     Route::post('barbershop/reset-password', [NewPasswordController::class, 'store'])
//         ->name('barbershop-password.store');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/barbershop/verify-email', EmailVerificationPromptController::class)
//         ->name('barbershop-verification.notice');

//     Route::get('/barbershop/verify-email/{id}/{hash}', VerifyEmailController::class)
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('barbershop-verification.verify');

//     Route::post('/barbershop/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//         ->middleware('throttle:6,1')
//         ->name('barbershop-verification.send');

//     Route::get('/barbershop/confirm-password', [ConfirmablePasswordController::class, 'show'])
//         ->name('barbershop-password.confirm');

//     Route::post('/barbershop/confirm-password', [ConfirmablePasswordController::class, 'store']);

//     Route::put('/barbershop/password', [PasswordController::class, 'update'])->name('barbershop-password.update');

//     Route::post('/barbershop/logout', [AuthenticatedSessionController::class, 'destroy'])
//         ->name('barbershop-logout');
// });