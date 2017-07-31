<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Order;
//use App\Product;

class DashboardController extends Controller
{
    public function index(){
    	$users = User::all();
        $u_u = User::whereRoleIs('user')->get();
    	$u_a = User::whereRoleIs('admin')->get();

        $products = Product::all();
    	$p_p = Product::whereVerified(0)->get();
    	$p_v = Product::whereVerified(1)->get();

        $orders = Order::all();
    	$o = Order::whereStatus('Active')->get();

    	return view('manage.dashboard')->with([
    		'allproducts' => $products,
            'products_pending' => $p_p,
    		'products_verified' => $p_v,
    		'allusers' => $users,
            'users' => $u_u,
    		'admins' => $u_a,
    		'allorders' => $orders,

            'orders' => $o

    		]);
    }
}
