<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;
use App\Product;
use App\Lineitem;
use Auth;
use Yajra\Datatables\Facades\Datatables;
//use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{

    public function getNode($id){
        $p = Product::findOrFail($id);
        return $p;
    }

    public function data(){

        $product= Product::select(['id', 'title', 'body', 'image', 'created_at', 'updated_at']);
        return Datatables::of($product)
            ->addColumn('action', function ($product) {
                return '<button             
                    data-dataid = "'.$product->id.'"
                    data-datatitle = "'.$product->title.'"
                    data-dataimage= "<img src=images/medium/'. $product->image .' >"
                    data-toggle="modal" 
                    data-target="#myModal"  
                    class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
                //return '<a data-toggle="modal" data-target="modal-default" href="#edit-'.$product->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->addColumn('thumb', function ($product) {
                return '<img src="images/tiny/'.$product->image.'" />';
            })
            ->rawColumns(['thumb','action'])
            ->make(true);
    }

    public function index(){
        $l = Lineitem::get();
        return view('product.list', ['items' => $l]);
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $input = $request->all();
        $product = Product::create($input);

        if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                try {
                    $file = $request->file('image');
                    $name = time() . '.' . $file->guessClientExtension();
                    $request->file('image')->move("upload/image/", $name);
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
        }

        $product->image = $name;
        $product->save();   

        //$img = Image::make('upload/image/'.$name)->resize(250, null);
        
//         $img = Image::cache(function($image) use (&$name) {
//             $image->make('upload/image/'.$name)->resize(100, 200);         
//             $image->save('upload/image-node/'.$name);
//         });
        
        //     //     $img = Image::make('upload/image/'.$name)->resize(320, 240);
        // $img->save('upload/image-thumb/'.$name);
        
        

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }










    //private $productRepository;





    // public function __construct(ProductRepository $productRepo)
    // {
    //     $this->productRepository = $productRepo;
    // }





    // public function index(Request $request)
    // {
    //     $this->productRepository->pushCriteria(new RequestCriteria($request));
    //     $products = $this->productRepository->all();

    //     return view('products.index')
    //         ->with('products', $products);
    // }

    



    // public function create()
    // {
    //     return view('products.create');
    // }





    // public function store(CreateProductRequest $request)
    // {
    //     $input = $request->all();
    //     $product = $this->productRepository->create($input);

    //     if ($request->hasFile('image')) {
    //         if($request->file('image')->isValid()) {
    //             try {
    //                 $file = $request->file('image');
    //                 $name = time() . '.' . $file->guessClientExtension();
    //                 $request->file('image')->move("upload/image/", $name);
    //             } catch (Illuminate\Filesystem\FileNotFoundException $e) {

    //             }
    //         }
    //     }

    //     $product->image = $name;
    //     $product->save();   

    //     $img = Image::make('upload/image/'.$name)->resize(320, 240);
    //     $img->save('upload/image-thumb/'.$name);

    //     Flash::success('Product saved successfully.');

    //     return redirect(route('admin.products.index'));
    // }

    // /**
    //  * Display the specified Product.
    //  *
    //  * @param  int $id
    //  *
    //  * @return Response
    //  */
    // public function show($id)
    // {
    //     $product = $this->productRepository->findWithoutFail($id);

    //     if (empty($product)) {
    //         Flash::error('Product not found');

    //         return redirect(route('products.index'));
    //     }

    //     return view('products.show')->with('product', $product);
    // }

    // /**
    //  * Show the form for editing the specified Product.
    //  *
    //  * @param  int $id
    //  *
    //  * @return Response
    //  */
    // public function edit($id)
    // {
    //     $product = $this->productRepository->findWithoutFail($id);

    //     if (empty($product)) {
    //         Flash::error('Product not found');

    //         return redirect(route('products.index'));
    //     }

    //     return view('products.edit')->with('product', $product);
    // }

    // /**
    //  * Update the specified Product in storage.
    //  *
    //  * @param  int              $id
    //  * @param UpdateProductRequest $request
    //  *
    //  * @return Response
    //  */
    // public function update($id, UpdateProductRequest $request)
    // {
    //     $product = $this->productRepository->findWithoutFail($id);

    //     if (empty($product)) {
    //         Flash::error('Product not found');

    //         return redirect(route('products.index'));
    //     }

    //     $product = $this->productRepository->update($request->all(), $id);

    //     dd($product);
    //     //$img = Image::make($_FILES['image']['tmp_name']);
    //     //$img->save('upload/bar.jpg');

    //     Flash::success('Product updated successfully.');

    //     return redirect(route('products.index'));
    // }

    // /**
    //  * Remove the specified Product from storage.
    //  *
    //  * @param  int $id
    //  *
    //  * @return Response
    //  */
    // public function destroy($id)
    // {
    //     $product = $this->productRepository->findWithoutFail($id);

    //     if (empty($product)) {
    //         Flash::error('Product not found');

    //         return redirect(route('products.index'));
    //     }

    //     $this->productRepository->delete($id);

    //     Flash::success('Product deleted successfully.');

    //     return redirect(route('products.index'));
    // }
}
