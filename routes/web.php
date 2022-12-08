<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    LoaiMonController,
};

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


Route::prefix('/')->name('dashboard.')->group(function() {
    Route::resource('/', DashboardController::class);
});

Route::prefix('/mon-an')->name('monan.')->group(function() {
    Route::resource('/', LoaiMonController::class);
});