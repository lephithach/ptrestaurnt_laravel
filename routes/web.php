<?php

use Illuminate\Support\Facades\Route;
// Controller Admin
use App\Http\Controllers\{
    DashboardController,
    LoaiMonController,
    MonAnController,
    OrderController,
};
// Controller Client
use App\Http\Controllers\Client\{
    ClientViewController,
    CartController,
    RegisterController,
    CommentController,
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
    Route::get('/gioi-thieu', [ClientViewController::class, 'GioiThieu'])->name('gioithieu');
    Route::get('/mon-an', [ClientViewController::class, 'DanhSachMonAn'])->name('danhsachmonan');
    Route::get('/mon-an/{id}', [ClientViewController::class, 'ChiTietMonAn'])->name('chitietmonan');
    Route::get('/gio-hang', [CartController::class, 'getCart'])->middleware('checkloginclient')->name('giohang');
    Route::get('/dang-ky', [RegisterController::class, 'create'])->name('dangky');
    Route::post('/dang-ky', [RegisterController::class, 'store'])->name('dangky.store');
    Route::post('/dang-ky', [RegisterController::class, 'store'])->name('dangky.store');
    Route::get('/dang-nhap', [RegisterController::class, 'index'])->name('dangnhap');
    Route::post('/dang-nhap', [RegisterController::class, 'login'])->name('dangnhap.login');
    Route::get('/dang-xuat', [RegisterController::class, 'logout'])->name('dangxuat');
});

Route::prefix('/cart')->name('cart.')->group(function() {
    Route::get('/', [CartController::class, 'getCart'])->name('getcart');
    Route::post('/add-cart/{id}', [CartController::class, 'addCart'])->name('addcart');
    Route::get('/update-cart/{id}/{soluong}', [CartController::class, 'updateCart'])->name('updatecart');
    Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('deletecart');
});

Route::prefix('/comment')->name('comment.')->group(function() {
    Route::get('/', [CommentController::class, 'index'])->name('index');
    Route::post('/add', [CommentController::class, 'store'])->name('store');
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
    Route::post('/get-name', [MonAnController::class, 'getName'])->name('getname');
});


Route::prefix('/admin/don-hang')->name('donhang.')->group(function() {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/search', [OrderController::class, 'search']);
    Route::get('/search', [OrderController::class, 'search']);
    Route::post('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/order', [OrderController::class, 'order'])->name('testorder');
    Route::get('/store', [OrderController::class, 'store'])->name('teststore');
    Route::get('/update', [OrderController::class, 'update'])->name('update');
    Route::get('/delete', [OrderController::class, 'destroy'])->name('delete');
});
