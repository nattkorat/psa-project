<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellerRequest;

class SellerRequestController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $sellerRequests = SellerRequest::all();
        return view('seller.request',  compact('sellerRequests'));
    }

    public function show($id){
        $sellerRequest = SellerRequest::findOrFail($id);
        return view('seller.request.show', compact('sellerRequest'));
    }

    public function create(){
        $seller = new SellerRequest();
        $seller->user_id = request('user_id');
        $seller->name = request('name');
        $seller->store = request('store');
        $seller->address = request('address');
        $seller->phone = request('phone');
        $seller->email = request('email');

        $seller->save();

        return redirect()->route('welcome')->with('status', 'Request create sucess');
    }

    public function destroy($id){
        $sellerRequest = SellerRequest::findOrFail($id);
        $sellerRequest->delete();

        return redirect()->route('seller.request.index');
    }

    public function request(){
        return view('seller.request');
    }
}
