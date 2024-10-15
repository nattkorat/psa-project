<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bucket;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function cart(){
        $user_id = Auth::user()->id;
        $buckets = Bucket::where('user_id', $user_id)->with('product')->get();

        // return $buckets;

        return view('Client.cart', compact('buckets'));
        }
    public function shop_detail($id){
        $product = Product::findOrFail($id);
        return view('Client.shop_detail', compact('product'));
        }
}
