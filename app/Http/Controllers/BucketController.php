<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;

class BucketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(){

        $bucket = new Bucket();
        $bucket->user_id = request('user_id');
        $bucket->amount = request('amount');
        $bucket->product_id = request('product_id');

        $bucket->save();

        return redirect()->route('welcome');
    }

    public function update(Request $request)
    {
        $request->validate([
            'bucket_id' => 'required|exists:buckets,id',
            'amount' => 'required|integer|min:0', // Ensure amount is a non-negative integer
        ]);

        // Update the bucket amount
        $bucket = Bucket::find($request('id'));
        $bucket->amount = $request('amount');
        $bucket->save();

        return redirect()->back();
    }

    public function destroy(){
        $id = request('id');
        $item = Bucket::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }
}
