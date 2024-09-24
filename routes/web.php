<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\AdminController;

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

Route::get('/admin/seller/request/accept', [SellerRequestController::class, 'accept'])->name('admin.seller.request.accept');
Route::get('/admin/seller/request/reject', [SellerRequestController::class, 'reject'])->name('admin.seller.request.reject');