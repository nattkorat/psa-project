<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function cart(){
        return view('Client.cart');
        }
    public function shop_detail(){
        return view('Client.shop_detail');
        }
}
