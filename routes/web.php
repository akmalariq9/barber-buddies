<?php

// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Models\BarberShop;
use App\Models\Capster;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Api\ReservasiApiController;
use App\Http\Controllers\AvailablePaymentController;
use App\Http\Controllers\BarberShopController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Http\Controllers\BarbershopAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Models\AvailablePayment;
use App\Models\Reservation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardz');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/reservation-history', [ProfileController::class, 'history'])->name('user.reservationHistory');
});

Route::get('/barbershop/add-service', [ServiceController::class, 'showServiceForm'])->middleware('barbershop');
Route::post('/barbershop/add-service', [ServiceController::class, 'addservice'])->name('add-service')->middleware('barbershop');

Route::get('/barbershop/add-payment', [AvailablePaymentController::class, 'showPaymentForm'])->middleware('barbershop');
Route::post('/barbershop/add-payment', [AvailablePaymentController::class, 'addpayment'])->name('add-payment')->middleware('barbershop');

Route::get('/barbershop/register', [BarberShopController::class, 'create']);
Route::post('/barbershop/register', [BarberShopController::class, 'store'])->name('barbershop-register');

Route::get('/barbershop/{barberShop}/edit', [BarberShopController::class, 'edit'])->name('barbershop.edit')->middleware('barbershop');
Route::put('/barbershop/{barberShop}', [BarberShopController::class, 'update'])->name('barbershop.update')->middleware('barbershop');
Route::get('/barbershop/{barberShop}', [BarberShopController::class, 'show'])->name('barbershop.show');

Route::get('/{barbershop}/income', [BarberShopController::class, 'income'])->name('barbershop.income')->middleware('barbershop');

Route::get('/payments/create/{reservation}', [PaymentController::class, 'create'])->name('payment.form');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

Route::get('/barbershop', function () {
    return view('barbershop', [
        'pelanggan' =>  BarberShop::all()->collect(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reservation-list', function () {
    return view('reservation.show', [
        'reservasi' =>  Reservation::all()->collect(),
    ]);
})->middleware('barbershop')->name('reservation-list');

Route::controller(ReservasiController::class)->group(function () {
    Route::post('/reservation', 'store')->middleware(['auth', 'verified'])->name('reservasi.store');
    Route::get('/reservation', 'index')->middleware(['auth', 'verified']);
    Route::get('/barbershop/{barbershop}/reservasi', 'show')->name('reservasi.show')->middleware('barbershop');
    Route::delete('/barbershop/{barbershop}/reservasi/{reservasi}', 'destroy')->name('reservasi.destroy')->middleware('barbershop');
    Route::get('/barbershop/{barbershop}/reservasi/{reservasi}/edit', 'edit')->name('reservasi.edit')->middleware('barbershop');
    Route::put('/barbershop/{barbershop}/reservasi/{reservasi}', 'update')->name('reservasi.update')->middleware('barbershop');
    Route::get('/user/{user}/reservasi', 'showforuser')->name('reservasi.showforuser')->middleware('auth');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reservations/{reservationId}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create')->middleware('auth');
    Route::post('/reservations/{reservationId}/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
});

require __DIR__.'/auth.php';
