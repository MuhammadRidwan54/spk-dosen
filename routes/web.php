<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BidangKeahlianController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JabatanFungsionalController;
use App\Http\Controllers\KuotaBimbinganController;
use App\Http\Controllers\MinatController;
use App\Http\Controllers\PendidikanTerakhirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect root to login
Route::redirect('/', '/login');

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    // Guest-only routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.post');  // Changed from 'login.attempt'
        Route::get('/register', 'showRegisterForm')->name('register');
        Route::post('/register', 'register')->name('register.post');  // Changed from 'register.store'
    });

    // Authenticated-only route
    Route::middleware('auth')->post('/logout', 'logout')->name('logout');
});

// Authenticated Application Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource Routes
    Route::resources([
        'bidang-keahlian' => BidangKeahlianController::class,
        'dosen' => DosenController::class,
        'jabatan-fungsional' => JabatanFungsionalController::class,
        'kuota-bimbingan' => KuotaBimbinganController::class,
        'minat' => MinatController::class,
        'pendidikan-terakhir' => PendidikanTerakhirController::class,
    ]);
});