<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware(['guest']);
Route::post('/login', [AuthController::class, 'storeLogin']);

Route::get('/reset', [AuthController::class, 'resetPassword'])->name('reset')->middleware(['guest']);
Route::post('/reset', [AuthController::class, 'requestResetPassword']);

Route::get('/reset_password/{catchall?}', [AuthController::class, 'passwordResetPage'])->name('reset_password')->middleware(['guest']);
Route::post('/reset_password', [AuthController::class, 'passwordReset']);

Route::get('/signup', [AuthController::class, 'signup'])->name('signup')->middleware(['guest']);
Route::post('/signup', [AuthController::class, 'storeSignup']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware(['auth']);
Route::post('/profile', [AuthController::class, 'storeProfile']);

Route::get('/store', [StoreController::class, 'index'])->name('store')->middleware(['auth']);
Route::get('/store/{id}', [StoreController::class, 'book'])->name('book')->middleware(['auth']);
Route::post('/store', [StoreController::class, 'storeFlightTicket']);