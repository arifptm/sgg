<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public function checkout(Request $request){

    	$o = Order::find($request->id);

		
			$input['status'] = 'Active';
			$input['user_id'] = Auth::id();
		
		
		
		$o->update($input);
	    return 'oye';
    }

    public function index(){
        $o = Order::all();
        return view('manage.order.index', ['orders'=>$o]);
    }

}
