<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        $categoryProducts = CategoryProduct::all();
        return view('category_product.index', compact('categoryProducts'));
    }

    public function create()
    {
        return view('category_product.create');
    }

    public function store(Request $request)
    {
        $categoryProduct = new CategoryProduct();
        $categoryProduct->name = $request->input('name');
        $categoryProduct->description = $request->input('description');
        $categoryProduct->save();
        return redirect()->route('category_product.index');
    }

    public function edit($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        return view('category_product.edit', compact('categoryProduct'));
    }

    public function update(Request $request, $id)
    {
        $categoryProduct = CategoryProduct::find($id);
        $categoryProduct->name = $request->input('name');
        $categoryProduct->description = $request->input('description');
        $categoryProduct->save();
        return redirect()->route('category_product.index');
    }

    public function destroy($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        $categoryProduct->delete();
        return redirect()->route('category_product.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categoryProducts = CategoryProduct::where('name', 'like', '%' . $search . '%')->get();
        return view('category_product.index', compact('categoryProducts'));
    }
}