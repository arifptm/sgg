<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lineitem;
use App\Product;
use App\Order;

class LineitemController extends Controller
{
    public function create(){
    	return view('lineitem.create');
    }

    public function store(Request $request){

     	$to_order = [
    		'user_id' => Auth::id(),
    		'status' => 'proses'
    	];
		$o = Order::firstOrCreate($to_order);
		$o->save();  
    	
    	$to_lineitem = [
    		'quantity' => $request->quantity,
    		'product_id' => $request->product_id,
    		'order_id' => $o->id
    	];
    	
    	Lineitem::create($to_lineitem);

    	return redirect ('/products');

    }

    public function incart(){
    	$l = Lineitem::whereUser_id(Auth::id())->whereStatus('proses');
    	return view('lineitem.incart',[ 'items' => $l ]);
    }


}
