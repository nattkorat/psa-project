<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\SellerRequest;

class AdminController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function showDashBoard() {
        $users = $this->count_users_by_role();
        $total_product = Product::count();
        return view('admin.dashboard', ['users' => $users,
            'total_product' => $total_product,
            'sell_reqeust' =>  SellerRequest::count(),
            'product' => Product::all()
        ]);
    
    }

    public function count_users_by_role(){
        $users = User::all();
        $n_admins = 0;
        $n_sellers = 0;
        $n_users = 0;

        foreach ($users as $user) {
            if($user->role == 'admin'){
                $n_admins += 1;
            }else if ($user->role == 'seller'){
                $n_sellers += 1;
            }else{
                $n_users += 1;
            }
        }

        return [
            "admins" =>  $n_admins,
            "sellers" =>  $n_sellers,
            "users" =>  $n_users
            ];
    }
}
