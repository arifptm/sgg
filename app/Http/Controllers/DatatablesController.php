<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */


    public function getIndex()
    {
        return view('product.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Product::query())->make(true);
    }
}