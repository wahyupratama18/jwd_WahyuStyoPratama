<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactorialController;
use App\Http\Controllers\PowerOfNumberController;
use Illuminate\Support\Facades\Route;

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

// Dashboard
Route::get('/', DashboardController::class)->name('dashboard');

// Perhitungan faktorial dan perpangkatan
Route::resource('factorials', FactorialController::class)->only(['create', 'store']);
Route::resource('power', PowerOfNumberController::class)->only(['create', 'store']);
