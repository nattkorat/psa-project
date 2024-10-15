<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Bucket;

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

    public function placeOrder()
    {
        $user_id = Auth::user()->id;

        // Fetch the items in the bucket for this user
        $buckets = Bucket::where('user_id', $user_id)->get();

        if ($buckets->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Loop through each bucket item and create an order
        foreach ($buckets as $bucket) {
            Order::create([
                'user_id' => $bucket->user_id,
                'product_id' => $bucket->product_id,
                'amount' => $bucket->amount,
                'status' => 'pending', // Default status
            ]);
        }

        // Clear the user's bucket after placing the order
        Bucket::where('user_id', $user_id)->delete();

        // Redirect to a confirmation page or cart page
        return redirect()->route('welcome')->with('success', 'Order placed successfully!');
    }

}
