<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Products\Entities\Category;
use Modules\Products\Entities\Product;
use Modules\Products\Http\Requests\Products\CreateProductRequest;
use Modules\Products\Http\Requests\Products\DeleteProductRequest;
use Modules\Products\Http\Requests\Products\ShowProductRequest;
use Modules\Products\Http\Requests\Products\UpdateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('products::products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();

        return view('products::products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateProductRequest $request)
    {
        $data = $request->all();
        $data['picture'] = $request->picture ? (is_file($request->picture) ? $request->picture->store('proudcts_images','public') : $request->picture) : null;

        Product::create($data);

        return redirect()->route('products.index')->with('message', 'Product Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(ShowProductRequest $request)
    {
        $product = Product::findOrFail($request->id);

        return view('products::products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products::products.update', compact(
            'product',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();
        $data['picture'] = $request->picture ? (is_file($request->picture) ? $request->picture->store('proudcts_images','public') : $request->picture) : null;

        $product->update($data);

        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(DeleteProductRequest $request)
    {
        $product = Product::findOrFail($request->id);

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product Deleted Successfully');
    }
}
