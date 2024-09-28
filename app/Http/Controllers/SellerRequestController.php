<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Models\User;

class SellerRequestController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $sellerRequests = SellerRequest::all();
        return view('admin.sellerRequest',  compact('sellerRequests'));
    }

    public function show($id){
        $user = SellerRequest::findOrFail($id);

        return view('admin.sellerRequestDetails', compact('user'));
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

    public function accept($id){
        $seller_req = SellerRequest::findOrFail($id);

        $user = User::findOrFail($seller_req->user_id);
        $user->role = "seller";
        $user->save();

        // remove request
        $seller_req->delete();

        return redirect()->route('admin.seller.request')->with('accept', $user->name . ' accepted as seller');

    }

    public function reject($id){
        $seller_req = SellerRequest::findOrFail($id);
        // remove request
        $seller_req->delete();

        return redirect()->route('admin.seller.request')->with('reject', $seller_req->name . ' rejected as seller');
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
