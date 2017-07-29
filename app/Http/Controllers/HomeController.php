<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Role;
use Laratrust;
use Yajra\Datatables\Facades\Datatables;

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

        if (Laratrust::hasRole('user')) {           
            return redirect('/products');
        } else if (Laratrust::hasRole('admin')) {           
            return redirect('/manage/dashboard');
        } else if (Laratrust::hasRole('super'))  {
            return redirect('/manage/dashboard');  
        }        
    }
}
