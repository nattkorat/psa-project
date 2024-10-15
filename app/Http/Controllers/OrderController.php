<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $seller_id = Auth::user()->id;
        $orders = Order::where('seller_id', $seller_id)->get();
        return view('seller.order', compact('orders'));

    }
}
