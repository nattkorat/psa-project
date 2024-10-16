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

    public function show($id){
        $product = Product::findOrFail($id);

        return view('seller.product_detailts', compact('product'));

    }


    // Method to update the product
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update product details
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        // Handle image upload if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image from storage (optional)
            if ($product->image) {
                \Storage::delete('public/' . $product->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Save the updated product to the database
        $product->save();

        // Redirect back with success message
        return redirect()->route('product.details', $id)->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Optionally, you can perform any additional checks (e.g., user permissions)

        // Delete the product
        $product->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product has been deleted successfully.');
    }
}
