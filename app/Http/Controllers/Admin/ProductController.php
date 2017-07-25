<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Repositories\Admin\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;

class ProductController extends AppBaseController
{
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->all();

        return view('admin.products.index')
            ->with('products', $products);
    }

 
    public function create()
    {
        return view('admin.products.create');
    }

 
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productRepository->create($input);

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

        $img = Image::make('upload/image/'.$name)->resize(320, 240);
        $img->save('upload/image-thumb/'.$name);

        Flash::success('Product saved successfully.');

        return redirect(route('admin.products.index'));
    }

    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.show')->with('product', $product);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        return view('admin.products.edit')->with('product', $product);
    }

    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $saveIn = public_path('/upload');
        $image->move($saveIn, $input['imagename']);
        dd($request->all());
        
        
        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('admin.products.index'));
    }

    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('admin.products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('admin.products.index'));
    }
}
