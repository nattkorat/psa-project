<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerRequestController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/seller/request', [SellerRequestController::class, 'request'])->name('seller.request.create');
Route::post('/seller/request', [SellerRequestController::class, 'create'])->name('seller.request.create');