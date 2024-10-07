<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/seller/request', [SellerRequestController::class, 'request'])->name('seller.request.create');
Route::post('/seller/request', [SellerRequestController::class, 'create'])->name('seller.request.create');

Route::get('/admin/sellers/request/', [SellerRequestController::class, 'index'])->name('admin.seller.request');
Route::get('/admin/sellers/request/{id}', [SellerRequestController::class, 'show'])->name('admin.seller.request.details');



Route::get('/admin/users/', [AdminController::class, 'index'])->name('admin.users');
Route::post("admin/users/", [AdminController::class, 'updateUser'])->name('admim.user.update');
Route::get('/admin/users/{id}', [AdminController::class, 'show'])->name('admin.users.details');

Route::get('/admin/seller/request/accept/{id}', [SellerRequestController::class, 'accept'])->name('admin.seller.request.accept');
Route::get('/admin/seller/request/reject/{id}', [SellerRequestController::class, 'reject'])->name('admin.seller.request.reject');

Route::get('/admin/dashboard',  [AdminController::class, 'showDashboard'])->name('admin.dashboard');

Route::middleware('auth')->get('/seller/dashboard', function(){
    return view('seller.dashboard');
})->name('seller.dashboard');

Route::get('/seller/orders/', [OrderController::class, 'index'])->name('seller.order');
Route::get('/seller/manage/', [ProductController::class, 'index'])->name('seller.manage');

Route::get('/seller/store/', [ProductController::class, 'store'])->name('seller.add_product');
Route::post('/seller/store/', [ProductController::class, 'add'])->name('products.store');