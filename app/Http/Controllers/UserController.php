<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class UserController extends Controller
{
    public function list(){
    	$u = User::where('id','<>','1')->get();
    	return view('manage.user.list', ['users'=>$u] );
    }

    public function create(){
    	return view('manage.user.create');
    }

    public function store(Request $request){
    	$u = User::create($request->all());
    	$u -> attachRole('user');
    	return redirect('/manage/users');
    }

    public function show($id){
        $u = User::findOrFail($id);
        return view('manage.user.show',['user'=>$u]);
    }
}
