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

        // Fetch orders for the seller's products
        $orders = Order::whereHas('product', function ($query) use ($seller_id) {
            $query->where('seller_id', $seller_id);
        })
        ->with('user') // Fetch user details for each order
        ->get()
        ->groupBy('user_id'); // Group orders by user

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


    public function userOrders($user_id)
    {
        $seller_id = Auth::user()->id;

        // Fetch all orders placed by the specific user for this seller's products
        $orders = Order::where('user_id', $user_id)
            ->whereHas('product', function ($query) use ($seller_id) {
                $query->where('seller_id', $seller_id);
            })
            ->with('product') // Fetch product details
            ->get();

        return view('seller.user-orders', compact('orders'));
    }


}
