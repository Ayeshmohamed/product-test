<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Products\Entities\Category;
use Modules\Products\Http\Requests\Categories\CreateCategoryRequest;
use Modules\Products\Http\Requests\Categories\DeleteCategoryRequest;
use Modules\Products\Http\Requests\Categories\ShowCategoryRequest;
use Modules\Products\Http\Requests\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::all();

        return view('products::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();

        return view('products::categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categories.index')->with('message', 'Category Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(ShowCategoryRequest $request)
    {
        $category = Category::findOrFail($request->id);

        return view('products::categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $category->id)->get();

        return view('products::categories.update', compact(
            'category',
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->except(['_method']));

        return redirect()->route('categories.index')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(DeleteCategoryRequest $request)
    {
        $category = Category::findOrFail($request->id);

        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Category Deleted Successfully');
    }
}
