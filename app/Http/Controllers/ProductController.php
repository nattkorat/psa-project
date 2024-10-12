<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class ProductController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $seller_id = Auth::user()->id;
        $products = Product::where('seller_id', $seller_id)->get();
        return view('seller.manage', compact('products'));
    }

    public function store(){
        return view('seller.create_product');
    }
    
    public function add(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'seller_id' => 'required|integer',
        ]);

        // Store image
        $imagePath = $request->file('image')->store('products', 'public');

        // Create new product
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'seller_id' => $request->seller_id,
        ]);

        return redirect()->route('seller.manage')->with('success', 'Product created successfully.');
    }

    public function dashboard(){
        return view('seller.dashboard');
    }
}
