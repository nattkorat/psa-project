<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerRequestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\controllers\ProductController;
use App\Http\controllers\SellerController;
use App\Http\controllers\UserController;
use App\Http\controllers\BucketController;

use App\Models\Product;

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
})->name('welcome');

Auth::routes();

Route::get('/cart', [UserController::class,  'cart'])->name('cart');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('cart.placeOrder');
Route::get('/seller/user-orders/{user_id}', [OrderController::class, 'userOrders'])->middleware('auth')->name('seller.userOrders');



Route::get('/shop_detail/{id}', [UserController::class,  'shop_detail'])->name('shop_detail');

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


Route::get('/seller/dashboard/', [SellerController::class, 'index'])->name('seller.dashboard');

Route::get('/seller/orders/', [OrderController::class, 'index'])->name('seller.order');
Route::get('/seller/manage/', [ProductController::class, 'index'])->name('seller.manage');

Route::get('/seller/store/', [ProductController::class, 'store'])->name('seller.add_product');
Route::post('/seller/store/', [ProductController::class, 'add'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.details');

Route::put('/seller/products/{id}', [ProductController::class, 'update'])->name('seller.product.update');

Route::post('/add/bucket/', [BucketController::class, 'add'])->name('add.bucket');
