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

Route::prefix('/loai-mon')->name('loaimon.')->group(function() {
    // Route::resource('/', LoaiMonController::class);
    Route::get('/', [LoaiMonController::class, 'index'])->name('index');
    Route::get('/create', [LoaiMonController::class, 'create'])->name('create');
    Route::post('/store', [LoaiMonController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [LoaiMonController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [LoaiMonController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [LoaiMonController::class, 'update'])->name('update');
});