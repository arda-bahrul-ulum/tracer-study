<?php

use App\Http\Controllers\Alumni\FormAlumniController;
use App\Http\Controllers\Alumni\AlumniController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VLAlumniAngkatanController;
use App\Http\Controllers\VLJurusanController;
use App\Http\Controllers\VLPosisiSaatIniController;
use App\Http\Controllers\VLStatusPernikahanController;
use Illuminate\Support\Facades\Route;

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

// authenticate
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // MASTER BASE
    Route::resource('form-alumni', FormAlumniController::class);

    Route::resource('alumni', AlumniController::class);

    Route::resource('user', UserController::class);
    // END OF MASTER


    // VALUE LIST BASE
    Route::resource('status-pernikahan', VLStatusPernikahanController::class);
    Route::resource('jurusan', VLJurusanController::class);
    Route::resource('alumni-angkatan', VLAlumniAngkatanController::class);
    Route::resource('posisi-saat-ini', VLPosisiSaatIniController::class);
    // END OF VALUE LIST BASE
});


