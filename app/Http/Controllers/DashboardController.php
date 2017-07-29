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
    	$u_u = User::whereRoleIs('user')->get();
    	$u_a = User::whereRoleIs('admin')->get();

    	$p_p = Product::whereVerified(0)->get();
    	$p_v = Product::whereVerified(1)->get();

    	$o = Order::whereStatus('Active')->get();

    	return view('manage.dashboard')->with([
    		'products_pending' => $p_p,
    		'products_verified' => $p_v,
    		'users' => $u_u,
    		'admins' => $u_a,
    		'orders' => $o
    		]);
    }
}
