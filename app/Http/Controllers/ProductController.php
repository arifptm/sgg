<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $p = Product::all();
        return view('product.index', ['product'=> $p]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $p = Request::all();
        $p->save();
        return redirect('products');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
