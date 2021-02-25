<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class,'product',[
            'except'=>['index','show']
        ]);
    }

    public function index()
    {
        return redirect('/');
    }
    public function mainContent()
    {
        $products = Product::query()->get();
        $catalogs = Catalog::query()->get();
        return view('main',[
            'products'=>$products,
            'catalogs'=>$catalogs
        ]);
    }

    public function create()
    {
        return view('models.products.createForm');
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validatedWithImage());
        $product->save();
        return redirect()->route('adminPanel',$product);
    }

    public function show($id)
    {

    }

    public function edit(Product $product)
    {
        return view('models.products.createForm',[
            'product'=>$product]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validatedWithImage());
        return redirect()->route('adminPanel');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }

}
