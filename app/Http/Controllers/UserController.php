<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function cart(){
        return view('Client.cart');
        }
    public function shop_detail($id){
        $product = Product::findOrFail($id);
        return view('Client.shop_detail', compact('product'));
        }
}
