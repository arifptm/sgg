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
use App\Order;
use Auth;
use Laratrust;
use Yajra\Datatables\Facades\Datatables;
//use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{



    public function indexManage(){
        $user_id = Auth::id();
        $k = Order::with('lineitem')->whereUser_id($user_id)->whereStatus('proses')->first();   
        return view('manage.product.index', ['items' => $k]);
    }

    public function index(){
        $user_id = Auth::id();
        $k = Order::with('lineitem')->whereUser_id($user_id)->whereStatus('proses')->first();   
        return view('product.index', ['items' => $k]);
    }


    public function edit($id){
        $p = Product::findOrFail($id);
//        dd($p);
        return view('manage.product.edit', ['product' => $p]);
    }

    public function update($id, Request $request){
        $p = Product::findOrFail($id);
        if (empty($p)) {
            Flash::error('Product not found');
            return redirect(route('manage.products.index'));
        }

        $p->update($request->all());

        Flash::success('Product updated successfully.');
        return redirect(route('manage.products.index'));
    }

    public function create(){
        $p = Product::whereUser_id(Auth::id())->get();
        
        return view('product.create', ['products'=>$p]);
    }

    public function store(Request $request){
        $input = $request->all();
        
        if ($request->hasFile('image')) {
            $input['image'] = $this->upload($request);
        }

        $product = Product::create($input);


        // if ($request->hasFile('image')) {
        //     if($request->file('image')->isValid()) {
        //         try {
        //             $file = $request->file('image');
        //             $name = time() . '.' . $file->guessClientExtension();
        //             $request->file('image')->move("upload/image/", $name);
        //         } catch (Illuminate\Filesystem\FileNotFoundException $e) {

        //         }
        //         $product->image = $name;
        //         $product->save();    
        //     }
        // } else {
        //     $product->image = 'noimage.png';
        //     $product->save();  
        // }

        Flash::success('Product saved successfully.');
        return redirect(route('products.index'));
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        if (empty($product)) {
            Flash::error('Product not found');
            return redirect(route('products.index'));
        }

        return view('product.show')->with('product', $product);
    }

    public function listProposal(){
        $p = Product::whereVerified(0)->get();
        return view('manage.product.list_proposal', ['products'=>$p]);
    }





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


    // public function update($id, UpdateProductRequest $request)
    // {
    //     $product = $this->productRepository->findWithoutFail($id);



    //     

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

    public function upload(Request $request){
        
            if($request->file('image')->isValid()) {
                try {
                    $file = $request->file('image');
                    $name = time() . '.' . $file->guessClientExtension();
                    $request->file('image')->move("upload/image/", $name);
                    return $name;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }
            }
    }

    public function data(){

        $product= Product::select(['id', 'stock', 'title', 'body', 'image', 'register_date', 'verified'])->where('verified','=', 1)->orWhere('verified','=', null );
        $dt = Datatables::of($product)
            ->addColumn('title_a', function ($product) {
                return '<a href="/products/'.$product->id.'">'.$product->title.'</a><br><small>'. $product->verified.'</small>';
            })
            ->addColumn('action', function ($product) {
                if ($product->getOriginal('verified') == 1 )
                return '<button             
                    data-dataid = "'.$product->id.'"
                    data-datatitle = "'.$product->title.'"
                    data-dataimage= "<img src=images/medium/'. $product->image .' >"
                    data-toggle="modal" 
                    data-target="#myModal"  
                    class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Permintaan</button>';
                if ($product->getOriginal('verified') == 0 )
                return '<button class="btn btn-xs disabled"><i class="glyphicon glyphicon-plus"></i> Permintaan</button>';
            })

            ->addColumn('thumb', function ($product) {
                if($product->image <> null)
                return '<a href="/products/'.$product->id.'"><img src="/images/tiny/'.$product->image.'" /></a>';
                if($product->image == null)
                return '<a href="/products/'.$product->id.'"><img src="/images/tiny/noimage.png" /></a>';
            })
            ->addColumn('edit', function ($product){
                return '<a class="btn btn-xs btn-primary" href="/manage/products/'.$product->id.'/edit">Edit</a>';
            })
            ->rawColumns(['title_a','thumb','action','d_stock','edit']);
            return $dt->make(true);
    }
}
