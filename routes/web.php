<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/seller/request', [App\Http\Controllers\SellerRequestController::class, 'request'])->name('seller.request.create');
Route::post('/seller/request', [App\Http\Controllers\SellerRequestController::class, 'create'])->name('seller.request.create');