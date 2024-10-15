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
}
