<?php

use Illuminate\Support\Facades\Route;
// Controller Admin
use App\Http\Controllers\{
    DashboardController,
    LoaiMonController,
    MonAnController,
};
// Controller Client
use App\Http\Controllers\Client\{
    ClientViewController,
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

Route::prefix('/')->name('client.')->group(function() {
    Route::get('/', [ClientViewController::class, 'TrangChu'])->name('trangchu');
    Route::get('/gioi-thieu', [ClientViewController::class, 'GioiThieu  '])->name('gioithieu');
});
    
Route::prefix('/admin')->name('dashboard.')->group(function() {
    Route::resource('/', DashboardController::class);
});

Route::prefix('/admin/loai-mon')->name('loaimon.')->group(function() {
    // Route::resource('/', LoaiMonController::class);
    Route::get('/', [LoaiMonController::class, 'index'])->name('index');
    Route::get('/create', [LoaiMonController::class, 'create'])->name('create');
    Route::post('/store', [LoaiMonController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [LoaiMonController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [LoaiMonController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [LoaiMonController::class, 'destroy'])->name('destroy');
});

Route::prefix('/admin/mon-an')->name('monan.')->group(function() {
    // Route::resource('/', LoaiMonController::class);
    Route::get('/', [MonAnController::class, 'index'])->name('index');
    Route::get('/create', [MonAnController::class, 'create'])->name('create');
    Route::post('/store', [MonAnController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [MonAnController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [MonAnController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [MonAnController::class, 'destroy'])->name('destroy');
});
