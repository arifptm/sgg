<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Role;
use Laratrust;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Product::all();

        if Laratrust::hasRole('user')   
        {
            return view('products.index',['products' => $p]);
        }
        
        return view('products.index',['products' => $p]);
    }
}
