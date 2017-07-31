<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;
use Flash;

class OrderController extends Controller
{
    public function checkout(Request $request){

    	$o = Order::find($request->id);		
			$input['status'] = 'Pending';
			$input['user_id'] = Auth::id();		
		$o->update($input);
		Flash::success('Permintaan sudah terkirim, dan menunggu persetujuan.');
	    return redirect('/products');
    }

    public function index(){
        $o = Order::all();
        return view('manage.order.index', ['orders'=>$o]);
    }

}
