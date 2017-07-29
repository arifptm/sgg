<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function list(){
    	$r = Role::all();
    	return view('manage.role.list', ['roles'=>$r] );
    }

    public function create(){
    	return view('manage.user.create');
    }

    public function store(Request $request){
    	$u = User::create($request->all());
    	$u -> attachRole('user');
    	return redirect()->route('users.list');
    }
}
