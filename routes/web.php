<?php

// routes/web.php

use App\Http\Controllers\ProfileController;
use App\Models\BarberShop;
use App\Models\Capster;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Api\ReservasiApiController;
use App\Http\Controllers\BarberShopController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Http\Controllers\BarbershopAuthController;
use App\Http\Controllers\PaymentController;

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
});

// Route::get('/barbershop/register', [BarberShopController::class, 'showRegistrationForm']);
Route::get('/barbershop/add-service', [ServiceController::class, 'showServiceForm']);
Route::post('/barbershop/add-service', [ServiceController::class, 'addservice'])->name('add-service');
Route::get('/barbershop/register', [BarberShopController::class, 'create']);
Route::post('/barbershop/register', [BarberShopController::class, 'store'])->name('barbershop-register');
Route::get('/barbershop/{barberShop}', [BarberShopController::class, 'show'])->name('barbershop.show');
Route::get('/barbershop/{barberShop}/edit', [BarberShopController::class, 'edit'])->name('barbershop.edit');
Route::put('/barbershop/{barberShop}', [BarberShopController::class, 'update'])->name('barbershop.update');

Route::get('/payments/create/{reservation}', [PaymentController::class, 'create'])->name('payment.form');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

Route::get('/barber', function () {
    return view('barbershop', [
        'pelanggan' =>  BarberShop::all()->collect(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ReservasiController::class)->group(function () {
    Route::get('/get-capsters/{capster}', 'getCapster');
    Route::get('/reservasi', 'index');
    Route::post('/reservasi', 'store')->name('reservasi.store');
});


Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

require __DIR__.'/auth.php';