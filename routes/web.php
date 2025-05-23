<?php

use App\Http\Controllers\penerbanganController;
use App\http\Controllers\bookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tiketController;
use App\Models\booking;
use App\Models\pembayaran;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('', function () {
        $data = [
            'pengguna' => User::where('role', 'customer')->count(),
            'penjualan' => booking::where('status', 'dibayar')->sum('totalHarga')
        ];
        return view('admin.dashboard', $data);
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::resource('penerbangan', penerbanganController::class);
    Route::resource('tiket', tiketController::class);
    Route::resource('booking', bookingController::class);
    Route::get('history', [pembayaranController::class, 'index'])->name('historyTransaksi');

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// customer
Route::prefix('customer')->middleware(['auth', 'role:customer'])->group(function () {

    Route::get('', [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::post('', [CustomerController::class, 'searchTiket'])->name('cariTiket');

    // search tiket
    Route::get('searchTiket', [CustomerController::class, 'search'])->name('search');
    Route::post('booking', [CustomerController::class, 'booking'])->name('postBooking');

    // myTike
    Route::get('tiket', [CustomerController::class, 'tiket'])->name('tiket');
    // myBooking
    Route::get('mybooking', [CustomerController::class, 'mybooking'])->name('mybooking');
    Route::get('mybooking/{id}', [CustomerController::class, 'detailBooking'])->name('detailBooking');

    Route::post('postPembayaran', [CustomerController::class, 'postPembayaran'])->name('postPembayaran');
    Route::post('postBeli', [CustomerController::class, 'postBeli'])->name('postBeli');

    Route::get('history', [CustomerController::class, 'history'])->name('history');
    Route::get('detaiHistory/{id}', [CustomerController::class, 'detailHistory'])->name('detailHistory');
    Route::post('convert', [CustomerController::class, 'convertpdf'])->name('convert');
});

require __DIR__ . '/auth.php';
