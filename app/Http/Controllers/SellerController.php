<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;


class SellerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $seller_id = Auth::user()->id;
        $products = Product::where('seller_id', $seller_id)->get();

        return view('seller.dashboard', [
            'total' => count($products),
            'products' => $products
        ]);

    }
}
