<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $products = [];
        return view('seller.manage', compact('products'));
    }

    public function store(){
        return view('seller.create_product');
    }

    public function add(){
        // will complete later
    }
}
