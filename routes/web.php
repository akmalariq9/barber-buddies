<?php

use App\Http\Controllers\ProfileController;
use App\Models\BarberShop;
use App\Models\Capster;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasiController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/barber', function(){
    return view('barbershop', [
        'pelanggan' =>  BarberShop::all()->collect(),
        'capster' => Capster::all()->collect()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ReservasiController::class)->group(function () {
    Route::get('/get-capsters/{capster}', 'getCapster');
    Route::get('/reservasi', 'index');
    Route::post('/reservasi', 'store')->name('reservasi.store');

});
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');


require __DIR__.'/auth.php';
